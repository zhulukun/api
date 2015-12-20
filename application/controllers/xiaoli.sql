-- MySQL dump 10.13  Distrib 5.6.27, for osx10.10 (x86_64)
--
-- Host: localhost    Database: xiaoli
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `xl_account`
--

DROP TABLE IF EXISTS `xl_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_account` (
  `id` varchar(128) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `cellphone` varchar(32) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `horoscope` enum('Aries','Taurus','Gemini','Cancer','Leo','Virgo','Libra','Scorpio','Sagitarius','Capricorn','Aquarius','Pisces') DEFAULT NULL,
  `status` enum('active','freeze') NOT NULL DEFAULT 'active',
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  `allow_notice` tinyint(1) NOT NULL DEFAULT '1',
  `allow_score` tinyint(1) NOT NULL DEFAULT '1',
  `register_user` tinyint(1) NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sex` enum('male','female') NOT NULL DEFAULT 'male',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_index` (`nickname`,`cellphone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_account`
--

LOCK TABLES `xl_account` WRITE;
/*!40000 ALTER TABLE `xl_account` DISABLE KEYS */;
INSERT INTO `xl_account` VALUES ('011fc75c9a2c802cde48de6f1957c026','zlk','1112211111311',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:04:03','male'),('07cf81a171bda0dac4f5fe162ebbec4a','','13223456784','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 16:01:17','male'),('15ecfff668f79342661e7520cbefb86d','','13223456783','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 15:46:19','male'),('16f7d31850c1697d372c60998e21a22f','112','1232',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-02 06:15:30','male'),('1debaa71106de034c04344a1e1183ce8','','13223456782','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 15:44:49','male'),('2da75864818c9108e70eaa500eae0272','','178888351','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('34ba8c96b9e2237e281b6d3ad72e19e9','','12312321',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 13:52:32','male'),('3a31274450bac6aec05fcc518dd85870','','1788883513','688314',NULL,NULL,'active','user',1,1,1,'2015-12-10 02:27:56','male'),('42beacb8a49a62a41a9fb5d244a07667','','1788883513011','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('47e63f958b3a158e1875c7d002897b1c','','131321232',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 13:52:32','male'),('4e81976e51f78a40aa22cb0fe3f0419e','haf','123',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-02 06:15:30','male'),('51af12e06b0d938c919eff169e8da2f0','','12324444336',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 15:34:15','male'),('576a1466d50eb643621496c811c72e6b','','123da2',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-12 06:47:55','male'),('70ec76a8f82056e0ed55eda55623b580','zlk','17888835101110',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:04:03','male'),('7b90042268e28cb78bffa1769fc73ed6','zlk','178888351012',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:37:29','male'),('82a2aaa2ac742c339301764d5b517ef6','hello','1788883511301','342850',NULL,NULL,'active','user',1,1,1,'2015-12-10 05:39:06','male'),('8588a944bc8cbd3a919acd5605506eca','hello','1788883513','688314',NULL,NULL,'active','user',1,1,1,'2015-12-10 02:28:22','male'),('85f56c5a792260b902cd83628ba0973d','','178888351301','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 08:17:23','male'),('948bd3e754e119c74d5f15992d8c57d4','','178888','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('992ac6dea85348bb0a3559944798519d','zlk1','3232424',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:48:58','male'),('b187e82f11995dd83d5efa49c4b7bc85','zlk','1788883510123',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:31:22','male'),('ba8030a49624a7871f1e8f1bd07450c2','','17888835135','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 08:52:22','male'),('bdfb1bc3281205eeae98f410ff066b37','','12113444',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 15:34:15','male'),('ce244d07a3bf9c6d66d78e07c37b7a9a','hello','17888835130','342850',NULL,NULL,'active','user',1,1,1,'2015-12-10 02:36:38','male'),('d97d67d6f0b666e90e143286cb8a95d5','','178888351301111','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 02:39:30','male'),('e2a63699957094ccc3d98c9a7d35ca6a','zf','12dfaas32',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-12 09:16:06','male'),('f3bec40b5549d7744d33f441be8eafae','hello','178888351310','342850',NULL,NULL,'active','user',1,1,1,'2015-12-10 03:03:08','male'),('f76cdd92a8ae0dbc23fe8dcb0989acce','hello','132123','342850',NULL,NULL,'active','user',1,1,1,'2015-12-17 15:23:47','male'),('ffe2f9de6e0aade7e335d81be201044a','zlk','178881012',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:48:58','male');
/*!40000 ALTER TABLE `xl_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_accountplanvote`
--

DROP TABLE IF EXISTS `xl_accountplanvote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_accountplanvote` (
  `id` varchar(128) NOT NULL,
  `plan_id` varchar(128) NOT NULL,
  `operator_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `xl_accountplanvote_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `xl_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_accountplanvote_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_accountplanvote`
--

LOCK TABLES `xl_accountplanvote` WRITE;
/*!40000 ALTER TABLE `xl_accountplanvote` DISABLE KEYS */;
INSERT INTO `xl_accountplanvote` VALUES ('2d8550be7dc210c02f52d520237810e3','aaa','15ecfff668f79342661e7520cbefb86d');
/*!40000 ALTER TABLE `xl_accountplanvote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_avatar`
--

DROP TABLE IF EXISTS `xl_avatar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_avatar` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `avatar_url` varchar(1024) NOT NULL,
  `format` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `xl_avatar_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_avatar`
--

LOCK TABLES `xl_avatar` WRITE;
/*!40000 ALTER TABLE `xl_avatar` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_avatar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_category`
--

DROP TABLE IF EXISTS `xl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_category`
--

LOCK TABLES `xl_category` WRITE;
/*!40000 ALTER TABLE `xl_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_collect`
--

DROP TABLE IF EXISTS `xl_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_collect` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `plan_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  KEY `plan_id` (`plan_id`),
  CONSTRAINT `xl_collect_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_collect_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `xl_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_collect`
--

LOCK TABLES `xl_collect` WRITE;
/*!40000 ALTER TABLE `xl_collect` DISABLE KEYS */;
INSERT INTO `xl_collect` VALUES ('fb58973185310ea0ff973086987c6a3f','15ecfff668f79342661e7520cbefb86d','aaa');
/*!40000 ALTER TABLE `xl_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_comment`
--

DROP TABLE IF EXISTS `xl_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_comment` (
  `id` varchar(128) NOT NULL,
  `target_id` varchar(128) NOT NULL,
  `operator_id` varchar(128) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `target_id` (`target_id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `xl_comment_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_comment_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_comment`
--

LOCK TABLES `xl_comment` WRITE;
/*!40000 ALTER TABLE `xl_comment` DISABLE KEYS */;
INSERT INTO `xl_comment` VALUES ('c5ac89a29f3c2c5915400915b5351c58','ffe2f9de6e0aade7e335d81be201044a','15ecfff668f79342661e7520cbefb86d','hello','2015-12-04 02:32:30');
/*!40000 ALTER TABLE `xl_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_feedback`
--

DROP TABLE IF EXISTS `xl_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_feedback` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `type` enum('other','register_login','improvement','bug') NOT NULL DEFAULT 'improvement',
  `is_disposed` tinyint(1) NOT NULL DEFAULT '0',
  `content` text,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `xl_feedback_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_feedback`
--

LOCK TABLES `xl_feedback` WRITE;
/*!40000 ALTER TABLE `xl_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_friendRef`
--

DROP TABLE IF EXISTS `xl_friendRef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_friendRef` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `friend_account_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  KEY `friend_account_id` (`friend_account_id`),
  CONSTRAINT `xl_friendRef_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_friendRef_ibfk_2` FOREIGN KEY (`friend_account_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_friendRef`
--

LOCK TABLES `xl_friendRef` WRITE;
/*!40000 ALTER TABLE `xl_friendRef` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_friendRef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_friendinfo`
--

DROP TABLE IF EXISTS `xl_friendinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_friendinfo` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `friend_info` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `xl_friendinfo_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_friendinfo`
--

LOCK TABLES `xl_friendinfo` WRITE;
/*!40000 ALTER TABLE `xl_friendinfo` DISABLE KEYS */;
INSERT INTO `xl_friendinfo` VALUES ('2577917519cb5737573324da0ec51f9f','f3bec40b5549d7744d33f441be8eafae','[{\"phone\":\"123\",\"name\":\"115\",\"email\":\"1ghkghkhg@qq.csossm\"},{\"phone\":\"1232\",\"name\":\"1111\",\"email\":\"2@qjj44qqssswwwqqq.c11om1\"}]'),('54da3df7eb377f466297f7c85084c2e0','15ecfff668f79342661e7520cbefb86d','[{\"phone\":\"123\",\"name\":\"111\",\"email\":\"1@qq.com\"},{\"phone\":\"1232\",\"name\":\"112\",\"email\":\"22@qq.com\"}]'),('80b2c58c9ce96beb732c583a5beb78c3','2da75864818c9108e70eaa500eae0272','[{\"phone\":\"12113444\",\"name\":\"11111aa11\",\"email\":\"1@qq.com\"},{\"phone\":\"12324444336\",\"name\":\"112\",\"email\":\"2@qq.com\"}]');
/*!40000 ALTER TABLE `xl_friendinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_friendrelation`
--

DROP TABLE IF EXISTS `xl_friendrelation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_friendrelation` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `parent_id` varchar(128) NOT NULL,
  `cellphone` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xl_accountplanvote_ibfk_100` (`parent_id`),
  CONSTRAINT `xl_accountplanvote_ibfk_100` FOREIGN KEY (`parent_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_friendrelation`
--

LOCK TABLES `xl_friendrelation` WRITE;
/*!40000 ALTER TABLE `xl_friendrelation` DISABLE KEYS */;
INSERT INTO `xl_friendrelation` VALUES (10,'11111aa11','1@qq.com','2da75864818c9108e70eaa500eae0272','123'),(11,'112','2@qq.com','2da75864818c9108e70eaa500eae0272','1232'),(12,'1111','2@qjj4ddd4qqssswwwqqq.c11om1','2da75864818c9108e70eaa500eae0272','12dfaas32'),(13,'115','1ghkghkhg@qq.csossm','f3bec40b5549d7744d33f441be8eafae','123'),(14,'1111','2@qjj44qqssswwwqqq.c11om1','f3bec40b5549d7744d33f441be8eafae','1232'),(15,'115','1ghkghkhg@qq.csossm','2da75864818c9108e70eaa500eae0272','12312321'),(16,'1111','2@qjj44qqssswwwqqq.c11om1','2da75864818c9108e70eaa500eae0272','131321232'),(17,'11111aa11','1@qq.com','2da75864818c9108e70eaa500eae0272','12113444'),(18,'112','2@qq.com','2da75864818c9108e70eaa500eae0272','12324444336');
/*!40000 ALTER TABLE `xl_friendrelation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_imageresource`
--

DROP TABLE IF EXISTS `xl_imageresource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_imageresource` (
  `id` varchar(128) NOT NULL,
  `account_id` varchar(128) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `format` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `xl_imageresource_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_imageresource`
--

LOCK TABLES `xl_imageresource` WRITE;
/*!40000 ALTER TABLE `xl_imageresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_imageresource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_impress`
--

DROP TABLE IF EXISTS `xl_impress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_impress` (
  `id` varchar(128) NOT NULL,
  `target_id` varchar(128) NOT NULL,
  `operator_id` varchar(128) NOT NULL,
  `impresstype` int(8) NOT NULL,
  `impresscontent` varchar(128) NOT NULL,
  `isview` tinyint(1) NOT NULL DEFAULT '1',
  `is_hidden_user` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `target_id` (`target_id`),
  KEY `operator_id` (`operator_id`),
  KEY `xl_impress_ibfk_112` (`impresstype`),
  CONSTRAINT `xl_impress_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_impress_ibfk_112` FOREIGN KEY (`impresstype`) REFERENCES `xl_impresstype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_impress_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_impress`
--

LOCK TABLES `xl_impress` WRITE;
/*!40000 ALTER TABLE `xl_impress` DISABLE KEYS */;
INSERT INTO `xl_impress` VALUES ('24191c0eb42e8271e1af3b0df6e4a48c','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',3,'骑行',1,0),('361ee53c35a87175244b4a0b0c1e8192','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',3,'篮球',1,0),('6ff49449fef0cf2022bd01312fd65270','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',2,'潇洒',1,0),('79e707eccdf9c74f7bf7009aae31d278','f76cdd92a8ae0dbc23fe8dcb0989acce','2da75864818c9108e70eaa500eae0272',3,'骑行',1,0),('89bec3950501c02a416fe355f0f8abe7','f76cdd92a8ae0dbc23fe8dcb0989acce','2da75864818c9108e70eaa500eae0272',3,'篮球',1,0),('aa61d75e1b978b459e9ad4eb84ec6fce','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',2,'帅气',1,0),('ecf8dc0b93cbd5b80930f42ece04ccd0','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',1,'表哥',1,0);
/*!40000 ALTER TABLE `xl_impress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_impress_keyword`
--

DROP TABLE IF EXISTS `xl_impress_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_impress_keyword` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `target_id` varchar(128) NOT NULL,
  `impress_keyword` varchar(128) NOT NULL,
  `impress_num` int(8) NOT NULL DEFAULT '1',
  `isview` tinyint(1) NOT NULL DEFAULT '1',
  `impresstype` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xl_impress_keyword_ibfk_112` (`impresstype`),
  KEY `xl_impress_keyword_ibfk_2` (`target_id`),
  CONSTRAINT `xl_impress_keyword_ibfk_112` FOREIGN KEY (`impresstype`) REFERENCES `xl_impresstype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_impress_keyword_ibfk_2` FOREIGN KEY (`target_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_impress_keyword`
--

LOCK TABLES `xl_impress_keyword` WRITE;
/*!40000 ALTER TABLE `xl_impress_keyword` DISABLE KEYS */;
INSERT INTO `xl_impress_keyword` VALUES (19,'f76cdd92a8ae0dbc23fe8dcb0989acce','表哥',1,1,1),(20,'f76cdd92a8ae0dbc23fe8dcb0989acce','帅气',1,1,2),(21,'f76cdd92a8ae0dbc23fe8dcb0989acce','潇洒',1,1,2),(22,'f76cdd92a8ae0dbc23fe8dcb0989acce','篮球',2,1,3),(23,'f76cdd92a8ae0dbc23fe8dcb0989acce','骑行',2,1,3);
/*!40000 ALTER TABLE `xl_impress_keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_impresstype`
--

DROP TABLE IF EXISTS `xl_impresstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_impresstype` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `impress_type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_impresstype`
--

LOCK TABLES `xl_impresstype` WRITE;
/*!40000 ALTER TABLE `xl_impresstype` DISABLE KEYS */;
INSERT INTO `xl_impresstype` VALUES (1,'relation'),(2,'character'),(3,'like'),(4,'useradd');
/*!40000 ALTER TABLE `xl_impresstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_notice`
--

DROP TABLE IF EXISTS `xl_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_notice` (
  `id` varchar(128) NOT NULL,
  `receiver_id` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `content` varchar(2048) NOT NULL,
  `param` text,
  PRIMARY KEY (`id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `xl_notice_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_notice`
--

LOCK TABLES `xl_notice` WRITE;
/*!40000 ALTER TABLE `xl_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_presetimpress`
--

DROP TABLE IF EXISTS `xl_presetimpress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_presetimpress` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `preset_impress` varchar(128) NOT NULL,
  `impresstype` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xl_presetimpress_ibfk_112` (`impresstype`),
  CONSTRAINT `xl_presetimpress_ibfk_112` FOREIGN KEY (`impresstype`) REFERENCES `xl_impresstype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_presetimpress`
--

LOCK TABLES `xl_presetimpress` WRITE;
/*!40000 ALTER TABLE `xl_presetimpress` DISABLE KEYS */;
INSERT INTO `xl_presetimpress` VALUES (1,'弟弟',1),(2,'老婆',1),(3,'儿子',1),(4,'老公',1),(5,'叔叔',1),(6,'表弟',1),(7,'妹妹',1),(8,'姐姐',1),(9,'开朗',2),(10,'大方',2),(11,'平易近人',2),(12,'篮球',3),(13,'游泳',3),(14,'健身',3),(15,'羽毛球',3),(16,'骑行',3);
/*!40000 ALTER TABLE `xl_presetimpress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_score`
--

DROP TABLE IF EXISTS `xl_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_score` (
  `id` varchar(128) NOT NULL,
  `target_id` varchar(128) NOT NULL,
  `operator_id` varchar(128) NOT NULL,
  `score` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `target_id` (`target_id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `xl_score_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_score_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_score`
--

LOCK TABLES `xl_score` WRITE;
/*!40000 ALTER TABLE `xl_score` DISABLE KEYS */;
INSERT INTO `xl_score` VALUES ('adadas','ffe2f9de6e0aade7e335d81be201044a','2da75864818c9108e70eaa500eae0272',10);
/*!40000 ALTER TABLE `xl_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_systemkeywords`
--

DROP TABLE IF EXISTS `xl_systemkeywords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_systemkeywords` (
  `id` varchar(64) NOT NULL,
  `keyword` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_systemkeywords`
--

LOCK TABLES `xl_systemkeywords` WRITE;
/*!40000 ALTER TABLE `xl_systemkeywords` DISABLE KEYS */;
INSERT INTO `xl_systemkeywords` VALUES ('aa','aaaa'),('aad','aaaa');
/*!40000 ALTER TABLE `xl_systemkeywords` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-19 10:22:13
