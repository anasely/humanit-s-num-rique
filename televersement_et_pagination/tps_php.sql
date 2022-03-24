-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 mars 2022 à 00:52
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tps_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

DROP TABLE IF EXISTS `fichiers`;
CREATE TABLE IF NOT EXISTS `fichiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type` varchar(15) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `nom`, `type`, `path`, `size`) VALUES
(36, 'kiwano-2128077_1920-1024x576.jpg', 'jpg ', 'photo/kiwano-2128077_1920-1024x576.jpg', 102405),
(35, 'iStock-1277110221-758x379.png', 'png ', 'photo/iStock-1277110221-758x379.png', 93327),
(34, 'slide2-jujube-zizyphus-jujuba-retouche-main-12365055.jpg', 'jpg ', 'photo/slide2-jujube-zizyphus-jujuba-retouche-main-12365055.jpg', 46127),
(31, 'iStock-1279674489-758x426.jpg', 'jpg ', 'photo/iStock-1279674489-758x426.jpg', 45736),
(32, 'iStock-1283279353-758x426.png', 'png ', 'photo/iStock-1283279353-758x426.png', 82127),
(33, 'lychee-419611_1920-1024x681.png', 'png ', 'photo/lychee-419611_1920-1024x681.png', 58218),
(29, 'slide8-papaye-carica-retouche-main-12365051.jpg', 'jpg ', 'photo/slide8-papaye-carica-retouche-main-12365051.jpg', 69253),
(28, 'slide5-durian-durio-zibethinus-Lam2-03-main-12365052.png', 'png ', 'photo/slide5-durian-durio-zibethinus-Lam2-03-main-12365052.png', 70159);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
