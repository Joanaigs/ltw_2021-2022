<?php
declare(strict_types = 1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idRestaurant=$_GET['idRestaurant'];
drawRestViewHeader($idRestaurant);
$dishes=Dish::getDishesRestaurant($db, $idRestaurant, $session);
$meals=Filter::getMeals($db);
$typeDishes=Filter::getTypeDish($db);

?>
<form action="addDishDatabase.php?idRestaurant=<?=$idRestaurant?>" method="post" class="dish" enctype="multipart/form-data">
    <label for="imageRestaurant">Imagem:</label>
    <input type="file" name="image" accept="image/png,image/jpeg">

    <label for="nameDish">Name:</label>
    <input id="nameDish" type="text" name="nameDish">

    <label for="priceDish">Price:</label>
    <input id="priceDish" type="text" name="priceDish">

    <label for="mealDish">Categoria:</label>
    <?php foreach ($meals as $meal) { ?>
        <input class="radio" type="radio" name="mealDish" value=<?=$meal->id?>  /> <span><?=$meal->name?></span>
    <?php } ?>
    <label for="mealDish">Tipo de refeição:</label>
    <?php foreach ($typeDishes as $type) { ?>
        <input class="radio" type="radio" name="typeDish" value=<?=$type->id?> /> <span><?=$type->name?></span>
    <?php } ?>

    <button type="submit">Salvar</button>
</form>




drawFooter();

?>

