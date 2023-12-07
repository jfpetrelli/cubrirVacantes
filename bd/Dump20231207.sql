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
INSERT INTO `users` VALUES ('aaaaaaaa','12345678','TEST',0,'Test','DNI','12345678','1994-06-04','a','Buenos Aires','a','aaaaaa@aaaa.com','',''),('adasd','00000000','asdasd',0,'adasd','DNI','adadsdad','2023-08-19','ada','Buenos Aires','adad','adasds@asdasd.com','asd',''),('admin','12345678','Admin',1,'Admin','DNI','10200300','1982-01-01','Rosario','Santa Fe','Oroño 2555','jfpetrelli@gmail.com','3',NULL),('asdasda','asdasdasd','asddasda',0,'adadd','DNI','123456','2023-08-19','adasd','Buenos Aires','adad','sdasdad@asdasd.com','',''),('asdasdd','12345678','adasd',0,'adasdad','DNI','12313','2023-08-19','1asd','Buenos Aires','adad','asdad@asdads.com','',''),('demo','12345678','Demo',0,'Demo','DNI','20300400','1990-01-01','Rosario','Santa Fe','Pellegrini 1323','demo@gmail.com','9','D'),('demo0','12345678','DEMO 0',0,'Demo 0','DNI','12345678','2023-09-02','Rosario','Buenos Aires','Salta','demo0@asc.com','',''),('demo2','12345678','Demo2',0,'Demo2','DNI','25897452','2000-01-05','Capital','Buenos Aires','Velez Sarfield 5897','demo2@gmail.com','',''),('profe','12345678','profe',2,'profe','DNI','123345678','1992-05-07','Rosario','Santa Fe','Salta 123','profe@gmail.com',NULL,NULL),('pruebatotti','123123123','sdasldakd',0,'asdadd','DNI','545689','2023-08-19','aaaa','Buenos Aires','aaaa','prueba@asdasd.com','',''),('test','12345678','totti',0,'totti','DNI','123124532','2023-08-19','Rosario','Buenos Aires','adad','test@gmail.com','asda','a'),('totti123','12345678','Juan',0,'Petrelli','Libreta Civica','12312312','1999-02-24','test','Buenos Aires','test','totti123@gmail.com','','');
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
INSERT INTO `users_vacants` VALUES ('demo',3,'2023-08-18','CV Juan Franco Petrelli.pdf',20),('demo',13,'2023-11-24','F - Solicitud de empleo PIA.docx',0),('totti123',13,'2023-11-24','Juan Franco Petrelli - Recuperatorio 09_11_2023 Teoría.docx',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacants`
--

LOCK TABLES `vacants` WRITE;
/*!40000 ALTER TABLE `vacants` DISABLE KEYS */;
INSERT INTO `vacants` VALUES (2,'TEST','Ingeniería de Sistemas','2023-08-13','2023-08-13','','../cvs/TEST 2023-08-15 2023-08-15',_binary ''),(3,'adasdad','Ingeniería de Sistemas','2023-08-17','2023-08-17','aaaa','../cvs/adasdad 2023-08-18 2023-08-19',_binary ''),(4,'test','Ingeniería de Sistemas','2023-08-19','2023-08-20','','../cvs/test 2023-08-22 2023-08-22',_binary ''),(5,'aaaa','Ingeniería de Sistemas','2023-08-22','2023-08-22','','../cvs/aaaa 2023-08-22 2023-08-22',_binary '\0'),(6,'Suplente Matematica Superior','Ingeniería de Sistemas','2023-08-22','2023-09-10','Prueba','../cvs/Suplente Matematica Superior 2023-08-22 2023-09-10',_binary '\0'),(7,'Titular Adm, Gerencial','Ingeniería de Sistemas','2023-08-22','2023-09-10','','../cvs/Titular Adm, Gerencial 2023-08-22 2023-09-10',_binary '\0'),(8,'Titular An. Mat, I','Ingeniería de Sistemas','2023-08-14','2023-08-22','Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test  Test Test Test Test Test Test ','../cvs/Titular An. Mat, I 2023-08-14 2023-08-22',_binary '\0'),(9,'asdsadadasdasdasd','Ingeniería de Sistemas','2023-08-20','2023-09-01','asdasdsadasdasd','../cvs/asdsadadasdasdasd 2023-08-22 2023-09-01',_binary '\0'),(10,'aasdasd','Ingeniería de Sistemas','2023-08-23','2023-08-23','asdsad','../cvs/aasdasd 2023-08-23 2023-08-23',_binary ''),(11,'PRUEBA TOTTI','Ingeniería de Sistemas','2023-09-04','2023-09-04','adasd','../cvs/PRUEBA TOTTI 2023-09-04 2023-09-04',_binary '\0'),(12,'Prueba 24/11','Ingeniería Mecánica','2023-11-24','2023-11-25','PRUEBA 24/11','../cvs/Prueba 24/11 2023-11-24 2023-11-25',_binary '\0'),(13,'PRUEBA 2411','Ingeniería de Sistemas','2023-11-22','2023-11-23','PRUEBA 2411','../cvs/PRUEBA 2411 2023-11-24 2023-11-25',_binary '\0');
/*!40000 ALTER TABLE `vacants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 19:33:17
