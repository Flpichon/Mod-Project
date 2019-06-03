-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 juin 2019 à 22:48
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_mod`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `suppr`) VALUES
(1, 'oooo', 1),
(2, 'yololol', 1),
(3, 'oooonhj, bybghn tv', 1),
(4, 'yolo', 0),
(5, 'yololol', 0),
(6, 'fruits', 0),
(7, 'légume', 0),
(8, 'condiments', 0),
(9, 'riz', 0),
(10, 'toto', 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `suppr`) VALUES
(1, 'relouou', 'relou', 'relou@gmail.com', 1),
(2, 'Le Pichon', 'Franck', 'franckiiboss@gmail.com', 0),
(3, 'le relou', 'ok', 'relou@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `statut` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  `id_utilisateur` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_utilisateur_FK` (`id_utilisateur`),
  KEY `commande_client0_FK` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `statut`, `prix`, `suppr`, `id_utilisateur`, `id_client`) VALUES
(45, '2019-06-03 00:00:00', 'terminée', 846.82, 1, 2, 2),
(46, '2019-06-03 18:54:43', 'terminée', 69952, 1, 2, 2),
(47, '2019-06-03 18:55:26', 'en cours', 0, 1, 2, 2),
(48, '2019-06-03 20:16:01', 'terminée', 573.78, 0, 2, 2),
(49, '2019-06-03 20:35:44', 'terminée', 459.34, 0, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_produit`
--

DROP TABLE IF EXISTS `ligne_produit`;
CREATE TABLE IF NOT EXISTS `ligne_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `prix_ligne` float NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ligne_produit_produit_FK` (`id_produit`),
  KEY `ligne_produit_commande0_FK` (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne_produit`
--

INSERT INTO `ligne_produit` (`id`, `quantite`, `prix_ligne`, `id_produit`, `id_commande`, `suppr`) VALUES
(42, 5, 385, 19, 45, 0),
(43, 4, 454, 20, 45, 0),
(44, 9, 2.7, 22, 45, 0),
(45, 8, 5.12, 23, 45, 0),
(46, 787, 60599, 19, 46, 0),
(47, 78, 8853, 20, 46, 0),
(48, 7, 2.1, 22, 46, 0),
(49, 778, 497.92, 23, 46, 0),
(50, 5, 567.5, 20, 48, 0),
(51, 6, 1.8, 22, 48, 0),
(52, 7, 4.48, 23, 48, 0),
(53, 4, 454, 20, 49, 0),
(54, 5, 1.5, 22, 49, 0),
(55, 6, 3.84, 23, 49, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_categorie_FK` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prix_unitaire`, `image`, `suppr`, `id_categorie`) VALUES
(18, 'yolo', 'Dazar\'alor NM', 58, 'duo boss.png', 1, 4),
(19, 'yolo', 'Dazar\'alor NM', 77, 'duo boss.png', 1, 4),
(20, 'yololol', 'Dazar\'alor NM', 113.5, 'Image1.png', 1, 4),
(21, 'oooonhj, bybghn tv', 'Dazar\'alor NM', 1.5, 'firefrosttest.jpg', 1, 4),
(22, 'tomates', 'Abraham Lincoln', 0.3, 'tomate.png', 0, 6),
(23, 'carotte', 'De Carentan', 0.64, 'carotte.png', 0, 7),
(24, 'Groot', 'groot', 20, 'groot_marvel_silo.png', 0, 7),
(25, 'président', 'nul', 0, 'macron.jpg', 1, 4),
(26, 'Poire', 'Dr Jules Guyot', 0.34, 'poires.png', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `suppr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`, `suppr`) VALUES
(1, 'employe', 0),
(2, 'admin', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `suppr` int(11) NOT NULL DEFAULT '0',
  `id_statut` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_statut_FK` (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mdp`, `email`, `suppr`, `id_statut`) VALUES
(2, 'Le Pichon', 'Franck', 'franck', '6f31afdd1748f40493ce3d75a0d792f1', 'franckiiboss@gmail.com', 0, 2),
(3, 'toto', 'oki', 'toto', 'f71dbe52628a3f83a77ab494817525c6', 'franckiiboss@gmail.com', 0, 1),
(4, 'Le Pichon', 'Frédéric', 'fredo', 'fredo', 'franckiiboss@gmail.com', 1, 1),
(5, 'toto', 'ooooooooooooo', 'test', 'test', 'test@gmail.test', 1, 1),
(6, 'ooo', 'oooo', 'ok', 'ooo', 'franckiiboss@gmail.com', 1, 1),
(7, 'ooo', 'oooo', 'ok', 'ooo', 'franckiiboss@gmail.com', 1, 1),
(8, 'o', 'llllllll', 'nnnnnn', 'nnnn', 'franckiiboss@gmail.com', 0, 1),
(9, 'yfugfguytu', 'yttyutu', 'tuyyutu', 'tututut', 'franckiiboss@gmail.com', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_client0_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `commande_utilisateur_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  ADD CONSTRAINT `ligne_produit_commande0_FK` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ligne_produit_produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_statut_FK` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
