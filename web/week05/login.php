<?php
   require_once 'db.php';
   if ($user->isLoggedIn()):
      # Redirect to home
      $user->redirect("index.php");
   elseif (isset($_POST["usr"]) && isset($_POST["pwd"]) && isset($_POST["submit"])):
      $user->login($_POST["usr"],$_POST["pwd"]);
      $user->redirect("index.php");
?>
<html>
   <head>
      
   </head>
   <body>
      <?php else: ?>
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="usr">Username:</label><br>
            <input type="text" name="usr" placeholder="Username">
            <br>
            <br>
            <label for="pwd">Password:</label><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <input type="submit" name="submit" value="Submit">
            <label>Don't have account yet ! <a href="signUp.php">Sign Up</a></label>
         </form>

      <?php endif; ?>         
   </body>
</html>