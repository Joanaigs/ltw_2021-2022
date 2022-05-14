<?php
    declare(strict_types = 1);

    session_start();
    session_destroy();

    echo "ola";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>