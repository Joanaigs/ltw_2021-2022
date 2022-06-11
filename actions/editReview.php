<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();

$idRestaurant=$_GET['idRestaurant'];
$idReview = $_GET['idReview'];
echo $_POST["rating"];
if (isset($_POST["edit_review"], $_POST["rating"])){
    Review::updateReview($db, intval($idReview), $_POST["edit_review"], intval($_POST["rating"]));
}
else
    $session->addMessage('error', 'Avaliação não foi editada');
header("Location: ../pages/reviews.php?id=$idRestaurant");

