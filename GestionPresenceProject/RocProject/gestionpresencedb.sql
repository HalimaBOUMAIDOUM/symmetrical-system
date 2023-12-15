-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 déc. 2023 à 09:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionpresencedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `IDCours` int(11) NOT NULL,
  `NomCours` varchar(50) DEFAULT NULL,
  `IdProfesseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `adresse_mac` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `Prenom`, `email`, `adresse_mac`) VALUES
(1, 'Halima', NULL, NULL, NULL),
(2, 'Test1', 'Test11', 'Test1@gmail.com', NULL),
(3, 'test23', 'test23', 'test23@gmail.com', NULL),
(4, 'test23', 'test23', 'test23@gmail.com', NULL),
(5, 'test23', 'test23', 'test23@gmail.com', NULL),
(6, '', '', '', NULL),
(7, '', '', '', NULL),
(8, '77test23', 'test237777', 'test23@gmail.com', NULL),
(9, '77test23', 'test237777', 'test23@gmail.com', NULL),
(10, '79997test23', 'test237777', 'test23@gmail.com', NULL),
(11, 'boumaidoum', 'halima', 'halima.boumaidoum@gmail.com', NULL),
(12, 'boumaidoum', 'halima', 'halima.boumaidoum@gmail.com', NULL),
(13, 'boumaidoum', 'halima', 'halima.boumaidoum@gmail.com', NULL),
(14, 'harakat', 'fatima', 'halima.boumaidoum@gmail.com', NULL),
(15, '79997test23', 'test237777', 'test23@gmail.com', NULL),
(16, 'fquihi', 'aya', 'aya.fquihi@gmail.com', NULL),
(17, 'houssammmm', 'test237777', 'test23@gmail.com', NULL),
(18, 'houssammmm', 'test237777', 'test23@gmail.com', NULL),
(19, 'ayoubbbbb', 'test237777', 'test23@gmail.com', NULL),
(20, 'ayoubbbbb', 'test237777', 'test23@gmail.com', NULL),
(21, 'ayoubbbbb', 'test237777', 'test23@gmail.com', NULL),
(22, 'ALAE', 'test237777', 'test23@gmail.com', NULL),
(23, 'SAMIIII', 'test237777', 'test23@gmail.com', '9876235789'),
(24, 'FQUIHI', 'SAMAH', 'SAMAH.FQUI', '02:00:00:00:00:00'),
(25, 'FQUIHI', 'SAMAH', 'SAMAH.FQUI', '02:00:00:00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `PresenceID` int(11) NOT NULL,
  `EtudiantID` int(11) DEFAULT NULL,
  `SessionID` int(11) DEFAULT NULL,
  `DateHeure` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `IDEnseignant` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `iscordinateur` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessioncours`
--

CREATE TABLE `sessioncours` (
  `SessionID` int(11) NOT NULL,
  `IDCours` int(11) DEFAULT NULL,
  `salle` varchar(50) DEFAULT NULL,
  `horaire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`IDCours`),
  ADD KEY `IdProfesseur` (`IdProfesseur`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`PresenceID`),
  ADD KEY `EtudiantID` (`EtudiantID`),
  ADD KEY `SessionID` (`SessionID`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`IDEnseignant`);

--
-- Index pour la table `sessioncours`
--
ALTER TABLE `sessioncours`
  ADD PRIMARY KEY (`SessionID`),
  ADD KEY `IDCours` (`IDCours`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `IDCours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `PresenceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `IDEnseignant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sessioncours`
--
ALTER TABLE `sessioncours`
  MODIFY `SessionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`IdProfesseur`) REFERENCES `professeur` (`IDEnseignant`);

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `presence_ibfk_1` FOREIGN KEY (`EtudiantID`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `presence_ibfk_2` FOREIGN KEY (`SessionID`) REFERENCES `sessioncours` (`SessionID`);

--
-- Contraintes pour la table `sessioncours`
--
ALTER TABLE `sessioncours`
  ADD CONSTRAINT `sessioncours_ibfk_1` FOREIGN KEY (`IDCours`) REFERENCES `cours` (`IDCours`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
