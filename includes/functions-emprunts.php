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

function updateEmprunt($pdo, $emprunt)
{
    $sql = "UPDATE emprunt SET id_livre = :id_livre, id_utilisateur = :id_utilisateur, date_sortie =:date_sortie, date_rendu = :date_rendu, statut = :statut
            WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($emprunt);

    return $state;
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
    $state = $stmt->execute( [
        ':id_emprunt' => $idEmprunt
    ]);

    return $state;
}

function validateDepartEmprunt($pdo, $idEmprunt)
{
    $sql = "UPDATE emprunt SET date_sortie = NOW() WHERE id_emprunt = :id_emprunt";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute( [
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
