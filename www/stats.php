<?php

$today = date('d');
$week = date('W');
$month = date('m');
$year = date('Y');



/* Zapytanie SQL zliczające liczbę użytkowników */
$sql = "SELECT COUNT(ID_USER) FROM users WHERE type_account='user'";
$users = $stats->getStatCount($sql);

/* Zapytanie SQL zliczające pliki z "dzisiaj" */
$sql = "SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE DAY(data_dodania)=$today";
$download_today = $stats->getStatCount($sql);

/* Zapytanie SQL zliczające pliki z tygodnia */
$sql = "SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE WEEK(data_dodania,5)=$week AND YEAR(data_dodania)=$year";
$download_week = $stats->getStatCount($sql);

/* Zapytanie SQL zliczające pliki z miesiaca */
$sql = "SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE MONTH(data_dodania)=$month";
$download_month = $stats->getStatCount($sql);

/* Zapytanie SQL zliczające pliki z semestru */
$sql = "SELECT COUNT(ID_Pobieranie_Pliku) FROM Pobranie_Pliku WHERE YEAR(data_dodania)=$year AND MONTH(data_dodania) IN (10,11,12,01,02)";
$download_semestr = $stats->getStatCount($sql);

?>