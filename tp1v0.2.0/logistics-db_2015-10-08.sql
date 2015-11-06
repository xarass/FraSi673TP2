-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 08 Octobre 2015 à 02:17
-- Version du serveur :  5.5.45
-- Version de PHP :  5.4.45

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
-- Structure de la table `harbors`
--

CREATE TABLE `harbors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `harbors`
--

INSERT INTO `harbors` (`id`, `name`, `location`, `user_id`) VALUES
(1, 'Test', 'Montreal', 6),
(2, 'Harbor #2', 'laval', 6),
(3, 'test3', 'Quebec', 6),
(4, 'test3', 'Quebec', 7);

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
  `name` text NOT NULL,
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
  `name` text NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `shipments`
--

INSERT INTO `shipments` (`id`, `harbor_id`, `start_date`, `name`, `start_location`, `user_id`) VALUES
(2, 2, '2015-09-09', 'test #2', 'Montreal', 6),
(3, 1, '2015-09-24', 'C', 'QWD', 6),
(4, 1, '2015-09-25', '#4', 'rimouski', 6),
(5, 2, '2015-09-07', 'allo', 'ma maison', 7);

-- --------------------------------------------------------

--
-- Structure de la table `shipments_products`
--

CREATE TABLE `shipments_products` (
  `id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
(9, 5, 1);

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
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`) VALUES
(6, 'admin', '$2a$10$17IkLhP1lfJshKPLpyt8x.cSPPL5CsVeUP//iKkgIAjUar/0UGA.a', 'admin', 'simfra2@hotmail.com', '2015-09-25', '2015-10-06'),
(7, 'visiteur', '$2a$10$PlOZjvaHtLZQDIL8UVQ80ele3vATwfhrDClFd9DHc1PQ5sY4.z7Ii', 'super-user', 'simfra2@hotmail.com', '2015-09-25', '2015-09-25'),
(9, 'xaras', '$2a$10$T5w9ARHRaShKZW8MkA2OIeTNCids/EZEDYeADhi7.05ofq/F5Mg/m', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03'),
(14, 'xaras', '$2a$10$E8gXDQoElgNwDpz2Xma33uQ1eNdqfMGFnSUMtACZHTT4dAs39mTYS', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03'),
(17, 'xarass', '$2a$10$nxKtl0XoWna3mhirrsH6QuRefIzwtqiYfkg/9iu.OtmUdbTi78nT6', 'super-user', 'simfra2@hotmail.com', '2015-10-03', '2015-10-03');

--
-- Index pour les tables exportées
--

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
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `harbors`
--
ALTER TABLE `harbors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `shipments_products`
--
ALTER TABLE `shipments_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
