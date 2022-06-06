<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/review.class.php');
require_once ('database/connection.db.php');

$db = getDatabaseConnection();

$idRestaurant=$_GET['idRestaurant'];
$idReview = $_GET['idReview'];
echo $_POST["rating"];
if (isset($_POST["edit_review"], $_POST["rating"])){
    Review::updateReview($db, intval($idReview), $_POST["edit_review"], intval($_POST["rating"]));
}
header("Location: reviews.php?id=$idRestaurant");

