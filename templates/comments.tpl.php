<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/review.class.php');
?>


<?php function drawComments(array $review, PDO $db, Session $session, int $rest)
{ ?><!DOCTYPE html>

    <section id="reviews">
        <?php foreach ($review as $r) {
            $user = User::getUser($db, $r->idUser) ?>
            <section id="review">
                <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                <h2> <?= $user->username ?> </h2>
                <h3> <?= $r->date ?> </h3>
                <div class="ratingFixed">
                    <span class="fa fa-star <?php if ($r->rating >= 1) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($r->rating >= 2) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($r->rating >= 3) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($r->rating >= 4) echo "checked" ?>"></span>
                    <span class="fa fa-star <?php if ($r->rating >= 5) echo "checked" ?>"></span>
                </div>
                <a> <?= $r->review ?> </a>
                <?php $comments = Comment::getComments($db, $r->id);
                if (!empty($comments)) { ?>
                    <h3> Comentários: </h3><?php
                    foreach ($comments as $c) {
                        if ($c->fromRestaurant === 1) {
                            $restaurant = Restaurant::getRestaurant($db, $c->idRestaurant); ?>
                            <h3>Owner</h3>
                            <img src="https://picsum.photos/100/100?.<?= $restaurant->name ?>" alt="">
                            <h3> <?= $restaurant->name ?> </h3>
                            <h4> <?= $c->date ?> </h4>
                            <a> <?= $c->comment ?> </a> <?php
                        } else { ?>
                            <img src="https://picsum.photos/100/100?.<?= $user->username ?>" alt="">
                            <h3> <?= $user->username ?> </h3>
                            <h4> <?= $c->date ?> </h4>
                            <a> <?= $c->comment ?> </a> <?php
                        }
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
                        Comment::addComment($db, $r->id, $rest, $date, $_POST["comment"]);
                        if ($rest === 0)
                            header("Location: restaurant.php?id=$r->idRestaurant");
                        else
                            header("Location: comments.php?id=$r->idRestaurant");
                    }
                } ?>
            </section>
        <?php }

        ?>
    </section>

<?php } ?>