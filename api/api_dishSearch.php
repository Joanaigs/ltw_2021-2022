<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
$dishes = Dish::searchDishes($db, $_GET['search'], $session, intval($_GET['id']));
echo json_encode($dishes);
?>