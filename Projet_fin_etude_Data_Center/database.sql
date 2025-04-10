-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 avr. 2025 à 17:07
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `badge`
--

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `Id_Badge_Badge` bigint NOT NULL AUTO_INCREMENT,
  `Date_Expiration_Badge` varchar(25) DEFAULT NULL,
  `Numero_Badge` int DEFAULT NULL,
  `utilisateur_id_utilisateur_utilisateur` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_Badge_Badge`),
  KEY `FK_Badge_utilisateur_id_utilisateur_utilisateur` (`utilisateur_id_utilisateur_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `badge`
--

INSERT INTO `badge` (`Id_Badge_Badge`, `Date_Expiration_Badge`, `Numero_Badge`, `utilisateur_id_utilisateur_utilisateur`) VALUES
(1, '21/12/2025', 32, 1);

-- --------------------------------------------------------

--
-- Structure de la table `baies`
--

DROP TABLE IF EXISTS `baies`;
CREATE TABLE IF NOT EXISTS `baies` (
  `ID_Baie_Baies` bigint NOT NULL AUTO_INCREMENT,
  `Numero_Baie` varchar(3) DEFAULT NULL,
  `Id_Salle_Salle` bigint DEFAULT NULL,
  PRIMARY KEY (`ID_Baie_Baies`),
  KEY `FK_Baies_Id_Salle_Salle` (`Id_Salle_Salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `Id_Mesure` bigint NOT NULL AUTO_INCREMENT,
  `Capteur_Temperature_1` float DEFAULT NULL,
  `Capteur_Temperature_2` float DEFAULT NULL,
  `Capteur_Humidite` float DEFAULT NULL,
  `Date_Capteur` datetime DEFAULT NULL,
  `Id_Salle_Salle` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_Mesure`),
  KEY `FK_Capteur_Id_Salle_Salle` (`Id_Salle_Salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `Id_Entreprise_Entreprise` bigint NOT NULL AUTO_INCREMENT,
  `Ville_Entreprise` varchar(20) DEFAULT NULL,
  `Nom_entreprise_Entreprise` varchar(25) DEFAULT NULL,
  `Email_entreprise_Entreprise` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Id_Entreprise_Entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`Id_Entreprise_Entreprise`, `Ville_Entreprise`, `Nom_entreprise_Entreprise`, `Email_entreprise_Entreprise`) VALUES
(1, 'saint claude', 'Royal Food', 'RF@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `mesure_pdu`
--

DROP TABLE IF EXISTS `mesure_pdu`;
CREATE TABLE IF NOT EXISTS `mesure_pdu` (
  `Id_MesurePDU_Mesure_PDU` bigint NOT NULL AUTO_INCREMENT,
  `Date_Mesure_Mesure_PDU` date DEFAULT NULL,
  `Mesure_ActuellePDU_Mesure_PDU` float DEFAULT NULL,
  `Energie_Active_Pdu_Mesure_PDU` float DEFAULT NULL,
  `Id_PDU_PDU` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_MesurePDU_Mesure_PDU`),
  KEY `FK_Mesure_PDU_Id_PDU_PDU` (`Id_PDU_PDU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pdu`
--

DROP TABLE IF EXISTS `pdu`;
CREATE TABLE IF NOT EXISTS `pdu` (
  `Id_PDU_PDU` bigint NOT NULL AUTO_INCREMENT,
  `Numero_Serie` int DEFAULT NULL,
  `IP_PDU` varchar(25) DEFAULT NULL,
  `ID_Baie_Baies` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_PDU_PDU`),
  KEY `FK_PDU_ID_Baie_Baies` (`ID_Baie_Baies`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `porte`
--

DROP TABLE IF EXISTS `porte`;
CREATE TABLE IF NOT EXISTS `porte` (
  `Id_Porte_Porte` bigint NOT NULL AUTO_INCREMENT,
  `Lecteur_IP_Porte` varchar(25) DEFAULT NULL,
  `BP_Adr_Api_Porte` varchar(25) DEFAULT NULL,
  `Nom_Porte_Porte` varchar(10) DEFAULT NULL,
  `Id_Salle_Salle` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_Porte_Porte`),
  KEY `FK_Porte_Id_Salle_Salle` (`Id_Salle_Salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prises`
--

DROP TABLE IF EXISTS `prises`;
CREATE TABLE IF NOT EXISTS `prises` (
  `Id_Prise_Prises` bigint NOT NULL AUTO_INCREMENT,
  `Numero` int DEFAULT NULL,
  `Etat` varchar(3) DEFAULT NULL,
  `Id_PDU_PDU` bigint DEFAULT NULL,
  `ID_Utilisateur_Utilisateur` bigint DEFAULT NULL,
  PRIMARY KEY (`Id_Prise_Prises`),
  KEY `FK_Prises_Id_PDU_PDU` (`Id_PDU_PDU`),
  KEY `FK_Prises_ID_Utilisateur_Utilisateur` (`ID_Utilisateur_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualite`
--

DROP TABLE IF EXISTS `qualite`;
CREATE TABLE IF NOT EXISTS `qualite` (
  `Id_Qualite_Qualite` bigint NOT NULL AUTO_INCREMENT,
  `Metier_Qualite` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Qualite_Qualite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qualite`
--

INSERT INTO `qualite` (`Id_Qualite_Qualite`, `Metier_Qualite`) VALUES
(1, 'Opérateur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `Id_Salle_Salle` bigint NOT NULL AUTO_INCREMENT,
  `Nom_Salle_Salle` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Salle_Salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_Utilisateur_Utilisateur` bigint NOT NULL AUTO_INCREMENT,
  `Login_Utilisateur` varchar(20) DEFAULT NULL,
  `Mot_de_passe` varchar(25) DEFAULT NULL,
  `Debut_Travaille` varchar(20) DEFAULT NULL,
  `Fin_Travaille_Utilisateur` varchar(20) DEFAULT NULL,
  `Nom_Utilisateur_Utilisateur` varchar(25) DEFAULT NULL,
  `Email_Utilisateur_Utilisateur` varchar(25) DEFAULT NULL,
  `Id_Entreprise_Entreprise` bigint DEFAULT NULL,
  `badge_id_badge_badge` bigint DEFAULT NULL,
  `Id_Qualite_Qualite` bigint DEFAULT NULL,
  PRIMARY KEY (`ID_Utilisateur_Utilisateur`),
  KEY `FK_Utilisateur_Id_Entreprise_Entreprise` (`Id_Entreprise_Entreprise`),
  KEY `FK_Utilisateur_badge_id_badge_badge` (`badge_id_badge_badge`),
  KEY `FK_Utilisateur_Id_Qualite_Qualite` (`Id_Qualite_Qualite`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur_Utilisateur`, `Login_Utilisateur`, `Mot_de_passe`, `Debut_Travaille`, `Fin_Travaille_Utilisateur`, `Nom_Utilisateur_Utilisateur`, `Email_Utilisateur_Utilisateur`, `Id_Entreprise_Entreprise`, `badge_id_badge_badge`, `Id_Qualite_Qualite`) VALUES
(1, 'Karioto.POA', 'sdgc', '11h00', '19h00', 'Kali', 'kali@gmail.com', 1, 1, 1),
(2, 'Maria', 'test', '10h30', '18h30', 'marie', 'marie@gmail.com', 1, 1, 2),
(3, 'Nio', '$2y$10$BGIuoQeSR0H0Vl1IJA', '12:40', '16:20', 'Patricia', 'Patricia@gmail.com', 1, 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `badge`
--
ALTER TABLE `badge`
  ADD CONSTRAINT `FK_Badge_utilisateur_id_utilisateur_utilisateur` FOREIGN KEY (`utilisateur_id_utilisateur_utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur_Utilisateur`);

--
-- Contraintes pour la table `baies`
--
ALTER TABLE `baies`
  ADD CONSTRAINT `FK_Baies_Id_Salle_Salle` FOREIGN KEY (`Id_Salle_Salle`) REFERENCES `salle` (`Id_Salle_Salle`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `FK_Capteur_Id_Salle_Salle` FOREIGN KEY (`Id_Salle_Salle`) REFERENCES `salle` (`Id_Salle_Salle`);

--
-- Contraintes pour la table `mesure_pdu`
--
ALTER TABLE `mesure_pdu`
  ADD CONSTRAINT `FK_Mesure_PDU_Id_PDU_PDU` FOREIGN KEY (`Id_PDU_PDU`) REFERENCES `pdu` (`Id_PDU_PDU`);

--
-- Contraintes pour la table `pdu`
--
ALTER TABLE `pdu`
  ADD CONSTRAINT `FK_PDU_ID_Baie_Baies` FOREIGN KEY (`ID_Baie_Baies`) REFERENCES `baies` (`ID_Baie_Baies`);

--
-- Contraintes pour la table `porte`
--
ALTER TABLE `porte`
  ADD CONSTRAINT `FK_Porte_Id_Salle_Salle` FOREIGN KEY (`Id_Salle_Salle`) REFERENCES `salle` (`Id_Salle_Salle`);

--
-- Contraintes pour la table `prises`
--
ALTER TABLE `prises`
  ADD CONSTRAINT `FK_Prises_Id_PDU_PDU` FOREIGN KEY (`Id_PDU_PDU`) REFERENCES `pdu` (`Id_PDU_PDU`),
  ADD CONSTRAINT `FK_Prises_ID_Utilisateur_Utilisateur` FOREIGN KEY (`ID_Utilisateur_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur_Utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_badge_id_badge_badge` FOREIGN KEY (`badge_id_badge_badge`) REFERENCES `badge` (`Id_Badge_Badge`),
  ADD CONSTRAINT `FK_Utilisateur_Id_Entreprise_Entreprise` FOREIGN KEY (`Id_Entreprise_Entreprise`) REFERENCES `entreprise` (`Id_Entreprise_Entreprise`),
  ADD CONSTRAINT `FK_Utilisateur_Id_Qualite_Qualite` FOREIGN KEY (`Id_Qualite_Qualite`) REFERENCES `qualite` (`Id_Qualite_Qualite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
