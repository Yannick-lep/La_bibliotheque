<?php
require PHP_ROOT.'/includes/functions-emprunts.php';

$emprunts = getEmpruntsEnAttente($pdo);

require PHP_ROOT.'/views/emprunt/depart-emprunts-view.php';