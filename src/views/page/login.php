<?php

session_start();

include_once '../../control/AdminControl/visitorControl.php';

$errorKey = isset($_GET) ? array_key_first($_GET) : null;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta -->
    <?php include '../component/head.php'; ?>

    <!-- Feuille de style spécifique à la page Login -->
    <link rel="stylesheet" href="../../../public/css/styleAccount/styleLoginForm.css">
    <link rel="stylesheet" href="../../../public/css/stylePopUp/stylePopUp.css">

    <title>Connexion - Black Hole Evènements</title>
</head>

<body>

    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php' ?>

    <div class="main-container">
        <!-- Form box -->
        <div class="box">
            <span class="borderLine"></span>
            <!-- Form -->
            <form method="POST" action="../../control/UserControl/loginUser.php">
                <h2>Connexion</h2>
                <!-- Input fields -->
                <div class="inputBox inputBoxOther">
                    <input type="text" name="username" maxlength="26" pattern="[a-zA-Z0-9._]{3,26}" title="Seules les lettres, chiffres, '.' et '_' sont autorisés (entre 3 et 26 caractères)" autocomplete="off" required>
                    <span>Identifiant</span>
                    <i></i>
                </div>
                <div class="inputBox inputBoxOther">
                    <input type="password" name="password" pattern="[A-Za-zÀ-ÿ0-9.]+" maxlength="15" title="Le mot de passe doit contenir des lettres, des chiffres et uniquement le symboles POINT" autocomplete="off" required>
                    <span>Mot de passe</span>
                    <i></i>
                </div>
                <!-- End of Input fields -->
                <div class="links">
                    <a href="#" style="cursor: default;">Mode administrateur</a>
                </div>
                <input type="submit" name="connexion" value="Se connecter">
            </form>
            <!-- End of Form -->
        </div>
        <!-- End of Form box -->
    </div>

    <!-- Popup error -->
    <?php if (!empty($errorKey)) { ?>
        <div id="popup" class="popup show">
            <div class="popup-content">
                <p class="popup-para">Le compte n'existe pas ou n'a pas encore était créer...</p>
                <a href="login.php" id="closePopup">Fermer</a>
            </div>
        </div>
    <?php } ?>

    <!-- Inclusion du pied de page -->
    <?php include '../component/footer.php' ?>

    <!-- Liens vers les scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>