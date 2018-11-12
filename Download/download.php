<?php

error_reporting(E_ALL^E_NOTICE);

require('connect.php');

if(!$_GET['file']);
if($_GET['file']{0}=='.');

if(file_exists($directory.'/'.$_GET['file']))
{
	mysql_query("	INSERT INTO pobieranie SET nazwa ='".mysql_real_escape_string($_GET['file'])."'
					ON DUPLICATE KEY UPDATE liczba=liczba +1");
	
	header("Location: ".$directory."/".$_GET['file']);
	exit;
}

function error($str)
{
	die($str);
}
?>