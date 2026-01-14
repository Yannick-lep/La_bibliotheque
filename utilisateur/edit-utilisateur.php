<?php
require PHP_ROOT . 'includes/functions-utilisateur.php';

$errors = [];
$idUtilisateur = $_GET['id'] ?? null;

if (!$idUtilisateur || !is_numeric($idUtilisateur)) {
    dd("Utilisateur introuvable");
}

$utilisateur = getUtilisateur($pdo, $idUtilisateur);

if (!$utilisateur) {
    dd("Utilisateur introuvable");
}

$nom = $utilisateur['nom'];
$prenom = $utilisateur['prenom'];
$email = $utilisateur['email'];


// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    $nom = nettoyer($_POST['nom']);
    $prenom = nettoyer($_POST['prenom']);
    $email = nettoyer($_POST['email']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);

    // Ssi un seul des deux champs est rempli
    if (!empty($password) || !empty($password_confirm)) {

        if ($password !== $password_confirm){
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        if (strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 carractères.";
        }
    }

    if (empty($erros)){

        if (empty($password) && empty($password_confirm)){
            updateUtilisateurSansPassword($pdo, $nom, $prenom, $email, $idUtilisateur);

        }
    } else {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            updateUtilisateur($pdo, $nom, $prenom, $email, $passwordHash, $idUtilisateur);
        
            // Redirection après succès
            header("Location:" . WEB_ROOT . "/utilisateur/list-utilisateur.php");
            exit;
    }
}

// Affichage du formulaire
include PHP_ROOT . '/views/utilisateur/edit-utilisateur-view.php';
