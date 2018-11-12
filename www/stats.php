<?php

/* Połączenie z bazą danych */
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'psiai';

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if(mysqli_connect_errno())
{
    echo 'Błąd bazy danych: '.mysqli_connect_error();
}

/* Zapytanie SQL zliczające liczbę użytkowników */
$results = $mysqli->query("SELECT COUNT(rola) FROM uzytkownicy WHERE rola='student'");
$row = mysqli_fetch_array($results, MYSQLI_NUM);
print $row[0];  
mysqli_free_result($results);

/* Do zrobienia zliczanie plików dla danego dnia tygodnia miesiąca semestru

 Na koniec trzeba zaimplementować kod do pliku index.php oraz pod bazę danych */

?>