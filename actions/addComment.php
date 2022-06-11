<?php

declare(strict_types=1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ .'/../templates/comments.tpl.php');
require_once(__DIR__ .'/../database/user.class.php');
require_once(__DIR__ .'/../database/review.class.php');
require_once(__DIR__ .'/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error', "Não tem premissões para esta página");
    header("Location: ../index.php");
}
$db = getDatabaseConnection();
$idRestaurant = $_GET['idRestaurant'];
if (isset($_POST["comment"])) {
    $date = date("d-m-Y");
    Comment::addComment($db, intval($_GET['id']), intval($_GET['type']), $date, $_POST["comment"]);
} else
    $session->addMessage('error', 'Nenhum comentário adicionado');
if ($_GET['type'] === '0')
    header("Location: ../pages/reviews.php?id=$idRestaurant");
else
    header("Location: ../pages/comments.php?id=$idRestaurant");
