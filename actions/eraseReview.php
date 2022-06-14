<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['id'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idReview=$_GET['id'];
$idRestaurant=$_GET['idRestaurant'];
Review::removeReview($db, intval($idReview));
header("Location: ../pages/reviews.php?id=$idRestaurant");