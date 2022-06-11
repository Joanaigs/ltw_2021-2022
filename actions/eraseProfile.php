<?php

require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../actions/logout_action.php');
require_once(__DIR__ . '/../database/user.class.php');
$db = getDatabaseConnection();
User::deleteUser($db, $session->getId());

header("Location: ../actions/logout_action.php");


