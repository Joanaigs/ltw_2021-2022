<?php
declare(strict_types = 1);

require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/filter.tpl.php');
require_once('../templates/restaurants.tpl.php');
$db = new PDO('sqlite:../example.db');
$checked=$_GET['checked'];
if($_GET['filter']=="all"){
    $restaurants=Restaurant::getRestaurants($db);
}
elseif($checked=='true'){
    $restaurants = Restaurant::filterRestaurants($db, $_GET['filter']);
}
else{
    $restaurants=Restaurant::getRestaurants($db);
}
echo json_encode($restaurants);
?>