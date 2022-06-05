<?php

declare(strict_types=1);

require_once('database/cart.class.php');

function drawCart(PDO $db, Session $session, array $restaurants)
{ ?>
    <div class="container">
        <section id="left-section"></section>
        <div id="cart">
            <h1><i class="fas fa-shopping-cart"></i>Carrinho</h1>
            <?php foreach ($restaurants as $res) { ?>
                <?php $cart = Cart::getCart($db, $session->getId(), $res->id);
                if (!empty($cart)) {
                    ?>
                    <div class="each-rest">
                        <h2><a href="../restaurant.php?id=<?= $res->id ?>"><?= $res->name ?></a></h2>
                        <?php $total = 0; ?>
                        <div class="total-price">
                            <div class="orders">
                                <?php foreach ($cart as $dish) { ?>
                                    <article id="item">
                                        <?php $total += $dish->price ?>
                                        <div class="name-price">
                                            <a href="../restaurant.php?id=<?= $dish->idRestaurant ?>#<?= $dish->name ?>"><?= $dish->name ?></a>
                                            <p><?= $dish->price ?> €</p>
                                        </div>
                                        <button class="erase-fromCart-btn" name="eraseFromButton"
                                                onclick="window.location.href = '../removeFromCart.php?idRestaurant=<?= $dish->idRestaurant ?>&idDish=<?= $dish->id ?>&cart=true';">
                                            Remover
                                        </button>
                                    </article>
                                <?php } ?>
                            </div>
                            <p id="price">TOTAL : <?= $total ?>€</p>
                        </div>
                        <form action="../makeOrder.php?idRestaurant=<?= $res->id ?>" method="post" class="edit-profile">
                            <label><i class="fa-solid fa-location-dot"></i>Morada de entrega: <input type="text"
                                                                                                     name="address"
                                                                                                     placeholder="<?= $session->getAddress() ?>"/></label>
                            <button class="make-order-btn" type="submit">Checkout</button>
                        </form>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <section id="right-section"></section>
    </div>
<?php }

