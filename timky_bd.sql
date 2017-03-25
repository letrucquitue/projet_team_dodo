-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Mars 2017 à 17:13
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timky_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `last_access_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `histo_trajet`
--

CREATE TABLE `histo_trajet` (
  `id_histo` int(11) NOT NULL,
  `dist` int(11) DEFAULT NULL,
  `vehicule` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_trajet` timestamp NULL DEFAULT NULL,
  `point_cumul` int(11) DEFAULT NULL,
  `depart` varchar(200) DEFAULT NULL,
  `arrivee` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int(11) NOT NULL,
  `point_min` int(11) DEFAULT NULL,
  `description` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recompenses`
--

CREATE TABLE `recompenses` (
  `id_recomp` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `description` text,
  `attribue` tinyint(1) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `succes`
--

CREATE TABLE `succes` (
  `id_succes` int(8) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `atteint` tinyint(1) DEFAULT NULL,
  `categorie` varchar(100) NOT NULL,
  `nombre_atteint` int(8) UNSIGNED DEFAULT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(6) UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_inscri` timestamp NULL DEFAULT NULL,
  `points_actuels` int(10) UNSIGNED DEFAULT NULL,
  `points_totaux` int(10) UNSIGNED DEFAULT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `consommation_km` int(5) DEFAULT NULL,
  `point_km` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_commun`
--

CREATE TABLE `vehicule_commun` (
  `id_commun_vehicule` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `consommation_km` int(8) DEFAULT NULL,
  `point_km` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville_recompenses`
--

CREATE TABLE `ville_recompenses` (
  `id_ville_recomp` int(11) NOT NULL,
  `intitule` varchar(100) DEFAULT NULL,
  `code_post` int(11) DEFAULT NULL,
  `id_recomp` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville_utilisateur`
--

CREATE TABLE `ville_utilisateur` (
  `id_ville` int(11) NOT NULL,
  `intitule` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_post` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `histo_trajet`
--
ALTER TABLE `histo_trajet`
  ADD PRIMARY KEY (`id_histo`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `recompenses`
--
ALTER TABLE `recompenses`
  ADD PRIMARY KEY (`id_recomp`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `succes`
--
ALTER TABLE `succes`
  ADD PRIMARY KEY (`id_succes`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- Index pour la table `vehicule_commun`
--
ALTER TABLE `vehicule_commun`
  ADD PRIMARY KEY (`id_commun_vehicule`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `ville_recompenses`
--
ALTER TABLE `ville_recompenses`
  ADD PRIMARY KEY (`id_ville_recomp`),
  ADD KEY `id_recomp` (`id_recomp`);

--
-- Index pour la table `ville_utilisateur`
--
ALTER TABLE `ville_utilisateur`
  ADD PRIMARY KEY (`id_ville`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `histo_trajet`
--
ALTER TABLE `histo_trajet`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recompenses`
--
ALTER TABLE `recompenses`
  MODIFY `id_recomp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `succes`
--
ALTER TABLE `succes`
  MODIFY `id_succes` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule_commun`
--
ALTER TABLE `vehicule_commun`
  MODIFY `id_commun_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville_recompenses`
--
ALTER TABLE `ville_recompenses`
  MODIFY `id_ville_recomp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville_utilisateur`
--
ALTER TABLE `ville_utilisateur`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
