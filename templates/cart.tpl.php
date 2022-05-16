<?php

    declare(strict_types = 1);

    require_once('database/cart.class.php');

    function drawCart(array $cart) { ?>
    <section id="cart">
        <?php $total = 0?>
        <?php foreach ($cart as $dish) { ?>
            <article id="item">
                <?php $total += $dish->price?>
                <p><?=$dish->name?>....<?=$dish->price?> €</p>
            </article>

        <?php } ?>
        <p>TOTAL: <?=$total?>€</p>

        <button type="button">CHECKOUT</button>
    </section>
<?php } ?>

