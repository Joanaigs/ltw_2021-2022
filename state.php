<?php
declare(strict_types = 1);

require_once('database/order.class.php');
require_once ('database/dish.class.php');
require_once ('database/user.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$idRestaurant=$_GET['id'];
drawRestViewHeader($idRestaurant);
$orders=Order::getOrdersRestaurant($db,$idRestaurant);
$counter=0;
?>
<?php foreach ($orders as $order) {
    $counter++;
    $dishes=Dish::dishOrder($db, $order->id);?>
    <h3>Pedido número <?= $counter ?></h3>
    <h4>Data: <?= $order->date ?></h4>
    <?php $user=User::getUser($db, $order->idUser)?>
    <h4>Cliente: <?= $user->username ?></h4>
    <?php foreach ($dishes as $dish) {?>
        <a> <?=$dish->name?></a><br>
    <?php } ?>
    <select id="states" name=<?=$order->id?>>
        <option value="Preparar" <?php if($order->state  === 'Preparar') echo "selected"; ?>>Preparar</option>
        <option value="Recebido pelo restaurante" <?php if($order->state == 'Recebido pelo restaurante') echo "selected"; ?>>Recebido pelo restaurante</option>
        <option value="Pronto" <?php if($order->state == 'Pronto') echo "selected"; ?>>Pronto</option>
        <option value="A entregar" <?php if($order->state  == 'A entregar') echo "selected"; ?>>A entregar</option>
        <option value="Entregue" <?php if($order->state  == 'Entregue') echo "selected"; ?>>Entregue</option>
    </select>
    <br>
<?php } ?>
<?php
drawFooter();
?>
