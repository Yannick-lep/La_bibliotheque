<?php
function listerUtilisateur($pdo)
{
    $sql = "SELECT * FROM utilisateur ORDER BY id_utilisateur DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll();
    return $utilisateurs;
}

function getUtilisateur($pdo, $idParam)
{
    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $idParam
    ]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    return $utilisateur;
}

function ajoutUtilisateur($pdo, $nomParam, $prenomParam, $emailParam, $passwordParam, $roleParam)
{
    $sql = "INSERT INTO utilisateur (nom, prenom, email, password, role)
            VALUES (:nom, :prenom, :email, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':password' => $passwordParam,
        ':role' => $roleParam
    ]);

    return $state;
}

function updateUtilisateur($pdo, $nomParam, $prenomParam, $emailParam, $passwordParam, $idParam)
{
    $sql = "UDATE utilisateur
        SET nom = :nom, prenom = :prenom, email = :email, password = :password
        WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    $updateBool = $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':password' => $passwordParam,
        ':id' => $idParam
    ]);

    return $updateBool;
}

function updateUtilisateurSansPassword($pdo, $nomParam, $prenomParam, $emailParam, $idParam)
{
    $sql = "UPDATE utilisateur
        SET nom = :nom, prenom = :prenom, email = :email
        WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    $updateBool = $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':id' => $idParam
    ]);
    return $updateBool;
}
function supprimerUtilisateur($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stmt->execute();
    return $suppResult;
}