<?php
    declare(strict_types = 1);

    require_once('session.php');
    $session = new Session();
    $session->logout();

    header('Location: /main_page.php');
