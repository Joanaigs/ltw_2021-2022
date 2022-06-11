<?php
declare(strict_types=1);

require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();

require_once(__DIR__ .'/../templates/common.tpl.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();


drawHeader($session, $hasSearch = false);
drawAboutUs();