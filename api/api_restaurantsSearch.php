<?php
declare(strict_types = 1);

require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/filter.tpl.php');
require_once('../templates/restaurants.tpl.php');
$db = new PDO('sqlite:../example.db');

$restaurants = Restaurant::searchRestaurants($db, $_GET['search']);
echo json_encode($restaurants);
?>