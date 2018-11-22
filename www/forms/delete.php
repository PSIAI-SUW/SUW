<?php

require_once '../config.php';

if(empty($_POST['deleteButton']))
{
	if(isset($_POST['deleteButton']))
	{
		if ("SELECT FROM users WHERE login = '$delete'")
		{
		$delete = $_POST['delete'];
		$query = "DELETE FROM users WHERE login = '$delete'";
		$stmt = $db->query($query);
		
		header('Location: ../settings_admin.php?not=1');
		}
	}
}
else
{
	header('Location: ../settings_admin.php?error=10');
}



?>