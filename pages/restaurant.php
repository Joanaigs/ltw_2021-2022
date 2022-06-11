<?php

declare(strict_types=1);
require_once(__DIR__ . '/../uteis/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/comments.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant = $_GET['id'];
$restaurant = Restaurant::getRestaurant($db, intval($idRestaurant));
$dishes = Dish::getDishesRestaurant($db, $_GET['id'], $session);
$filterMeals = Filter::getMeals($db);
$filterTypes = Filter::getTypeDish($db);
drawHeader($session, $hasSearch = true);
?>

<div class="grid-container" id="restaurantPage">
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
                        <input type="radio" name ="typeFilter" id="<?=$idRestaurant?>" value=<?=$item->id?>> <?=$item->name?><i class="fa-solid fa-up-from-bracket"></i>
                    </label>
                <?php } ?>
            </section>
        </div>

        <a class="comments" href="../pages/reviews.php?id=<?=$idRestaurant?>"> Comentários > </a>
    </div>

    <div class="page" id="restaurant-page">
        <h1><?= $restaurant->name ?></h1>
        <h2><?= $restaurant->address ?></h2>
        <section class="dishes" id=<?= $restaurant->id ?>>
        </section>
    </div>


</div>


<?php  drawFooter();?>


