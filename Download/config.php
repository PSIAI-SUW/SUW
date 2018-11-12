<?php

$db_host		= 'mysql.cba.pl';
$db_user		= 'kkucharr';
$db_pass		= 'Adif123Q1';
$db_database		= 'kkucharr'; 

$directory='files';

$link = @mysql_connect($db_host,$db_user,$db_pass);

mysql_set_charset('utf8');
mysql_select_db($db_database,$link);

?>