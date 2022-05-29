<?php

declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once ('database/cart.class.php');
require_once('templates/common.tpl.php');
require_once('database/connection.db.php');
require_once('database/order.class.php');
$db = getDatabaseConnection();
$idRestaurant=$_GET['idRestaurant'];
$cart = Cart::getCart($db, $session->getId(), intval($idRestaurant));
Order::addOrder($db, $session->getId());
$order=Order::orderOfUser($db, $session->getId());
foreach ($cart as $dish) {
    Order::addDishOrder($db, $order->id, $dish->id);
    Cart::removefromCart($db, $dish->id, $session->getId());
}

header("Location: cart.php");
