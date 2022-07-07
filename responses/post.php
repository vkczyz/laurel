<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
    die();
  }

  $user = $_SESSION['user'];
  $message = $_POST['message'];
  $parent = $_POST['parent'];

  $db = new SQLite3("../data.db");
  $stmt = $db->prepare("INSERT INTO posts (author, message, parent, publish_date) VALUES (:author, :message, :parent, :publish_date)");
  $stmt->bindValue(':author', $user, SQLITE3_TEXT);
  $stmt->bindValue(':message', $message, SQLITE3_TEXT);
  $stmt->bindValue(':parent', $parent, SQLITE3_INTEGER);
  $stmt->bindValue(':publish_date', date("U"), SQLITE3_INTEGER);
  $stmt->execute();

  if ($parent) {
    header("Location: /index.php?id=" . $parent);
    die();
  } else {
    header("Location: /index.php");
    die();
  }
?>
