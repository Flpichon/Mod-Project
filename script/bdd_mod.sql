-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 juin 2019 à 13:35
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `suppr`) VALUES
(6, 'fruits', 0),
(7, 'légume', 0),
(8, 'condiments', 0),
(11, 'vetement', 0),
(12, 'boisson', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `suppr`) VALUES
(4, 'Dupont', 'Paul', 'PaulDupont@gmail.com', 0),
(5, 'Martin', 'Alphonse', 'AlphonseMartin@gmail.com', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `statut`, `prix`, `suppr`, `id_utilisateur`, `id_client`) VALUES
(50, '2019-06-04 08:20:57', 'terminée', 66.1, 0, 2, 4),
(51, '2019-06-04 08:39:54', 'terminée', 42.9, 0, 2, 4),
(52, '2019-06-04 08:40:56', 'terminée', 10, 0, 4, 4),
(53, '2019-06-04 08:42:19', 'terminée', 23, 0, 4, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne_produit`
--

INSERT INTO `ligne_produit` (`id`, `quantite`, `prix_ligne`, `id_produit`, `id_commande`, `suppr`) VALUES
(56, 1, 1, 27, 50, 0),
(57, 2, 3, 28, 50, 0),
(58, 3, 2.1, 29, 50, 0),
(59, 4, 60, 30, 50, 0),
(60, 12, 12, 27, 51, 0),
(61, 15, 22.5, 28, 51, 0),
(62, 12, 8.4, 29, 51, 0),
(63, 10, 10, 27, 52, 0),
(64, 14, 14, 27, 53, 0),
(65, 6, 9, 28, 53, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prix_unitaire`, `image`, `suppr`, `id_categorie`) VALUES
(27, 'tomate', 'Solanum lycopersicum L.', 1, 'tomate.png', 0, 6),
(28, 'poire', 'Red Williams', 1.5, 'poires.png', 0, 6),
(29, 'carotte', 'Daucus carota subsp.', 0.7, 'carotte.png', 0, 7),
(30, 't-shirt', 't-shirt blanc taille unique', 15, 'tshirt_PNG5435.png', 0, 11),
(31, 'vin rouge', 'Merlot Tannay', 30, 'rouge.png', 0, 12),
(32, 'chemise', 'chemise à carreaux', 20, 'chemise.png', 0, 11);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mdp`, `email`, `suppr`, `id_statut`) VALUES
(2, 'Le Pichon', 'Franck', 'franck', '6f31afdd1748f40493ce3d75a0d792f1', 'franckiiboss@gmail.com', 0, 2),
(4, 'Le Pichon', 'Frédéric', 'fredo', '7aec5e35a56630ecc364ad842ffad9de', 'franckiiboss@gmail.com', 0, 1),
(10, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.fr', 0, 2);

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
