<?php
require PHP_ROOT.'/includes/functions-emprunts.php';

$emprunts = getEmpruntsEnCours($pdo);

require PHP_ROOT.'/views/emprunt/retour-emprunts-view.php';