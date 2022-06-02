<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
?>


<?php function drawComments(array $reviews, PDO $db, Session $session, int $rest)
{ ?><!DOCTYPE html>

    <section class="reviews">
        <?php foreach ($reviews as $review) {?>
            <article class="review">

                <?php $user = User::getUser($db, $review->idUser);
                $restaurant=Restaurant::getRestaurant($db, $review->idRestaurant)?>
                    <div class="review-info">

                        <div class="flex-left">
                            <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                            <div class="review-profile-info">
                                <h2> <?= $user->username ?> </h2>
                                <h3> <?= $review->date ?> </h3>
                            </div>
                        </div>

                        <div class="flex-right">
                            <div class="ratingFixed">
                                <span class="fa fa-star <?php if ($review->rating >= 1) echo "checked" ?>"></span>
                                <span class="fa fa-star <?php if ($review->rating >= 2) echo "checked" ?>"></span>
                                <span class="fa fa-star <?php if ($review->rating >= 3) echo "checked" ?>"></span>
                                <span class="fa fa-star <?php if ($review->rating >= 4) echo "checked" ?>"></span>
                                <span class="fa fa-star <?php if ($review->rating >= 5) echo "checked" ?>"></span>
                            </div>
                            <?php if ($session->getId() === $user->id && $rest === 0){ ?>
                                <button class="fas fa-trash-alt" name="eraseComment"
                                        onclick="window.location.href = '../eraseReview.php?id=<?= $review->id ?>&idRestaurant=<?=$review->idRestaurant?>';">
                                </button>
                            <?php }?>
                        </div>
                    </div>
                <p> <?= $review->review ?> </p>


                <section class="comments">
                <?php $comments = Comment::getComments($db, $review->id);
                if (!empty($comments)) {?>

                    <?php foreach ($comments as $comment) { ?>
                        <div class="comment">

                            <?php if ($comment->fromRestaurant === 1) {
                                $restaurant = Restaurant::getRestaurant($db, $comment->idRestaurant); ?>

                            <div class="flex-left">
                                    <img src="https://picsum.photos/100/100?.<?= $restaurant->name ?>" alt="">
                                    <div class="review-profile-info">
                                        <h4>Owner</h4>
                                        <h2> <?= $restaurant->name ?> </h2>
                                        <h3> <?= $comment->date ?> </h3>
                                    </div>
                            </div>

                            <div class="flex-right">
                                <p> <?= $comment->comment ?> </p>
                                <?php if ($session->getId() === $restaurant->idUser && $rest===1) { ?>
                                    <button class="fas fa-trash-alt" name="eraseComment"
                                        onclick="window.location.href = '../eraseComment.php?id=<?= $comment->id ?>&type=<?= $rest ?>&idRestaurant=<?= $review->idRestaurant ?>';">
                                    </button>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="flex-left">
                                <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                                <div class="review-profile-info">
                                <h2> <?= $user->username ?> </h2>
                                <h3> <?= $comment->date ?> </h3>
                                </div>
                            </div>

                            <div class="flex-right">
                                <p> <?= $comment->comment ?> </p>
                                <?php if ($session->getId() === $user->id && $rest===0) { ?>
                                    <button class="fas fa-trash-alt" name="eraseComment"
                                            onclick="window.location.href = '../eraseComment.php?id=<?= $comment->id ?>&type=<?= $rest ?>&idRestaurant=<?= $review->idRestaurant ?>';">
                                    </button>
                                <?php } ?>

                            </div>
                        <?php }?>
                        </div>
                        <?php }}?>


                <div class="add-comment">

                <?php if ($session->getId() === $user->id || $rest===1) { ?>
                    <form action="../addComment.php?type=<?=$rest?>&idRestaurant=<?=$review->idRestaurant?>&id=<?=$review->id?>" method="post" class="add-comment" enctype="multipart/form-data">
                        <input class="form-control" placeholder="Adicione um comentário..."
                               name="comment" id="comment" required/>

                        <button type="submit">Publicar</button>
                    </form> <?php
                } ?>


                </div>
                </section>
            </article>
        <?php }

        ?>
    </section>

<?php } ?>