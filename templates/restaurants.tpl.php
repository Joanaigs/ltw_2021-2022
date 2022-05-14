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
        <?php }
        ?>
    </section>
<?php } ?>