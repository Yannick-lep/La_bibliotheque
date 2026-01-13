<?php
 function listerUtilisateur($pdo)

 {
     $sql = "SELECT * FROM utilisateurs ORDER BY id_utilisateurs DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll();
    return $utilisateurs;
 }

 function getUtilisateur($pdo, $idParam)
 {
    $sql = "SELECT * FROM utilisateurs WHERE id_utilisateurs = :id";
    $stmt = $pdo->prepare(sql);
    $stmt->execute([
        ':id' => $idParam
    ]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    return $utilisateur;
 }

 function ajoutUtilisateur($pdo, $nomParam, $prenomParam, $emailParam, $passwordParam)
 {
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, password)
            VALUES (:nom, :prenom, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom'      => $nomParam,
        ':prenom'   => $prenomParam,
        ':email'    => $emailParam,
        ':password' => $passwordParam
    ]);
 }

 function updateUtilisateur($pdo, $nomParam, $prenomParam, $emailParam, $passwordParam, $idParam)
 {
    $sql = "UDATE utilisateurs
        SET nom = :nom, prenom = :prenom, email = :email, password = :password
        WHERE id_utilisateurs = :id";
    $stmt = $pdo->prepare($sql);
    $updateBool = $stmt->execute([
        ':nom'      => $nomParam,
        ':prenom'   => $prenomParam,
        ':email'    => $emailParam,
        ':password' => $passwordParam,
        ':id'       => $idParam
    ]);
    return $updateBool;
 }

 function updateUtilisateurSansPassword($pdo, $nomParam, $prenomParam, $emailParam, $idParam)
{
    $sql = "UPDATE utilisateurs
        SET nom = :nom, prenom = :prenom, email = :email
        WHERE id_utilisateur = :id";
    $stmt = $pdo->prepare($sql);
    $updateBool = $stmt->execute([
        ':nom'      => $nomParam,
        ':prenom'   => $prenomParam,
        ':email'    => $emailParam,
        ':id'       => $idParam
    ]);
    return $updateBool;
}
 function supprimerUtilisateur($pdo, $id)
 {
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id_utilisateurs = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stmt->execute();
    return $suppResult;
 }