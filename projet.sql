-- MySQL dump 10.13  Distrib 5.5.40-36.1, for Linux (x86_64)
--
-- Host: localhost    Database: jabouzic_usermanager
-- ------------------------------------------------------
-- Server version	5.5.40-36.1-log

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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(300) NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (10,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => skander\n    [user_email] => skander.jabouzi@tonikgroupimage.com\n    [user_first_name] => Skander\n    [user_last_name] => jabouzi\n    [user_password] => \n    [status] => 1\n)\n','2015-01-27 00:04:02'),(11,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => skander\n    [user_email] => skander.jabouzi@tonikgroupimage.com\n    [user_first_name] => Skander\n    [user_last_name] => jabouzi\n    [user_password] => \n    [user_active] => 1\n)\n','2015-01-27 00:07:30'),(12,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => skander\n    [user_email] => skander.jabouzi@tonikgroupimage.com\n    [user_first_name] => Skander\n    [user_last_name] => jabouzi\n    [user_password] => \n    [user_active] => 1\n)\n','2015-01-27 00:08:25'),(13,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => skander\n    [user_email] => skander.jabouzi@tonikgroupimage.com\n    [user_first_name] => Skander\n    [user_last_name] => jabouzi\n    [user_password] => \n    [user_active] => 1\n)\n','2015-01-27 00:09:50'),(14,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => yogourta\n    [user_password] => 7024043\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [active] => 1\n)\n','2015-01-27 00:11:00'),(15,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => yogourta\n    [user_password] => 7024043\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_active] => 1\n)\n','2015-01-27 00:11:52'),(16,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => yogourta\n    [user_password] => 7024043\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_active] => 1\n)\n','2015-01-27 00:13:56'),(17,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => yogourta\n    [user_password] => 7024043\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_active] => 1\n)\n','2015-01-27 00:14:31'),(18,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => yogourta\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_password] => \n)\n','2015-01-27 00:14:42'),(19,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => yogourta\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_password] => \n    [user_active] => 0\n)\n','2015-01-27 00:17:23'),(20,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => yogourta\n    [user_email] => skander@skanderjabouzi.com\n    [user_first_name] => Yogourta\n    [user_last_name] => Lalas\n    [user_password] => \n    [user_active] => 1\n)\n','2015-01-27 00:17:28'),(21,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => jabouzi@aei.ca\n    [first_name] => Alex\n    [last_name] => Aei\n    [password] => 7024043\n    [admin] => 0\n    [active] => 0\n)\n','2015-01-27 00:18:02'),(22,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => jabouzi@aei.ca\n    [first_name] => Alex\n    [last_name] => Aei\n    [password] => 7024043\n    [admin] => 0\n    [active] => 0\n)\n','2015-01-27 00:18:59'),(23,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => jabouzi@aei.ca\n    [first_name] => Alex\n    [last_name] => Aei\n    [password] => 7024043\n    [admin] => 0\n    [active] => 0\n)\n','2015-01-27 00:19:24'),(24,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 4\n    [email] => jabouzi@aei.ca\n    [first_name] => Alex\n    [last_name] => Aei\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 01:57:12'),(25,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => jabouzi.skander@courrier.uqam.ca\n    [first_name] => Skand\n    [last_name] => Jabz\n    [password] => 7024043\n    [admin] => 0\n    [active] => 0\n)\n','2015-01-27 02:00:58'),(26,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => muslim@musliminfo.net\n    [first_name] => Muslim\n    [last_name] => Info\n    [password] => 7024043\n    [admin] => 0\n    [active] => 0\n)\n','2015-01-27 02:04:28'),(27,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 6\n    [email] => muslim@musliminfo.net\n    [first_name] => Muslim\n    [last_name] => Info\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:04:37'),(28,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 5\n    [email] => jabouzi.skander@courrier.uqam.ca\n    [first_name] => Skand\n    [last_name] => Jabz\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:04:46'),(29,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => 7024043\n    [admin] => 1\n    [status] => \n    [active] => 0\n)\n','2015-01-27 02:15:57'),(30,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => 7024043\n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:16:56'),(31,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:17:00'),(32,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:17:03'),(33,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:17:08'),(34,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 3\n    [email] => jabouzi@gmail.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:17:24'),(35,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE ADMIN','Array\n(\n    [id] => 5\n    [email] => jabouzi.skander@courrier.uqam.ca\n    [first_name] => Skand\n    [last_name] => Jabz\n    [password] => \n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 02:18:28'),(36,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => admin\n    [user_password] => admin\n    [user_first_name] => Admin\n    [user_last_name] => Admin\n    [user_email] => admin@admin.com\n    [user_active] => 1\n)\n','2015-01-27 02:39:01'),(37,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD USER','Array\n(\n    [user_name] => admin1\n    [user_password] => admin1\n    [user_first_name] => Admin1\n    [user_last_name] => Admin1\n    [user_email] => admin1@admin.com\n    [user_active] => 0\n)\n','2015-01-27 02:39:01'),(38,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','ADD ADMIN','Array\n(\n    [id] => \n    [email] => skander.jabouzi@tonikgroupimage.com\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [password] => 7024043\n    [admin] => 1\n    [active] => 1\n)\n','2015-01-27 14:25:54'),(39,'Array\n(\n    [first_name] => Skander\n    [last_name] => Jabouzi\n    [email] => jabouzi@gmail.com\n    [admin] => 1\n    [active] => 1\n    [id] => 3\n)\n','UPDATE USER','Array\n(\n    [user_name] => skander\n    [user_email] => skander.jabouzi@tonikgroupimage.com\n    [user_first_name] => Skander\n    [user_last_name] => jabouzi\n    [user_password] => 7024043\n    [user_active] => 1\n)\n','2015-08-31 19:59:49');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('4igte9c021jc2g5uevo6ilh8h6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.152 ',1398162632,'s:0:\"\";'),('ngpacs28ivpjrmkqbmp2u3kk65','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',1398174295,'s:0:\"\";'),('cbeefcf257676d077fac9d72dd237c86','209.104.115.2','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/39.0.2171.65 Chrome/39.0.2171.65 ',1419351247,'s:0:\"\";'),('d7f5742f939263fd44e7cc94f6aeb30e','216.221.56.61','Mozilla/5.0 (X11; Linux i686; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.2.0',1422326510,'s:381:\"user|a:6:{s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";s:2:\"id\";s:1:\"3\";}admin_edit|a:7:{s:2:\"id\";s:1:\"5\";s:5:\"email\";s:32:\"jabouzi.skander@courrier.uqam.ca\";s:8:\"password\";s:7:\"7024043\";s:10:\"first_name\";s:5:\"Skand\";s:9:\"last_name\";s:4:\"Jabz\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";}\";'),('ecf49060db63c994d0734cb4a33d9fd9','209.104.115.2','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/39.0.2171.65 Chrome/39.0.2171.65 ',1422369182,'s:0:\"\";'),('f6e224ddbddc40fac5595b32caf2b479','209.104.115.2','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0',1441051220,'s:0:\"\";'),('899e2b4b100a1979546a5fa4505849a7','209.104.115.2','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0',1422378420,'s:371:\"user|a:6:{s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";s:2:\"id\";s:1:\"3\";}admin_edit|a:7:{s:2:\"id\";s:1:\"3\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:8:\"password\";s:7:\"7024043\";s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";}\";'),('3dd8bf30583b9b2db17578ddeeeef6da','62.210.217.112','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11',1422369022,'s:0:\"\";'),('9305b09d44a1b5436eb09782aa34bb77','62.210.217.112','Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6',1422369023,'s:0:\"\";'),('7138ab54ed26482a2c84ea8cfc530d12','209.104.115.2','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',1427747618,'s:585:\"user|a:6:{s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";s:2:\"id\";s:1:\"3\";}user_edit|a:6:{s:9:\"user_name\";s:5:\"admin\";s:10:\"user_email\";s:15:\"admin@admin.com\";s:13:\"user_password\";s:5:\"admin\";s:15:\"user_first_name\";s:5:\"Admin\";s:14:\"user_last_name\";s:5:\"Admin\";s:11:\"user_active\";s:1:\"1\";}admin_edit|a:7:{s:2:\"id\";s:1:\"3\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:8:\"password\";s:7:\"7024043\";s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";}\";'),('4c88824a2b6c639819213d366c65b424','66.36.158.91','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36',1442196329,'s:382:\"user|a:6:{s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";s:2:\"id\";s:1:\"3\";}user_edit|a:6:{s:9:\"user_name\";s:5:\"admin\";s:10:\"user_email\";s:15:\"admin@admin.com\";s:13:\"user_password\";s:5:\"admin\";s:15:\"user_first_name\";s:5:\"Admin\";s:14:\"user_last_name\";s:5:\"Admin\";s:11:\"user_active\";s:1:\"1\";}\";'),('d3024120159bbc12158d8a5f788e536c','209.104.115.2','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/44.0.2403.89 Chrome/44.0.2403.89 ',1441051474,'s:371:\"user|a:6:{s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";s:2:\"id\";s:1:\"3\";}admin_edit|a:7:{s:2:\"id\";s:1:\"3\";s:5:\"email\";s:17:\"jabouzi@gmail.com\";s:8:\"password\";s:7:\"7024043\";s:10:\"first_name\";s:7:\"Skander\";s:9:\"last_name\";s:7:\"Jabouzi\";s:5:\"admin\";s:1:\"1\";s:6:\"active\";s:1:\"1\";}\";');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`(255)),
  KEY `admin` (`admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin`
--

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
INSERT INTO `user_admin` VALUES (3,'jabouzi@gmail.com','Skander','Jabouzi','ADKtJTFx0CtPf0hcBkSs1A%3D%3D',1,1,'0000-00-00 00:00:00','2015-01-27 02:16:56'),(4,'jabouzi@aei.ca','Alex','Aei','ADKtJTFx0CtPf0hcBkSs1A%3D%3D',1,1,'2015-01-26 18:19:24','2015-01-27 01:57:12'),(5,'jabouzi.skander@courrier.uqam.ca','Skand','Jabz','ADKtJTFx0CtPf0hcBkSs1A%3D%3D',1,1,'2015-01-26 20:00:58','2015-01-27 02:04:46'),(6,'muslim@musliminfo.net','Muslim','Info','ADKtJTFx0CtPf0hcBkSs1A%3D%3D',1,1,'2015-01-26 20:04:28','2015-01-27 02:04:37'),(7,'skander.jabouzi@tonikgroupimage.com','Skander','Jabouzi','ADKtJTFx0CtPf0hcBkSs1A%3D%3D',1,1,'2015-01-27 08:25:54','2015-01-27 14:25:54');
/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jabouzic_db`@`localhost`*/ /*!50003 TRIGGER `admin_insert` BEFORE INSERT ON `user_admin`
 FOR EACH ROW BEGIN
    SET NEW.created = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_first_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_last_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '0',
  `user_created` datetime NOT NULL,
  `user_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES ('admin','wLL%2BQA2NNebhICkTx4c2xQ%3D%3D','admin@admin.com','Admin','Admin',1,'2015-01-26 20:39:01','2015-01-27 02:39:01'),('admin1','87samSIt2a290pe2Y1FPig%3D%3D','admin1@admin.com','Admin1','Admin1',0,'2015-01-26 20:39:01','2015-01-27 02:39:01'),('skander','ADKtJTFx0CtPf0hcBkSs1A%3D%3D','skander.jabouzi@tonikgroupimage.com','Skander','jabouzi',1,'2015-01-05 00:00:00','2015-08-31 19:59:49'),('yogourta','ADKtJTFx0CtPf0hcBkSs','skander@skanderjabouzi.com','Yogourta','Lalas',1,'2015-01-26 18:14:31','2015-01-27 00:17:28');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jabouzic_db`@`localhost`*/ /*!50003 TRIGGER `user_insert` BEFORE INSERT ON `user_info`
 FOR EACH ROW BEGIN
    SET NEW.user_created = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-13 21:09:44
