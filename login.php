<?php
    declare(strict_types=1);

    session_start();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('templates/common.tpl.php');

    $db = getDatabaseConnection();
    $success = false;

    drawLoginRegisterForm();

    if (isset($_POST['RegisterButton'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if ($username != "" && $password != "" && $password_confirm != "" && $address != ""){
            if ($password === $password_confirm){
                if ( strlen($password) >= 5 && strpbrk($password, "123456789") != false && strpbrk($password, "abcdefghijklmnopqrstuvwyxz") != false){
                    if(User::getUserWithUsername($db, $username, $email))
                        $error_msg = 'Tente outro.';
                    else {
                        User::addNewUser($success, $db, $username, $email, $password, $phoneNumber, $address, $city, $country);
                    }
                    if ($success)?>
                        A sua conta foi criada com sucesso. <a href="login.php">Clique aqui para iniciar sessão.</a>
                    <?php $error_msg = 'Ocorreu um erro na criação da sua nova conta.';
                }
                else
                    $error_msg = 'A palavra-passe não cumpre os requisitos. Escolha outra.';
            }
            else
                $error_msg = 'As palavras-passe não coincidem.';
        }
        else
            $error_msg = 'Por favor preencha todos os campos necessários.';
    }

    else if (isset($_POST['LoginButton'])) {
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