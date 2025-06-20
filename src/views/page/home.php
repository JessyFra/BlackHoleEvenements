<?php
session_start();

include_once '../../control/AdminControl/visitorControl.php';
include_once '../../control/ImageControl/heroHomeImageControl.php';
include_once '../../control/ImageControl/sectionServiceImageControl.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta -->
    <?php include '../component/head.php'; ?>

    <!-- Feuille de style spécifique à la page d'accueil -->
    <link rel="stylesheet" href="../../../public/css/styleHome/styleGeneral.css">
    <link rel="stylesheet" href="../../../public/css/styleHome/styleHero.css">
    <link rel="stylesheet" href="../../../public/css/styleHome/styleVideo.css">
    <link rel="stylesheet" href="../../../public/css/styleHome/styleService.css">
    <link rel="stylesheet" href="../../../public/css/styleHome/styleAvis.css">

    <title>Accueil - Black Hole Evènements</title>
</head>

<body>

    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php'; ?>

    <!-- Section Hero -->
    <?php include 'sectionHome/sectionHero.php'; ?>

    <!-- Section Service -->
    <?php include 'sectionHome/sectionService.php'; ?>

    <!-- Section Service inédit -->
    <?php include 'sectionHome/sectionVideo.php'; ?>

    <!-- Section Avis clients -->
    <?php include 'sectionHome/sectionAvis.php'; ?>

    <!-- Inclusion du pied de page -->
    <?php include '../component/footer.php'; ?>

    <!-- Librairies JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts personnalisés -->
    <script src="../../../public/js/autoPlayVideo.js"></script>
    <script src="../../../public/js/serviceHoverActive.js"></script>
    <script src="../../../public/js/countUp.js"></script>

</body>

</html>