-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 06 Octobre 2023 à 04:38
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smiley`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `vert` int(11) NOT NULL DEFAULT '0',
  `jaune` int(11) NOT NULL DEFAULT '0',
  `rouge` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `date`, `lieu`, `nom`, `dept`, `vert`, `jaune`, `rouge`) VALUES
(1, '2022-06-08', 'allo', 'allo', 'anglais', 7, 8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`) VALUES
(1, 'bruski', 'dde9ef374e36749afa42b9a2c6e01e80d48d9293'),
(2, '', 'ffa6706ff2127a749973072756f83c532e43ed02'),
(3, 'boohoo', 'e029e41f4e015e2ea604a0d81a05a05186f15b03'),
(4, 'bamm', 'bim'),
(7, 'camarche', '5898fc860300e228dcd54c0b1045b5fa0dcda502'),
(11, 'hummmm', '5898fc860300e228dcd54c0b1045b5fa0dcda502');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
