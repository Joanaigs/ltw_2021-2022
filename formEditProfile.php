<?php

    declare(strict_types=1);

    require_once('session.php');
    $session = new Session();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/user.tpl.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());

    if(isset($_POST['saveEdit'])){
        if ($user) {
            if(!empty($_POST['username'])) {
                $user->username = $_POST['username'];
                $session->setUsername($user->username);
                echo($_POST['username']);
            }
            if(!empty($_POST['email']))
                $user->email = $_POST['email'];
            if(!empty($_POST['address']))
                $user->address = $_POST['address'];
            if(!empty($_POST['phoneNumber']))
                $user->phoneNumber = $_POST['phoneNumber'];
            if(!empty($_POST)){
                $user->save($db, $_POST['password'], $_POST['confirm_password']);
                echo('save');
            }
        }
        exit(header('Location: profile.php'));
    }

