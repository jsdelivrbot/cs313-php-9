
<html>
   <body>

      <form action="teach05.php" method="POST">
         <input type="text" name="book" placeholder="Yo, put a book up in heyah!">
      </form>
      <?php 
         $dbUrl = "postgres://levan:password@127.0.0.1:5432/scriptures";
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
         $query = "";
         if (isset($_POST["book"])) {

            $query = "SELECT * FROM scripture WHERE book = '".$_POST["book"]."';";
            echo $query. "<br>";
            $scriptures = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
            echo "<h1>Scripture Resources</h1>";
               foreach ($scriptures as $scripture) {
                  echo "<a href=\"details.php?book=".$scripture["book"]."&chapter=".$scripture["chapter"]."&verse=".$scripture["verse"]."\">".$scripture["book"]." ".$scripture["chapter"].":".$scripture["verse"]."</a>";
               } 
         } else {
            $scriptures = $db->query('SELECT * FROM scripture')->fetchAll(PDO::FETCH_ASSOC);
               echo "<h1>Scripture Resources</h1>";
               foreach ($scriptures as $scripture) {
                  echo "<b>".$scripture["book"]." ".$scripture["chapter"].":".$scripture["verse"]." </b>";
                  echo "- \"".$scripture["content"]."<br>";
               } 
         }
      ?>
   </body>
</html>