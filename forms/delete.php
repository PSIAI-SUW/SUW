<?php

require_once '../config.php';


$delete = $_POST['delete'];
$del = $db->query("SELECT * FROM users WHERE login = '$delete'")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['deleteButton']))
{
    if ($del) {
        $query = "DELETE FROM users WHERE login = '$delete'";
        $stmt = $db->query($query);
        header('Location: ../settings_admin.php?not=1');
    }
    else{
        header('Location: ../settings_admin.php?error=10');
    }
}
if(empty($_POST['delete']))
{
    header('Location: ../settings_admin.php?error=10');
}



?>