<?php

declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once('database/dish.class.php');
require_once('database/filter.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');


$db = $db = new PDO('sqlite:example.db');

$restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
$dishes = Dish::getDishesRestaurant($db, intval($_GET['id']));
$filterItems = Filter::getFilterItems($db);

drawHeader();

?>

<h2>Filter</h2>

<div class = "filter">
    <?php foreach ($filterItems as $item){ ?>
        <input type="checkbox" id = "option-<?=$item->name?>">
        <label for = "option-<?=$item->name?>"><?=$item -> name?></label>
    <?php } ?>
</div>

<script src="scriptsRestaurantFilter.js"></script>



<?php
drawRestaurant($restaurant,$dishes);
drawFooter();
?>
