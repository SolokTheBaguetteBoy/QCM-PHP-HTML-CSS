-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 15 avr. 2018 à 19:43
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pwebprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

DROP TABLE IF EXISTS `bilan`;
CREATE TABLE IF NOT EXISTS `bilan` (
  `id_bilan` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `note_test` int(11) NOT NULL,
  `date_bilan` date NOT NULL,
  PRIMARY KEY (`id_bilan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bilan`
--

INSERT INTO `bilan` (`id_bilan`, `id_test`, `id_etu`, `note_test`, `date_bilan`) VALUES
(1, 41, 1, 10, '2017-10-29'),
(2, 41, 2, 3, '2017-10-29'),
(3, 41, 3, 18, '2017-10-29'),
(4, 40, 1, 15, '2017-11-03');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etu` int(11) NOT NULL AUTO_INCREMENT,
  `genre` text COLLATE utf8_bin NOT NULL,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `login_etu` text COLLATE utf8_bin NOT NULL,
  `pass_etu` text COLLATE utf8_bin NOT NULL,
  `matricule` text COLLATE utf8_bin NOT NULL,
  `num_grpe` text COLLATE utf8_bin NOT NULL,
  `date_etu` date NOT NULL,
  `bConnect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_etu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etu`, `genre`, `nom`, `prenom`, `email`, `login_etu`, `pass_etu`, `matricule`, `num_grpe`, `date_etu`, `bConnect`) VALUES
(1, 'M.', 'Tor', 'Michaël', 'michael.tor@etu.parisdescartes.fr', 'tor', 'tor', '22701007', '206', '2017-09-01', 0),
(2, 'M.', 'Moustache', 'Félix', 'felix.moustache@etu.parisdescartes.fr', 'moustach', '', '22701011', '207', '2017-09-01', 1),
(3, 'M.', 'Nguyen', 'Rémi', 'paule.nguyen@etuparisdescartes.fr', 'nguyen1', '2aaaaaaa', '22701012', '208', '2017-09-01', 0),
(4, 'Melle.', 'Nguyen', 'Paule', 'paule.nguyen@etuparisdescartes.fr', 'nguyen2', '2aaaaaaa', '22701027', '208', '2017-09-01', 0);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id_grpe` int(11) NOT NULL,
  `num_grpe` int(11) NOT NULL,
  PRIMARY KEY (`id_grpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_grpe`, `num_grpe`) VALUES
(0, 201),
(1, 202),
(2, 203),
(3, 204),
(4, 205),
(5, 206),
(6, 207);

-- --------------------------------------------------------

--
-- Structure de la table `grpetudiants`
--

DROP TABLE IF EXISTS `grpetudiants`;
CREATE TABLE IF NOT EXISTS `grpetudiants` (
  `id_grpe` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  PRIMARY KEY (`id_grpe`,`id_etu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `grpetudiants`
--

INSERT INTO `grpetudiants` (`id_grpe`, `id_etu`) VALUES
(0, 0),
(1, 1),
(2, 2),
(3, 3),
(4, 0),
(4, 1),
(5, 2),
(5, 3),
(6, 0),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `login_prof` text COLLATE utf8_bin NOT NULL,
  `pass_prof` text COLLATE utf8_bin NOT NULL,
  `date_prof` date NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `nom`, `prenom`, `email`, `login_prof`, `pass_prof`, `date_prof`) VALUES
(1, 'Prof', 'Esseur', 'professeur@parisdescartes.fr', 'professeur', 'professeur', '2017-10-01'),
(2, 'pavy', 'antoine', '', 'pavy', 'pavy', '0000-00-00'),
(3, 'Sylvain', 'Durif', 'merlinlhommevert@orianna.world', 'christcosmique', 'weed666', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `id_qcm` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `bAutorise` tinyint(1) NOT NULL,
  `bBloque` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_qcm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`id_qcm`, `id_test`, `id_quest`, `bAutorise`, `bBloque`) VALUES
(0, 1, 1, 0, 0),
(1, 1, 1, 1, 0),
(2, 36, 1, 0, 0),
(3, 39, 1, 0, 0),
(4, 39, 2, 0, 0),
(5, 39, 3, 0, 0),
(6, 40, 1, 0, 0),
(7, 40, 2, 0, 0),
(8, 40, 3, 0, 0),
(9, 40, 5, 0, 0),
(10, 41, 1, 0, 0),
(11, 41, 2, 0, 0),
(12, 41, 3, 0, 0),
(13, 41, 5, 0, 0),
(14, 42, 1, 0, 0),
(15, 43, 1, 0, 0),
(16, 45, 1, 0, 0),
(17, 45, 2, 0, 0),
(18, 46, 1, 0, 0),
(19, 47, 1, 0, 0),
(20, 48, 1, 0, 0),
(21, 48, 9, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_quest` int(11) NOT NULL AUTO_INCREMENT,
  `id_theme` int(11) NOT NULL,
  `titre` text COLLATE utf8_bin NOT NULL,
  `texte` text COLLATE utf8_bin NOT NULL,
  `bmultiple` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_quest`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_quest`, `id_theme`, `titre`, `texte`, `bmultiple`) VALUES
(1, 1, 'MVC', 'Que veut dire MVC ?', 0),
(2, 2, 'MATHS', '1*2=', 0),
(3, 2, 'maths', '2*2=', 1),
(4, 1, 'test2ML', 'dfsq', 0),
(5, 1, 'Francais', 'Qu\'est ce qu\'une litotte ?', 0),
(6, 1, 'testmael1110', 'et', 0),
(8, 1, 'fdtytuu', 'ertyuy', 1),
(9, 1, 'Nom', 'Je m\'appelle comment ? ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `id_quest` int(11) NOT NULL,
  `texte_rep` text COLLATE utf8_bin NOT NULL,
  `bvalide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_rep`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_rep`, `id_quest`, `texte_rep`, `bvalide`) VALUES
(1, 1, 'Modèle Contrôle Vue', 1),
(2, 1, 'Modélisation Conception Vue', 0),
(3, 1, 'Modélisation Contrôle Vérification', 0),
(4, 9, 'Alane', 0),
(5, 9, 'Halanne', 0),
(6, 9, 'Allan', 1);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `date_res` date NOT NULL,
  `id_rep` int(11) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`id_res`, `id_test`, `id_etu`, `id_quest`, `date_res`, `id_rep`) VALUES
(1, 1, 2, 1, '2017-10-16', 1),
(3, 41, 1, 1, '2017-10-29', 1),
(4, 41, 1, 1, '2017-10-29', 1),
(5, 41, 1, 1, '2017-10-29', 1),
(6, 41, 1, 1, '2017-10-29', 1),
(7, 41, 1, 1, '2017-10-29', 1),
(8, 41, 1, 1, '2017-10-29', 1),
(9, 41, 1, 1, '2017-10-29', 1),
(10, 41, 1, 1, '2017-10-29', 1),
(11, 41, 1, 1, '2017-10-29', 1),
(12, 40, 1, 1, '2017-10-29', 1),
(13, 40, 1, 1, '2017-10-29', 1),
(14, 40, 1, 1, '2017-10-29', 1),
(15, 40, 1, 1, '2017-10-29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` int(11) NOT NULL,
  `num_grpe` text COLLATE utf8_bin NOT NULL,
  `titre_test` text COLLATE utf8_bin NOT NULL,
  `date_test` date NOT NULL,
  `bActif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id_test`, `id_prof`, `num_grpe`, `titre_test`, `date_test`, `bActif`) VALUES
(1, 0, '0', '', '0000-00-00', 0),
(2, 1, '206', 'Test sur les connaissances vues en cours', '2017-10-01', 1),
(5, 1, '2', 'Lol', '0000-00-00', 0),
(6, 1, '2', 'Lol', '0000-00-00', 0),
(10, 1, 'h', 'gh', '2017-10-11', 0),
(11, 1, 'trololol', 'ksldq', '2017-10-11', 0),
(13, 1, '206', 'TESTAAV', '2017-10-11', 0),
(14, 1, '207', 'TESTAAV2', '2017-10-11', 0),
(15, 1, '203', 'Test 1', '2017-10-25', 0),
(16, 1, '203', 'Test 1', '2017-10-25', 0),
(17, 1, '203', 'Test 1', '2017-10-25', 0),
(18, 1, '203', 'Test 1', '2017-10-25', 0),
(19, 1, '203', 'Test 1', '2017-10-25', 0),
(20, 1, '203', 'Test 1', '2017-10-25', 0),
(21, 1, '203', 'Test 1', '2017-10-25', 0),
(22, 1, '203', 'Test 1', '2017-10-25', 0),
(23, 1, '201', '', '2017-10-25', 0),
(24, 1, '203', 'Test 1', '2017-10-25', 0),
(25, 1, '203', 'Test 1', '2017-10-25', 0),
(26, 1, '203', 'Test 1', '2017-10-25', 0),
(27, 1, '203', 'Test 1', '2017-10-25', 0),
(28, 1, '203', 'Test 1', '2017-10-25', 0),
(29, 1, '203', 'Test 1', '2017-10-25', 0),
(30, 1, '203', 'Test 1', '2017-10-25', 0),
(31, 1, '203', 'Test 1', '2017-10-25', 0),
(32, 1, '203', 'Test 1', '2017-10-25', 0),
(33, 1, '203', 'Test 1', '2017-10-25', 0),
(34, 1, '203', 'Test 1', '2017-10-25', 0),
(35, 1, '203', 'Test 1', '2017-10-25', 0),
(36, 1, '203', 'Test 1', '2017-10-25', 0),
(37, 1, '203', 'Test 1', '2017-10-25', 0),
(38, 1, '203', 'Test 1', '2017-10-25', 0),
(39, 1, '203', 'Test 1', '2017-10-25', 0),
(40, 1, '206', 'Test Multi-thèmes 1', '2017-10-25', 1),
(41, 1, '206', 'Test Multi-thèmes 1', '2017-10-25', 1),
(42, 1, '201', 'Test pour voir si la création fonctionne', '2017-10-30', 0),
(43, 1, '206', 'Test test', '2017-10-31', 0),
(44, 1, '201', 'Test', '2017-10-31', 0),
(45, 1, '207', 'a', '2017-10-31', 0),
(46, 1, '206', 'test date', '2017-10-31', 0),
(47, 1, '201', 'Test timezone', '2017-10-31', 0),
(48, 1, '206', 'Test2', '2017-11-01', 0);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `titre_theme` text COLLATE utf8_bin NOT NULL,
  `desc_theme` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `titre_theme`, `desc_theme`) VALUES
(1, 'PWEB', 'Connaissance du cours'),
(2, 'Programmation en Java', 'Connaissance théorique ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
