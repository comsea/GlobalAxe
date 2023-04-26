<?php

require '../db/connectdb.php';

$image = $titre = "";
if (isset($_POST)) {
    if (isset($_POST["titre"]) && (!empty($_POST["titre"]))) {
        $titre = htmlspecialchars($_POST["titre"]);
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

    if (isset($_POST["accroche"]) && (!empty($_POST["accroche"]))) {
        $accroche = htmlspecialchars($_POST["accroche"]);
    }
    if (isset($_POST["description"]) && (!empty($_POST["description"]))) {
        $description = htmlspecialchars($_POST["description"]);
    }

    $createdAt = date("d/m/y");
} else {
}

$sqlRequest = "INSERT INTO `articles` (`titre`, `accroche`, `image`, `description`, `createdAt`) 
                        VALUES (?,?,?,?,?);";
$pdoStat = $dbh->prepare($sqlRequest);
$pdoStat->execute(array($titre, $accroche, $nouveau_nom_img, $description, $createdAt));
$row = $pdoStat->fetchall(PDO::FETCH_ASSOC);
header('Location: ../../addactus.php');
