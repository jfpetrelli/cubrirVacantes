-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: cubrir_vacantes
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `surname` varchar(45) NOT NULL,
  `document_type` varchar(45) NOT NULL,
  `document_number` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `appart` varchar(45) DEFAULT NULL,
  `floor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','12345678','Admin',1,'Admin','DNI','10200300','1982-01-01','Rosario','Santa Fe','Oroño 2555','jfpetrelli@gmail.com','3',NULL),('profe','12345678','profe',2,'profe','DNI','123345678','1992-05-07','Rosario','Santa Fe','Salta 123','profe@gmail.com',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_vacants`
--

DROP TABLE IF EXISTS `users_vacants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_vacants` (
  `user` varchar(45) NOT NULL,
  `vacant` int NOT NULL,
  `date` date NOT NULL,
  `cvFile` varchar(255) DEFAULT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`user`,`vacant`,`date`),
  KEY `FK_user_users_vacants_idx` (`vacant`),
  CONSTRAINT `FK_users_users_vacants` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK_vacants_users_vacants` FOREIGN KEY (`vacant`) REFERENCES `vacants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_vacants`
--

LOCK TABLES `users_vacants` WRITE;
/*!40000 ALTER TABLE `users_vacants` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_vacants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacants`
--

DROP TABLE IF EXISTS `vacants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `place` varchar(45) NOT NULL,
  `career` varchar(45) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `detail` longtext,
  `path` varchar(100) NOT NULL,
  `end_vacant` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacants`
--

LOCK TABLES `vacants` WRITE;
/*!40000 ALTER TABLE `vacants` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cubrir_vacantes'
--

--
-- Dumping routines for database 'cubrir_vacantes'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-19 12:08:00
