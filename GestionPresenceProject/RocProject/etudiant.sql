-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 déc. 2023 à 10:24
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
(14, 'harakat', 'fatima', 'halima.boumaidoum@gmail.com', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
