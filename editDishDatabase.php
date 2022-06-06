<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$dbh = new PDO('sqlite:example.db');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$idRestaurant = $_GET['idRestaurant'];
$idDish = $_GET['idDish'];

if (isset($_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], $_POST['typeDish'])){
    if($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameDish"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('images')) mkdir('images');
        if (!is_dir('images/dishes')) mkdir('images/dishes');

        $originalFileName = "images/dishes/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Dish::removeDish($dbh, $idDish);
        Dish::addDish($dbh, $_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], intval($idRestaurant), $_POST['typeDish'], intval($id));
        header("Location: restView.php?id=$idRestaurant");
    }
    else{
        Dish::removeDish($dbh, $idDish);
        Dish::addDish($dbh, $_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], intval($idRestaurant), $_POST['typeDish'], null);
        header("Location: restView.php?id=$idRestaurant");
    }
}

