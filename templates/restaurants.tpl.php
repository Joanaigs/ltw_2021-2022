<?php 
  declare(strict_types = 1); 

  require_once('database/restaurant.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <section id="Restaurants">
        <?php foreach ($restaurants as $res) { ?>
            <header>
                <h1><a href="item.html"><?=$res['name']?></a></h1>
            </header>
            <img src="https://picsum.photos/600/300?.<?=$res['name']?>"alt="">
        <?php } ?>
    </section>
<?php } ?>