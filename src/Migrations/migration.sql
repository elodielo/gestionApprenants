-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 avr. 2024 à 14:07
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_webapp__2`
--

-- --------------------------------------------------------

--
-- Structure de la table `gest_cours`
--

DROP TABLE IF EXISTS `gest_cours`;
CREATE TABLE IF NOT EXISTS `gest_cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateJour` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  `codeCours` int DEFAULT NULL,
  `id_promo` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_promo` (`id_promo`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gest_cours`
--

INSERT INTO `gest_cours` (`id`, `dateJour`, `heureDebut`, `heureFin`, `codeCours`, `id_promo`) VALUES
(1, '2024-04-10', '09:00:00', '12:00:00', 12345, 1),
(2, '2024-04-11', '12:00:00', '20:00:00', 14021, 1),
(3, '2024-04-12', '09:00:00', '12:00:00', 84010, 1),
(4, '2024-04-13', '09:00:00', '12:00:00', NULL, 1),
(5, '2024-04-14', '09:00:00', '12:00:00', NULL, 1),
(6, '2024-04-15', '09:00:00', '12:00:00', NULL, 1),
(7, '2024-04-16', '09:00:00', '12:00:00', NULL, 1),
(8, '2024-04-17', '09:00:00', '12:00:00', NULL, 1),
(9, '2024-04-18', '09:00:00', '12:00:00', NULL, 1),
(10, '2024-04-12', '13:00:00', '17:00:00', 42707, 1),
(11, '2024-04-10', '13:00:00', '17:00:00', NULL, 1),
(12, '2024-04-14', '13:00:00', '17:00:00', NULL, 1),
(13, '2024-04-15', '13:00:00', '17:00:00', NULL, 1),
(14, '2024-04-16', '13:00:00', '17:00:00', NULL, 1),
(15, '2024-04-17', '13:00:00', '17:00:00', NULL, 1),
(16, '2024-04-18', '13:00:00', '17:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gest_promo`
--

DROP TABLE IF EXISTS `gest_promo`;
CREATE TABLE IF NOT EXISTS `gest_promo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomPromo` varchar(50) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `placesDispos` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gest_promo`
--

INSERT INTO `gest_promo` (`id`, `nomPromo`, `dateDebut`, `dateFin`, `placesDispos`) VALUES
(1, 'DWWM1', '2024-01-01', '2024-10-24', 15),
(2, 'DWWM2', '2024-01-03', '2024-10-07', 12),
(3, NULL, NULL, NULL, NULL),
(4, 'DWW3', '2019-09-09', '2024-04-02', 13);

-- --------------------------------------------------------

--
-- Structure de la table `gest_role`
--

DROP TABLE IF EXISTS `gest_role`;
CREATE TABLE IF NOT EXISTS `gest_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gest_role`
--

INSERT INTO `gest_role` (`id`, `role`) VALUES
(1, 'formateur'),
(2, 'apprenant');

-- --------------------------------------------------------

--
-- Structure de la table `gest_utilisateur`
--

DROP TABLE IF EXISTS `gest_utilisateur`;
CREATE TABLE IF NOT EXISTS `gest_utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  KEY `id_role` (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gest_utilisateur`
--

INSERT INTO `gest_utilisateur` (`id`, `nom`, `prenom`, `mail`, `mdp`, `id_role`) VALUES
(1, 'Lo', 'El', 'elodielo20@gmail.com', '$2y$10$s.Fjux1Buqe6jIO5TfPA/OHcKQfDPnVtgnKLWSawOLtkSJVnq58N2', 1),
(2, 'Lo', 'El', 'elodielo20@gmal.com', '$2y$10$s.Fjux1Buqe6jIO5TfPA/OHcKQfDPnVtgnKLWSawOLtkSJVnq58N2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_cours`
--

DROP TABLE IF EXISTS `utilisateur_cours`;
CREATE TABLE IF NOT EXISTS `utilisateur_cours` (
  `id_utilisateur` int NOT NULL,
  `id_cours` int NOT NULL,
  `Statut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_cours`),
  KEY `id_cours` (`id_cours`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur_cours`
--

INSERT INTO `utilisateur_cours` (`id_utilisateur`, `id_cours`, `Statut`) VALUES
(1, 1, 'present'),
(2, 3, 'retard');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_promo`
--

DROP TABLE IF EXISTS `utilisateur_promo`;
CREATE TABLE IF NOT EXISTS `utilisateur_promo` (
  `id_utilisateur` int NOT NULL,
  `id_promo` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_promo`),
  KEY `id_promo` (`id_promo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur_promo`
--

INSERT INTO `utilisateur_promo` (`id_utilisateur`, `id_promo`) VALUES
(1, 1),
(2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
