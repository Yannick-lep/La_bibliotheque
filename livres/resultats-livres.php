<?php
require_once __DIR__ . '/../includes/dbconnexion.php';
require_once __DIR__ . '/../includes/functions-livres.php';
require_once __DIR__ . '/../views/partials/header.php';

$searchTerm = trim($_GET['search'] ?? '');
$livres = searchLivres($pdo, $searchTerm);
?>





