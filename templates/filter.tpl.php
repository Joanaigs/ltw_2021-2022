<?php
declare(strict_types=1);
require_once(__DIR__ . '/../database/filter.class.php');
?>

<?php function drawFilter(array $filters)
{ ?>
    <section id="filter">
        <?php foreach ($filters as $filter) { ?>
            <header>
                <input type="checkbox"><a><?= $filter->name ?></a>
            </header>
        <?php } ?>
    </section>
<?php } ?>
