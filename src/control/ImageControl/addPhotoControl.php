<?php
session_start();

include_once '../../control/BDDControl/connectBDD.php';
include_once '../../model/ImageModel/addPhotoModel.php';
include_once '../../model/Services/imageService.php';

if (isset($_POST['publishPhoto'])) {
    $photoName = trim($_POST['photoName']);
    $photoDesc = $_POST['photoDesc'];
    $photoAlt  = $_POST['photoDesc'];
    $createdAt = date('Y-m-d H:i:s');

    $validTags = ['imgHeroHome'];
    $tag = null;

    if (isset($_POST['tag']) && in_array($_POST['tag'], $validTags)) {
        $tag = $_POST['tag'];
    }

    $filtreService = $_POST['filtres_services'] ?? null;
    $filtreTheme   = $_POST['filtres_themes']   ?? null;
    $filtreLieu    = $_POST['filtres_lieux']    ?? null;

    if (empty($photoName) || empty($photoDesc)) {
        die("Le nom et la description de la photo sont obligatoires.");
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../../public/assets/img/';

        $tmpName  = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        function removeAccents($str)
        {
            return iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        }

        // Ajout d’un identifiant unique 
        $uniqueId = '_' . uniqid();

        $photoNameNoAccents = removeAccents($photoName);

        $uniqueFilename = $photoNameNoAccents . $uniqueId . '.' . $fileExt;
        $destination = $uploadDir . $uniqueFilename;

        $width    = 800;
        $height   = 800;
        $quality  = 75;

        if (!ImageService::compressAndResizeImage($tmpName, $destination, $width, $height, $quality)) {
            die("Erreur lors de la compression/redimensionnement de l’image.");
        }

        $addPhotoModel = new AddPhotoModel();
        $addPhoto = $addPhotoModel->insertPhoto(
            $bdd,
            $photoDesc,
            $uniqueFilename,
            $photoAlt,
            $filtreService,
            $filtreTheme,
            $filtreLieu,
            $tag,
            $createdAt
        );

        if ($addPhoto) {
            header('Location: ../../views/page/dashboard.php?success=1');
            exit;
        } else {
            die("Une erreur est survenue lors de l’enregistrement en base de données.");
        }
    } else {
        die("Image manquante ou erreur d’upload (erreur #{$_FILES['image']['error']}).");
    }
} else {
    // Accès direct sans soumission de formulaire
    header('Location: ../../views/page/dashboard.php');
    exit;
}
