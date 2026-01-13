<?php
function is_logged_in()
{
    return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
}

function is_admin()
{
    return is_logged_in() && $_SESSION['role'] === 'admin';
}

function logout_user()
{
    $_SESSION = [];
    session_destroy();
    session_unset();
}

function login_user($pdo, $email, $password)
{
    if (empty($login) || empty($password)) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
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
    $_SESSION['id_utilisateurs'] = $user['id_utilisateurs'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    return [
        'success' => true,
        'message' => 'Connexion réussie.'
    ];
}
