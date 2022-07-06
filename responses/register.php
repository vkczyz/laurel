<?php
  $user = $_POST['user'];
  $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

  $db = new SQLite3("../data.db");
  $stmt = $db->prepare("INSERT INTO users (username, password, register_date) VALUES (:username, :password, :register_date)");
  $stmt->bindValue(':username', $user, SQLITE3_TEXT);
  $stmt->bindValue(':password', $hash, SQLITE3_BLOB);
  $stmt->bindValue(':register_date', date("U"), SQLITE3_INTEGER);
  $stmt->execute();

  header("Location: /login.php");
  die();
?>
