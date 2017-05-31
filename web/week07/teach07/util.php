<?php
   
   function createUser($username, $hashedPass)
   {
      include_once('db.php');
      $db = getDB();
      $query = "INSERT INTO t7_users VALUES (DEFAULT, :user_name, :hashed_pass);";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':user_name', $username, PDO::PARAM_STR);
      $stmt->bindParam(':hashed_pass', $hashedPass, PDO::PARAM_STR);
      return $stmt->execute();
   }

   function checkUser($username, $password)
   {
      include_once('db.php');
      $db = getDB();
      var_dump($db);
      $query = "SELECT * FROM t7_users WHERE username = '$username';";
      $user = $db->query($query)->fetch(PDO::FETCH_LAZY);
      if (isset($user) && count($user) == 1) {

         if(password_verify($password, $user->password)) {
            echo "HEY";
            return $user->id;
         } 

      }
   }

   function getUsername()
   {
      include_once('db.php');
      $db = getDB();
      $id = $_SESSION["user"];
      $query = "SELECT username FROM t7_users WHERE id = $id";
      return $db->query($query)->fetchColumn(0);
   }

   function redirect($url)
   {
      header('Location: ' . $url);
      die();
   }  

?>