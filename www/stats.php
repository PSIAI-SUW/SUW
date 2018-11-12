<?php

/* Połączenie z bazą danych */
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'psiai';

$today = date("Y-m-d");
$week = date("Y-m-d", strtotime(' +7 day'));
$month = date("Y-m-d", strtotime(' +1 month'));
$semestr_start = date("Y-m-d", strtotime('2018-10-01'));
$semestr_end = date("Y-m-d", strtotime('2019-01-20'));

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if(mysqli_connect_errno())
{
    echo 'Błąd bazy danych: '.mysqli_connect_error();
}

/* Zapytanie SQL zliczające liczbę użytkowników */
$results = $mysqli->query("SELECT COUNT(rola) FROM uzytkownicy WHERE rola='student'");
$row = mysqli_fetch_array($results, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z "dzisiaj" */
$download_today = $mysqli->query("SELECT COUNT(data_dodania) FROM dodanie_pliku WHERE data_dodania='$today'");
$download_today2 = mysqli_fetch_array($download_today, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z tygodnia */
$download_week = $mysqli->query("SELECT COUNT(data_dodania) FROM dodanie_pliku WHERE data_dodania >= $today AND data_dodania <= $week");
$download_week2 = mysqli_fetch_array($download_week, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z miesiaca */
$download_month = $mysqli->query("SELECT COUNT(data_dodania) FROM dodanie_pliku WHERE data_dodania >= $today AND data_dodania <= $month");
$download_month2 = mysqli_fetch_array($download_month, MYSQLI_NUM);

/* Zapytanie SQL zliczające pliki z semestru */
$download_semestr = $mysqli->query("SELECT COUNT(data_dodania) FROM dodanie_pliku WHERE data_dodania >= $semestr_start AND data_dodania <= $semestr_end");
$download_semestr2 = mysqli_fetch_array($download_semestr, MYSQLI_NUM);

?>