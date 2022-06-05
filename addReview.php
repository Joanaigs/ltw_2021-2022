<?php

declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('templates/common.tpl.php');
require_once('templates/comments.tpl.php');
require_once('database/user.class.php');
require_once('database/review.class.php');
require_once('database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant = $_GET['idRestaurant'];

if (isset($_POST["rate"], $_POST["remark"])) {
    $date = date("d-m-Y");
    Review::addReview($db, $idRestaurant, $session->getId(), $_POST["remark"], $date, intval($_POST["rate"]));
    header("Location: restaurant.php?id=$idRestaurant");
}