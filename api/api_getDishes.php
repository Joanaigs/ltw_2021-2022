<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/dish.class.php');
$db = new PDO('sqlite:../example.db');
$dishes=Dish::getDishesRestaurant($db, $_GET['id'], $session);


echo json_encode($dishes);
?>