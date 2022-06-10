<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/restaurant.class.php');



function drawRestaurants(array $restaurants, array $filterRestaurants, PDO $db, Session $session) { ?><!DOCTYPE html>
<div class="grid-container">
    <div class="filter">
        <section id="typeOfRestaurant">
            <h2>Comida:</h2>
            <div id="filter">
                <label><input class="radio" type="radio" name=filter value="all" checked="checked"/>Todos
                </label>
                <?php foreach ($filterRestaurants as $filter) { ?><label>
                    <input  class="radio" type="radio" name=filter value=<?= $filter->name ?> /><?= $filter->name ?>
                    </label>
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


function drawRestaurantView(PDO $db, int $idRestaurant, array $dishes)
{
    ?>
    <div class="container-restOwner">
        <?php $restaurant = Restaurant::getRestaurant($db, $idRestaurant); ?>
        <link rel="stylesheet" href="../css/owner_restView.css"/>
        <link rel="stylesheet" href="../css/profile.css"/>
        <div class="grid-container-rest">
            <span class="rest-image"
                  style='background-image:url("../images/restaurants/<?= $restaurant->image ?>.jpg")'></span>
            <article class="rest-name" data-id = "<?= $idRestaurant?>">
                <h1><?= $restaurant->name ?></h1>

                <div class="erase-restaurant">
                    <button class="erase-restaurant-btn" name="eraseRestaurantButton">Eliminar restaurante</button>
                </div>
            </article>
            <h3><?= $restaurant->address ?></h3>
            <?php $category = Filter::getFilterRestaurants($db); ?>
            <h4>Tipo de restaurante:  <?= $restaurant->filt; ?></h4>
            <a class="button-edit-rest"><i class="fas fa-pencil"></i> Editar dados</a>
            <?php drawRestaurantViewDishes($idRestaurant, $dishes, $db); ?>
        </div>
    </div>

<?php } ?>
<?php
function drawRestaurantViewDishes($idRestaurant, $dishes, $db)
{
    ?>
    <article id="menu" data-id = "<?= $idRestaurant?>">
        <h2>Menu</h2>
        <a class="button-add"><i class="fas fa-plus"> Adicionar prato ao menu</i></a>

        <?php $meal = null ?>
        <div class="order">
            <?php foreach ($dishes as $dish) { ?>
                <?php if ($dish->meal != $meal) {
                    $meal = $dish->meal; ?>
                    <h2 id="<?= $meal ?>"><?= $meal ?></h2>
                <?php } ?>
                <article class="info-dish" data-idRestaurant="<?= $idRestaurant ?>" data-idDish="<?= $dish->id ?>">
                    <section class="image">
                        <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                    </section>
                    <section class="text">
                        <h4> <?= $dish->name ?></h4>
                        <p class="info"> <?= $dish->price ?> €</p>
                        <section class="edit">
                            <a class="button-edit" id="<?= $dish->id ?>"><i class="fas fa-pencil"></i> Editar prato</a>
                            <a class="button-minus"
                               href="../removeDish.php?idDish=<?= $dish->id ?>&idRestaurant=<?= $idRestaurant ?>">
                                Eliminar prato do menu</a>
                        </section>

                    </section>
                </article>
            <?php } ?>
        </div>
    </article>

    <div class="popup hidden" id ="popup">
        <div class="popupBox">


        </div>
    </div>
<?php }