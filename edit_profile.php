<?php

    declare(strict_types=1);

    session_start();

    if (!isset($_SESSION['id'])) die(header('Location: /'));

    require_once('database/connection.db.php');
    require_once('database/user.class.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $_SESSION['id']);

    if ($user) {
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->phoneNumber = $_POST['phoneNumber'];
        $user->address = $_POST['address'];
        $user->city = $_POST['city'];
        $user->country = $_POST['country'];
        $user->postcode = $_POST['postcode'];

        $user->save($db);
    }

    header('Location: profile.php');
