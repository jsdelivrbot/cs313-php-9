<?php
// session_start();
   require ('util.php');
   if (!isset($_SESSION["user"])) {
      redirect("signIn.php");
   }
   $user = getUsername();
?>

<html>
   <body>
      <div>
         Welcome, <?php echo $user; ?>
      </div>
   </body>
</html>