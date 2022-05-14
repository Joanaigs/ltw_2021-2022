<?php

    declare(strict_types = 1);

    require_once('database/user.class.php');

    function drawProfile(User $user) { ?>
    <h2>Perfil</h2>
        <img src = "profile_pic.png" alt="Profile picture">

        <div class="username">
            Username: <?=$user->username?>
        </div>

        <div class="email">
            Email: <?=$user->email?>
        </div>

        <div class="address">
            Endereço: <?=$user->address?>
        </div>

        <div class="phoneNumber">
            Número de telemóvel: <?=$user->phoneNumber?>
        </div>

        <input formaction="../edit_profile.php" formmethod="get" type="submit" value="Editar"></input>

        <?php
    }

    function editProfileForm(User $user) { ?>
    <h2>Perfil</h2>
    <form action="edit_profile.php" method="post" class="profile">
        <img src = "profile_pic.png" alt="Profile picture">

        <label for="Username">Username:</label>
        <input id="username" type="text" name="username" value="<?=$user->username?>">

        <label for="Email">Email:</label>
        <input id="email" type="text" name="email" value="<?=$user->email?>">

        <label for="Address">Endereço:</label>
        <input id="address" type="text" name="address" value="<?=$user->address?>">

        <label for="Phone number">Número de telemóvel:</label>
        <input id="phoneNumber" type="text" name="phoneNumber" value="<?=$user->phoneNumber?>">
        <button type="submit">Salvar</button>
    </form>
    <?php
    }

    function drawLatestOrders(PDO $db, User $user) { ?>
        <h3>Pedidos anteriores</h3>
        <section id="latestOrders">
            <?php
            $dishes = User::getOrders($db, $user->id);
            if($dishes != null) {
                foreach($dishes as $dish) { ?>
                    <order>
                    <?php echo ($dish->name) ?>
                    <br>
                    </order>
                <?php }
                }
            }?>
        </section>