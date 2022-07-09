<?php include "templates/header.php"; ?>
<?php include "templates/post.php"; ?>

<p>Welcome to the Laurel forum.</p>

<?php
  if (isset($_SESSION['user'])) {
    echo ("<p>You are logged in as <a href='/users.php?id=" . $_SESSION['user'] . "'>" . $_SESSION['user'] . "</a></p>");
  } else {
    echo "<p>You must log in to post content</p>";
  }

  $page = $_GET["page"] ?? 0;
  $limit = 10;

  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT id FROM posts WHERE parent = 0 ORDER BY publish_date DESC LIMIT :limit OFFSET :offset");
  $stmt->bindValue(":limit", $limit, SQLITE3_INTEGER);
  $stmt->bindValue(":offset", $page * $limit, SQLITE3_INTEGER);
  $result = $stmt->execute();

  while ($data = $result->fetchArray()) {
    $id = $data["id"];
    post($id);
  }
?>

<nav>
  <a href="/index.php?page=<?php echo ($page - 1); ?>">⮜ Previous</a>
  <a href="/index.php?page=<?php echo ($page + 1); ?>">Next ➤</a>
</nav

<?php include "templates/footer.html"; ?>
