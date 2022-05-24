<?php
declare(strict_types = 1);
session_start();
require_once('../database/dish.class.php');
require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/restaurants.tpl.php');

$db = new PDO('sqlite:../example.db');
if (isset($_SESSION['id'])) {
    if ($_GET['filter'] == "restaurants") {
        $array = Restaurant::getFavoriteRestaurants($db, $_SESSION['id']);
    } else {
        $array = Dish::getFavoriteDishes($db, $_SESSION['id']);
    }
    echo json_encode($array);
}
echo json_encode("nOne");

?>