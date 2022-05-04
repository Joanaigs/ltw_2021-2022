<?php

    declare(strict_types = 1);

    require_once('database/user.class.php');

    function drawProfileForm(User $user) { ?>
    <h2>Perfil</h2>
    <form action="action_edit_profile.php" method="post" class="profile">
        <img src = "profile_pic.png" alt="Profile picture">

        <label for="Username">Username:</label>
        <input id="username" type="text" name="username" value="<?=$user->username?>">

        <label for="Email">Email:</label>
        <input id="email" type="text" name="email" value="<?=$user->email?>">

        <label for="Address">Endereço:</label>
        <input id="address" type="text" name="address" value="<?=$user->address?>">

        <label for="Phone number">Número de telemóvel:</label>
        <input id="phoneNumber" type="text" name="phoneNumber" value="<?=$user->phoneNumber?>">
        <button type="submit">Save</button>
    </form>
        <h3>Pedidos anteriores</h3>
        <section id="latestOrders">
            <?php foreach($pedidos as $pedido) { ?>
                <article>
                    <img src="https://picsum.photos/200?<?=$artist->id?>">
                    <a href="artist.php?id=<?=$artist->id?>"><?=$artist->name?></a>
                </article>
            <?php } ?>
        </section>
<?php } ?>