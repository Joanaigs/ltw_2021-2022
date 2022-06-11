<?php

declare(strict_types = 1);
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/connection.db.php');
$db = getDatabaseConnection();



drawHeader($session, $hasSearch = false);
if ($session->isLoggedIn()) {
    $restaurants=Restaurant::getFavoriteRestaurants($db, $session, $session->getId()); ?>
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