-- Creation de la base de données : bibliotheque
-- 
-- table : utilisateur
--  +-----------------+-------------------------------+
--  | id_utilisateur  | INT NOT NULL                  |
--  | nom             | varcchar(45) NOT NULL         |
    | prenom          | varchar(45) NOT NULL          | 
    | email           | varchar(45) NOT NUll          |
    | password        | varchar(45) NOT NULL          |
    | role            | ENUM (abonne, employe, admin) |
    +-----------------+-------------------------------+
-- 
-- 
-- table : livre
-- +------------+--------------------------------+
-- | id_livre   | int NOT NULL AUTO_INCREMENT    |
-- | auteur     | varchar(30) NOT NULL           |
-- | titre      | varchar(150) NOT NULL          |
-- | resume     | varchar(500) NOT NULL          |
-- | genre      | varchar(30) NOT NULL           |
-- +------------+--------------------------------+



-- table : emprunt
-- +------------+----------+-----------+-----------+
-- |id_emprunt       | int NOT NULL AUTO_INCREMENT |
-- |id_livre         | int DEFAULT NULL            |
-- |id_utilisateur   | int DEFAULT NULL            |
-- |date_sortie      |   date DEFAULT NULL         |
-- |date_rendu       |  date DEFAULT NULL          |
-- |date_reservation |  date NOT NULL              |
-- |statut           |   varchar(50)               |  
-- +-----------------+-----------------------------+
-- 

--