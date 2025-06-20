<section class="hero-section container">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <img src="../../../public/assets/logo.png" alt="Logo de BlackHole Evènements" class="logo mb-3">
            <h1>Black Hole Evénements</h1>
            <p class="hero-subtitle">
                Spécialiste de
                <a href="../../../public/files/plaquettePrestations.pdf" target="_blank" download="Plaquette_prestations_sur_mesure_Black_Hole_Evénements.pdf" class="custom-link">
                    l'événementiel sur mesure
                </a> : mariages, concerts, festivals...
            </p>
            <div class="center-btn mt-4">
                <a href="contact.php" style="text-decoration: none;"><button class="btn">Un devis ? Contactez-nous</button></a>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Carrousel -->
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover" data-bs-interval="3500">
                <div class="carousel-inner rounded shadow">
                    <?php foreach ($imagesHeroHome as $index => $img): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="../../../public/assets/img/<?= htmlspecialchars($img['chemin_img']) ?>"
                                class="d-block w-100"
                                alt="<?= htmlspecialchars($img['alt']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Indicateurs dynamiques -->
                <div class="carousel-indicators">
                    <?php for ($i = 0; $i < $totalHeroHomeImages; $i++): ?>
                        <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="<?= $i ?>"
                            class="<?= $i === 0 ? 'active' : '' ?>"
                            aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                            aria-label="Slide <?= $i + 1 ?>"></button>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="hero-presentation">
            <p class="hero-description">
                Black Hole Événements, votre expert événementiel à Riom, transforme chaque moment en une expérience unique. <br> Son, lumière, vidéo, déco, effets spéciaux... <br> Tout ce qu’il faut pour sublimer vos mariages, concerts, galas ou festivals, avec du matériel pro et sur-mesure.
            </p>
        </div>
    </div>
</section>