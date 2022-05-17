<?php
declare(strict_types = 1);

require_once('database/order.class.php');
$db = new PDO('sqlite:example.db');
Order::UpdateOrdersRestaurant($db, $_GET['id'], $_GET['state']);
$orders = Order::getOrdersRestaurant($db, '1');
echo json_encode($orders);
?>