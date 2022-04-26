<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Music Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <header>
      <h1><a href="main_page.php">Maju</a></h1>
        <div class="topnav">
            <a class="active" href="#home"></a>
            <input type="text" placeholder="Search..">
        </div>
        <div class="h_container">
            <i id="heart" class="far fa-heart"></i>
        </div>
        <div id="section">
            <?php
            if ($_SESSION['id']) drawLogoutForm($_SESSION['name']);
            else drawLoginForm();
            ?>
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