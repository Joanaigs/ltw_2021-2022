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
            <span class="rest-image" style='background-image:url("../images/restaurants/<?= $restaurant->image ?>.jpg"'
                  )></span>
            <div class="rest-name">
                <h1><?= $restaurant->name ?></h1>
                <a class="button-edit" href="#editRestaurantInfo"><i
                            class="fas fa-pencil"></i> Editar dados</a>
                <?php editRestaurantInfo($db) ?>
                <div class="erase-restaurant">
                    <button class="erase-restaurant-btn" name="eraseRestaurantButton"
                            onclick="window.location.href = '../eraseRestaurant.php';">Eliminar restaurante
                    </button>
                </div>
            </div>
            <h3><?= $restaurant->address ?></h3>
            <?php $category = Filter::getFilterRestaurants($db); ?>
            <h4><?= $restaurant->filt;
                drawRestaurantViewDishes($idRestaurant, $dishes, $db); ?></h4>
        </div>
    </div>

<?php } ?>
<?php
function drawRestaurantViewDishes($idRestaurant, $dishes, $db)
{

    ?>
    <div id="menu">
        <h2>Menu</h2>
        <a class="button-add" href="#addDish"><i class="fas fa-plus">
                Adicionar prato ao menu</i></a>
        <?php addDish($idRestaurant, $db); ?>
        <section id="entrada">
            <h2 class="type">Entradas</h2>
            <div class="order">
                <?php foreach ($dishes as $dish) {
                    if ($dish->meal != "Entrada")
                        continue; ?>
                    <section class="info-dish">
                        <section class="image">
                            <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                        </section>
                        <section class="text">
                            <h4> <?= $dish->name ?></h4>
                            <p class="info"> <?= $dish->price ?> €</p>
                            <section class="edit">
                                <a class="button-edit" href="#editDishBox"><i
                                            class="fas fa-pencil"></i> Editar prato</a>
                                <?php editDish($dish, $db) ?>
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
                            <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                        </section>
                        <section class="text">
                            <h4> <?= $dish->name ?></h4>
                            <p class="info"> <?= $dish->price ?> €</p>
                            <section class="edit">
                                <a class="button-edit" href="#editDishBox"><i class="fas fa-pencil"></i> Editar
                                    prato</a>
                                <?php editDish($dish, $db) ?>
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
                            <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                        </section>
                        <section class="text">
                            <h4> <?= $dish->name ?></h4>
                            <p class="info"> <?= $dish->price ?> €</p>
                            <section class="edit">
                                <a class="button-edit" href="#editDishBox"><i
                                            class="fas fa-pencil"></i> Editar prato</a>
                                <?php editDish($dish, $db) ?>
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
                            <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                        </section>
                        <section class="text">
                            <h4> <?= $dish->name ?></h4>
                            <p class="info"> <?= $dish->price ?> €</p>
                            <section class="edit">
                                <a class="button-edit" href="#editDishBox"><i
                                            class="fas fa-pencil"></i> Editar prato</a>
                                <?php editDish($dish, $db) ?>
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

<?php }

function editDish(Dish $dish, PDO $db)
{

    $meals = Filter::getMeals($db);
    $typeDishes = Filter::getTypeDish($db);
    ?>


    <div id="editDishBox" class="popup">

        <div class="popup-box-content">
            <form action="editDishDatabase.php?idRestaurant=<?= $dish->idRestaurant ?>&idDish=<?= $dish->id ?>"
                  method="post" class="popupBox" enctype="multipart/form-data">
                <img src="../images/dishes/<?= $dish->image ?>.jpg" alt="">
                <label for="imageRestaurant">
                    <input type="file" name="image" accept="image/png,image/jpeg,image/jpg"
                           value="../images/dishes/<?= $dish->image ?>.jpg">
                </label>

                <label for="nameDish">
                    Nome do prato:
                    <input id="nameDish" type="text" name="nameDish" value="<?= $dish->name ?>">
                </label>

                <label for="priceDish">
                    Preço:
                    <input id="priceDish" type="number" step="0.01" name="priceDish" value="<?= $dish->price ?>">
                </label>

                <div class="radio-class-buttons">
                    <label for="mealDish">Categoria:
                        <?php foreach ($meals as $meal) { ?>
                            <span>
                            <input class="radio" type="radio" name="mealDish"
                                   value=<?= $meal->id ?> <?php if ($dish->idMeal === $meal->id) echo "checked" ?>/>
                            <?= $meal->name ?></span>
                        <?php } ?>
                    </label>

                    <label for="typeDish">Tipo de refeição:
                        <?php foreach ($typeDishes as $type) { ?>
                            <span>
                            <input class="radio" type="radio" name="typeDish"
                                   value=<?= $type->id ?> <?php if ($dish->idTypeOfDish === $type->id) echo "checked" ?>/>
                            <?= $type->name ?></span>
                        <?php } ?>
                    </label>
                </div>

                <button type="submit">Salvar</button>
            </form>
            <a href="#" id="popupClose">&times;</a>
        </div>
    </div>
<?php }


function addDish(int $idRestaurant, PDO $db)
{


    $meals = Filter::getMeals($db);
    $typeDishes = Filter::getTypeDish($db);
    ?>

    <div id="addDish" class="popup">

        <div class="popup-box-content">
            <form action="../addDishDatabase.php?idRestaurant=<?= $idRestaurant ?>" method="post" class="popupBox"
                  enctype="multipart/form-data">

                <img src="../images/pattern.jpeg" alt="">
                <label for="imageRestaurant">
                    <input type="file" name="image" accept="image/png,image/jpeg">
                </label>

                <label for="nameDish">Nome do prato:
                    <input id="nameDish" type="text" name="nameDish">
                </label>

                <label for="priceDish">Preço:
                    <input id="priceDish" type="number" step="0.01" name="priceDish">
                </label>

                <div class="radio-class-buttons">
                    <label for="mealDish">Categoria:
                        <?php foreach ($meals as $meal) { ?>
                            <span>
                            <input class="radio" type="radio" name="mealDish" value=<?= $meal->id ?>/>
                           <?= $meal->name ?></span>
                        <?php } ?>
                    </label>

                    <label for="mealDish">Tipo de refeição:
                        <?php foreach ($typeDishes as $type) { ?>
                            <span>
                            <input class="radio" type="radio" name="typeDish" value=<?= $type->id ?>/>
                            <?= $type->name ?></span>
                        <?php } ?>
                    </label>
                </div>

                <button type="submit">Salvar</button>
            </form>
            <a href="#" id="popupClose">&times;</a>
        </div>
    </div>
<?php }

function editRestaurantInfo($db)
{

    $idRest = $_GET['id'];
    $restaurant = Restaurant::getRestaurant($db, intval($idRest));
    $category = Filter::getFilterRestaurants($db); ?>

    <div id="editRestaurantInfo" class="popup">
        <div class="popup-box-content">
            <form action="updateRestaurant.php?id=<?= $idRest ?>" method="post" class="popupBox" id="editRestaurant-popup"
                  enctype="multipart/form-data">
                <label for="photoRestaurant">Photo:
                <input type="file" name="image" accept="image/png,image/jpeg">
                </label>

                <label for="nameRestaurant">Nome:
                <input id="nameRestaurant" type="text" name="nameRestaurant" value="<?= $restaurant->name ?>">
                </label>

                <label for="addressRestaurant">Endereço:
                <input id="addressRestaurant" type="text" name="addressRestaurant" value="<?= $restaurant->address ?>">
                </label>



                <label class="categoryRadioButtons"> Tipo de Comida:
                <?php foreach ($category as $c) { ?>
                        <span>
                        <input class="radio" type="radio" name="restaurantCategory"
                               value=<?= $c->id ?> <?php if ($restaurant->filt === $c->name) echo "checked" ?>/><?= $c->name ?>
                        </span>

                <?php } ?>
                </label>

                <button type="submit">Salvar</button>
            </form>
            <a href="#" id="popupClose">&times;</a>
        </div>
    </div>
<?php }