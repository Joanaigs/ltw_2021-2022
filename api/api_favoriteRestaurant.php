<?php
declare(strict_types = 1);
session_start();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/filter.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ .'/../database/connection.db.php');
$db = getDatabaseConnection();

if (isset($_SESSION['id'])){
    if($_GET['add']=="true"){
        Restaurant::addfavoriteRestaurants($db, $_GET['id'],$_SESSION['id']);
    }

    else{
        Restaurant::removefavoriteRestaurants($db, $_GET['id'],$_SESSION['id']);
    }
}

echo json_encode("hi");
?>