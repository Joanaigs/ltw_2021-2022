<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('templates/common.tpl.php');
require_once('templates/comments.tpl.php');
require_once('database/user.class.php');
require_once('database/review.class.php');
require_once('database/connection.db.php');

$db = getDatabaseConnection();
$idReview=$_GET['id'];
$idRestaurant=$_GET['idRestaurant'];
Review::removeReview($db, intval($idReview));
header("Location: reviews.php?id=$idRestaurant");