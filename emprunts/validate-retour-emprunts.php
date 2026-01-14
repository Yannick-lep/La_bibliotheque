<?php
require PHP_ROOT . '/includes/functions-emprunts.php';

$emprunt = [];
$errors = [];

$idEmprunt = $_GET['id'] ?? null;

if (!is_numeric($idEmprunt)) {
    die();
}

$emprunt = validateRetourEmprunt($pdo, $idEmprunt);

if ($emprunt) {
    redirect('?page=retour-emprunts');
}

redirect("?page=500");