<?php
$filename = $_POST['filename'];
$file_to_del = ("upload/$filename");
unlink($file_to_del);
echo "Usunięto $file_to_del !";
?>