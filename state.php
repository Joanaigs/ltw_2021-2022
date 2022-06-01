<?php
declare(strict_types = 1);

require_once('database/order.class.php');
require_once ('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$idRestaurant=$_GET['id'];
drawRestViewHeader($idRestaurant);
$orders=Order::getOrdersRestaurant($db,$idRestaurant);
?>
<?php foreach ($orders as $order) {
    $dishes=Dish::dishOrder($db, $order->id);?>
    <h3>Pedido número <?= $order->id ?></h3>
    <?php foreach ($dishes as $dish) {?>
        <a> <?=$dish->name?></a><br>
    <?php } ?>
    <select id="states" name=<?=$order->id?>>
        <option value="Preparar" <?php if($order->state  === 'preparing') echo "selected"; ?>>Preparar</option>
        <option value="Recebido pelo restaurante" <?php if($order->state == 'received') echo "selected"; ?>>Recebido pelo restaurante</option>
        <option value="Pronto" <?php if($order->state == 'ready') echo "selected"; ?>>Pronto</option>
        <option value="A entregar" <?php if($order->state  == 'delivered') echo "selected"; ?>>A entregar</option>
        <option value="Entregue" <?php if($order->state  == 'delivered') echo "selected"; ?>>Entregue</option>
    </select>
    <br>
<?php } ?>
<?php
drawFooter();
?>
