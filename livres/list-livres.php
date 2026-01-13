<?php
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/dbconnexion.php';

$livresArray = listerLivres($pdo);

include PATH_PROJET . '/views/livres/list-livres-view.php' ;