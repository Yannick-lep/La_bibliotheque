<?php
require 'includes/functions-utilisateur.php';

$idsuppUtilisateur = $_GET['id'] ?? null;

if (!$idsuppUtilisateur || !is_numeric($idsuppUtilisateur)) {
    dd("cet utilisateur n'existe pas !");
}

$suppResultUtilisateur =supprimerUtilisateur($pdo,$idsuppUtilisateur);

if($suppResultUtilisateur){
    header("Location: " .WEB_ROOT ."/utilisateur/list-utilisateur.php");
    exit;
}
