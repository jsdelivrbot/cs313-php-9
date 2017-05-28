<?php 
	include_once 'db.php';
	if(isset($_POST["submit"])) {
		$type = $_POST["type"];
		$newItem = NULL;
		$redirectTo = "index.php"; #DEFAULT to index
		switch($type) {
			case "task":
			$newItem = new Task();
			$redirectTo = "tasks.php";
			break;
			case "goal":
			$newItem = new Goal();
			$redirectTo = "goals.php";
			break;
			case "event":
			$newItem = new Event();
			$redirectTo = "events.php";
			break;
			case "project":
			$newItem = new Project();
			$redirectTo = "projects.php";
			break;
			default:
			break;
		}
		$callback = "update".ucwords($type);
		foreach ($_POST as $key => $value) {
			if ($key != "submit" && $key != "type") {
				if(is_numeric($value)) {
					$value = (int)$value;
				}
				if($key == "completed") {
					$value = true;
				}
				$newItem->$key = $value;
			}
		}
		var_dump($newItem);
		if (call_user_func(array($db,$callback), $newItem)) {
			$user->redirect($redirectTo);
		} else {
			echo "FAILED<br>";
			var_dump($callback);
			var_dump($newItem);
		}
	}
	$_POST["id"] = $id;
?>
   <div class="prj-ribbon"></div>
   <div class="prj-main mdl-layout__content">
      <div class="prj-content mdl-grid">
         <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
         <div class="prj-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--12-col">
         <div style="width: 30em;margin: auto;">
         <form action="<?php echo ($edit) ? "single.php" : $_SERVER['PHP_SELF']; ?>" method="<?php echo($edit) ? "POST" : "GET"; ?>">
            
         <h3><?php echo $element->name; ?></h3>
            <ul class="demo-list-control mdl-list">            
                  <?php
						echo "<input type='hidden' name='id' value='$id'>";
						echo ($edit) ? "<input type='hidden' name='type' value='$type'>" : ""; 
                  foreach ($element as $propName => $property) :
                        # Replace "id" and '_' to ignore them and display correctly
                        $formatName = ucwords(str_replace("id","",str_replace("_"," ",$propName)));
                        if(!empty($formatName)) : ?>
                        <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content"><?php echo $formatName.": "; ?></span>

                        <!--SECONDARY ACTION-->
                        <span class="mdl-list__item-secondary-action">
                        <?php 
                        if(is_bool($property)) { ?>
                              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox">
                              <input <?php echo ($edit) ? "" : "disabled"; ?> type="checkbox" id="checkbox" name="completed" class="mdl-checkbox__input" <?php echo ($property) ? "checked" : "" ?>>
                              </label>
                        <?php   
                        } else {
									if($propName == "project_id" && !$edit) {
											# Handle showing the project
											$project = $db->getSingle("project", $property);
											$property = $project->name;
									} 
									if ($edit == true) {
										if ($propName == "project_id") { ?>
											<select id="listProjects" name="<?php echo $propName; ?>">
											<?php 
												$projects = $db->getProjects();
												foreach ($projects as $project) {
													echo "<option value='".$project->id."' ";
													if($property == $project->id) {
														echo "selected";
													}
													echo ">$project->name</option>";
												}
											?>
											</select>											
								<?php } elseif($propName == "start_datetime" || $propName == "end_datetime") { 
											$date = new DateTime($property);
											$formatDate = $date->format("Y-m-d\TH:i");
								?>
                  						<input type="datetime-local" name="<?php echo $propName; ?>" value="<?php echo $formatDate; ?>">
								
								<?php } else {
									
									?>
										<div class="mdl-textfield mdl-js-textfield">
											<input class="mdl-textfield__input" type="text" name="<?php echo $propName; ?>" value="<?php echo $property; ?>">
											<label class="mdl-textfield__label" for="<?php echo $propName ?>"><?php echo $formatName; ?></label>
										</div>
							<?php		} 
									} else {
											echo ($property);
									}
                        }
                        ?>
                        <!--END SECONDARY ACTION-->
                        </span>
                        </li>
                  <?php
                        endif; # ENDIF for if the name is empty
                  endforeach;
                  ?>

            </ul>
   <button id="edit-fab" name="<?php echo ($edit) ? "submit" : "edit"; ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
      <i class="material-icons"><?php echo ($edit) ? "done" : "edit"; ?></i>
   </button>
         </form>
         </div>
         </div>
      </div>
   </div>