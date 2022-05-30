<?php
declare(strict_types = 1);

require_once(__DIR__.'/../database/User.class.php');
require_once(__DIR__.'/../database/User.class.php');
?>


<?php function drawComments(array $review, PDO $db , Session $session) { ?><!DOCTYPE html>

    <section id="reviews">
        <?php foreach ($review as $r) {
            $user= User::getUser($db, $r->id)?>
        <section id="review">
            <img src="https://picsum.photos/100/100?.<?=$user->username?>"alt="">
            <h2> <?=$user->username?> </h2>

            <h3> </h3>
        </section>
        <?php }
        ?>
    </section>

<?php } ?>