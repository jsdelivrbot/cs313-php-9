<?php
   include('db.php');
   include('user.php');

   if (isset($_POST["submit"])) {
      $fname = trim($_POST['fname']);
      $lname = trim($_POST['lname']);
      $address = trim($_POST['address']);
      $phone = trim($_POST['phone']);      
      $email = trim($_POST['email']);
      $uname = trim($_POST['usr']);
      $upass = trim($_POST['pass']);
      $db = new DB();
      $user = new User($db->getDB());
      if ($user->register($fname,$lname,$address,$phone,$email,$uname,$upass)) {
         $user->redirect('login.php');
      }
   }
?>


<html>
   <head>
      
   </head>
   <body>
      <h2>Sign Up</h2>
      <form method="POST">
         <input type="text" name="fname" placeholder="First Name"><br>
         <input type="text" name="lname" placeholder="Last Name"><br>
         <input type="text" name="address" placeholder="Address"><br>
         <input type="text" name="phone" placeholder="Phone #"><br>
         <input type="text" name="email" placeholder="Email"><br>
         <input type="text" name="usr" placeholder="Username"><br>
         <input type="password" name="pass" placeholder="Password"><br>
         <input type="password" name="confPass" placeholder="Confirm Password"><br>
         <input type="submit" name="submit" value="Submit">
      </form>
   </body>
</html>