-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 mars 2022 à 03:02
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
  `size` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2147 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `nom`, `type`, `path`, `size`) VALUES
(2107, 'iStock-1278315370-758x426.jpg', 'jpg ', 'docs/dir2/iStock-1278315370-758x426.jpg', 82616),
(2108, 'vegetable-3559112_1920-1024x577.png', 'png ', 'docs/dir2/vegetable-3559112_1920-1024x577.png', 109710),
(2109, 'yams-1557440_1920-1024x687.jpg', 'jpg ', 'docs/dir2/yams-1557440_1920-1024x687.jpg', 76691),
(2111, 'slide5-durian-durio-zibethinus-Lam2-03-main-12365052.png', 'png ', 'docs/dir3/dir3.1/dir3.1.1/slide5-durian-durio-zibethinus-Lam2-03-main-12365052.png', 70159),
(2145, 'iStock-1202274909-758x379.png', 'png ', 'docs/iStock-1202274909-758x379.png', 77664),
(2146, 'iStock-1277110221-758x379.png', 'png ', 'docs/iStock-1277110221-758x379.png', 93327),
(2144, 'lychee-419611_1920-1024x681.png', 'png ', 'docs/dir3/lychee-419611_1920-1024x681.png', 58218),
(2143, 'kiwano-2128077_1920-1024x576.jpg', 'jpg ', 'docs/dir3/kiwano-2128077_1920-1024x576.jpg', 102405),
(2142, 'iStock-1283279353-758x426.png', 'png ', 'docs/dir3/iStock-1283279353-758x426.png', 82127),
(2141, 'iStock-1279674489-758x426.jpg', 'jpg ', 'docs/dir3/iStock-1279674489-758x426.jpg', 45736),
(2140, 'slide2-jujube-zizyphus-jujuba-retouche-main-12365055.jpg', 'jpg ', 'docs/dir3/dir3.1/slide2-jujube-zizyphus-jujuba-retouche-main-12365055.jpg', 46127),
(2139, 'pomegranate-3383814_1920-1024x680.png', 'png ', 'docs/dir3/dir3.1/pomegranate-3383814_1920-1024x680.png', 108124),
(2137, 'slide6-Physalis-peruviana-LAM1-main-12365074.jpg', 'jpg ', 'docs/dir3/dir3.1/dir3.1.1/slide6-Physalis-peruviana-LAM1-main-12365074.jpg', 58094);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'f2i', 'F2I'),
(2, 'root', 'root');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
