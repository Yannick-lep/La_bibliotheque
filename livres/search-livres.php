<?php
include 'includes/functions-livres.php';
include 'includes/functions-emprunts.php';

$error = '';
$searchTerm = '';
$livres = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search-button'])) {
        $searchTerm = trim($_POST['search'] ?? '');
        if ($searchTerm !== '') {
            $livres = searchLivres($pdo, $searchTerm);
        }
    } else {
        $searchTerm = '';
    }

    if (isset($_POST['emprunter-button'])) {
        $id_livre = intval($_POST['id_livre'] ?? 0);
        if (is_abonne()) {

            if (countEmpruntsUtilisateur($pdo, $_SESSION['id_utilisateur']) >= 5) {
                $error = "Vous avez atteint le nombre maximum d'emprunts (5). Retournez un livre avant d'en emprunter un nouveau.";
            } else {

                if (getEmpruntsEnCoursLivre($pdo, $id_livre) == 0) {
                    $emprunt = [
                        ':id_livre' => $id_livre,
                        ':id_utilisateur' => $_SESSION['id_utilisateur'],
                        ':statut' => 'emprunté'
                    ];
                    $status = addEmpruntAbonne($pdo, $emprunt);
                    redirect('?page=mes-livres');
                } else {
                    $error = "Le livre n'est pas disponible pour le moment.";
                }
            }
        }
    }
}
include 'views/livres/search-livres-view.php';
