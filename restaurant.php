<?php

declare(strict_types = 1);
session_start();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('database/cart.class.php');
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
<div class="grid-container">
    <div class = "filter">
        <section id = "meal">
            <h3>Categoria:</h3>
            <ul class="sidebar-options">
            <?php foreach ($filterMeals as $item){?>
                <li> <a href="#<?=$item->name?>"><?=$item->name?> > </a></li>
            <?php } ?>
            </ul>
        </section>

        <section id = "typeOfDish">
            <h3>Tipo de Prato:</h3>
            <label>
                <input type="radio" name =typeFilter value="todos" id="<?=$idRestaurant?>" checked="checked"> Todos
            </label>

            <?php foreach ($filterTypes as $item){ ?>
                <label>
                    <input type="radio" name ="typeFilter" id="<?=$idRestaurant?>" value=<?=$item->id?>> <?=$item->name?>
                </label>
            <?php } ?>
        </section>
    </div>

    <div class="page">
        <?php
        drawRestaurant($db, $restaurant, $dishes);
        ?>
    </div>

</div>
<?php drawFooter();?>


