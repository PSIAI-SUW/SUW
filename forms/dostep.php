<?php

require_once '../config.php';

$user = $_POST['user'];
$kurs = $_POST['plik'];
$dos = $db->query("SELECT * FROM plik") ->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['dostepButton'])) {
    if($_POST['plik']<1 OR $_POST['user']<1)
    {
        header('Location: ../settings_admin.php?error=20');
    }
    else
    {
        $stmt = $db->prepare('INSERT INTO dostep (nr_pliku, nr_user) VALUES (:plik, :user)');
        $stmt->execute(array(
            ':plik' => $_POST['plik'],
            ':user' => $_POST['user']
        ));
        header('Location: ../settings_admin.php?not=20');
    }
}



?>