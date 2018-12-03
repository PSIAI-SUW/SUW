<?php
    require_once('config.php');

    $id_plik = htmlentities(stripslashes(trim($_GET['file_id'])), ENT_QUOTES);
    $nazwa_plik = htmlentities(stripslashes(trim($_GET['file_name'])), ENT_QUOTES);
    $id_user = htmlentities(stripslashes(trim($_GET['user_id'])), ENT_QUOTES);
    $id_kurs = htmlentities(stripslashes(trim($_GET['kurs_id'])), ENT_QUOTES);
    $path = htmlentities(stripslashes(trim($_GET['url'])), ENT_QUOTES);
    $date = date('Y-m-d H:i:s');
	$ip_user = htmlentities(stripslashes(trim($_GET['user_ip'])), ENT_QUOTES);
    $file_url = $path;

    // statystyka
    $sql = "INSERT INTO Pobranie_Pliku (ID_Pobieranie_Pliku, data_dodania, nr_kurs, nr_plik, nr_user, ip_user) VALUES (NULL, '".$date."' , '".$id_kurs."' , '".$id_plik."', '".$id_user."', '".$ip_user."')";
    $result = $file->insertDeleteFile($sql);

    // pobieranie pliku
    $file->downloadFile($file_url, $id_user, $date);
?>