<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/restaurant.class.php');
$db = new PDO('sqlite:../example.db');
    $restaurants = Restaurant::filterRestaurants($db, $_GET['filter'], $session);

echo json_encode($restaurants);
?>