<?php
declare(strict_types = 1);
require_once('../session.php');
$session = new Session();
require_once('../database/filter.class.php');
$db = new PDO('sqlite:../example.db');
$meals = Filter::getMeals($db);
echo json_encode($meals);
?>