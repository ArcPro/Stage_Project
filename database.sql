-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 sep. 2023 à 15:16
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_Classe`, `Nom_Classe`, `Nombre_Etudiants`) VALUES
(1, '1TSIO', 30);

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
  `ID_Entreprise` int(11) NOT NULL,
  `Nom_Entreprise` varchar(50) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Arrondissement` varchar(2) DEFAULT NULL,
  `Secteur_Activite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Entreprise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `Telephone_Etudiant` varchar(10) DEFAULT NULL,
  `Email_Etudiant` varchar(30) DEFAULT NULL,
  `Classe_Etudiant` int(11) NOT NULL,
  PRIMARY KEY (`ID_Etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `Nom_Etudiant`, `Prenom_Etudiant`, `Adresse_Etudiant`, `Telephone_Etudiant`, `Email_Etudiant`, `Classe_Etudiant`) VALUES
(1, 'Boudaoudi', 'Rayane', '13 rue de la paix', '0666666666', 'rboudaoudi@gmail.com', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`ID_Professeur`, `Nom_Professeur`, `Prenom_Professeur`, `Heures_Enseignant`, `Adresse_Email`, `Mot_De_Passe`, `Permission`) VALUES
(1, 'Demede', 'Michel', 10, 'admin@prof.fr', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW', 2),
(2, 'Michaud', 'Christian', NULL, 'dede@gmail.com', '$2y$10$4AkxvYCaGlj36c0ZI3wUz.qjOuu1ekAtImBsHuYeyEGE5FSV9dsNG', 1),
(3, 'Michaud', 'Christian', NULL, 'dazdaz@gmail.com', '$2y$10$jpk0q8xLnl834Cb0qM/biekrmX9ZTQsgpqxzDjsrSpKKwWFd/cCIa', 1),
(4, 'dazdaz', 'dadazd', NULL, 'dedede@gmail.com', '$2y$10$2YTgRYkTIr8VYRMBWd4FL.VBTFFsAD4uhVmtVyZOr5NALtKB6LJbK', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `ID_Stage` int(11) NOT NULL,
  `Sujet_Stage` varchar(30) DEFAULT NULL,
  `Outils` varchar(30) DEFAULT NULL,
  `Type_Stage` varchar(50) DEFAULT NULL,
  `Technologie` varchar(30) DEFAULT NULL,
  `Date_Debut` date DEFAULT NULL,
  `Date_Fin` date DEFAULT NULL,
  `Professeur_ID` int(11) NOT NULL,
  `Etudiant_ID` int(11) DEFAULT NULL,
  `Entreprise_ID` int(11) DEFAULT NULL,
  `Date_Attestation` date DEFAULT NULL,
  `Niveau_Etude` varchar(10) DEFAULT NULL,
  `Distanciel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_Stage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
