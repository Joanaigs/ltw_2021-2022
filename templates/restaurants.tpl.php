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
    $restaurant = Restaurant::getRestaurant($db, $idRestaurant); ?>
    <link rel="stylesheet" href="../css/owner_restView.css"/>
    <link rel="stylesheet" href="../css/profile.css"/>
    <div class="grid-container-rest">
        <span class="rest-image" style='background-image:url("../images/restaurants/<?=$restaurant->image?>.jpg"')></span>
        <div class="rest-name">
            <h1><?= $restaurant->name ?></h1>
            <a class="button-edit" href="../editRestaurant.php?id=<?= $restaurant->id ?>"><i
                        class="fas fa-pencil"></i> Editar dados</a>
            <div class="erase-restaurant">
                <button class="erase-restaurant-btn" name="eraseRestaurantButton"
                        onclick="window.location.href = '../eraseRestaurant.php';">Eliminar restaurante
                </button>
            </div>
        </div>
        <h3><?= $restaurant->address ?></h3>
        <?php $category = Filter::getFilterRestaurants($db);?>
        <h4><?=$restaurant->filt;
            drawRestaurantViewDishes($idRestaurant, $dishes);?>
<?php } ?>
<?php
function drawRestaurantViewDishes($idRestaurant, $dishes){?>
    <div id="menu">
            <h2>Menu</h2>
            <a class="button-add" href="../addDish.php?idRestaurant=<?= $idRestaurant ?>"><i class="fas fa-plus">
                    Adicionar prato ao menu</i></a>
            <section id="entrada">
                <h2 class="type">Entradas</h2>
                <div class="order">
                    <?php foreach ($dishes as $dish) {
                        if ($dish->meal != "Entrada")
                            continue; ?>
            <section class="info-dish">
                <section class="image">
                    <img src="../images/dishes/<?=$dish->image?>.jpg" alt="">
                </section>
                <section class="text">
                    <h4> <?= $dish->name ?></h4>
                    <p class="info"> <?= $dish->price ?> €</p>
                    <section class="edit">
                        <a class="button-edit" href="../editDish.php?idDish=<?= $dish->id ?>"><i
                                    class="fas fa-pencil"></i> Editar prato</a>
                        <a class="button-minus"
                           href="../removeDish.php?idDish=<?= $dish->id ?>&idRestaurant=<?= $idRestaurant ?>">-
                            Eliminar prato do menu</a>
                    </section>
                </section>
            </section>
            <?php } ?>
    </div>
</section>
<section id="pratoPincipal">
    <h2 class="type">Pratos Principais</h2>
    <div class="order">
        <?php foreach ($dishes as $dish) {
            if ($dish->meal != "Prato principal")
                continue; ?>
            <section class="info-dish">
                <section class="image">
                    <img src="../images/dishes/<?=$dish->image?>.jpg" alt="">
                </section>
                <section class="text">
                    <h4> <?= $dish->name ?></h4>
                    <p class="info"> <?= $dish->price ?> €</p>
                    <section class="edit">
                        <a class="button-edit" href="../editDish.php?idDish=<?= $dish->id ?>"><i
                                    class="fas fa-pencil"></i> Editar prato</a>
                        <a class="button-minus"
                           href="../removeDish.php?idDish=<?= $dish->id ?>&idRestaurant=<?= $idRestaurant ?>">-
                            Eliminar prato do menu</a>
                    </section>
                </section>
            </section>
        <?php } ?>
    </div>
</section>
<section id="sobremesa">
    <h2 class="type">Sobremesas</h2>
    <div class="order">
        <?php foreach ($dishes as $dish) {
            if ($dish->meal != "Sobremesa")
                continue; ?>
            <section class="info-dish">
                <section class="image">
                    <img src="../images/dishes/<?=$dish->image?>.jpg" alt="">
                </section>
                <section class="text">
                    <h4> <?= $dish->name ?></h4>
                    <p class="info"> <?= $dish->price ?> €</p>
                    <section class="edit">
                        <a class="button-edit" href="../editDish.php?idDish=<?= $dish->id ?>"><i
                                    class="fas fa-pencil"></i> Editar prato</a>
                        <a class="button-minus"
                           href="../removeDish.php?idDish=<?= $dish->id ?>&idRestaurant=<?= $idRestaurant ?>">-
                            Eliminar prato do menu</a>
                    </section>
                </section>
            </section>
        <?php } ?>
    </div>
</section>
<section id="bebida">
    <h2 class="type">Bebidas</h2>
    <div class="order">
        <?php foreach ($dishes as $dish) {
            if ($dish->meal != "Bebida")
                continue; ?>
            <section class="info-dish">
                <section class="image">
                    <img src="../images/dishes/<?=$dish->image?>.jpg" alt="">
                </section>
                <section class="text">
                    <h4> <?= $dish->name ?></h4>
                    <p class="info"> <?= $dish->price ?> €</p>
                    <section class="edit">
                        <a class="button-edit" href="../editDish.php?idDish=<?= $dish->id ?>"><i
                                    class="fas fa-pencil"></i> Editar prato</a>
                        <a class="button-minus"
                           href="../removeDish.php?idDish=<?= $dish->id ?>&idRestaurant=<?= $idRestaurant ?>">-
                            Eliminar prato do menu</a>
                    </section>
                </section>
            </section>
        <?php } ?>
    </div>
</section>
</div>
</div>
<?php }