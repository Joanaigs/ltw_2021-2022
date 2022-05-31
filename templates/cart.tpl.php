<?php

    declare(strict_types = 1);

    require_once('database/cart.class.php');

    function drawCart(array $cart) { ?>
    <section id="cart">
        <?php $total = 0?>
        <?php foreach ($cart as $dish) { ?>
            <article id="item">
                <?php $total += $dish->price?>
                <a href="restaurant.php?id=<?=$dish->idRestaurant?>"><?=$dish->name?></a>
                <button class="erase-fromCart-btn" name="eraseFromButton" onclick="window.location.href = '../removeFromCart.php?idRestaurant=<?=$dish->idRestaurant?>&idDish=<?=$dish->id?>&cart=true';">Remover</button>
                <p><?=$dish->price?> €</p>
            </article>

        <?php } ?>
        <p>TOTAL: <?=$total?>€</p>

        <button class="make-order-btn" name="makeOrderButton" onclick="window.location.href = '../makeOrder.php';">Checkout</button>
    </section>
<?php } ?>

