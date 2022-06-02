<?php

    declare(strict_types = 1);

    require_once('database/order.class.php');
    require_once ('database/dish.class.php');
    require_once('database/user.class.php');


    function drawOrderState(array $orders, $counter, PDO $db){?>
        <link rel="stylesheet" href="../css/orderState.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <div class="page-orderState">
            <h1>Estado dos pedidos</h1>
            <div class="grid-container-orders">
                <div class="recebido">
                    <section class="title"><h2>Pedido recebido</h2></section>
                    <?php $counter_test = $counter;
                     foreach ($orders as $order) {
                            if ($order->state !== 'Recebido pelo restaurante')
                                continue;
                            $counter--;
                            $dishes=Dish::dishOrder($db, $order->id);?>
                            <div id="order">
                                <h3>Pedido número <?= $counter ?></h3>
                                <h4>Data: <?= $order->date ?></h4>
                                <?php $user=User::getUser($db, $order->idUser)?>
                                <h4 id="cliente">Cliente: <?= $user->username ?></h4>
                                <?php foreach ($dishes as $dish) {?>
                                    <a> - <?=$dish->name?></a>
                                <?php } ?>
                                <select id="states" name=<?=$order->id?>>
                                    <option value="Recebido pelo restaurante" selected>Recebido pelo restaurante</option>
                                    <option value="Preparar">Preparar</option>
                                    <option value="Pronto">Pronto</option>
                                    <option value="A entregar">A entregar</option>
                                    <option value="Entregue">Entregue</option>
                                </select>
                            </div>
                    <?php }
                     if($counter == $counter_test){?>
                         <h3 id="no-orders">Não há pedidos neste estado</h3>
                        <?php }?>
                </div>
                <div class="preparar">
                    <section class="title"><h2>Pedido a preparar</h2></section>
                        <?php $counter_test = $counter;
                        foreach ($orders as $order) {
                            if ($order->state !== 'Preparar')
                                continue;
                            $counter--;
                            $dishes=Dish::dishOrder($db, $order->id);?>
                            <div id="order">
                                <h3>Pedido número <?= $counter ?></h3>
                                <h4>Data: <?= $order->date ?></h4>
                                <?php $user=User::getUser($db, $order->idUser)?>
                                <h4 id="cliente">Cliente: <?= $user->username ?></h4>
                                <?php foreach ($dishes as $dish) {?>
                                    <a> - <?=$dish->name?></a>
                                <?php } ?>
                                <select id="states" name=<?=$order->id?>>
                                    <option value="Preparar" selected>Preparar</option>
                                    <option value="Pronto">Pronto</option>
                                    <option value="A entregar">A entregar</option>
                                    <option value="Entregue">Entregue</option>
                                </select>
                            </div>
                        <?php }
                        if($counter == $counter_test){?>
                            <h3 id="no-orders">Não há pedidos neste estado</h3>
                        <?php }?>
                </div>
                <div class="pronto">
                    <section class="title"><h2>Pedido pronto</h2></section>
                        <?php $counter_test = $counter;
                        foreach ($orders as $order) {
                            if ($order->state !== 'Pronto')
                                continue;
                            $counter--;
                            $dishes=Dish::dishOrder($db, $order->id);?>
                            <div id="order">
                                <h3>Pedido número <?= $counter ?></h3>
                                <h4>Data: <?= $order->date ?></h4>
                                <?php $user=User::getUser($db, $order->idUser)?>
                                <h4 id="cliente">Cliente: <?= $user->username ?></h4>
                                <?php foreach ($dishes as $dish) {?>
                                    <a> - <?=$dish->name?></a>
                                <?php } ?>
                                <select id="states" name=<?=$order->id?>>
                                    <option value="Pronto" selected>Pronto</option>
                                    <option value="A entregar">A entregar</option>
                                    <option value="Entregue">Entregue</option>
                                </select>
                            </div>
                        <?php }
                        if($counter == $counter_test){?>
                            <h3 id="no-orders">Não há pedidos neste estado</h3>
                        <?php }?>
                </div>
                <div class="entregar">
                    <section class="title"><h2>Pedido a entregar</h2></section>
                        <?php $counter_test = $counter;
                        foreach ($orders as $order) {
                            if ($order->state !== 'A entregar')
                                continue;
                            $counter--;
                            $dishes=Dish::dishOrder($db, $order->id);?>
                            <div id="order">
                                <h3>Pedido número <?= $counter ?></h3>
                                <h4>Data: <?= $order->date ?></h4>
                                <?php $user=User::getUser($db, $order->idUser)?>
                                <h4 id="cliente">Cliente: <?= $user->username ?></h4>
                                <?php foreach ($dishes as $dish) {?>
                                    <a> - <?=$dish->name?></a>
                                <?php } ?>
                                <select id="states" name=<?=$order->id?>>
                                    <option value="A entregar" selected>A entregar</option>
                                    <option value="Entregue">Entregue</option>
                                </select>
                            </div>
                        <?php }
                        if($counter == $counter_test){?>
                            <h3 id="no-orders">Não há pedidos neste estado</h3>
                        <?php }?>
                </div>
                <div class="entregue">
                    <section class="title"><h2>Pedido entregue</h2></section>
                        <?php $counter_test = $counter;
                        foreach ($orders as $order) {
                            if ($order->state !== 'Entregue')
                                continue;
                            $counter--;
                            $dishes=Dish::dishOrder($db, $order->id);?>
                            <div id="order">
                                <h3>Pedido número <?= $counter ?></h3>
                                <h4>Data: <?= $order->date ?></h4>
                                <?php $user=User::getUser($db, $order->idUser)?>
                                <h4 id="cliente">Cliente: <?= $user->username ?></h4>
                                <?php foreach ($dishes as $dish) {?>
                                    <a> - <?=$dish->name?></a>
                                <?php } ?>
                                <select id="states" name=<?=$order->id?>>
                                    <option value="Entregue" selected>Entregue</option>
                                </select>
                            </div>
                        <?php }
                        if($counter == $counter_test){?>
                            <h3 id="no-orders">Não há pedidos neste estado</h3>
                        <?php }?>
                </div>
            </div>
        </div>
    <?php }
