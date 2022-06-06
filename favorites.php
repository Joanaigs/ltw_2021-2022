<?php

declare(strict_types = 1);
require_once('session.php');
$session = new Session();

require_once('database/restaurant.class.php');
require_once('templates/common.tpl.php');
require_once('templates/restaurants.tpl.php');
require_once('database/connection.db.php');
$db = getDatabaseConnection();



drawHeader($session);
if ($session->isLoggedIn()) {
    $restaurants=Restaurant::getFavoriteRestaurants($db, $session, $session->getId());
    ?>
    <div class="favorites-grid-container">
        <div id = "favoriteFilter">
            <label>
                <input type="radio" name ="typeFilter" id="dishes" value="dishes" checked="checked">
                <span>Pratos</span>
            </label>
            <label>
                <input type="radio" name ="typeFilter" value="restaurants" id="restaurants" >
                <span>Restaurantes</span>
            </label>

        </div>
        <section id="favoritesPage"></section>

    </div>
    <?php
}
drawFooter();
?>