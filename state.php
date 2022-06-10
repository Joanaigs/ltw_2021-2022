<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/order.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('templates/orderState.tpl.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();

$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
if ($session->getId() == $restaurant->idUser) {
    $orders = Order::getOrdersRestaurant($db, $idRestaurant);
    $counter = sizeof($orders) + 1;

    drawRestViewHeader($idRestaurant);
    drawOrderState($orders, $counter, $db);
    drawFooter();
}
else
    header("Location: index.php");

