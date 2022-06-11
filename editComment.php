<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/comment.class.php');
require_once ('database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem permissões para esta página");
    header("Location: index.php");
}
$db = getDatabaseConnection();

$idRestaurant=$_GET['idRestaurant'];
$idComment = $_GET['idComment'];
if (isset($_POST["edit_comment"])){
    Comment::updateComment($db, intval($idComment), $_POST["edit_comment"]);
}else
    $session->addMessage('error', 'Comentário não foi atualizado');
if($_GET['type']==='0')
    header("Location: reviews.php?id=$idRestaurant");
else
    header("Location: comments.php?id=$idRestaurant");

