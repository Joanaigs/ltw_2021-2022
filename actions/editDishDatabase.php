<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/filter.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$dbh = new PDO('sqlite:../database/basedados.db');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['idDish'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant = $_GET['idRestaurant'];
$idDish = $_GET['idDish'];

if (isset($_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], $_POST['typeDish']) && !empty($_POST["priceDish"])){
    $name = preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST['nameDish']);
    $mealDish = preg_replace("/\D/", '', $_POST['mealDish']);
    $price=preg_replace("/[^\d,.]/", '', $_POST['priceDish']);
    $typeDish=preg_replace("/\D/", '', $_POST['typeDish']);
    if($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameDish"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('../images')) mkdir('../images');
        if (!is_dir('../images/dishes')) mkdir('../images/dishes');

        $originalFileName = "../images/dishes/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Dish::updateDish($dbh, intval($idDish),$name, $price, $mealDish, intval($idRestaurant), $typeDish, intval($id));
    }
    else{
        Dish::updateDish($dbh, intval($idDish), $name, $price, $mealDish, intval($idRestaurant), $typeDish, null);
    }
}else
    $session->addMessage('error', "Não foi possivel editar o prato");
header("Location: ../pages/restView.php?id=$idRestaurant");
