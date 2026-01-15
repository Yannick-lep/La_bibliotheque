USE bibliotheque;
INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES
('Martin','Paul','paul.martin@mail.com',MD5('hash1'),'admin'),

('Durand','Sophie','sophie.durand@mail.com',MD5('hash2'),'employe'),
('Bernard','Luc','luc.bernard@mail.com',MD5('hash3'),'employe'),
('Petit','Emma','emma.petit@mail.com',MD5('hash4'),'employe'),

('Leroy','Hugo','hugo.leroy@mail.com',MD5('hash5'),'abonne'),
('Moreau','Lea','lea.moreau@mail.com',MD5('hash6'),'abonne'),
('Fournier','Lucas','lucas.fournier@mail.com',MD5('hash7'),'abonne'),
('Girard','Chloe','chloe.girard@mail.com',MD5('hash8'),'abonne'),
('Andre','Nathan','nathan.andre@mail.com',MD5('hash9'),'abonne'),
('Lefevre','Manon','manon.lefevre@mail.com',MD5('hash10'),'abonne'),
('Mercier','Louis','louis.mercier@mail.com',MD5('hash11'),'abonne'),
('Roux','Camille','camille.roux@mail.com',MD5('hash12'),'abonne'),
('Fontaine','Tom','tom.fontaine@mail.com',MD5('hash13'),'abonne'),
('Chevalier','Sarah','sarah.chevalier@mail.com',MD5('hash14'),'abonne'),
('Robin','Jules','jules.robin@mail.com',MD5('hash15'),'abonne'),
('Garnier','Alice','alice.garnier@mail.com',MD5('hash16'),'abonne'),
('Lambert','Noah','noah.lambert@mail.com',MD5('hash17'),'abonne'),
('Blanc','Eva','eva.blanc@mail.com',MD5('hash18'),'abonne'),
('Henry','Leo','leo.henry@mail.com',MD5('hash19'),'abonne'),
('Masson','Ines','ines.masson@mail.com',MD5('hash20'),'abonne');


INSERT INTO livre (auteur, titre, resume, genre) VALUES
('Victor Hugo','Les Miserables','Roman historique sur la justice sociale','Roman'),
('George Orwell','1984','Societe totalitaire et surveillance','Science-fiction'),
('Albert Camus','L\'Etranger','Un homme face a l\'absurde','Philosophie'),
('J.K. Rowling','Harry Potter a l\'ecole des sorciers','Debut des aventures de Harry','Fantasy'),
('J.R.R. Tolkien','Le Hobbit','Voyage d\'un hobbit inattendu','Fantasy'),
('Mary Shelley','Frankenstein','Creation et responsabilite','Gothique'),
('Bram Stoker','Dracula','Le mythe du vampire','Horreur'),
('Agatha Christie','Le Crime de l\'Orient-Express','Enquete de Poirot','Policier'),
('Dan Brown','Da Vinci Code','Thriller religieux','Thriller'),
('Stephen King','Shining','Hotel hante','Horreur'),

('Flaubert','Madame Bovary','Drame conjugal','Classique'),
('Zola','Germinal','Lutte ouvriere','Classique'),
('Asimov','Fondation','Empire galactique','Science-fiction'),
('Herbert','Dune','Planete desertique','Science-fiction'),
('Huxley','Le Meilleur des mondes','Societe conditionnee','Science-fiction'),

('Musso','La Vie est un roman','Destins croises','Roman'),
('Werber','Les Fourmis','Civilisation insecte','Science-fiction'),
('King','Ca','Creature malefique','Horreur'),
('Rowling','Harry Potter et la Chambre des secrets','Suite magique','Fantasy'),
('Tolkien','Le Seigneur des anneaux','Quete epique','Fantasy'),

('Eco','Le Nom de la rose','Meurtre medieval','Historique'),
('Kafka','Le Proces','Absurde judiciaire','Philosophie'),
('Verne','Voyage au centre de la Terre','Aventure scientifique','Aventure'),
('Verne','20 000 Lieues sous les mers','Exploration sous-marine','Aventure'),
('Dumas','Les Trois Mousquetaires','Amitie et honneur','Aventure'),

('Proust','Du cote de chez Swann','Memoire et temps','Classique'),
('Sartre','La Nausee','Existentialisme','Philosophie'),
('Orwell','La Ferme des animaux','Satire politique','Politique'),
('Camus','La Peste','Epidemie allegorique','Philosophie'),
('King','Misery','Enfermement','Thriller'),

('Collins','Hunger Games','Jeux mortels','Science-fiction'),
('Suzanne Collins','L\'Embrasement','Rebellion','Science-fiction'),
('Suzanne Collins','La Revolte','Chute du regime','Science-fiction'),
('Brown','Inferno','Enigmes et art','Thriller'),
('Christie','Dix petits negres','Suspense','Policier'),

('Larsson','Millenium','Thriller nordique','Policier'),
('Gaiman','American Gods','Mythologie moderne','Fantasy'),
('Murakami','Kafka sur le rivage','Realisme magique','Roman'),
('King','Docteur Sleep','Suite de Shining','Horreur'),
('Asimov','Les Robots','Ethique de l\'IA','Science-fiction'),

('Tolkien','Silmarillion','Mythologie','Fantasy'),
('Herbert','Le Messie de Dune','Suite politique','Science-fiction'),
('Rowling','Harry Potter et le Prisonnier d\'Azkaban','Voyage temporel','Fantasy'),
('Zweig','Amok','Passion destructrice','Nouvelle'),
('Hemingway','Le Vieil Homme et la mer','Lutte et dignite','Classique'),

('Orwell','Hommage a la Catalogne','Guerre civile','Historique'),
('Camus','L\'Homme revolte','Revolte et justice','Philosophie'),
('King','Le Fleau','Epidemie mondiale','Horreur'),
('Verne','Michel Strogoff','Mission en Russie','Aventure');

INSERT INTO emprunt (id_livre, id_utilisateur, date_sortie, date_rendu, date_reservation,statut) VALUES
(1,5,'2025-01-02',NULL,'2025-01-02','en cours'),
(2,5,'2025-01-05',NULL,'2025-01-05','en cours'),
(3,6,'2025-01-10','2025-01-20','2025-01-10','rendu'),
(4,6,'2025-01-12',NULL,'2025-01-12','en cours'),

(5,7,NULL,NULL,'2025-01-31','reserve'),
(6,8,'2025-01-01','2025-01-15','2025-01-01','rendu'),
(7,8,'2025-01-03',NULL,'2025-01-03','en cours'),

(8,9,'2025-01-07',NULL,'2025-01-07','en cours'),
(9,9,'2025-01-09',NULL,'2025-01-09','en cours'),
(10,9,'2025-01-11',NULL,'2025-01-11','en cours'),

(11,10,NULL,NULL,'2025-01-26','reserve'),

(12,11,'2024-12-15','2025-01-05','2024-12-15','rendu'),
(13,11,'2025-01-08',NULL,'2025-01-08','en cours'),

(14,12,'2025-01-02','2025-01-18','2025-01-02','rendu'),
(15,12,NULL,NULL,'2025-01-17','reserve'),

(16,13,'2025-01-01',NULL,'2025-01-01','en cours'),
(17,13,'2025-01-05',NULL,'2025-01-05','en cours'),
(18,13,'2025-01-07',NULL,'2025-01-07','en cours'),
(19,13,'2025-01-09',NULL,'2025-01-09','en cours'),
(20,13,'2025-01-11',NULL,'2025-01-11','en cours'),

(21,14,'2025-01-04','2025-01-20','2025-01-04','rendu'),
(22,15,NULL,NULL,'2026-01-01','reserve'),
(23,16,'2025-01-06',NULL,'2025-01-06','en cours'),

(24,17,'2025-01-08','2025-01-19','2025-01-08','rendu'),
(25,18,'2025-01-10',NULL,'2025-01-10','en cours'),
(26,19,NULL,NULL,'2026-01-17','reserve'),
(27,20,'2025-01-12',NULL,'2025-01-12','en cours');