<?php
    declare(strict_types=1);

    require_once('session.php');
    $session = new Session();

    require_once('templates/common.tpl.php');

    drawLoginRegisterForm($session);


