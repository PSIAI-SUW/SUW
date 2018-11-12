<?php

error_reporting(E_ALL^E_NOTICE);

require 'connect.php';

$extension='';
$files_array = array();

$dir_handle = @opendir($directory);

while ($file = readdir($dir_handle)) 
{
	if($file{0}=='.') continue;
	
	$parts = explode('.',$file);
	$extension = strtolower(end($parts));
	
	if($extension == 'php') continue;

	$files_array[]=$file;
}

sort($files_array,SORT_STRING);

$file_downloads=array();

$result = mysql_query("SELECT * FROM pobieranie");

if(mysql_num_rows($result))
while($row=mysql_fetch_assoc($result))
{
	$file_downloads[$row['nazwa']]=$row['liczba'];
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

</head>

<body>

<div id="file-manager">

    <ul class="manager">
    <?php 

        foreach($files_array as $key=>$val)
        {
            echo '<li><a href="download.php?file='.urlencode($val).'">'.$val.' 
                    <span class="download-count">'.(int)$file_downloads[$val].'</span></a>
                    </li>';
        }
    
    ?>
  </ul>

</div>

</body>
</html>
