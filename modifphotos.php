<?php

require 'admin/db/auth.php';
forcer_utilisateur_connecte();

require "admin/db/connectdb.php";

$stmt = $dbh->prepare('SELECT * FROM photos WHERE id = ?');
$stmt->execute(array($_GET['id']));
$contact = $stmt->fetch(PDO::FETCH_ASSOC);


$sqlRequestarticles = ("SELECT * FROM articles");
$pdoStatarticles = $dbh->prepare($sqlRequestarticles);
$pdoStatarticles->execute();

$resultarticles = $pdoStatarticles->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';

        $img_nom = $_FILES['image']['name'];
        $tmp_nom = $_FILES['image']['tmp_name'];
        $time = time();
        $nouveau_nom_img = $time . $img_nom;
        $deplacer_img = move_uploaded_file($tmp_nom, "assets/images/" . $nouveau_nom_img);
        if ($deplacer_img) {
        } else {
            $message = "Veuillez choisir une image inférieur à 1Mo";
            echo $message;
            die;
        }
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        file_get_contents($image);

        $stmt = $dbh->prepare('UPDATE photos SET nom = ?, lien = ?, id_articles = ? WHERE id = ?');
        $stmt->execute(array($nom, $nouveau_nom_img, $id, $_GET['id']));

        header('Location: /photo.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBAL AXE | Modification d'une photo</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="flex flex-col items-center justify-center text-xl">
    <?php include "assets/includes/adminnav.php" ?>

    <div class="w-11/12 py-10 space-y-5 flex flex-col items-center">
        <h1 class="text-5xl">Modification d'une photo</h1>

        <div class="w-full">
            <div class="w-full">
                <a href="photo.php"
                    class="bg-gradient-to-r from-[#931212] to-[#FF1D25] text-white rounded px-5 py-2">Retour</a>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex flex-col items-center">
        <form action="modifphotos.php?id=<?php echo $contact['id']; ?>" method="post" enctype="multipart/form-data"
            class="w-2/3 flex flex-col bg-[#EAEAEA] p-4 border-2 border-[#931212] rounded-xl space-y-8">
            <div class="w-full">
                <div class="w-full lg:space-y-3 space-y-2">
                    <div class="flex flex-col items-start w-full">
                        <label for="titre">Nom de la photo*</label>
                        <input type="text" for="addarticle" id="titre" name="titre"
                            value="<?php echo $contact['nom']; ?>" class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="image">Image*</label>
                        <input type="file" for="addarticle" id="image" name="image"
                            class="rounded w-full p-1 text-black">
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <label for="id">Article en lien*</label>
                        <select name="id" id="id">
                            <?php foreach ($resultarticles as $art) {
                                if ($art["id"] == $contact['id_articles']) { ?>

                            <option value="<?php echo $art['id']; ?>">
                                <?php echo $art['titre']; ?></option>
                            <?php }
                            } ?>
                            <?php foreach ($resultarticles as $article) { ?>
                            <option value="<?php echo $article['id'] ?>"><?php echo $article['titre'] ?></option>
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