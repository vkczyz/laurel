<?php include "templates/header.html"; ?>

<p>Replying to post <?php echo $id; ?>:</p>

<blockquote>
<?php
    echo file_get_contents("templates/lorem.html");
    echo file_get_contents("templates/lorem.html");
?>
</blockquote>

<form action="/responses/reply.php" method="post">
  <label for="reply">Reply:</label>
  <textarea id="reply" name="reply"></textarea>
  <input type="submit" value="Submit"/>
</form>

<?php include "templates/footer.html"; ?>
