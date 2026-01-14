<?php
require 'includes/functions-utilisateur.php';

$idsuppUtilisateur = $_GET['id'] ?? null;

if (!$idsuppUtilisateur || !is_numeric($idsuppUtilisateur)) {
    dd("cet utilisateur n'existe pas !");
}

$nbUtilisateurs = compterUtilisateurs($pdo);

if ($nbUtilisateurs <= 1) {
    dd("Impossible de supprimer le dernier utilisateur.");
}


$suppResultUtilisateur =supprimerUtilisateur($pdo,$idsuppUtilisateur);

if($suppResultUtilisateur){
    redirect('?page=list-utilisateur');
    exit;
}

dd("Erreur lors de la suppression de l'utilisateur.");
