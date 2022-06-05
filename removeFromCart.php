<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/cart.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();

$idRestaurant = $_GET['idRestaurant'];
$idDish = $_GET['idDish'];

Cart::removefromCart($db, intval($idDish), $session->getId());
if ($_GET['cart'] === 'true')
    header("Location: cart.php");
else if ($favorites == 0)
    header("Location: restaurant.php?id=$idRestaurant");
else
    header("Location: favorites.php");