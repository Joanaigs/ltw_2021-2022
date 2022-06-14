<?php
declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['idReview'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant=$_GET['idRestaurant'];
$idReview = $_GET['idReview'];
echo $_POST["rating"];
if (isset($_POST["edit_review"], $_POST["rating"])){
    $rate=preg_replace("/[^\d,.]/", '', $_POST['rating']);
    $remark=preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST['edit_review']);
    Review::updateReview($db, intval($idReview), $remark, intval($rate));
}
else
    $session->addMessage('error', 'Avaliação não foi editada');
header("Location: ../pages/reviews.php?id=$idRestaurant");

