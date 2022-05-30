<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>Larica-Food Delivery Website</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../css/style.css">
      <script src="javascript/heartDish.js" defer></script>
      <script src="javascript/heart.js" defer></script>
      <script src="javascript/scriptsMealFilter.js" defer></script>
      <script src="javascript/restaurantFilter.js" defer></script>
      <script src="javascript/restaurantSearch.js" defer></script>
      <script src="javascript/script.js" defer></script>

  </head>
  <body>
    <header>
        <a href="../main_page.php" class="logo"><i class="fas fa-utensils"></i>Larica</a>
        <nav class="navbar">
            <div class="search2">
                <div class="search-icon2"></div>
                <div class="input">
                    <input id="searchRest2" type="text" placeholder="Procurar restaurantes">
                </div>
                <span class="clear2" onclick="document.getElementById('searchRest2').value=''"></span>
            </div>
            <a class="active" href="../main_page.php">Restaurantes</a>
            <a href="#">Sobre</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="#" class="fas fa-heart"></a>

            <a href="../profile.php" class="fas fa-user"></a>
            <a href="../cart.php" class="fas fa-shopping-cart"></a>
            <button class="login-register-btn" onclick="window.location.href = '../login_register.php';">Entrar</button>
        </div>
    </header>

  </body>
<?php } ?>

<?php function drawRestViewHeader($id) { ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript/heart.js" defer></script>
    <script src="javascript/orderSelect.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<header>
    <h1><a href="main_page.php">Larica</a></h1>

    <form>
        <button type="submit"><a href="main_page">Login/Register</a></button>
    </form>
    <div class="m_container">
        <i id="money" class="money"></i>
    </div>
    <div class=ordersSate">
        <a href="state.php?id=<?=$id?>">Order Sate</a>
    </div>
    <div class=menu">
        <a href="restView.php?id=<?=$id?>">Menu</a>
    </div>
</header>
<main>
    <?php } ?>

<?php function drawFooter() { ?>
    <link rel="stylesheet" href="css/style.css">
    <footer>
        <div class="box-container">
            <div class="box">
                <h3>Links</h3>
                <a href="../main_page.php">Página inicial</a>
                <a href="#">Sobre</a>
                <a href="#">Carrinho</a>
            </div>

            <div class="box">
                <h3>Contacte-nos</h3>
                <a href="#">+351 909878987</a>
                <a href="#">up202007620@edu.fe.up.pt</a>
                <a href="#">up202007623@edu.fe.up.pt</a>
                <a href="#">up202006279@edu.fe.up.pt</a>
            </div>

            <div class="box">
                <h3>Siga-nos</h3>
                <a href="https://github.com/matildesequeira">GitHub - @matildesequeira</a>
                <a href="https://github.com/marianaosiecka">GitHub - @marianaosiecka</a>
                <a href="https://github.com/Joanaigs">GitHub - @Joanaigs</a>
            </div>
        </div>
        <div class="credit"> &copy; Larica LTW 2021/2022 - All rights reserved </div>
    </footer>
<?php } ?>

<?php function drawLoginForm() { ?>
  <form action="action_login.php" method="post" class="login">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <a href="register.php">Register</a>
    <button type="submit">Login</button>
  </form>
<?php } ?>

<?php function drawLogoutForm(string $name) { ?>
  <form action="action_logout.php" method="post" class="logout">
    <a href="profile.php"><?=$name?></a>
    <button type="submit">Logout</button>
  </form>
<?php } ?>