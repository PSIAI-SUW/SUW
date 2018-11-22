<?php

require_once '../config.php';

if(empty($_POST['deactivateButton']))
{
	if(isset($_POST['deactivateButton']))
	{
		$deactivate = $_POST['deactivate'];
		$query = "UPDATE users SET active = 'nieaktywny' WHERE login = '$deactivate'";
		$stmt = $db->query($query);
	}

	header('Location: ../settings_admin.php?not=3');
}
else
{
	header('Location: ../settings_admin.php?error=10');
}
	
?>