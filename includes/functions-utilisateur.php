<?php
function listerUtilisateur(PDO $pdo): array
{
    $sql = "SELECT * FROM utilisateur ORDER BY id_utilisateur DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUtilisateur(PDO $pdo, int $idParam): ?array
{
    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $idParam
    ]);

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    return $utilisateur ?: null;
}

function ajoutUtilisateur(
    PDO $pdo,
    string $nomParam,
    string $prenomParam,
    string $emailParam,
    string $passwordParam,
    string $roleParam
): bool {
    $sql = "INSERT INTO utilisateur (nom, prenom, email, password, role)
            VALUES (:nom, :prenom, :email, :password, :role)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':password' => $passwordParam,
        ':role' => $roleParam
    ]);
}

function updateUtilisateur(
    PDO $pdo,
    string $nomParam,
    string $prenomParam,
    string $emailParam,
    string $passwordParam,
    int $idParam
): bool {
    $sql = "UPDATE utilisateur
        SET nom = :nom, 
        prenom = :prenom,
        email = :email,
        password = :password
        WHERE id_utilisateur = :id";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':password' => $passwordParam,
        ':id' => $idParam
    ]);
}

function updateUtilisateurSansPassword(
    PDO $pdo,
    string $nomParam,
    string $prenomParam,
    string $emailParam,
    int $idParam
    ): bool {
    $sql = "UPDATE utilisateur
        SET nom = :nom,
         prenom = :prenom,
          email = :email
        WHERE id_utilisateur = :id";

    $stmt = $pdo->prepare($sql);
   return $stmt->execute([
        ':nom' => $nomParam,
        ':prenom' => $prenomParam,
        ':email' => $emailParam,
        ':id' => $idParam
    ]);
}

function supprimerUtilisateur(PDO $pdo, int $id): bool
{
    $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':id' => $id
    ]);
}

function compterUtilisateurs(PDO $pdo)
{
    $sql = "SELECT COUNT(*) FROM utilisateur";
    return (int) $pdo->query($sql)->fetchColumn();
}
