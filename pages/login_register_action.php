<?php
declare(strict_types=1);

require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();

require_once('templates/common.tpl.php');

drawLoginRegisterForm($session);


