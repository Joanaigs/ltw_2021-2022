<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/filter.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['idDish'])|| preg_match ("/\D/", $_GET['number'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant=$_GET['idRestaurant'];
$idDish=$_GET['idDish'];
$number=$_GET['number'];
if($number<=0){
    Cart::removefromCart($db, intval($idDish), $session->getId());
}
else
    Cart::updadeNumberDish($db, intval($number), intval($idDish), $session->getId());

header("Location: ../pages/cart.php");
