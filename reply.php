<?php session_start(); ?>
<?php include "templates/header.html"; ?>

<?php
if (!isset($_SESSION['user'])) {
  header("Location: /login.php");
  die();
}
?>

<p>Replying to post <?php echo $_GET["id"]; ?>:</p>

<blockquote>
<?php
    echo file_get_contents("templates/lorem.html");
    echo file_get_contents("templates/lorem.html");
?>
</blockquote>

<form action="/responses/reply.php" method="post">
  <label for="reply">Reply:</label>
  <textarea id="reply" name="reply"></textarea>
  <input type="hidden" id="parent" name="parent" value="<?php echo $_GET["id"]; ?>"/>
  <input type="submit" value="Submit"/>
</form>

<?php include "templates/footer.html"; ?>
