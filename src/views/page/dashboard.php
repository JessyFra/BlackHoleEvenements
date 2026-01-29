<?php

session_start();

$isMessagerieView = (isset($_GET['type']) && $_GET['type'] === 'messagerie');
$isGalleryView = (isset($_GET['type']) && $_GET['type'] === 'galerie');
$isChangelogView = (isset($_GET['type']) && $_GET['type'] === 'changelog');

if ($isMessagerieView) {
    include_once '../../control/AdminControl/messagerieControl.php';
} elseif ($isGalleryView) {
    include_once '../../control/InspirationControl/filtreControl.php';
} elseif ($isChangelogView) {
    // Pas de contrôleur spécifique nécessaire pour le changelog
} else {
    include_once '../../control/AdminControl/unReadMessageControl.php';
    include_once '../../model/AdminModel/visitorModel.php';

    $visitorModel = new VisitorModel();
    $year = (int)date("Y");
    $month = (int)date("m");

    $monthData = $visitorModel->getMonthlyVisitors($bdd, $year, $month);
    $yearData = $visitorModel->getYearlyVisitors($bdd, $year);

    $totalVisitorCountYear = $visitorModel->getVisitorCountYear($bdd, $year);
    $monthVisitorCount = $monthData ? $monthData['visitor_count'] : 0;

    // Transforme les données annuelles en format JS
    $monthlyData = array_fill(1, 12, 0);
    foreach ($yearData as $entry) {
        $monthlyData[(int)$entry['month']] = (int)$entry['visitor_count'];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta -->
    <?php include '../component/head.php'; ?>

    <?php if ($isMessagerieView) { ?>
        <link rel="stylesheet" href="../../../public/css/styleAdmin/styleMessagerie.css">
        <link rel="stylesheet" href="../../../public/css/stylePopUp/stylePopUp.css">
    <?php } else if ($isGalleryView) { ?>
        <link rel="stylesheet" href="../../../public/css/styleAdmin/styleGallery.css">
    <?php } else if ($isChangelogView) { ?>
        <link rel="stylesheet" href="../../../public/css/styleAdmin/styleChangelog.css">
    <?php } else { ?>
        <link rel="stylesheet" href="../../../public/css/styleAdmin/styleDashboard.css">
    <?php } ?>

    <title>Dashboard - Black Hole Evènements</title>
</head>

<body>

    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php' ?>

    <?php if ($isMessagerieView) {
        include 'sectionDashboard/sectionMessagerie.php';
    } else if ($isGalleryView) {
        include 'sectionDashboard/sectionGallery.php';
    } else if ($isChangelogView) {
        include 'sectionDashboard/sectionChangelog.php';
    } else {
        include 'sectionDashboard/sectionDashboard.php';
    } ?>

    <!-- Liens vers les scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php if ($isMessagerieView) { ?>
        <script src="../../../public/js/messagePopup.js"></script>
    <?php } else if (!$isGalleryView && !$isChangelogView) {
        include '../../../public/js/historyVisit.php';
    } ?>

</body>

</html>