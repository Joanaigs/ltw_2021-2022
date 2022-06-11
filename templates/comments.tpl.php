<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
?>


<?php function drawComments(array $reviews, PDO $db, Session $session, int $rest)
{ ?><!DOCTYPE html>

    <section class="reviews">
        <?php foreach ($reviews as $review) { ?>
            <article class="review">

                <?php $user = User::getUser($db, $review->idUser);
                $restaurant = Restaurant::getRestaurant($db, $review->idRestaurant) ?>
                <div class="review-info">

                    <div class="flex-left">
                        <img src="../images/profiles/<?= $user->image ?>.jpg" alt="">
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
                        <?php if ($session->getId() === $user->id && $rest === 0) { ?>

                            <button class="fas fa-trash-alt" name="eraseReview"
                                    onclick="window.location.href = '../eraseReview.php?id=<?= $review->id ?>&idRestaurant=<?= $review->idRestaurant ?>';"></button>
                            <button onclick="editReview(<?= $review->id ?>)" name="editReview"
                                    class="fas fa-pencil"></button>
                        <?php } ?>
                    </div>
                </div>

                <section class="showReview" id="<?= $review->id ?>">
                    <p> <?= $review->review ?> </p>
                </section>
                <section class="editReview" id="<?= $review->id ?>" style="display: none">
                    <form action="../editReview.php?idReview=<?= $review->id ?>&idRestaurant=<?= $review->idRestaurant ?>"
                          method="post"
                          class="editReview">
                        <input type="hidden" name="csrf" value="<?= $session->getcsrf() ?>">

                        <div id="editRate">
                            <input type="radio" id="star5<?= $review->id ?>" name="rating"
                                   value=5 <?php if ($review->rating == 5) echo "checked" ?>/>
                            <label for="star5<?= $review->id ?>" title="text">5 stars</label>
                            <input type="radio" id="star4<?= $review->id ?>" name="rating"
                                   value=4 <?php if ($review->rating == 4) echo "checked" ?>/>
                            <label for="star4<?= $review->id ?>" title="text">4 stars</label>
                            <input type="radio" id="star3<?= $review->id ?>" name="rating"
                                   value=3 <?php if ($review->rating == 3) echo "checked" ?>/>
                            <label for="star3<?= $review->id ?>" title="text">3 stars</label>
                            <input type="radio" id="star2<?= $review->id ?>" name="rating"
                                   value=2 <?php if ($review->rating == 2) echo "checked" ?>/>
                            <label for="star2<?= $review->id ?>" title="text">2 stars</label>
                            <input type="radio" id="star1<?= $review->id ?>" name="rating"
                                   value=1 <?php if ($review->rating == 1) echo "checked" ?>/>
                            <label for="star1<?= $review->id ?>" title="text">1 star</label>
                        </div>
                        <input id="edit_review" type="text" name="edit_review" value="<?= $review->review ?>">
                        <button name="editReview"> Guardar</button>
                    </form>
                </section>


                <section class="comments">
                    <?php $comments = Comment::getComments($db, $review->id);
                    if (!empty($comments)) { ?>

                        <?php foreach ($comments as $comment) { ?>
                            <div class="comment">

                                <?php if ($comment->fromRestaurant === 1) {
                                    $restaurant = Restaurant::getRestaurant($db, $comment->idRestaurant); ?>

                                    <div class="flex-left">
                                        <img src="../images/restaurants/<?= $restaurant->image ?>.jpg" alt="">
                                        <div class="review-profile-info">
                                            <h4>Restaurante</h4>
                                            <h2> <?= $restaurant->name ?> </h2>
                                            <h3> <?= $comment->date ?> </h3>
                                        </div>
                                    </div>

                                    <div class="flex-right">
                                        <section class="showComment" id="<?= $comment->id ?>" style="display: block">
                                            <p> <?= $comment->comment ?> </p>
                                        </section>
                                        <section class="editComment" id="<?= $comment->id ?>" style="display: none">
                                            <form action="../editComment.php?idComment=<?= $comment->id ?>&idRestaurant=<?= $review->idRestaurant ?>&type=<?= $rest ?>"
                                                  method="post"
                                                  class="review">
                                                <input id="edit_comment" type="text" name="edit_comment"
                                                       value=" <?= $comment->comment ?> ">
                                                <button name="editComment"> Guardar</button>
                                            </form>
                                        </section>
                                        <?php if ($session->getId() === $restaurant->idUser && $rest === 1) { ?>
                                            <button class="fas fa-trash-alt" name="eraseComment"
                                                    onclick="window.location.href = '../eraseComment.php?id=<?= $comment->id ?>&type=<?= $rest ?>&idRestaurant=<?= $review->idRestaurant ?>';">
                                            </button>
                                            <button onclick="editComment(<?= $comment->id ?>)" name="editReview"> Editar
                                            </button>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="flex-left">
                                        <img src="../images/profiles/<?= $user->image ?>.jpg" alt="">
                                        <div class="review-profile-info">
                                            <h2> <?= $user->username ?> </h2>
                                            <h3> <?= $comment->date ?> </h3>
                                        </div>
                                    </div>

                                    <div class="flex-right">

                                        <section class="showComment" id="<?= $comment->id ?>" style="display: block">
                                            <p> <?= $comment->comment ?> </p>
                                        </section>
                                        <section class="editComment" id="<?= $comment->id ?>" style="display: none">
                                            <form action="../editComment.php?idComment=<?= $comment->id ?>&idRestaurant=<?= $review->idRestaurant ?>&type=<?= $rest ?>"
                                                  method="post"
                                                  class="editComment" id="comment">
                                                <input id="edit_comment" type="text" name="edit_comment"
                                                       value=" <?= $comment->comment ?> ">
                                                <button name="editReview">Guardar</button>
                                            </form>
                                        </section>
                                        <?php if ($session->getId() === $user->id && $rest === 0) { ?>
                                            <button class="fas fa-trash-alt" name="eraseComment"
                                                    onclick="window.location.href = '../eraseComment.php?id=<?= $comment->id ?>&type=<?= $rest ?>&idRestaurant=<?= $review->idRestaurant ?>';">
                                            </button>
                                            <button onclick="editComment(<?= $comment->id ?>)" name="editReview"
                                                    class="fas fa-pencil"></button>
                                        <?php } ?>


                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="add-comment">
                        <?php if ($session->getId() === $user->id || $rest === 1) { ?>
                            <form action="../addComment.php?type=<?= $rest ?>&idRestaurant=<?= $review->idRestaurant ?>&id=<?= $review->id ?>"
                                  method="post" class="add-comment" enctype="multipart/form-data">
                                <input class="form-control" placeholder="Adicione um comentário..."
                                       name="comment" id="comment" required/>

                                <button type="submit">Publicar</button>
                            </form>
                        <?php } ?>
                    </div>
                </section>
            </article>
        <?php } ?>
    </section>
<?php } ?>