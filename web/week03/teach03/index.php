<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Teach 03</title>
  </head>
  <body>
    <form action="submission.php" method="POST">
      <label for="name">Name</label>
      <input id="formName" type="text" name="name" placeholder="Name">
      <br>
      <label for="email">Email</label>
      <input id="formEmail" type="text" name="email">
      <br>
      <?php
        $majors = array('Computer Science', 'Web Design and Development', 'Computer Information Technology', 'Computer Engineering');
       ?>
       <?php foreach ($majors as $major): ?>
         <input type="radio" name="major" value="<?php echo $major; ?>">
         <label for="major"><?php echo $major; ?></label>
         <br>
       <?php endforeach; ?>
       <label for="comments">Comments:</label>
       <br>
      <textarea id="comments" name="comments" rows="8" cols="80"></textarea>
      <br>
      <?php $places = array(); ?>
      <input id="na" type="checkbox" name="place[]" value="na">
      <label for="na">North America</label>
      <br>
      <input id="sa" type="checkbox" name="place[]" value="sa">
      <label for="sa">South America</label>
      <br>
      <input id="eu" type="checkbox" name="place[]" value="eu">
      <label for="eu">Europe</label>
      <br>
      <input id="as" type="checkbox" name="place[]" value="as">
      <label for="as">Asia</label>
      <br>
      <input id="au" type="checkbox" name="place[]" value="au">
      <label for="au">Australia</label>
      <br>
      <input id="af" type="checkbox" name="place[]" value="af">
      <label for="af">Afria</label>
      <br>
      <input id="an" type="checkbox" name="place[]" value="an">
      <label for="an">Antarctica</label>
      <br>
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>

  </body>
</html>
