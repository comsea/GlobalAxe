<?php

require "admin/db/connectdb.php";

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
        <img src="assets/images/bg.png" alt="Image bg présentation"
            class="absolute w-full h-full -z-20 top-0 object-cover" title="Background titre">
        <div class="absolute w-full h-full -z-10 bg-black/50 top-0 m-0"></div>
        <h1 class="lg:text-5xl text-2xl font-semibold">Nos articles</h1>
    </div>

    <div class="flex flex-col items-center w-full lg:my-16 my-10 lg:space-y-8 space-y-4">
        <div class="lg:w-11/12 w-5/6 grid lg:grid-cols-4 grid-cols-1 gap-5">
            <?php foreach ($resultarticles as $article) { ?>
            <div class="bg-[#FAFAFA] border-2 border-[#931212] rounded-xl p-2 lg:space-y-3 space-y-2">
                <img src="assets/images/<?php echo $article['image'] ?>" alt="Image artcles" class="w-full">
                <h2 class="lg:text-3xl text-xl font-bold text-[#FF1D25] w-full"><?php echo $article['titre'] ?></h2>
                <p class="text-[#931212] font-semibold w-full"><?php echo $article['accroche'] ?></p>
                <p class="w-full line-clamp-3"><?php echo $article['description'] ?></p>
                <div class="w-full flex justify-between lg:text-sm text-xs">
                    <p class="text-[#AAAAAA]"><?php echo $article['createdAt'] ?></p>
                    <?php echo "<a href='/Article?id=" . $article['id'] . "'>Voir l'article ></a>" ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include "assets/includes/map.php" ?>
    <?php include "assets/includes/footer.php" ?>
    <script src="assets/js/navbar.js"></script>
</body>

</html>