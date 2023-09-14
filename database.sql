-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 sep. 2023 à 14:52
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
  PRIMARY KEY (`ID_Professeur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`ID_Professeur`, `Nom_Professeur`, `Prenom_Professeur`, `Heures_Enseignant`, `Adresse_Email`, `Mot_De_Passe`) VALUES
(1, 'Demede', 'Michel', 10, 'admin@prof.fr', '$2y$10$WWBMQ6tBng/SPtV.lERzcet70dVlX.63hXhE22oROSXGxJZTV6npW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
