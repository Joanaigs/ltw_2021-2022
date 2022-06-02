<?php

declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/comment.class.php');
require_once('templates/common.tpl.php');
require_once('templates/comments.tpl.php');
require_once('database/user.class.php');
require_once('database/review.class.php');
require_once('database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant=$_GET['idRestaurant'];
Comment::removeComment($db, intval($_GET['id']));
if($_GET['type']==='0')
    header("Location: reviews.php?id=$idRestaurant");
else
    header("Location: comments.php?id=$idRestaurant");
