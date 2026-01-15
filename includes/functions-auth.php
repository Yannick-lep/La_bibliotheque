<?php
function is_logged_in()
{
    return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
}

function is_abonne()
{
    return is_logged_in() && $_SESSION['role'] === 'abonne';
}

function is_admin()
{
    return is_logged_in() && $_SESSION['role'] === 'admin';
}

function is_employe()
{
    return is_logged_in() && $_SESSION['role'] === 'employe';
}

function logout_user()
{
    $_SESSION = [];
    session_destroy();
    session_unset();
}

function login_user($pdo, $email, $password)
{
    if (empty($email) || empty($password)) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        return [
            'success' => false,
            'message' => 'Identifiant incorrect !'
        ];
    }

    if (md5($password) !== $user['password']) {
        // if (!password_verify($password, $user['password'])) {
        return [
            'success' => false,
            'message' => 'Identifiant incorrect !'
        ];
    }

    $_SESSION['logged'] = true;
    $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];

    return [
        'success' => true,
        'message' => 'Connexion réussie.'
    ];
}

/*
 * $utilisateur['nom']
 * $utilisateur['prenom']
 * $utilisateur['email']
 * $utilisateur['password']
 * $utilisateur['role']
 */
function register_user($pdo, $utilisateur)
{
    if (
        empty($utilisateur['nom'])
        || empty($utilisateur['prenom'])
        || empty($utilisateur['email'])
        || empty($utilisateur['password'])
        || empty($utilisateur['role'])
    ) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }

    if (!filter_var($utilisateur['email'], FILTER_VALIDATE_EMAIL)) {
        return [
            'success' => false,
            'message' => 'Email invalide.'
        ];
    }

    if (strlen($utilisateur['password']) < 6) {
        return [
            'success' => false,
            'message' => 'Le mot de passe doit contenir au moins 6 caractères.'
        ];
    }

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$utilisateur['email']]);

    if ($stmt->fetch()) {
        return [
            'success' => false,
            'message' => 'Email déja utilisé.'
        ];
    }

    if (
        ajoutUtilisateur(
            $pdo,
            $utilisateur['nom'],
            $utilisateur['prenom'],
            $utilisateur['email'],
            $utilisateur['password'],
            $utilisateur['role']
        )
    ) {
        return [
            'success' => true,
            'message' => 'Inscription réussie.'
        ];
    }

    return [
        'success' => false,
        'message' => 'Erreur lors de l\'inscription.'
    ];
}
