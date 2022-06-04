<?php
declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once ('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idDish=$_GET['idDish'];
$meals=Filter::getMeals($db);
$dish=Dish::getDish($db, $idDish);
$typeDishes=Filter::getTypeDish($db);
drawRestViewHeader($dish->idRestaurant);
?>
<form action="editDishDatabase.php?idRestaurant=<?=$dish->idRestaurant?>&idDish=<?=$idDish?>" method="post" class="dish" enctype="multipart/form-data">
    <label for="imageRestaurant">Imagem:</label>
    <input type="file" name="image" accept="image/png,image/jpeg">

    <label for="nameDish">Name:</label>
    <input id="nameDish" type="text" name="nameDish" value="<?=$dish->name?>">

    <label for="priceDish">Price:</label>
    <input id="priceDish" type="text" name="priceDish" value="<?=$dish->price?>">

    <label for="mealDish">Categoria:</label>
    <?php foreach ($meals as $meal) { ?>
        <input class="radio" type="radio" name="mealDish" value=<?=$meal->id?> <?php if($dish->idMeal  === $meal->id) echo "checked"?> /> <span><?=$meal->name?></span>
    <?php } ?>
    <label for="mealDish">Tipo de refeição:</label>
    <?php foreach ($typeDishes as $type) { ?>
        <input class="radio" type="radio" name="typeDish" value=<?=$type->id?> <?php if($dish->idTypeOfDish  === $type->id) echo "checked"?> /> <span><?=$type->name?></span>
    <?php } ?>

    <button type="submit">Salvar</button>
</form>
<div name="addDish">Nenhum prato adicionado</div>

<?php

drawFooter();

?>
