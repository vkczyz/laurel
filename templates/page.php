<?php
  $page = $_GET["page"] ?? 1;
  $limit = 10;
?>

<nav>
  <a <?php
    if ($page > 1) {
      echo 'href="/index.php?page=' . ($page - 1) . '"';
    }
  ?>>⮜ Previous</a>
  <span>Page <?php echo $page; ?></span>
  <a href="/index.php?page=<?php echo ($page + 1); ?>">Next ➤</a>
</nav>

<div class="posts">
<?php
  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT id FROM posts WHERE parent = 0 ORDER BY publish_date DESC LIMIT :limit OFFSET :offset");
  $stmt->bindValue(":limit", $limit, SQLITE3_INTEGER);
  $stmt->bindValue(":offset", ($page - 1) * $limit, SQLITE3_INTEGER);
  $result = $stmt->execute();

  while ($data = $result->fetchArray()) {
    $id = $data["id"];
    post($id);
  }
?>
</div>

<nav>
  <a <?php
    if ($page > 1) {
      echo 'href="/index.php?page=' . ($page - 1) . '"';
    }
  ?>>⮜ Previous</a>
  <span>Page <?php echo $page; ?></span>
  <a href="/index.php?page=<?php echo ($page + 1); ?>">Next ➤</a>
</nav>
