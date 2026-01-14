<?php
require PHP_ROOT . '/includes/functions-emprunts.php';

$emprunt = [];
$errors = [];

$idEmprunt = $_GET['id'] ?? null;

if (!is_numeric($idEmprunt)) {
    die();
}

$emprunt = validateDepartEmprunt($pdo, $idEmprunt);

if ($emprunt) {
    redirect('?page=depart-emprunts');
}

redirect("?page=500");