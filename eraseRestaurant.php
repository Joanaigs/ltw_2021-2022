<?php
require_once('session.php');
$session = new Session();
require_once('templates/common.tpl.php');
require_once('database/connection.db.php');
require_once('database/restaurant.class.php');
require_once('database/filter.class.php');
drawHeader($session);
$db = getDatabaseConnection();

$idRestaurant = Restaurant::hasRestaurant($db, $session->getId());
Restaurant::removeRestaurants($db, $idRestaurant->id);
header("Location: profile.php");

drawFooter();
