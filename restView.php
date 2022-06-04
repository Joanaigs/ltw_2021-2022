<?php
    declare(strict_types = 1);
    require_once('session.php');
    $session = new Session();

    require_once('database/restaurant.class.php');
    require_once ('database/dish.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/filter.tpl.php');
    require_once('templates/restaurants.tpl.php');
    $db = new PDO('sqlite:example.db');

    $idRestaurant=$_GET['id'];
    drawRestViewHeader($idRestaurant);
    $dishes=Dish::getDishesRestaurant($db, $idRestaurant, $session);
    drawRestaurantView($db, intval($idRestaurant), $dishes);


