<?php

// variable connexion à la BDD
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "Shiba_DB";
$username = "root";
$password = "root";

// PDO pour la connexion à la BDD
$bdd = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

?>
