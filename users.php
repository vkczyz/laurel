<?php
  include "templates/header.php";
  $user = $_GET["id"];
?>

<h2>User</h2>

<h3><?php echo $user; ?></h3>

<?php
  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT EXISTS(SELECT * FROM users WHERE username = :username)");
  $stmt->bindValue(':username', $user, SQLITE3_TEXT);
  $exists = $stmt->execute()->fetchArray()[0];

  if ($exists) {
    $stmt = $db->prepare("SELECT COUNT(*) FROM posts WHERE author = :username");
    $stmt->bindValue(':username', $user, SQLITE3_TEXT);
    $post_count = $stmt->execute()->fetchArray()[0];

    echo "<p>Posts: " . $post_count . "</p>";

    $stmt = $db->prepare("SELECT register_date FROM users WHERE username = :username");
    $stmt->bindValue(':username', $user, SQLITE3_TEXT);
    $register_date = $stmt->execute()->fetchArray()['register_date'];

    echo "<p>Joined " . date("Y-m-d H:i:s", $register_date) . " UTC</p>";
  } else {
    echo "<p>This user does not exist</p>";
  }
?>

<?php include "templates/footer.html"; ?>
