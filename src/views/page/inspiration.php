<?php
session_start();

include_once '../../control/AdminControl/visitorControl.php';
include_once '../../control/InspirationControl/filtreControl.php';
include_once '../../control/ImageControl/galleryImageControl.php';

$selectedService = $_GET['service'] ?? '';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta et autres head communs -->
    <?php include '../component/head.php'; ?>

    <!-- Feuille de style spécifique à la page Inspiration -->
    <link rel="stylesheet" href="../../../public/css/styleInspiration/styleInspiration.css">

    <title>Inspiration - Black Hole Evènements</title>
</head>

<body>

    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php'; ?>

    <!-- Section Inspiration principale -->
    <?php include 'sectionInspiration/sectionInspiration.php'; ?>

    <!-- Inclusion du pied de page -->
    <?php include '../component/footer.php'; ?>

    <!-- Librairies JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts personnalisés -->
    <script src="../../../public/js/filterPhoto.js"></script>
    <script src="../../../public/js/filterReset.js"></script>
    <script src="../../../public/js/searchLieu.js"></script>
    <script src="../../../public/js/filterServiceToInspiration.js"></script>

</body>

</html>
