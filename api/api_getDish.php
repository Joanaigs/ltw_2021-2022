<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/dish.class.php');
$db = new PDO('sqlite:../example.db');
$dishes=Dish::getDish($db, $_GET['id']);


echo json_encode($dishes);
?>