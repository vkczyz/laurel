<?php include "templates/header.html"; ?>

<p>Welcome to the Laurel forum.</p>
<?php
  for ($x = 0; $x <= rand(0,3); $x++) {
    include "templates/post.php";
  }
?>

<?php include "templates/footer.html"; ?>
