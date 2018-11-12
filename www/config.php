<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/Warsaw');

//database credentials
define('DBHOST','127.0.0.1');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','suw');


	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


include('classes/user.php');
$user = new User($db);



?>
