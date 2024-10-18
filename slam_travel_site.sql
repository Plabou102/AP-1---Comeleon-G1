-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 oct. 2024 à 15:25
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `slam_travel_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prixannonce` double NOT NULL,
  `nbmaxpersonne` int NOT NULL,
  `datedepart` date NOT NULL,
  `dateretour` date NOT NULL,
  `paysannonce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villeannonce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionannonce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `prixannonce`, `nbmaxpersonne`, `datedepart`, `dateretour`, `paysannonce`, `villeannonce`, `descriptionannonce`, `user_id`) VALUES
(13, 80000, 3, '2024-10-01', '2024-10-31', 'Listenbourg', 'Ratioland', 'woippy quoicoufeur sucré au sucre', 0),
(14, 800, 3, '2024-10-01', '2024-10-31', 'Listenbour', 'Ratioland', 'woippy quoicoufeur sucré au sucre', 0),
(15, 4, 10, '2024-10-01', '2024-10-30', 'pipiland', 'caca city', 'pipi caca mdrrrr', 0),
(16, 4, 10, '2024-10-01', '2024-10-30', 'pipiland', 'caca city', 'pipi caca mdrrrr', 0),
(17, 1, 64, '2024-10-17', '2024-10-23', 'hunter x hunter land', 'naruto city', 'dragon ball park', 0),
(18, 5, 7, '2024-09-30', '2024-10-25', 'am', 'a', 'a', 0),
(19, 123, 7, '2024-10-15', '2024-10-30', 'NAAAAAAN PAS OSHI NO KOOOO', 'C TROP MID', 'vrm éteint', 0),
(20, 123, 7, '2024-10-15', '2024-10-30', 'NAAAAAAN PAS OSHI NO KOOOO', 'C TROP MID', 'vrm éteint', 0),
(21, 99.9, 99, '2024-10-09', '2024-11-01', 'hare hare yukai', 'taiga yo tomo', 'new stranger', 0),
(22, 99.9, 99, '2024-10-09', '2024-11-01', 'hare hare yukai', 'taiga yo tomo', 'new stranger', 0),
(23, 789, 45, '2024-09-29', '2024-10-23', 'hen', 'comment ça', 'mon reuf', 0),
(24, 789, 45, '2024-09-29', '2024-10-23', 'hen', 'comment ça', 'mon reuf', 0),
(25, 789, 45, '2024-09-29', '2024-10-23', 'hen', 'comment ça', 'mon reuf', 0),
(26, 789, 45, '2024-09-29', '2024-10-23', 'hen', 'comment ça', 'mon reuf', 0),
(27, 123, 1, '2024-10-03', '2024-10-23', 'z', 'z', 'z', 0),
(28, 123, 1, '2024-10-03', '2024-10-23', 'z', 'z', 'z', 0);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auteuravis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionavis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noteavis` int NOT NULL,
  `dateavis` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF0A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `auteuravis`, `descriptionavis`, `noteavis`, `dateavis`, `user_id`) VALUES
(4, 'moi', 'oui', 4, '2024-10-17 09:51:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL,
  `Motif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `iduser` int DEFAULT NULL,
  PRIMARY KEY (`idcontact`),
  KEY `iduser` (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `Nom`, `Prenom`, `date`, `Motif`, `iduser`) VALUES
(1, 'vbhjn', 'cfgvbhnj', '2024-10-16 11:35:00', 'fgbhjn,', NULL),
(2, 'xdcfgvbhn,gyuhji', 'cfgvbhjnjk', '2024-10-26 11:37:00', 'wsxdcfgvbnhujk', NULL),
(3, 'Coloras', 'Yann', '2024-10-19 13:41:00', 'Voyage à Malte', NULL),
(4, 'zd', 'zd', '0415-05-06 06:54:00', 'azd', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `username`, `password`, `roles`) VALUES
(1, 'BOUSSAIDA', 'Adame', 'Plabou', '$2y$13$W84ruwNL9W3zWIu1JttQ9uyx0OvbxutXEibTlT0e9O0UQZ/Nlut2O', '[\"ROLE_ADMIN\"]'),
(2, 'BERT', 'Alexis', 'Alexis', '$2y$13$LUkZUZa25QSakaq6fYt0xexNqSHLIiO12C6yDP02/fUn0UVXWv0o6', '[]'),
(33, 'WHAAAAAT', 'WHAAAAAT', 'WHAAAAT', '$2y$13$2Sfz.j/7ANd0sGM0Kaqd3uzUtZnDau3sGIjV7AvRY2g.z231FB9TC', '[]');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
