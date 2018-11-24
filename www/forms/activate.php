<?php

require_once '../config.php';

/*
if(isset($_POST['activateButton']))
{
	if(empty($_POST['activateButton']))
	{
		$activate = $_POST['activate'];
		$query = "UPDATE users SET active = 'aktywny' WHERE login = '$activate'";
		$stmt = $db->query($query);
        header('Location: ../settings_admin.php?not=2');
	}
}
else
{
    header('Location: ../settings_admin.php?error=10');
}
*/

$activate = $_POST['activate'];
$act = $db->query("SELECT * FROM users WHERE login = '$activate'")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['activateButton']))
{
    if ($act) {
        $query = "UPDATE users SET active = 'aktywny' WHERE login = '$activate'";
        $stmt = $db->query($query);
        header('Location: ../settings_admin.php?not=2');
    }
    else{
        header('Location: ../settings_admin.php?error=10');
    }
}
if(empty($_POST['activate']))
{
    header('Location: ../settings_admin.php?error=10');
}




?>