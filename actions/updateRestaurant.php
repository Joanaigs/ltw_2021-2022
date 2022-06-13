<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/user.class.php');
if ($session->getcsrf() !== $_POST['csrf']) {
    $session->addMessage('error',"Não tem premissões para aceder a esta página");
    exit(header("Location: ../index.php"));
}
$dbh = getDatabaseConnection();

$idRest = $_GET['id'];
if (isset($_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'])) {
    $name = preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST["nameRestaurant"]);
    $address = preg_replace("/[^A-zÀ-ú\d\s.!?:)(%;+-]/", '', $_POST["addressRestaurant"]);
    $category = preg_replace("/\D/", '', $_POST['restaurantCategory']);
    if ($_FILES['image']['name']) {
        // Insert image data into database
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array($_POST["nameRestaurant"]));
        $id = $dbh->lastInsertId();

        if (!is_dir('../images')) mkdir('../images');
        if (!is_dir('../images/restaurants')) mkdir('../images/restaurants');

        $originalFileName = "../images/restaurants/$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
        Restaurant::updateRestaurants($dbh, intval($idRest), $name, $address, $category, $id);
        header("Location: ../pages/restView.php?id=$idRest");
    } else {
        Restaurant::updateRestaurants($dbh, intval($idRest), $name, $address, $category, null);
        header("Location: ../pages/restView.php?id=$idRest");
    }
} else {
    header("Location: ../pages/restView.php?id=$idRest");
    exit();
}

?>
