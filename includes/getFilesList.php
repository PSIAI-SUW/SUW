<?php
  $sql = "SELECT * FROM Plik";
  $result = $file->getFileInfo($sql);
  foreach($result as $row){
      echo "<a href=\"file-download.php?file_id={$row->ID_Plik}&file_name={$row->nazwa}&user_id={$_SESSION['ID_USER']}\" class=\"items\">".$row->nazwa."</a>";
  }
?>