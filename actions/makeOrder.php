<?php

declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/order.class.php');
require_once(__DIR__ . '/../database/user.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['idRestaurant'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant = $_GET['idRestaurant'];
$cart = Cart::getCart($db, $session->getId(), intval($idRestaurant));
$user = User::getUser($db, $session->getId());
if (!empty($_POST['address'])) {
    $address = preg_replace("/[^A-zÀ-ú\d\s@.!?:)(%;+-]/", '', $_POST['address']);
    Order::addOrder($db, $session->getId(), $address);
} else {
    Order::addOrder($db, $session->getId(), $user->address);
}
$order = Order::orderOfUser($db, $session->getId());
foreach ($cart as $dish) {
    Order::addDishOrder($db, $order->id, $dish->id, $dish->number);
    Cart::removefromCart($db, $dish->id, $session->getId());
}

header("Location: ../pages/latest_orders.php");
