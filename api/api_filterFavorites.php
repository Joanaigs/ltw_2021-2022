<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/dish.class.php');
require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/restaurants.tpl.php');

$db = new PDO('sqlite:../example.db');
if ($_GET['filter'] == "restaurants") {
    $array = Restaurant::getFavoriteRestaurants($db, $session->getId());
} else {
    $array = Dish::getFavoriteDishes($db, $session->getId());
}
echo json_encode($array);


?>