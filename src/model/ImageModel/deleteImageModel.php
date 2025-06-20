<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: ../../views/page/inspiration.php");
    exit;
}

$imgID = $_GET['id'];

include_once '../../control/BDDControl/connectBDD.php';

// 1. Récupérer le nom du fichier
$stmt = $bdd->prepare("SELECT chemin_img FROM images WHERE id = ?");
$stmt->execute([$imgID]);
$image = $stmt->fetch(PDO::FETCH_ASSOC);

// 2. Supprimer le fichier si trouvé
if ($image && !empty($image['chemin_img'])) {
    $cheminFichier = "../../../public/assets/img/" . $image['chemin_img'];

    if (file_exists($cheminFichier)) {
        unlink($cheminFichier); // Supprimer le fichier image
    }
}

// 3. Supprimer la ligne dans la base
$query = $bdd->prepare("DELETE FROM images WHERE id = ?");
$query->execute([$imgID]);

// 4. Rediriger
header("Location: ../../views/page/inspiration.php");
exit;
