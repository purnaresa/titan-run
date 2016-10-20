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
-- Temporary table structure for view `v_race_events`
--

DROP TABLE IF EXISTS `v_race_events`;
/*!50001 DROP VIEW IF EXISTS `v_race_events`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_race_events` (
  `id` tinyint NOT NULL,
  `member_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `timer` tinyint NOT NULL,
  `converter` tinyint NOT NULL,
  `conv` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `race_eventvs`
--

DROP TABLE IF EXISTS `race_eventvs`;
/*!50001 DROP VIEW IF EXISTS `race_eventvs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `race_eventvs` (
  `id` tinyint NOT NULL,
  `member_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `timer` tinyint NOT NULL,
  `converter` tinyint NOT NULL,
  `conv` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_race_events`
--

/*!50001 DROP TABLE IF EXISTS `v_race_events`*/;
/*!50001 DROP VIEW IF EXISTS `v_race_events`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_race_events` AS (select `race_events`.`id` AS `id`,`race_events`.`member_id` AS `member_id`,`race_events`.`name` AS `name`,`race_events`.`category_id` AS `category_id`,`race_events`.`year` AS `year`,`race_events`.`timer` AS `timer`,`race_events`.`converter` AS `converter`,(time_to_sec(`race_events`.`timer`) * 1000) AS `conv` from `race_events`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `race_eventvs`
--

/*!50001 DROP TABLE IF EXISTS `race_eventvs`*/;
/*!50001 DROP VIEW IF EXISTS `race_eventvs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `race_eventvs` AS (select `race_events`.`id` AS `id`,`race_events`.`member_id` AS `member_id`,`race_events`.`name` AS `name`,`race_events`.`category_id` AS `category_id`,`race_events`.`year` AS `year`,`race_events`.`timer` AS `timer`,`race_events`.`converter` AS `converter`,(time_to_sec(`race_events`.`timer`) * 1000) AS `conv` from `race_events`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 11:30:43
