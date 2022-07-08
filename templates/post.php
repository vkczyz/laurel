<?php
  function post($id) {
    include_once "parsedown/Parsedown.php";
    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);

    $db = new SQLite3("data.db");

    $stmt = $db->prepare("SELECT author, message FROM posts WHERE id = :post");
    $stmt->bindValue(":post", $id, SQLITE3_INTEGER);
    $result = $stmt->execute()->fetchArray();

    $author = $result["author"];
    $message = $result["message"];

    $stmt = $db->prepare("SELECT COUNT(*) FROM interaction WHERE post = :post AND sentiment = 1");
    $stmt->bindValue(":post", $id, SQLITE3_INTEGER);
    $upvotes = $stmt->execute()->fetchArray()[0];

    $stmt = $db->prepare("SELECT COUNT(*) FROM interaction WHERE post = :post AND sentiment = -1");
    $stmt->bindValue(":post", $id, SQLITE3_INTEGER);
    $downvotes = $stmt->execute()->fetchArray()[0];

    echo '<article id="' . $id . '">';
      echo '<details open>';
        echo '<summary class="post_header">';
          echo '<span>';
            echo '<a href="/users.php?id=' . $author . '">' . $author . '</a>';
            echo '<form class="upvote" action="/responses/upvote.php?id=' . $id . '" method="post"><button type="submit">👍 ' . $upvotes . '</button></form>';
            echo '<form class="downvote" action="/responses/downvote.php?id=' . $id . '" method="post"><button type="submit">👎 ' . $downvotes . '</button></form>';
          echo '</span>';
          echo '<span>';
            echo '<a href="#' . $id . '">Link</a>';
            echo '<a href="/post.php?id=' . $id. '">Reply</a>';
          echo '</span>';
        echo '</summary>';

        # Display user message
        echo $Parsedown->text($message);

        # Display replies
        $stmt = $db->prepare("SELECT id FROM posts WHERE parent = :id ORDER BY publish_date DESC");
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
