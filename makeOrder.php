<?php

declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once ('database/cart.class.php');
require_once('templates/common.tpl.php');
require_once('database/connection.db.php');
require_once('database/order.class.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();
$idRestaurant=$_GET['idRestaurant'];
$cart = Cart::getCart($db, $session->getId(), intval($idRestaurant));
$user=User::getUser($db, $session->getId());
if(!empty($_POST['address'])) {
    Order::addOrder($db, $session->getId(), $_POST['address']);
}
else {
    Order::addOrder($db, $session->getId(), $user->address);
}
$order=Order::orderOfUser($db, $session->getId());
foreach ($cart as $dish) {
    Order::addDishOrder($db, $order->id, $dish->id, $dish->number);
    Cart::removefromCart($db, $dish->id, $session->getId());
}

header("Location: latest_orders.php");
