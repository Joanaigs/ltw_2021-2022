<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once ('database/cart.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idRestaurant=$_GET['idRestaurant'];
$idDish=$_GET['idDish'];
Cart::addToCart($db, $idDish, $session->getId());

header("Location: restaurant.php?id=$idRestaurant");
