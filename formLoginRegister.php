<?php

    require_once('session.php');
    $session = new Session();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/common.tpl.php');


    $db = getDatabaseConnection();
    $success = false;

    if (isset($_POST['RegisterButton'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if ($username !== "" && $password !== "" && $password_confirm !== "" && $address !== ""){
            if ($password === $password_confirm){
                if ( strlen($password) >= 5 && strpbrk($password, "123456789") != false && strpbrk($password, "abcdefghijklmnopqrstuvwyxz") != false){
                    if(User::getUserWithEmail($session, $db, $username, $email))
                        $session->addMessage('error', 'Tente outro.');
                    else {
                        User::addNewUser($success, $db, $username, $email, $password, $phoneNumber, $address, $city, $country);
                        $session->addMessage('success', 'Conta criada com sucesso.');
                        exit(header("Location: /login_register_action.php"));
                    }
                    if (!$success)
                        $session->addMessage('error', 'Ocorreu um erro na criação da sua nova conta.');
                }
                else
                    $session->addMessage('error', 'A palavra-passe não cumpre os requisitos. Escolha outra.');
            }
            else
               $session->addMessage('error', 'As palavras-passe não coincidem.');
        }
        else
            $session->addMessage('error', 'Por favor preencha todos os campos necessários.');
    }

else if (isset($_POST['LoginButton'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email !== "" && $password !== ""){
        $user = User::getUserWithPassword($session, $db, $email, $password);
        if($user == null)
            $session->addMessage('error', 'Não existe nenhuma conta com este email associado.');
        else{
            $session->setId($user->id);
            $session->setUsername($user->username);
            $session->addMessage('success', 'Sessão iniciada');
            exit(header("Location: /main_page.php"));
        }
    }
    else
        $session->addMessage('error', 'Por favor preencha os campos necessários.');
}
