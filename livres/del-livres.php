<?php
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/dbconnexion.php';

$idSuppLivres = $_GET['id'] ?? null;

if (! is_numeric($idSuppLivres)  ) {
    dd("Ce livre n'existe pas !!!");
}

$suppResultLivres =supprimerLivres($pdo,$idSuppLivres);

if ($suppResultLivres) {
    redirect('/livres/list-livres.php');
}