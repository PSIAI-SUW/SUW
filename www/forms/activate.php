<?php

require_once '../config.php';

if(empty($_POST['activateButton']))
{
	if(isset($_POST['activateButton']))
	{
		$activate = $_POST['activate'];
		$query = "UPDATE users SET active = 'aktywny' WHERE login = '$activate'";
		$stmt = $db->query($query);
	}

	header('Location: ../settings_admin.php?not=2');
}
else
{
	header('Location: ../settings_admin.php?error=10');
}
?>