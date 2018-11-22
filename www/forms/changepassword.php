<?php
require_once '../config.php'; 

if(isset($_POST['changeButton']))
{
	
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$newpassword2 = $_POST['newpassword2'];
	
	if(empty($_POST['oldpassword']) && empty($_POST['newpassword']) && empty($_POST['newpassword2']))
	{
		{
		echo "Wypełnij wszystkie pola";
		}
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
						echo "Hasło zostało zmienione";
					}
					else 
					{
						echo "Podajesz błędne hasło";
					}
			}
			else 
			{
				echo "Podane hasła nie są jednakowe";
			}
		}
		else
		{
			echo "Nowe hasło nie różni się od obecnego";
		}
	}
}


?>