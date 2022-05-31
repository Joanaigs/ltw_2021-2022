<?php
    require_once('session.php');
    $session = new Session();
    require_once('templates/common.tpl.php');
    require_once('database/connection.db.php');
    require_once('database/restaurant.class.php');
    require_once('database/filter.class.php');
    drawHeader($session);
    $db = getDatabaseConnection();
    $category=Filter::getFilterRestaurants($db);

?>
<form action="" method="post" class="dish" enctype="multipart/form-data">
    <label for="nameRestaurant">Nome:</label>
    <input id="nameRestaurant" type="text" name="nameRestaurant">

    <label for="addressRestaurant">Endereço:</label>
    <input id="addressRestaurant" type="text" name="addressRestaurant">

    <label for="photoRestaurant">Photo:</label>
    <input type="file" name="photoRestaurant" accept="image/png,image/jpeg">

    <label for="restaurantCategory">Categoria:</label>
    <?php foreach ($category as $c) { ?>
        <input class="radio" type="radio" name="restaurantCategory" value=<?=$c->id?>  /> <span><?=$c->name?></span>
    <?php } ?>

    <button type="submit">Salvar</button>
</form>

<?php
if (isset($_POST["nameRestaurant"], $_POST["addressRestaurant"], $_POST['restaurantCategory'])){
    Restaurant::addRestaurants($db, $session->getId(), $_POST["nameRestaurant"], $_POST["addressRestaurant"]);
    $idRestaurant=Restaurant::hasRestaurant($db, $session->getId());
    Filter::addCategoryRestaurant($db, $idRestaurant->id, $_POST['restaurantCategory']);
    header("Location: restView.php?id=$idRestaurant->id");
}

drawFooter();