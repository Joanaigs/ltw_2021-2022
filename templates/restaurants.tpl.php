<?php 
  declare(strict_types = 1); 

  require_once('database/restaurant.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
    <section id="news">
        <?php foreach ($restaurants as $res) { ?>
            <header>
                 <h1><a href="item.html"><?=$res['name']?></a></h1>
            </header>
            <img src=<?=$res['image']?> alt="">
        <?php } ?>
    </section>
<?php } ?>