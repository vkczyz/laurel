<?php session_start(); ?>
<?php include "templates/header.html"; ?>
<?php include "templates/post.php"; ?>

<p>Welcome to the Laurel forum.</p>

<?php
  if (isset($_SESSION['user'])) {
    echo ("<p>You are logged in as <a href='/users.php?id=" . $_SESSION['user'] . "'>" . $_SESSION['user'] . "</a></p>");
  } else {
    echo "<p>You must log in to post content</p>";
  }

  $db = new SQLite3("data.db");
  $result = $db->query("SELECT id FROM posts WHERE parent = 0 ORDER BY publish_date DESC LIMIT 10");

  while ($data = $result->fetchArray()) {
    $id = $data["id"];
    post($id);
  }
?>

<?php include "templates/footer.html"; ?>
