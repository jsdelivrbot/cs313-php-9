<?php
   if (!isset($type)) {
      $type = 'event';
   }
?>
<!--Add Project Element Dialog-->
<dialog class="mdl-dialog">
<h4 class="mdl-dialog__title"><?php echo ucwords("Add $type"); ?></h4>
   <form action="<?php echo $type."s.php"; ?>" method="POST">
      <div class="mdl-dialog__content">
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="eName">
            <label class="mdl-textfield__label" for="eName">Name</label>
         </div>
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="eDesc">
            <label class="mdl-textfield__label" for="eDesc">Description</label>
         </div>
         <?php
         switch ($type) {
            case 'event': ?>
               <div>
                  <label for="startDatetime">Start date: </label>
                  <input type="datetime-local" id="startDatetime">
               </div>
               <br>
         <?php 
            case 'event':
            case 'goal': ?>
               <div>
                  <label for="endDatetime">End date: </label>
                  <input type="datetime-local" id="endDatetime">
               </div>
               <br>
         <?php
            case 'event':
            case 'goal':
            case 'task': ?>
               <label for="project">Project: </label>
                  <br>
                  <input list="listProjects" name="project">
                  <datalist id="listProjects">
                  <?php 
                     $projects = $db->getProjects();
                     foreach ($projects as $project) {
                        echo "<option value='".$project->name."'>";
                     }
                  ?>
                  </datalist>
         <?php
            break;
            default:
               # code...
               break;
         }

         ?>
      </div>
      <div class="mdl-dialog__actions">
      <button type="submit" class="mdl-button">Submit</button>
      <button type="button" class="mdl-button close">Cancel</button>
      </div>
   </form>
</dialog>