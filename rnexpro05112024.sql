-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: wallmaster
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `changeorder`
--

DROP TABLE IF EXISTS `changeorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `changeorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_id` varchar(45) DEFAULT NULL,
  `issued_date` varchar(45) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changeorder`
--

LOCK TABLES `changeorder` WRITE;
/*!40000 ALTER TABLE `changeorder` DISABLE KEYS */;
INSERT INTO `changeorder` VALUES (19,'1234','05/05/2024','05/05/2024',3);
/*!40000 ALTER TABLE `changeorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `changeorder_item`
--

DROP TABLE IF EXISTS `changeorder_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `changeorder_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(255) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `rate` varchar(45) DEFAULT NULL,
  `changeorder_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changeorder_item`
--

LOCK TABLES `changeorder_item` WRITE;
/*!40000 ALTER TABLE `changeorder_item` DISABLE KEYS */;
INSERT INTO `changeorder_item` VALUES (23,'1',1,'1','1','19');
/*!40000 ALTER TABLE `changeorder_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_text` longtext,
  `dailylog_id` int DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailylog`
--

DROP TABLE IF EXISTS `dailylog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dailylog` (
  `dailylog_id` int NOT NULL AUTO_INCREMENT,
  `logdate` varchar(25) DEFAULT NULL,
  `logdate_created` varchar(45) DEFAULT NULL,
  `update` longtext,
  `issue` longtext,
  `pending` longtext,
  `scope` varchar(45) DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `view_by` varchar(255) DEFAULT NULL,
  `other_scope` longtext,
  PRIMARY KEY (`dailylog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailylog`
--

LOCK TABLES `dailylog` WRITE;
/*!40000 ALTER TABLE `dailylog` DISABLE KEYS */;
INSERT INTO `dailylog` VALUES (11,'28/04/2024','28/04/2024','update barudsds','issue baru','pending barudsdsdsdsdsds','0|1|2',3,13,NULL,NULL,'1122'),(12,'29/04/2024','29/04/2024','D','GFG','GFGF','2|3',3,13,NULL,NULL,NULL),(15,'05/05/2024','05/05/2024','123','123','123','0|1',4,17,NULL,NULL,NULL),(17,'05/05/2024','05/05/2024','SADFSDF','FSDFSDFSDFSD','SDFSDR','0|1|2',3,6,NULL,NULL,'OITHER SCOPE'),(18,'05/05/2024','05/05/2024','1232','312312','1312','6',3,6,NULL,NULL,'');
/*!40000 ALTER TABLE `dailylog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailylog_files`
--

DROP TABLE IF EXISTS `dailylog_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dailylog_files` (
  `dailylog_files_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_extension` varchar(255) DEFAULT NULL,
  `dailylog_id` int DEFAULT NULL,
  `description_id` int DEFAULT NULL,
  PRIMARY KEY (`dailylog_files_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailylog_files`
--

LOCK TABLES `dailylog_files` WRITE;
/*!40000 ALTER TABLE `dailylog_files` DISABLE KEYS */;
INSERT INTO `dailylog_files` VALUES (1,'FDL1_1_Screenshot (52).png','image/png',1,1),(2,'FDL1_1_Screenshot (53).png','image/png',1,1),(3,'FDL2_2_Screenshot (8) - Copy.png','image/png',2,2),(4,'FDL2_2_Screenshot (8).png','image/png',2,2),(5,'FDL2_3_Screenshot (30).png','image/png',2,3),(6,'FDL2_4_ic_launcher.png','image/png',2,4),(7,'FDL1_5_3f5e5c5c9e049a57249e2883f7f31518.jpg','image/jpeg',1,5),(8,'FDL1_5_637960.jpg','image/jpeg',1,5),(9,'FDL1_5_1356237.jpg','image/jpeg',1,5),(10,'FDL1_5_4958474.jpg','image/jpeg',1,5),(11,'FDL1_5_ic_launcher.png','image/png',1,5),(12,'FDL1_5_senarai kena check.png','image/png',1,5),(13,'FDL3_6_RexinProSoft_logo.jpeg','image/jpeg',3,6),(14,'FDL8_8_2.png','image/png',8,8),(15,'FDL8_8_3.png','image/png',8,8),(16,'FDL8_8_4.png','image/png',8,8),(17,'FDL8_8_5.png','image/png',8,8),(18,'FDL8_8_111.png','image/png',8,8),(19,'FDL8_9_637960.jpg','image/jpeg',8,9),(20,'FDL9_10_4.png','image/png',9,10),(21,'FDL9_11_5.png','image/png',9,11),(22,'FDL10_12_4958474.jpg','image/jpeg',10,12),(23,'FDL10_12_5.png','image/png',10,12),(24,'FDL10_13_111.png','image/png',10,13),(25,'FDL10_13_2.png','image/png',10,13),(26,'FDL10_14_5.png','image/png',10,14),(27,'FDL10_14_111.png','image/png',10,14),(28,'FDL10_14_637960.jpg','image/jpeg',10,14),(31,'FDL11_15_3.png','image/png',11,15),(32,'FDL11_16_1.png','image/png',11,16),(40,'FDL11_15_5.png','image/png',11,15),(41,'FDL11_15_111.png','image/png',11,15),(43,'FDL15_17_Untitled.png','image/png',15,17);
/*!40000 ALTER TABLE `dailylog_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailylog_files_description`
--

DROP TABLE IF EXISTS `dailylog_files_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dailylog_files_description` (
  `dailylog_files_description_id` int NOT NULL AUTO_INCREMENT,
  `description_name` longtext,
  `dailylog_id` int DEFAULT NULL,
  PRIMARY KEY (`dailylog_files_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailylog_files_description`
--

LOCK TABLES `dailylog_files_description` WRITE;
/*!40000 ALTER TABLE `dailylog_files_description` DISABLE KEYS */;
INSERT INTO `dailylog_files_description` VALUES (1,'baru',1),(2,'SDADSA',2),(3,'new',2),(4,'ic',2),(5,'test',1),(6,'dsds',3),(7,'test',4),(8,'test',8),(9,'this one',8),(10,'gambar 1',9),(11,'gambar 2',9),(12,'test',10),(13,'rere',10),(14,'sdsdsdsd',10),(15,'DESCRIPTION 1',11),(16,'TEST DESCRIPTION',11),(17,'qwewq',15);
/*!40000 ALTER TABLE `dailylog_files_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) DEFAULT NULL,
  `job_prefix` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `contract` float DEFAULT NULL,
  `job_group` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `meters` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `permit` varchar(255) DEFAULT NULL,
  `postcode` int DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `end_date` varchar(45) DEFAULT NULL,
  `schedulecolor` varchar(45) DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (3,'JOB ENCIK AIDIL ssAAss',NULL,'Ongoing','SsdaAS',1233,NULL,'Abdul hadi','jalan reko','20000','cheras','none',441234,'belakang tnb','Encik Aidil','011232323','ss@gmail.com','6|',NULL,NULL,NULL,1),(4,'JOB NEW',NULL,'Ongoing','1234',55888,NULL,NULL,'123','123','123','123',123,'3123','123','123','123',NULL,NULL,NULL,NULL,2),(5,'andika',NULL,'Ongoing','andika',0,NULL,'Andika Putra','andika','andika','andika','andika',0,'andika','andika','andika','andika','24|',NULL,NULL,NULL,3);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectfiles`
--

DROP TABLE IF EXISTS `projectfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectfiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pj_filename` varchar(45) DEFAULT NULL,
  `pj_extension` varchar(45) DEFAULT NULL,
  `pj_jobid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectfiles`
--

LOCK TABLES `projectfiles` WRITE;
/*!40000 ALTER TABLE `projectfiles` DISABLE KEYS */;
INSERT INTO `projectfiles` VALUES (1,'FP10_637960.jpg','image/jpeg',10),(2,'FP10_1356237.jpg','image/jpeg',10),(3,'FP10_4958474.jpg','image/jpeg',10),(4,'FP10_INVOICE 1.pdf','application/pdf',10);
/*!40000 ALTER TABLE `projectfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule` (
  `schedule_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` longtext,
  `job_name` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `bgColor` varchar(45) DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (15,'sd','sdf','JOB ENCIK AIDIL ssAAss','2024-05-07T00:00:00.000Z','2024-05-15T00:00:00.000Z','#000000',3);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `group_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'admin','Abdul hadi','1234',2,'admin@yahoo.com','A','0123658974',1),(13,'aidil','aidil ammar','1234',1,'aidil@yahoo.com','A','0123658974',1),(17,'testuser','test user','1234',1,'mnurhamizi98@gmail.com','A','01123232335',2),(21,'123','123 123','123',2,'123@gmail.com','D','123',2),(22,'1sat','1sat 1sat','1234',3,'dsds@gmail.com','A','01123232335',1),(23,'putra97','Andika Putra','1234',1,'putra97@gmail.com','A','011233232123',3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_group` (
  `group_id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'Wallmaster'),(2,'123'),(3,'Microsoft'),(4,'1234'),(5,'1234');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor` (
  `vendor_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` longtext,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (1,'dsds','1123','dsdsd@gmail.com','sds');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-11  9:34:07
