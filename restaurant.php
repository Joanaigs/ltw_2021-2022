<?php

declare(strict_types=1);
require_once('session.php');
$session = new Session();
require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('database/cart.class.php');
require_once('database/comment.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/comments.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/user.class.php');
require_once('database/review.class.php');
require_once('database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
$dishes = Dish::getDishesRestaurant($db, $_GET['id'], $session);
$filterMeals = Filter::getMeals($db);
$filterTypes = Filter::getTypeDish($db);
drawHeader($session);
?>

<div class="grid-container">
    <div class = "side">
        <div class="filters">
            <section id = "meal">
                <h2>Categoria:</h2>
                <?php foreach ($filterMeals as $item){?>
                    <a href="#<?=$item->name?>"><?=$item->name?>  > </a>
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

        <a href="../reviews.php?id=<?=$idRestaurant?>"> Comentários > </a>
    </div>

    <div class="page" id="restaurant-page">
        <h1><?= $restaurant->name ?></h1>
        <h2><?= $restaurant->address ?></h2>
        <section class="dishes" id=<?= $restaurant->id ?>>
        </section>
    </div>


</div>


<?php  drawFooter();?>


