<?php

require("../db/connectdb.php");

$utilisateur = htmlspecialchars($_POST['utilisateur']);
$mdp = md5(htmlspecialchars($_POST['mdp']));

$pdoStat = $dbh->prepare('SELECT * FROM USER WHERE mail = ? AND password = ?');

try {
    $pdoStat->execute(array($utilisateur, $mdp));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$row = $pdoStat->fetch(PDO::FETCH_ASSOC);

if ($pdoStat->rowCount() > 0) {
    session_start();
    $_SESSION['connecte'] = 1;
    $_SESSION['id'] = $row['id'];
    $_SESSION['nom'] = $row['nom'];
    $_SESSION['prenom'] = $row['prenom'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['role'] = $row['id_roles'];
    header('Location: /Administration');
} else {
    echo "Votre pseudo ou mot de passe est incorrect";
}
