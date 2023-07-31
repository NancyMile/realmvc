<?php
  ini_set('display_errors','Off');
  if(!isset($_SESSION)){
    session_start();
  }
  //var_dump($_SESSION)
  $auth = $_SESSION['login'] ?? false;
  //var_dump($auth);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Real State</title>
    <link rel="stylesheet" href="/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $home ? 'home': ''; ?>">
      <div class="contenedor header-content">
        <div class="bar">
          <a href="/">
            <img src="/build/img/logo.svg" alt="logo" />
          </a>
          <div class="menu-mobile">
            <img src="/build/img/barras.svg" alt="menu">
          </div>
          <div class="right">
            <img class="dark-mode-button" src="/build/img/dark-mode.svg">
            <nav class="navigation">
              <a href="about.php">About</a>
              <a href="advert.php">Adverts</a>
              <a href="blog.php">Blog</a>
              <a href="contact.php">Contact Us</a>
              <?php if($auth): ?>
                <a href="close-session.php">Log out</a>
                <?php else: ?>
                <a href="login.php">Login</a>
              <?php endif; ?>
            </nav>
          </div>
        </div>
        <?php echo $home? '<h1>Sales</h1>': ''; ?>
      </div>
    </header>