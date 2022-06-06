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
        <?php $restaurant = Restaurant::hasRestaurant($db, $session->getId());
        drawSidebar($restaurant); ?>
        <div class="last-orders">
            <h2>Pedidos anteriores</h2>
            <section class="dishes-lt">
                <?php
                $orders = Order::getOrdersUser($db, $user->id);
                if ($orders != null) {
                    foreach ($orders as $order) {
                        $dishes = Dish::dishOrder($db, $order->id);
                        $restaurant = Restaurant::getRestaurant($db, $order->idRestaurant); ?>
                        <section class="info-order">
                            <h3> <?= $restaurant->name ?></h3>
                            <p><label>Data: </label><?= $order->date ?></p>
                            <p><label>Endereço de entrega: </label><?= $order->address ?></p>
                            <p><label>Estado do pedido: </label><?= $order->state ?></p>
                        </section>
                        <div class="order">
                            <?php
                            $total = 0;
                            foreach ($dishes as $dish) {
                                $total += $dish->price * $dish->number ?>
                                <section class="info-dish">
                                    <section class="image">
                                        <img src="../images/dishes/<?=$dish->image?>.jpg" alt="">
                                    </section>
                                    <section class="text">
                                        <h4> <?= $dish->name ?> x<?= $dish->number ?></h4>
                                        <p class="info"> <?= $dish->price * $dish->number ?> €</p>
                                    </section>
                                </section>
                            <?php } ?>
                        </div>
                        <p id="price"><label>Preço total do pedido: </label><?= $total ?>€</p>
                    <?php }
                }
                ?>
            </section>
        </div>
    </div>
<?php }


function drawProfile($user, $restaurant)
{ ?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <div class="grid-container-profile">
        <?php drawSidebar($restaurant); ?>
        <div class="profile-info">
            <h2>Perfil</h2>
            <img src="../images/profiles/<?= $user->image ?>.jpg" alt="Profile picture">
            <div class="info">
                <span><label><i class="fas fa-user"></i>Nome utilizador:</label><?= $user->username ?></span>
                <span><label><i class="fas fa-envelope"></i>Email: </label><?= $user->email ?></span>
                <span><label><i class="fas fa-home"></i>Endereço: </label><?= $user->address ?></span>
                <span><label><i class="fas fa-phone"></i>Número telemóvel:</label><?= $user->phoneNumber ?></span>
            </div>
            <button class="edit-profile-btn" name="editProfileButton"
                    onclick="window.location.href = '../edit_profile_action.php';">Editar
            </button>
        </div>
    </div>
<?php }

function editProfileForm(User $user, $restaurant)
{ ?>
    <link rel="stylesheet" href="../css/profile.css"/>
    <div class="grid-container-profile">
        <?php drawSidebar($restaurant); ?>
        <div class="edit-profile-info">
            <form action="../formEditProfile.php" method="post" class="edit-profile" enctype="multipart/form-data">
                <h2 class="title">Editar Perfil</h2>
                <div class="input-field">
                    <label for="imageRestaurant">Imagem:</label>
                    <input type="file" name="image" accept="image/png,image/jpeg">
                </div>
                <div class="input-field">
                    <label><i class="fas fa-user"></i>Nome utilizador:</label>
                    <input type="text" name="username" value="<?= $user->username ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-envelope"></i>Email: </label>
                    <input type="text" name="email" value="<?= $user->email ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-home"></i>Morada: </label>
                    <input type="text" name="address" placeholder="<?= $user->address ?>"/>
                </div>

                <div class="input-field">
                    <label><i class="fas fa-phone"></i>Número telemóvel: </label>
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
                <button class="erase-profile-btn" name="eraseProfileButton"
                        onclick="window.location.href = '../eraseProfile.php';">Apagar Conta
                </button>
        </div>
    </div>
    <?php
}
