<?php

require 'admin/db/connectdb.php';

$query = "SELECT * FROM articles WHERE id = ?";
$retour = $dbh->prepare($query);
$retour->execute(array($_GET['id']));

$resultat = $retour->fetch(PDO::FETCH_ASSOC);
