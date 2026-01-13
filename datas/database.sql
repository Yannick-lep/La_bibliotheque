--
-- Creation de la base de données : bibliotheque
-- 

DROP DATABASE IF EXISTS bibliotheque;

CREATE DATABASE IF NOT EXISTS bibliotheque;

USE bibliotheque;

CREATE TABLE utilisateurs(
    id_utilisateurs int NOT NULL AUTO_INCREMENT,
    nom varchar(45) NOT NULL,
    prenom varchar(45) NOT NULL,
    email varchar(45) NOT NULL,
    password varchar(60) NOT NULL,
    role ENUM('abonne', 'employe') DEFAULT 'abonne',
    PRIMARY KEY (id_utilisateurs)
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
    id_utilisateurs int DEFAULT NULL,
    date_sortie date NOT NULL,
    date_rendu date DEFAULT NULL,
    statut varchar(50), 
    PRIMARY KEY (id_emprunt)
) ENGINE=INNODB;

--
-- Example test data set
--

INSERT INTO utilisateurs (nom, prenom, email, password, role) VALUES
('Dupont', 'Jean', 'jean.dupont@example.com', MD5('password123'), 'abonne'),
('Martin', 'Claire', 'claire.martin@example.com', MD5('password456'), 'employe'),
('Bernard', 'Luc', 'luc.bernard@example.com', MD5('password789'), 'abonne'),
('Leroy', 'Sophie', 'sophie.leroy@example.com', MD5('password321'), 'employe');

INSERT INTO livre (auteur, titre, resume, genre) VALUES
('Hugo', 'Les Misérables', 'Un roman sur la lutte pour la justice sociale.', 'Roman'),
('Dumas', 'Le Comte de Monte-Cristo', 'Une histoire de vengeance et de rédemption.', 'Roman'),
('Orwell', '1984', 'Un roman dystopique sur un futur totalitaire.', 'Science-fiction'),
('Rowling', 'Harry Potter à l''école des sorciers', 'L''aventure d''un jeune sorcier.', 'Fantasy');

INSERT INTO emprunt (id_livre, id_utilisateurs, date_sortie, date_rendu, statut) VALUES
(1, 1, '2026-01-01', NULL, 'en cours'),
(2, 2, '2026-01-05', '2026-01-12', 'terminé'),
(3, 3, '2026-01-10', NULL, 'en cours'),
(4, 4, '2026-01-15', NULL, 'en cours');
