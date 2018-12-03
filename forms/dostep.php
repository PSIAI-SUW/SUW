<?php

require_once '../config.php';

$user = $_POST['user'];
$kurs = $_POST['plik'];
$dos = $db->query("SELECT * FROM plik") ->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['dostepButton'])) {
    if ($dos) {
        $stmt = $db->prepare('INSERT INTO dostep (nr_pliku, nr_user) VALUES (:plik, :user)');
        $stmt->execute(array(
            ':plik' => $_POST['plik'],
            ':user' => $_POST['user']
        ));
        header('Location: ../settings_admin.php?not=20');
    }
}

/*if ($dos) {
    $query = ("INSERT INTO dostep VALUES (nr_kursu = '$kurs', nr_user = '$user'");
    $stmt = $db->query($query);
    //header('Location: ../settings_admin.php?not=2');
    echo "Nadałeś uprawnienia";

}*/



?>