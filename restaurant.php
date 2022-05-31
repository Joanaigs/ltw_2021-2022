<?php

declare(strict_types = 1);
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
require_once ('database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant=$_GET['id'];
$restaurant = Restaurant::getRestaurant($db,intval($idRestaurant));
$dishes = Dish::getDishesRestaurant($db, $_GET['id'], $session);
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
        <h1><?= $restaurant -> name?></h1>
        <section class = "dishes" id=<?= $restaurant -> id?>>
        </section>
    </div>
</div>
<?php
$reviews=Review::getReview($db, $idRestaurant);
?> <h1>Avaliações e comentários </h1> <?php
drawComments($reviews, $db, $session, 0);
if($session->isLoggedIn()){?>
<h1>Adicionar avaliação:</h1>
<form action="addReview.php?idRestaurant=<?=$idRestaurant?>" method="post" class="review" enctype="multipart/form-data">
    <div class="rate">
        <input type="radio" id="star5" name="rate" value=5 />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value=4/>
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value=3/>
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value=2/>
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value=1 />
        <label for="star1" title="text">1 star</label>
        <input type="radio" id="star0" name="rate" value=0 checked/>
        <label for="star0" title="text">0 star</label>
    </div>
    <p></p>
    <textarea class="form-control" rows="5" placeholder="Escreve aqui a tua review..." name="remark" id="remark" required></textarea><br>

    <button type="submit">Submeter</button>
</form>
<?php } drawFooter();?>

