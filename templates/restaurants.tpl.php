<?php 
  declare(strict_types = 1); 

  require_once('database/restaurant.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?><!DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Larica-Food Delivery Website</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="search">
            <div class="search-icon"></div>
            <div class="input">
                <input id="searchRest" type="text" placeholder="Procurar">
            </div>
            <span class="clear" onclick="document.getElementById('searchRest').value=''"></span>
        </div>
        <script src="../javascript/restaurantSearch.js"></script>
        <!--<section id="restaurants">
            <?php //foreach ($restaurants as $res) { ?>
                <article>
                    <header>
                        <a href="item.html"><?//=$res->name?></a>
                    </header>
                    <div class="heart" id=<?//=$res->id?>></div>
                    <img src="https://picsum.photos/600/300?.<?//=$res->name?>"alt="">
                </article>
            <?php //}
            ?>
        </section>
<?php } ?>