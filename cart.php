<?php

    declare(strict_types = 1);
    require_once('session.php');
    $session = new Session();
    require_once('database/restaurant.class.php');
    require_once('database/connection.db.php');
    require_once ('database/cart.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/cart.tpl.php');

    $db = getDatabaseConnection();
    $restaurants = Restaurant::getRestaurants($db);
    drawHeader($session);?>
     <section id="cart">
     <?php foreach ($restaurants as $res) {
        $cart = Cart::getCart($db, $session->getId(), $res->id);
        if(!empty($cart)){?>
            <h2><a href="restaurant.php?id=<?=$res->id?>"><?=$res->name?></a></h2>
            <?php $total = 0;
            foreach ($cart as $dish) { ?>
                <article id="item">
                    <?php $total += $dish->price?>
                    <a href="restaurant.php?id=<?=$dish->idRestaurant?>#<?=$dish->name?>"><?=$dish->name?></a>
                    <button class="erase-fromCart-btn" name="eraseFromButton" onclick="window.location.href = '../removeFromCart.php?idRestaurant=<?=$dish->idRestaurant?>&idDish=<?=$dish->id?>&cart=true';">Remover</button>
                    <p><?=$dish->price?> €</p>
                </article>

            <?php } ?>
            <p>TOTAL: <?=$total?>€</p>
            <button class="make-order-btn" name="makeOrderButton" onclick="window.location.href = '../makeOrder.php?idRestaurant=<?=$res->id?>';">Checkout</button>
     <?php }} ?>
    </section>
<?php
    drawFooter();

?>