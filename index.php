<?php
session_start();

require 'includes/dbconnexion.php';
require 'config/routes.php';

$pageFiltre = filter_input(INPUT_GET, 'page' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$page = $pageFiltre ?? 'home';

if (!array_key_exists($page,$routes)) {
    $page = '404';
}

require $routes[$page];
die();
