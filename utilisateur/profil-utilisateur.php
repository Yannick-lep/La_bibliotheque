<?php

require_once PHP_ROOT . '/includes/functions-utilisateur.php';

$errors = [];
$idUtilisateur = $_SESSION['id_utilisateur'];
$utilisateur = getUtilisateur($pdo, $idUtilisateur);

if (!$utilisateur) {
    dd("Utilisateur introuvable");
}

$nom = $utilisateur['nom'];
$prenom = $utilisateur['prenom'];
$email = $utilisateur['email'];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    $nom = nettoyer($_POST['nom'] ?? '');
    $prenom = nettoyer($_POST['prenom'] ?? '');
    $email = nettoyer($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $password_confirm = trim($_POST['password_confirm'] ?? '');

    // Vérifications
    if (!empty($password) || !empty($password_confirm)) {
        if ($password !== $password_confirm){
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        if (strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
    }

    // Si aucune erreur, mise à jour
    if (empty($errors)) {

        if (empty($password) && empty($password_confirm)) {
            updateUtilisateurSansPassword($pdo, $nom, $prenom, $email, $idUtilisateur);
        } else {
            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $passwordHash = md5($password);
            updateUtilisateur($pdo, $nom, $prenom, $email, $passwordHash, $idUtilisateur);
        }

        // Redirection après succès
        redirect("?page=mes-livres");
        exit;
    }
}

// Affichage du formulaire
include PHP_ROOT . '/views/utilisateur/profil-utilisateur-view.php';
