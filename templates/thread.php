<?php
  $thread = $_GET["thread"];

  $db = new SQLite3("data.db");
  $stmt = $db->prepare("SELECT publish_date FROM posts WHERE id = :post");
  $stmt->bindValue(":post", $thread, SQLITE3_INTEGER);
  $timestamp = $stmt->execute()->fetchArray()["publish_date"];

  $date = date("Y-m-d", $timestamp);
  $time = date("H:i:s", $timestamp);
?>

<p>Posted on <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time> at <time datetime="<?php echo $time; ?>"><?php echo $time; ?></time> UTC</p>

<div class="posts">
<?php
  post($thread);
?>
</div>
