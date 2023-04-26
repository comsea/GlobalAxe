<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Utils/functions.php');

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

if (!empty($_POST['recaptcha-response'])) {

    try {
        $recaptchaToken = $_POST['recaptcha-response'];
        $response = callRecaptchaAPI($recaptchaToken);


        if (empty($response) || is_null($response)) {
            header('Location:/');
        } else {

            $data = json_decode($response);

            if ($data->success && $data->score < 0.4) {
                throw new Exception("Votre message n'a pas été envoyé car il a été considéré comme un spam.");
            }
        }

        if (
            isset($_POST['name']) && !empty($_POST['name']) &&
            isset($_POST['firstname']) && !empty($_POST['firstname']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['subject']) && !empty($_POST['subject']) &&
            isset($_POST['message']) && !empty($_POST['message']) &&
            isset($_POST['check']) && !empty($_POST['check'])
        ) {


            $to = "l.poiret@globalaxe08.fr";
            $subject = valid_donnees($_POST['subject']);
            $message = valid_donnees($_POST['message']);
            $mail = valid_donnees($_POST['email']);
            $nom = valid_donnees($_POST['name']);
            $prenom = valid_donnees($_POST['firstname']);

            // $message = wordwrap($message, 70, "\r\n");
            $msgContent =  "Vous avez un reçu un nouveau message depuis le formulaire de contact de $nom $prenom, email $mail : <br>   $message ";

            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/html; charset=utf-8';
            $headers[] = 'From: noreply@globalaxe08.fr';

            if (!mail($to, $subject, $msgContent, implode("\r\n", $headers))) {
                throw new Exception("Une erreur s'est produite lors de l'envoi du mail.");
            };
            //Enregistrement des données de consentement dans un fichier xml 
            try {
                if ($_POST['check']) {
                    $filename = $_SERVER['DOCUMENT_ROOT'] . "/users.xml";
                    $users = simplexml_load_file($filename);
                    if (!$users) {
                        throw new Exception();
                    }
                    $today = new DateTime();
                    $user = $users->addChild('user');
                    $user->addChild('name', $_POST['name'] . " " . $_POST['firstname']);
                    $user->addChild('date', $today->format('d-m-Y H:i:s'));
                    $user->addChild('email', $_POST['email']);
                    $user->addChild('message', $_POST['message']);
                    $user->addChild('consent', "Consentement : exploitation des données dans le cadre de la demande de contact et de la relation commerciale qui peut en découler.");

                    file_put_contents($filename, $users->asXML());
                }
            } catch (\Exception $e) {
                //continue if error
            }

            $_SESSION['success'] = true;
        } else {
            throw new Exception("Veuillez renseigner tous les champs");
        }
    } catch (Exception $e) {
        $_SESSION['success'] = false;
        $_SESSION['error_msg'] = $e->getMessage();
    } finally {
        header("Location:/contact.php#success");
    }
} else {
    header("Location:/contact.php");
}