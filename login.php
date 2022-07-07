<?php include "templates/header.php"; ?>

<h2>Login</h2>

<form action="/responses/login.php" method="post">
  <label for="user">Username:</label>
  <input type="text" id="user" name="user"/>
  <br/>

  <label for="password">Password:</label>
  <input type="password" id="pass" name="pass"/>
  <br/>

  <input type="submit" value="Submit"/>
</form>

<a href="/register.php">Register</p>

<?php include "templates/footer.html"; ?>
