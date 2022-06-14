<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();

if($_GET['filter']=="todos" || $_GET['filter']==="undefined"){
    $dishes=Dish::getDishesRestaurant($db, $_GET['id'], $session);
}
else{
    $dishes = Dish::filterDish($db, $_GET['filter'], $_GET['id'], $session);
}

echo json_encode($dishes);
?>