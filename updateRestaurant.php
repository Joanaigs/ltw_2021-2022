<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/user.class.php');
$db = getDatabaseConnection();

$idRest = $_GET['id'];
if (isset($_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'])) {
    Restaurant::updateRestaurants($db, intval($idRest), $_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory']);
    header("Location: restView.php?id=$idRest");
    exit();
} else {
    header("Location: editRestaurant.php?id=<?=$idRest?>");
    exit();
}

?>
