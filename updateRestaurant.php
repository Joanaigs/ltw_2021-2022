<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/user.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para esta págian");
    header("Location: index.php");
}
$dbh = getDatabaseConnection();

$idRest = $_GET['id'];
if (isset($_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'])) {
    if ($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameRestaurant"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('images')) mkdir('images');
        if (!is_dir('images/restaurants')) mkdir('images/restaurants');

        $originalFileName = "images/restaurants/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Restaurant::updateRestaurants($dbh, intval($idRest), $_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'], $id);
        header("Location: restView.php?id=$idRest");
    } else {
        Restaurant::updateRestaurants($dbh, intval($idRest), $_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'], null);
        header("Location: restView.php?id=$idRest");
    }
} else {
    header("Location: restView.php?id=$idRest");
    exit();
}

?>
