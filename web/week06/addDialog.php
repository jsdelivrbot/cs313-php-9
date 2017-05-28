<?php
   if (!isset($type)) {
      $type = 'event';
   }
?>
<!--Add Project Element Dialog-->
<dialog class="mdl-dialog">
<h4 class="mdl-dialog__title"><?php echo ucwords("Add $type"); ?></h4>
   <form action="addItem.php" method="POST">
      <input type="hidden" name="type" value="<?php echo $type ?>">
      <div class="mdl-dialog__content">
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
         </div>
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="description">
            <label class="mdl-textfield__label" for="description">Description</label>
         </div>
         <?php
         switch ($type) {
            case 'event': ?>
               <div>
                  <label for="start_datetime">Start date: </label>
                  <input type="datetime-local" name="start_datetime">
               </div>
               <br>
         <?php 
            case 'event':
            case 'goal': ?>
               <div>
                  <label for="end_datetime">End date: </label>
                  <input type="datetime-local" name="end_datetime">
               </div>
               <br>
         <?php
            case 'event':
            case 'goal':
            case 'task': ?>
               <label for="project_id">Project: </label>
                  <br>
                  <select name="project_id">
                  <?php 
                     $projects = $db->getProjects();
                     foreach ($projects as $project) {
                        echo "<option value='".$project->id."'>".$project->name."</option>";
                     }
                  ?>
                  </select>
         <?php
            break;
            default:
               # code...
               break;
         }

         ?>
      </div>
      <div class="mdl-dialog__actions">
      <button type="submit" class="mdl-button" name="submit">Submit</button>
      <button type="button" class="mdl-button close">Cancel</button>
      </div>
   </form>
</dialog>