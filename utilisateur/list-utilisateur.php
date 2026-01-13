<?php
require 'includes/functions-utilisateur.php';

$utilisateurArray = listerUtilisateur($pdo);

include PHP_ROOT .'/views/utilisateur/list-utilisateur-view.php';