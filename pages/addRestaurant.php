<?php

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    require_once(__DIR__ .'/../templates/common.tpl.php');
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/restaurant.class.php');
    require_once(__DIR__ .'/../database/filter.class.php');
    drawHeader($session, $hasSearch = false);
    $db = getDatabaseConnection();
    $category=Filter::getFilterRestaurants($db);


?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <div class="grid-container-profile">
        <?php drawSidebar(false); ?>
        <div class="restaurant-profile-info">
            <form action="../actions/addRestaurantDatabase.php" method="post" class="restaurant-profile"
                  enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?=$session->getcsrf()?>">
                <h2 class="title">Adicionar restaurante</h2>
                <div class="input-field">
                    <label for="imageRestaurant"><i class="fas fa-camera"></i>Imagem:</label>
                    <label>
                        <input  type="file" name="image" accept="image/png,image/jpeg,image/jpg,image/JPG">
                    </label>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-utensils"></i>Nome restaurante:</label>
                    <input class="info-input" type="text" name="nameRestaurant"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-home"></i>Morada: </label>
                    <input class="info-input" type="text" name="addressRestaurant"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-hamburger"></i>Categoria:</label>
                    <div class="category">
                        <?php foreach ($category as $c) { ?>
                            <section id="each-option">
                                <label>
                                    <input class="radio" type="radio" name="restaurantCategory" value=<?= $c->id ?>/>
                                    <?= $c->name ?>
                                </label>
                            </section>
                        <?php } ?>
                    </div>
                </div>
                <div class="buttons">
                    <input type="submit" formmethod="post" class="btn-solid" value="Salvar">
                </div>
            </form>
        </div>
    </div>

<?php


drawFooter();