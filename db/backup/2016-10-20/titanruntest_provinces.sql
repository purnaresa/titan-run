CREATE DATABASE  IF NOT EXISTS `titan_run_dev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `titan_run_dev`;
-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: titan_run_dev
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pack` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,1,'Aceh',0,'2015-09-17 19:32:24'),(2,2,'Sumatera Utara',0,'2015-09-17 19:32:24'),(3,3,'Sumatera Barat',0,'2015-09-17 19:32:24'),(4,4,'Riau',0,'2015-09-17 19:32:24'),(5,5,'Kepulauan Riau',0,'2015-09-17 19:32:24'),(6,6,'Jambi',0,'2015-09-17 19:32:24'),(7,7,'Bengkulu',0,'2015-09-17 19:32:24'),(8,8,'Sumatera Selatan',0,'2015-09-17 19:32:24'),(9,9,'Bangka Belitung',0,'2015-09-17 19:32:24'),(10,10,'Lampung',0,'2015-09-17 19:32:24'),(11,11,'Kalimantan Barat',0,'2015-09-17 19:32:24'),(12,12,'Kalimantan Timur',0,'2015-09-17 19:32:24'),(13,13,'Kalimantan Utara',0,'2015-09-17 19:32:24'),(14,14,'Kalimantan Tengah',0,'2015-09-17 19:32:24'),(15,15,'Kalimantan Selatan',0,'2015-09-17 19:32:24'),(16,16,'Banten',1,'2015-09-17 19:32:24'),(17,17,'DKI Jakarta',1,'2015-09-17 19:32:24'),(18,18,'Jawa Tengah',0,'2015-09-17 19:32:24'),(19,19,'DI Yogyakarta',0,'2015-09-17 19:32:24'),(20,20,'Jawa Barat',1,'2015-09-17 19:32:24'),(21,21,'Jawa Timur',0,'2015-09-17 19:32:24'),(22,22,'Bali',0,'2015-09-17 19:32:24'),(23,23,'Nusa Tenggara Barat',0,'2015-09-17 19:32:24'),(24,24,'Nusa Tenggara Timur',0,'2015-09-17 19:32:24'),(25,25,'Sulawesi Utama',0,'2015-09-17 19:32:24'),(26,26,'Gorontalo',0,'2015-09-17 19:32:24'),(27,27,'Sulawesi Tengah',0,'2015-09-17 19:32:24'),(28,28,'Sulawesi Barat',0,'2015-09-17 19:32:24'),(29,29,'Sulawesi Selatan',0,'2015-09-17 19:32:24'),(30,30,'Sulawesi Tenggara',0,'2015-09-17 19:32:24'),(31,31,'Maluku Utara',0,'2015-09-17 19:32:24'),(32,32,'Maluku',0,'2015-09-17 19:32:24'),(33,33,'Papua Barat',0,'2015-09-17 19:32:24'),(34,34,'Papua',0,'2015-09-17 19:32:24');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 11:30:40
