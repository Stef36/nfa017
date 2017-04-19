-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 19 Avril 2017 à 20:58
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
  `conge_commentaire` varchar(600) DEFAULT NULL,
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
  `contact_login_souhait` varchar(50) DEFAULT NULL,
  `contact_message` varchar(2000) DEFAULT NULL,
  `contact_dateTime` datetime DEFAULT NULL,
  `contact_adresseIP` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_nom`, `contact_prenom`, `contact_email`, `contact_telephone`, `contact_objet`, `contact_login_souhait`, `contact_message`, `contact_dateTime`, `contact_adresseIP`) VALUES
(7, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'dfdfggh', '2017-04-06 20:19:58', 'Post: ::1<br/>Verification:<br/>::1'),
(8, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'dfdfggh', '2017-04-06 20:20:04', 'Post: ::1<br/>Verification:<br/>::1'),
(9, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'information', NULL, 'coucou', '2017-04-06 20:22:16', 'Post: ::1<br/>Verification:<br/>::1'),
(10, 'SALUT', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'c\'est un message', '2017-04-06 20:23:53', 'Post: ::1<br/>Verification:<br/>::1'),
(11, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'ce serait super', '2017-04-12 21:07:42', 'Post: ::1<br/>Verification:<br/>::1'),
(12, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'oh oui cool', '2017-04-12 21:08:40', 'Post: ::1<br/>Verification:<br/>::1'),
(13, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', NULL, 'fddfdf', '2017-04-12 21:59:20', 'Post: ::1<br/>Verification:<br/>::1'),
(14, 'DOMDUF', 'Dom', 'minique.duf@gmail.com', '0663342821', 'information', NULL, 'srer', '2017-04-12 22:00:03', 'Post: ::1<br/>Verification:<br/>::1'),
(15, 'TOTO', 'Dom', 'minique.duf@gmail.com', '0663342821', 'contact', 'dommEquipe', 'salut comment &ccedil;a va ?', '2017-04-13 12:43:53', 'Post: ::1<br/>Verification:<br/>::1'),
(16, 'DUGLAND', 'Jacques', 'jacqu.duf@gmail.com', '0663342821', 'contact', 'jacqu-DUGLAND', 'ce serait cool', '2017-04-13 21:11:07', 'Post: ::1<br/>Verification:<br/>::1'),
(17, 'INCONNU', 'Charles', 'le.soldat@inconnu.fr', '0123456789', 'contact', 'Lastatue-gerbe', '&ccedil;a m\'&eacute;vite les questions', '2017-04-13 22:27:56', 'Post: ::1<br/>Verification:<br/>::1'),
(18, 'TEST', 'de_selection', 'la.selection@com.fr', '0663342821', 'contact', 'de selection', '&ccedil;a marche ?', '2017-04-16 20:39:22', 'Post: ::1<br/>Verification:<br/>::1');

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
  `employe_commentaire` varchar(600) DEFAULT NULL,
  `employe_visible` tinyint(1) NOT NULL,
  `employe_actif` tinyint(1) NOT NULL,
  `employe_logo` varchar(200) DEFAULT NULL,
  `equipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`employe_id`, `employe_login`, `employe_mdp`, `employe_nom`, `employe_prenom`, `employe_mail`, `employe_commentaire`, `employe_visible`, `employe_actif`, `employe_logo`, `equipe_id`) VALUES
(1, 'domduf', 'domduf', 'Dufour', 'Dominique', NULL, NULL, 1, 1, NULL, 1);

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
(1, 'test', 'test', 'Equipe test', 'Domduf & Stef Entrerprise', 'dom tout seul', 'minique.duf@gmail.com', './logos/logo-test.png', 1),
(2, 'dom', 'dom', 'SAV de La Valise Chinoise', 'La Valise Chinoise en Carton', 'De La Poignée', 'minique.duf@gmail.com', './logos/Dom.jpg', 1),
(3, 'jacqu-DUGLAND', '', 'L\'équipe à Dugland', 'Entreprise mes Noeuds', 'Du Gras du Bide', 'jacqu.duf@gmail.com', './logos/belly-2473_960_720.jpg', 1),
(5, 'Lastatue-gerbe', '', 'Equipe Inconnue du Bataillon de la Statue', 'Pompe Funebre', 'INCONNU', 'le.soldat@inconnu.fr', './logos/soldat_inconnu.png', 1),
(6, 'de selection', '', 'Equipe de Test', '', 'TEST', 'la.selection@com.fr', '', 0);

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
  `type_conge_commentaire` text,
  `type_conge_unite` varchar(30) NOT NULL,
  `type_conge_valable` tinyint(1) NOT NULL,
  `type_conge_logo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_conge`
--

INSERT INTO `type_conge` (`type_conge_id`, `type_conge_nom`, `type_conge_commentaire`, `type_conge_unite`, `type_conge_valable`, `type_conge_logo`) VALUES
(1, 'CONGE PAYE', 'Chaque année, le salarié peut prétendre à des congés payés à la charge de l\'employeur.\r\n\r\n    Il a droit à 2 jours et demi de congés par mois de travail effectif chez le même employeur, soit 5 semaines par année complète de travail (du 1er juin au 31 mai).\r\n    Toutefois, pendant ses congés payés le salarié n\'a pas droit d\'exercer une autre activité rémunérée.\r\n\r\nBon à savoir : les conjoints et les personnes liées par un PACS travaillant dans la même entreprise peuvent prendre un congé simultané.\r\nsource https://contrat-de-travail.ooreka.fr/tips/voir/277473/les-10-types-de-conges-a-connaitre', 'jour', 1, NULL),
(2, 'ANCIENNETÉ', 'Congés ancienneté.', 'jour', 1, NULL),
(4, 'MATERNITÉ ', 'C\'est le congé dont bénéficie la salariée enceinte durant la période qui se situe autour de la date présumée de son accouchement.\r\n\r\n    Sa durée légale est fixée par le code de la sécurité sociale et le code du travail, mais certaines conventions collectives prévoient des dispositions plus favorables.\r\n    Toute salariée, justifiant de 10 mois d\'immatriculation en tant qu\'assurée sociale à la date de son accouchement a droit aux indemnités journalières pendant son congé maternité.\r\n\r\nBon à savoir : au 1er janvier 2017, le montant maximum de cette indemnité est de 84,90 € par jour.', 'jour', 1, NULL),
(5, 'PATERNITÉ', 'C\'est un droit ouvert à tout salarié, quelles que soient son ancienneté et la nature de son contrat, à l\'occasion de la naissance de son enfant ou de l\'enfant de la personne avec laquelle il vit maritalement.\r\n\r\n    Il est d\'une durée maximale de 11 jours consécutifs.\r\n    Le salarié doit en informer son employeur, au minimum un mois avant et de préférence par lettre recommandée avec accusé de réception et accompagnée de la date et de la durée de son congé.\r\n', 'jour', 1, NULL),
(6, 'C.I.F. ou FORMATION', 'C\'est le droit pour le salarié, sous réserve de certaines conditions (comme l\'ancienneté), de s\'absenter de son poste pendant quelques jours pour suivre la formation de son choix.\r\n\r\n    Ce sont des organismes paritaires agréés par l\'État (ex : FONGECIF) qui financent ce congé.\r\n    Le temps passé en formation est pris en compte pour le calcul des droits aux congés payés.\r\n\r\nBon à savoir : l\'employeur peut reporter la date du congé lorsqu\'il estime que le départ de salarié est préjudiciable à la bonne marche de son entreprise ou lorsque trop de salariés sont absents en même temps.', 'heure', 1, NULL),
(7, 'SABBATIQUE', 'Tout salarié, remplissant des conditions d\'ancienneté et d\'activité, peut suspendre son contrat de travail dans le but de réaliser un projet personnel.\r\n\r\n    Le contrat de travail est alors suspendu pendant la durée du congé (entre 6 et 11 mois).\r\n    L\'employeur peut différer le départ en congé, voire le refuser sous réserve de justifier sa décision.\r\n\r\nBon à savoir : pendant ce congé, le salarié peut travailler dans une autre entreprise ou créer la sienne à condition de ne pas se livrer à une concurrence déloyale vis-à-vis de son employeur.', 'jour', 1, NULL),
(8, 'RAISON FAMILIALE', 'Que ce soit à l\'occasion d\'événements familiaux heureux ou malheureux, la loi accorde des jours de congés supplémentaires aux salariés :\r\n\r\n    en cas de mariage ;\r\n    de naissance ;\r\n    de décès ; \r\n    pour solidarité familiale ;\r\n    pour enfant 