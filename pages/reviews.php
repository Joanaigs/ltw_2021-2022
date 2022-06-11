<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../database/cart.class.php');
require_once(__DIR__ . '/../database/comment.class.php');
require_once(__DIR__ . '/../database/filter.class.php');
require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/comments.tpl.php');
require_once(__DIR__ . '/../templates/restaurants.tpl.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
require_once(__DIR__ . '/../database/connection.db.php');

$db = getDatabaseConnection();
$idRestaurant=$_GET['id'];
$restaurant = Restaurant::getRestaurant($db,intval($idRestaurant));
$dishes = Dish::getDishesRestaurant($db, $_GET['id'], $session);
$filterMeals = Filter::getMeals($db);
$filterTypes=Filter::getTypeDish($db);
$reviews=Review::getReview($db, $idRestaurant);


drawHeader($session, $hasSearch = false); ?>


<div class="reviews-flex-container">

        <span class="image" style='background-image:url("../images/restaurants/<?=$restaurant->image?>.jpg"') ></span>
        <h1>O que achou de <?=$restaurant->name?> ?</h1>


<?php if($session->isLoggedIn()){?>


        <section class="add-review">
            <h2>Adicionar avaliação:</h2>
            <form action="../actions/addReview.php?idRestaurant=<?=$idRestaurant?>" method="post" class="review" enctype="multipart/form-data">
                <input type="hidden" name="csrf" value="<?=$session->getcsrf()?>">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value=5 />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value=4/>
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value=3/>
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value=2/>
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value=1 checked/>
                    <label for="star1" title="text">1 star</label>
                </div>

                <input class="form-control" rows="1" placeholder="Deixe-nos aqui a sua opinião..." name="remark"
                       id="remark" required/>
                <button type="submit">Publicar</button>
            </form>
        </section>
<?php  } drawComments($reviews, $db, $session, 0);?>

</div>

<?php drawFooter();?>