<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Pannel administrateur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5">
        <h1 class="text-5xl">Bienvenue sur le pannel administrateur du site Global Axe !!!</h1>

        <p>Ici vous pouvez Ajouter/Modifier/Supprimer les actualités du site.</p>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>