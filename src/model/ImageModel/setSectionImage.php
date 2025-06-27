<?php
include_once '../../control/BDDControl/connectBDD.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['imageId'], $data['service'])) {
    echo json_encode(['success' => false, 'message' => 'Paramètres manquants']);
    exit;
}

$imageId = (int)$data['imageId'];
$service = $data['service'];

try {
    $stmt = $bdd->prepare("UPDATE images SET tag = NULL WHERE filtres_services = :service AND tag = 'imgSectionService'");
    $stmt->execute(['service' => $service]);

    $stmt2 = $bdd->prepare("UPDATE images SET tag = 'imgSectionService' WHERE id = :id");
    $stmt2->execute(['id' => $imageId]);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
