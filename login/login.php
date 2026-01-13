<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = nettoyer($_POST['email']);
    $password = trim($_POST['password']);

    $ret = login_user($pdo, $email, $password);
    if ($ret['success'] === true) {
        redirect('?page=home');
        exit;
    }
}

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    // You are logged in => do log out

    logout_user();

    redirect("?page=home");
    exit;
}

// You are logged out do Log in
require PHP_ROOT . '/views/login/login-view.php';
