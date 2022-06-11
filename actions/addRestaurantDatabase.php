<?php
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ .'/../database/connection.db.php');
require_once(__DIR__ .'/../database/restaurant.class.php');
require_once(__DIR__ .'/../database/filter.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
$dbh = new PDO('sqlite:../database/basedados.db');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($_POST['restaurantCategory'])){
    $session->addMessage("error","Tem de atribuir uma categoria ao restaurante");
    exit(header("Location: ../pages/profile.php"));
}

if (isset($_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'])) {
    if ($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameRestaurant"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('../images')) mkdir('../images');
        if (!is_dir('../images/restaurants')) mkdir('../images/restaurants');

        $originalFileName = "../images/restaurants/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Restaurant::addRestaurants($db, $session->getId(), $_POST["nameRestaurant"], $_POST["addressRestaurant"], $id);
        $idRestaurant = Restaurant::hasRestaurant($db, $session->getId());
        Filter::addCategoryRestaurant($db, $idRestaurant->id, intval($_POST['restaurantCategory']));
    } else {
        Restaurant::addRestaurants($db, $session->getId(), $_POST["nameRestaurant"], $_POST["addressRestaurant"], null);
        $idRestaurant = Restaurant::hasRestaurant($db, $session->getId());
        Filter::addCategoryRestaurant($db, $idRestaurant->id, intval($_POST['restaurantCategory']));
    }
    header("Location: ../pages/restView.php?id=$idRestaurant->id");

}
else{
    $session->addMessage("error","O restaurante não foi adicionado");
header("Location: ../pages/profile.php");}