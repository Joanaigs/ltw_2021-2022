<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../database/connection.db.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$db = getDatabaseConnection();
$idDish = $_GET['idDish'];
$idRestaurant = $_GET['idRestaurant'];
Dish::removeDish($db, $idDish);
header("Location: ../pages/restView.php?id=$idRestaurant");


drawFooter();

?>
