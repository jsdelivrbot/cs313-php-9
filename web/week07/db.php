<?php
   session_start();
   include_once 'user.php';
   include_once 'data.php';
   define('TEST_USERNAME', 'testUser');
   define('TEST_PASSWORD', 'password');
   define('LOCAL_DATABASE', 'postgres://levan:password@127.0.0.1:5432/prj_manage');

   /**
    * DB_CLASS
    */
   class DB 
   {
      var $db;

      var $dbHost;
      var $dbPort;
      var $dbUser;
      var $dbPassword;
      var $dbName;
      
      function __construct()
      {
         $dbUrl = getenv('DATABASE_URL');
         if (empty($dbUrl)) {
            // example localhost configuration URL with postgres username and a database called cs313db
            $dbUrl = LOCAL_DATABASE;
         }
         $dbOpts = parse_url($dbUrl);  
         $this->dbHost = $dbOpts["host"];       
         $this->dbPort = $dbOpts["port"];
         $this->dbUser = $dbOpts["user"];
         $this->dbPassword = $dbOpts["pass"];
         $this->dbName = ltrim($dbOpts["path"], '/');
         try {
           $this->db = new PDO("pgsql:host=$this->dbHost;port=$this->dbPort;dbname=$this->dbName", $this->dbUser, $this->dbPassword);

         } catch (PDOException $e) {
            print "<p>error: $e </p>\n\n";
            die();
         }
      }
      ############################################
      ### The following are the CRUD functions ###
      ############################################

      # CREATE
      function createTask($task)
      {
        $query = "INSERT INTO Task VALUES (DEFAULT,:name,:description,:project_id,false);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $task->name);
        $stmt->bindParam(':description', $task->description);
        $stmt->bindValue(':project_id', ($task->project_id != '') ? $task->project_id : NULL);
        // $stmt->bindParam(':completed', false);
        return $stmt->execute();
      }
      function createGoal($goal)
      {
        try {
        $query = "INSERT INTO Goal VALUES (DEFAULT,:name,:description,:project_id,:end_datetime);";
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $goal->name);
        $stmt->bindParam(':description', $goal->description);
        $stmt->bindValue(':project_id', ($goal->project_id != '') ? $goal->project_id : NULL);
        $stmt->bindParam(':end_datetime', $goal->end_datetime);
        return $stmt->execute();        
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      }
      function createEvent($event)
      {
        $query = "INSERT INTO Event VALUES (DEFAULT,:name,:description,:start_datetime,:end_datetime,:project_id);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $event->name);
        $stmt->bindParam(':description', $event->description);
        $stmt->bindParam(':start_datetime', $event->start_datetime);
        $stmt->bindParam(':end_datetime', $event->end_datetime);
        $stmt->bindValue(':project_id', ($event->project_id != '') ? $event->project_id : NULL);
        return $stmt->execute();
      }
      function createProject($project)
      {
        $query = "INSERT INTO Project VALUES (DEFAULT,:name,:description);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $project->name);
        $stmt->bindParam(':description', $project->description);
        return $stmt->execute();
      }

      # READ
      function getUsers()
      {
         return $this->db->query('SELECT * FROM Users;')->fetchAll(PDO::FETCH_ASSOC);
      }
      function getTasks()
      {
         return $this->db->query('SELECT * FROM Task;')->fetchAll(PDO::FETCH_CLASS, "Task");
      }
      function getProjects()
      {
         return $this->db->query('SELECT * FROM Project;')->fetchAll(PDO::FETCH_CLASS, "Project");
      }
      function getGoals()
      {
         return $this->db->query('SELECT * FROM Goal;')->fetchAll(PDO::FETCH_CLASS, "Goal");
      }
      function getEvents()
      {
         return $this->db->query('SELECT * FROM Event ORDER BY start_datetime;')->fetchAll(PDO::FETCH_CLASS, "Event");
      }
      function getDB()
      {
        return $this->db;
      }

      function getSingle($type, $id)
      {
        $type = ucwords($type);
        $id = (string)$id;
        $query = "SELECT * FROM $type
                  WHERE id = $id;";
        $stmt = $this->db->query($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $type);
        return $stmt->fetch();
      }

      function getEventsThisMonth()
      {
        $query = "SELECT * FROM Event
                  WHERE EXTRACT(MONTH FROM start_datetime) = EXTRACT(MONTH FROM now()) AND
                  EXTRACT(YEAR FROM start_datetime) = EXTRACT(YEAR FROM now())
                  ORDER BY start_datetime;";
        return $this->db->query($query)->fetchAll(PDO::FETCH_CLASS, "Event");
      }
      function getProjectIdForName($prjName)
      {
        $query = "SELECT id FROM Project WHERE name=:name;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $prjName);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row["id"];
      }

      # UPDATE
      function updateTask($task)
      {
        $query = "UPDATE Task SET name = :name, description = :description, project_id = :project_id, completed = :completed WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $task->name);
        $stmt->bindParam(':description', $task->description);
        $stmt->bindValue(':project_id', ($task->project_id != NULL) ? (int)$task->project_id : NULL);
        $stmt->bindValue(':completed', (boolean)$task->completed, PDO::PARAM_BOOL);
        $stmt->bindValue(':id', (int)$task->id, PDO::PARAM_INT);
        return $stmt->execute();
      }
      function updateGoal($goal)
      {
        $query = "UPDATE Goal SET name = :name, description = :description, project_id = :project_id, end_datetime = :end_datetime WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $goal->name);
        $stmt->bindParam(':description', $goal->description);
        $stmt->bindValue(':project_id', ($goal->project_id != NULL) ? (int)$goal->project_id : NULL);
        $stmt->bindParam(':end_datetime', $goal->end_datetime);        
        $stmt->bindValue(':id', (int)$goal->id, PDO::PARAM_INT);
        return $stmt->execute();
      }
      function updateEvent($event)
      {
        $query = "UPDATE Event SET name = :name, description = :description, start_datetime = :start_datetime, end_datetime = :end_datetime, project_id = :project_id WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $event->name);
        $stmt->bindParam(':description', $event->description);
        $stmt->bindParam(':start_datetime', $event->start_datetime);
        $stmt->bindParam(':end_datetime', $event->end_datetime);
        $stmt->bindValue(':project_id', ($event->project_id != NULL) ? (int)$event->project_id : NULL);        
        $stmt->bindValue(':id', (int)$event->id, PDO::PARAM_INT);
        return $stmt->execute();
      }
      function updateProject($project)
      {
        $query = "UPDATE Project SET name=:name, description=:description WHERE id=:id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $project->name);
        $stmt->bindParam(':description', $project->description);
        $stmt->bindValue(':id', (int)$project->id, PDO::PARAM_INT);
        return $stmt->execute();
      }

      # DELETE
      function deleteTask($id)
      {
        $query = "DELETE FROM Task WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);

        #TODO: Delete the references in the linking tables
      }
      function deleteGoal($id)
      {
        $query = "DELETE FROM Goal WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);

        #TODO: Delete the references in the linking tables
      }
      function deleteEvent($id)
      {
        $query = "DELETE FROM Event WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);

        #TODO: Delete the references in the linking tables
      }
      function deleteProject($id)
      {
        $query = "DELETE FROM Project WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id);

        #TODO: Delete the references in the linking tables
      }
      
      

   }
   $db = new DB();
   $user = new User($db->getDB());
   
?>