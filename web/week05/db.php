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

      function getUsers()
      {
         return $this->db->query('SELECT * FROM Users')->fetchAll(PDO::FETCH_ASSOC);
      }
      function getTasks()
      {
         return $this->db->query('SELECT * FROM Task')->fetchAll(PDO::FETCH_CLASS, "Task");
      }
      function getProjects()
      {
         return $this->db->query('SELECT * FROM Project')->fetchAll(PDO::FETCH_CLASS, "Project");
      }
      function getGoals()
      {
         return $this->db->query('SELECT * FROM Goal')->fetchAll(PDO::FETCH_CLASS, "Goal");
      }
      function getEvents()
      {
         return $this->db->query('SELECT * FROM Event ORDER BY start_datetime')->fetchAll(PDO::FETCH_CLASS, "Event");
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

   }
   $db = new DB();
   $user = new User($db->getDB());
   
?>