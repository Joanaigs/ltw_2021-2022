<?php
declare(strict_types=1);

require_once('session.php');
$session = new Session();

require_once('database/restaurant.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/connection.db.php');
$db = getDatabaseConnection();


drawHeader($session, $hasSearch = false);
drawAboutUs();