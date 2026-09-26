-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mvc_php_td2
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `mvc_php_td2`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mvc_php_td2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `mvc_php_td2`;

--
-- Table structure for table `passager`
--

DROP TABLE IF EXISTS `passager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passager` (
  `trajet_id` int(11) NOT NULL,
  `utilisateur_login` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`trajet_id`,`utilisateur_login`),
  KEY `utilisateur_login` (`utilisateur_login`),
  CONSTRAINT `passager_ibfk_1` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `passager_ibfk_2` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passager`
--

LOCK TABLES `passager` WRITE;
/*!40000 ALTER TABLE `passager` DISABLE KEYS */;
/*!40000 ALTER TABLE `passager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(32) DEFAULT NULL,
  `arrivee` varchar(32) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nbplaces` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `conducteur_login` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conducteur_login` (`conducteur_login`),
  CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trajet`
--

LOCK TABLES `trajet` WRITE;
/*!40000 ALTER TABLE `trajet` DISABLE KEYS */;
INSERT INTO `trajet` VALUES (1,'Gap','Marseille','2026-09-15',3,20,'jdupont'),(3,'Briançon','Gap','2026-09-18',4,10,'mbardet');
/*!40000 ALTER TABLE `trajet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES ('jdupont','Dupont','Jean'),('mbardet','Bardet','Marie');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voiture` (
  `immatriculation` varchar(9) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` VALUES ('00-OOO-00','Mickey','Turcoise'),('AA-000-AA','Peugeot','Rouge'),('XX-999-YY','Peugeot','Rouge');
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;

