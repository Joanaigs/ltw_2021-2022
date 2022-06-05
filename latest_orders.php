<?php

declare(strict_types=1);

require_once('session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/user.class.php');

require_once('templates/common.tpl.php');
require_once('templates/user.tpl.php');

$db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());

drawHeader($session);
drawLatestOrders($session, $db, $user);
drawFooter();
