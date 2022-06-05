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
    $restaurants=Restaurant::getFavoriteRestaurants($db, $session->getId());
    ?>
        <div id = "favoriteFilter">
            <input type="radio" name ="typeFilter" value="restaurants" id="restaurants" checked="checked"><label>restaurants</label>
            <input type="radio" name ="typeFilter" id="dishes" value="dishes" ><label>dishes</label>
        </div>
        <section id="favoritesPage">
            <?php foreach ($restaurants as $res) { ?>
                <article>
                    <header>
                        <a href="restaurant.php?id=<?=$res->id?>"><?=$res->name?></a>
                    </header>
                    <img src="https://picsum.photos/600/300?.<?=$res->name?>"alt="">
                </article>
            <?php }?>
        </section>
    <?php
}
drawFooter();
?>