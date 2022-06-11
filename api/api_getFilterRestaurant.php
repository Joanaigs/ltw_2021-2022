<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
$typeDishes = Filter::getFilterRestaurants($db);
echo json_encode($typeDishes);
?>