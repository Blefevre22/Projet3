-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Novembre 2017 à 18:04
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ar_id` int(11) NOT NULL,
  `ar_titre` varchar(255) NOT NULL,
  `ar_date_ajout` datetime NOT NULL,
  `ar_article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ar_id`, `ar_titre`, `ar_date_ajout`, `ar_article`) VALUES
(19, 'Illidan Hurlorage', '2017-11-23 15:57:07', '<p>La terre tremble et le ciel se d&eacute;chire. Pas de doute, la L&eacute;gion Ardente arrive. Mais alors que nous nous appr&ecirc;tons &agrave; mener <strong>la plus terrible des guerres</strong>, revenons sur le pass&eacute; d\'un personnage charismatique de l\'univers Warcraft qui fera bient&ocirc;t son grand retour : <strong>Illidan Hurlorage</strong>.</p>\r\n<p>Connu pour avoir autrefois <strong>trahi son peuple</strong> et r&eacute;gn&eacute; sur l\'Outreterre en tyran, il est victime d\'un pass&eacute; compliqu&eacute;. Le livre <strong>Illidan</strong>, de William King, nous raconte la lib&eacute;ration de ce dernier apr&egrave;s 10 000 ans d\'emprisonnement et sa <strong>longue chasse</strong> sur la plan&egrave;te qu\'&eacute;tait autrefois Draenor. Cela nous permet de retrouver des personnages embl&eacute;matiques tels que <strong>Maiev Chantelombre</strong> ou encore <strong>Akama</strong>. Vous pouvez d&eacute;couvrir un aper&ccedil;u du roman ainsi que mon avis &agrave; la suite de cet article.</p>'),
(27, 'Behind blue eyes', '2017-11-23 16:27:02', '<p>Dune para&icirc;t-il est une saga d\'anthologie. Des jeux vid&eacute;os se sont inspir&eacute;s de son univers, un film a m&ecirc;me &eacute;t&eacute; tourn&eacute; par le fameux David Lynch, mais qu\'en est-il des livres de Frank Herbert ? Dune premier volume du cycle pose les bases d\'un space opera pour le moins dense et coh&eacute;rent. L\'histoire d&eacute;bute dans un avenir lointain, l\'humanit&eacute; a conquis l\'espace et forg&eacute; un empire riche de millions...</p>'),
(28, 'Plus qu\'un livre', '2017-11-23 16:27:40', '<p>Dune, c\'est avant tout un univers. Je ne m\'attaquerai pas au cycle de Dune, ni au film, ni au jeu mais avant tout au premier Dune qui pose les pr&eacute;misses d\'un univers complexe mais fascinant. Dune, c\'est avant tout l\'histoire d\'une plan&egrave;te convo&icirc;t&eacute;e de tous et qui pourtant n\'appartient &agrave; personne. Dune a ce c&ocirc;t&eacute; insaisissable commun au sable. Le temps passe, Dune change et pourtant reste la m&ecirc;me...</p>'),
(29, 'Un monument de la SF', '2017-11-23 16:28:13', '<p>Qu\'il est difficile de d&eacute;marrer ce billet ! J\'ai envie de dire tellement de choses &agrave; propos de ce 1er tome que je ne sais pas par quoi commencer. Je vais donc opter pour la solution de facilit&eacute; : l\'analogie. Pour la comparaison, je vais prendre une s&eacute;rie/saga qui a le vent en poupe : Game of Thrones. Comment d&eacute;cririez-vous cette fantastique fresque humaine en une poign&eacute;e de lignes ? Une lutte de...</p>'),
(30, 'Le Cycle de Dune', '2017-11-23 16:28:50', '<p>Dune. Le plus beau roman de science-fiction jamais &eacute;crit (avec d\'autres, d\'accord), le plus passionnant, le plus captivant.... J\'exag&egrave;re sans doute, mais l\'univers de Dune m\'a fascin&eacute;e d&egrave;s ma premi&egrave;re lecture. Les personnages sont complexes, pas n&eacute;cessairement attachants, pas n&eacute;cessairement bons ni h&eacute;ro&iuml;ques, mais humains et que l\'on comprend. Les th&eacute;matiques sont riches, extr&ecirc;mement bien...</p>'),
(32, 'Partez en voyage, à tout jamais', '2017-11-23 16:55:33', '<p>Elle constitue un g&eacute;ant du genre, une entit&eacute; sans pareille qui demeure toutefois largement m&eacute;connue pour ce qu&rsquo;elle est r&eacute;ellement. Si Herbert a bel et bien &eacute;crit de tr&egrave;s bons ouvrages en dehors de Dune (L&rsquo;&eacute;toile et le fouet, Dosadi, Destination vide),...</p>'),
(33, 'test', '2017-11-23 17:35:34', '<p style="text-align: left;">je fais un test de cr&eacute;ation.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_id_user` int(11) DEFAULT NULL,
  `comment_id_article` int(11) NOT NULL,
  `com` text NOT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment_report` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_id_user`, `comment_id_article`, `com`, `comment_date`, `comment_report`) VALUES
(50, 6, 19, 'test', '2017-11-12 22:27:39', 1),
(54, 9, 32, 'Super article !', '2017-11-23 16:53:59', 1),
(55, 1, 32, 'Merci pour le commentaire', '2017-11-23 16:54:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_mail` varchar(70) NOT NULL,
  `user_registration` date NOT NULL,
  `avatar` text NOT NULL,
  `user_group` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_firstName`, `user_lastName`, `user_password`, `user_mail`, `user_registration`, `avatar`, `user_group`) VALUES
(1, 'admin', 'Benoit', 'Lefevre', '33f3f4ed8ff03a0fc1e62e216ccbffdbf3050d21', 'benoit.lefevre22@gmail.com', '2017-11-08', 'Web/pictures/avatar/blefevre-luffy.png', 'admin'),
(6, 'heomoi', 'huong giang', 'nguyen', '47d8094493d69d214b3f55d4d7a6a73e747d277a', 'heomoi1986@yahoo.com', '2017-11-12', 'Web/pictures/avatar/heomoi-Jigglypuff_Purin.png', 'lecteur'),
(8, 'test', 'test', 'test', '33f3f4ed8ff03a0fc1e62e216ccbffdbf3050d21', 'blefevre@lenormant.fr', '2017-11-23', 'Web/pictures/avatar/test-Jigglypuff_Purin.png', 'lecteur'),
(9, 'jdelarche', 'Jean', 'Delarche', '51f8b1fa9b424745378826727452997ee2a7c3d7', 'jdelarche@gmail.com', '2017-11-23', 'Web/pictures/avatar/jdelarche-usopp.jpg', 'lecteur'),
(10, 'ttest', 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'delphin.hadrien@gmail.com', '2017-11-23', 'Web/pictures/avatar/default-avatar.jpg', 'lecteur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ar_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comment_id_user` (`comment_id_user`),
  ADD KEY `fk_comment_id_article` (`comment_id_article`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_id_article` FOREIGN KEY (`comment_id_article`) REFERENCES `articles` (`ar_id`),
  ADD CONSTRAINT `fk_comment_id_user` FOREIGN KEY (`comment_id_user`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
