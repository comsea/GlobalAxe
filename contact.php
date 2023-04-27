<?php
session_start();
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
        content="GlobalAxe, hébergement, Charleville-Mézières, Ardennes, hébergement d'urgence, réadaptation sociale, aide sociale, association agréée, Le Trait d'Union, Centre d'hébergement">
    <meta name="description"
        content="Spécialisée dans le champ de l’Accueil Hébergement Insertion (AHI) et de l’insertion socioprofessionnelle, l’Association GLOBAL AXE et ses équipes œuvrent chaque jour au service de l’Humain.">

    <title>GLOBAL AXE | Nous contacter</title>

    <link rel="canonical" href="https://globalaxe.fr" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b94a9a31fc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="shortcut icon" href="assets/images/icon.png">
</head>

<body class="lg:text-base text-sm text-justify">
    <?php include "assets/includes/navbar.php" ?>

    <div class="w-full flex flex-col items-center lg:py-16 py-3 relative text-white">
        <img src="assets/images/bg.png" alt="Image bg présentation"
            class="absolute w-full h-full -z-20 top-0 object-cover" title="Background titre">
        <div class="absolute w-full h-full -z-10 bg-black/50 top-0 m-0"></div>
        <h1 class="lg:text-5xl text-2xl font-semibold">Contact</h1>
    </div>
    <?php $isPosted = isset($_SESSION['success']);
    if ($isPosted && !$_SESSION['success']) : ?>
    <p class="bg-red-300 text-red-700 rounded py-1 px-3 border border-red-700"><?= $_SESSION['error_msg'] ?>
    </p>
    <?php elseif ($isPosted && $_SESSION['success']) : ?>
    <p class="bg-lime-400 text-green-800 py-1 px-3 border border-green-800">Votre mail a bien été
        envoyé</p>
    <?php endif; ?>

    <div class="w-full flex flex-col items-center lg:mt-16 mt-10 lg:space-y-8 space-y-4">
        <div class="w-11/12 flex flex-col items-center space-y-2">
            <h2 class="font-bold lg:text-6xl text-2xl">Vous voulez plus d'informations ?</h2>
            <div class="w-5/6 h-[5px] bg-gradient-to-r from-[#931212] to-[#FF1D25] rounded-full"></div>
        </div>

        <div class="lg:mt-16 mt-10 flex justify-center lg:text-lg text-sm">
            <div class="lg:w-2/3 w-10/12 relative">
                <form action="/assets/php/mail.php" method="post"
                    class="w-full flex flex-col bg-[#FCFCFC] lg:p-8 p-3 rounded space-y-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <div class="flex lg:flex-row flex-col w-full lg:space-x-5 space-x-0 lg:space-y-0 space-y-2">
                        <div class="lg:w-1/2 w-full lg:space-y-3 space-y-2">
                            <div class="flex flex-col items-start w-full">
                                <label for="name">Nom*</label>
                                <input type="text" for="contact" id="name" name="name"
                                    class="bg-[#DDDDDD] rounded w-full p-1">
                            </div>
                            <div class="flex flex-col items-start w-full">
                                <label for="firstname">Prénom*</label>
                                <input type="text" for="contact" id="firstname" name="firstname"
                                    class="bg-[#DDDDDD] rounded w-full p-1">
                            </div>
                            <div class="flex flex-col items-start w-full">
                                <label for="email">Adresse email*</label>
                                <input type="text" for="contact" id="email" name="email"
                                    class="bg-[#DDDDDD] rounded w-full p-1">
                            </div>
                            <div class="flex flex-col items-start w-full">
                                <label for="subject">Sujet*</label>
                                <input type="text" for="contact" id="subject" name="subject"
                                    class="bg-[#DDDDDD] rounded w-full p-1">
                            </div>
                            <div class="flex flex-col items-start w-full">
                                <label for="phone">Téléphone</label>
                                <input type="text" for="contact" id="phone" name="phone"
                                    class="bg-[#DDDDDD] rounded w-full p-1">
                            </div>
                        </div>
                        <div class="lg:w-1/2 w-full lg:h-[367px] h-[100px]">
                            <div class="flex flex-col items-start w-full h-full">
                                <label for="message">Message*</label>
                                <textarea name="message" for="contact" id="message"
                                    class="bg-[#DDDDDD] rounded w-full h-full p-1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-row items-center space-x-4">
                        <input type="checkbox" name="check" for="contact" id="check" class="bg-[#DDDDDD] rounded">
                        <label for="check">Ce formulaire permet de recueillir vos coordonnées afin que nous puissions
                            vous recontacter au plus vite et répondre à votre demande. Les données de ce formulaire sont
                            conservées le temps de répondre à votre demande.</label>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <p class="underline lg:text-base text-xs">Ce site est protégé par reCAPTCHA et la Politique de
                            Confidentialité t les Conditions d'utilisation de Google.</p>
                        <p class="underline lg:text-base text-xs">Les données recueillies via ce formulaire de contact,
                            sont uniquement destinées au Groupe AMBITION à des fins d’usage interne et ne seront jamais
                            retransmises à des tiers non autorisés.</p>
                    </div>
                    <input type="hidden" name="recaptcha-response" id="recaptchaResponse">
                    <div>
                        <input type="submit" value="Envoyer"
                            class="bg-gradient-to-r from-[#931212] to-[#FF1D25] px-4 py-1 rounded text-white">
                        <p class="lg:text-base text-xs">*Champs obligatoires</p>
                    </div>
                    <?php unset($_SESSION['error_msg']);
                    unset($_SESSION['success']); ?>
                </form>
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col items-center lg:mt-16 mt-10 lg:space-y-8 space-y-4">
        <div class="w-11/12 flex flex-col items-center space-y-2">
            <h2 class="font-bold lg:text-6xl text-2xl">Ou alors nous rejoindre ?</h2>
            <div class="w-5/6 h-[5px] bg-gradient-to-r from-[#931212] to-[#FF1D25] rounded-full"></div>
        </div>

        <div class="w-11/12 flex flex-col space-y-4">
            <div class="w-full flex lg:flex-row flex-col items-center lg:space-x-2 lg:space-y-0 space-y-2">
                <p>Pour consulter toutes nos offres veuillez cliquer sur le bouton suivant : </p>
                <a href="https://www.groupeambition.fr" target="_blank"
                    class="text-white bg-gradient-to-r from-[#0065CC] to-[#212A68] rounded px-4 py-1">AMBITION</a>
            </div>
        </div>
    </div>

    <div class="w-full grid grid-cols-4 lg:mt-16 mt-10">
        <div class="bg-black lg:p-5 p-2 text-white space-y-2">
            <p class="text-lg">Conseil d'administration</p>
        </div>
        <div class="bg-[#931212] lg:p-5 p-2 text-white space-y-2">
            <p class="text-lg">Maison de la Veille Social</p>
            <p class="lg:ml-5 ml-2 text-start">53 Avenue Léon Bourgeois, 08000, Charleville-Mézières</p>
            <p class="lg:ml-5 ml-2 text-start">03.24.27.12.73</p>
        </div>
        <div class="bg-[#FF1D25] lg:p-5 p-2 text-white space-y-2">
            <p class="text-lg">Pôle Ingénierie & Développement</p>
            <p class="lg:ml-5 ml-2 text-start">53 Avenue Léon Bourgeois, 08000, Charleville-Mézières</p>
            <p class="lg:ml-5 ml-2 text-start">03.24.59.16.76</p>
        </div>
        <div class="lg:p-5 p-2 space-y-2 border-t border-black">
            <p class="text-lg">Chantiers d'Insertion</p>
        </div>
    </div>

    <?php include "assets/includes/map.php" ?>
    <?php include "assets/includes/footer.php" ?>

    <script src="assets/js/navbar.js"></script>
</body>

</html>