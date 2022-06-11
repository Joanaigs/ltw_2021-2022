<?php
declare(strict_types=1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/filter.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
$db = getDatabaseConnection();

$idRestaurant = $_GET['idRestaurant'];
$idDish = $_GET['idDish'];
$favorites=$_GET['favorites'];

Cart::removefromCart($db, intval($idDish), $session->getId());
if ($_GET['cart'] === 'true')
    header("Location: ../pages/cart.php");
else if ($favorites == 0)
    header("Location: ../pages/restaurant.php?id=$idRestaurant");
else
    header("Location: ../pages/favorites.php");