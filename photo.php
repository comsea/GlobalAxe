<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

$sqlRequestphotos = ("SELECT * FROM photos");
$pdoStatphotos = $dbh->prepare($sqlRequestphotos);
$pdoStatphotos->execute();

$resultphotos = $pdoStatphotos->fetchAll(PDO::FETCH_ASSOC);

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
    <title>GLOBAL AXE | Gestion des photos</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Gestion des photos</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="addphotos.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Ajouter</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 grid grid-cols-4 gap-5">
        <?php foreach ($resultphotos as $photo) { ?>
        <div class="bg-[#FAFAFA] border-2 border-[#931212] rounded-xl p-2 space-y-3">
            <img src="assets/images/<?php echo $photo['lien'] ?>" alt="Image" class="w-full">
            <h2 class="text-3xl font-bold text-[#A2D729] w-full"><?php echo $photo['nom'] ?></h2>
            <?php foreach ($resultarticles as $article) {
                    if ($article['id'] == $photo['id_articles']) { ?>
            <p class="text-[#931212] font-semibold w-full"><?php echo $article['titre'] ?></p>
            <?php }
                } ?>
            <div class="w-full flex justify-end space-x-2">
                <?php echo '<a href="/modifphotos.php?id=' . $photo['id'] . '"><img src="../assets/images/crayon.png" alt="Crayon" class="w-[40px]"></a>' ?>
                <?php echo '<a href="/voirphotos.php?id=' . $photo['id'] . '"><img src="../assets/images/oeil.png" alt="Oeil" class="w-[40px]"></a>' ?>
                <?php echo '<a href="/delphotos.php?id=' . $photo['id'] . '"><img src="../assets/images/poub.png" alt="Poubelle" class="w-[40px]"></a>' ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>