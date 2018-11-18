<?php

require_once '../config.php';

if(isset($_POST['deleteButton']))
{
    $delete = $_POST['delete'];
    $query = "DELETE FROM users WHERE login = '$delete'";
    $stmt = $db->query($query);
}

header('Location: ../settings_admin.php');

?>