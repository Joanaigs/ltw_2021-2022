<?php

declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ .'/../database/review.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
$idRestaurant = $_GET['idRestaurant'];

if (isset($_POST["rate"], $_POST["remark"])) {
    $date = date("d-m-Y");
    Review::addReview($db, $idRestaurant, $session->getId(), $_POST["remark"], $date, intval($_POST["rate"]));
}
else
    $session->addMessage('error', "A avaliação não foi adicionada");
header("Location: ../pages/reviews.php?id=$idRestaurant");