<?php 
  declare(strict_types = 1); 

  require_once(__DIR__.'/../database/restaurant.class.php');
?>


<?php function drawRestaurants(array $restaurants) { ?><!DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Larica-Food Delivery Website</title>

    </head>
    <body>
        <div class="search">
            <div class="search-icon"></div>
            <div class="input">
                <input id="searchRest" type="text" placeholder="Procurar">
            </div>
            <span class="clear" onclick="document.getElementById('searchRest').value=''"></span>
        </div>
        <section id="restaurants">
            <?php foreach ($restaurants as $res) { ?>
                <article>
                    <header>
                        <a href="restaurant.php?id=<?=$res->id?>"><?=$res->name?></a>
                    </header>
                    <div class="heart" id=<?=$res->id?>></div>
                    <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
                </article>
            <?php }
            ?>
        </section>

<?php } ?>

<?php function drawRestaurant(PDO $db, Restaurant $restaurant, array $dishes){?>

    <h2><?= $restaurant -> name?></h2>
    <section id = "dishes">
    <?php $meal=$dishes[0]->meal;?>
    <h3 id="<?=$meal?>"><?=$meal?></h3>
        <?php foreach ($dishes as $dish){?>
            <article>
                <?php if($dish->meal!=$meal){$meal=$dish->meal;?>
                    <h3 id="<?=$meal?>"><?=$meal?></h3>
                <?php } ?>
                <a href="addToCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>"><div class="button_plus"></div></a>
                <?php if(isset( $_SESSION['id'])){
                    $inCart=Cart::findInCart($db, $dish->id, $_SESSION['id']);
                    if($inCart===true){?>
                        <a href="removeFromCart.php?idDish=<?=$dish->id?>&idRestaurant=<?=$restaurant->id?>"><div class="button_minus"></div> </a>
                    <?php }} ?>
                <?php if(isset( $_SESSION['id'])){
                          $isFavorite=Dish::isfavoriteDish($db, $dish->id, $_SESSION['id']);
                          if($isFavorite===true){?>
                              <div class="heart liked" id=<?=$dish->id?>></div>
                      <?php }}
                      else{?>
                        <div class="heart" id=<?=$dish->id?>></div>
                    <?php } ?>
                <div class="heart" id=<?=$dish->id?>></div>
                <img src="<?=$dish -> photo?>?id=<?=$dish->id?>" alt="">
                <h4><?= $dish -> name?></h4>
                <p class = "info"> <?= $dish -> price?></p>
            </article>

        <?php } ?>
    </section>

<?php } ?>