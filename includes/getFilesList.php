<?php

if(isset($_GET['ID_Kurs']))
{
    $getID = htmlentities($_GET['ID_Kurs'],ENT_QUOTES);
    $sql = "SELECT * FROM plik WHERE nr_kursu = $getID";
    $result = $file->getFileName($sql);
    if(!empty($result)) {
        foreach ($result as $row) {
            echo "<li><a href=\"file-download.php?file_id={$row->ID_Plik}&file_name={$row->nazwa}&url={$row->sciezka}&user_id={$_SESSION['ID_USER']}\" class=\"items\">".$row->nazwa."</a></li>";
        }
    }
    else
    {
        echo "<p>Brak plików do pobrania.</p>";
    }
}

?>