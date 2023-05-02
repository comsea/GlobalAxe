<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=ancre;charset=utf8;port=8889', 'root', 'Comsea', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
} 
/*  
try {
    $dbh = new PDO('mysql:host=ancrefpbdd.mysql.db;dbname=ancrefpbdd;charset=utf8', 'ancrefpbdd', 'Assoancre08', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}*/