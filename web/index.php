<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Home - Victor Smith</title>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Google Material Design -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
      <link rel="stylesheet" href="week02/style.css">
      <!--<link rel="stylesheet" href="week03/style.css">-->
      <!--<link rel="stylesheet" href="week04/style.css">-->
      <!--<link rel="stylesheet" href="week05/style.css">-->
      <!--<link rel="stylesheet" href="week06/style.css">-->
      <!--<link rel="stylesheet" href="week07/style.css">-->
      <!--<link rel="stylesheet" href="week08/style.css">-->
      <!--<link rel="stylesheet" href="week09/style.css">-->
      <!--<link rel="stylesheet" href="week10/style.css">-->
      <!--<link rel="stylesheet" href="week11/style.css">-->
      <!--<link rel="stylesheet" href="week12/style.css">-->
      <!--<link rel="stylesheet" href="week13/style.css">-->
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
   </head>
   <body>
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
         <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
               <span class="mdl-layout-title">Victor Smith</span>
            </div>
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
               <a href="#tab-week-2"  class="mdl-layout__tab is-active">Week 2</a>
               <a href="#tab-week-3"  class="mdl-layout__tab">Week 3</a>
               <a href="#tab-week-4"  class="mdl-layout__tab">Week 4</a>
               <a href="#tab-week-5"  class="mdl-layout__tab">Week 5</a>
               <a href="#tab-week-6"  class="mdl-layout__tab">Week 6</a>
               <a href="#tab-week-7"  class="mdl-layout__tab">Week 7</a>
               <a href="#tab-week-8"  class="mdl-layout__tab">Week 8</a>
               <a href="#tab-week-9"  class="mdl-layout__tab">Week 9</a>
               <a href="#tab-week-10" class="mdl-layout__tab">Week 10</a>
               <a href="#tab-week-11" class="mdl-layout__tab">Week 11</a>
               <a href="#tab-week-12" class="mdl-layout__tab">Week 12</a>
               <a href="#tab-week-13" class="mdl-layout__tab">Week 13</a>               
            </div>
         </header>
            <!-- Navigation drawer -->
         <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Links</span>
         </div>
         <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="tab-week-2">
               <!-- TODO: PHP include the content for the week here, (unless we go a different direction...) -->
               <div class="page-content">
                  <?php include("week02/week02.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-3">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week03/week03.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-4">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week04/week04.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-5">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week05/week05.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-6">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week06/week06.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-7">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week07/week07.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-8">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week08/week08.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-9">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week09/week09.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-10">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week10/week10.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-11">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week11/week11.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-12">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week12/week12.html"); ?>
               </div>
            </section>
            <section class="mdl-layout__tab-panel" id="tab-week-13">
               <!-- TODO: PHP include the content for the week here -->
               <div class="page-content">
                  <?php include("week13/week13.html"); ?>
               </div>
            </section>
         </main>
      </div>
   </body>
</html>
