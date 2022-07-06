<?php
  session_start();

  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $db = new SQLite3("../data.db");
  $stmt = $db->prepare("SELECT password FROM users WHERE username = :username");
  $stmt->bindValue(':username', $user, SQLITE3_TEXT);
  $hash = $stmt->execute()->fetchArray()['password'];

  if (password_verify($pass, $hash)) {
    $_SESSION['user'] = $user;
    header("Location: /index.php");
    die();
  } else {
    header("Location: /login.php");
    die();
  }
?>

