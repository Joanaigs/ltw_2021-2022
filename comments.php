<?php

declare(strict_types=1);
require_once('session.php');
$session = new Session();

require_once('database/restaurant.class.php');
require_once('database/comment.class.php');
require_once('database/cart.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/comments.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/user.class.php');
require_once('database/review.class.php');
require_once('database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
if ($session->getId() == $restaurant->idUser) {
    $reviews = Review::getReview($db, $idRestaurant);
    drawRestViewHeader($idRestaurant);
    drawComments($reviews, $db, $session, 1);
    drawFooter();
}
else{
    header("Location: index.php");
}
