<?php
function listerEmprunts($pdo)
{
    $sql = "SELECT * FROM emprunt ORDER BY id_emprunt DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $emprunts = $stmt->fetchAll();

    return $emprunts;
}

function supprimerEmprunt($pdo, $id)
{
    $sql = "DELETE FROM emprunt WHERE id_emprunt = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $state = $stmt->execute();

    return $state;
}

function getEmprunt($pdo, $id)
{
    $sql = "SELECT * FROM emprunt WHERE id_emprunt = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $emprunt = $stmt->fetch();

    return $emprunt;
}

function addEmprunt($pdo, $emprunt)
{
    if ($emprunt['date_rendu'] == '') {
        $sql = "INSERT INTO emprunt (id_livre, id_utilisateur, date_sortie, statut)
            VALUES (:id_livre, :id_utilisateur, :date_sortie, :statut )";
        $stmt = $pdo->prepare($sql);
        $state = $stmt->execute([
            ':id_livre' => $emprunt['id_livre'],
            ':id_utilisateur' => $emprunt['id_utilisateur'],
            ':date_sortie' => $emprunt['date_sortie'],
            'statut' => $emprunt['statut']
        ]);

        return $state;
    }

    $sql = "INSERT INTO emprunt (id_livre, id_utilisateur, date_sortie, date_rendu, statut)
            VALUES (:id_livre, :id_utilisateur, :date_sortie, :date_rendu, :statut )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($emprunt);

    return $state;
}

function addEmpruntAbonne($pdo, $emprunt)
{
    $sql = "INSERT INTO emprunt (id_livre, id_utilisateur, date_reservation, statut)
            VALUES (:id_livre, :id_utilisateur, NOW(), :statut )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($emprunt);

    return $state;
}

function updateEmprunt($pdo, $emprunt)
{
    $sql = "UPDATE emprunt SET id_livre = :id_livre, id_utilisateur = :id_utilisateur, date_sortie =:date_sortie, date_rendu = :date_rendu, statut = :statut
            WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($emprunt);

    return $state;
}

function getEmpruntsUtilisateur($pdo, $id_utilisateur)
{
    $sql = "SELECT 
    e.id_emprunt,
    l.id_livre,
    l.titre,
    l.auteur,
    e.date_sortie,
    e.date_rendu,
    e.statut
    FROM emprunt e
    JOIN livre l ON l.id_livre = e.id_livre
    WHERE e.id_utilisateur = :id_utilisateur
    ORDER BY e.date_sortie DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function countEmpruntsUtilisateur($pdo, $id_utilisateur)
{
    $sql = "SELECT COUNT(*) as total_emprunts
            FROM emprunt
            WHERE id_utilisateur = :id_utilisateur";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result['total_emprunts'];
}

function getEmpruntsEnCoursLivre($pdo, $idLivre)
{
    $sql = "SELECT count(*) as count_emprunts
            FROM emprunt
            WHERE id_livre = :id_livre AND (date_sortie IS NULL OR (date_sortie IS NOT NULL AND date_rendu IS NULL))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_livre' => $idLivre]);

    $emprunts = $stmt->fetch();
    return $emprunts['count_emprunts'];
}

function getEmpruntsEnCours($pdo)
{
    $sql = "SELECT e.id_emprunt, e.date_sortie, e.id_livre, e.id_utilisateur, u.nom, u.prenom, l.titre
            FROM emprunt e
            LEFT JOIN utilisateur u
            ON u.id_utilisateur = e.id_utilisateur
            LEFT JOIN livre l
            ON e.id_livre = l.id_livre
            WHERE date_sortie IS NOT NULL AND date_rendu IS NULL";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $emprunts = $stmt->fetchAll();

    return $emprunts;
}

function validateRetourEmprunt($pdo, $idEmprunt)
{
    $sql = "UPDATE emprunt SET date_rendu = NOW() WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([
        ':id_emprunt' => $idEmprunt
    ]);

    return $state;
}

function validateDepartEmprunt($pdo, $idEmprunt)
{
    $sql = "UPDATE emprunt SET date_sortie = NOW() WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([
        ':id_emprunt' => $idEmprunt
    ]);

    return $state;
}

function getEmpruntsEnAttente($pdo)
{
    $sql = "SELECT e.id_emprunt, e.date_sortie, e.id_livre, e.id_utilisateur, u.nom, u.prenom, l.titre
            FROM emprunt e
            LEFT JOIN utilisateur u
            ON u.id_utilisateur = e.id_utilisateur
            LEFT JOIN livre l
            ON e.id_livre = l.id_livre
            WHERE date_sortie IS NULL AND date_rendu IS NULL";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $emprunts = $stmt->fetchAll();

    return $emprunts;
}

function getHistoriqueEmpruntsUtilisateur(PDO $pdo, int $id_utilisateur, int $limit = 5)
{
    $sql = "
    SELECT l.titre, l.auteur, e.date_sortie, e.date_rendu, e.statut
    FROM emprunt e
    JOIN livre l ON l.id_livre = e.id_livre
    WHERE e.id_utilisateur = :id_utilisateur and date_sortie IS NOT NULL AND date_rendu IS NOT NULL
    ORDER BY e.date_sortie DESC
    LIMIT :limit
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
