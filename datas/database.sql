--
-- Creation de la base de données : bibliotheque
-- 

DROP DATABASE IF EXISTS bibliotheque;

CREATE DATABASE IF NOT EXISTS bibliotheque;

USE bibliotheque;

CREATE TABLE utilisateur(
    id_utilisateur int NOT NULL AUTO_INCREMENT,
    nom varchar(45) NOT NULL,
    prenom varchar(45) NOT NULL,
    email varchar(45) NOT NULL,
    password varchar(60) NOT NULL,
    role ENUM('abonne', 'employe', 'admin') DEFAULT 'abonne',
    PRIMARY KEY (id_utilisateur)
) ENGINE=INNODB;


CREATE TABLE livre(
    id_livre int NOT NULL AUTO_INCREMENT,
    auteur varchar(30) NOT NULL,
    titre varchar(150) NOT NULL,
    resume varchar(500) NOT NULL,
    genre varchar(30) NOT NULL,
    PRIMARY KEY (id_livre)
) ENGINE=INNODB;


CREATE TABLE emprunt(
    id_emprunt int NOT NULL AUTO_INCREMENT,
    id_livre int DEFAULT NULL,
    id_utilisateur int DEFAULT NULL,
    date_sortie date DEFAULT NULL,
    date_rendu date DEFAULT NULL,
    date_reservation date NOT NULL,
    statut varchar(50), 
    PRIMARY KEY (id_emprunt),
    KEY `id_utilisateur` (`id_utilisateur`),
    KEY `id_livre`(`id_livre`),
    CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE,
    CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`) ON DELETE CASCADE
) ENGINE=INNODB;
