<?php

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../actions/logout_action.php');
require_once(__DIR__ . '/../database/user.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
else{
$db = getDatabaseConnection();
User::deleteUser($db, $session->getId());

header("Location: ../actions/logout_action.php");}


