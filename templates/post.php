<?php
  $id = rand(0,65536);
  $author = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,8); 
  $upvotes = rand(0,10);
  $downvotes = rand(0,10);
  $paragraphs = rand(1,2);
  $replies = rand(0,2);
?>

<article id="post_<?php echo $id; ?>">
  <details open="true">
    <summary class="post_header">
      <a class="author" href="/users.php?id=<?php echo $author; ?>"><?php echo $author ?></a>
      <a class="upvotes">👍 <?php echo $upvotes ?></a>
      <a class="downvotes">👎 <?php echo $downvotes ?></a>
      <a class="reply_button" href="/reply.php?id=<?php echo $id; ?>">Reply</a>
    </summary>
    <?php
      for ($x = 0; $x < $paragraphs; $x++) {
        echo file_get_contents("templates/lorem.html");
      }
    ?>
    <?php
      if ($replies == 1) {
        include "templates/post.php";
      } elseif ($replies == 2) {
        include "templates/post.php";
        include "templates/post.php";
      }
    ?>
  </details>
</article>
