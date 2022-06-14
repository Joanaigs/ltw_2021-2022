<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/order.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
Order::UpdateOrdersRestaurant($db, $_GET['id'], $_GET['state']);
$orders = Order::getOrdersRestaurant($db, '1');
echo json_encode($orders);
?>