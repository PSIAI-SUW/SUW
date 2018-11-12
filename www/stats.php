<?php

/* Połączenie z bazą danych */
$dbHost = 'mysql.cba.pl';
$dbUser = 'BazaISUW';
$dbPassword = 'BazaISUW1';
$dbName = 'jakub9616';

$today = date('d');
$week = date('W');
$month = date('m');
$year = date('Y');

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if(mysqli_connect_errno())
{
    echo 'Błąd bazy danych: '.mysqli_connect_error();
}

/* Zapytanie SQL zliczające liczbę użytkowników */
$results = $mysqli->query("SELECT COUNT(ID_USER) FROM users WHERE type_account='user'");
$row = mysqli_fetch_array($results, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z "dzisiaj" */
$download_today = $mysqli->query("SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE DAY(data_dodania)=$today");
$download_today2 = mysqli_fetch_array($download_today);

/* Zapytanie SQL zliczające pliki z tygodnia */
$download_week = $mysqli->query("SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE WEEK(data_dodania,5)=$week AND YEAR(data_dodania)=$year");
$download_week2 = mysqli_fetch_array($download_week, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z miesiaca */
$download_month = $mysqli->query("SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE MONTH(data_dodania)=$month");
$download_month2 = mysqli_fetch_array($download_month, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z semestru */
$download_semestr = $mysqli->query("SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku");
$download_semestr2 = mysqli_fetch_array($download_semestr, MYSQLI_NUM);

?>