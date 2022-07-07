<?php session_start(); ?>
<?php include "templates/header.html"; ?>

<?php
if (!isset($_SESSION['user'])) {
  header("Location: /login.php");
  die();
}

$parent = $_GET["id"];

if ($parent) {
  echo "<p>Replying to:";

  echo "<blockquote>";
  echo file_get_contents("templates/lorem.html");
  echo file_get_contents("templates/lorem.html");
  echo "</blockquote>";
}
?>

<form action="/responses/post.php" method="post">
  <label for="message">Message:</label>
  <textarea id="message" name="message"></textarea>
  <input type="hidden" id="parent" name="parent" value="<?php echo $parent; ?>"/>
  <input type="submit" value="Submit"/>
</form>

<?php include "templates/footer.html"; ?>
