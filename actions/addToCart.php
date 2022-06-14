<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ .'/../database/cart.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();

if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['idDish']) || preg_match ("/\D/", $_GET['favorites'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant=$_GET['idRestaurant'];
$idDish=$_GET['idDish'];
$favorites =$_GET['favorites'];

Cart::addToCart($db, $idDish, $session->getId());


if ($favorites == 0)
    header("Location: ../pages/restaurant.php?id=$idRestaurant");
else
    header("Location: ../pages/favorites.php");


