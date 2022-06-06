<?php
declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/connection.db.php');
$db = getDatabaseConnection();

$idRest = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRest));
$category = Filter::getFilterRestaurants($db);
$meals = Filter::getMeals($db);
drawRestViewHeader(intval($idRest));
?>
<link rel="stylesheet" href="css/owner_restView.css"/>
<link rel="stylesheet" href="css/profile.css"/>
<form action="updateRestaurant.php?id=<?= $idRest ?>" method="post" class="dish" enctype="multipart/form-data">
    <label for="photoRestaurant">Photo:</label>
    <input type="file" name="image" accept="image/png,image/jpeg">

    <label for="nameRestaurant">Nome:</label>
    <input id="nameRestaurant" type="text" name="nameRestaurant" value="<?= $restaurant->name ?>">

    <label for="addressRestaurant">Endereço:</label>
    <input id="addressRestaurant" type="text" name="addressRestaurant" value="<?= $restaurant->address ?>">

    <?php foreach ($category as $c) { ?>
        <label>
            <input class="radio" type="radio" name="restaurantCategory"
                   value=<?= $c->id ?> <?php if ($restaurant->filt === $c->name) echo "checked" ?>/><span><?= $c->name ?></span>
        </label>
    <?php } ?>

    <button type="submit">Salvar</button>
</form>


<?php
$dishes = Dish::getDishesRestaurant($db, $idRest, $session);
drawRestaurantViewDishes(intval($idRest), $dishes);
drawFooter();

?>
