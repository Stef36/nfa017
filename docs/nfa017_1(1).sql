-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 16 Mars 2017 à 18:10
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nfa017_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `mem_id` int(11) NOT NULL,
  `mem_login` char(25) DEFAULT NULL,
  `mem_mdp` char(100) DEFAULT NULL,
  `mem_persona` enum('Internaute','Mobinaute','Gestionaire') DEFAULT NULL,
  `mem_activite` enum('oui','non') DEFAULT NULL,
  `mem_description_musico` varchar(100) DEFAULT NULL,
  `mem_civilite` enum('M.','Mme','Mlle') DEFAULT NULL,
  `mem_nom` varchar(20) DEFAULT NULL,
  `mem_prenom` varchar(20) NOT NULL,
  `mem_date_naiss` date DEFAULT NULL,
  `mem_sexe` enum('masculin','feminin') DEFAULT NULL,
  `mem_centre_interet` varchar(120) DEFAULT NULL,
  `mem_article` text,
  `mem_lien_photo` varchar(100) DEFAULT NULL,
  `mem_membre_bureau` char(15) DEFAULT NULL,
  `mem_email` char(100) DEFAULT NULL,
  `mem_adres_num` int(11) DEFAULT NULL,
  `mem_adres_rue` varchar(150) DEFAULT NULL,
  `mem_adres_cp` varchar(5) DEFAULT NULL,
  `mem_adres_ville` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`mem_id`, `mem_login`, `mem_mdp`, `mem_persona`, `mem_activite`, `mem_description_musico`, `mem_civilite`, `mem_nom`, `mem_prenom`, `mem_date_naiss`, `mem_sexe`, `mem_centre_interet`, `mem_article`, `mem_lien_photo`, `mem_membre_bureau`, `mem_email`, `mem_adres_num`, `mem_adres_rue`, `mem_adres_cp`, `mem_adres_ville`) VALUES
(1, 'domduf', '$2y$10$A40L5e9e9iXmY.oD8L7K3OQG7knoFroeYYqLGYX7.Z5Z2YUeetQOC', 'Gestionaire', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'stf', '$2y$10$5iYLDxGcHN8Ij/c7rGDlluc9EaAP6OxeRDclPlmV81X5NKF5QLe5y', 'Gestionaire', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mem_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
