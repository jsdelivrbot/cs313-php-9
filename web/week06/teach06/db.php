<?php
   $dbUrl = "postgres://kftjudlsdzfbcq:29e597af7a06853bf948377014dd24b5e7328920f1e5fa39f7427babe1a3f4c0@ec2-50-17-236-15.compute-1.amazonaws.com:5432/d40epjrp54mkbo";
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

   
?>
