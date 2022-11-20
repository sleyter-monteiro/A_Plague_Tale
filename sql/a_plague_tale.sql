-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 20 nov. 2022 à 19:34
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `a_plague_tale`
--
CREATE DATABASE IF NOT EXISTS `a_plague_tale` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `a_plague_tale`;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(255) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` char(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `objet`, `mail`, `telephone`, `message`) VALUES
(1, 'Sleyter', 'Je testeeee', 'sleyter@sleyter.fr', '0699746092', 'sdssqdqsdqsdqsdqsdqsdqdsdqsdqsdqsdqsdsqdsdqsdqsd'),
(2, 'Sleyter', 'Je testeeee', 'sleyter@sleyter.fr', '0699746092', 'sdssqdqsdqsdqsdqsdqsdqdsdqsdqsdqsdqsdsqdsdqsdqsd'),
(3, 'Sleyter', 'TESTTT', 'sleyter@sleyter.fr', '0699999999', 'asjfdiusdfuigdfaguyidqfsuygiqcsugiqdsciugdqcvuqgisdcugqscugqsdcguiqscugsqcugqcsqucsgiuqcgsi'),
(4, 'Sleyter', 'TESTTT', 'sleyter@sleyter.fr', '0699999999', 'asjfdiusdfuigdfaguyidqfsuygiqcsugiqdsciugdqcvuqgisdcugqscugqsdcguiqscugsqcugqcsqucsgiuqcgsi'),
(5, 'Monteiro', 'Faridi', 'sleyter@sleyter.fr', '099999999', 'iyqdscugdqfhudfquhoqdfhuoqdfsuhodfsquhodqsuohiqsfhuofsq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
