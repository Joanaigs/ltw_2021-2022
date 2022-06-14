<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ .'/../database/dish.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error', "Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$dbh = new PDO('sqlite:../database/basedados.db');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ( preg_match ("/\D/", $_GET['idRestaurant'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant = $_GET['idRestaurant'];
if (isset($_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], $_POST['typeDish']) && !empty($_POST["priceDish"]) && !empty($_POST["nameDish"])) {
    $name = preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST['nameDish']);
    $mealDish = preg_replace("/\D/", '', $_POST['mealDish']);
    $price=preg_replace("/[^\d,.]/", '', $_POST['priceDish']);
    $typeDish=preg_replace("/\D/", '', $_POST['typeDish']);
    if ($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameDish"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('../images')) mkdir('../images');
        if (!is_dir('../images/dishes')) mkdir('../images/dishes');

        $originalFileName = "../images/dishes/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Dish::addDish($dbh, $name, $price, $mealDish, intval($idRestaurant),$typeDish, intval($id));
    } else {
        Dish::addDish($dbh, $name, $price, $mealDish, intval($idRestaurant),$typeDish, null);
    }
} else
    $session->addMessage('error', 'O prato não foi adicionado, tem de preencher todos os parâmetros.');
header("Location: ../pages/restView.php?id=$idRestaurant");

