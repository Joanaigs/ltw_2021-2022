<?php
    declare(strict_types=1);

    session_start();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/common.tpl.php');

    $db = getDatabaseConnection();

    drawRegisterForm();

    $user = User::getUserWithPassword($db, $_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>