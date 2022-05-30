<?php

    declare(strict_types=1);

    require_once('session.php');
    $session = new Session();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/user.tpl.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());

    editProfileForm($user);

    if(isset($_POST['saveEdit'])){
        if ($user) {
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->address = $_POST['address'];
            $user->phoneNumber = $_POST['phoneNumber'];
            $user->save($db, $_POST['password'], $_POST['confirm_password']);
            $session->setUsername($user->username);
        }
        header('Location: profile.php');
    }

