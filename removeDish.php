<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/user.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta págian");
    header("Location: index.php");
}
$db = getDatabaseConnection();
$idDish = $_GET['idDish'];
$idRestaurant = $_GET['idRestaurant'];
Dish::removeDish($db, $idDish);
header("Location: restView.php?id=$idRestaurant");


drawFooter();

?>
