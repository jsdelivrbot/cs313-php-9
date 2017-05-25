<?php
include_once 'db.php';
?>
<html>
   <head>
      <title>Insert</title>
   </head>
   <body>
   <form action="submit.php" method="POST">
      
      <input type="text" name="book" placeholder="Book"><br>
      <input type="text" name="chapter" placeholder="Chapter"><br>
      <input type="text" name="verse" placeholder="Verse"><br>
      <textarea rows="4" cols="20" name="content" placeholder="Content"></textarea><br>
      <?php
      $topics = $db->query('SELECT * FROM topic;')->fetchAll(PDO::FETCH_ASSOC);

      foreach ($topics as $topic) {
         echo "<input type='checkbox' name='topic[]' value='".$topic['name']."'>";
         echo "<label for='topic'>".$topic['name']."</label><br>";
      }
      ?>
      <input type="submit" name="submit" value="Submit">
   </form>
   </body>
</html>