<?php

error_reporting(E_ALL^E_NOTICE);

require 'config.php';

$files_array = array();

$dir_handle = @opendir($directory);

while ($file = readdir($dir_handle)) 
{
	if($file{0}=='.') continue;
	$files_array[]=$file;
}

$pobieranie=array();

$result = mysql_query("SELECT * FROM pobieranie");

if(mysql_num_rows($result))
	while($row=mysql_fetch_assoc($result)) {
		$pobieranie[$row['nazwa']]=$row['liczba'];
	}

?>

<html>
<head>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<table style="width:100%">
  <tr>
    <th>Nazwa pliku</th>
    <th>Liczba pobrań</th> 
  </tr>
    <?php 
        foreach($files_array as $key=>$val) {
Echo '
  <tr>
    <td><center><a href="download.php?file='.urlencode($val).'">'.$val.'</a></center></td>
    <td><center><span>'.(int)$pobieranie[$val].'</span></center></td>
  </tr>
'; }
    ?>
</table>
</body>
</html>
