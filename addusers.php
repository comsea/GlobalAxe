<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

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
    <title>GLOBAL AXE | Ajout d'un utilisateur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Ajout d'un utilisateur</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="users.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex justify-center">
        <form action="admin/traitement/addusers.php" method="post" enctype="multipart/form-data"
            class="w-2/3 flex flex-col bg-[#EAEAEA] p-4 border-2 border-[#931212] rounded-xl space-y-8">
            <div class="w-full">
                <div class="w-full lg:space-y-3 space-y-2">
                    <div class="flex flex-col items-start w-full">
                        <label for="nom">Nom*</label>
                        <input type="text" for="adduser" id="nom" name="nom" class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="prenom">Prénom*</label>
                        <input type="text" for="adduser" id="prenom" name="prenom"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="mail">Adresse mail*</label>
                        <input type="text" for="adduser" id="mail" name="mail" class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="password">Mot de passe*</label>
                        <input type="text" for="adduser" id="password" name="password"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="id">Role de l'utilisateur*</label>
                        <select name="id" id="id">
                            <option value="">--Choisissez un role--</option>
                            <?php foreach ($resultroles as $roles) { ?>
                            <option value="<?php echo $roles['id'] ?>"><?php echo $roles['nom'] ?></option>
                            <?php } ?>
                        </select>
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