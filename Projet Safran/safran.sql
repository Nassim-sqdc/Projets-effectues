-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2025 at 02:07 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safran`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces`
--

DROP TABLE IF EXISTS `acces`;
CREATE TABLE IF NOT EXISTS `acces` (
  `ID_ACCES` int NOT NULL AUTO_INCREMENT,
  `date_heure` datetime NOT NULL,
  `entree_sortie` varchar(50) NOT NULL,
  `ID_SALLE` int NOT NULL,
  `ID_employe` int NOT NULL,
  PRIMARY KEY (`ID_ACCES`),
  KEY `Acces_salles_accessibles_FK` (`ID_SALLE`),
  KEY `Acces_employes_FK` (`ID_employe`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acces`
--

INSERT INTO `acces` (`ID_ACCES`, `date_heure`, `entree_sortie`, `ID_SALLE`, `ID_employe`) VALUES
(1, '2024-06-26 07:32:26', 'E', 4, 1),
(2, '2024-06-27 07:32:26', 'E', 2, 2),
(3, '2024-06-28 07:32:26', 'E', 6, 3),
(4, '2024-06-29 07:32:26', 'E', 6, 4),
(5, '2024-06-30 07:32:26', 'E', 11, 5),
(7, '2024-07-02 07:32:26', 'S', 6, 7),
(8, '2024-07-03 07:32:26', 'S', 11, 8),
(9, '2024-07-04 07:32:26', 'S', 11, 9),
(10, '2024-07-05 07:32:26', 'S', 4, 10),
(11, '2024-04-11 17:48:00', 'S', 4, 10),
(12, '2024-04-11 17:48:29', 'S', 7, 18),
(15, '2024-06-26 07:32:26', 'E', 2, 20),
(16, '2024-06-28 07:32:26', 'E', 5, 57);

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `ID_employe` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `droit` smallint NOT NULL,
  `ID_SECTEUR` int NOT NULL,
  `ID_QUALITE` int NOT NULL,
  PRIMARY KEY (`ID_employe`),
  KEY `employes_Secteur_FK` (`ID_SECTEUR`),
  KEY `employes_Qualite_FK` (`ID_QUALITE`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`ID_employe`, `prenom`, `nom`, `droit`, `ID_SECTEUR`, `ID_QUALITE`) VALUES
(1, 'Bastien', 'Bernard', 1, 1, 2),
(2, 'Xavier', 'Bonnet', 2, 1, 6),
(3, 'Thimothé', 'Boyer', 3, 2, 4),
(4, 'Clémence', 'Caron', 2, 2, 3),
(5, 'Aurore', 'Cartier', 2, 3, 5),
(7, 'Marie', 'Colin', 2, 2, 3),
(8, 'Séverinne', 'Cordier', 2, 3, 5),
(9, 'Morgane', 'Delaunay', 1, 3, 3),
(10, 'Benjamin', 'Dubois', 2, 1, 2),
(11, 'Chistelle', 'Dufour', 1, 1, 3),
(12, 'Véronique', 'Dumond', 1, 1, 3),
(13, 'Laurent', 'Dupond', 2, 1, 6),
(14, 'Virginie', 'Dupuy', 3, 2, 6),
(15, 'Rémy', 'Durand', 2, 1, 2),
(16, 'Nathalie', 'Duval', 2, 1, 3),
(17, 'Julien', 'Faure', 2, 2, 6),
(18, 'Jean', 'Fontaine', 3, 2, 6),
(19, 'Antoine', 'Fournier', 3, 1, 6),
(20, 'Anaëlle', 'Garcia', 2, 1, 3),
(21, 'Philippe', 'Garnier', 2, 2, 4),
(22, 'Joëlle', 'Gilbert', 1, 3, 3),
(23, 'Jérémy', 'Girard', 3, 1, 6),
(24, 'Gilles', 'Grillot', 4, 4, 7),
(25, 'Hugo', 'Guérin', 3, 1, 4),
(26, 'Nadine', 'Guillot', 3, 1, 6),
(27, 'Nathalie', 'Henry', 2, 1, 3),
(28, 'Lucas', 'Lambert', 2, 1, 6),
(29, 'Laure', 'Lamy', 1, 3, 3),
(30, 'Adèle', 'Laporte', 3, 1, 5),
(31, 'Claudine', 'Leclerc', 2, 2, 6),
(32, 'Fabienne', 'Lecomte', 3, 2, 6),
(33, 'Etienne', 'Lefevre', 1, 2, 2),
(34, 'Frédéric', 'Legrand', 2, 3, 4),
(35, 'Mathilde', 'Lemaire', 1, 1, 3),
(36, 'François', 'Leroy', 1, 2, 2),
(37, 'Mathias', 'Martin', 1, 1, 2),
(38, 'Evelyne', 'Mathieu', 4, 4, 7),
(39, 'Jonathan', 'Mercier', 2, 2, 6),
(40, 'Marie', 'Meunier', 1, 1, 3),
(41, 'Vanessa', 'Meyer', 1, 1, 3),
(42, 'Lucie', 'Monnier', 2, 3, 6),
(43, 'Lucas', 'Moreau', 1, 2, 2),
(44, 'Léo', 'Morel', 3, 1, 6),
(45, 'Manon', 'Morin', 2, 1, 3),
(46, 'Pierre', 'Muller', 2, 2, 6),
(47, 'Cécile', 'Payet', 2, 2, 6),
(48, 'Chloé', 'Perrin', 2, 1, 3),
(49, 'Ethan', 'Petit', 1, 1, 2),
(50, 'Elodie', 'Rey', 2, 2, 3),
(51, 'Pierre', 'Rousseau', 3, 2, 6),
(52, 'Paul', 'Roux', 3, 1, 4),
(53, 'Philippe', 'Roux', 4, 4, 1),
(54, 'Clara', 'Tessier', 2, 3, 6),
(55, 'Claire', 'Vidal', 2, 2, 3),
(56, 'Thomas', 'Vincent', 3, 2, 6),
(57, 'Woippy', 'Listembourg', 2, 2, 1),
(63, 'dd', 'dd', 2, 2, 2),
(64, 'dd', 'dd', 2, 2, 2),
(65, 'dd', 'dd', 2, 2, 2),
(66, 'dd', 'dd', 2, 2, 2),
(67, 'dd', 'dd', 2, 2, 2),
(69, 'dxfc', 'wxcv', 1, 1, 1),
(70, 's', 's', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qualite`
--

DROP TABLE IF EXISTS `qualite`;
CREATE TABLE IF NOT EXISTS `qualite` (
  `ID_QUALITE` int NOT NULL AUTO_INCREMENT,
  `metier` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_QUALITE`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qualite`
--

INSERT INTO `qualite` (`ID_QUALITE`, `metier`) VALUES
(1, 'Directeur'),
(2, 'Technicien'),
(3, 'Technicienne'),
(4, 'Chercheur'),
(5, 'Chercheuse'),
(6, 'Ing'),
(7, 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `salles_accessibles`
--

DROP TABLE IF EXISTS `salles_accessibles`;
CREATE TABLE IF NOT EXISTS `salles_accessibles` (
  `ID_SALLE` int NOT NULL AUTO_INCREMENT,
  `salle` varchar(50) NOT NULL,
  `ID_SECTEUR` int NOT NULL,
  PRIMARY KEY (`ID_SALLE`),
  KEY `salles_accessibles_Secteur_FK` (`ID_SECTEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salles_accessibles`
--

INSERT INTO `salles_accessibles` (`ID_SALLE`, `salle`, `ID_SECTEUR`) VALUES
(1, 'Toutes les salles', 4),
(2, 'drone : labo 1', 1),
(3, 'drone : labo 2', 1),
(4, 'drone : assemblage', 1),
(5, 'drone : test', 1),
(6, 'cmd vol : labo 1', 2),
(7, 'cmd vol : labo 2', 2),
(8, 'cmd vol : assemblage', 2),
(9, 'cmd vol : tests', 2),
(10, 'bio :  labo 1', 3),
(11, 'bio : assemblage', 3),
(12, 'bio - tests', 3);

-- --------------------------------------------------------

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `ID_SECTEUR` int NOT NULL AUTO_INCREMENT,
  `secteur` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_SECTEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `secteur`
--

INSERT INTO `secteur` (`ID_SECTEUR`, `secteur`) VALUES
(1, 'drone tactique'),
(2, 'commandes de vol'),
(3, 'identification biom'),
(4, 'recherche et d');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acces`
--
ALTER TABLE `acces`
  ADD CONSTRAINT `Acces_employes_FK` FOREIGN KEY (`ID_employe`) REFERENCES `employes` (`ID_employe`),
  ADD CONSTRAINT `Acces_salles_accessibles_FK` FOREIGN KEY (`ID_SALLE`) REFERENCES `salles_accessibles` (`ID_SALLE`);

--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_Qualite_FK` FOREIGN KEY (`ID_QUALITE`) REFERENCES `qualite` (`ID_QUALITE`),
  ADD CONSTRAINT `employes_Secteur_FK` FOREIGN KEY (`ID_SECTEUR`) REFERENCES `secteur` (`ID_SECTEUR`);

--
-- Constraints for table `salles_accessibles`
--
ALTER TABLE `salles_accessibles`
  ADD CONSTRAINT `salles_accessibles_Secteur_FK` FOREIGN KEY (`ID_SECTEUR`) REFERENCES `secteur` (`ID_SECTEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
