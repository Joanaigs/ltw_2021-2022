<?php

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/user.class.php');

$db = getDatabaseConnection();
$success = false;

if (isset($_POST['RegisterButton'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($username !== "" && $password !== "" && $password_confirm !== "" && $address !== "") {
        if ($password === $password_confirm) {
            if (strlen($password) >= 5 && strpbrk($password, "123456789") != false && strpbrk($password, "abcdefghijklmnopqrstuvwyxz") != false) {
                if(preg_match('/^[0-9]{9}+$/', $phoneNumber)){
                    if (!User::getUserWithEmail($session, $db, $username, $email)) {
                        User::addNewUser($success, $db, $username, $email, $password, $phoneNumber, $address, $city, $country);
                        $session->addMessage('success', 'Conta criada com sucesso.');
                        exit(header("Location: ../pages/login_register.php"));
                    }
                }
                $session->addMessage('error', 'Introduza um número de telefone válido.');
            } else
                $session->addMessage('error', 'A palavra-passe não cumpre os requisitos. Escolha outra.');
        } else
            $session->addMessage('error', 'As palavras-passe não coincidem.');
    } else
        $session->addMessage('error', 'Por favor preencha todos os campos necessários.');
} else if (isset($_POST['LoginButton'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email !== "" && $password !== "") {
        $user = User::getUserWithPassword($session, $db, $email, $password);
        if ($user !== null) {
            $session->setId($user->id);
            $session->setUsername($user->username);
            $session->setAddress($user->address);
            exit(header("Location: ../index.php"));
        }
    } else
        $session->addMessage('error', 'Por favor preencha os campos necessários.');
}
exit(header("Location: ../pages/login_register.php"));
