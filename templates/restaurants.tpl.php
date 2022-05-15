<?php
declare(strict_types = 1);

require_once('database/restaurant.class.php');
require_once ('database/dish.class.php');
?>



<?php function drawRestaurant(Restaurant $restaurant, array $dishes){?>

    <h2><?= $restaurant -> name?></h2>
    <section id = "dishes">
        <?php foreach ($dishes as $dish){ ?>
            <article>
                <img src="<?=$dish -> photo?>" alt="">
                <h3><?= $dish -> name?></h3>
                <p class = "info"> <?= $dish -> price?></p>
            </article>

        <?php } ?>
    </section>


<?php } ?>


