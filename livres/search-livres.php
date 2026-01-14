<?php
include 'includes/functions-livres.php';

$livres = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = trim($_POST['search'] ?? '');
    if ($searchTerm !== '') {
        $livres = searchLivres($pdo, $searchTerm);
    }
} else {
    $searchTerm = '';
}

include 'views/livres/search-livres-view.php';
