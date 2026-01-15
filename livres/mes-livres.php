<?php
require PHP_ROOT . '/includes/functions-emprunts.php';


$id_utilisateur = $_SESSION['id_utilisateur'];

// Emprunt en cours
$livres = getEmpruntsUtilisateur($pdo, $id_utilisateur);

// Historique
$historique = [];
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])){
    $historique = getHistoriqueEmpruntsUtilisateur($pdo, $id_utilisateur, 5);
}
require PHP_ROOT . '/views/livres/mes-livres-view.php';