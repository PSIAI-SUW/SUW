<?php

require_once '../config.php';

$user = $_POST['user'];
$kurs = $_POST['kurs'];
//$dostep = $_POST['dostep'];
//$act = $db->query("SELECT * FROM users WHERE login = '$activate'")->fetchAll(PDO::FETCH_OBJ);
$dos = $db->query("SELECT * FROM kurs") ->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['dostepButton'])) {
    if ($dos) {
        $stmt = $db->prepare('INSERT INTO dostep (nr_kursu, nr_user) VALUES (:kurs, :user)');
        $stmt->execute(array(
            ':kurs' => $_POST['kurs'],
            ':user' => $_POST['user']
        ));
        header('Location: ../settings_admin.php?not=20');
    }
    else
    {
        //echo "Wypełnij poprawnie formularz";
    }

}

/*if ($dos) {
    $query = ("INSERT INTO dostep VALUES (nr_kursu = '$kurs', nr_user = '$user'");
    $stmt = $db->query($query);
    //header('Location: ../settings_admin.php?not=2');
    echo "Nadałeś uprawnienia";

}*/



?>