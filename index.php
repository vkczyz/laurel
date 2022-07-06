<?php session_start(); ?>
<?php include "templates/header.html"; ?>

<p>Welcome to the Laurel forum.</p>
<?php
  if (isset($_SESSION['user'])) {
    echo ("<p>You are logged in as <a href='/users.php?id=" . $_SESSION['user'] . "'>" . $_SESSION['user'] . "</a></p>");
  } else {
    echo "<p>You must log in to post content</p>";
  }

  for ($x = 0; $x <= rand(0,3); $x++) {
    include "templates/post.php";
  }
?>

<?php include "templates/footer.html"; ?>
