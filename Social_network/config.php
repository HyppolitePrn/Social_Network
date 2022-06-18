<!-- connexion à la base de donnée -->
<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=shiba_db;charset=utf8', 'root', 'root');
    }catch(Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }