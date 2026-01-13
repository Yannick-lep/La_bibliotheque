<?php
include dirname(__DIR__) .'/includes/dbconnexion.php';
require dirname(__DIR__) .'/includes/functions.php';

$utilisateurArray = listerUtilisateur($pdo);

include PATH_PROJET .'/views/utilisateur/list-utilisateur-view.php';