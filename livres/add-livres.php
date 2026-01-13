<?php
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/dbconnexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

 $auteur = nettoyer($_POST['auteur']);
    $titre = nettoyer($_POST['titre']);
    $resume = nettoyer($_POST['resume']);
    $genre = nettoyer($_POST['genre']);

    ajoutlivres($pdo, $auteur, $titre, $resume, $genre);

    $livresInserted = getLastInsertId($pdo);

    if ($livresInserted) {
        redirect('/livres/list-livres.php');
    }
}

include PATH_PROJET . '/views/livres/add-livre-view.php';
