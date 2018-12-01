<?php

	require_once('config.php');

	if($user->is_logged_in()){
		if ($_SESSION["active"] != "aktywny"){
			if ($_SESSION["type_account"] != "user"){
      	header('Location: main.php');
				die();
      }
    }
	}
	else{
		header('Location: index.php');
		die();
	}

?>
