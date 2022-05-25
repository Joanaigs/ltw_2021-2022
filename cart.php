<?php

    declare(strict_types = 1);
    require_once('session.php');
    $session = new Session();
    require_once('database/restaurant.class.php');
    require_once ('database/cart.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/cart.tpl.php');

    $db = new PDO('sqlite:example.db');
    $cart = Cart::getCart($db, $session->getId());

    drawHeader($session);
    drawCart($cart);
    drawFooter();

?>