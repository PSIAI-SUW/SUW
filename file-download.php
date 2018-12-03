<?php
    require_once('config.php');
    $id_plik = $_GET['file_id'];
    $id_user = $_GET['user_id'];
    $date = date('Y-m-d H:i:s');

    // statystyka
    $sql = "INSERT INTO Pobranie_Pliku (ID_Pobieranie_Pliku, data_dodania, nr_plik, nr_user) VALUES (NULL, '".$date."' , '".$id_plik."', '".$id_user."')";
    $result = $file->insertDeleteFile($sql);
    
    echo "Added to stats";
    //$file->downloadFile($id_plik, $id_user);
?>