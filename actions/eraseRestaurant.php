<?php
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
drawHeader($session, $hasSearch = false);
$db = getDatabaseConnection();

$idRestaurant = Restaurant::hasRestaurant($db, $session->getId());
Restaurant::removeRestaurants($db, $idRestaurant->id);
header("Location: ../pages/profile.php");

drawFooter();
