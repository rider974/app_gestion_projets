-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2023 at 01:25 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_gestion_projets_2_test`
--
CREATE DATABASE IF NOT EXISTS `app_gestion_projets_2_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `app_gestion_projets_2_test`;

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tache_id` int NOT NULL,
  `intitule` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_47CC8C92D2235D39` (`tache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colonne`
--

DROP TABLE IF EXISTS `colonne`;
CREATE TABLE IF NOT EXISTS `colonne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tableau_id` int NOT NULL,
  `intitule` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65F87C44B062D5BC` (`tableau_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colonne`
--

INSERT INTO `colonne` (`id`, `tableau_id`, `intitule`) VALUES
(7, 8, 'Terminé'),
(8, 8, 'En cours'),
(9, 8, 'A faire');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231114100621', '2023-11-14 10:10:04', 962);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectifs` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `objectifs`) VALUES
(1, 'Projet UNICORN', 'projet top secret....'),
(2, 'Trois Bassins', 'projet de la mairie de Trois Bassins'),
(3, 'Library', 'création d\'une librairie'),
(4, 'App de gestion de projets ', 'créer une application qui permet de gérer un projet informatique (style: Trello)\r\nContrainte: utilisation de React.JS'),
(24, 'Nouveau Projet', 'Object 1 - Créer un projet \n2 - Créer un tableau \n3 - créer des colonnes \n4 - créer des tâches');

-- --------------------------------------------------------

--
-- Table structure for table `tableau`
--

DROP TABLE IF EXISTS `tableau`;
CREATE TABLE IF NOT EXISTS `tableau` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projet_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C6744DB1C18272` (`projet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tableau`
--

INSERT INTO `tableau` (`id`, `projet_id`) VALUES
(8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `colonne_id` int NOT NULL,
  `responsable_id` int DEFAULT NULL,
  `titre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `date_limite` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_93872075213EAC9D` (`colonne_id`),
  KEY `IDX_9387207553C59D72` (`responsable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addresse_mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `addresse_mail`) VALUES
(1, 'gobert', 'Rudy', 'rudy.gobert@gmail.com'),
(2, 'noah', 'joachim', 'joa@noa.com'),
(3, 'parker', 'tony', 'ton.park@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_projet`
--

DROP TABLE IF EXISTS `utilisateur_projet`;
CREATE TABLE IF NOT EXISTS `utilisateur_projet` (
  `utilisateur_id` int NOT NULL,
  `projet_id` int NOT NULL,
  PRIMARY KEY (`utilisateur_id`,`projet_id`),
  KEY `IDX_31B8A622FB88E14F` (`utilisateur_id`),
  KEY `IDX_31B8A622C18272` (`projet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur_projet`
--

INSERT INTO `utilisateur_projet` (`utilisateur_id`, `projet_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 24),
(2, 24);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `FK_47CC8C92D2235D39` FOREIGN KEY (`tache_id`) REFERENCES `tache` (`id`);

--
-- Constraints for table `colonne`
--
ALTER TABLE `colonne`
  ADD CONSTRAINT `FK_65F87C44B062D5BC` FOREIGN KEY (`tableau_id`) REFERENCES `tableau` (`id`);

--
-- Constraints for table `tableau`
--
ALTER TABLE `tableau`
  ADD CONSTRAINT `FK_C6744DB1C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`);

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `FK_93872075213EAC9D` FOREIGN KEY (`colonne_id`) REFERENCES `colonne` (`id`),
  ADD CONSTRAINT `FK_9387207553C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `utilisateur_projet`
--
ALTER TABLE `utilisateur_projet`
  ADD CONSTRAINT `FK_31B8A622C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_31B8A622FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



/* Create USER and GRANT USER (It is recommanded to change the password) */

CREATE USER 'userAppGestionProjets'@'localhost' IDENTIFIED BY 'mdpUserAppGestionProjets001';


GRANT USAGE ON *.* TO `userAppGestionProjets`@`%`;

GRANT SELECT, INSERT, UPDATE ON `app_gestion_projets_2_test`.* TO `userAppGestionProjets`@`%`;
