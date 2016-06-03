-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juin 2016 à 09:20
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easycourses`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit du catalogue',
  `nom` varchar(25) NOT NULL COMMENT 'nom du produit',
  `idCategorie` int(11) NOT NULL COMMENT 'id de la categorie, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`id`, `nom`, `idCategorie`) VALUES
(15, ' Poire', 1),
(19, ' Pain', 5),
(23, ' Jus d''orange', 4),
(25, ' Boeuf', 2),
(32, ' Coca', 4),
(37, ' Poireau', 1),
(41, ' Pommes de terre', 1),
(44, ' Jus de pomme', 4),
(60, ' Melon', 1),
(61, ' Eau', 4),
(68, ' Saucisse', 2),
(75, ' Limonade', 4),
(82, ' Fromage blanc', 3),
(87, ' Framboise', 1),
(88, ' Ice Tea', 4),
(89, ' Abricot', 1),
(90, ' Fraises', 1),
(94, ' Raisin', 1),
(95, ' Pommes', 1),
(96, ' Tomates', 1),
(97, ' Steack haché', 2),
(98, ' Poulet', 2),
(99, ' Bière', 4),
(100, ' Bière', 4),
(101, ' Lait', 3),
(102, ' Yaourt', 3),
(103, ' Crème fraîche', 3),
(104, ' Kiwis', 1),
(105, ' Pastèque', 1),
(106, ' Gruyère', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la categorie',
  `nom` varchar(20) NOT NULL COMMENT 'nom de la categorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Fruits/Légumes'),
(2, 'Viande'),
(3, 'Laitage'),
(4, 'Boissons'),
(5, 'Non classé');

-- --------------------------------------------------------

--
-- Structure de la table `listes`
--

DROP TABLE IF EXISTS `listes`;
CREATE TABLE IF NOT EXISTS `listes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la liste',
  `nom` varchar(20) NOT NULL COMMENT 'nom',
  `complete` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si la liste est complete',
  `idAuteur` int(11) NOT NULL COMMENT 'id de users, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listes`
--

INSERT INTO `listes` (`id`, `nom`, `complete`, `idAuteur`) VALUES
(1, 'Liste1', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produitsfrigo`
--

DROP TABLE IF EXISTS `produitsfrigo`;
CREATE TABLE IF NOT EXISTS `produitsfrigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit du frigo',
  `idProduitsliste` int(11) DEFAULT NULL COMMENT 'id du produit dans la liste, clé etrangere',
  `quantite` int(50) DEFAULT NULL COMMENT 'quantite du produit',
  `idProduitscatalogue` int(11) DEFAULT NULL COMMENT 'id de produitscatalogue, clé etrangere',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produitsliste`
--

DROP TABLE IF EXISTS `produitsliste`;
CREATE TABLE IF NOT EXISTS `produitsliste` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du produit',
  `idListe` int(11) NOT NULL COMMENT 'id de liste, clé etrangere',
  `idProduitscatalogue` int(11) NOT NULL COMMENT 'id de produitscatalogue, clé etrangere',
  `quantite` int(50) DEFAULT NULL COMMENT 'quantite du produit',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la question',
  `label` varchar(100) NOT NULL COMMENT 'question',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `label`) VALUES
(1, 'Quel est le nom de jeune fille de votre mère ?'),
(2, 'Quel est le nom de votre premier animal de compagnie ?'),
(3, 'Quel est le nom de votre sportif préféré ?'),
(4, 'Quel est le nom de votre artiste préféré ?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `passe`, `idQuestion`, `reponse`, `connecte`) VALUES
(3, 'Louis', 'Marion', 'marion', 'Alexis', 1, 'Vanderdonckt', 1),
(4, 'Mollin', 'Cassandra', 'cassou', 'Quentin', 1, 'Missana', 0),
(6, 'test2nom', 'test2prenom', 'test2pseudo', 'test2passe', 1, ' test', 0),
(7, 'Boulongne', 'Alexis', 'Rabatsenberg', 'JesuisUnNounours', 2, ' Pedro', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
