<?php 
$plik_tmp = $_FILES['plik']['tmp_name']; 
$plik_nazwa = $_FILES['plik']['name']; 
$plik_rozmiar = $_FILES['plik']['size']; 

if(is_uploaded_file($plik_tmp)) { 
     move_uploaded_file($plik_tmp, "uploadkurs/$plik_nazwa"); 
    echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> dodano."; 
} 
?> 