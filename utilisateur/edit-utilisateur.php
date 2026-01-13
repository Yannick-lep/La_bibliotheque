<?php
include dirname(__DIR__) . '/includes/dbconnexion.php';
include dirname(__DIR__) . '/includes/functions.php';

$idEditUtilisateur = $_GET['id'] ?? null;

if (!$idEditUtilisateur || !is_numeric($idEditUtilisateur)){
    dd("cet utilisateur n'existe pas !!!");
}

$utilisateur = getUtilisateur($pdo, $idEditUtilisateur);

if (!$utilisateur){
    dd("Cet utilisateur n'existe pas");
}

$nom = $utilisateur['nom'];
$prenom = $utilisateur['prenom'];
$email = $utilisateur['email'];


if ($_SERVER['REQUETS_METHOD'] === 'POST' && isset($_POST['envoyer'])){

    $nom = nettoyer($_POST['nom']);
    $prenom = nettoyer($_POST['prenom']);
    $email = nettoyer($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($password)) {
        // Nouveau mot de passe
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        updateUtilisateur($pdo, $nom, $prenom, $passwordHash, $idEditUtilisateur);

    } else {
        // Sinon on ne touche pas au mot de passe 
        updateUtilisateurSansPassword($pdo, $nom, $prenom, $email, $idEditUtilisateur);
    }


    header("Location:" . WEB_ROOT . "/utilisateur/list-utilisateur.php");
    exit;
}
include PATH_PROJET .'/views/utilisateur/edit-utilisateur-view.php';
