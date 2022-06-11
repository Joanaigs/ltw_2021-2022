<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/order.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../templates/orderState.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
$db = getDatabaseConnection();

$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
if ($session->getId() == $restaurant->idUser) {
    $orders = Order::getOrdersRestaurant($db, $idRestaurant);
    $counter = sizeof($orders) + 1;

    drawRestViewHeader($idRestaurant, $session);
    drawOrderState($orders, $counter, $db);
    drawFooter();
}
else
    header("Location: ../index.php");

