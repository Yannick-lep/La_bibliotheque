<?php 
include dirname(__DIR__) . '/includes/dbconnexion.php';
include dirname(__DIR__) . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])){

$nom = nettoyer($_POST['nom']);
$prenom = nettoyer($_POST['prenom']);
$email = nettoyer($_POST['email']);
$password = trim($_POST['password']);


if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
    dd("Tous les champs sont obligatoires");
}

// Hash du mot de passe
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

ajoutUtilisateru($pdo, $nom, $prenom, $email, $passwordHash);


if ($pdo ->lastInsertId()) {
    header("Location: " . WEB_ROOT . "/utilisateur/list-utilisateur.php");
    exit;
}
}

include PATH_PROJET . '/views/utilisateur/add-utlisateur-view.php';