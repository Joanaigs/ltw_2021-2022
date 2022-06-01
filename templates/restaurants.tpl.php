<?php 
  declare(strict_types = 1);

  require_once(__DIR__.'/../database/restaurant.class.php');



function drawRestaurants(array $restaurants, array $filterRestaurants, PDO $db , Session $session) { ?><!DOCTYPE html>

    <div class="search1">
            <div class="search-icon1"></div>
            <div class="input">
                <input id="searchRest1" type="text" placeholder="Procurar">
            </div>
            <span class="clear1" onclick="document.getElementById('searchRest1').value=''"></span>
        </section>
        <section id = "typeOfDish">
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
                    <h3>
                        <a href="restaurant.php?id=<?=$res->id?>"><?=$res->name?></a>
                    </h3>

                    <?php if($session->isLoggedIn()){
                        $isFavorite=Restaurant::isfavoriteRestaurant($db, $res->id, $session->getId());

                        if($isFavorite===true){?>
                            <div class="heart liked" id=<?=$res->id?>></div>

                        <?php } else{?><div class="heart" id=<?=$res->id?>></div><?php
                        }}?>
                    <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
                </article>
            <?php }
            ?>
        </section>
    </div>
</div>

<?php } ?>

<?php function drawRestaurant(PDO $db, Restaurant $restaurant, array $dishes, Session $session){?>

    <h1><?= $restaurant -> name?></h1>
    <section id = "dishes">
    <?php $meal=$dishes[0]->meal;?>
    <h2 id="<?=$meal?>"><?=$meal?></h2>
        <?php foreach ($dishes as $dish){?>
                <?php if($dish->meal!=$meal){$meal=$dish->meal;?>
                    <h2 id="<?=$meal?>"><?=$meal?></h2>
                <?php } ?>

                <?php if($session->isLoggedIn()){?>
                    <a href="addToCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>"><div class="button_plus"></div></a>
                    <?php $inCart=Cart::findInCart($db, $dish->id, $session->getId());
                    if($inCart===true){?>
                        <a href="removeFromCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>&cart=false"><div class="button_minus"></div> </a>
                    <?php }} ?>
                <?php if($session->isLoggedIn()){?>
                        <div class="heart" id=<?=$dish->id?>></div><?php
                          $isFavorite=Dish::isfavoriteDish($db, $dish->id, $session->getId());
                          if($isFavorite===true){?>
                              <div class="heart liked" id=<?=$dish->id?>></div>

                      <?php }}?>

                <img src="<?=$dish -> photo?>?id=<?=$dish->id?>" alt="">
                <h3><?= $dish -> name?></h3>
                <p class = "info"> <?= $dish -> price?> €</p>
            </article>
        <?php } ?>
    </section>
<?php }

function drawRestaurantView(PDO $db, int $idRestaurant, array $dishes){
    $restaurant = Restaurant::getRestaurant($db, $idRestaurant);?>
    <h1><?= $restaurant -> name?></h1>
    <div class="erase-restaurant"><button class="erase-restaurant-btn" name="eraseRestaurantButton" onclick="window.location.href = '../eraseRestaurant.php';">Eliminar restaurante</button></div>
    <section id = "dishes">
        <div class="button_plus"><a href="addDish.php?idRestaurant=<?=$idRestaurant?>"></a></div>
        <?php foreach ($dishes as $dish) { ?>
            <a href="editDish.php?idDish=<?=$dish->id?>"><i class="fas fa-pencil"></i></a>
            <a href="removeDish.php?idDish=<?=$dish->id?>&idRestaurant=<?=$idRestaurant?>"><div class="button_minus"></div> </a>
            <img src="https://picsum.photos/600/300?<?=$dish->name?>"alt="">
            <h3><?= $dish -> name?></h3>
            <p class = "info"> <?= $dish -> price?> €</p>
        <?php }?>
    </section>
<?php }?>
