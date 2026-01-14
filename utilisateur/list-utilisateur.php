<?php
require_once PHP_ROOT . '/includes/functions-utilisateur.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

$utilisateurArray = listerUtilisateur($pdo);

include PHP_ROOT .'/views/utilisateur/list-utilisateur-view.php';