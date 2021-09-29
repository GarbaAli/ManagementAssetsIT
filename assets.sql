-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2021 at 07:18 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmd`
--

DROP TABLE IF EXISTS `cmd`;
CREATE TABLE IF NOT EXISTS `cmd` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `po` varchar(45) DEFAULT NULL,
  `dte_livraison` date DEFAULT NULL,
  `fournisseur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `fk_cmd_fournisseur_idx` (`fournisseur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmd`
--

INSERT INTO `cmd` (`id_cmd`, `po`, `dte_livraison`, `fournisseur_id`) VALUES
(1, '1123654', '2021-07-08', 1),
(2, '551551215', '2021-09-02', 2),
(5, '8822114', '2021-08-13', 1),
(6, '455777', '2021-09-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_compte` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_dept` int(11) NOT NULL,
  `libelle_dept` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `id_famille` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_famille` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_famille`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `famille`
--

INSERT INTO `famille` (`id_famille`, `libelle_famille`) VALUES
(1, 'Ecran'),
(2, 'UC'),
(3, 'Imprimante'),
(6, 'Disque dur');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fsseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fsseur` varchar(100) DEFAULT NULL,
  `email_fsseur` varchar(50) DEFAULT NULL,
  `phone1_fsseur` varchar(45) DEFAULT NULL,
  `phone2_fsseur` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_fsseur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fsseur`, `nom_fsseur`, `email_fsseur`, `phone1_fsseur`, `phone2_fsseur`) VALUES
(1, 'SECEL', 'secel@gmail.com', '0', '0'),
(2, 'Perenco', 'perenco@gmail.com', '6111111', '678415820');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id_items` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_item` varchar(45) DEFAULT NULL,
  `qte_item` int(11) DEFAULT NULL,
  `famille_id` int(11) NOT NULL,
  `cmd_id` int(11) NOT NULL,
  PRIMARY KEY (`id_items`),
  KEY `fk_items_famille1_idx` (`famille_id`),
  KEY `fk_items_cmd1_idx` (`cmd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_items`, `libelle_item`, `qte_item`, `famille_id`, `cmd_id`) VALUES
(1, 'hp007', 5, 2, 2),
(2, 'dell', 8, 1, 2),
(3, 'lenovo', 1, 3, 2),
(4, 'Itel', 2, 2, 1),
(7, 'tekno', 2, 2, 5),
(8, 'dell', 2, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `id_mat` int(11) NOT NULL AUTO_INCREMENT,
  `code_mat` varchar(45) DEFAULT NULL,
  `designation_mat` varchar(100) DEFAULT NULL,
  `sn` varchar(45) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `num_mac` varchar(45) DEFAULT NULL,
  `etat` varchar(45) DEFAULT NULL,
  `service` varchar(45) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `observation` varchar(200) DEFAULT NULL,
  `statut` varchar(45) DEFAULT NULL,
  `derniere_localisation` varchar(100) DEFAULT NULL,
  `items_id` int(11) DEFAULT NULL,
  `compte_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mat`),
  KEY `fk_materiel_items1_idx` (`items_id`),
  KEY `fk_materiel_compte1_idx` (`compte_id`),
  KEY `fk_materiel_utilisateur1_idx` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materiel`
--

INSERT INTO `materiel` (`id_mat`, `code_mat`, `designation_mat`, `sn`, `reference`, `num_mac`, `etat`, `service`, `modele`, `observation`, `statut`, `derniere_localisation`, `items_id`, `compte_id`, `utilisateur_id`) VALUES
(1, 'code ', 'designation', 'lhlbjkllvv', NULL, NULL, 'bon', 'radio', NULL, NULL, 'en stock', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materiel_site`
--

DROP TABLE IF EXISTS `materiel_site`;
CREATE TABLE IF NOT EXISTS `materiel_site` (
  `materiel_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `dte_affectation` date DEFAULT NULL,
  `batiment` varchar(70) DEFAULT NULL,
  `bureau` varchar(70) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`materiel_id`,`site_id`),
  KEY `fk_materiel_has_site_site1_idx` (`site_id`),
  KEY `fk_materiel_has_site_materiel1_idx` (`materiel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id_site`, `libelle_site`) VALUES
(1, 'MASSONGOSSS'),
(2, 'BASE WOURI'),
(6, 'bipaga'),
(7, 'Bassa'),
(8, 'tonton'),
(9, 'test'),
(10, 'Garba'),
(11, 'ali'),
(12, 'MASSONGO'),
(14, 'addsite');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom_user` varchar(200) DEFAULT NULL,
  `email_user` varchar(45) DEFAULT NULL,
  `fonction_user` varchar(45) DEFAULT NULL,
  `staff_user` varchar(45) DEFAULT NULL,
  `phone_user` varchar(45) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `departement_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_utilisateur_departement1_idx` (`departement_id`),
  KEY `fk_utilisateur_role1_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cmd`
--
ALTER TABLE `cmd`
  ADD CONSTRAINT `fk_cmd_fournisseur1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id_fsseur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_cmd1` FOREIGN KEY (`cmd_id`) REFERENCES `cmd` (`id_cmd`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_items_famille1` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id_famille`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `fk_materiel_compte1` FOREIGN KEY (`compte_id`) REFERENCES `compte` (`id_compte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materiel_items1` FOREIGN KEY (`items_id`) REFERENCES `items` (`id_items`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materiel_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materiel_site`
--
ALTER TABLE `materiel_site`
  ADD CONSTRAINT `fk_materiel_has_site_materiel1` FOREIGN KEY (`materiel_id`) REFERENCES `materiel` (`id_mat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materiel_has_site_site1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id_site`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_departement1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id_dept`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
