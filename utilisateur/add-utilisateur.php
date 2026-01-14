<?php

require_once PHP_ROOT . '/includes/functions-utilisateur.php';

try {
    $pdo = new PDO(
        "mysql:host=" .DB_HOSTNAME . ";dbname=" .DB_NAME . ";charset=" .DB_CHARSET,
        DB_USER,
        DB_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Vérifie si le formulaire a été envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    // Nettoyage des données
    $nom = nettoyer($_POST['nom'] ?? '');
    $prenom = nettoyer($_POST['prenom'] ?? '');
    $email = nettoyer($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = nettoyer($_POST['role'] ?? '');


    // Vérification des champs obligatoires
    if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
        dd("Tous les champs sont obligatoires");
    }

    // Vérification email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        dd("Email invalide");
    }

    // Hashage sécurisé du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertion de l'utilisateur en base
    $success = ajoutUtilisateur(
        $pdo,
        $nom,
        $prenom,
        $email,
        $passwordHash,
        $role
    );

    if ($success) {
        redirect("?page=list-utilisateur");
        exit;
    }
}

// Affichage du formulaire
require PHP_ROOT . '/views/utilisateur/add-utilisateur-view.php';
