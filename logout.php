<?php require('config.php');
$user->logout();

header('Location: index.php');
exit;
?>