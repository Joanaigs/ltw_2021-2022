<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
$dishes=Dish::getDish($db, $_GET['id']);


echo json_encode($dishes);
?>