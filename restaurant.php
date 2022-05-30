<?php

declare(strict_types = 1);
require_once('session.php');
$session = new Session();
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
drawHeader($session);

?>
<div class="grid-container">
    <div class = "filter">
        <section id = "meal">
            <h2>Categoria:</h2>
            <?php foreach ($filterMeals as $item){?>
                <a href="#<?=$item->name?>"><?=$item->name?></a>
            <?php } ?>
        </section>

        <section id = "typeOfDish">
            <h2>Tipo de Prato:</h2>
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
        drawRestaurant($db, $restaurant, $dishes, $session);
        ?>
    </div>

</div>
<?php drawFooter();?>


