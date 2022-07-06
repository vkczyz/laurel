<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
    die();
  }

  $user = $_SESSION['user'];
  $reply = $_POST['reply'];
  $parent = $_POST['parent'];

  $db = new SQLite3("../data.db");
  $stmt = $db->prepare("INSERT INTO posts (author, message, parent, publish_date) VALUES (:author, :message, :parent, :publish_date)");
  $stmt->bindValue(':author', $user, SQLITE3_TEXT);
  $stmt->bindValue(':message', $reply, SQLITE3_TEXT);
  $stmt->bindValue(':parent', $parent, SQLITE3_INTEGER);
  $stmt->bindValue(':publish_date', date("U"), SQLITE3_INTEGER);
  $stmt->execute();

  header("Location: /index.php?id=" . $parent);
  die();
?>
