<?php
declare(strict_types=1);

require_once('uteis/session.php');
$session = new Session();

require_once('database/restaurant.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();

$restaurants = Restaurant::getRestaurants($db, $session);
$filterRestaurants = Filter::getFilterRestaurants($db);
drawHeader($session, $hasSearch = true);
drawRestaurants($restaurants, $filterRestaurants, $db, $session);
drawFooter();
