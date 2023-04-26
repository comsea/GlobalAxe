<?php

require '../db/auth.php';
forcer_utilisateur_connecte();

require '../db/connectdb.php';

if (isset($_POST)) {
    if (isset($_POST["nom"]) && (!empty($_POST["nom"]))) {
        $nom = htmlspecialchars($_POST["nom"]);
    }
    if (isset($_POST["prenom"]) && (!empty($_POST["prenom"]))) {
        $prenom = htmlspecialchars($_POST["prenom"]);
    }
    if (isset($_POST["mail"]) && (!empty($_POST["mail"]))) {
        $mail = htmlspecialchars($_POST["mail"]);
    }
    if (isset($_POST["password"]) && (!empty($_POST["password"]))) {
        $password = md5(htmlspecialchars($_POST["password"]));
    }
    if (isset($_POST["id"]) && (!empty($_POST["id"]))) {
        $id = htmlspecialchars($_POST["id"]);
    }
} else {
}


$sqlRequest = "INSERT INTO `USER` (`nom`, `prenom`, `mail`, `password`, `id_roles`) 
                        VALUES (?,?,?,?,?);";
$pdoStat = $dbh->prepare($sqlRequest);

$pdoStat->execute(array($nom, $prenom, $mail, $password, $id));

$row = $pdoStat->fetchall(PDO::FETCH_ASSOC);
header('Location: ../../addusers.php');
