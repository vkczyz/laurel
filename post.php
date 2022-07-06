<article>
  <details open="true">
    <summary class="post_header">
      <a class="author"><?php echo substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,8); ?></a>
      <a class="upvotes">👍 <?php echo rand(0,10); ?></a>
      <a class="downvotes">👎 <?php echo rand(0,10); ?></a>
    </summary>
    <?php
      for ($x = 0; $x <= rand(0,1); $x++) {
        echo "<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>";
      }
    ?>
    <?php
      $count = rand(0,2);
      if ($count == 1) {
        include "post.php";
      } elseif ($count == 2) {
        include "post.php";
        include "post.php";
      }
    ?>
  </details>
</article>
