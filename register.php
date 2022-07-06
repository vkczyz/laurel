<?php include "templates/header.html"; ?>

<h2>Register</h2>

<form action="/responses/register.php" method="post">
  <label for="user">Username:</label>
  <input type="text" id="user" name="user"/>
  <br/>

  <label for="password">Password:</label>
  <input type="password" id="pass" name="pass"/>
  <br/>

  <input type="checkbox" id="agree" name="agree"/>
  <label for="agree">I agree to be on my best behaviour</label>
  <br/>

  <input type="submit" value="Submit"/>
</form>

<?php include "templates/footer.html"; ?>
