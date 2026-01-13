<?php
require '../includes/dbconnexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = nettoyer($_POST['name']);
    $password = trim($_POST['password']);

    $ret = login_user($pdo, $name, $password);
    if ($ret['success'] === true) {
        redirect('/public/index.php');
        exit;
    }
}

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    // You are logged in => do log out

    logout_user();

    redirect("/reservations/search-reservations.php");
    exit;
}

// You are logged out do Log in
require PHP_ROOT . '/views/login/login-view.php';
