<?php
    declare(strict_types=1);

    require_once('session.php');
    $session = new Session();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once ('database/restaurant.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/user.tpl.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());
    $restaurant=Restaurant::hasRestaurant($db, $session->getId());
    echo $restaurant->name;
    drawHeader($session);
    drawProfile($user);
    drawLatestOrders($session, $db, $user);
    if($restaurant===false){?>
        <button class="add-restaurant-btn" name="addRestaurantButton" onclick="window.location.href = '../addRestaurant.php';">Add Restaurant</button>
        <?php }
    else{?>
        <button class="restaurant-page-btn" name="restaurantPageButton" onclick="window.location.href = '../restView.php?id=<?=$restaurant->id?>';">Restaurant Page</button>
    <?php }
    ?>

<?php
    drawFooter();
