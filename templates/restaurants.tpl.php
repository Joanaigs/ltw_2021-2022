<?php 
  declare(strict_types = 1);

  require_once(__DIR__.'/../database/restaurant.class.php');



function drawRestaurants(array $restaurants, array $filterRestaurants, PDO $db , Session $session) { ?><!DOCTYPE html>
<div class="grid-container">
    <div class ="filter">
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

<?php }


function drawRestaurantView(PDO $db, int $idRestaurant, array $dishes){
    $restaurant = Restaurant::getRestaurant($db, $idRestaurant);?>
        <div class="container-restOwner">
    <h1><?= $restaurant -> name?></h1>
    <div class="erase-restaurant"><button class="erase-restaurant-btn" name="eraseRestaurantButton" onclick="window.location.href = '../eraseRestaurant.php';">Eliminar restaurante</button></div>
    <section id = "dishes">
        <div class="button_plus"><a href="addDish.php?idRestaurant=<?=$idRestaurant?>"></a></div>
        <?php foreach ($dishes as $dish) { ?>
            <a href="editDish.php?idDish=<?=$dish->id?>"><i class="fas fa-pencil"></i></a>
            <a href="removeDish.php?idDish=<?=$dish->id?>&idRestaurant=<?=$idRestaurant?>"><div class="button_minus"></div> </a>
            <img src="https://picsum.photos/600/300?<?=$dish->name?>"alt="">
            <h3><?= $dish -> name?></h3>
            <p class = "info"> <?= $dish -> price?> €</p>
        <?php }?>
    </section>
        </div>
<?php }?>

