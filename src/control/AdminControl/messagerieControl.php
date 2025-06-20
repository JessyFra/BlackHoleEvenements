<?php

// Inclus les fichiers nécessaires
include_once '../../model/AdminModel/messagerieModel.php';

$MessagerieModel = new MessagerieModel();
$messages = $MessagerieModel->getAllMess($bdd);
