<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/restaurant.class.php');
$db = new PDO('sqlite:../example.db');
$restaurant=Restaurant::getRestaurant($db, intval($_GET['id']));


echo json_encode($restaurant);
?>