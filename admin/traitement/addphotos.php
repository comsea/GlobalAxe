<?php

require '../db/connectdb.php';

$image = $nom = "";
if (isset($_POST)) {
    if (isset($_POST["nom"]) && (!empty($_POST["nom"]))) {
        $nom = htmlspecialchars($_POST["nom"]);
    }

    $img_nom = $_FILES['image']['name'];
    $tmp_nom = $_FILES['image']['tmp_name'];
    $time = time();
    $nouveau_nom_img = $time . $img_nom;
    $deplacer_img = move_uploaded_file($tmp_nom, "../../assets/images/" . $nouveau_nom_img);
    if ($deplacer_img) {
    } else {
        $message = "Veuillez choisir une image inférieur à 1Mo";
        echo $message;
        die;
    }

    if (isset($_POST["id"]) && (!empty($_POST["id"]))) {
        $id = htmlspecialchars($_POST["id"]);
    }
} else {
}

$sqlRequest = "INSERT INTO `photos` (`nom`, `lien`, `id_articles`) 
                        VALUES (?,?,?);";
$pdoStat = $dbh->prepare($sqlRequest);
$pdoStat->execute(array($nom, $nouveau_nom_img, $id));
$row = $pdoStat->fetchall(PDO::FETCH_ASSOC);
header('Location: ../../addphotos.php');
