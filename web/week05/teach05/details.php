<?php
      $dbUrl = getenv(DATABASE_URL); 
      if(!isset($dbUrl)) {
         $dbUrl = "postgres://levan:password@127.0.0.1:5432/scriptures";
      }
               $dbOpts = parse_url($dbUrl);

               $dbHost = $dbOpts["host"];
               $dbPort = $dbOpts["port"];
               $dbUser = $dbOpts["user"];
               $dbPassword = $dbOpts["pass"];
               $dbName = ltrim($dbOpts["path"], '/');

               try {
                  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
               } catch (PDOException $e) {
                  print "<p>error: $e </p>\n\n";
                  die();
               }


   $book = $_GET["book"];
   $chapter = $_GET["chapter"];
   $verse = $_GET["verse"];

   $query = "SELECT content FROM Scripture WHERE book = '$book' AND chapter = '$chapter' AND verse = '$verse'";
   $content = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

   echo "<h1>".$book." ".$chapter.":".$verse." </h1>";
   echo "<p>".$content[0]["content"]."</p>";

?>