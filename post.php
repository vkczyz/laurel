<?php include "templates/header.php"; ?>

<h2>Post</h2>

<?php
if (!isset($_SESSION['user'])) {
  header("Location: /login.php");
  die();
}

$parent = $_GET["id"];

if ($parent) {
  echo "<p>Replying to:";

  echo "<blockquote>";

  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT message FROM posts WHERE id = :id");
  $stmt->bindValue(":id", $parent, SQLITE3_INTEGER);
  $result = $stmt->execute()->fetchArray();
  $message = $result["message"];

  # Display user message
  $paragraphs = explode("\n", $message);
  foreach ($paragraphs as $p) {
    echo '<p>' . $p . '</p>';
  }

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
