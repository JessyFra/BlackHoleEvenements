<?php
$current_page = basename($_SERVER['PHP_SELF']);
$page_type = $_GET['type'] ?? '';
?>

<nav class="navbar navbar-expand-md fixed-top customNavbar">
    <div class="container-fluid">
        <a href="home.php" class="navbar-brand"><img src="../../../public/assets/logo.png" alt="Logo Black Hole Evènements"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') { ?>
                    <li class="nav-item dropdown">
                        <a class="custom-nav-link dropdown-toggle" href="#" id="navbarAdminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Navigation administrateur
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarAdminDropdown">
                            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="dashboard.php?type=messagerie">Messagerie</a></li>
                            <li><a class="dropdown-item" href="dashboard.php?type=galerie">Galerie</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="dashboard.php?type=changelog">Journal des modifications</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="custom-nav-link dropdown-toggle" href="#" id="navbarAdminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Navigation publique
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarAdminDropdown">
                            <li><a class="dropdown-item" href="home.php">Accueil</a></li>
                            <li><a class="dropdown-item" href="service.php">Service</a></li>
                            <li><a class="dropdown-item" href="inspiration.php">Inspiration</a></li>
                            <li><a class="dropdown-item" href="actualite.php">Actualités</a></li>
                            <li><a class="dropdown-item" href="legalPage.php?type=faq">FAQ</a></li>
                            <li><a class="dropdown-item" href="legalPage.php?type=ml">Mentions légales</a></li>
                            <li><a class="dropdown-item" href="legalPage.php?type=pc">Politique de confidentialité</a></li>
                            <li><a class="dropdown-item" href="contact.php">Contactez-nous</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>" href="home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'service.php') ? 'active' : ''; ?>" href="service.php">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'inspiration.php') ? 'active' : ''; ?>" href="inspiration.php">Inspiration</a>
                    </li>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'legalPage.php' && $page_type == 'faq') ? 'active' : ''; ?>" href="legalPage.php?type=faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'actualite.php') ? 'active' : ''; ?>" href="actualite.php">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="custom-nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contactez-nous</a>
                    </li>
                <?php }; ?>

                <?php if (!empty($_SESSION['userID'])): ?>
                    <li class="nav-item">
                        <a class="custom-nav-link text-danger" href="../../control/UserControl/logoutUser.php" title="Déconnexion">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>