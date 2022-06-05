<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/cart.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idRestaurant=$_GET['idRestaurant'];
$idDish=$_GET['idDish'];
$number=$_GET['number'];
if($number<=0){
    Cart::removefromCart($db, intval($idDish), $session->getId());
}
else
    Cart::updadeNumberDish($db, intval($number), intval($idDish), $session->getId());

header("Location: cart.php");
