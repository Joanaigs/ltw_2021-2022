<?php
declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once ('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');
$idDish=$_GET['idDish'];
$idRestaurant=$_GET['idRestaurant'];
Dish::removeDish($db, $idDish);
header("Location: restView.php?id=$idRestaurant");


drawFooter();

?>
