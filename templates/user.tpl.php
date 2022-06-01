<?php

declare(strict_types=1);

require_once('database/user.class.php');
require_once('database/dish.class.php');
require_once('database/order.class.php');
require_once('database/restaurant.class.php');
require_once('templates/common.tpl.php');

function drawLatestOrders(Session $session, PDO $db, User $user)
{ ?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <div class="grid-container-profile">
        <?php drawSidebar(); ?>
        <div class="last-orders">
            <h2>Pedidos anteriores</h2>
            <section class="dishes">
                <?php
                $orders = Order::getOrdersUser($db, $user->id);
                if ($orders != null) {
                    foreach ($orders as $order) {
                        $dishes=Dish::dishOrder($db, $order->id);
                        $restaurant = Restaurant::getRestaurant($db, $order->idRestaurant); ?>
                        <h3> <?= $restaurant->name ?></h3>
                        <h4> Data: <?= $order->date ?></h4>
                        <h4> Endereço de entrega: <?= $order->address ?></h4>
                        <?php
                        foreach ($dishes as $dish) {?>
                            <section class="info-dish">
                                <img src="<?= $dish->photo ?>?id=<?= $dish->id ?>" alt="">
                                <div class="text">
                                    <h4> <?= $dish->name ?></h4>
                                    <p class="info"> <?= $dish->price ?> €</p>
                                </div>
                            </section>
                        <?php }?>
                            <br>
                        <h4> Estado do pedido: <?= $order->state ?></h4><?php
                    }
                }
                ?>
            </section>
        </div>
    </div>
<?php }

function drawProfile($user)
{ ?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <div class="grid-container-profile">
        <?php drawSidebar(); ?>
        <div class="profile-info">
            <h2>Perfil</h2>
            <img src="profile_pic.png" alt="Profile picture">
            <div class="info">
                <span><label><i class="fas fa-user"></i>Nome de utilizador:</label><?= $user->username ?></span>
                <span><label><i class="fas fa-envelope"></i>Email: </label><?= $user->email ?></span>
                <span><label><i class="fas fa-home"></i>Endereço: </label><?= $user->address ?></span>
                <span><label><i class="fas fa-phone"></i>Número de telemóvel: </label><?= $user->phoneNumber ?></span>
            </div>
            <button class="edit-profile-btn" name="editProfileButton"
                    onclick="window.location.href = '../edit_profile_action.php';">Editar
            </button>
        </div>
    </div>
<?php }

function editProfileForm(User $user)
{ ?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <div class="grid-container-profile">
        <?php drawSidebar(); ?>
        <div class="edit-profile-info">
            <form action="../formEditProfile.php" method="post" class="edit-profile">
                <h2 class="title">Editar Perfil</h2>
                <img src="profile_pic.png" alt="Profile picture">

                <div class="input-field">
                    <label><i class="fas fa-user"></i>Nome de utilizador:</label>
                    <input type="text" name="username" value="<?= $user->username ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-envelope"></i>Email: </label>
                    <input type="text" name="email" value="<?= $user->email ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-home"></i>Endereço: </label>
                    <input type="text" name="address" placeholder="<?= $user->address ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-phone"></i>Número de telemóvel: </label>
                    <input type="text" name="phoneNumber" placeholder="<?= $user->phoneNumber ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-lock"></i>Palavra-passe: </label>
                    <input type="password" name="password" placeholder="Editar palavra-passe"/>
                </div>
                <p class="warning">A palavra-passe deve conter no mínimo 5 caracteres e incluir letras e números</p>
                <div class="input-field">
                    <label><i class="fas fa-lock"></i>Palavra-passe: </label>
                    <input type="password" name="confirm_password" placeholder="Confirmar palavra-passe"/>
                </div>

                <input type="submit" name="saveEdit" class="btn-solid" value="Salvar" formmethod="post">
            </form>
        </div>
    </div>
    <?php
}
