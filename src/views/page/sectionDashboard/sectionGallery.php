<section class="main-container">
    <div class="article-wrapper container">
        <h2 class="section-title">Ajouter une photo à la galerie</h2>
        <hr class="title-separator">

        <form id="formGallery" method="POST" action="../../control/ImageControl/addPhotoControl.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label for="photoName" class="form-label">Nom de la photo</label>
                        <input type="text" id="photoName" name="photoName"
                            class="form-control" placeholder="Exemple : imgServiceThemeLieux" required>
                    </div>
                    <div class="mb-4">
                        <label for="photoDesc" class="form-label">Description</label>
                        <input type="text" id="photoDesc" name="photoDesc"
                            class="form-control" placeholder="Exemple : Photo sonorisation à la Grange de l'écuyer" required>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="tag"
                                name="tag"
                                value="imgHeroHome">
                            <label class="form-check-label" for="tag">
                                Mettre cette photo dans le carrousel de la page d’accueil
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <p class="fw-bold">Service</p>
                            <div class="row">
                                <?php foreach ($services as $service): ?>
                                    <div class="col-6 col-md-12">
                                        <div class="form-check">
                                            <label class="form-check-label" for="<?= $service['valeur'] ?>">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="filtres_services"
                                                    value="<?= $service['valeur'] ?>">
                                                <?= htmlspecialchars($service['nom']) ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <p class="fw-bold">Thème</p>
                            <div class="row">
                                <?php foreach ($themes as $theme): ?>
                                    <div class="col-6 col-md-12">
                                        <div class="form-check">
                                            <label class="form-check-label" for="<?= $theme['valeur'] ?>">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="filtres_themes"
                                                    value="<?= $theme['valeur'] ?>">
                                                <?= htmlspecialchars($theme['nom']) ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="new_theme" class="form-label fw-bold">Ajouter un nouveau thème</label>
                            <input type="text" class="form-control" id="new_theme" name="new_theme" placeholder="Ex : Bohème">
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="fw-bold">Lieux</p>
                        <div class="row">
                            <?php foreach ($lieux as $lieu): ?>
                                <div class="col-12 col-md-4 mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="<?= $lieu['valeur'] ?>">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="filtres_lieux"
                                                value="<?= $lieu['valeur'] ?>">
                                            <?= htmlspecialchars($lieu['nom']) ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="new_lieu" class="form-label fw-bold">Ajouter un nouveau lieu</label>
                        <input type="text" class="form-control" id="new_lieu" name="new_lieu" placeholder="Exemple : Château de Montbrun">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="article-image-desktop sticky-top">
                        <div class="link mb-3">
                            <input type="submit" name="publishPhoto" value="Valider"
                                class="btn btn-outline-dark btn-sm">
                            <a href="dashboard.php" class="btn btn-outline-dark btn-sm">Retour</a>
                        </div>

                        <div class="position-relative mb-3 image-container">
                            <div class="image-wrapper-edit">
                                <img src="../../../public/assets/img/imgActu/imgActu_Create.png"
                                    alt="Aperçu de la photo" class="img-fluid rounded shadow editable-image"
                                    id="preview-img">
                                <label for="imageUpload" class="edit-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </label>
                            </div>
                            <input type="file" id="imageUpload" name="image"
                                accept="image/*" class="d-none" onchange="previewImage(this)" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview-img');
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>