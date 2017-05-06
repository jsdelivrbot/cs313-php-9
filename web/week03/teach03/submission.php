<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Info</title>
  </head>
  <body>
    <?php
      $name = $_POST["name"];
      $email = $_POST["email"];
      $major = $_POST["major"];
      $comments = $_POST["comments"];
      $places = $_POST["place"];
      $placesMap = array('na' => "North America", 'sa' => "South America", 'as' => "Asia",
      'eu' => "Europe",'au' => "Australia", 'an' => "Antarctica", 'af' => "Africa");
     ?>
     <p><?php echo $name; ?></p>
     <p><?php echo $email; ?></p>
     <p><?php echo $major; ?></p>
     <p><?php echo $comments; ?></p>

     <?php foreach ($places as $place): ?>
       <p><?php echo $placesMap[$place] ?></p>
     <?php endforeach; ?>

  </body>
</html>
