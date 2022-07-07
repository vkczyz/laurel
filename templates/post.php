<?php
  function post($id) {
    $db = new SQLite3("data.db");
    $stmt = $db->prepare("SELECT author, message FROM posts WHERE id = :id");
    $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
    $result = $stmt->execute()->fetchArray();

    $author = $result["author"];
    $message = $result["message"];
    $upvotes = 0;
    $downvotes = 0;

    echo '<article id="' . $id . '">';
      echo '<details open="true">';
        echo '<summary class="post_header">';
          echo '<div>';
            echo '<a href="/users.php?id=' . $author . '">' . $author . '</a>';
            echo '<button class="upvote">👍 ' . $upvotes . '</button>';
            echo '<button class="downvote">👎 ' . $downvotes . '</button>';
          echo '</div>';
          echo '<div>';
            echo '<a href="#' . $id . '">Link</a>';
            echo '<a href="/post.php?id=' . $id. '">Reply</a>';
          echo '</div>';
        echo '</summary>';

        # Display user message
        $paragraphs = explode("\n", $message);
        foreach ($paragraphs as $p) {
          echo '<p>' . $p . '</p>';
        }

        # Display replies
        $stmt = $db->prepare("SELECT id FROM posts WHERE parent = :id");
        $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        while ($data = $result->fetchArray()) {
          $child = $data["id"];
          post($child);
        }

      echo '</details>';
    echo '</article>';
  }
?>
