<!doctype html>
<?php
   include_once 'db.php';
   if (!$user->isLoggedIn())
   {
      $user->redirect("login.php");
   } else if (isset($_GET["logout"]) && boolval($_GET["logout"])) {
      if ($user->logout()) {
         $user->redirect("login.php");
      }
   } 
?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title></title>

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="assets/dialog-polyfill.css">

    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/calendar.css">
    <link rel="stylesheet" href="assets/jquery-ui.css">
    <script src="assets/dialog-polyfill.js"></script>
  </head>
  <body>
    <div class="prj-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="prj-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Dashboard</span>
          <div class="mdl-layout-spacer"></div>
          <!-- SEARCH BAR -->
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
        </div>
      </header>

      <!-- NAV-DRAWER -->
      <div class="prj-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="prj-drawer-header">
          <img src="images/user.jpg" class="prj-avatar">
          <div class="prj-avatar-dropdown">
            <span>Hello, <?php echo $user->getUserFullName() ?>!</span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="prj-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" style="color:white;opacity:1;" href="home.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Dashboard</a>
          <a class="mdl-navigation__link" href="projects.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">dashboard</i>Projects</a>
          <a class="mdl-navigation__link" href="goals.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">check</i>Goals</a>
          <a class="mdl-navigation__link" href="events.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">event</i>Events</a>
          <a class="mdl-navigation__link" href="tasks.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">list</i>Tasks</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="home.php?logout=1"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i>Sign Out</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid prj-content">

          <div class="prj-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col mdl-grid">

            <!--ACTION CARDS-->
            <div class="square-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Projects</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">dashboard</i>                
              </div>
              <div class="mdl-card__supporting-text">
                Make a project to start things off. Then you can create other elements for your project like events and goals.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="projects.php">
                  Get Started
                </a>
              </div>
            </div>

            <div class="square-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Goals</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">check</i>                
              </div>
              <div class="mdl-card__supporting-text">
                See all your current goals. If you want to see the goals for a specific project,
                go to "Projects" and navigate to your desired project.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="goals.php">
                  View Goals
                </a>
              </div>
            </div>

            <div class="square-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Tasks</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">list</i>
              </div>
              <div class="mdl-card__supporting-text">
                Look at all your different tasks here. Like goals, if you want to see tasks for a certain project, 
                go to "Projects" to see them.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="tasks.php">
                  View Tasks
                </a>
              </div>
            </div>
            <!--END ACTION CARDS-->

          </div>
          <div class="prj-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="prj-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card--expand">
               <?php include('calendar.php'); ?>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="events.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Go to events</a>
              </div>
            </div>

        </div>
      </main>
    </div>
    <?php include 'addDialog.php' ?>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="assets/jquery-ui.js"></script>
    <script src="assets/calendar.js"></script>

  </body>
</html>