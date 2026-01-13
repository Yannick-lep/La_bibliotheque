<?php
$errors = [];
$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $user['name'] = nettoyer($_POST['name']);
    $user['login'] = nettoyer($_POST['login']);
    $user['password'] = trim($_POST['password']);
    $user['role'] = 'user';

    $password_confirm = trim($_POST['password_confirm']);

    if ($user['password'] !== $password_confirm)
        $errors[] = 'Les mots de passe ne correspondent pas !';
    else {
        $state = register_user($pdo, $user);

        if ($state['success'] === true) {
            redirect("?page=login");
            die();
        }

        $errors = [$state['message']];
    }
} else {
    $user = [
        'name' => '',
        'login' => '',
        'password' => '',
        'role' => ''
    ];
}

$title_text = "Ajouter un utilisateur";
$submit_text = "Ajouter";
require PHP_ROOT . '/views/login/register-view.php';
