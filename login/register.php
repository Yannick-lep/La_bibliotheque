<?php
require PHP_ROOT . '/includes/functions-utilisateur.php';

$errors = [];
$utilisateur = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $utilisateur['nom'] = nettoyer($_POST['nom']);
    $utilisateur['prenom'] = nettoyer($_POST['prenom']);
    $utilisateur['email'] = nettoyer($_POST['email']);
    $utilisateur['password'] = trim($_POST['password']);
    $utilisateur['role'] = 'abonne';

    $password_confirm = trim($_POST['password_confirm']);

    if ($utilisateur['password'] !== $password_confirm)
        $errors[] = 'Les mots de passe ne correspondent pas !';
    else {
        // Hashage sécurisé du mot de passe

        // $utilisateur['password'] = password_hash($utilisateur['password'], PASSWORD_DEFAULT);
        $utilisateur['password'] = md5($utilisateur['password']);

        $state = register_user($pdo, $utilisateur);

        if ($state['success'] === true) {
            redirect("?page=login");
            die();
        }

        $errors = [$state['message']];
    }
} else {
    $utilisateur = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'password' => '',
        'role' => ''
    ];
}

$title_text = "Ajouter un utilisateur";
$submit_text = "Valider";
require PHP_ROOT . '/views/login/register-view.php';
