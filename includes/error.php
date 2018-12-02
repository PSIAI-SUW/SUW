if (isset($_GET['error'])){
    echo "<div class=\"notification is-danger\">";
    if ($_GET['error'] == 1 ) echo $error[] = "Brak uprawnień administratora";
    echo "</div>";
}
