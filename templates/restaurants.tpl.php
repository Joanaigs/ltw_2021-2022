<?php 
  declare(strict_types = 1); 

  require_once('database/restaurant.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <header>
        <h2>Restaurantes</h2>
        <input id="searchrest" type="text" placeholder="search">
    </header>
    <section id="restaurants">
        <?php foreach ($restaurants as $res) { ?>
            <article>
                <header>
                    <a href="item.html"><?=$res->name?></a>
                </header>
                <div class="heart" id=<?=$res->id?>></div>
                <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
            </article>
        <?php }?>
    <?php } ?>


<?php function drawRestaurant(Restaurant $restaurant, array $dishes){?>

    <h2><?= $restaurant -> name?></h2>
    <section id = "dishes">
    <?php $meal=$dishes[0]->meal;?>
    <h3 id="<?=$meal?>"><?=$meal?></h3>
        <?php foreach ($dishes as $dish){?>
            <article>
                <?php if($dish->meal!=$meal){$meal=$dish->meal;?>
                    <h3 id="<?=$meal?>"><?=$meal?></h3>
                <?php } ?>
                <div class="heart" id=<?=$dish->id?>></div>
                <img src="<?=$dish -> photo?>?id=<?=$dish->id?>" alt="">
                <h4><?= $dish -> name?></h4>
                <p class = "info"> <?= $dish -> price?></p>
            </article>

        <?php } ?>
    </section>
<?php } ?>