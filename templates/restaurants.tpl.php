<?php 
  declare(strict_types = 1);

  require_once(__DIR__.'/../database/restaurant.class.php');



function drawRestaurants(array $restaurants, array $filterRestaurants, PDO $db , Session $session) { ?><!DOCTYPE html>
<div class="grid-container">
    <div class ="sidebar">
        <section id = "typeOfRestaurant">
            <h2>Tipo de Prato:</h2>
            <div id="filter">
                <label><input  class="radio" type="radio" name =filter value="all" checked="checked" />Todos
                </label>
                <?php foreach ($filterRestaurants as $filter) { ?><label>
                    <input  class="radio" type="radio" name =filter value=<?=$filter->name?> /><?=$filter->name?></label>
                <?php } ?>
            </div>
        </section>
    </div>
    <div class="page">
        <section id="restaurants">

        </section>
    </div>
</div>

<?php } ?>
