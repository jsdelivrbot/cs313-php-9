<?php
   include_once 'util.php';
   if (isset($_POST["username"]) && isset($_POST["password"])) {
      $hashedPass = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $username = $_POST["username"];
      if(createUser($username,$hashedPass)) {
         redirect("signIn.php");
      }
   }
?>
<html>
   <body>
   <form action="signUp.php" method="POST">
      <input type="text" name="username" placeholder="Username"><br>
      <input type="password" name="password" placeholder="Password"><br>
      <input type="submit" name="submit" value="Sign Up">          
   </form>
   </body>
</html>