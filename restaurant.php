<?php

declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');


$db = $db = new PDO('sqlite:example.db');

$restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
$dishes = Dish::getDishesRestaurant($db, intval($_GET['id']));

drawHeader();
drawRestaurant($restaurant,$dishes);
drawFooter();
?>
