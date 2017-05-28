<?php
   include_once 'db.php';
   if (isset($_POST["submit"])) {
      $newItem = NULL;
      $type = $_POST['type'];
      $callback = "create".ucwords($type);
      switch ($type) {
         case 'task':
            $newItem = new Task();
            break;
         case 'goal':
            $newItem = new Goal();
            break;
         case 'event':
            $newItem = new Event();
            break;
         case 'project':
            $newItem = new Project();
            break;
         default: 
            break;
      }
      foreach($_POST as $key => $value) {
         if($key != "submit" && $key != "type") {
            if(is_numeric($value)) {
               $value = (int)$value;
            }
            $newItem->$key = $value;
         }
      }
      if(call_user_func(array($db,$callback), $newItem)) {
         $user->redirect($_SERVER["HTTP_REFERER"]);
      } else {
         echo "FAIL!";
      }
   } 

?>