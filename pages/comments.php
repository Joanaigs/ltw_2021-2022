<?php

declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/comments.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['id'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
if ($session->getId() == $restaurant->idUser) {
    $reviews = Review::getReview($db, $idRestaurant);
    drawRestViewHeader($idRestaurant);
    if (empty($reviews)){ ?>
        <h3 id="empty-reviews">Ainda não tem comentários e avaliações...</h3>
    <?php }
    drawComments($reviews, $db, $session, 1);
    drawFooter();
}
else{
    header("Location: ../index.php");
}
