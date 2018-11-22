<?php
require_once '../config.php'; 

if(isset($_POST['changeButton']))
{
	
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$newpassword2 = $_POST['newpassword2'];
	
	if(empty($_POST['oldpassword']) && empty($_POST['newpassword']) && empty($_POST['newpassword2']))
	{
		header('Location: ../settings_user.php?error=8');	
	}
	else
	{
		if($_POST['oldpassword'] != $_POST['newpassword'])
		{
			if($_POST['newpassword'] == $_POST['newpassword2'])
			{
					$stmt = $db->prepare("SELECT password FROM users WHERE login=?");
					$stmt->execute(array($_SESSION['login']));
					$row = $stmt->fetch();
					
					if ($row['password'] == md5($oldpassword ))
					{
						$newpassword = md5($newpassword);
						$stmt = $db->prepare('UPDATE users SET password = :newpassword WHERE login = :login');
						$stmt->execute(array("newpassword" => $newpassword, "login" => $_SESSION['login']));
						header('Location: ../settings_user.php?not=5');
					}
					else 
					{
						header('Location: ../settings_user.php?error=5');
					}
			}
			else 
			{
				header('Location: ../settings_user.php?error=6');
			}
		}
		else
		{
			header('Location: ../settings_user.php?error=7');
		}
	}
}


?>