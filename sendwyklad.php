<?php 
	require_once("config.php");

$plik_tmp = $_FILES['plik']['tmp_name']; 
$plik_nazwa = $_FILES['plik']['name']; 
$plik_rozmiar = $_FILES['plik']['size']; 


if(is_uploaded_file($plik_tmp)) 
{ 
     move_uploaded_file($plik_tmp, "uploadwyklad/$plik_nazwa"); 
   // echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze
    //<strong>$plik_rozmiar bajtów</strong> dodano.";
    header('Location: main.php?not=16');


	
	$sql = "SELECT MAX(ID_Plik) AS id FROM Plik;";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$id = $stmt->fetch(PDO::FETCH_ASSOC);
	$id = (isset($id['id'])) ? $id['id'] : 0; 




	$sql = "insert into `Plik` (`nazwa` , `nr_kursu` , `nr_pliku` , `sciezka`) VALUES (:name, :nkurs, :nplik, :path)";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
		"name"=>$plik_nazwa,
        "nkurs"=>$_POST['nrkursu'],
		"nplik"=>($id+1), 
		"path"=>"uploadwyklad/$plik_nazwa"));




	
	$sql = "insert into `Dodanie_Pliku` (`data_dodania`, `nr_kursu`, `nr_plik` , `nr_user`) VALUES (NOW(),:nkurs, :nplik, :nuser)";
	
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
		"nkurs"=>$_POST['nrkursu'],
		"nplik"=>($id+1), 
		"nuser"=>$_SESSION['ID_USER'])); 

} 


?> 