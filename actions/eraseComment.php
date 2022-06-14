<?php

declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['id'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$idRestaurant=$_GET['idRestaurant'];
Comment::removeComment($db, intval($_GET['id']));
if($_GET['type']==='0')
    header("Location: ../pages/reviews.php?id=$idRestaurant");
else
    header("Location: ../pagescomments.php?id=$idRestaurant");
