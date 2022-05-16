<?php
declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once ('database/dish.class.php');
require_once('templates/common.tpl.php');
require_once('templates/filter.tpl.php');
require_once('templates/restaurants.tpl.php');
$db = new PDO('sqlite:example.db');

$idRestaurant=$_GET['id'];
drawRestViewHeader($idRestaurant);
$dishes=Dish::getDishesRestaurant($db, $idRestaurant);
?>
<a href="addDish.php?idRestaurant=<?=$idRestaurant?>"><div class="button_plus"></div> </a>
<?php foreach ($dishes as $dish) { ?>
    <a href="editDish.php?idDish=<?=$dish->id?>"><i class="fa fa-pencil" style="font-size:2em;color:gray"></i></a>
    <img src="https://picsum.photos/600/300?<?=$dish->name?>"alt="">
    <h3><?=$dish->name?></h3>
    <h4><?=$dish->price?></h4>

<?php } ?>
<?php
drawFooter();
?>
