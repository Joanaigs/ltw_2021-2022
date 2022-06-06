<?php

require_once('session.php');
$session = new Session();
require_once('logout_action.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();
User::deleteUser($db, $session->getId());

header("Location: logout_action.php");


