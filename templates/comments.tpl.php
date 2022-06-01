<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
?>


<?php function drawComments(array $reviews, PDO $db, Session $session, int $rest)
{ ?><!DOCTYPE html>

    <section id="reviews">
        <?php foreach ($reviews as $review) {?>
            <article class="review">

                <?php $user = User::getUser($db, $review->idUser) ?>
                <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                <h2> <?= $user->username ?> </h2>
                <h3> <?= $review->date ?> </h3>
                <div class="ratingFixed">
                    <span class="fa fa-star <?php if ($review->rating >= 1) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($review->rating >= 2) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($review->rating >= 3) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($review->rating >= 4) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($review->rating >= 5) echo "checked" ?>"></span>
                </div>
                <a> <?= $review->review ?> </a>


                <?php $comments = Comment::getComments($db, $review->id);
                if (!empty($comments)) {?>
                    <h3> Comentários: </h3><?php

                    foreach ($comments as $comment) { ?>
                            <div class="comment">
                        <?php
                        if ($comment->fromRestaurant === 1) {
                            $restaurant = Restaurant::getRestaurant($db, $comment->idRestaurant); ?>
                            <h3>Owner</h3>
                            <img src="https://picsum.photos/100/100?.<?= $restaurant->name ?>" alt="">
                            <h3> <?= $restaurant->name ?> </h3>
                            <h4> <?= $comment->date ?> </h4>
                            <a> <?= $comment->comment ?> </a> <?php
                        } else { ?>
                            <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                            <h3> <?= $user->username ?> </h3>
                            <h4> <?= $comment->date ?> </h4>
                            <a> <?= $comment->comment ?> </a>
                        <?php }?>
                            </div><?php
                    }
                }
                if ($session->getId() === $user->id) { ?>
                    <h3>Comentar:</h3>
                    <form method="post" class="review" enctype="multipart/form-data">
                        <textarea class="form-control" rows="2" placeholder="Escreve aqui a teu comentário..."
                                  name="comment" id="comment" required></textarea>
                        <br>
                        <button type="submit">Enviar</button>
                    </form> <?php
                    if (isset($_POST["comment"])) {
                        $date = date("d-m-Y");
                        Comment::addComment($db, $review->id, $rest, $date, $_POST["comment"]);
                        if($rest===0)
                            header("Location: restaurant.php?id=$review->idRestaurant");
                        else
                            header("Location: comments.php?id=$review->idRestaurant");
                    }
                } ?>
            </article>
        <?php }

        ?>
    </section>

<?php } ?>