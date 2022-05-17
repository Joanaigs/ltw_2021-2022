<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Larica-Food Delivery Website</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />">
      <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <header>
        <a href="../main_page.php" class="logo"><i class="fas fa-utensils"></i>Larica</a>
        <nav class="navbar">
            <a class="active" href="../main_page.php">Restaurantes</a>
            <a href="#">Sobre</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="#" class="fas fa-heart"></a>
            <a href="../profile.php" class="fas fa-user"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
        </div>
    </header>
    <button class="login-register-btn" onclick="window.location.href = '../login_register.php';">Entrar
    </button>
    <script src="../javascript/restaurantFilter.js" defer></script>
    <script src="../javascript/heart.js" defer></script>
    <script src="../javascript/restaurantSearch.js" defer></script>
  <script src="../javascript/script.js/"></script>
  </body>
    <main>
<?php } ?>

<?php function drawRestViewHeader() { ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript/heart.js" defer></script>
    <script src="javascript/orderSelect.js" defer></script>

</head>
<body>

<header>
    <h1><a href="main_page.php">Larica</a></h1>

    <form>
        <button type="submit"><a href="register.php">Login/Register</a></button>
    </form>
    <div class="m_container">
        <i id="money" class="money"></i>
    </div>
    <div class=ordersSate">
        <a href="soon.php">Order Sate</a>
    </div>
    <div class=menu">
        <a href="soon.php">Menu</a>
    </div>
</header>
<main>
    <?php } ?>

<?php function drawFooter() { ?>
    </main>

    <footer>
      Best Restaurant &copy; 2022
    </footer>
  </body>
</html>
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


