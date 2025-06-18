<?php

// Ouvre la session
session_start();

// Inclus les fichiers nécessaires
include_once '../../model/ContactModel/contactModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['website'])) {
        header('Location: ../../views/page/contact.php');

        // Fin du script après redirection volontaire pour éviter toute exécution supplémentaire
        exit;
    }

    $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES);
    $subject = htmlspecialchars($_POST["subject"], ENT_QUOTES);
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES);

    $getInsertInto = new ContactModel();
    $getInsertInto->getInsert($bdd, $name, $email, $subject, $message);

    // === ENVOI EMAIL DE NOTIFICATION ===
    $to = 'blackhole.evenements@gmail.com'; // Email de destination
    $subjectMail = "📩 Nouveau message reçu sur Black Hole Événements : $subject";

    $messageMail = "
    <html>
    <head>
        <title>$subjectMail</title>
    </head>
    <body>
        <p><strong>Nom :</strong> $name</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Objet :</strong> $subject</p>
        <p><strong>Message :</strong><br>" . nl2br($message) . "</p>
    </body>
    </html>
";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: blackhole.evenements@gmail.com" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Envoie du mail
    mail($to, $subjectMail, $messageMail, $headers);

    $getInformation = new ContactModel();
    $resultatsforms = $getInformation->getInfo($bdd, $name, $email, $subject, $message);

    $_SESSION['contact_success'] = true;
    $_SESSION['contact_name'] = $resultatsforms["name"];

    header('Location: ../../views/page/contact.php');

    // Fin du script après redirection volontaire pour éviter toute exécution supplémentaire
    exit;
}
