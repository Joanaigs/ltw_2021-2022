<?php
    declare(strict_types = 1);
    require_once('database/filter.class.php');
?>

<?php function drawFilter(array $filters) { ?>
    <section id="filterRestaurant">
        <?php foreach ($filters as $filt) { ?>
            <header>
                <input type="checkbox" name="vehicle" value="Bike"><a href="item.html"><?=$filt->name?></a>
            </header>
        <?php } ?>
    </section>
<?php } ?>
