<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

require "admin/traitement/voirphoto.php";

$sqlRequestarticles = ("SELECT * FROM articles");
$pdoStatarticles = $dbh->prepare($sqlRequestarticles);
$pdoStatarticles->execute();

$resultarticles = $pdoStatarticles->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Vision d'une photo</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Vision d'une photo</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="photo.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex flex-col justify-center space-y-2">
        <div class="flex flex-row space-x-4">
            <p>Titre de l'article :</p>
            <p><?php echo $resultat["nom"] ?></p>
        </div>
        <div class="flex flex-row space-x-4">
            <p>Image de l'article :</p>
            <img src="assets/images/<?php echo $resultat["lien"] ?>" alt="Image" title="Image" class="w-1/3">
        </div>
        <div class="flex flex-row space-x-4">
            <p>Article en lien avec la photo :</p>
            <?php foreach ($resultarticles as $article) {
                if ($article['id'] == $resultat['id_articles']) { ?>
            <p><?php echo $article['titre'] ?></p>
            <?php }
            } ?>
        </div>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>