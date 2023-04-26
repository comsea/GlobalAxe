<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Connexion</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-10 flex flex-col items-center">
        <h1 class="text-5xl">Connexion au pannel administrateur</h1>

        <div class="w-1/2">
            <form action="admin/traitement/cousers.php" method="post"
                class="w-full flex flex-col bg-[#EAEAEA] p-4 border-2 border-[#931212] rounded-xl space-y-8">
                <div class="flex flex-col">
                    <label for="utilisateur">Adresse Mail :</label>
                    <input type="text" name="utilisateur" id="utilisateur" required class="p-1 rounded">
                </div>

                <div class="flex flex-col">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" name="mdp" id="mdp" required class="p-1 rounded">
                </div>

                <div class="envoi">
                    <input type="submit" value="Connexion"
                        class="bg-[#FF1D25] px-4 py-1 rounded cursor-pointer text-white">
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/navbar.js"></script>
</body>

</html>