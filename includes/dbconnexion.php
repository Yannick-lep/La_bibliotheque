<?php
session_start();

/*
 * Get project configuration file
 */

// Check if local config exists and get it
// Otherwise load a default config

if (file_exists('config/env.php')) {
    require 'config/env.php';
} elseif (file_exists('config/env_example.php')) {
    require 'config/env_example.php';
} else {
    die("No configuration file found !");
}

require PHP_ROOT.'/includes/functions.php';
require PHP_ROOT.'/includes/functions-auth.php';

/*
 * Connect to the database service
 */

$host = DB_HOSTNAME;
$db = DB_NAME;
$user = DB_USER;
$pass = DB_PASSWORD;
$charset = DB_CHARSET;

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $error) {
    if (ENABLE_DEBUG === 'on') {
        showError('Erreur de connexion PDO', $error->getMessage());
    }
    error_log('Fatal Error connecting to database : ' . $error->getMessage());
    die();
}
