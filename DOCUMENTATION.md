## Schema de la base de données : bibliotheque

```bash
-- table : utilisateur
--  +-----------------+-------------------------------+
--  | id_utilisateur  | INT NOT NULL                  |
--  | nom             | varcchar(45) NOT NULL         |
--  | prenom          | varchar(45) NOT NULL          | 
--  | email           | varchar(45) NOT NUll          |
--  | password        | varchar(45) NOT NULL          |
--  | role            | ENUM (abonne, employe, admin) |
--  +-----------------+-------------------------------+
-- 
-- 
-- table : livre
--  +------------+--------------------------------+
--  | id_livre   | int NOT NULL AUTO_INCREMENT    |
--  | auteur     | varchar(30) NOT NULL           |
--  | titre      | varchar(150) NOT NULL          |
--  | resume     | varchar(500) NOT NULL          |
--  | genre      | varchar(30) NOT NULL           |
--  +------------+--------------------------------+
-- 
-- 
-- 
-- table : emprunt
--  +------------+----------+-----------+-----------+
--  |id_emprunt       | int NOT NULL AUTO_INCREMENT |
--  |id_livre         | int DEFAULT NULL            |
--  |id_utilisateur   | int DEFAULT NULL            |
--  |date_sortie      |   date DEFAULT NULL         |
--  |date_rendu       |  date DEFAULT NULL          |
--  |date_reservation |  date NOT NULL              |
--  |statut           |   varchar(50)               |  
--  +-----------------+-----------------------------+
-- 
```

## Fonctionnalités

### Tout le monde 

- S'inscrire 
- Se connecter 
- Se déconnecter 
- Revenir a la page d'accueil

### Admin

- Liste des livres
- Ajouter un livre
- Editer un livre
- Supprimer un livre
- Liste des emprunts
- Editer les informations d'un emprunt
- Supprimer un Emprunt
- Liste des utilisateurs
- Ajouter un utilisateur
- Editer les informations d'un utilisateur
- Supprimer un utilisateur

### Employés

- Assurer les retours et départ des livres
- Possibilité d'annuler une réservation si le livre n'a pas été retiré dans les délais
- il gère la sortie des livres et le retour des livres

### Abonnés

- Mes emprunts 
- Editer son profil
- Voir ses réservations et son historique de réservation

### Tout le monde sauf les admins

- Rechercher un livre (sauf admin)

## Difficultés

- Coordination du projet
  - Scinder le projet en taches simples
  - Se répartir les tâches

- Peu de problemes de conflits lors des Pull-Request dû au fait de se répartir des tâches ne se chevauchant pas.

- Gestion du temps

## Répartition du travail

### Olivier

- Routeurs
- structure générale du site
- Barre de navigation, 
- Gestion des droits ( 3 rôles Admin, Employe, Abonne )
- CRUD sur la base 'emprunt' (Ajout, Edition, Suppression )
- Suppervision du code

### Benjamin

- CRUD sur la base 'livre' ( Ajout, Edition, Suppression )
- Gestion des depassement de delais des retraits de livre
- Barre de recherche
- Gestiion des recherches de livre

### Yannick

- CRUD sur la base 'utilisateur' ( Ajout, Edition, Suppresssion )
- Gestion des depassement de delais des retours de livre
- Page d'acceuil - HTML/CSS
