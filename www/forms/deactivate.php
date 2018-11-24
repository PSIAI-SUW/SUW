<?php

require_once '../config.php';




$deactivate = $_POST['deactivate'];
$dact = $db->query("SELECT * FROM users WHERE login = '$deactivate'")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['deactivateButton']))
{
    if ($dact) {
        $query = "UPDATE users SET active = 'nieaktywny' WHERE login = '$deactivate'";
        $stmt = $db->query($query);
        header('Location: ../settings_admin.php?not=3');
    }
    else
        {
        header('Location: ../settings_admin.php?error=10');
    }
}
if(empty($_POST['deactivate']))
{
    header('Location: ../settings_admin.php?error=10');
}
	
?>