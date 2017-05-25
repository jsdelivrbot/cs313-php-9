<?php
   include_once 'db.php';

   $book = $_POST["book"];
   $chapter = $_POST["chapter"];
   $verse = $_POST["verse"];
   $content = $_POST["content"];
   $topics = $_POST["topic"];

   $dbTopics = $db->query('SELECT * FROM topic;')->fetchAll(PDO::FETCH_ASSOC);
   # Insert into the database the scripture
   $stmt = $db->prepare('INSERT INTO scripture VALUES (DEFAULT, :book, :chapter, :verse, :content)');
   $stmt->execute(array('book' => $book, 'chapter' => $chapter, 'verse' => $verse, 'content' => $content));

   # Also, insert the applicable topic/scripture thingy
   foreach ($topics as $i =>$topic) {
      $topicId;
      foreach ($dbTopics as $dbTopic) {
         if ($dbTopic['name'] == $topic) {
            $topicId = $dbTopic['id'];
            $topicStmt = $db->prepare('INSERT INTO topics_to_scriptures VALUES (:topicId, :scriptureId)');
            $topicStmt->execute(array('topicId' => $topicId, 'scriptureId' => $db->lastInsertId('scripture_id_seq')));
         }
      }
   }
   $scriptures = $db->query("SELECT * FROM scripture;")->fetchAll(PDO::FETCH_ASSOC);
   
   ?>
<ul>
   <?php foreach ($scriptures as $scripture) : 
            $topicIds = $db->query("SELECT topic_id FROM topics_to_scriptures WHERE scripture_id = ".$scripture['id'].";")->fetchAll();
            
   ?>
   <li>
   <div>
   <?php echo $scripture["book"]." ".$scripture["chapter"].":".$scripture["verse"]; ?>
   </div>
   <div><?php echo $scripture["content"]; ?></div>
   <div>
      <?php
         foreach ($topicIds as $topic) {
            echo $db->query("SELECT name FROM topic WHERE id =".$topic["topic_id"].";")->fetch()["name"].", ";
         }
      ?>
   </div>
   </li>
<?php
   endforeach;
?>
</ul>