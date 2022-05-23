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
        <script src="../javascript/restaurantSearch.js"></script>
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

    <h1><?= $restaurant -> name?></h1>
    <section id = "dishes">
    <?php $meal=$dishes[0]->meal;?>
    <h2 id="<?=$meal?>"><?=$meal?></h2>
        <?php foreach ($dishes as $dish){?>
                <?php if($dish->meal!=$meal){$meal=$dish->meal;?>
                    <h2 id="<?=$meal?>"><?=$meal?></h2>
                <?php } ?>
            <article class="dish">
                <?php if(isset( $_SESSION['id'])){
                          $isFavorite=Dish::isfavoriteDish($db, $dish->id, $_SESSION['id']);
                          if($isFavorite===true){?>
                              <span class="heart liked" id=<?=$dish->id?>></span>
                      <?php }}
                      else{?>
                        <span class="heart" id=<?=$dish->id?>></span>
                    <?php } ?>
                <span class="heart" id=<?=$dish->id?>></span>
                <span class="addToCard" id=<?=$dish->id?>></span>
                <img src="<?=$dish -> photo?>?id=<?=$dish->id?>" alt="">
                <h3><?= $dish -> name?></h3>
                <p class = "info"> <?= $dish -> price?> €</p>
            </article>
        <?php } ?>
    </section>
<?php } ?>