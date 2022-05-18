<?php
declare(strict_types = 1);

require_once('../database/dish.class.php');
require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/restaurants.tpl.php');

$db = new PDO('sqlite:../example.db');

$checked = $_GET['checked'];
$array = array();
if($_GET['filter']=="restaurants"){
    $array['type'] = 'restautants';
    $restaurants = Restaurant::getFavoriteRestaurants($db);
    $array['array'] = $restaurants;
}

else{
    $array['type'] = 'dishes';
    $dishes = Dish::getFavoriteDishes($db, 1);
    $array['array'] = $dishes;
}

echo json_encode($array);

?>