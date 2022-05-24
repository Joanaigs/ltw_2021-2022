<?php 
  declare(strict_types = 1); 

  require_once(__DIR__.'/../database/restaurant.class.php');
?>


<?php function drawRestaurants(array $restaurants) { ?><!DOCTYPE html>

    <div class="search1">
            <div class="search-icon1"></div>

            <div class="input">
                <input id="searchRest1" type="text" placeholder="Procurar">
            </div>
            <span class="clear1" onclick="document.getElementById('searchRest1').value=''"></span>
        </div>
        <section id="restaurants">
            <?php foreach ($restaurants as $res) { ?>
                <article>

                    <h3>
                        <a href="restaurant.php?id=<?=$res->id?>"><?=$res->name?></a>
                    </h3>

                    <div class="heart" id=<?=$res->id?>></div>
                    <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
                </article>
            <?php }
            ?>
        </section>

<?php } ?>

<?php function drawRestaurant(PDO $db, Restaurant $restaurant, array $dishes){?>

    <h1><?= $restaurant -> name?></h1>
    <section class= "dishes">
    <?php $meal=$dishes[0]->meal;?>
    <h2 id="<?=$meal?>"><?=$meal?></h2>
        <?php foreach ($dishes as $dish){?>
                <?php if($dish->meal!=$meal){$meal=$dish->meal;?>
                    <h2 id="<?=$meal?>"><?=$meal?></h2>
                <?php } ?>

            <!--

                <?php if(isset( $_SESSION['id'])){?>
                    <a href="addToCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>"><div class="button_plus"></div></a>
                    <?php $inCart=Cart::findInCart($db, $dish->id, $_SESSION['id']);
                    if($inCart===true){?>
                        <a href="removeFromCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>"><div class="button_minus"></div> </a>
                    <?php }} ?>
                <?php if(isset( $_SESSION['id'])){?>
                        <div class="heart" id=<?=$dish->id?>></div><?php
                          $isFavorite=Dish::isfavoriteDish($db, $dish->id, $_SESSION['id']);
                          if($isFavorite===true){?>
                              <div class="heart liked" id=<?=$dish->id?>></div>

                      <?php }}?>

             -->

            <article class="dish">
                <img src="<?=$dish -> photo?>?id=<?=$dish->id?>" alt="">
                <div class="text">
                    <h3><?= $dish -> name?></h3>
                    <p class = "info">Preço:  <?= $dish -> price?> €</p>
                </div>
            </article>
        <?php } ?>
    </section>
<?php } ?>