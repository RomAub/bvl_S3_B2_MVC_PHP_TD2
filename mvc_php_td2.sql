-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 sep. 2026 à 21:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_php_td2`
--

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

CREATE TABLE `passager` (
  `trajet_id` int(11) NOT NULL,
  `utilisateur_login` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id` int(11) NOT NULL,
  `depart` varchar(32) DEFAULT NULL,
  `arrivee` varchar(32) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nbplaces` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `conducteur_login` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id`, `depart`, `arrivee`, `date`, `nbplaces`, `prix`, `conducteur_login`) VALUES
(1, 'Gap', 'Marseille', '2026-09-15', 3, 20, 'jdupont'),
(3, 'Briançon', 'Gap', '2026-09-18', 4, 10, 'mbardet');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`) VALUES
('jdupont', 'Dupont', 'Jean'),
('mbardet', 'Bardet', 'Marie');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `immatriculation` varchar(9) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`) VALUES
('00-OOO-00', 'Mickey', 'Turcoise'),
('AA-000-AA', 'Peugeot', 'Rouge'),
('XX-999-YY', 'Peugeot', 'Rouge');

-- --------------------------------------------------------

--
-- Structure de la table `voiture2`
--

CREATE TABLE `voiture2` (
  `immatriculation` varchar(8) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `passager`
--
ALTER TABLE `passager`
  ADD PRIMARY KEY (`trajet_id`,`utilisateur_login`),
  ADD KEY `utilisateur_login` (`utilisateur_login`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conducteur_login` (`conducteur_login`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`immatriculation`);

--
-- Index pour la table `voiture2`
--
ALTER TABLE `voiture2`
  ADD PRIMARY KEY (`immatriculation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passager`
--
ALTER TABLE `passager`
  ADD CONSTRAINT `passager_ibfk_1` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passager_ibfk_2` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
