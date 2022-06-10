<?php

declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/connection.db.php');
require_once('database/cart.class.php');
require_once('database/user.class.php');
require_once('templates/common.tpl.php');
require_once('templates/cart.tpl.php');

$db = getDatabaseConnection();
$restaurants = Restaurant::getRestaurants($db, $session);
drawHeader($session, $hasSearch = false);
drawCart($db, $session, $restaurants);
drawFooter();

