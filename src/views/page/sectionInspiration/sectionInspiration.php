<section class="main-container">
    <!-- SIDEBAR avec TITRE + FILTRES -->
    <div class="sidebar">
        <!-- TITRE -->
        <div class="faq-section">
            <h2 class="section-title">Inspiration</h2>
            <hr class="title-separator">
        </div>

        <!-- Reset -->
        <div class="filter-reset-container">
            <button id="resetFiltersBtn" class="resetFilter" title="Réinitialiser les filtres">Retirer les filtres</button>
        </div>

        <!-- Filtres : Service -->
        <div class="filter-group open" data-filter="service">
            <div class="filter-header">Service</div>
            <div class="filter-options">
                <?php foreach ($services as $service): ?>
                    <label>
                        <input type="checkbox"
                            value="<?= htmlspecialchars($service['valeur']) ?>"
                            class="filter-checkbox"
                            <?= ($service['valeur'] === $selectedService) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($service['nom']) ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Filtres : Thème -->
        <div class="filter-group" data-filter="theme">
            <div class="filter-header">Thème</div>
            <div class="filter-options">
                <?php foreach ($themes as $theme): ?>
                    <label>
                        <input type="checkbox" value="<?= htmlspecialchars($theme['valeur']) ?>" class="filter-checkbox">
                        <?= htmlspecialchars($theme['nom']) ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Filtres : Lieux -->
        <div class="filter-group" data-filter="lieux">
            <div class="filter-header">Lieux</div>
            <input type="text" id="lieuxSearch" placeholder="Rechercher un lieu">
            <div id="lieuxSuggestions"></div>
            <div class="filter-options" id="lieuxFilterList">
                <?php foreach ($lieux as $lieu): ?>
                    <label>
                        <input type="checkbox" value="<?= htmlspecialchars($lieu['valeur']) ?>" class="filter-checkbox">
                        <?= htmlspecialchars($lieu['nom']) ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- GALERIE -->
    <div class="gallery">
        <?php foreach ($imagesGallery as $img): ?>
            <div class="photo-wrapper position-relative">
            <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') { ?>
                <a href="../../model/ImageModel/deleteImageModel.php?id=<?= $img['id'] ?>"
                    class="delete-badge"
                    title="Supprimer l’image"
                    onclick="event.stopPropagation();">
                    <i class="fa-solid fa-trash" style="color: red;"></i>
                </a>
            <?php } ?>
            
                <img
                    src="../../../public/assets/img/<?= htmlspecialchars($img['chemin_img']) ?>"
                    loading="lazy"
                    alt="<?= htmlspecialchars($img['alt']) ?>"
                    class="photo"
                    data-id="<?= $img['id'] ?>"
                    data-service="<?= htmlspecialchars($img['filtres_services'] ?? '') ?>"
                    data-theme="<?= htmlspecialchars($img['filtres_themes'] ?? '') ?>"
                    data-lieux="<?= htmlspecialchars($img['filtres_lieux'] ?? '') ?>"
                    data-bs-toggle="modal"
                    data-bs-target="#imageModal" />
            </div>
        <?php endforeach; ?>

        <!-- Message si aucun résultat -->
        <div id="no-results" class="hidden">
            Aucun résultat ne correspond à vos filtres...
        </div>
    </div>
</section>

<!-- Modale personnalisée pour image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class=" modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-0" style="background-color: transparent; height: calc(100vh - 62px); margin: 0;">
                <img
                    id="modalImage"
                    src=""
                    alt="Image agrandie"
                    class="img-fluid"
                    style="max-width: 90vw; max-height: 90vh; object-fit: contain; cursor: pointer; margin: 0; display: block;"
                    data-bs-dismiss="modal">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalImage = document.getElementById('modalImage');

        document.querySelectorAll('.gallery .photo').forEach(img => {
            img.addEventListener('click', function() {
                modalImage.src = this.src;
                modalImage.alt = this.alt;
            });
        });
    });
</script>