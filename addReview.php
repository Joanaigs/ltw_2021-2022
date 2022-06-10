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
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta págian");
    header("Location: index.php");
}
$db = getDatabaseConnection();
$idRestaurant = $_GET['idRestaurant'];

if (isset($_POST["rate"], $_POST["remark"])) {
    $date = date("d-m-Y");
    Review::addReview($db, $idRestaurant, $session->getId(), $_POST["remark"], $date, intval($_POST["rate"]));
}
else
    $session->addMessage('error', "A avaliação n foi adicionada");
header("Location: reviews.phsp?id=$idRestaurant");