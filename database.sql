-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 sep. 2023 à 22:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

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

CREATE TABLE `classe` (
  `ID_Classe` int(11) NOT NULL,
  `Nom_Classe` varchar(30) NOT NULL,
  `Nombre_Etudiants` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_Classe`, `Nom_Classe`, `Nombre_Etudiants`) VALUES
(1, '1TSIO', 30);

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

CREATE TABLE `enseignement` (
  `Professeur_ID` int(11) NOT NULL,
  `Classe_ID` int(11) NOT NULL,
  `Heures_Enseignées` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` int(11) NOT NULL,
  `Nom_Entreprise` varchar(50) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Arrondissement` varchar(2) DEFAULT NULL,
  `Secteur_Activite` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` int(11) NOT NULL,
  `Nom_Etudiant` varchar(30) DEFAULT NULL,
  `Prenom_Etudiant` varchar(30) DEFAULT NULL,
  `Adresse_Etudiant` varchar(50) DEFAULT NULL,
  `Telephone_Etudiant` varchar(14) DEFAULT NULL,
  `Email_Etudiant` varchar(30) DEFAULT NULL,
  `Classe_Etudiant` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `Nom_Etudiant`, `Prenom_Etudiant`, `Adresse_Etudiant`, `Telephone_Etudiant`, `Email_Etudiant`, `Classe_Etudiant`) VALUES
(1, 'Boudaoudi', 'Rayane', '13 rue de la paix', '0666666666', 'rboudaoudi@gmail.com', 1),
(2, 'Raingeval', 'Hadrien', '155 rue lodi', '06 88 65 1', 'raingeval@gmail.com', 1),
(4, 'Muntaner', 'Thomas', '155 boulevard baille', '06 66 66 66 67', 'ghostdezine@gmail.com', 1),
(5, 'Zwizi', 'Mohamed', '123 ezde e', '06 11 11 11 11', 'mohazizi@gmail.com', 1),
(6, 'Mayonez', 'Albert', '133 port de bouc', '07 55 14 26 85', 'amayonez@gmail.com', 1),
(7, 'Saadi', 'Elias', 'Marseille', '06 12 35 74 16', 'saadididi@gmail.com', 1),
(8, 'Riziki', 'Mansour', 'Marseille', '07 56 41 23 89', 'rmansour@free.fr', 1),
(9, 'Tebai', 'Khalid', 'Marseille', '07 44 95 12 37', 'tebaik@gmail.com', 1),
(10, 'Niati', 'Rayan', 'Marseille', '07 81 43 61 97', 'rayansithis@gmail.com', 1),
(11, 'Moud', 'Moudja', 'Marseille', '06 12 45 36 71', 'moudjab@gmail.com', 1),
(12, 'Chplenom', 'Nvzim', 'Marseille', '06 11 45 26 71', 'nvzimgay@gmail.com', 1),
(13, 'Hachette', 'Romuald', 'Marseille', '06 45 21 74 54', 'romrom@gmail.com', 1),
(14, 'Bescond', 'Olivier', 'Marseille', '06 66 66 66 66', 'onelevelcr@gmail.com', 1),
(15, 'Boutet', 'Roméo', 'Marseille', '06 12 35 74 16', 'onelevdazelcr@gmail.com', 1),
(20, 'Saadi', 'AURORA', '155 rue flocon', '07 56 41 23 89', 'onelevelcr@gmail.com', 1),
(17, 'Jauffret', 'Frédéric', 'Marseille', '07 44 95 12 37', 'ghostdezine@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `ID_Professeur` int(11) NOT NULL,
  `Nom_Professeur` varchar(30) DEFAULT NULL,
  `Prenom_Professeur` varchar(30) DEFAULT NULL,
  `Heures_Enseignant` int(11) DEFAULT NULL,
  `Adresse_Email` varchar(30) NOT NULL,
  `Mot_De_Passe` varchar(70) NOT NULL,
  `Permission` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `stage` (
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
  `Distanciel` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`ID_Classe`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_Entreprise`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_Etudiant`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`ID_Professeur`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`ID_Stage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `ID_Classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `ID_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `ID_Professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
