-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 02:46 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timky_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(8) unsigned NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `last_access_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`, `last_access_date`) VALUES
(1000, 'admin', 'admin', '2017-03-26 10:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `histo_trajet`
--

CREATE TABLE IF NOT EXISTS `histo_trajet` (
`id_histo` int(11) NOT NULL,
  `dist` int(11) DEFAULT NULL,
  `vehicule` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_trajet` timestamp NULL DEFAULT NULL,
  `point_cumul` int(11) DEFAULT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `arrivee` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histo_trajet`
--

INSERT INTO `histo_trajet` (`id_histo`, `dist`, `vehicule`, `id_user`, `date_trajet`, `point_cumul`, `depart`, `arrivee`) VALUES
(1, 3, 'velo', 1, '2017-03-25 18:52:42', 5, '3 rue du château humain', '7 boulevard de la nécropole mort-vivante'),
(2, 3, 'velo', 1, '2017-03-25 18:52:42', 5, '3 rue du château humain', '7 boulevard de la nécropole mort-vivante');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
`id_niveau` int(11) NOT NULL,
  `point_min` int(11) DEFAULT NULL,
  `description` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recompenses`
--

CREATE TABLE IF NOT EXISTS `recompenses` (
`id_recomp` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `description` text,
  `attribue` tinyint(1) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recompenses`
--

INSERT INTO `recompenses` (`id_recomp`, `intitule`, `description`, `attribue`, `id_user`) VALUES
(1, 'Ticket de cinéma', 'super places', 0, NULL),
(2, 'Boule de bowling', 'Elle est grosse et trois trous', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `succes`
--

CREATE TABLE IF NOT EXISTS `succes` (
`id_succes` int(8) unsigned NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `atteint` tinyint(1) DEFAULT NULL,
  `categorie` varchar(100) NOT NULL,
  `nombre_atteint` int(8) unsigned DEFAULT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `succes`
--

INSERT INTO `succes` (`id_succes`, `description`, `id_user`, `atteint`, `categorie`, `nombre_atteint`, `titre`) VALUES
(1, 'Premier pédalage, première chute ?', 1, 1, 'NbVelo', 1, 'Première pédale'),
(2, 'Vous continuez sur un vélo, c''est bien (y)', 1, 0, 'NbVelo', 10, 'Apprenti pédaleur'),
(3, 'La voiture, le fléau des temps moderne', 1, 1, 'NbSansVoiture', 1, 'écodébutant');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(6) unsigned NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_inscri` timestamp NULL DEFAULT NULL,
  `points_actuels` int(10) unsigned DEFAULT NULL,
  `points_totaux` int(10) unsigned DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `date_inscri`, `points_actuels`, `points_totaux`, `mdp`, `login`) VALUES
(1, 'Peon', 'Jean', 'bob.lepeon@paysan.w3', '2017-03-25 18:49:00', 0, 0, 'bob', 'François'),
(2, 'Toucour', 'Pierre', 'Pierre.toucour@gpasdnom.fr', '2017-03-25 22:47:45', 12, 12, 'pierre', 'Paul'),
(3, 'Zero', 'Orez', 'Zero.orez@0.0', '2017-03-25 22:48:41', 7, 50, 'rezero', 'Zero');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
`id_vehicule` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `consommation_km` int(5) DEFAULT NULL,
  `point_km` int(8) DEFAULT NULL,
  `mode` varchar(80) NOT NULL,
  `type_vehicule` varchar(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `intitule`, `id_user`, `description`, `consommation_km`, `point_km`, `mode`, `type_vehicule`) VALUES
(1, 'velo', 1, 'velo bleu', 100, 15, 'bicycling', 'perso'),
(2, 'pied', 1, 'why not a pied', 10, 100, 'walking', 'commun');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule_commun`
--

CREATE TABLE IF NOT EXISTS `vehicule_commun` (
`id_commun_vehicule` int(11) NOT NULL,
  `description` text NOT NULL,
  `consommation_km` int(8) DEFAULT NULL,
  `point_km` int(8) DEFAULT NULL,
  `intitule` varchar(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicule_commun`
--

INSERT INTO `vehicule_commun` (`id_commun_vehicule`, `description`, `consommation_km`, `point_km`, `intitule`, `user_id`) VALUES
(1, 'bus confort', 200, 100, 'bus lannion', NULL),
(2, 'train rapide eco', 50, 200, 'train tgv', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ville_recompenses`
--

CREATE TABLE IF NOT EXISTS `ville_recompenses` (
`id_ville_recomp` int(11) NOT NULL,
  `intitule` varchar(100) DEFAULT NULL,
  `code_post` int(11) DEFAULT NULL,
  `id_recomp` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville_recompenses`
--

INSERT INTO `ville_recompenses` (`id_ville_recomp`, `intitule`, `code_post`, `id_recomp`) VALUES
(1, 'Orgrimmar', 1337, 1),
(2, 'Orgrimmar', 1337, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ville_utilisateur`
--

CREATE TABLE IF NOT EXISTS `ville_utilisateur` (
`id_ville` int(11) NOT NULL,
  `intitule` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_post` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville_utilisateur`
--

INSERT INTO `ville_utilisateur` (`id_ville`, `intitule`, `id_user`, `code_post`) VALUES
(1, 'Orgrimmar', 1, 1337);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histo_trajet`
--
ALTER TABLE `histo_trajet`
 ADD PRIMARY KEY (`id_histo`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
 ADD PRIMARY KEY (`id_niveau`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `recompenses`
--
ALTER TABLE `recompenses`
 ADD PRIMARY KEY (`id_recomp`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `succes`
--
ALTER TABLE `succes`
 ADD PRIMARY KEY (`id_succes`), ADD KEY `fk_user_id` (`id_user`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
 ADD PRIMARY KEY (`id_vehicule`);

--
-- Indexes for table `vehicule_commun`
--
ALTER TABLE `vehicule_commun`
 ADD PRIMARY KEY (`id_commun_vehicule`);

--
-- Indexes for table `ville_recompenses`
--
ALTER TABLE `ville_recompenses`
 ADD PRIMARY KEY (`id_ville_recomp`), ADD KEY `id_recomp` (`id_recomp`);

--
-- Indexes for table `ville_utilisateur`
--
ALTER TABLE `ville_utilisateur`
 ADD PRIMARY KEY (`id_ville`), ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `histo_trajet`
--
ALTER TABLE `histo_trajet`
MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recompenses`
--
ALTER TABLE `recompenses`
MODIFY `id_recomp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `succes`
--
ALTER TABLE `succes`
MODIFY `id_succes` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicule_commun`
--
ALTER TABLE `vehicule_commun`
MODIFY `id_commun_vehicule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ville_recompenses`
--
ALTER TABLE `ville_recompenses`
MODIFY `id_ville_recomp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ville_utilisateur`
--
ALTER TABLE `ville_utilisateur`
MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
