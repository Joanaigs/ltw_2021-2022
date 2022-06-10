<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/review.class.php');
require_once ('database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta págian");
    header("Location: index.php");
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
header("Location: reviews.php?id=$idRestaurant");

