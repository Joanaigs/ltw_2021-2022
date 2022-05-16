<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="javascript/heart.js" defer></script>
      <script src="javascript/restaurantSearch.js" defer></script>
      <link rel="stylesheet" href="css/style.css">
      <script src="javascript/restaurantFilter.js" defer></script>
  </head>
  <body>

    <header>
      <h1><a href="main_page.php">Maju</a></h1>
        <form>
            <button type="submit"><a href="register.php">Login/Register</a></button>
        </form>
    </header>
    <main>
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
    <h1><a href="main_page.php">Maju</a></h1>

    <form>
        <button type="submit"><a href="register.php">Login/Register</a></button>
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


