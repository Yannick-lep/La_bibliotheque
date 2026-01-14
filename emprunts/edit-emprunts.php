<?php
require PHP_ROOT . '/includes/functions-emprunts.php';

$emprunt = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $emprunt['id_emprunt'] = nettoyer($_POST['id_emprunt']);
    $emprunt['id_livre'] = nettoyer($_POST['id_livre']);
    $emprunt['id_utilisateur'] = nettoyer($_POST['id_utilisateur']);
    $emprunt['date_sortie'] = nettoyer($_POST['date_sortie']);
    $emprunt['date_rendu'] = nettoyer($_POST['date_rendu']);
    $emprunt['statut'] = nettoyer($_POST['statut']);

    $state = updateEmprunt($pdo, $emprunt);
    if ($state) {
        redirect("?page=list-emprunts");
        die();
    }

    $error[] = 'Impossible de mettre à jour cet emprunt.';
}

$idEmprunt = $_GET['id'] ?? null;

if (!is_numeric($idEmprunt)) {
    die();
}

$emprunt = getEmprunt($pdo, $idEmprunt);

if ($emprunt) {
    $title_text = "Editer un emprunt";
    $submit_text = "Modifier";
    require PHP_ROOT. '/views/emprunt/emprunt-view.php';
}
