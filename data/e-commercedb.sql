-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: e-commercedb
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

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
-- Table structure for table `boarding_pass_info`
--

DROP TABLE IF EXISTS `boarding_pass_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boarding_pass_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_details_id` int(11) NOT NULL,
  `passenger_name` text NOT NULL,
  `seat` varchar(3) NOT NULL,
  `arrival_city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boarding_pass_info`
--

LOCK TABLES `boarding_pass_info` WRITE;
/*!40000 ALTER TABLE `boarding_pass_info` DISABLE KEYS */;
INSERT INTO `boarding_pass_info` VALUES (1,1,'Jason Matthew Davis','1A',1),(2,1,'Lornah Ludia Okoth','1B',1),(3,3,'A B C','20A',1),(4,7,'B C D','20B',1),(5,7,'C D E','20C',1),(6,7,'D E F','20D',1),(7,7,'E F G','20E',1),(8,7,'F G H','20F',1),(9,1,'Bob Jones','2B',1);
/*!40000 ALTER TABLE `boarding_pass_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` text NOT NULL,
  `state` text NOT NULL,
  `airport_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Pittsburgh','PA','PIT'),(2,'Baltimore','MD','BWI'),(3,'New York City','NY','JFK'),(4,'Abu Dhabi','UAE','AUH'),(5,'Adelaide','AUS','ADL'),(6,'Heathrow','UK','BTR'),(7,'Los Angeles','CA','LAX'),(8,'Tokyo','JP','TYO');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'testuser1','4d2f7537251270fc3574dcb3e8c9e031'),(2,'testuser2','e2409b83e61f93f62af884945c6ecd5b'),(5,'jadavis','6f951c5d02156c20dd1d6ac601a9c2c5'),(6,'jadavis','6f951c5d02156c20dd1d6ac601a9c2c5'),(7,'jadavis','6f951c5d02156c20dd1d6ac601a9c2c5');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_header_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,1,2),(2,1,4,1),(3,2,3,1),(4,2,5,1),(5,3,2,3),(6,3,4,1),(7,3,3,5),(8,3,5,2),(10,5,2,1),(11,7,2,3),(14,8,4,3);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_header`
--

DROP TABLE IF EXISTS `order_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_type` varchar(1) NOT NULL,
  `login_id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_header`
--

LOCK TABLES `order_header` WRITE;
/*!40000 ALTER TABLE `order_header` DISABLE KEYS */;
INSERT INTO `order_header` VALUES (1,'O',1,4,'2021-04-21',251.97),(2,'O',1,3,'2021-04-29',125.23),(3,'O',2,2,'2021-04-07',1000.75),(5,'S',2,0,'0000-00-00',0.00),(7,'O',3,4,'2021-04-30',450.00),(8,'S',1,0,'0000-00-00',60.00);
/*!40000 ALTER TABLE `order_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `cred_num` varchar(16) NOT NULL,
  `card_holder_name` text NOT NULL,
  `exp_date` varchar(7) NOT NULL,
  `bill_addr1` text NOT NULL,
  `bill_addr2` text NOT NULL,
  `bill_city` text NOT NULL,
  `bill_state` text NOT NULL,
  `bill_zip` text NOT NULL,
  `bill_country` text NOT NULL,
  `bill_phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
INSERT INTO `payment_methods` VALUES (2,2,'7531951245628521','John B Smith','12/2023','5231 Glen Rd SW','','Atlanta','GA','30338','United States','777-666-5201'),(3,1,'4188521399461245','Jane A Doe','04/2023','1234 Glen Rd SW','','Atlanta','GA','30338','United States','155-223-1234'),(4,3,'6325874595121121','Jane A Doe','06/2022','1234 Glen Rd SW','','Atlanta','GA','30338','United States','155-223-1234'),(5,2,'4564123478904561','John B Smith','01/2024','4321 Forest Pkwy','','Decatur','GA','30031','United States','123-123-1234'),(6,7,'1234567890123456','A B C','12/2028','321 Main St.','Apt 371','Atlanta','GA','30339','US','706-706-2865'),(8,7,'1234567890123456','A B C','12/2024','123 Main St','','Atlanta','GA','30339','US','123-456-7890'),(9,7,'1234567890123456','A B C','12/2024','123 Main St','','Atlanta','GA','30339','US','123-456-7890');
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(2) NOT NULL,
  `description` text NOT NULL,
  `total_qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'FC','First Class Seats',20,500.00),(2,'BC','Business Class Seats',45,150.00),(3,'EC','Economy Class Seats',87,50.00),(4,'VP','VIP Parking Spot',100,20.00),(5,'SP','Standard Parking Spot',300,10.00);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seat` varchar(3) NOT NULL,
  `seat_type` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seats`
--

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;
INSERT INTO `seats` VALUES (1,'1A','FC'),(2,'1B','FC'),(3,'1C','FC'),(4,'1D','FC'),(5,'2A','FC'),(6,'2B','FC'),(7,'2C','FC'),(8,'2D','FC'),(9,'19A','EC'),(10,'19B','EC'),(11,'19C','EC'),(12,'19D','EC'),(13,'19E','EC'),(14,'19F','EC'),(15,'20A','EC'),(16,'20B','EC'),(17,'20C','EC'),(18,'20D','EC'),(19,'20E','EC'),(20,'20F','EC'),(21,'8A','BC'),(22,'8B','BC'),(23,'8C','BC'),(24,'8D','BC'),(25,'8E','BC'),(26,'8F','BC');
/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `phone_num` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,1,'Test','User1','(123)456-7890','testuser1@gmail.com'),(2,2,'Test','User2','9876543210','testuser2@gmail.com'),(3,7,'Jason','Davis','123-456-0987','a@b.com');
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-01 14:15:02
