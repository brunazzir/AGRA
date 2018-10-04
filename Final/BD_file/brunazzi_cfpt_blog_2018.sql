-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 04 oct. 2018 à 14:43
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `brunazzi_cfpt_blog_2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Déchargement des données de la table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`, `postId`) VALUES
(247, '2018-10-04-5bb609c6629c1-comfy.png', 69),
(249, '2018-10-04-5bb609d22fe1d-ded.png', 69);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `text` longtext,
  `TOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TOM` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Déchargement des données de la table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `text`, `TOC`, `TOM`) VALUES
(69, 'Bonjour, fonctionne stp ', '2018-10-04 00:10:30', '2018-10-04 00:10:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`);

--
-- Index pour la table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT pour la table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD CONSTRAINT `tbl_images_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `tbl_posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
