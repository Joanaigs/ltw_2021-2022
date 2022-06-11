<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
if ($_GET['filter'] == "restaurants") {
    $array = Restaurant::getFavoriteRestaurants($db, $session, $session->getId());
} else {
    $array = Dish::getFavoriteDishes($db,$session, $session->getId());
}
echo json_encode($array);


?>