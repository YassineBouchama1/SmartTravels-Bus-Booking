-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 jan. 2024 à 09:41
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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
  `email` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL
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
  `Numero_de_bus` int(11) NOT NULL,
  `busNumber` varchar(20) DEFAULT NULL,
  `Plaque_immatriculation` varchar(20) DEFAULT NULL,
  `Capacite` int(11) DEFAULT NULL,
  `Company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bus`
--

INSERT INTO `bus` (`Numero_de_bus`, `busNumber`, `Plaque_immatriculation`, `Capacite`, `Company_id`) VALUES
(18, 'BUS002', 'XYZ456', 40, 33),
(22, 'BUS22', 'BUS002BUS002', 100, 33),
(24, 'BUS003', 'BUS002BUS002', 1500, 35),
(25, 'BUS0056', 'BUS002BUS002', 200, 36),
(27, 'b300', '0415', 151, 33),
(29, 'b20', '51515', 120, 35);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 1,
  `date_created` datetime DEFAULT current_timestamp(),
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Bio` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
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
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure_depart` time DEFAULT NULL,
  `Heure_arrivee` time DEFAULT NULL,
  `Sieges_disponibles` int(11) DEFAULT NULL,
  `ID_Bus` int(11) DEFAULT NULL,
  `ID_Route` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`ID`, `Date`, `Heure_depart`, `Heure_arrivee`, `Sieges_disponibles`, `ID_Bus`, `ID_Route`, `price`) VALUES
(16, '2023-12-28', '16:07:00', '20:07:00', 100, 18, 12, 150.00),
(18, '2023-12-28', '19:01:00', '22:01:00', 200, 25, 12, 95.00),
(19, '2023-12-28', '09:03:00', '13:03:00', 20, 25, 12, 166.00),
(20, '2023-12-28', '13:03:00', '16:03:00', 20, 25, 12, 166.00),
(21, '2023-12-28', '09:01:00', '11:01:00', 200, 25, 12, 95.00),
(22, '2023-12-28', '01:07:00', '05:07:00', 100, 18, 12, 150.00),
(25, '2023-12-31', '14:42:00', '16:42:00', 10, 24, 12, 150.00),
(26, '2023-12-31', '11:57:00', '17:57:00', 15, 29, 12, 150.00);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `recipient_type` enum('admin','operator','client') DEFAULT NULL,
  `time_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `operator`
--

CREATE TABLE `operator` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 1,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `operator`
--

INSERT INTO `operator` (`email`, `password`, `inactive`, `company_id`) VALUES
('yasm0251in@gmail.jcom', '2', 1, 33),
('yasmidn@gmail.jcom', '2', 1, 36),
('yasmin@gmail.jcom', '1', 1, 35),
('yrthasmin@gmail.jcom', 'u', 1, 36);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `email_client` varchar(255) DEFAULT NULL,
  `ID_Horaire` int(11) DEFAULT NULL,
  `number_seat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

CREATE TABLE `route` (
  `ID` int(11) NOT NULL,
  `Ville_depart` varchar(50) DEFAULT NULL,
  `Ville_destination` varchar(50) DEFAULT NULL,
  `Distance` int(11) DEFAULT NULL,
  `Duree` varchar(20) DEFAULT NULL
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `Numero_de_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
