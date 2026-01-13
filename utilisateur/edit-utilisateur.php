<?php
include dirname(__DIR__) . '/includes/dbconnexion.php';
include dirname(__DIR__) . '/includes/functions.php';

$idUtilisateur = $_GET['id'] ?? null;

if (!$idUtilisateur || !is_numeric($idUtilisateur)){
    dd("Utilisateur introuvable");
}

$utilisateur = getUtilisateur($pdo, $idUtilisateur);

if (!$utilisateur){
    dd("Utilisateur introuvable");
}

$nom = $utilisateur['nom'];
$prenom = $utilisateur['prenom'];
$email = $utilisateur['email'];

// Traitement du formulaire
if ($_SERVER['REQUETS_METHOD'] === 'POST' && isset($_POST['envoyer'])){

    $nom = nettoyer($_POST['nom']);
    $prenom = nettoyer($_POST['prenom']);
    $email = nettoyer($_POST['email']);
    $password = trim($_POST['password']);

    // Si un nouveau mot de passe est saisi
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        updateUtilisateur($pdo, $nom, $prenom, $email, $passwordHash, $idUtilisateur);

    } else {
        // Sinon on garde l'ancien mot de passe
        updateUtilisateurSansPassword($pdo, $nom, $prenom, $email, $idUtilisateur);
    }


    header("Location:" . WEB_ROOT . "/utilisateur/list-utilisateur.php");
    exit;
}
include PATH_PROJET .'/views/utilisateur/edit-utilisateur-view.php';
