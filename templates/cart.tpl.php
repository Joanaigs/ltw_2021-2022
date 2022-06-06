<?php

declare(strict_types=1);

require_once('database/cart.class.php');


    function drawCart(PDO $db, Session $session, array $restaurants) {
        $carrinho_vazio = true;?>

        <div class="container-cart">
            <section id="left-section"></section>
            <div id="cart">
                <h1><i class="fas fa-shopping-cart"></i>Carrinho</h1>
            <?php foreach ($restaurants as $res) {?>
               <?php $cart = Cart::getCart($db, $session->getId(), $res->id);
                if(!empty($cart)){
                    $carrinho_vazio=false;?>
                    <div class="each-rest">
                        <h2><a href="../restaurant.php?id=<?= $res->id ?>"><?= $res->name ?></a></h2>
                        <?php $total = 0; ?>
                        <div class="total-price">
                            <div class="orders">
                            <?php foreach ($cart as $dish) { ?>
                                <article id="item">
                                    <?php $total += $dish->price*$dish->number?>
                                    <div class="name-price">
                                        <a href="../restaurant.php?id=<?=$dish->idRestaurant?>#<?=$dish->name?>"><?=$dish->name?> <span> x<?=$dish->number?></span></a>
                                        <p><?=$dish->price*$dish->number?> €</p>
                                    </div>
                                    <div class="edit-cart">
                                        <a href="../updadeCartNumber.php?idDish=<?= $dish->id ?>&number=<?=$dish->number+1?>&idRestaurant=<?=$dish->idRestaurant?>" class="fa-solid fa-plus"></a>
                                        <a href="../updadeCartNumber.php?idDish=<?= $dish->id ?>&number=<?=$dish->number-1?>&idRestaurant=<?=$dish->idRestaurant?>" class="minus">-</a>
                                    </div>
                                    <button class="erase-fromCart-btn" name="eraseFromButton" onclick="window.location.href = '../removeFromCart.php?idRestaurant=<?=$dish->idRestaurant?>&idDish=<?=$dish->id?>&cart=true';"><i class="fas fa-trash-alt"></i></button>
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
                <?php }
            } if($carrinho_vazio){?>
                <h3>Carrinho vazio ...</h3> <?php } ?>
        </div>
        <section id="right-section"></section>
    </div>
<?php }

