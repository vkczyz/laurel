<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /login.php");
    die();
  }

  $user = $_SESSION['user'];
  $post = $_GET["id"];

  $db = new SQLite3("../data.db");

  $stmt = $db->prepare("SELECT sentiment FROM interaction WHERE user = :user AND post = :post");
  $stmt->bindValue(':user', $user, SQLITE3_TEXT);
  $stmt->bindValue(':post', $post, SQLITE3_INTEGER);
  $current_vote = $stmt->execute()->fetchArray()["sentiment"];

  if ($current_vote == 1) {
    # Remove existing upvote
    $stmt = $db->prepare("DELETE FROM interaction WHERE user = :user AND post = :post");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':post', $post, SQLITE3_INTEGER);
    $stmt->execute();
  } elseif ($current_vote == -1) {
    # Replace existing downvote with upvote
    $stmt = $db->prepare("DELETE FROM interaction WHERE user = :user AND post = :post");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':post', $post, SQLITE3_INTEGER);
    $stmt->execute();

    $stmt = $db->prepare("INSERT INTO interaction (user, post, sentiment) VALUES (:user, :post, :sentiment)");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':post', $post, SQLITE3_INTEGER);
    $stmt->bindValue(':sentiment', 1, SQLITE3_INTEGER);
    $stmt->execute();
  } else {
    # Add upvote
    $stmt = $db->prepare("INSERT INTO interaction (user, post, sentiment) VALUES (:user, :post, :sentiment)");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':post', $post, SQLITE3_INTEGER);
    $stmt->bindValue(':sentiment', 1, SQLITE3_INTEGER);
    $stmt->execute();
  }

  header("Location: /index.php#" . $post);
  die();
?>
