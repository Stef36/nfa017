-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Sam 08 Avril 2017 à 17:03
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nfa017_8`
--

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE `conge` (
  `conge_id` int(11) NOT NULL,
  `conge_datedebut` datetime NOT NULL,
  `conge_quantite` decimal(6,2) NOT NULL,
  `conge_demande` tinyint(1) DEFAULT NULL,
  `conge_consulte` tinyint(1) DEFAULT NULL,
  `conge_accorde` tinyint(1) DEFAULT NULL,
  `employe_id` int(11) NOT NULL,
  `type_conge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_nom` varchar(30) DEFAULT NULL,
  `contact_prenom` varchar(30) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_telephone` char(10) DEFAULT NULL,
  `contact_objet` varchar(12) DEFAULT NULL,
  `contact_message` varchar(2000) DEFAULT NULL,
  `contact_dateTime` datetime DEFAULT NULL,
  `contact_adresseIP` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_nom`, `contact_prenom`, `contact_email`, `contact_telephone`, `contact_objet`, `contact_message`, `contact_dateTime`, `contact_adresseIP`) VALUES
(7, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', 'dfdfggh', '2017-04-06 20:19:58', 'Post: ::1<br/>Verification:<br/>::1'),
(8, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', 'dfdfggh', '2017-04-06 20:20:04', 'Post: ::1<br/>Verification:<br/>::1'),
(9, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'information', 'coucou', '2017-04-06 20:22:16', 'Post: ::1<br/>Verification:<br/>::1'),
(10, 'SALUT', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', 'c\'est un message', '2017-04-06 20:23:53', 'Post: ::1<br/>Verification:<br/>::1');

-- --------------------------------------------------------

--
-- Structure de la table `disposer`
--

CREATE TABLE `disposer` (
  `disposer_quantite` decimal(6,2) DEFAULT NULL,
  `employe_id` int(11) NOT NULL,
  `type_conge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `employe_id` int(11) NOT NULL,
  `employe_login` varchar(30) NOT NULL,
  `employe_mdp` varchar(100) NOT NULL,
  `employe_nom` varchar(50) NOT NULL,
  `employe_prenom` varchar(50) DEFAULT NULL,
  `employe_mail` varchar(100) DEFAULT NULL,
  `employe_visible` tinyint(1) NOT NULL,
  `employe_actif` tinyint(1) NOT NULL,
  `employe_logo` varchar(200) DEFAULT NULL,
  `equipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`employe_id`, `employe_login`, `employe_mdp`, `employe_nom`, `employe_prenom`, `employe_mail`, `employe_visible`, `employe_actif`, `employe_logo`, `equipe_id`) VALUES
(1, 'domduf', 'domduf', 'Dufour', 'Dominique', NULL, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `equipe_id` int(11) NOT NULL,
  `equipe_login` varchar(50) NOT NULL,
  `equipe_mdp` varchar(100) NOT NULL,
  `equipe_nom` varchar(200) NOT NULL,
  `equipe_entreprise` varchar(200) DEFAULT NULL,
  `equipe_responsable` varchar(30) DEFAULT NULL,
  `equipe_mail` varchar(100) DEFAULT NULL,
  `equipe_logo` varchar(300) DEFAULT NULL,
  `equipe_visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`equipe_id`, `equipe_login`, `equipe_mdp`, `equipe_nom`, `equipe_entreprise`, `equipe_responsable`, `equipe_mail`, `equipe_logo`, `equipe_visible`) VALUES
(1, 'test', 'test', 'Equipe test créée par Domduf', 'Domduf & Stef Entrerprise', 'dom et stef', 'minique.duf@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `mem_id` int(11) NOT NULL,
  `mem_login` varchar(25) DEFAULT NULL,
  `mem_mdp` char(100) DEFAULT NULL,
  `mem_nom` varchar(20) DEFAULT NULL,
  `mem_prenom` varchar(20) NOT NULL,
  `mem_email` char(100) DEFAULT NULL,
  `mem_actif` tinyint(1) NOT NULL,
  `mem_lien_photo` varchar(100) DEFAULT NULL,
  `mem_persona` varchar(20) DEFAULT NULL,
  `mem_description` varchar(300) DEFAULT NULL,
  `mem_date_naiss` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`mem_id`, `mem_login`, `mem_mdp`, `mem_nom`, `mem_prenom`, `mem_email`, `mem_actif`, `mem_lien_photo`, `mem_persona`, `mem_description`, `mem_date_naiss`) VALUES
(1, 'domduf', '$2y$10$A40L5e9e9iXmY.oD8L7K3OQG7knoFroeYYqLGYX7.Z5Z2YUeetQOC', 'DUFOUR', 'Dominique', 'minique.duf@gmail.com', 1, NULL, 'Gestionnaire', NULL, '1967-03-26'),
(3, 'stef', '$2y$10$5iYLDxGcHN8Ij/c7rGDlluc9EaAP6OxeRDclPlmV81X5NKF5QLe5y', 'LARUELLE', 'Stephane', NULL, 1, NULL, 'Gestionnaire', NULL, NULL),
(4, 'philippe', '$2y$10$aXBtonDKu2E/c.5YrA4LrernJSbka6EWhC9hX5SHfDSgYegsd509q', 'BOUQUET', 'Philippe', NULL, 1, NULL, 'Gestionnaire', NULL, NULL),
(5, 'david', '$2y$10$bXNq8gKTW1ndZP1RSb/12OliBtz35l6aPVGHX.wYfoezER4kgSavC', NULL, 'David', NULL, 1, NULL, 'Gestionnaire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `equipe_id` int(11) NOT NULL,
  `type_conge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_conge`
--

CREATE TABLE `type_conge` (
  `type_conge_id` int(11) NOT NULL,
  `type_conge_nom` varchar(50) NOT NULL,
  `type_conge_commentaire` varchar(400) DEFAULT NULL,
  `type_conge_unite` varchar(30) NOT NULL,
  `type_conge_valable` tinyint(1) NOT NULL,
  `type_conge_logo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`conge_id`),
  ADD KEY `FK_conge_employe_id` (`employe_id`),
  ADD KEY `FK_conge_type_conge_id` (`type_conge_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `disposer`
--
ALTER TABLE `disposer`
  ADD PRIMARY KEY (`employe_id`,`type_conge_id`),
  ADD KEY `FK_disposer_type_conge_id` (`type_conge_id`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`employe_id`),
  ADD UNIQUE KEY `employe_login` (`employe_login`),
  ADD KEY `FK_employe_equipe_id` (`equipe_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`equipe_id`),
  ADD UNIQUE KEY `equipe_login` (`equipe_login`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_login` (`mem_login`,`mem_persona`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`equipe_id`,`type_conge_id`),
  ADD KEY `FK_proposer_type_conge_id` (`type_conge_id`);

--
-- Index pour la table `type_conge`
--
ALTER TABLE `type_conge`
  ADD PRIMARY KEY (`type_conge_id`),
  ADD UNIQUE KEY `type_conge_nom` (`type_conge_nom`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `conge`
--
ALTER TABLE `conge`
  MODIFY `conge_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_conge`
--
ALTER TABLE `type_conge`
  MODIFY `type_conge_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `FK_conge_employe_id` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`employe_id`),
  ADD CONSTRAINT `FK_conge_type_conge_id` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conge` (`type_conge_id`);

--
-- Contraintes pour la table `disposer`
--
ALTER TABLE `disposer`
  ADD CONSTRAINT `FK_disposer_employe_id` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`employe_id`),
  ADD CONSTRAINT `FK_disposer_type_conge_id` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conge` (`type_conge_id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_employe_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`equipe_id`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `FK_proposer_equipe_id` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`equipe_id`),
  ADD CONSTRAINT `FK_proposer_type_conge_id` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conge` (`type_conge_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;