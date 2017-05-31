<?php
session_start();
   include_once 'util.php';

   if(isset($_POST["username"]) && isset($_POST["password"])) {
      $password = $_POST["password"];
      $username = $_POST["username"];
      $_SESSION["user"] = checkUser($username, $password);
      if (isset($_SESSION["user"])) {
         # code...
         redirect("welcome.php");
      }
   }
?>

<html>
   <body>
   <form action="signIn.php" method="POST">
      <input type="text" name="username" placeholder="Username"><br>
      <input type="password" name="password" placeholder="Password"><br> 
      <input type="submit" name="submit" value="Sign In">         
   </form>
   </body>
</html>