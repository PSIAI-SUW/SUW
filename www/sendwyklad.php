<?php 
$plik_tmp = $_FILES['plik']['tmp_name']; 
$plik_nazwa = $_FILES['plik']['name']; 
$plik_rozmiar = $_FILES['plik']['size']; 

if(is_uploaded_file($plik_tmp)) { 
     move_uploaded_file($plik_tmp, "uploadwyklad/$plik_nazwa"); 
    echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> dodano."; 
	
	$send_lecture_sql = "insert into `Dodanie_Pliku` (`ID_Dodanie_Pliku`, `data_dodania`, `nr_kurs`, `nr_plik` , `nr_user`) VALUES ('', '2018-01-01', '1', '1', '6')";
	$send_lecture = mysql_query($send_lecture_sql);
} 
?> 