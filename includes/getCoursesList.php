<?php
  $sql = "SELECT * FROM kurs ORDER BY ID_Kurs";
  $result = $course->getCourseName($sql);
  foreach($result as $row){
    echo "<li><a href=\"main_user.php?ID_Kurs=$row->ID_Kurs\" class=\"items\">ID: ".$row->ID_Kurs." ".$row->nazwa."</a></li>";
  }
?>
