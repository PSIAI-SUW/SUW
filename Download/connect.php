<?php

require_once 'configuration.php';


$link = @mysql_connect($db_host,$db_user,$db_pass);

mysql_set_charset('utf8');
mysql_select_db($db_database,$link);

?>