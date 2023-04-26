<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

$stmt = $dbh->prepare('SELECT * FROM USER WHERE id = ?');
$stmt->execute(array($_GET['id']));
$contact = $stmt->fetch(PDO::FETCH_ASSOC);


$sqlRequestroles = ("SELECT * FROM roles");
$pdoStatroles = $dbh->prepare($sqlRequestroles);
$pdoStatroles->execute();

$resultroles = $pdoStatroles->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
        $password = md5(htmlspecialchars($_POST["password"]));
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        $stmt = $dbh->prepare('UPDATE USER SET nom = ?, prenom = ?, mail = ?, password = ?, id_roles = ? WHERE id = ?');
        $stmt->execute(array($nom, $prenom, $mail, $password, $id, $_GET['id']));

        header('Location: /users.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Modification d'un utilisateur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Modification d'un utilisateur</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="users.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex flex-col items-center">
        <form action="modifuser.php?id=<?php echo $contact['id']; ?>" method="post" enctype="multipart/form-data"
            class="w-2/3 flex flex-col bg-[#EAEAEA] p-4 border-2 border-[#931212] rounded-xl space-y-8">
            <div class="w-full">
                <div class="w-full lg:space-y-3 space-y-2">
                    <div class="flex flex-col items-start w-full">
                        <label for="nom">Nom*</label>
                        <input type="text" for="adduser" id="nom" name="nom" value="<?php echo $contact['nom']; ?>"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="prenom">Prénom*</label>
                        <input type="text" for="adduser" id="prenom" name="prenom"
                            value="<?php echo $contact['prenom']; ?>" class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="mail">Adresse mail*</label>
                        <input type="text" for="adduser" id="mail" name="mail" value="<?php echo $contact['mail']; ?>"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="password">Mot de passe*</label>
                        <input type="password" for="adduser" id="password" name="password"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="id">Role de l'utilisateur*</label>
                        <select name="id" id="id">
                            <?php foreach ($resultroles as $role) {
                                if ($role["id"] == $contact['id_roles']) { ?>

                            <option value="<?php echo $role['id']; ?>">
                                <?php echo $role['nom']; ?></option>
                            <?php }
                            } ?>
                            <?php foreach ($resultroles as $roles) { ?>
                            <option value="<?php echo $roles['id'] ?>"><?php echo $roles['nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <input type="submit" value="Modifier" class="bg-[#FF1D25] px-4 py-1 rounded cursor-pointer text-white">
                <p class="lg:text-base text-xs">*Champs obligatoires</p>
            </div>
        </form>
    </div>

    <script src="assets/js/navbar.js"></script>
</body>

</html>