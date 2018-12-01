<?php
  $sql = "SELECT * FROM Plik ORDER BY ID_Plik";
  $result = $file->getFileName($sql);
  foreach($result as $row){
      echo "<form action='main_user.php' method='post'>";
      echo "<input type='hidden' name='nazwa' value=".$row->nazwa." />";
      echo "<input type='submit' value=".$row->nazwa." name='download' class=\"items\">";
      echo "</form>";
  }
  if(isset($_POST['download'])){
    $file->downloadFile($_POST['nazwa'], $_SESSION['login']);
  }
?>
