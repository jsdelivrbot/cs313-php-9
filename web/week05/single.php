   <div class="prj-ribbon"></div>
   <div class="prj-main mdl-layout__content">
      <div class="prj-content mdl-grid">
         <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
         <div class="prj-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
         <div style="width: 30em;margin: auto;">
            
         <h3><?php echo $element->name; ?></h3>
         <ul class="demo-list-control mdl-list">            
            <?php 
               foreach ($element as $propName => $property) {
                  # Replace "id" and '_' to ignore them and display correctly
                  $formatName = ucwords(str_replace("id","",str_replace("_"," ",$propName)));
                  if(!empty($formatName)) { ?>
                  <li class="mdl-list__item">
                     <span class="mdl-list__item-primary-content"><?php echo $formatName.": "; ?></span>

                     <!--SECONDARY ACTION-->
                     <span class="mdl-list__item-secondary-action">
                     <?php 
                     if(is_bool($property)) { ?>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox">
                           <input disabled type="checkbox" id="checkbox" class="mdl-checkbox__input" <?php echo ($property) ? "checked" : "" ?>>
                        </label>
                     <?php   
                     } elseif ($propName == "project_id") {
                        # Handle showing the project
                        $project = $db->getSingle("project", $property);
                        echo $project->name;
                        
                     } else {
                        echo ($property);
                     }
                     ?>
                     <!--END SECONDARY ACTION-->
                     </span>
                  </li>
            <?php
                  }
               }
            ?>

         </ul>

         </div>
         </div>
   <button id="edit-fab" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
      <i class="material-icons">edit</i>
   </button>
      </div>
   </div>