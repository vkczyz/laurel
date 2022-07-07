<?php include "templates/header.php"; ?>

<?php $user = $_GET["id"]; ?>

<h2>User</h2>

<h3><?php echo $user; ?></h3>

<?php
  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT register_date FROM users WHERE username = :username");
  $stmt->bindValue(':username', $user, SQLITE3_TEXT);
  $register_date = $stmt->execute()->fetchArray()['register_date'];

  if ($register_date) {
    echo "<p>Joined " . date("Y-m-d H:i:s", $register_date) . " UTC</p>";
  } else {
    echo "<p>This user does not exist</p>";
  }
?>

<?php include "templates/footer.html"; ?>
