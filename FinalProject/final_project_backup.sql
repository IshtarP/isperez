-- MySQL dump 10.13  Distrib 5.7.22, for osx10.13 (x86_64)
--
-- Host: localhost    Database: final_project
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `car_admin`
--

DROP TABLE IF EXISTS `car_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_admin` (
  `adminid` tinyint(4) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `userName` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_admin`
--

LOCK TABLES `car_admin` WRITE;
/*!40000 ALTER TABLE `car_admin` DISABLE KEYS */;
INSERT INTO `car_admin` VALUES (1,'Admin','Admin','admin','secret'),(2,'Cristal','Perez','Iperez','America12');
/*!40000 ALTER TABLE `car_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_lot`
--

DROP TABLE IF EXISTS `car_lot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_lot` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `exterior_color` varchar(20) DEFAULT NULL,
  `used_or_new` varchar(20) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `car_lot_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `car_model` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_lot`
--

LOCK TABLES `car_lot` WRITE;
/*!40000 ALTER TABLE `car_lot` DISABLE KEYS */;
INSERT INTO `car_lot` VALUES (1,6,2014,45000,'black','used','./img/1.jpg'),(2,4,2018,24000,'Energy Green','new','./img/2.jpg'),(3,19,2017,38950,'red','new','./img/3.jpg'),(4,14,2017,35655,'blue','new','./img/4.jpg'),(5,21,2018,97000,'red','new','./img/5.jpg'),(6,22,2015,26000,'white','new','./img/6.jpg'),(7,19,2015,24000,'black','used','./img/7.jpg'),(8,21,2018,79000,'blue','new','./img/8.jpg'),(9,11,2018,55000,'red','new','./img/9.jpg'),(10,18,2015,35790,'silver','used','./img/10.jpg'),(11,16,2018,130000,'silver','new','./img/11.jpg'),(12,3,2018,34000,'red','new','./img/12.jpg'),(13,16,2010,75000,'black','used','./img/13.jpg'),(14,17,2009,16845,'red','used','./img/14.jpg'),(15,16,2006,40000,'silver','used','./img/15.jpg'),(16,2,2009,13000,'red','used','./img/16.jpg'),(17,1,2015,55351,'red','used','./img/17.jpg'),(18,9,2014,25670,'green','used','./img/18.jpg'),(19,20,2018,91000,'Miami blue','new','./img/19.jpg'),(20,8,2018,27295,'black','new','./img/20.jpg'),(21,23,2015,22223,'blue','used','./img/21.jpg'),(22,5,2018,66500,'Austin yellow','new','./img/22.jpg'),(23,4,2004,16062,'red','used','./img/23.jpg'),(24,13,2018,55594,'black','new','./img/24.jpg'),(25,12,2018,92000,'Autumn Shimmer','new','./img/25.jpg');
/*!40000 ALTER TABLE `car_lot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_make`
--

DROP TABLE IF EXISTS `car_make`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_name` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_make`
--

LOCK TABLES `car_make` WRITE;
/*!40000 ALTER TABLE `car_make` DISABLE KEYS */;
INSERT INTO `car_make` VALUES (1,'Nissan'),(2,'Honda'),(3,'BMW'),(4,'Dodge'),(5,'Ford'),(6,'Chevrolet'),(7,'VW'),(8,'Mercedes'),(9,'Audi'),(10,'Lexus'),(11,'Porsche'),(12,'Subaru');
/*!40000 ALTER TABLE `car_make` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_model`
--

DROP TABLE IF EXISTS `car_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) DEFAULT NULL,
  `model_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`model_id`),
  KEY `make_id` (`make_id`),
  CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `car_make` (`make_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_model`
--

LOCK TABLES `car_model` WRITE;
/*!40000 ALTER TABLE `car_model` DISABLE KEYS */;
INSERT INTO `car_model` VALUES (1,1,'GTR'),(2,1,'370Z coupe'),(3,2,'Civic Type R'),(4,2,'Civic si '),(5,3,'M3'),(6,3,'M2'),(7,3,'i8'),(8,4,'Challenger'),(9,5,'Focus Rs'),(10,5,'mustang'),(11,5,'Shelby GT 350'),(12,10,'LC'),(13,6,'corvette stingray'),(14,7,'Golf R'),(15,8,'SLC-Class'),(16,9,'R8 coupe'),(17,9,'TT Rs'),(18,9,'Rs 5 coupe'),(19,10,'Q60'),(20,11,'911 carrera'),(21,11,'718 cayman Gts '),(22,12,'WRX Sti'),(23,12,'BRZ');
/*!40000 ALTER TABLE `car_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_pictures`
--

DROP TABLE IF EXISTS `car_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_pictures` (
  `picture_id` varchar(100) NOT NULL,
  `car_id` int(20) NOT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_pictures`
--

LOCK TABLES `car_pictures` WRITE;
/*!40000 ALTER TABLE `car_pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_pictures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-03 16:50:22
