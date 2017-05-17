<?php
   session_start();
   define('TEST_USERNAME', 'testUser');
   define('TEST_PASSWORD', 'password');
   define('LOCAL_DATABASE', 'postgres://levan:password@127.0.0.1:5432/prj_manage');
   

   $_POST["username"] = TEST_USERNAME;
   $_POST["pwd"] = TEST_PASSWORD;
   if(isset($_SESSION["user"])) {
      # Test against database to log person in, if that fails break out to else
      logIn();
   } else if(isset($_POST["username"]) && isset($_POST["pwd"])) {
      # Set the user and save it to session
      $_SESSION["user"] = uniqid();
      logIn();
   } else {
      # Generate sign up page
   }

   #Check against database to log person in, if that fails, reload the page and display an error.
   function logIn() {
      $dbUrl = getenv('DATABASE_URL');
      if (empty($dbUrl)) {
         // example localhost configuration URL with postgres username and a database called cs313db
         $dbUrl = LOCAL_DATABASE;
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
      $users = $db->query('SELECT * FROM Users')->fetchAll(PDO::FETCH_ASSOC);
      
      foreach ($users as $row) {
         foreach ($row as $cell) {
            echo "<p>$cell</p>";
         }
      }

   }
?>