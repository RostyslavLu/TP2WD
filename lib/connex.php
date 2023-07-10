<?php

$host = 'localhost';
$username = 'e2395286';
$password = 'TeEFZVjoCvXwJ3i60gHM';
$dbname = 'e2395286';
$port = 3306;

$connex = mysqli_connect($host, $username, $password, $dbname, $port);
if (!$connex) {
    die ("Erreur de connexion : " . mysqli_connect_error());
}
mysqli_set_charset($connex, "utf8");
?>