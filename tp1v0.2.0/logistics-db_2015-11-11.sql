-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mer 11 Novembre 2015 à 19:02
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `logistics`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Microsoft', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(2, 'Google', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(3, 'Yahoo', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(4, 'Coca-Cola', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(5, 'Hershey', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(6, 'M&M', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(7, 'Samsung', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(8, 'Sony', '2015-11-09 18:00:57', '2015-11-09 18:00:57'),
(9, 'Canon', '2015-11-09 18:00:57', '2015-11-09 18:00:57');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'games'),
(2, 'food'),
(3, 'electronics');

-- --------------------------------------------------------

--
-- Structure de la table `harbors`
--

CREATE TABLE `harbors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `harbors`
--

INSERT INTO `harbors` (`id`, `name`, `location`, `user_id`, `filename`) VALUES
(1, 'Test', 'Montreal', 6, NULL),
(2, 'Harbor #2', 'laval', 6, NULL),
(3, 'test3', 'Quebec', 6, NULL),
(4, 'test3', 'Quebec', 7, 'uploads/fondDecran.jpg'),
(5, 'resg', 'serg', NULL, 'uploads/image1.jpg'),
(6, 'awD', 'AD', NULL, 'uploads/STEVE!!!.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `shipment_id`, `title`, `content`, `name`, `user_id`) VALUES
(2, 3, 'test', 'je fais des test', 'Simon', 6),
(3, 2, 'awefwaef', 'test encore', 'simon', 6),
(4, 3, 'Truc', 'o;iawjefo;ij', 'awef', 7);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`) VALUES
(1, 'Produit numéro 1', 6),
(2, 'produit numéro 2', 7);

-- --------------------------------------------------------

--
-- Structure de la table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `harbor_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subcategory_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `shipments`
--

INSERT INTO `shipments` (`id`, `harbor_id`, `start_date`, `name`, `start_location`, `user_id`, `subcategory_id`) VALUES
(2, 2, '2015-09-09', 'test #2', 'Montreal', 6, 1),
(3, 1, '2015-09-24', 'C', 'QWD', 6, 4),
(4, 1, '2015-09-25', '#4', 'rimouski', 6, 5),
(5, 2, '2015-09-07', 'allo', 'ma maison', 7, 9),
(6, 1, '2015-11-08', 'awefawef', 'awef', 6, 5),
(8, 1, '2015-11-11', 'zsdv', 'zsdv', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `shipments_products`
--

CREATE TABLE `shipments_products` (
  `id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `shipments_products`
--

INSERT INTO `shipments_products` (`id`, `shipment_id`, `product_id`) VALUES
(1, 0, 0),
(2, 2, 1),
(4, 3, 1),
(5, 3, 2),
(6, 4, 1),
(7, 4, 2),
(8, 5, 2),
(9, 5, 1),
(10, 6, 1),
(11, 7, 1),
(12, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'xbox360'),
(2, 1, 'ps3'),
(3, 1, 'pc'),
(4, 2, 'canned'),
(5, 2, 'fresh'),
(6, 2, 'candy'),
(7, 3, 'camera'),
(8, 3, 'audio'),
(9, 3, 'tv');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`, `active`) VALUES
(6, 'admin', '$2a$10$17IkLhP1lfJshKPLpyt8x.cSPPL5CsVeUP//iKkgIAjUar/0UGA.a', 'admin', 'simfra2@hotmail.com', '2015-09-25', '2015-10-06', 0),
(7, 'visiteur', '$2a$10$PlOZjvaHtLZQDIL8UVQ80ele3vATwfhrDClFd9DHc1PQ5sY4.z7Ii', 'super-user', 'simfra2@hotmail.com', '2015-09-25', '2015-09-25', 0),
(9, 'xaras', '$2a$10$T5w9ARHRaShKZW8MkA2OIeTNCids/EZEDYeADhi7.05ofq/F5Mg/m', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03', 0),
(14, 'xaras', '$2a$10$E8gXDQoElgNwDpz2Xma33uQ1eNdqfMGFnSUMtACZHTT4dAs39mTYS', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03', 0),
(17, 'xarass', '$2a$10$nxKtl0XoWna3mhirrsH6QuRefIzwtqiYfkg/9iu.OtmUdbTi78nT6', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03', 0),
(18, 'awef', '$2a$10$y3UTWhHqMEzsIWfrPlZy6OWiwUIoI/CyegzCCD73gJTaR3H6HcSsy', 'super-user', 'simfra2@hotmail.com', '2015-11-11', '2015-11-11', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `harbors`
--
ALTER TABLE `harbors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shipments_products`
--
ALTER TABLE `shipments_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `harbors`
--
ALTER TABLE `harbors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `shipments_products`
--
ALTER TABLE `shipments_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
