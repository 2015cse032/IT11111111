-- MySQL dump 10.13  Distrib 5.7.22, for Linux (i686)
--
-- Host: localhost    Database: it
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `block_user`
--

DROP TABLE IF EXISTS `block_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block_user` (
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_user`
--

LOCK TABLES `block_user` WRITE;
/*!40000 ALTER TABLE `block_user` DISABLE KEYS */;
INSERT INTO `block_user` VALUES (''),('ana@gmail.com'),('chandu@gmail.com'),('na@gmail.com');
/*!40000 ALTER TABLE `block_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'christ','9875612341','christ@gmail.com'),(2,'reddy','9666939143','reddy@gmail.com');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_feedback`
--

DROP TABLE IF EXISTS `contact_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email` (`email`),
  CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `contact` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_feedback`
--

LOCK TABLES `contact_feedback` WRITE;
/*!40000 ALTER TABLE `contact_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `countrycode` int(3) NOT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `educationalqualification` varchar(20) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,'john','s','doe',91,'9752-543-653',20,'john@gmail.com','john123',NULL,'admin'),(2,'sam','d','grin',91,'9646-543-456',25,'sam@gmail.com','sam123','undergraduate','user'),(3,'chandana','c','reddy',86,'9071-136-755',20,'chandu@gmail.com','chandu123','undergraduate','user'),(4,'gourla','g','karthik',91,'9666-939-143',21,'gourla1023@gmail.com','janu143','undergraduate','user'),(5,'chandu','chandana','reddy',91,'9071136755',20,'chandu@gmail.com','chandu123','under graduate','user'),(6,'chandu','chandana','REDDY',91,'9071136755',20,'chandu@gmail.com','chandu123','under graduate','user'),(7,'chandu','chandana','reddy',91,'9071-136-755',20,'chandu@gmail.com','chandu123','under graduate','user'),(8,'chandu','chandana','reddy',91,'9071-136-755',20,'chandu@gmail.com','chandu123','under graduate','user'),(9,'chandu','chandana','reddy',91,'9071-136-755',20,'chandu@gmail.com','chandu123','under graduate','user');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_data`
--

DROP TABLE IF EXISTS `exam_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_data` (
  `exam_code` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `question_paper` varchar(255) DEFAULT NULL,
  `Answer_paper` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_data`
--

LOCK TABLES `exam_data` WRITE;
/*!40000 ALTER TABLE `exam_data` DISABLE KEYS */;
INSERT INTO `exam_data` VALUES ('GATE',2017,'data.pdf','','2017-12-07 18:06:38'),('gate1',2018,'data.pdf','data.pdf','2017-12-07 18:06:38');
/*!40000 ALTER TABLE `exam_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_details`
--

DROP TABLE IF EXISTS `exam_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_details` (
  `exam_name` varchar(30) NOT NULL,
  `exam_code` varchar(10) NOT NULL,
  `department` varchar(15) NOT NULL,
  PRIMARY KEY (`exam_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_details`
--

LOCK TABLES `exam_details` WRITE;
/*!40000 ALTER TABLE `exam_details` DISABLE KEYS */;
INSERT INTO `exam_details` VALUES ('GATE','GATE','cse'),('gate1','gate1','cse');
/*!40000 ALTER TABLE `exam_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_answer`
--

DROP TABLE IF EXISTS `forum_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_answer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL,
  `a_name` varchar(65) NOT NULL,
  `a_email` varchar(65) NOT NULL,
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) DEFAULT NULL,
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_answer`
--

LOCK TABLES `forum_answer` WRITE;
/*!40000 ALTER TABLE `forum_answer` DISABLE KEYS */;
INSERT INTO `forum_answer` VALUES (0,1,'jack','jack@gmail.com','hello world','10/12/17 11:41:58');
/*!40000 ALTER TABLE `forum_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_question`
--

DROP TABLE IF EXISTS `forum_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetime` varchar(25) DEFAULT NULL,
  `view` int(10) DEFAULT NULL,
  `reply` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_question`
--

LOCK TABLES `forum_question` WRITE;
/*!40000 ALTER TABLE `forum_question` DISABLE KEYS */;
INSERT INTO `forum_question` VALUES (1,'algorithms','hello iam chandana','chandana','chandu@gmail.com','06/12/17 08:45:34',NULL,NULL),(2,'algorithms','hello iam gk','gk','gourla@gmail.com','05/12/17 08:40:34',NULL,NULL),(3,'daa','hello iam sam','sam','sam@gmail.com','06/12/17 08:51:40',NULL,NULL);
/*!40000 ALTER TABLE `forum_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `email` varchar(65) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('chandu@gmail.com','chandu123','admin'),('ana@gmail.com','ana345','user'),('gk@gmail.com','gk567','user');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `branch` varchar(30) DEFAULT NULL,
  `cource` varchar(30) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `semester` int(10) DEFAULT NULL,
  `updatetd_dated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES (1,'computerscience','ooad',3,'ooadquestionpaper',4,'2018-01-01 17:25:08','2018-01-02 23:14:09'),(2,'cse','ooad',2,'cheat.pdf',3,'2018-01-01 17:25:08','2018-01-01 23:14:09'),(3,'cse','ooad',3,'cheat.pdf',2,'2018-01-03 17:25:08','2018-01-01 23:14:09'),(4,'cse','ooad',3,'cheat.pdf',2,'2018-01-01 17:25:08','2018-01-02 23:14:09'),(5,'cse','ooad',3,'cheat.pdf',2,'2018-01-03 17:25:08','2018-01-12 23:14:09'),(6,'cse','ooad',3,'cheat.pdf',2,'2018-01-01 17:25:08','2018-11-01 22:14:09'),(34,'CSE','daa',4,'network_lab_manual_17.pdf',3,'2018-05-14 14:05:51','2018-05-14 14:05:51');
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_details`
--

DROP TABLE IF EXISTS `upload_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cource` varchar(20) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_details`
--

LOCK TABLES `upload_details` WRITE;
/*!40000 ALTER TABLE `upload_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_exe`
--

DROP TABLE IF EXISTS `upload_exe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_exe` (
  `year` int(5) NOT NULL,
  `file` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) DEFAULT NULL,
  PRIMARY KEY (`year`),
  KEY `id` (`id`),
  CONSTRAINT `upload_exe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `upload_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_exe`
--

LOCK TABLES `upload_exe` WRITE;
/*!40000 ALTER TABLE `upload_exe` DISABLE KEYS */;
INSERT INTO `upload_exe` VALUES (3,'data.pdf','2017-11-12 23:15:29','2017-11-12 23:15:29',NULL),(4,'ds.pdf','2017-11-12 23:12:38','2017-11-12 23:14:49',NULL);
/*!40000 ALTER TABLE `upload_exe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-14 12:16:41
