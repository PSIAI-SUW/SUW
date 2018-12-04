<?php

if(isset($_GET['ID_Kurs']))
{
    $getID = htmlentities($_GET['ID_Kurs'],ENT_QUOTES);
    $userID = htmlentities($_SESSION['ID_USER'],ENT_QUOTES);
    /*$sql = "SELECT * FROM Plik WHERE nr_kursu = $getID";*/
    $sql = "SELECT * FROM Plik INNER JOIN dostep ON Plik.ID_Plik = dostep.nr_pliku INNER JOIN users ON users.ID_USER = dostep.nr_user WHERE nr_kursu = $getID && dostep.nr_user = $userID";
    $result = $file->getFileName($sql);
    if(!empty($result)) {
        foreach ($result as $row) {
			echo "<li><a href=\"file-download.php?file_id={$row->ID_Plik}&file_name={$row->nazwa}&url={$row->sciezka}&user_ip={$_SERVER['REMOTE_ADDR']}&kurs_id={$getID}&user_id={$_SESSION['ID_USER']}\" class=\"items\">".$row->nazwa."</a></li>"; 
        }
    }
    else
    {
        echo "<p>Brak plików do pobrania.</p>";
    }
}

?>