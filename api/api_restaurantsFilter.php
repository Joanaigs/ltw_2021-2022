<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
if($_GET['filter']=="all"){
    $restaurants=Restaurant::getRestaurants($db, $session);
}
else{
    $restaurants = Restaurant::filterRestaurants($db, $_GET['filter'], $session);
}

echo json_encode($restaurants);
?>