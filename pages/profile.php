<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/user.tpl.php');

$db = getDatabaseConnection();


$user = User::getUser($db, $session->getId());
$restaurant=Restaurant::hasRestaurant($db, $session->getId());

drawProfileHeader($restaurant, $session);
drawProfile($user, $restaurant, $session);
drawFooter();

