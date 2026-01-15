<?php

$routes = [
    'home' => 'home.php',
    '404' => '404.php',
    '500' => '500.php',
    'login' => 'login/login.php',
    'register' => 'login/register.php',
    'search-livres' => 'livres/search-livres.php'
];

$routes_abonne = [
    'profil-utilisateur' => 'utilisateur/profil-utilisateur.php',
    'mes-livres' => 'livres/mes-livres.php'
];

$routes_admin = [
    'add-livres' => 'livres/add-livres.php',
    'del-livres' => 'livres/del-livres.php',
    'edit-livres' => 'livres/edit-livres.php',
    'list-livres' => 'livres/list-livres.php',
    'add-utilisateur' => 'utilisateur/add-utilisateur.php',
    'del-utilisateur' => 'utilisateur/del-utilisateur.php',
    'edit-utilisateur' => 'utilisateur/edit-utilisateur.php',
    'list-utilisateur' => 'utilisateur/list-utilisateur.php',
    'add-emprunts' => 'emprunts/add-emprunts.php',
    'del-emprunts' => 'emprunts/del-emprunts.php',
    'edit-emprunts' => 'emprunts/edit-emprunts.php',
    'list-emprunts' => 'emprunts/list-emprunts.php',
];

$routes_employe = [
    'depart-emprunts' => 'emprunts/depart-emprunts.php',
    'retour-emprunts' => 'emprunts/retour-emprunts.php',
    'validate-retour-emprunts' => 'emprunts/validate-retour-emprunts.php',
    'validate-depart-emprunts' => 'emprunts/validate-depart-emprunts.php'
];