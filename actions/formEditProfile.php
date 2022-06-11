<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../uteis/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/user.class.php');
    require_once(__DIR__ . '/../templates/common.tpl.php');
    require_once(__DIR__ . '/../templates/user.tpl.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta página");
    exit(header("Location: ../index.php"));
}
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
            if($_FILES['image']['name']){
                $dbh = new PDO('sqlite:../example.db');
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
    }else
        $session->addMessage('error', 'Perfil não foi editado');
exit(header('Location: ../pages/profile.php'));
