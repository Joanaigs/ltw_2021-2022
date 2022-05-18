<?php

    declare(strict_types=1);

    session_start();

    //if (!isset($_SESSION['id'])) die(header('Location: /'));

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/user.tpl.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $_SESSION['id']);

    editProfileForm($user);

    if ($user) {
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->address = $_POST['address'];
        $user->phoneNumber = $_POST['phoneNumber'];
        $user->save($db, $_POST['password'], $_POST['confirm_password']);
    }

    header('Location: profile.php');
