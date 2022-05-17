<?php

declare(strict_types = 1);
session_start();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');


$db = $db = new PDO('sqlite:example.db');
$idRestaurant=$_GET['id'];
$restaurant = Restaurant::getRestaurant($db,$idRestaurant);
$dishes = Dish::getDishesRestaurant($db, $_GET['id']);
$filterMeals = Filter::getMeals($db);
$filterTypes=Filter::getTypeDish($db);
drawHeader();

?>

<h2>Categotia:</h2>
<?php foreach ($filterMeals as $item){?>
    <a href="#<?=$item->name?>"><?=$item->name?></a>
<?php } ?>

</div>
<h2>Tipo de Prato:</h2>
<div id = "typeFilter">
    <input type="radio" name =typeFilter value="all" id="<?=$idRestaurant?>" checked="checked"><label>All</label>
    <?php foreach ($filterTypes as $item){ ?>
        <input type="radio" name ="typeFilter" id="<?=$idRestaurant?>" value=<?=$item->id?> ><label><?=$item->name?></label>
    <?php } ?>
</div>

<?php
drawRestaurant($db, $restaurant, $dishes);
drawFooter();
?>
