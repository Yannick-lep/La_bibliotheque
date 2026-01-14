<?php
require PHP_ROOT . '/includes/functions-emprunts.php';


$id_utilisateur = $_SESSION['id_utilisateur'];

$livres = getEmpruntsUtilisateur($pdo, $id_utilisateur);

require PHP_ROOT . '/views/livres/mes-livres-view.php';