<?php 
  declare(strict_types = 1);

  require_once(__DIR__.'/../database/restaurant.class.php');



function drawRestaurants(array $restaurants, array $filterRestaurants, PDO $db , Session $session) { ?><!DOCTYPE html>
<div class="grid-container">
    <div class ="filter">
        <section id = "typeOfRestaurant">
            <h2>Tipo de Prato:</h2>
            <div id="filter">
                <label><input  class="radio" type="radio" name =filter value="all" checked="checked" />Todos
                </label>
                <?php foreach ($filterRestaurants as $filter) { ?><label>
                    <input  class="radio" type="radio" name =filter value=<?=$filter->name?> /><?=$filter->name?></label>
                <?php } ?>
            </div>
        </section>
    </div>
    <div class="page">
        <section id="restaurants">
            <?php foreach ($restaurants as $res) { ?>
                <article>
                    <?php if($session->isLoggedIn()){
                        $isFavorite=Restaurant::isfavoriteRestaurant($db, $res->id, $session->getId());

                        if($isFavorite===true){?>
                            <div class="heart liked" id=<?=$res->id?>></div>

                        <?php } else{?><div class="heart" id=<?=$res->id?>></div><?php
                        }}?>
                    <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
                    <h3>
                        <a href="../restaurant.php?id=<?=$res->id?>"><?=$res->name?></a>
                    </h3>
                </article>
            <?php }
            ?>
        </section>
    </div>
</div>

<?php } ?>
