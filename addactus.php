<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Ajout d'un article</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Ajout d'un article</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="actus.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex justify-center">
        <form action="admin/traitement/addarticle.php" method="post" enctype="multipart/form-data"
            class="w-2/3 flex flex-col bg-[#EAEAEA] p-4 border-2 border-[#931212] rounded-xl space-y-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 gap-y-2 lg:gap-y-0 w-full">
                <div class="w-full lg:space-y-3 space-y-2">
                    <div class="flex flex-col items-start w-full">
                        <label for="titre">Titre de l'article*</label>
                        <input type="text" for="addarticle" id="titre" name="titre"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="image">Image*</label>
                        <input type="file" for="addarticle" id="image" name="image"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="accroche">Phrase d'accroche*</label>
                        <input type="text" for="addarticle" id="accroche" name="accroche"
                            class="rounded w-full p-1 text-black">
                    </div>
                </div>
                <div class=" w-full lg:h-full h-[100px]">
                    <div class="flex flex-col items-start w-full h-full">
                        <label for="description">Description*</label>
                        <textarea name="description" for="addarticle" id="description"
                            class="rounded w-full h-full p-1 text-black"></textarea>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <input type="submit" value="Ajouter" class="bg-[#FF1D25] px-4 py-1 rounded cursor-pointer text-white">
                <p class="lg:text-base text-xs">*Champs obligatoires</p>
            </div>
        </form>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>