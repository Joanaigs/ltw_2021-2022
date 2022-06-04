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
<form action="addRestaurantDatabase.php" method="post" class="dish" enctype="multipart/form-data">
    <label for="nameRestaurant">Nome:</label>
    <input id="nameRestaurant" type="text" name="nameRestaurant">

    <label for="addressRestaurant">Endereço:</label>
    <input id="addressRestaurant" type="text" name="addressRestaurant">

    <label for="imageRestaurant">Imagem:</label>
    <input type="file" name="image" accept="image/png,image/jpeg">

    <label for="restaurantCategory">Categoria:</label>
    <?php foreach ($category as $c) { ?>
        <input class="radio" type="radio" name="restaurantCategory" value=<?=$c->id?>  /> <span><?=$c->name?></span>
    <?php } ?>

    <button type="submit">Salvar</button>
</form>

<?php


drawFooter();