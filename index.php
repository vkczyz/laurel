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
      <h1>Laurel</h1>
      <nav>
        <a href="/login.php">Login</a>
        <a href="/rules.php">Rules</a>
      </nav>
    </header>
    <main>
      <p>Welcome to the Laurel forum.</p>
      <?php
        for ($x = 0; $x <= rand(0,3); $x++) {
          include "post.php";
        }
      ?>
    </main>
    <footer>
      <address>
      </address>
    </footer>
  </body>
</html>
