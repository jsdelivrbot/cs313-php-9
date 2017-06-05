<?php
   /**
    * User
    */
   class User 
   {
      private $db;

      function __construct($DB)
      {
         $this->db = $DB;
      }

      public function login($uname,$upass)
      {
         try {
            $stmt = $this->db->prepare("SELECT * FROM Users WHERE username=:uname LIMIT 1");
            $stmt->execute(array(':uname'=>$uname));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
               if (password_verify($upass, $userRow['pwd_hash'])) {
                  $_SESSION['user_session'] = $userRow['id'];
                  return true;
               } else {
                  return false;
               }
            }
         } catch (PDOException $e) {
            echo $e->getMessage();
         }
      }

      public function logout()
      {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
      }

      public function isLoggedIn()
      {
         if (isset($_SESSION['user_session'])) {
            return true;
         } else {
            return false;
         }
      }

      public function register($fname,$lname,$address,$phone,$email,$uname,$upass)
      {
         try {
            $hashed = password_hash($upass, PASSWORD_DEFAULT);
            # TODO: Check against the values already in the table
            $stmt = $this->db->prepare("INSERT INTO Users VALUES(DEFAULT, :fname, :lname, :address, :phone, :email, :uname, :upass, :upass);");
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":address", $address);
            $stmt->bindparam(":phone",$phone);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":upass", $hashed);
            $stmt->execute();

            return $stmt;
         } catch (PDOException $e) {
            echo $e->getMessage();
         }
      }

      public function redirect($url)
      {
         header("Location: $url");
      }

      public function getUserFullName()
      {
         $userId = $_SESSION['user_session'];
         $stmt = $this->db->prepare("SELECT first_name || ' ' || last_name FROM Users WHERE id = :userId;");
         $stmt->execute(array(':userId'=>$userId));
         $fullName = $stmt->fetch(PDO::FETCH_COLUMN);
         return $fullName;
      }
   }
   

?>