<?php

declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ .'/../templates/comments.tpl.php');
require_once(__DIR__ .'/../database/user.class.php');
require_once(__DIR__ .'/../database/review.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error', "Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
if ( preg_match ("/\D/", $_GET['idRestaurant']) || preg_match ("/\D/", $_GET['id']) || preg_match ("/\D/", $_GET['type'])) {
    $session->addMessage('error', "Não conseguiu abrir a página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
$idRestaurant = $_GET['idRestaurant'];
if (isset($_POST["comment"])) {
    $name = preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST['comment']);
    $date = date("d-m-Y");
    Comment::addComment($db, intval($_GET['id']), intval($_GET['type']), $date, $name);
} else
    $session->addMessage('error', 'Nenhum comentário adicionado');
if ($_GET['type'] === '0')
    header("Location: ../pages/reviews.php?id=$idRestaurant");
else
    header("Location: ../pages/comments.php?id=$idRestaurant");
