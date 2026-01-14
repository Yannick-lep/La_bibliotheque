<?php

function listerLivres($pdo)
{
    $sql = "SELECT * FROM livre ORDER BY id_livre DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $livres = $stmt->fetchAll();
    return $livres;
}

function getLivre($pdo, $idParam) {
    $sql = "SELECT * FROM livre WHERE id_livre = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $idParam
    ]);
    $livre = $stmt->fetch();
    return $livre;
}

function ajoutLivre($pdo,$auteurParam, $titreParam, $resumeParam, $genreParam)  {
    $sql = "INSERT INTO livre (auteur,titre,resume,genre) VALUES (:auteur,:titre,:resume,:genre)";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([
        ':auteur'          => $auteurParam,
        ':titre'          => $titreParam,
        ':resume'         => $resumeParam,
        ':genre'          => $genreParam
    ]);

    return $state;
}

function updateLivre($pdo,$auteurParam, $titreParam, $resumeParam, $genreParam,$idParam){
    $sql = "UPDATE livre SET auteur = :auteur, titre = :titre,resume = :resume, genre = :genre WHERE id_livre = :id";
    $stmt = $pdo->prepare($sql);
    $updateBool = $stmt->execute([
        ':auteur'          => $auteurParam,
        ':titre'          => $titreParam,
        ':resume'         => $resumeParam,
        ':genre'          => $genreParam,
        ':id'              => $idParam
    ]);
    return $updateBool;
}

function supprimerLivre($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM livre where id_livre = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stm->execute();
    return $suppResult;
}

function searchLivres($pdo, $searchTerm) {
    if (!$searchTerm) {
        $stmt = $pdo->query("SELECT * FROM livre ORDER BY titre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $stmt = $pdo->prepare("
        SELECT * FROM livre
        WHERE titre LIKE :searchTitre
           OR auteur LIKE :searchAuteur
        ORDER BY titre
    ");

    $stmt->execute([
        ':searchTitre'  => "%$searchTerm%",
        ':searchAuteur' => "%$searchTerm%"
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


