<?php
session_start();

require 'includes/dbconnexion.php';
require 'config/routes.php';

$pageFiltre = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$page = $pageFiltre ?? 'home';

if (is_admin()) {
    if (array_key_exists($page, $routes_admin)) {
        if (file_exists($routes_admin[$page])) {
            require $routes_admin[$page];
            die();
        }
    }
} elseif (is_employe()) {
    if (array_key_exists($page, $routes_employe)) {
        if (file_exists($routes_employe[$page])) {
            require $routes_employe[$page];
            die();
        }
    }
} elseif (is_abonne()) {
    if (array_key_exists($page, $routes_abonne)) {
        if (file_exists($routes_abonne[$page])) {
            require $routes_abonne[$page];
            die();
        }
    }
}

/*
 * Generic routing table
 */

if (!array_key_exists($page, $routes)) {
    $page = '404';
}

if (!file_exists($routes[$page])) {
    $page = '500';
}

require $routes[$page];
die();
