<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

$sqlRequestusers = ("SELECT * FROM USER");
$pdoStatusers = $dbh->prepare($sqlRequestusers);
$pdoStatusers->execute();

$resultusers = $pdoStatusers->fetchAll(PDO::FETCH_ASSOC);

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
    <title>ASSOCIATION L'ANCRE | Getion des utilisateurs</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-10 flex flex-col items-center">
        <h1 class="text-5xl">Gestion des utilisateurs</h1>

        <div class="w-full">
            <a href="addusers.php"
                class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Ajouter</a>
        </div>

        <div>
            <table>
                <thead class="bg-[#FF1D25] text-white p-2">
                    <tr>
                        <th class="p-2 border-2 border-[#931212]">Nom</th>
                        <th class="p-2 border-2 border-[#931212]">Prénom</th>
                        <th class="p-2 border-2 border-[#931212]">Adresse Mail</th>
                        <th class="p-2 border-2 border-[#931212]">Rôle</th>
                        <th class="p-2 border-2 border-[#931212]">Fonctionnalités</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultusers as $users) { ?>
                    <tr>
                        <td class="p-2 border-2 border-black"><?php echo $users['nom'] ?></td>
                        <td class="p-2 border-2 border-black"><?php echo $users['prenom'] ?></td>
                        <td class="p-2 border-2 border-black"><?php echo $users['mail'] ?></td>
                        <?php foreach ($resultroles as $roles) {
                                if ($roles['id'] == $users['id_roles']) { ?>
                        <td class="p-2 border-2 border-black"><?php echo $roles['nom'] ?></td>
                        <?php }
                            } ?>
                        <td class="p-2 border-2 border-black space-x-8 flex flex-row">
                            <?php echo '<a href="/modifuser.php?id=' . $users['id'] . '"><img src="../assets/images/crayon.png" alt="Crayon" class="w-[40px]"></a>' ?>
                            <?php echo '<a href="/voirusers.php?id=' . $users['id'] . '"><img src="../assets/images/oeil.png" alt="Oeil" class="w-[40px]"></a>' ?>
                            <?php echo '<a href="/delusers.php?id=' . $users['id'] . '"><img src="../assets/images/poub.png" alt="Poubelle" class="w-[40px]"></a>' ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>