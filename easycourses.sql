-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Avril 2016 à 10:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `easycourses`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit du catalogue',
  `nom` varchar(20) NOT NULL COMMENT 'nom du produit',
  `idCategorie` int(11) NOT NULL COMMENT 'id de la categorie, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la categorie',
  `nom` varchar(20) NOT NULL COMMENT 'nom de la categorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `listes`
--

CREATE TABLE IF NOT EXISTS `listes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la liste',
  `nom` varchar(20) NOT NULL COMMENT 'nom',
  `complete` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si la liste est complete',
  `idAuteur` int(11) NOT NULL COMMENT 'id de users, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produitsfrigo`
--

CREATE TABLE IF NOT EXISTS `produitsfrigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit du frigo',
  `idProduitsliste` int(11) NOT NULL COMMENT 'id du produit dans la liste, clé etrangere',
  `quantite` int(50) DEFAULT NULL COMMENT 'quantite du produit',
  `idProduitscatalogue` int(11) NOT NULL COMMENT 'id de produitscatalogue, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produitsliste`
--

CREATE TABLE IF NOT EXISTS `produitsliste` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit',
  `idListe` int(11) NOT NULL COMMENT 'id de liste, clé etrangere',
  `idProduitscatalogue` int(11) NOT NULL COMMENT 'id de produitscatalogue, clé etrangere',
  `quantite` int(50) DEFAULT NULL COMMENT 'quantite du produit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la question',
  `label` varchar(50) NOT NULL COMMENT 'question',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `label`) VALUES
(1, 'Quel est le nom de jeune fille de votre mère ?'),
(2, 'Quel est le nom de votre premier animal de compagn'),
(3, 'Quelle est le nom de votre sportif prefere ?'),
(4, 'Quel est le nom de votre artiste prefere ?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `nom` varchar(20) NOT NULL COMMENT 'nom',
  `prenom` varchar(20) NOT NULL COMMENT 'prenom',
  `pseudo` varchar(20) NOT NULL COMMENT 'pseudo pour connexion',
  `passe` varchar(20) NOT NULL COMMENT 'mot de passe',
  `idQuestion` int(11) NOT NULL COMMENT 'question pour securite',
  `reponse` varchar(30) NOT NULL COMMENT 'reponse a la question',
  `connecte` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l''utilisateur est connecte',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `passe`, `idQuestion`, `reponse`, `connecte`) VALUES
(3, 'Louis', 'Marion', 'marion', 'Alexis', 1, 'Vanderdonckt', 0),
(4, 'Mollin', 'Cassandra', 'cassou', 'Quentin', 1, 'Missana', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
