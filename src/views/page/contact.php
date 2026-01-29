<?php

session_start();

include_once '../../control/AdminControl/visitorControl.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta -->
    <?php include '../component/head.php'; ?>

    <link rel="stylesheet" href="../../../public/css/styleContact/styleFormContact.css">
    <link rel="stylesheet" href="../../../public/css/stylePopUp/stylePopUp.css">

    <title>Contact - Black Hole Evènements</title>
</head>

<body>

    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php' ?>

    <?php include 'sectionContact/sectionFormContact.php' ?>

    <!-- Popup de confirmation -->
    <?php if (isset($_SESSION['contact_success']) && $_SESSION['contact_success'] === true) { ?>
        <div id="popup" class="popup show">
            <div class="popup-content">
                <p>Merci <?php echo $_SESSION['contact_name']; ?> !<br> Votre message a bien été envoyé.</p>
                <button id="closePopup">Fermer</button>
            </div>
        </div>
        <?php
        // Supprimer la variable de session après affichage
        unset($_SESSION['contact_success']);
        unset($_SESSION['contact_name']);
        ?>
    <?php } ?>

    <!-- Popup d'erreur -->
    <?php if (isset($_SESSION['contact_error'])) { ?>
        <div id="popup" class="popup show">
            <div class="popup-content">
                <p style="color: #dc3545;"><?php echo $_SESSION['contact_error']; ?></p>
                <button id="closePopup">Fermer</button>
            </div>
        </div>
        <?php
        unset($_SESSION['contact_error']);
        ?>
    <?php } ?>

    <!-- Inclusion du pied de page -->
    <?php include '../component/footer.php' ?>

    <!-- Liens vers les scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="../../../public/js/popupScript.js"></script>

</body>

</html>
