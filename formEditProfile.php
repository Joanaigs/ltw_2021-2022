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
            }
            if(!empty($_POST['email']))
                $user->email = $_POST['email'];
            if(!empty($_POST['address'])) {
                $user->address = $_POST['address'];
                $session->setAddress($user->address);
            }
            if(!empty($_POST['phoneNumber']))
                $user->phoneNumber = $_POST['phoneNumber'];
            echo $_FILES['image']['name'];
            if($_FILES['image']['name']){
                $dbh = new PDO('sqlite:example.db');
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
                $stmt->execute(array('profile'));
                $id = $dbh->lastInsertId();

                if (!is_dir('images')) mkdir('images');
                if (!is_dir('images/profiles')) mkdir('images/profiles');

                $originalFileName = "images/profiles/$id.jpg";
                move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
                $user->image=intval($id);
            }
            if(!empty($_POST)){
                $user->save($db, $_POST['password'], $_POST['confirm_password']);
                echo('save');
            }
        }
        exit(header('Location: profile.php'));
    }

