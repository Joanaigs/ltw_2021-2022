<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/filter.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
$db = getDatabaseConnection();


$idRestaurant=$_GET['id'];
drawRestViewHeader($idRestaurant);
$dishes=Dish::getDishesRestaurant($db, $idRestaurant, $session);
drawRestaurantView($db, intval($idRestaurant), $dishes, $session);
drawFooter();



