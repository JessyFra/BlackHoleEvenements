<?php

// Ouvre la session
session_start();

// Inclus les fichiers nécessaires
include_once '../../model/ContactModel/contactModel.php';
include_once '../../model/Services/antiSpamService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // === INITIALISATION DU SERVICE ANTI-SPAM ===
    $antiSpam = new AntiSpamService($bdd);

    // === NETTOYAGE DES DONNÉES ===
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST["email"]), ENT_QUOTES);
    $subject = htmlspecialchars(trim($_POST["subject"]), ENT_QUOTES);
    $message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES);

    // === VALIDATION BASIQUE ===
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['contact_error'] = "Tous les champs sont obligatoires.";
        header('Location: ../../views/page/contact.php');
        exit;
    }

    // === ANALYSE ANTI-SPAM (AVANT L'INSERTION) ===
    $spamAnalysis = $antiSpam->analyzeContent($name, $email, $subject, $message);

    if ($spamAnalysis['isSpam']) {
        // Message générique pour ne pas donner d'infos au spammeur
        $_SESSION['contact_error'] = "Votre message n'a pas pu être envoyé. Veuillez vérifier son contenu.";
        header('Location: ../../views/page/contact.php');
        exit; // IMPORTANT : On arrête ici, AVANT l'insertion en BDD
    }

    // === SI ON ARRIVE ICI, LE MESSAGE EST LÉGITIME ===

    // Insertion en base de données
    $contactModel = new ContactModel();
    $contactModel->getInsert($bdd, $name, $email, $subject, $message);

    // === ENVOI EMAIL DE NOTIFICATION ===
    $to = 'blackhole.evenements@gmail.com';
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

    // === CONFIRMATION ===
    $_SESSION['contact_success'] = true;
    $_SESSION['contact_name'] = $name;

    header('Location: ../../views/page/contact.php');

    // Fin du script après redirection volontaire pour éviter toute exécution supplémentaire
    exit;
}
