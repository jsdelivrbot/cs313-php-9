<?php 
   /**
    * Event: data class
    */
   class Event 
   {
     public $id;
     public $name;
     public $description;
     public $start_datetime;
     public $end_datetime;
     public $project_id;
   }
   
   /**
    * Task: data class
    */
   class Task 
   {
      public $id;
      public $name;
      public $description;
      public $project_id;
      public $completed = false;
   }
   
   /**
    * Goal: data class
    */
   class Goal
   {
      public $id;
      public $name;
      public $description;
      public $project_id;
      public $end_datetime;
   }

   /**
    * Project: data class
    */
   class Project 
   {
      public $id;
      public $name;
      public $description;
   }
   
   

?>