<?php

require_once '../config.php';

if(isset($_POST['activateButton']))
{
    $activate = $_POST['activate'];
    $query = "UPDATE users SET active = 'aktywny' WHERE login = '$activate'";
    $stmt = $db->query($query);
}

header('Location: ../settings_admin.php');

?>