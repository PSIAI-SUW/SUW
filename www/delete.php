<?php
$filename = $_POST['filename'];
$file_to_del = ("uploadkurs/$filename");
unlink($file_to_del);
echo "Usunięto $file_to_del !";

$filename1 = $_POST['filename1'];
$file_to_del1 = ("uploadwyklad/$filename1");
unlink($file_to_del1);
echo "Usunięto $file_to_del1 !";
?>