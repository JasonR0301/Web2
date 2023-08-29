-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 29 Août 2023 à 21:39
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `joueurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `hockey`
--

CREATE TABLE `hockey` (
  `url` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `numero` int(2) DEFAULT NULL,
  `age` int(2) NOT NULL,
  `ppg` decimal(4,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='Joueurs de Hockey';

--
-- Contenu de la table `hockey`
--

INSERT INTO `hockey` (`url`, `id`, `nom`, `numero`, `age`, `ppg`) VALUES
('img/cole22.jpg', 1, 'Cole Caufield', 22, 22, '0.683'),
('img/zegras11.jpg', 2, 'Trevor Zegras', 11, 22, '0.772'),
('img/hughes86.jpg', 3, 'Jack Hughes', 86, 22, '0.848'),
('img/newhook15.jpg', 4, 'Alex Newhook', 15, 22, '0.415'),
('img/byram4.jpg', 5, 'Bowen Byram', 4, 22, '0.473'),
('img/kakko24.jpg', 6, 'Kaapo Kakko', 24, 22, '0.410'),
('img/dach77.jpg', 7, 'Kirby Dach', 77, 22, '0.462');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `hockey`
--
ALTER TABLE `hockey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `hockey`
--
ALTER TABLE `hockey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
