<?php
  declare(strict_types = 1);

  require_once('session.php');
  $session = new Session();

  require_once('database/restaurant.class.php');
  require_once ('database/filter.class.php');
  require_once('templates/common.tpl.php');
  require_once('templates/restaurants.tpl.php');
  $db = new PDO('sqlite:example.db');

  $restaurants = Restaurant::getRestaurants($db);
  $filterRestaurants= Filter::getFilterRestaurants($db);
  drawHeader($session);
  ?>
  <div id="filter">
      <input type="radio" name =filter value="all" checked="checked"><label>All</label>
        <?php foreach ($filterRestaurants as $filter) { ?>
            <input type="radio" name =filter value=<?=$filter->name?> ><label><?=$filter->name?></label>
                    <?php } ?>
    </div>
<?php

  drawRestaurants($restaurants, $db, $session);
  drawAboutUs();
?>