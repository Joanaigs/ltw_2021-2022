<?php
declare(strict_types = 1);

require_once('../database/dish.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/restaurants.tpl.php');
$db = new PDO('sqlite:../example.db');
$checked=$_GET['checked'];
if($_GET['filter']=="todos"){
    $dishes=Dish::getDishesRestaurant($db, $_GET['id']);
}
elseif($checked=='true'){
    $dishes = Dish::filterDish($db, $_GET['filter'], $_GET['id']);
}
else{
    $dishes=Dish::getDishesRestaurant($db, $_GET['id']);
}
echo json_encode($dishes);
?>