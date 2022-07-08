<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>    
    <title>Laurel</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="/style.css"/>
  </head>
  <body>
    <header>
      <h1><a href="/index.php">Laurel</a></h1>
      <nav>
        <div class="left">
          <a href="/post.php">Post</a>
          <a href="/rules.php">Rules</a>
        </div>
        <div class="right">
          <?php
            if (isset($_SESSION['user'])) {
              $user = $_SESSION['user'];
          ?>
              <a href="/responses/logout.php">Log out</a>
              <a href="/users.php?id=<?php echo $user; ?>"><?php  echo $user; ?></a>
          <?php
            } else {
              echo '<a href="/login.php">Login</a>';
            }
          ?>
        </div>
      </nav>
    </header>
    <main>
