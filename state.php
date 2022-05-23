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
        <option value="preparing" <?php if($order->state  === 'preparing') echo "selected"; ?>>Preparing</option>
        <option value="received" <?php if($order->state == 'received') echo "selected"; ?>>Received</option>
        <option value="ready" <?php if($order->state == 'ready') echo "selected"; ?>>Ready</option>
        <option value="delivered" <?php if($order->state  == 'delivered') echo "selected"; ?>>Delivered</option>
    </select>
    <br>
<?php } ?>
<?php
drawFooter();
?>
