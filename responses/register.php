<?php
  $agree = $_POST['agree'];

  if (!$agree) {
    header("Location: /register.php");
    die();
  }

  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];

  if ($pass != $pass2) {
    header("Location: /register.php");
    die();
  }

  $hash = password_hash($pass, PASSWORD_DEFAULT);

  $db = new SQLite3("../data.db");
  $stmt = $db->prepare("INSERT INTO users (username, password, register_date) VALUES (:username, :password, :register_date)");
  $stmt->bindValue(':username', $user, SQLITE3_TEXT);
  $stmt->bindValue(':password', $hash, SQLITE3_BLOB);
  $stmt->bindValue(':register_date', date("U"), SQLITE3_INTEGER);
  $stmt->execute();

  header("Location: /login.php");
  die();
?>
