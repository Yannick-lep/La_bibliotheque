<?php
require PHP_ROOT . '/includes/functions-emprunts.php';

$idEmprunt = $_GET['id'] ?? null;

if (is_numeric($idEmprunt)) {
    $state = supprimerEmprunt($pdo, $idEmprunt);
}

redirect("?page=depart-emprunts");
