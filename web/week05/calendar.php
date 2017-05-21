<?php 


 ?>
<header role="banner" class="cal-header">
   <time><?php echo date("F"); ?><em><?php echo date("Y"); ?></em></time><a class="addElement" href="javascript:void(0);">Add event</a>
</header>
<section role="main">
<ul class="m-box--weeks">
   <?php 
      for ($i=1; $i <= 7; $i++) { 
         $day = $i;
         # Just go off of a generic day to show the week days
         echo "<li>".date_format(date_create("2009-3-$day"),"D")."</li>";
      }    
   ?>
</ul>
<ul class="m-box--date">
   <?php 
      # Now to calculate the hard stuff...
      $prevMonthDays = strtotime('first day of last month');
      $numDaysLastMonth = date('t', $prevMonthDays);
      $thisMonthFirst = strtotime('first day of this month');
      $offset = date('w',$thisMonthFirst);
      for ($i=$offset - 1; $i >= 0; --$i) {
         echo "<li class='l-date--passed'>";
         echo $numDaysLastMonth - $i;
         echo "</li>";
      }

      # Keep track of the days on which there are events
      $events = $db->getEventsThisMonth();
      # TODO: Get rid of this
      var_dump($events);
      $days = array_column($events, 'start_datetime');
      var_dump($days);
      foreach ($days as $i => $day) {
         $days[$i] = date('j', strtotime($day));
      }

      $numDays = date('t');
      $today = date('j');
      for ($i=1; $i <= $numDays; $i++) {
         # IF day has event, do this:
         if (in_array($i,$days)) {
            echo "<li class='l-date--event' data-event=\"".$events[array_search($i,$days)]->name."\">";
            echo "<i class='m-bullet--event'></i>".$i."</li>";
         } else {
            echo "<li>".$i."</li>";
         }
      }
   ?>
</ul>
</section>