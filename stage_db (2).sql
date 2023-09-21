-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 sep. 2023 à 14:55
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `ID_Classe` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Classe` varchar(30) NOT NULL,
  `Nombre_Etudiants` int(11) NOT NULL,
  PRIMARY KEY (`ID_Classe`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_Classe`, `Nom_Classe`, `Nombre_Etudiants`) VALUES
(1, '1TSIO_SLAM', 6),
(2, '1TSIO_SISR', 5),
(3, '2TSSL', 5),
(4, '2TSSI', 5);

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

DROP TABLE IF EXISTS `enseignement`;
CREATE TABLE IF NOT EXISTS `enseignement` (
  `Professeur_ID` int(11) NOT NULL,
  `Classe_ID` int(11) NOT NULL,
  `Heures_Enseignées` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID_Entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Entreprise` varchar(50) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Arrondissement` varchar(2) DEFAULT NULL,
  `Secteur_Activite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Entreprise`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `Nom_Entreprise`, `Ville`, `Arrondissement`, `Secteur_Activite`) VALUES
(1, 'Tech Solutions', 'Marseille', '5', 'Informatique'),
(2, 'Eco Solutions', 'Marseille', '3', 'Environnement'),
(3, 'MediCorp', 'Marseille', '9', 'Santé'),
(4, 'EduTech', 'Marseille', '7', 'Éducation');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID_Etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Etudiant` varchar(30) DEFAULT NULL,
  `Prenom_Etudiant` varchar(30) DEFAULT NULL,
  `Adresse_Etudiant` varchar(50) DEFAULT NULL,
  `Telephone_Etudiant` varchar(14) DEFAULT NULL,
  `Email_Etudiant` varchar(30) DEFAULT NULL,
  `Classe_Etudiant` int(11) NOT NULL,
  PRIMARY KEY (`ID_Etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `Nom_Etudiant`, `Prenom_Etudiant`, `Adresse_Etudiant`, `Telephone_Etudiant`, `Email_Etudiant`, `Classe_Etudiant`) VALUES
(1, 'Dupont', 'Marie', '25 rue de la Liberté', '06 77 88 99 00', 'marie.dupont@email.com', 1),
(2, 'Martin', 'Paul', '18 avenue des Roses', '06 55 44 33 22', 'paul.martin@email.com', 1),
(3, 'Dubois', 'Sophie', '30 rue de Paris', '06 99 88 77 66', 'sophie.dubois@email.com', 2),
(5, 'Girard', 'Elise', '42 avenue de la République', '06 88 77 66 55', 'elise.girard@email.com', 3),
(6, 'Petit', 'Thomas', '12 rue du Commerce', '06 44 33 22 11', 'thomas.petit@email.com', 4),
(7, 'Roux', 'Sophie', '15 avenue des Fleurs', '06 99 88 77 66', 'sophie.roux@email.com', 4),
(8, 'Lefevre', 'Luc', '5 rue Saint-Michel', '06 22 11 00 99', 'luc.lefevre@email.com', 1),
(9, 'Durand', 'Marie', '2 avenue Victor Hugo', '06 11 22 33 44', 'marie.durand@email.com', 2),
(10, 'Moreau', 'Jean', '7 rue de la Paix', '06 33 44 55 66', 'jean.moreau@email.com', 3),
(11, 'Lecomte', 'Alice', '11 rue de la République', '06 44 55 66 77', 'alice.lecomte@email.com', 4),
(12, 'Moreau', 'Laura', '14 rue de la Paix', '06 33 44 55 66', 'laura.moreau@email.com', 1),
(13, 'Lecomte', 'Julien', '20 avenue Victor Hugo', '06 11 22 33 44', 'julien.lecomte@email.com', 2),
(14, 'Bertrand', 'Emma', '6 rue Saint-Michel', '06 22 11 00 99', 'emma.bertrand@email.com', 3),
(15, 'Leroy', 'Nicolas', '9 avenue des Fleurs', '06 66 77 88 99', 'nicolas.leroy@email.com', 4),
(16, 'Garcia', 'Camille', '22 rue de la République', '06 88 99 00 11', 'camille.garcia@email.com', 1),
(17, 'Lefebvre', 'Lucie', '37 avenue de la Liberté', '06 77 88 99 11', 'lucie.lefebvre@email.com', 2),
(18, 'Roussel', 'Tom', '45 rue du Commerce', '06 44 55 66 77', 'tom.roussel@email.com', 3),
(19, 'Meyer', 'Julia', '8 avenue des Roses', '06 99 88 77 66', 'julia.meyer@email.com', 4),
(20, 'Sanchez', 'Hugo', '3 rue de Paris', '06 55 44 33 22', 'hugo.sanchez@email.com', 1),
(21, 'Lemoine', 'Manon', '11 rue Victor Hugo', '06 77 88 99 22', 'manon.lemoine@email.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `ID_Professeur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Professeur` varchar(30) DEFAULT NULL,
  `Prenom_Professeur` varchar(30) DEFAULT NULL,
  `Heures_Enseignant` int(11) DEFAULT NULL,
  `Adresse_Email` varchar(30) NOT NULL,
  `Mot_De_Passe` varchar(70) NOT NULL,
  `Permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Professeur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`ID_Professeur`, `Nom_Professeur`, `Prenom_Professeur`, `Heures_Enseignant`, `Adresse_Email`, `Mot_De_Passe`, `Permission`) VALUES
(1, 'Admin', NULL, NULL, 'admin@prof.fr', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 2);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `ID_Stage` int(11) NOT NULL AUTO_INCREMENT,
  `Sujet_Stage` varchar(50) DEFAULT NULL,
  `Outils` varchar(50) DEFAULT NULL,
  `Type_Stage` varchar(50) DEFAULT NULL,
  `Technologie` varchar(50) DEFAULT NULL,
  `Date_Debut` date DEFAULT NULL,
  `Date_Fin` date DEFAULT NULL,
  `Professeur_ID` int(11) NOT NULL,
  `Etudiant_ID` int(11) DEFAULT NULL,
  `Entreprise_ID` int(11) DEFAULT NULL,
  `Date_Attestation` date DEFAULT NULL,
  `Niveau_Etude` varchar(10) DEFAULT NULL,
  `Distanciel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_Stage`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`ID_Stage`, `Sujet_Stage`, `Outils`, `Type_Stage`, `Technologie`, `Date_Debut`, `Date_Fin`, `Professeur_ID`, `Etudiant_ID`, `Entreprise_ID`, `Date_Attestation`, `Niveau_Etude`, `Distanciel`) VALUES
(1, 'Développement Web avancé', 'HTML, CSS, JavaScript', 'Stage technique', 'Web', '2023-10-01', '2023-11-30', 1, 1, 1, '2023-12-15', 'Bac+2', 0),
(2, 'Analyse de données en Python', 'Python, Pandas, NumPy', 'Stage technique', 'Data Science', '2023-09-15', '2023-11-15', 2, 2, 2, '2023-12-01', 'Bac+1', 0),
(3, 'Gestion de réseaux', 'Cisco, Networking', 'Stage technique', 'Réseaux', '2023-11-01', '2024-01-15', 1, 3, 3, '2024-02-01', 'Bac+2', 0),
(4, 'Développement d\'applications mobiles', 'Android, iOS', 'Stage technique', 'Mobile', '2023-09-01', '2023-11-15', 1, 5, 1, '2023-12-01', 'Bac+2', 0),
(5, 'Sécurité informatique', 'Cybersécurité', 'Stage technique', 'Sécurité', '2023-10-15', '2023-12-30', 1, 7, 2, '2024-01-15', 'Bac+2', 1),
(6, 'Data Analytics avancé', 'Big Data, Machine Learning', 'Stage technique', 'Data Science', '2023-09-15', '2023-11-30', 2, 8, 4, '2023-12-15', 'Bac+1', 0),
(7, 'Développement Full Stack', 'Node.js, React, MongoDB', 'Stage technique', 'Web', '2023-10-01', '2023-12-30', 1, 9, 1, '2024-01-15', 'Bac+2', 0),
(8, 'Administration de bases de données', 'SQL, MySQL', 'Stage technique', 'Base de données', '2023-09-01', '2023-11-30', 2, 10, 4, '2023-12-15', 'Bac+1', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
