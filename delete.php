<?php
	require_once("config.php");


	/*if (isset($_POST['filename'])){
		$filename = $_POST['filename'];
		$file_to_del = ("uploadkurs/$filename");
		if (file_exists($file_to_del)){
			unlink($file_to_del);

		echo "Usunięto $file_to_del !";
        }
	}*/




	if (isset($_POST['filename1'])){ //tu usuwamy plik/wykład
		$filename1 = $_POST['filename1'];

		$stmt = $db->prepare("SELECT sciezka,nr_pliku FROM Plik WHERE nazwa=:name;"); // znajdz sciezke i nr pliku o tej nazwie
		$stmt->execute(array("name"=>$filename1));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$file_to_del1 = $row['sciezka']; // sciezka pliku do usuniecia		
			
		if (file_exists($file_to_del1)){ // jeśli plik istnieje
			unlink($file_to_del1); //usuń plik

			$stmt = $db->prepare("DELETE FROM Dodanie_Pliku WHERE nr_plik=:nr");
			$stmt->execute(array("nr"=>$row['nr_pliku'])); // usuń wpis z tabeli 

			$stmt = $db->prepare("DELETE FROM Plik WHERE nr_pliku=:nr");
			$stmt->execute(array("nr"=>$row['nr_pliku'])); // usuń wpis z tabeli 
            header('Location: main.php?not=15');
		}
        else
        {
            header('Location: main.php?errors=15');
        }
	}

?>