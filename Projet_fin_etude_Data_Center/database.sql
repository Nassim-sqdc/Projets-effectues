-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 avr. 2025 à 17:52
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
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` bigint NOT NULL AUTO_INCREMENT,
  `user_login` varchar(25) DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `job_start` datetime DEFAULT NULL,
  `job_end` datetime DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `user_email` varchar(25) DEFAULT NULL,
  `ID_enterprise` bigint DEFAULT NULL,
  `badge_id_badge` bigint DEFAULT NULL,
  `ID_Quality` bigint DEFAULT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `ID_enterprise` (`ID_enterprise`),
  KEY `badge_id_badge` (`badge_id_badge`),
  KEY `ID_Quality` (`ID_Quality`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `user_login`, `user_password`, `job_start`, `job_end`, `username`, `user_email`, `ID_enterprise`, `badge_id_badge`, `ID_Quality`) VALUES
(1, 'admin', '$2y$10$9absySHxRRoKPX3id0JyLuMlTT/2KiIoMXWDaT3uoYJjDxsHEMUjq', '2025-04-24 00:00:00', '2025-04-24 00:00:00', 'admin', 'admin@gmail.com', 1, 2, 1),
(2, 'client', '$2y$10$82nPlhtEZ/vJOyZRvuR9c.oph4UtqoGL01j35EhIJMLCSCJvDuRPO', '2025-04-25 00:00:00', '2025-04-29 00:00:00', 'client', 'client@gmail.com', 1, 1, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_enterprise`) REFERENCES `enterprise` (`ID_enterprise`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`badge_id_badge`) REFERENCES `badge` (`ID_badge`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`ID_Quality`) REFERENCES `quality` (`ID_quality`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
