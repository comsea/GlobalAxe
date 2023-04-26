<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

require "admin/traitement/voiruser.php";

$sqlRequestroles = ("SELECT * FROM roles");
$pdoStatroles = $dbh->prepare($sqlRequestroles);
$pdoStatroles->execute();

$resultroles = $pdoStatroles->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Vision d'un utilisateur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Vision d'un utilisateur</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="users.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex flex-col justify-center space-y-2">
        <div class="flex flex-row space-x-4">
            <p>Nom :</p>
            <p><?php echo $resultat["nom"] ?></p>
        </div>
        <div class="flex flex-row space-x-4">
            <p>Prénom :</p>
            <p><?php echo $resultat["prenom"] ?></p>
        </div>
        <div class="flex flex-row space-x-4">
            <p>Adresse mail :</p>
            <p><?php echo $resultat["mail"] ?></p>
        </div>
        <div class="flex flex-row space-x-4">
            <p>Role :</p>
            <?php foreach ($resultroles as $role) {
                if ($role['id'] == $resultat['id_roles']) { ?>
            <p><?php echo $role['nom'] ?></p>
            <?php }
            } ?>
        </div>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>