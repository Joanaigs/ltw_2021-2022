<?php
declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once ('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idRestaurant=$_GET['idRestaurant'];
drawRestViewHeader();
$dishes=Dish::getDishesRestaurant($db, $idRestaurant);
$meals=Filter::getMeals($db);
$typeDishes=Filter::getTypeDish($db);

?>
<form action="addDish.php?idRestaurant=<?=$idRestaurant?>" method="post" class="dish" enctype="multipart/form-data">
    <label for="photoDish">Photo:</label>
    <input type="file" name="photoDish" accept="image/png,image/jpeg">

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
<div name="addDish">Nenhum prato adicionado</div>

<?php
if (isset($_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], $_POST['typeDish'])){
    echo 2;
    Dish::addDish($db, $_POST["nameDish"], $_POST["priceDish"], $_POST['mealDish'], $idRestaurant, $_POST['typeDish']);
    header("Location: restView.php?id=$idRestaurant");
}

drawFooter();

?>

