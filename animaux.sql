-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 11 Février 2017 à 12:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `animaux`
--
CREATE DATABASE IF NOT EXISTS `animaux` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `animaux`;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `fur` varchar(100) DEFAULT NULL,
  `scale` varchar(100) DEFAULT NULL,
  `feathers` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id`, `nom`, `categorie`, `fur`, `scale`, `feathers`) VALUES
(1, 'un lion', 'mamifere', 'jaune', NULL, NULL),
(2, 'un anaconda', 'reptile', NULL, 'lisses', NULL),
(3, 'un toucan', 'oiseau', NULL, NULL, 'multicolore'),
(5, 'un iguane', 'reptile', NULL, 'pointues', NULL),
(6, 'une hyène', 'mamifere', 'grise', NULL, NULL),
(7, 'un pivert', 'oiseau', NULL, NULL, 'vert');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
