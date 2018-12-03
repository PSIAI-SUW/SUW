<?php
    require_once('config.php');

    $id_plik = $_GET['file_id'];
    $nazwa_plik = $_GET['file_name'];
    $id_user = $_GET['user_id'];
    $path = $_GET['url'];
    $date = date('Y-m-d H:i:s');

    $file_url = $path.$nazwa_plik.".pdf";

    // statystyka
    $sql = "INSERT INTO Pobranie_Pliku (ID_Pobieranie_Pliku, data_dodania, nr_plik, nr_user) VALUES (NULL, '".$date."' , '".$id_plik."', '".$id_user."')";
    $result = $file->insertDeleteFile($sql);

    // pobieranie pliku
    $file->downloadFile($file_url, $id_user, $date);
?>