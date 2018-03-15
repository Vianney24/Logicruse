-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Février 2017 à 15:47
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `bateau_id` int(11) NOT NULL,
  `bateau_nom` varchar(50) NOT NULL,
  `bateau_lib` varchar(200) NOT NULL,
  `bateau_nb_cabine` int(11) NOT NULL,
  `notation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bateau`
--

INSERT INTO `bateau` (`bateau_id`, `bateau_nom`, `bateau_lib`, `bateau_nb_cabine`, `notation_id`) VALUES
(1, 'Queen Mary 2', 'Paquebot', 1310, 5),
(2, 'Quantum of the Seas', 'Croisiere cotiere', 2700, 3),
(3, 'Deep Holloway', 'Paquebot', 1000, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cabine`
--

CREATE TABLE `cabine` (
  `cab_id` int(11) NOT NULL,
  `cab_prix_de_base` float NOT NULL,
  `bateau_id` int(11) NOT NULL,
  `categorie_place_id` int(11) NOT NULL,
  `categorie_classe_id` int(11) NOT NULL,
  `categorie_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cabine`
--

INSERT INTO `cabine` (`cab_id`, `cab_prix_de_base`, `bateau_id`, `categorie_place_id`, `categorie_classe_id`, `categorie_type_id`) VALUES
(1, 120, 2, 1, 1, 1),
(2, 120, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_classe`
--

CREATE TABLE `categorie_classe` (
  `categorie_classe_id` int(11) NOT NULL,
  `categorie_classe_lib` varchar(200) NOT NULL,
  `categorie_classe_descri` varchar(255) DEFAULT NULL,
  `categorie_classe_maj_prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie_classe`
--

INSERT INTO `categorie_classe` (`categorie_classe_id`, `categorie_classe_lib`, `categorie_classe_descri`, `categorie_classe_maj_prix`) VALUES
(1, 'superieur', 'Cabine confortable de taille standard', 0),
(2, 'deluxe', 'C\'est cool', 60),
(3, 'prestige', 'ok', 120),
(4, 'grand_deluxe', 'ben plus grand', 180),
(5, 'privilege', 'c\'est cher', 250);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_placement`
--

CREATE TABLE `categorie_placement` (
  `categorie_place_id` int(11) NOT NULL,
  `categorie_place_lib` varchar(200) NOT NULL,
  `Categorie_place_descri` varchar(255) DEFAULT NULL,
  `Categorie_place_maj_prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie_placement`
--

INSERT INTO `categorie_placement` (`categorie_place_id`, `categorie_place_lib`, `Categorie_place_descri`, `Categorie_place_maj_prix`) VALUES
(1, 'interieur', 'entre quatre murs', 0),
(2, 'hublot', 'vue avec hublot', 60),
(3, 'balcon', 'cabine avec balcon privÃ©', 150);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_type`
--

CREATE TABLE `categorie_type` (
  `categorie_type_id` int(11) NOT NULL,
  `categorie_type_lib` varchar(200) NOT NULL,
  `categorie_type_descri` varchar(255) DEFAULT NULL,
  `categorie_type_maj_prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie_type`
--

INSERT INTO `categorie_type` (`categorie_type_id`, `categorie_type_lib`, `categorie_type_descri`, `categorie_type_maj_prix`) VALUES
(1, 'simple', 'cabine pour un', 0),
(2, 'double', 'cabine pour deux', 60);

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

CREATE TABLE `civilite` (
  `civilite_id` int(11) NOT NULL,
  `civilite` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `civilite`
--

INSERT INTO `civilite` (`civilite_id`, `civilite`) VALUES
(1, 'homme'),
(2, 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_login` varchar(50) NOT NULL,
  `client_mdp` varchar(50) NOT NULL,
  `client_nom` varchar(25) NOT NULL,
  `client_prenom` varchar(25) NOT NULL,
  `client_date_naissance` date NOT NULL,
  `client_email` varchar(50) DEFAULT NULL,
  `client_adresse1` varchar(200) NOT NULL,
  `client_adresse2` varchar(200) DEFAULT NULL,
  `client_telephone` char(10) DEFAULT NULL,
  `client_Fax` varchar(20) DEFAULT NULL,
  `client_CP` char(5) NOT NULL,
  `client_Ville` varchar(50) NOT NULL,
  `civilite_id` int(11) NOT NULL,
  `pays_id` int(11) NOT NULL,
  `date_Generale` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`client_id`, `client_login`, `client_mdp`, `client_nom`, `client_prenom`, `client_date_naissance`, `client_email`, `client_adresse1`, `client_adresse2`, `client_telephone`, `client_Fax`, `client_CP`, `client_Ville`, `civilite_id`, `pays_id`, `date_Generale`) VALUES
(1, 'patou', 'patou', 'Lecuona', 'Patrice', '2017-01-23', 'patou@gmail.com', '1 rue Truc', 'bat 2', '0666666666', NULL, '33000', 'Bordeaux', 1, 1, '2017-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `date_Generale` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `date`
--

INSERT INTO `date` (`date_Generale`) VALUES
('2017-04-02'),
('2017-06-21'),
('2017-07-02');

-- --------------------------------------------------------

--
-- Structure de la table `escales`
--

CREATE TABLE `escales` (
  `escales_id` int(11) NOT NULL,
  `escales_lieu` varchar(200) NOT NULL,
  `pays_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `escales`
--

INSERT INTO `escales` (`escales_id`, `escales_lieu`, `pays_id`) VALUES
(1, '(Pointe Ã  Pitre) - Au port', 1),
(2, '(CuraÃ§ao) - Au port', 2),
(3, '(Aruba) - Au port', 2),
(4, '(Bonaire) - Au port', 2),
(5, '(Fort de France) - Au port', 3),
(6, '(Mascate) - Au port', 4),
(7, '(Zayed) - Au port', 5),
(8, '(Sultanat dâ€™Oman) - Au port', 6),
(9, '(Port de FoudjaÃ¯rah) - Au port', 7),
(10, '(Rashid) - Au port', 8);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `evenement_id` int(11) NOT NULL,
  `evenement_lib` varchar(200) NOT NULL,
  `evenement_descri` varchar(200) DEFAULT NULL,
  `type_evenement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`evenement_id`, `evenement_lib`, `evenement_descri`, `type_evenement_id`) VALUES
(1, 'Concert de Muse', 'Groupe de rock connu et populaire', 1),
(2, 'Le Lac des Cygnes', 'Une oeuvre de TchaÃ¯covsky interprÃ©tÃ© par le Ballet et lâ€™Orchestre de lâ€™OpÃ©ra National de Russie', 2),
(3, 'Cirque Arlette Gruss', 'L\'un des plus prestigieux cirque vous propose un expÃ©rience inoubliable pour petits et grands', 2),
(4, 'Logan', 'Un film rÃ©alisÃ© par James Mangold', 3);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `notation_id` int(11) NOT NULL,
  `notation_nb_etoile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notation`
--

INSERT INTO `notation` (`notation_id`, `notation_nb_etoile`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `organise`
--

CREATE TABLE `organise` (
  `voyage_id` int(11) NOT NULL,
  `date_Generale` date NOT NULL,
  `evenement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `organise`
--

INSERT INTO `organise` (`voyage_id`, `date_Generale`, `evenement_id`) VALUES
(1, '2017-04-02', 1),
(2, '2017-04-02', 3),
(2, '2017-06-21', 4),
(1, '2017-07-02', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `pays_id` int(11) NOT NULL,
  `pays_lib` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`pays_id`, `pays_lib`) VALUES
(1, 'Guadeloupe'),
(2, 'Antilles'),
(3, 'Martinique'),
(4, 'Oman'),
(5, 'Abu Dhabi'),
(6, 'Khasab'),
(7, 'FoudjaÃ¯rah'),
(8, 'DubaÃ¯');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `cab_id` int(11) NOT NULL,
  `bateau_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `voyage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`res_id`, `cab_id`, `bateau_id`, `client_id`, `voyage_id`) VALUES
(1, 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `s_effectue`
--

CREATE TABLE `s_effectue` (
  `date_fin` date NOT NULL,
  `voyage_id` int(11) NOT NULL,
  `bateau_id` int(11) NOT NULL,
  `date_Generale` date NOT NULL,
  `escales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `s_effectue`
--

INSERT INTO `s_effectue` (`date_fin`, `voyage_id`, `bateau_id`, `date_Generale`, `escales_id`) VALUES
('2017-05-25', 1, 1, '2017-04-02', 1),
('2017-05-25', 1, 1, '2017-04-02', 2),
('2017-05-25', 1, 1, '2017-04-02', 3),
('2017-05-25', 1, 1, '2017-04-02', 4),
('2017-05-25', 1, 1, '2017-04-02', 5),
('2017-08-25', 1, 3, '2017-07-02', 1),
('2017-08-25', 1, 3, '2017-07-02', 3),
('2017-08-25', 1, 3, '2017-07-02', 5),
('2017-08-06', 2, 2, '2017-06-21', 6),
('2017-08-06', 2, 2, '2017-06-21', 7),
('2017-08-06', 2, 2, '2017-06-21', 8),
('2017-08-06', 2, 2, '2017-06-21', 9),
('2017-08-06', 2, 2, '2017-06-21', 10);

-- --------------------------------------------------------

--
-- Structure de la table `type_evenement`
--

CREATE TABLE `type_evenement` (
  `type_evenement_id` int(11) NOT NULL,
  `type_evenement_lib` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_evenement`
--

INSERT INTO `type_evenement` (`type_evenement_id`, `type_evenement_lib`) VALUES
(1, 'Musique'),
(2, 'Culturel et touristique'),
(3, 'Film');

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `voyage_id` int(11) NOT NULL,
  `voyage_lib` varchar(200) NOT NULL,
  `voyage_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voyage`
--

INSERT INTO `voyage` (`voyage_id`, `voyage_lib`, `voyage_description`) VALUES
(1, 'CaraÃ¯bes', 'DÃ©couvrez une nature luxuriante et sauvage qui fait de Sainte Lucie un vÃ©ritable joyau posÃ© comme un voile sur la mer turquoise de lâ€™archipel. '),
(2, 'DubaÃ¯', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`bateau_id`),
  ADD KEY `FK_Bateau_notation_id` (`notation_id`);

--
-- Index pour la table `cabine`
--
ALTER TABLE `cabine`
  ADD PRIMARY KEY (`cab_id`,`bateau_id`),
  ADD KEY `FK_Cabine_bateau_id` (`bateau_id`),
  ADD KEY `FK_Cabine_categorie_place_id` (`categorie_place_id`),
  ADD KEY `FK_Cabine_categorie_classe_id` (`categorie_classe_id`),
  ADD KEY `FK_Cabine_categorie_type_id` (`categorie_type_id`);

--
-- Index pour la table `categorie_classe`
--
ALTER TABLE `categorie_classe`
  ADD PRIMARY KEY (`categorie_classe_id`);

--
-- Index pour la table `categorie_placement`
--
ALTER TABLE `categorie_placement`
  ADD PRIMARY KEY (`categorie_place_id`);

--
-- Index pour la table `categorie_type`
--
ALTER TABLE `categorie_type`
  ADD PRIMARY KEY (`categorie_type_id`);

--
-- Index pour la table `civilite`
--
ALTER TABLE `civilite`
  ADD PRIMARY KEY (`civilite_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `FK_Client_civilite_id` (`civilite_id`),
  ADD KEY `FK_Client_pays_id` (`pays_id`),
  ADD KEY `FK_Client_date_Generale` (`date_Generale`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`date_Generale`);

--
-- Index pour la table `escales`
--
ALTER TABLE `escales`
  ADD PRIMARY KEY (`escales_id`),
  ADD KEY `FK_Escales_pays_id` (`pays_id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`evenement_id`),
  ADD KEY `FK_Evenement_type_evenement_id` (`type_evenement_id`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`notation_id`);

--
-- Index pour la table `organise`
--
ALTER TABLE `organise`
  ADD PRIMARY KEY (`voyage_id`,`date_Generale`,`evenement_id`),
  ADD KEY `FK_Organise_date_Generale` (`date_Generale`),
  ADD KEY `FK_Organise_evenement_id` (`evenement_id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`pays_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `FK_Reservation_cab_id` (`cab_id`),
  ADD KEY `FK_Reservation_bateau_id` (`bateau_id`),
  ADD KEY `FK_Reservation_client_id` (`client_id`),
  ADD KEY `FK_Reservation_voyage_id` (`voyage_id`);

--
-- Index pour la table `s_effectue`
--
ALTER TABLE `s_effectue`
  ADD PRIMARY KEY (`voyage_id`,`bateau_id`,`date_Generale`,`escales_id`),
  ADD KEY `FK_s_effectue_bateau_id` (`bateau_id`),
  ADD KEY `FK_s_effectue_date_Generale` (`date_Generale`),
  ADD KEY `FK_s_effectue_escales_id` (`escales_id`);

--
-- Index pour la table `type_evenement`
--
ALTER TABLE `type_evenement`
  ADD PRIMARY KEY (`type_evenement_id`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`voyage_id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD CONSTRAINT `FK_Bateau_notation_id` FOREIGN KEY (`notation_id`) REFERENCES `notation` (`notation_id`);

--
-- Contraintes pour la table `cabine`
--
ALTER TABLE `cabine`
  ADD CONSTRAINT `FK_Cabine_bateau_id` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`bateau_id`),
  ADD CONSTRAINT `FK_Cabine_categorie_classe_id` FOREIGN KEY (`categorie_classe_id`) REFERENCES `categorie_classe` (`categorie_classe_id`),
  ADD CONSTRAINT `FK_Cabine_categorie_place_id` FOREIGN KEY (`categorie_place_id`) REFERENCES `categorie_placement` (`categorie_place_id`),
  ADD CONSTRAINT `FK_Cabine_categorie_type_id` FOREIGN KEY (`categorie_type_id`) REFERENCES `categorie_type` (`categorie_type_id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_civilite_id` FOREIGN KEY (`civilite_id`) REFERENCES `civilite` (`civilite_id`),
  ADD CONSTRAINT `FK_Client_date_Generale` FOREIGN KEY (`date_Generale`) REFERENCES `date` (`date_Generale`),
  ADD CONSTRAINT `FK_Client_pays_id` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`pays_id`);

--
-- Contraintes pour la table `escales`
--
ALTER TABLE `escales`
  ADD CONSTRAINT `FK_Escales_pays_id` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`pays_id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_Evenement_type_evenement_id` FOREIGN KEY (`type_evenement_id`) REFERENCES `type_evenement` (`type_evenement_id`);

--
-- Contraintes pour la table `organise`
--
ALTER TABLE `organise`
  ADD CONSTRAINT `FK_Organise_date_Generale` FOREIGN KEY (`date_Generale`) REFERENCES `date` (`date_Generale`),
  ADD CONSTRAINT `FK_Organise_evenement_id` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`evenement_id`),
  ADD CONSTRAINT `FK_Organise_voyage_id` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_bateau_id` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`bateau_id`),
  ADD CONSTRAINT `FK_Reservation_cab_id` FOREIGN KEY (`cab_id`) REFERENCES `cabine` (`cab_id`),
  ADD CONSTRAINT `FK_Reservation_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `FK_Reservation_voyage_id` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

--
-- Contraintes pour la table `s_effectue`
--
ALTER TABLE `s_effectue`
  ADD CONSTRAINT `FK_s_effectue_bateau_id` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`bateau_id`),
  ADD CONSTRAINT `FK_s_effectue_date_Generale` FOREIGN KEY (`date_Generale`) REFERENCES `date` (`date_Generale`),
  ADD CONSTRAINT `FK_s_effectue_escales_id` FOREIGN KEY (`escales_id`) REFERENCES `escales` (`escales_id`),
  ADD CONSTRAINT `FK_s_effectue_voyage_id` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`voyage_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
