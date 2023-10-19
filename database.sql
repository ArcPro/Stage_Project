-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 oct. 2023 à 14:31
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_Classe`, `Nom_Classe`, `Nombre_Etudiants`) VALUES
(1, '1TSIO_SLAM', 6),
(2, '1TSIO_SISR', 5),
(3, '2TSSL', 5),
(4, '2TSSI', 5);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID_Entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Entreprise` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Arrondissement` varchar(2) NOT NULL,
  `Secteur_Activite` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `Nom_Entreprise`, `Ville`, `Arrondissement`, `Secteur_Activite`) VALUES
(1, 'CTA', 'Marseille', '05', 'Jeu vidéo'),
(2, 'dady discount', 'Marseille', '15', 'web'),
(3, 'Les Echos Le Parisien', 'Paris', '07', 'réssaux'),
(4, 'dell', 'marseille', '08', 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID_Etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Etudiant` varchar(30) NOT NULL,
  `Prenom_Etudiant` varchar(30) NOT NULL,
  `Adresse_Etudiant` varchar(50) NOT NULL,
  `Telephone_Etudiant` varchar(14) NOT NULL,
  `Email_Etudiant` varchar(30) NOT NULL,
  `Classe_Etudiant` int(11) NOT NULL,
  PRIMARY KEY (`ID_Etudiant`),
  FOREIGN KEY (`Classe_Etudiant`) REFERENCES `classe`(`ID_Classe`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `Nom_Etudiant`, `Prenom_Etudiant`, `Adresse_Etudiant`, `Telephone_Etudiant`, `Email_Etudiant`, `Classe_Etudiant`) VALUES
(1, 'Boudaoudi', 'Rayane', '13 rue de la paix', '07 68 69 59 99', 'rboudaoudi@gmail.com', 3),
(2, 'Raingeval', 'Hadrien', '35 chemin des bons voisins', '07 68 06 14 04', 'hraingeval@gmail.com', 3),
(3, 'Mayonez', 'Albert', '55 chemin de l\'armée d\'Afrique', '06 66 66 66 66', 'amayonez@gmail.com', 3),
(4, 'Tebai', 'Khalid', '10 chemin des terrier', '06 55 20 47 99', 'ktebai@gmail.com', 4),
(5, 'Douchet', 'Dylan', '50 chemin du moulin', '07 05 06 08 04', 'ddouchet@gmail.com', 3),
(6, 'Muntaner', 'Thomas', '55 chemin des bons voisins', '07 68 69 59 98', 'tmuntaner@gmail.com', 3),
(7, 'Djebaili', 'Ayoube', '75 chemin des terrier', '07 68 06 14 05', 'adjebaili@gmail.com', 4),
(8, 'Kasmi', 'Nazim', '75 chemin de l\'armée d\'Afrique ', '07 68 69 59 92', 'nkasmi@gmail.com', 4),
(9, 'Niati', 'Rayan', '105 chemin du moulin', '07 55 20 65 45', 'rniati@gmail.com', 4),
(10, 'Djendoubi', 'Walid', '20 rue de la paix', '06 66 66 55 55', 'wdjendoubi@gmail.com', 4),
(11, 'Saidali', 'Nayad', '80 chemin des terrier', '07 68 06 33 55', 'nsaidali@gmail.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `ID_Professeur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Professeur` varchar(30) NOT NULL,
  `Prenom_Professeur` varchar(30) NOT NULL,
  `Adresse_Email` varchar(30) NOT NULL,
  `Mot_De_Passe` varchar(70) NOT NULL,
  `Permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Professeur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`ID_Professeur`, `Nom_Professeur`, `Prenom_Professeur`, `Adresse_Email`, `Mot_De_Passe`, `Permission`) VALUES
(1, 'Admin', '.', 'admin@prof.fr', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 2),
(2, 'Demede', 'Michel', 'mdemede@gmail.com', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 1),
(3, 'Michaud', 'Christian', 'cmichaud@gmail.com', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 1),
(4, 'Tormento', 'Sylvie', 'stormento@gmail.com', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 1),
(5, 'Peduzzi', 'Nicolas', 'npeduzzi@gmail.com', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 1);

-- --------------------------------------------------------
--
-- Structure de la table `enseignement`
--

DROP TABLE IF EXISTS `enseignement`;
CREATE TABLE IF NOT EXISTS `enseignement` (
  `Professeur_ID` int(11) NOT NULL,
  `Classe_ID` int(11) NOT NULL,
  `Heures_Enseignées` int(11) NOT NULL,
  PRIMARY KEY (`Classe_ID`,`Professeur_ID` ),
  FOREIGN KEY (`Classe_ID`) REFERENCES `classe`(`ID_Classe`),
  FOREIGN KEY (`Professeur_ID`) REFERENCES `professeur`(`ID_Professeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignement`
--

INSERT INTO `enseignement` (`Professeur_ID`, `Classe_ID`, `Heures_Enseignées`) VALUES
(3, 3, 3),
(2, 3, 8),
(4, 3, 4);

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `ID_Stage` int(11) NOT NULL AUTO_INCREMENT,
  `Sujet_Stage` varchar(50) NOT NULL,
  `Outils` varchar(50) NOT NULL,
  `Type_Stage` varchar(50) NOT NULL,
  `Technologie` varchar(50) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Professeur_ID` int(11) NOT NULL,
  `Etudiant_ID` int(11) NOT NULL,
  `Entreprise_ID` int(11) NOT NULL,
  `Date_Attestation` date NOT NULL,
  `Niveau_Etude` varchar(10) NOT NULL,
  `Distanciel` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Stage`),
  FOREIGN KEY (`Etudiant_ID`) REFERENCES `etudiant`(`ID_Etudiant`),
  FOREIGN KEY (`Professeur_ID`) REFERENCES `professeur`(`ID_Professeur`),
  FOREIGN KEY (`Entreprise_ID`) REFERENCES `entreprise`(`ID_Entreprise`)  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`ID_Stage`, `Sujet_Stage`, `Outils`, `Type_Stage`, `Technologie`, `Date_Debut`, `Date_Fin`, `Professeur_ID`, `Etudiant_ID`, `Entreprise_ID`, `Date_Attestation`, `Niveau_Etude`, `Distanciel`) VALUES
(1, 'Gestion de projets avec Agile', 'Jira, Confluence', 'Gestion de Projet', '', '2023-11-15', '2023-12-30', 2, 9, 1, '2024-01-05', 'Bac+2', 1),
(2, 'Développement d\'applications Android', 'Android Studio', 'Développement', '', '2023-12-10', '2024-01-25', 2, 11, 3, '2024-01-30', 'Bac+2', 0),
(3, 'Sécurité des réseaux', 'Wireshark, Nessus', 'Sécurité', '', '2024-01-15', '2024-02-28', 3, 8, 2, '2024-03-05', 'Bac+2', 1),
(4, 'Développement d\'applications iOS', 'Xcode', 'Développement', '', '2024-02-05', '2024-03-20', 4, 6, 4, '2024-03-25', 'Bac+2', 0),
(5, 'Analyse de données avec Python', 'Jupyter Notebook', 'Data Science', '', '2024-02-20', '2024-04-05', 5, 2, 2, '2024-04-10', 'Bac+2', 1),
(6, 'Développement de solutions cloud', 'AWS, Azure', 'Cloud Computing', '', '2024-03-10', '2024-04-25', 3, 1, 3, '2024-04-30', 'Bac+2', 0),
(7, 'Conception d\'interfaces utilisateur', 'Adobe XD', 'Design', '', '2024-03-25', '2024-05-10', 2, 4, 1, '2024-05-15', 'Bac+2', 1),
(8, 'Développement d\'une application web', 'Vue.js', 'Développement', '', '2024-04-10', '2024-05-25', 3, 3, 2, '2024-05-30', 'Bac+2', 0),
(9, 'Développement d\'un système d\'information', 'Spring Boot', 'Développement', '', '2024-04-25', '2024-06-10', 4, 7, 3, '2024-06-15', 'Bac+2', 1),
(10, 'Administration de serveurs Linux', 'SSH, Bash', 'Administration', '', '2024-05-10', '2024-06-25', 5, 10, 4, '2024-06-30', 'Bac+2', 0);
