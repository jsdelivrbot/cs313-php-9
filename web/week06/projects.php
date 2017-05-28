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
   $type = 'project';
	$id = 0;
	if (isset($_REQUEST["id"])) {
		$id = $_REQUEST["id"];
	} 
	$edit = false;
	if (isset($_REQUEST["edit"])) {
		$edit = true;
	}

?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Projects</title>

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="assets/dialog-polyfill.css">

    <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/dialog-polyfill.js"></script>
  </head>
  <body>
    <div class="prj-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="prj-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Projects</span>
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
          <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Dashboard</a>
          <a class="mdl-navigation__link" style="color:white;opacity:1;" href="projects.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">dashboard</i>Projects</a>
          <a class="mdl-navigation__link" href="goals.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">check</i>Goals</a>
          <a class="mdl-navigation__link" href="events.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">event</i>Events</a>
          <a class="mdl-navigation__link" href="tasks.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">list</i>Tasks</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="index.php?logout=1"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i>Sign Out</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <?php if(!isset($_GET["id"])): ?>
        <div class="mdl-grid prj-content">

            <!--ACTION CARDS-->
            <div class="square-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Make a Project</h2>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">dashboard</i>                
              </div>
              <div class="mdl-card__supporting-text">
                Create a project to keep track of events, goals and tasks for your next big idea.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a class="addElement mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="javascript:void(0);">
                  Create Project
                </a>
              </div>
            </div>

            <div class="square-card mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Projects</h2>
                <div class="mdl-layout-spacer"></div>
                <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                  <i class="material-icons">more_vert</i>
                </button>
                  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                     for="demo-menu-lower-right">
                  <li class="mdl-menu__item">Some Action</li>
                  <li class="mdl-menu__item">Another Action</li>
                  <li disabled class="mdl-menu__item">Disabled Action</li>
                  <li class="mdl-menu__item">Yet Another Action</li>
                  </ul>                                
              </div>
              <div class="mdl-card__supporting-text">
                <ul class="demo-list-three mdl-list">
                  <?php
                     $projects = $db->getProjects();
                     foreach ($projects as $project) { ?>
                  <li class="mdl-list__item mdl-list__item--three-line">
                     <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">assessment</i>
                        <span><?php echo $project->name ?></span>
                        <span class="mdl-list__item-text-body">
                        <?php echo $project->description; ?>
                        </span>
                     </span>
                     <span class="mdl-list__item-secondary-content">
                        <a class="mdl-list__item-secondary-action" href="projects.php?id=<?php echo $project->id ?>"><i class="material-icons">edit</i></a>
                     </span>
                  </li>
                     <?php } ?>
               </ul>
              </div>
            </div>
            <!--END ACTION CARDS-->

        </div>
            <?php else: 
               $element = $db->getSingle($type, $_GET["id"]);
               include 'single.php';
            ?>        
        <?php endif; ?>
      </main>
    </div>

    <?php include("addDialog.php"); ?>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="assets/jquery-ui.js"></script>
    <script src="assets/calendar.js"></script>

  </body>
</html>