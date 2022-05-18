<?php
declare(strict_types = 1);
session_start();
require_once('../database/restaurant.class.php');
require_once('../database/filter.class.php');
require_once('../templates/common.tpl.php');
require_once('../templates/restaurants.tpl.php');
$db = new PDO('sqlite:../example.db');

if (isset($_SESSION['id'])){
    if($_GET['add']=="true"){
        Dish::addfavoriteDish($db, $_GET['id'],$_SESSION['id']);
    }

    else{
        Dish::removefavoriteDish($db, $_GET['id'],$_SESSION['id']);
    }
}

echo json_encode("hi");
?>