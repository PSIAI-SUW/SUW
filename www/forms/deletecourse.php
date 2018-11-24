<?php
require_once '../config.php';



$delete = $_POST['idCourse'];

$delco = $db->query("SELECT * FROM kurs WHERE ID_Kurs = '$delete'")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['deleteCourse']))
{
    $sql = "DELETE FROM kurs WHERE ID_Kurs = '$delete'";
    if($delco)
    {
    $result = $courses->insertDeleteCourse($sql);
    header('Location: ../main.php?not=11');
    }
    else
    {
    header('Location: ../main.php?errors=12');
    }
}
if(empty($_POST['idCourse']))
{
    header('Location: ../main.php?errors=11');
}

?>