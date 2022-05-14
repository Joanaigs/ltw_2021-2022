<?php
    declare(strict_types=1);

    session_start();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/common.tpl.php');

    $db = getDatabaseConnection();

    drawLoginForm();

    if (isset($_POST['LoginButton'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email != "" && $password != ""){
            $user = User::getUserWithPassword($db, $email, $password);
            if($user == null)
                $error_msg = 'Não existe nenhuma conta com este email associado.';
            else{
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                header('Location: ' . "main_page.php");
            }
        }
        else
            $error_msg = 'Por favor preencha os campos necessários.';
    }
?>