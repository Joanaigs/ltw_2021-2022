<?php

declare(strict_types = 1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant=$_GET['idRestaurant'];
Comment::removeComment($db, intval($_GET['id']));
if($_GET['type']==='0')
    header("Location: ../pages/reviews.php?id=$idRestaurant");
else
    header("Location: ../pagescomments.php?id=$idRestaurant");
