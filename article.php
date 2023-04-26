<?php

require "admin/db/connectdb.php";

require "admin/traitement/voirarticle.php";

$sqlRequestphotos = ("SELECT * FROM photos");
$pdoStatphotos = $dbh->prepare($sqlRequestphotos);
$pdoStatphotos->execute();

$resultphotos = $pdoStatphotos->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Hemonet Teddy">
    <meta name="publisher" content="COMSEA">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
        content="Global Axe, hébergement, Charleville-Mézières, Ardennes, hébergement d'urgence, réadaptation sociale, aide sociale, association agréée, Le Trait d'Union, Centre d'hébergement">
    <meta name="description"
        content="Spécialisée dans le champ de l’Accueil Hébergement Insertion (AHI) et de l’insertion socioprofessionnelle, l’Association GLOBAL AXE et ses équipes œuvrent chaque jour au service de l’Humain.">

    <title>GLOBAL AXE | Nos articles</title>

    <link rel="canonical" href="https://globalaxe.fr" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="shortcut icon" href="assets/images/icon.png">
</head>

<body class="lg:text-base text-sm text-justify">
    <?php include "assets/includes/navbar.php" ?>

    <div class="w-full flex flex-col items-center lg:py-16 py-3 relative text-white">
        <img src="assets/images/<?php echo $resultat["image"] ?>" alt="Image bg présentation"
            class="absolute w-full h-full -z-20 top-0 object-cover" title="Background titre">
        <div class="absolute w-full h-full -z-10 bg-black/50 top-0 m-0"></div>
        <h1 class="lg:text-5xl text-2xl font-semibold"><?php echo $resultat["titre"] ?></h1>
    </div>

    <div class="flex flex-col items-center w-full lg:my-16 my-10 lg:space-y-8 space-y-4">
        <div class="w-11/12 flex flex-col lg:space-y-10 space-y-6">
            <div>
                <a href="Articles"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
            <div class="w-full flex flex-col space-y-2">
                <p class="lg:text-sm text-xs text-[#AAAAAA]"><?php echo $resultat["createdAt"] ?></p>
                <h2 class="lg:text-3xl text-xl font-semibold text-[#931212]"><?php echo $resultat["accroche"] ?></h2>
            </div>
            <p><?php echo $resultat["description"] ?></p>
            <div class="grid lg:grid-cols-4 grid-cols-2 gap-6">
                <?php foreach ($resultphotos as $photo) {
                    if ($photo["id_articles"] == $_GET['id']) { ?>
                <img src="assets/images/<?php echo $photo["lien"] ?>" alt="Photo">
                <?php }
                } ?>
            </div>
        </div>
    </div>

    <?php include "assets/includes/map.php" ?>
    <?php include "assets/includes/footer.php" ?>
    <script src="assets/js/navbar.js"></script>
</body>

</html>