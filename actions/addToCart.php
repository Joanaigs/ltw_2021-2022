<?php
declare(strict_types=1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ .'/../database/cart.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();


$idRestaurant=$_GET['idRestaurant'];
$idDish=$_GET['idDish'];
$favorites =$_GET['favorites'];

Cart::addToCart($db, $idDish, $session->getId());


if ($favorites == 0)
    header("Location: ../pages/restaurant.php?id=$idRestaurant");
else
    header("Location: ../pages/favorites.php");


