<?php
include dirname(__DIR__) . '/includes/dbcoonexion.php';
include dirname(__DIR__) . '/includes/functions.php';

$idsuppUtilisateur = $_GET['id'] ?? null;

if (!$idsuppUtilisateur || !is_numeric($idsuppUtilisateur)) {
    dd("cet utilisateur n'existe pas !");
}

$suppResultUtilisateur =supprimerUtilisateur($pdo,$idsuppUtilisateur);

if($suppResultUtilisateur){
    header("Location: " .WEB_ROOT ."/utilisateur/list-utilisateur.php");
    exit;
}
