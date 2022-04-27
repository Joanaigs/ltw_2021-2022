<?php
  declare(strict_types = 1);

  require_once('database/restaurant.class.php');
  require_once ('database/filter.class.php');
  require_once('templates/common.tpl.php');
  $db = $db = new PDO('sqlite:example.db');

  $restaurants = Restaurant::getRestaurants($db);
  $filterRestaurants= Filter::getFilterRestaurants($db);
  drawHeader();
  //drawFilter($filterRestaurants);
  ?>
    <section id="filterRestaurant">
        <?php foreach ($filterRestaurants as $filt) { ?>
            <header>
                <input type="checkbox" name="vehicle" value="Bike"><a href="item.html"><?=$filt->name?></a>
            </header>
        <?php } ?>
    </section>
  <section id="Restaurants">
        <?php foreach ($restaurants as $res) { ?>
            <header>
                 <h1><a href="item.html"><?=$res['name']?></a></h1>
            </header>
            <img src="https://picsum.photos/600/300?.<?=$res['name']?>"alt="">
        <?php } ?>
    </section>
    <?php
  drawFooter();
?>