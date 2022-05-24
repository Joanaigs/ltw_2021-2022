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

        <button class="edit-profile-btn" name="editProfileButton" onclick="window.location.href = '../edit_profile.php';">Editar</button>
        <?php
    }

    function editProfileForm(User $user) { ?>
    <h2>Perfil</h2>
    <form action="../edit_profile.php" method="post" class="profile">
        <img src = "profile_pic.png" alt="Profile picture">

        <label for="username">Username:</label>
        <input id="username" type="text" name="username" value="<?=$user->username?>">

        <label for="email">Email:</label>
        <input id="email" type="text" name="email" value="<?=$user->email?>">

        <label for="address">Morada:</label>
        <input id="address" type="text" name="address" value="<?=$user->address?>">

        <label for="phoneNumber">Número de telemóvel:</label>
        <input id="phoneNumber" type="text" name="phoneNumber" value="<?=$user->phoneNumber?>">

        <label for="password">Palavra-passe:</label>
        <input id="password" type="password" name="password">

        <label for="confirm_password">Confirmar palavra-passe:</label>
        <input id="confirm_password" type="password" name="confirm_password">
        <input type="submit" name="saveEdit" class="btn solid" value="Salvar" formmethod="post">
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