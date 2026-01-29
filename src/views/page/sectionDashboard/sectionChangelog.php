<?php
// Chargement du changelog
$changelog = require dirname(__DIR__, 4) . '/private/config/changelog.php';
?>

<main class="main-container">
    <h2 class="section-title">Journal des modifications</h2>
    <hr class="title-separator">

    <section class="container">
        <div class="changelog-info mb-4">
            <p class="text-muted">
                <i class="fas fa-info-circle"></i>
                Ce journal liste toutes les modifications et améliorations apportées au site.
            </p>
        </div>

        <div class="changelog-list">
            <?php if (empty($changelog)): ?>
                <div class="alert alert-info">
                    <i class="fas fa-inbox"></i> Aucune modification enregistrée pour le moment.
                </div>
            <?php else: ?>
                <?php foreach ($changelog as $index => $entry): ?>
                    <div class="changelog-entry">
                        <div class="changelog-date">
                            <i class="fas fa-calendar-alt"></i>
                            <strong><?= htmlspecialchars($entry['date']) ?></strong>
                        </div>
                        <div class="changelog-description">
                            <?= htmlspecialchars($entry['description']) ?>
                        </div>
                    </div>

                    <?php if ($index < count($changelog) - 1): ?>
                        <div class="changelog-separator"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>