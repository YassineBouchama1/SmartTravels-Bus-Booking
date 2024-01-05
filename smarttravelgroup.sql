-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 05 jan. 2024 à 15:07
-- Version du serveur : 8.0.35
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smarttravelgroup`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('islam@gmail.com', '1');

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE `bus` (
  `Numero_de_bus` int NOT NULL,
  `busNumber` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Plaque_immatriculation` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Capacite` int DEFAULT NULL,
  `Company_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bus`
--

INSERT INTO `bus` (`Numero_de_bus`, `busNumber`, `Plaque_immatriculation`, `Capacite`, `Company_id`) VALUES
(18, 'BUS002', 'XYZ456', 40, 33),
(22, 'BUS22', 'BUS002BUS002', 100, 33),
(24, 'BUS003', 'BUS002BUS002', 1500, 35),
(25, 'BUS0056', 'BUS002BUS002', 10, 36),
(27, 'b300', '0415', 151, 33),
(29, 'b20', '51515', 9, 35);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT '1',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `points` int DEFAULT '0',
  `is_client` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`email`, `password`, `inactive`, `date_created`, `points`, `is_client`) VALUES
('5555dddd@gmail.jcom', NULL, 1, '2024-01-03 16:14:13', 0, 0),
('cocg;qil.com', NULL, 1, '0000-00-00 00:00:00', 0, 0),
('document.getElementById(\"inputEmail\").value', NULL, 1, '2024-01-05 15:21:29', 0, 0),
('hhh@hhh.com', 'jj', 1, '2024-01-05 15:07:36', 0, 1),
('islam@gmail.com', '1', 1, '2024-01-02 14:02:04', 0, 1),
('islamgg757@gmail.com', NULL, 1, '2024-01-04 12:26:09', 0, 0),
('islamuhuyg@gmail.com', NULL, 1, '2024-01-03 14:37:00', 0, 0),
('islsqdam@gmail.com', NULL, 1, '2024-01-03 10:21:11', 0, 0),
('jijzd@gzhdjij', NULL, 1, NULL, 0, 0),
('kamal.111karim19988@gmail.com', NULL, 1, '2024-01-04 09:53:44', 0, 0),
('kamal.kari788m19988@gmail.com', NULL, 1, '2024-01-04 09:55:21', 0, 0),
('kamal.karim19988@gmail.com', '1', 1, '2024-01-04 09:44:25', 0, 0),
('kamal.karim199k88@gmail.com', NULL, 1, '2024-01-04 09:56:36', 0, 0),
('kamal.karim19klhuh988@gmail.com', NULL, 1, '2024-01-04 10:16:17', 0, 0),
('kamal@gmail.com', '1', 1, '2024-01-02 12:27:14', 0, 1),
('kamalislam@gmail.com', NULL, 1, NULL, 0, 0),
('mahadaiki2@gmail.com', '123', 1, '2024-01-05 15:08:02', 150, 1),
('qzd@gmail.com', NULL, 1, '2024-01-04 13:58:56', 0, 0),
('yahgvtdrsmin@gmail.jcom', NULL, 1, '2024-01-03 16:05:10', 0, 0),
('yahjvfgtfsmin@gmail.jcom', NULL, 1, '2024-01-03 15:49:24', 0, 0),
('yandbvfhejsmin@gmail.jcom', NULL, 1, '2024-01-03 12:27:33', 0, 0),
('yanjkuhyusmin@gmail.jcom', NULL, 1, '2024-01-03 16:07:10', 0, 0),
('yas10000000min@gmail.jcom', NULL, 1, '2024-01-03 15:20:04', 0, 0),
('yasbgyugmin@gmail.jcom', NULL, 1, '2024-01-03 15:57:20', 0, 0),
('yasdmin@gmail.jcom', NULL, 1, '2024-01-03 12:07:25', 0, 0),
('yasdssefcmin@gmail.jcom', NULL, 1, '2024-01-03 15:30:19', 0, 0),
('yasgdrtmin@gmail.jcom', NULL, 1, '2024-01-03 16:09:10', 0, 0),
('yasghftymin@gmail.jcom', NULL, 1, '2024-01-03 16:06:12', 0, 0),
('yasgytyuftrdmin@gmail.jcom', NULL, 1, '2024-01-03 14:40:19', 0, 0),
('yashgjnmin@gmail.jcom', NULL, 1, '2024-01-03 11:27:23', 0, 0),
('yashgytftrdmin@gmail.jcom', NULL, 1, '2024-01-03 16:03:04', 0, 0),
('yasjhgyhugftfmin@gmail.jcom', NULL, 1, '2024-01-03 15:48:22', 0, 0),
('yasjhjhmin@gmail.jcom', NULL, 1, '2024-01-03 12:16:10', 0, 0),
('yasjhuhguymin@gmail.jcom', NULL, 1, '2024-01-03 12:05:44', 0, 0),
('yasjhuhumin@gmail.jcom', NULL, 1, '2024-01-03 15:55:47', 0, 0),
('yasjnhtfmin@gmail.jcom', NULL, 1, '2024-01-03 16:00:26', 0, 0),
('yasJREHUmin@gmail.jcom', NULL, 1, '2024-01-03 14:50:51', 0, 0),
('yasmi@gmail.jcom', NULL, 1, '2024-01-05 10:00:08', 0, 0),
('yasmin@gmail.jcom', '12', 1, '2024-01-03 08:53:08', 0, 1),
('yasminjehf@gmail.jcom', '1', 1, '0000-00-00 00:00:00', 0, 1),
('yasmiugyutyun@gmail.jcom', NULL, 1, '2024-01-03 16:08:46', 0, 0),
('yasmscsin@gmail.jcom', NULL, 1, '2024-01-03 11:24:52', 0, 0),
('yasmssssssddin@gmail.jcom', NULL, 1, '2024-01-03 16:15:02', 0, 0),
('yasrgremin@gmail.jcom', NULL, 1, '2024-01-03 15:26:36', 0, 0),
('yasrzegtmin@gmail.jcom', NULL, 1, '2024-01-03 12:28:50', 0, 0),
('yassssssmin@gmail.jcom', NULL, 1, '2024-01-03 12:08:34', 0, 0),
('yaswsmin@gmail.jcom', NULL, 1, '2024-01-03 16:10:56', 0, 0),
('yauhutysmin@gmail.jcom', NULL, 1, '2024-01-03 14:37:28', 0, 0),
('yknhjbygasmin@gmail.jcom', NULL, 1, '2024-01-03 12:03:54', 0, 0),
('ysddsdasmin@gmail.jcom', NULL, 1, '2024-01-03 12:30:37', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Bio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `Bio`, `img`) VALUES
(33, ' CTM - ستيام', '\r\nCTM - ستيام', 'public/Dashboard/photo_Company/image_658c2975d58fd2.68751187.jpg'),
(35, 'Voyages Arrahman - أسفار الرحمان', 'Voyages Arrahman - أسفار الرحمان', 'public/Dashboard/photo_Company/image_658c29af85b305.21815617.jpg'),
(36, 'LIBRA TOURS - الكشاف السريع', 'LIBRA TOURS - الكشاف السريع', 'public/Dashboard/photo_Company/image_658c29e4e01a36.85353889.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `ID` int NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure_depart` time DEFAULT NULL,
  `Heure_arrivee` time DEFAULT NULL,
  `Sieges_disponibles` int DEFAULT NULL,
  `ID_Bus` int DEFAULT NULL,
  `ID_Route` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`ID`, `Date`, `Heure_depart`, `Heure_arrivee`, `Sieges_disponibles`, `ID_Bus`, `ID_Route`, `price`) VALUES
(16, '2023-12-28', '16:07:00', '20:07:00', 100, 18, 12, 150.00),
(20, '2023-12-28', '13:03:00', '16:03:00', 20, 25, 12, 166.00),
(25, '2023-12-31', '14:42:00', '16:42:00', 10, 25, 12, 150.00),
(26, '2023-12-31', '11:57:00', '17:57:00', 15, 29, 12, 150.00);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `content` longtext COLLATE utf8mb4_general_ci,
  `recipient_id` int DEFAULT NULL,
  `recipient_type` enum('admin','operator','client') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `content`, `recipient_id`, `recipient_type`, `time_created`) VALUES
(26, 'one order by  qzd@gmail.com   seat : 3', 36, 'operator', '2024-01-04 13:58:56'),
(27, 'one order by  kamal.karim19988@gmail.com   seat : 16', 36, 'operator', '2024-01-04 14:05:50'),
(28, 'one order by  yasmi@gmail.jcom   seat : 10', 36, 'operator', '2024-01-04 14:31:32'),
(29, 'one order by  yasmi@gmail.jcom   seat : 4', 36, 'operator', '2024-01-04 14:38:52'),
(30, 'one order by  yasmi@gmail.jcom   seat : 8', 36, 'operator', '2024-01-04 14:39:22'),
(31, 'one order by  yasmi@gmail.jcom   seat : 2', 36, 'operator', '2024-01-04 14:39:33'),
(33, 'one order by  yasmi@gmail.jcom   seat : 3', 33, 'operator', '2024-01-04 14:44:53'),
(34, 'one order by  yasmi@gmail.jcom   seat : 2', 33, 'operator', '2024-01-04 14:51:13'),
(35, 'one order by  yasmi@gmail.jcom   seat : 8', 36, 'operator', '2024-01-04 15:18:16'),
(36, 'one order by  yasmi@gmail.jcom   seat : 1', 36, 'operator', '2024-01-04 15:18:42'),
(38, 'one order by  yasmi@gmail.jcom   seat : 3', 36, 'operator', '2024-01-04 15:52:00'),
(39, 'one order by  yasmi@gmail.jcom   seat : 4', 36, 'operator', '2024-01-04 15:52:07'),
(40, 'one order by  yasmi@gmail.jcom   seat : 1', 36, 'operator', '2024-01-04 15:52:15'),
(41, 'one order by  yasmi@gmail.jcom   seat : 7', 36, 'operator', '2024-01-04 15:52:21'),
(42, 'one order by  yasmi@gmail.jcom   seat : 8', 36, 'operator', '2024-01-04 15:52:28'),
(43, 'one order by  yasmi@gmail.jcom   seat : 6', 36, 'operator', '2024-01-04 15:52:36'),
(44, 'one order by  yasmi@gmail.jcom   seat : 5', 36, 'operator', '2024-01-04 15:52:44'),
(45, 'one order by  yasmi@gmail.jcom   seat : 2', 36, 'operator', '2024-01-04 15:52:52'),
(46, 'one order by  yasmi@gmail.jcom   seat : 9', 36, 'operator', '2024-01-04 15:53:00'),
(47, 'one order by  yasmi@gmail.jcom   seat : 10', 36, 'operator', '2024-01-04 15:53:24'),
(51, 'is full', 36, 'operator', '2024-01-04 15:55:29'),
(52, 'is full', 36, 'operator', '2024-01-04 15:55:29'),
(53, 'one order by  yasmi@gmail.jcom   seat : 5', 36, 'operator', '2024-01-04 15:59:20'),
(54, 'is full', 36, 'operator', '2024-01-04 16:00:18'),
(55, 'one order by  yasmi@gmail.jcom   seat : 9', 36, 'operator', '2024-01-04 16:00:18'),
(56, 'is full', 36, 'operator', '2024-01-04 16:15:44'),
(57, 'one order by  yasmi@gmail.jcom   seat : 5', 36, 'operator', '2024-01-04 16:15:44'),
(58, 'is full', 36, 'operator', '2024-01-04 16:16:48'),
(59, 'one order by  yasmi@gmail.jcom   seat : 3', 36, 'operator', '2024-01-04 16:16:48'),
(60, 'is full 20', 36, 'operator', '2024-01-04 16:17:39'),
(61, 'one order by  yasmi@gmail.jcom   seat : 4', 36, 'operator', '2024-01-04 16:17:39'),
(62, 'one order by  yasmi@gmail.jcom   seat : 4', 33, 'operator', '2024-01-05 09:37:11'),
(63, 'one order by  yasmi@gmail.jcom   seat : 4', 33, 'operator', '2024-01-05 10:00:08'),
(64, 'one order by  mahadaiki2@gmail.com   seat : 2', 33, 'operator', '2024-01-05 15:19:59'),
(65, 'one order by  document.getElementById(\"inputEmail\").value   seat : 3', 33, 'operator', '2024-01-05 15:21:29');

-- --------------------------------------------------------

--
-- Structure de la table `operator`
--

CREATE TABLE `operator` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT '1',
  `company_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `operator`
--

INSERT INTO `operator` (`email`, `password`, `inactive`, `company_id`) VALUES
('yasm0251in@gmail.jcom', '2', 1, 33),
('yasmidn@gmail.jcom', '2', 1, 36),
('yasmin@gmail.jcom', '1', 1, 35);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `email_client` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Horaire` int DEFAULT NULL,
  `number_seat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `email_client`, `ID_Horaire`, `number_seat`) VALUES
(90, 'mahadaiki2@gmail.com', 16, 2);

--
-- Déclencheurs `reservation`
--
DELIMITER $$
CREATE TRIGGER `after_reservation_cancel` AFTER DELETE ON `reservation` FOR EACH ROW BEGIN
  DECLARE res_price DECIMAL(10,2);

  SELECT price INTO res_price FROM horaire WHERE ID = OLD.ID_horaire;

  UPDATE client
  SET points = points - res_price
  WHERE email = OLD.email_client;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_reservation_done` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN 
  DECLARE res_price DECIMAL(10,2);

  SELECT price INTO res_price FROM horaire WHERE ID = NEW.ID_horaire;

  UPDATE client 
  SET points = points + res_price
  WHERE email = NEW.email_client;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

CREATE TABLE `route` (
  `ID` int NOT NULL,
  `Ville_depart` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ville_destination` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Distance` int DEFAULT NULL,
  `Duree` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `route`
--

INSERT INTO `route` (`ID`, `Ville_depart`, `Ville_destination`, `Distance`, `Duree`) VALUES
(6, 'Agadir', 'Safi', 150, '10'),
(11, 'Marrakech', 'Safi', 200, '20'),
(12, 'Safi', 'Agadir', 155, '20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Numero_de_bus`),
  ADD KEY `Company_id` (`Company_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `horaire_ibfk_1` (`ID_Bus`),
  ADD KEY `horaire_ibfk_2` (`ID_Route`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Index pour la table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`email`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_client` (`email_client`),
  ADD KEY `ID_Horaire` (`ID_Horaire`);

--
-- Index pour la table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bus`
--
ALTER TABLE `bus`
  MODIFY `Numero_de_bus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`ID_Bus`) REFERENCES `bus` (`Numero_de_bus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horaire_ibfk_2` FOREIGN KEY (`ID_Route`) REFERENCES `route` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`recipient_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`email_client`) REFERENCES `client` (`email`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ID_Horaire`) REFERENCES `horaire` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
