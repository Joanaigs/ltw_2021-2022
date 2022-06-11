<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();

$restaurants=Restaurant::getRestaurants($db, $session);

echo json_encode($restaurants);