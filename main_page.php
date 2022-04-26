<?php
  declare(strict_types = 1);

  require_once('database/restaurant.class.php');
  require_once('templates/common.tpl.php');
  $db = $db = new PDO('sqlite:example.db');

  $restaurants = Restaurant::getRestaurants($db);
  drawHeader();
  ?>
  <section id="news">
        <?php foreach ($restaurants as $res) { ?>
            <header>
                 <h1><a href="item.html"><?=$res['name']?></a></h1>
            </header>
            <img src=<?=$res['image']?> alt="">
        <?php } ?>
    </section>
    <?php
  drawFooter();
?>