<?php
    declare(strict_types = 1);

    require_once('database/order.class.php');
    require_once ('database/dish.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/restaurants.tpl.php');
    require_once('templates/orderState.tpl.php');

    $db = new PDO('sqlite:example.db');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $idRestaurant=$_GET['id'];
    $orders=Order::getOrdersRestaurant($db,$idRestaurant);
    $counter = sizeof($orders) + 1;

    drawRestViewHeader($idRestaurant);
    drawOrderState($orders, $counter, $db);
    drawFooter();

