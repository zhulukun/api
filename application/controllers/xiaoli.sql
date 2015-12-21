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
INSERT INTO `xl_account` VALUES ('','','17888835130','123',NULL,NULL,'active','user',1,1,1,'2015-12-18 02:31:13','male'),('011fc75c9a2c802cde48de6f1957c026','zlk','1112211111311',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:04:03','male'),('034ac43bd03c073ebe21fb9f0a5115fb','','18233135739',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('07cf81a171bda0dac4f5fe162ebbec4a','','13223456784','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 16:01:17','male'),('0bb0372bc471a5984b32dc6f2f90744d','','18047084807',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:58','male'),('0fa21063ba09975af0d5ac3b933e731d','','18233132764',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('14c873f4c95a5ff5b38cf11e00274356','','13522308661',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('14efef60b8397708798762adededf290','','18233131819',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('15ecfff668f79342661e7520cbefb86d','','13223456783','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 15:46:19','male'),('16f7d31850c1697d372c60998e21a22f','112','1232',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-02 06:15:30','male'),('1debaa71106de034c04344a1e1183ce8','','13223456782','zlk123',NULL,NULL,'active','user',1,1,1,'2015-12-01 15:44:49','male'),('20eca72a7123b53f099fe8d9fffddfd5','','18504863396',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:58','male'),('250b06c14081c329cc644c4aaef6c9a0','','18032780176',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('2a7074b491137d69fd2fc67942b5b9d2','','18611525009',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('2da75864818c9108e70eaa500eae0272','','178888351','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('2f39de58cb992f138e87daf356242f9f','','18232189279',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('2fd4f5f463182b1fbb49b1abe950d9b4','','13699182887',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('34ba8c96b9e2237e281b6d3ad72e19e9','','12312321',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 13:52:32','male'),('35d0b67f1ce6c86d35227a1ca705a446','','13315980631',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('3663ff622020a2cbe6366242ed203ad1','','15847627730',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('371b71428c6de52abe9b95923ae9e354','','5556106679',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('38df634c1eecddca4c5db1722739921b','','18603291504',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('3a31274450bac6aec05fcc518dd85870','','1788883513','688314',NULL,NULL,'active','user',1,1,1,'2015-12-10 02:27:56','male'),('42beacb8a49a62a41a9fb5d244a07667','','1788883513011','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('4309b389edb9b1219155b677679a5a80','','13811962789',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('43c722fbd972a8cfd53fb39168af56e7','','15849994425',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('44cb69a134c7ce4785c3bd532b64d9f9','','5555228243',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('44da643ce36456cb8813179c78f80477','','18647686025',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('47e63f958b3a158e1875c7d002897b1c','','131321232',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 13:52:32','male'),('4cae6e5acd86f92245d90713e3a6b9b6','','13137595487',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('4e81976e51f78a40aa22cb0fe3f0419e','haf','123',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-02 06:15:30','male'),('50de7cf4e4ccb7b5dab95836415e00a1','','13832162300',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('51af12e06b0d938c919eff169e8da2f0','','12324444336',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 15:34:15','male'),('5296a7611b389691d7f5c9831577c018','','18748293822',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('576a1466d50eb643621496c811c72e6b','','123da2',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-12 06:47:55','male'),('6927ea1a8147ec38745aee897a8c2785','','13086040412',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('6936fb13464ced6ff57507fbd9958e7f','','18233131892',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('6e3c78941224dc1b465cb819365c9c21','','15847490838',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('6f68f3e30143eb6e4c07b1104ce2eba7','','15848899042',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('70ec76a8f82056e0ed55eda55623b580','zlk','17888835101110',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:04:03','male'),('75695422e1213c82db22ac35d1c5f3e6','','15614230183',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('76591aa4a9c77e316bd62e9c2eabab09','','08) 5553514',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('7754c6ac0395d5578f2a97418ba0aca5','','07) 5551854',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('79c1c8f6a8be705e950c7667f9813e42','','18204955334',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('7b90042268e28cb78bffa1769fc73ed6','zlk','178888351012',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:37:29','male'),('7d2fff7323889742b89c968c71baaa4f','','18233131038',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('7ffffbd407d3faf1dd70d427a2361bb3','','13180068374',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('8109f02ada539ee0fc2a48d3d6720e9f','','15598615715',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('82a2aaa2ac742c339301764d5b517ef6','hello','1788883511301','342850',NULL,NULL,'active','user',1,1,1,'2015-12-10 05:39:06','male'),('8368c2f5610b5c0b02dcf43002608765','','13910541482',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('8588a944bc8cbd3a919acd5605506eca','hello','1788883513','688314',NULL,NULL,'active','user',1,1,1,'2015-12-10 02:28:22','male'),('85a732ebd8e7ec518356310079f54a3d','','15981892201',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('85f56c5a792260b902cd83628ba0973d','','178888351301','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 08:17:23','male'),('872c100daa762e7e491d0e8842d6f6de','','13847961827',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('8bbe6753c152963a0c8323830e690d6d','','18389378771',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('8e30b2cf2b31da7affac16f3e44df467','','13191873783',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('90ab47bf6ae08b21b2125aef5bce8992','','15614173798',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('90d1026e74a8bbac85e005fe3e0a1485','','15934934766',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('948bd3e754e119c74d5f15992d8c57d4','','178888','aaaa',NULL,NULL,'active','user',1,1,1,'2015-11-14 12:04:03','male'),('952a2d3d5bac6307053158a6b08d4a91','','15) 5553695',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('992ac6dea85348bb0a3559944798519d','zlk1','3232424',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:48:58','male'),('9b5c2b3293fb192241b06a12529692b3','','15104814760',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('9dc50a5c8f9b80cbdb53050521c511f1','','18513223621',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('a29cf8af304a474a7f577d132cdf72a6','','18147627190',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('a587573e019d64d83e3355bd4fc7f9d1','','18233132922',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('a5d067602a08a1050b6f9f5b1498737d','','13528367892','123',NULL,NULL,'active','user',1,1,1,'2015-12-18 03:03:44','male'),('af1210d4f0fc07aaf62472004897a03b','','18231196168',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('b09bdd4a80a313cf478cd99285899b9c','','15149084172',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('b187e82f11995dd83d5efa49c4b7bc85','zlk','1788883510123',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-14 12:31:22','male'),('b5a53b10656114f77160237bf04001ef','','13191500338',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('b6a15158f1072da6f0235a97595f1cfe','','13111574021',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('ba8030a49624a7871f1e8f1bd07450c2','','17888835135','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 08:52:22','male'),('bdfb1bc3281205eeae98f410ff066b37','','12113444',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-17 15:34:15','male'),('bf4fb139e4b0d0fea9dcba6aa3b87603','','18728089675',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('c893892ad1c40b0193f1851c38f69fa6','','18937108535',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('ca88c0edb5d915d2db57606f4113dca1','','15313808350',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('d31a1042154037fd8320c62443e379a5','','18233136071',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('d39c96748b8f09ad68b6b412a4154242','','13947622839',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('d88f5b7ad6b62e905505cad8433a59b0','','18233136193',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('d8f5fe0e535eba2b9bed4ec368fbe09c','','18230102746',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('d97d67d6f0b666e90e143286cb8a95d5','','178888351301111','aaa',NULL,NULL,'active','user',1,1,1,'2015-11-25 02:39:30','male'),('db23bbd738eb7edc04d281b397b0a06f','','18231199176',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('dd13332dc5dfceee0bf60d80a7e5dd07','','8885551212',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 02:33:13','male'),('df3db669e157a9fab2421a12a1f56927','','15130613388',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('e0bd9bbc6ce5e5af75f27c39d51a6966','','13344448888',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:58','male'),('e2a63699957094ccc3d98c9a7d35ca6a','zf','12dfaas32',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-12 09:16:06','male'),('e8b8162f6ce8fce5e64c987860903053','','13028695936',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('e9627a855796b38d96b2ab8a29c4d6ea','','18237180956',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('e9efcba854eb99f30c187438c8da6a31','','18233135701',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('ea5e9338ab6ac579e90e7e6853e4caae','','18801468987',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('f0b09c6de47a673046840f0c2a41d74c','','18231199033',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('f3bec40b5549d7744d33f441be8eafae','hello','178888351310','342850',NULL,NULL,'active','user',1,1,1,'2015-12-10 03:03:08','male'),('f76cdd92a8ae0dbc23fe8dcb0989acce','hello','132123','342850',NULL,NULL,'active','user',1,1,1,'2015-12-17 15:23:47','male'),('f7e971bdbdb22ab9d880011764c5bc82','','18233131996',NULL,NULL,NULL,'active','user',1,1,0,'2015-12-18 08:36:59','male'),('ffe2f9de6e0aade7e335d81be201044a','zlk','178881012',NULL,NULL,NULL,'active','user',1,1,0,'2015-11-16 08:48:58','male');
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
INSERT INTO `xl_avatar` VALUES ('d6cf7fc39ba5ac257c4988a95c76cb7f','f3bec40b5549d7744d33f441be8eafae','http://localhost/api/uploads/1450623161_237.png','png');
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
INSERT INTO `xl_friendinfo` VALUES ('2577917519cb5737573324da0ec51f9f','f3bec40b5549d7744d33f441be8eafae','[{\"phone\":\"123\",\"name\":\"115\",\"email\":\"1ghkghkhg@qq.csossm\"},{\"phone\":\"1232\",\"name\":\"1111\",\"email\":\"2@qjj44qqssswwwqqq.c11om1\"}]'),('2a96572eee75e8241a4ce7dd8a9b540a','f76cdd92a8ae0dbc23fe8dcb0989acce','[{\"phone\":\"123\",\"name\":\"11111aa11\",\"email\":\"1@qq.com\"},{\"phone\":\"1232\",\"name\":\"112\",\"email\":\"2@qq.com\"}]'),('54da3df7eb377f466297f7c85084c2e0','15ecfff668f79342661e7520cbefb86d','[{\"phone\":\"123\",\"name\":\"111\",\"email\":\"1@qq.com\"},{\"phone\":\"1232\",\"name\":\"112\",\"email\":\"22@qq.com\"}]'),('80b2c58c9ce96beb732c583a5beb78c3','2da75864818c9108e70eaa500eae0272','[{\"phone\":\"12113444\",\"name\":\"11111aa11\",\"email\":\"1@qq.com\"},{\"phone\":\"12324444336\",\"name\":\"112\",\"email\":\"2@qq.com\"}]'),('a956d8ef2d7ce98d1400a76d8bbb06c0','a5d067602a08a1050b6f9f5b1498737d','[{\"name\":\"u7238\",\"phone\":\"18504863396\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u73edu957f\",\"phone\":\"18047084807\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6d4bu8bd5\",\"phone\":\"13344448888\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9648u601d\",\"phone\":\"13028695936\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9648u6d0b\",\"phone\":\"18231196168\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u891au6587u5e7f\",\"phone\":\"18748293822\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5927u53f2\",\"phone\":\"18231199176\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8463u96ea\",\"phone\":\"15934934766\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u675cu54e5\",\"phone\":\"18237180956\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9ad8u71d5\",\"phone\":\"18233131038\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9b3cu54e5\",\"phone\":\"13832162300\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6c49u5b50\",\"phone\":\"18728089675\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u7ea2u8273u59d0\",\"phone\":\"13947622839\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5bbdu7237\",\"phone\":\"18032780176\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8001u767d\",\"phone\":\"18233132764\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8001u59d0\",\"phone\":\"13847961827\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8001u9b4f\",\"phone\":\"13522308661\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u674e\",\"phone\":\"18233132922\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u674eu8273u7ea2\",\"phone\":\"18233136193\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5218u5b8fu4f1f\",\"phone\":\"18937108535\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5218u77eb\",\"phone\":\"18233135739\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5415u76fcu4e3e\",\"phone\":\"18232189279\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5988\",\"phone\":\"18147627190\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9a6cu5343u91cc\",\"phone\":\"18233136071\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u9a6cu5360u5bcc\",\"phone\":\"13191500338\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6f58u5bfcu5458\",\"phone\":\"15130613388\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u79e6u5c0fu9e4f\",\"phone\":\"18801468987\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u795eu5954u5144\",\"phone\":\"13111574021\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u795eu72d7u5269\",\"phone\":\"18513223621\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u795eu5eb7u5144\",\"phone\":\"18233131892\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u795eu9a74u5144\",\"phone\":\"15614173798\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u795eu5b59u5144\",\"phone\":\"18603291504\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5b8bu6587u8fbe\",\"phone\":\"13086040412\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u4f53u59d4\",\"phone\":\"18389378771\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u7530u8001u5e08\",\"phone\":\"13191873783\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u738bu6676\",\"phone\":\"18233135701\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u738bu5929u9f99\",\"phone\":\"18230102746\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u738bu5c0fu864e\",\"phone\":\"18231199033\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u4e4cu4e39u8f66\",\"phone\":\"15847490838\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5434u5764\",\"phone\":\"15614230183\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5ab3u5987\",\"phone\":\"18611525009\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5c0fu7ee2u59d0\",\"phone\":\"13811962789\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u96c5u8339\",\"phone\":\"15848899042\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6768u5e05\",\"phone\":\"18233131819\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6768u7487\",\"phone\":\"15981892201\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u59dau5bb6u742a\",\"phone\":\"15313808350\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u79fbu52a8u7f51\",\"phone\":\"13910541482\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5b87u98de\",\"phone\":\"15849994425\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6708u5175\",\"phone\":\"18204955334\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8d75u4e3du971e\",\"phone\":\"13315980631\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8d75u8273u654f\",\"phone\":\"15149084172\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8d75u71d5u8363\",\"phone\":\"13699182887\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u8d75u9547u5b87\",\"phone\":\"18233131996\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u90d1u6d77u6ce2\",\"phone\":\"18647686025\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5fd7u864e\",\"phone\":\"15847627730\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5468u6d77u65b0\",\"phone\":\"15104814760\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u5468u5357\",\"phone\":\"15598615715\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6731u56fdu8f89\",\"phone\":\"13180068374\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"u6731u6da6\",\"phone\":\"13137595487\",\"email\":\"u90aeu7bb1u4e3au7a7a\"}]'),('c7f6e7fb2a077aa5d1a022de5db34f11','','[{\"name\":\"Appleseed\",\"phone\":\"8885551212\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"Bell\",\"phone\":\"15) 5553695\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"Haro\",\"phone\":\"5555228243\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"Higgins\",\"phone\":\"08) 5553514\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"Taylor\",\"phone\":\"5556106679\",\"email\":\"u90aeu7bb1u4e3au7a7a\"},{\"name\":\"Zakroff\",\"phone\":\"07) 5551854\",\"email\":\"u90aeu7bb1u4e3au7a7a\"}]');
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_friendrelation`
--

LOCK TABLES `xl_friendrelation` WRITE;
/*!40000 ALTER TABLE `xl_friendrelation` DISABLE KEYS */;
INSERT INTO `xl_friendrelation` VALUES (10,'11111aa11','1@qq.com','2da75864818c9108e70eaa500eae0272','123'),(11,'112','2@qq.com','2da75864818c9108e70eaa500eae0272','1232'),(12,'1111','2@qjj4ddd4qqssswwwqqq.c11om1','2da75864818c9108e70eaa500eae0272','12dfaas32'),(13,'115','1ghkghkhg@qq.csossm','f3bec40b5549d7744d33f441be8eafae','123'),(14,'1111','2@qjj44qqssswwwqqq.c11om1','f3bec40b5549d7744d33f441be8eafae','1232'),(15,'115','1ghkghkhg@qq.csossm','2da75864818c9108e70eaa500eae0272','12312321'),(16,'1111','2@qjj44qqssswwwqqq.c11om1','2da75864818c9108e70eaa500eae0272','131321232'),(17,'11111aa11','1@qq.com','2da75864818c9108e70eaa500eae0272','12113444'),(18,'112','2@qq.com','2da75864818c9108e70eaa500eae0272','12324444336'),(19,'Appleseed','邮箱为空','','8885551212'),(20,'Bell','邮箱为空','','15) 5553695'),(21,'Haro','邮箱为空','','5555228243'),(22,'Higgins','邮箱为空','','08) 5553514'),(23,'Taylor','邮箱为空','','5556106679'),(24,'Zakroff','邮箱为空','','07) 5551854'),(25,'Appleseed','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','8885551212'),(26,'Bell','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15) 5553695'),(27,'Haro','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','5555228243'),(28,'Higgins','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','08) 5553514'),(29,'Taylor','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','5556106679'),(30,'Zakroff','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','07) 5551854'),(31,'爸','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18504863396'),(32,'班长','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18047084807'),(33,'测试','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13344448888'),(34,'陈思','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13028695936'),(35,'陈洋','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18231196168'),(36,'褚文广','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18748293822'),(37,'大史','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18231199176'),(38,'董雪','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15934934766'),(39,'杜哥','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18237180956'),(40,'高燕','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233131038'),(41,'鬼哥','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13832162300'),(42,'汉子','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18728089675'),(43,'红艳姐','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13947622839'),(44,'宽爷','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18032780176'),(45,'老白','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233132764'),(46,'老姐','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13847961827'),(47,'老魏','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13522308661'),(48,'李','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233132922'),(49,'李艳红','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233136193'),(50,'刘宏伟','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18937108535'),(51,'刘矫','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233135739'),(52,'吕盼举','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18232189279'),(53,'妈','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18147627190'),(54,'马千里','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233136071'),(55,'马占富','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13191500338'),(56,'潘导员','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15130613388'),(57,'秦小鹏','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18801468987'),(58,'神奔兄','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13111574021'),(59,'神狗剩','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18513223621'),(60,'神康兄','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233131892'),(61,'神驴兄','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15614173798'),(62,'神孙兄','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18603291504'),(63,'宋文达','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13086040412'),(64,'体委','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18389378771'),(65,'田老师','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13191873783'),(66,'王晶','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233135701'),(67,'王天龙','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18230102746'),(68,'王小虎','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18231199033'),(69,'乌丹车','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15847490838'),(70,'吴坤','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15614230183'),(71,'媳妇','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18611525009'),(72,'小绢姐','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13811962789'),(73,'雅茹','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15848899042'),(74,'杨帅','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233131819'),(75,'杨璇','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15981892201'),(76,'姚家琪','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15313808350'),(77,'移动网','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13910541482'),(78,'宇飞','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15849994425'),(79,'月兵','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18204955334'),(80,'赵丽霞','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13315980631'),(81,'赵艳敏','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15149084172'),(82,'赵燕荣','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13699182887'),(83,'赵镇宇','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18233131996'),(84,'郑海波','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','18647686025'),(85,'志虎','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15847627730'),(86,'周海新','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15104814760'),(87,'周南','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','15598615715'),(88,'朱国辉','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13180068374'),(89,'朱润','邮箱为空','a5d067602a08a1050b6f9f5b1498737d','13137595487'),(90,'11111aa11','1@qq.com','f76cdd92a8ae0dbc23fe8dcb0989acce','123'),(91,'112','2@qq.com','f76cdd92a8ae0dbc23fe8dcb0989acce','1232');
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
INSERT INTO `xl_impress` VALUES ('018ea74c7dce7656837eecaba79c83b2','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'2222',1,0),('01b1a6b69c6962a2c75b68b8865d8bd8','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'hello',1,0),('01f897b52a7c82371fd43437ebe64508','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('06f91d7de57a95127a9e241c89b4f6d2','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('07df479b3d4f9b5d5974c31cf3bae482','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'2222',1,0),('0ea35c50e8980326d5ab6c36638a7222','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'2222',1,0),('10f84f7207eaa8da65209cb88b7b2805','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('1340df7f5a84f75d20506e0b41daf47c','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('18a54792d9f0bbf1e526554995bc7af6','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',3,'333',1,0),('1a9dfab99f08a988588666fb19b418ef','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('1dc4c8b6339263eb80aa382946510382','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('1e4f5c2676f7040261f8967f0ea6bb27','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',2,'英俊',1,0),('207cc7eb3d0c0514b66494ecfe2bd51d','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('2228a58b561a0354cb3f5c8f9ceeda4e','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'22112',1,0),('2508dc6c81934ff1d6c2c03c7b9167f5','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello2',1,0),('255bd9d302b03d253c3a7709884ed4c5','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'1122221',1,0),('26b6f2aa56096213560e1588f574e502','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',1,'哥哥',1,0),('26f79f55cccf41028271efadc2cc0f01','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('2bc8710f3de30945f3d05dca9910bc78','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('30ee07a673406bec1d8eb3cd3f852f9e','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'11222321',1,0),('3ec79fb2c24b3e3eef1e60d06240a7d2','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello4',1,0),('407d7255124ad6df8e719d637fc1b734','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'11222321',1,1),('476561c8e7382febe4c61fb6f0f243ea','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',4,'神经病儿',1,0),('47aae5e3454059a959079d1839ec82da','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('495273f05720aa252a9af1e9fc6568af','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('4b2052855bbde34dd5fedda8c7090ad7','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'22112232',1,0),('4b382b561cac1e32f41d052caf1557f9','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'hello5',1,0),('4cde5b708a7fb231db13f4806adc5a2f','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'2222',1,0),('4e44a30f59c869e65b0e5aeddf47c388','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',1,'表哥',1,0),('526286f68aa9551d40020742f9b29f47','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello1',1,0),('52f7f1d21c641f09ebeb95a17d901387','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'2222',1,0),('5344ae1b04807a2fa433418462e06d74','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('54408c43554c545b97c64e62299ad5cf','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',4,'闷骚儿',1,0),('59c17c46cdf88a2d2ad4f3e96f6837ef','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('5b71da2167ee909895f01cf502e5e395','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('5bf3872333d4b1b03e36864a07c5efc4','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'22221',1,0),('5de9a131e7649491de264f23c7cbb84c','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'2222',1,0),('6124906e94ce8f41c2cb06b51d8e0bab','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('63956215be12e8994af82e4b1231aa09','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello2',1,0),('731565e4bb8f3b640357cc5f9cdab8a7','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('74c5385d3f049811065d8eaac123660f','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'hello',1,0),('75510ce7398f3f215f3b0cdd338b98fb','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',2,'英俊',1,0),('7d439397ef58540e0950246bd54d3057','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',3,'爱玩游戏',1,0),('814de3fe703eeed393b8b473f171d028','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('83b5094fc913a3e3e2b92a52c310d71a','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('8e8d980ca3d595516eab001392c45712','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello1',1,0),('924dae07f62bae1ac24129d418f6d26c','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello5',1,0),('93417b0563b678d182b11274d5da4132','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('9495f0abdc177816231768c6e12ec258','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',2,'潇洒',1,0),('9d734d95e6d29ea47c99776ef0db64e4','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',2,'潇洒',1,0),('9dea9ad838e804b21ec50227c8abb250','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',2,'潇洒',1,0),('9e2a2a9cfa0cc5b7f5eedc743c85bb11','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('a2a0da48ac1307df66bc46ebf9246a73','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('a6088ae498599cff257245342aceac8c','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('a6bcd156cff7d6bbd927f2f18e460e7b','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('a718378d86925c87f0f49788128db82e','f76cdd92a8ae0dbc23fe8dcb0989acce','f3bec40b5549d7744d33f441be8eafae',2,'帅气',1,0),('aac2f4675752f19742a46e626a879771','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('aec774182ce2cf52ce26f151cf5a45f0','7754c6ac0395d5578f2a97418ba0aca5','a5d067602a08a1050b6f9f5b1498737d',3,'爱玩游戏',1,0),('b0a40a42bceef2a1d6982cfa78960b23','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('b36386c923b6392a4c6e24f891e20b89','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello1',1,0),('b54816c45ba6f57f60f7ec50dfb2440a','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello9',1,0),('b8bb36b4d8f516220ffafc69d7c83917','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'221132',1,0),('b9d6c81c5b3478350bbe0b99cebc8aba','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('ba9a93c49477e7305ea35908bb782605','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('c0a4ce031e68da93a49c135ff21acec9','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('c1cd0167d69cf6b27e61a09d3e64232f','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'221132',1,1),('c65246d4b2012da981f86233b73b3db5','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'2222',1,0),('cc9fc66d6a4b45f4cb7db2978b44f106','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('cfa7a80cac6a18f6492daafc4be81cdd','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',1,'2222',1,0),('d13b7b72892316484fd9da9d28ac4969','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',2,'hello5',1,0),('dba565765f79cc7f0ee67b9044c59f43','7754c6ac0395d5578f2a97418ba0aca5','a5d067602a08a1050b6f9f5b1498737d',3,'闷骚',1,0),('ddbbd7ae564ac664a24a50fc0e865bfc','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('dfdd3c3a145d4b9577be0f3d37869800','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('e53b46a6444c0bf31e48800efa9a8ead','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'1122232221',1,0),('e7504614b24617f6773ad4222ae30a4d','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',3,'333',1,0),('ea45fef79eec201ae725e5c54d75d61e','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',2,'2222',1,0),('ef7108fc7b8de46b5d8e6f73c4f3dda4','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('f12fe1c00b025d7acd3201d0ee2b48fa','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello',1,0),('f61f5821fe854fab52b048dc15c299af','ffe2f9de6e0aade7e335d81be201044a','f3bec40b5549d7744d33f441be8eafae',1,'hello2',1,0),('f769d4d37c4a6d0fdb2bf33ea779173c','a5d067602a08a1050b6f9f5b1498737d','f3bec40b5549d7744d33f441be8eafae',3,'闷骚',1,0),('f8239c8727c8982fb0eaccccac998f65','ffe2f9de6e0aade7e335d81be201044a','85f56c5a792260b902cd83628ba0973d',1,'hello',1,0),('fdc115b31be684d568b7694e8947a169','16f7d31850c1697d372c60998e21a22f','f3bec40b5549d7744d33f441be8eafae',3,'2222',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_impress_keyword`
--

LOCK TABLES `xl_impress_keyword` WRITE;
/*!40000 ALTER TABLE `xl_impress_keyword` DISABLE KEYS */;
INSERT INTO `xl_impress_keyword` VALUES (2,'ffe2f9de6e0aade7e335d81be201044a','hello',8,1,1),(3,'ffe2f9de6e0aade7e335d81be201044a','hello2',2,1,1),(4,'ffe2f9de6e0aade7e335d81be201044a','hello1',1,1,1),(5,'ffe2f9de6e0aade7e335d81be201044a','hello4',1,1,1),(6,'ffe2f9de6e0aade7e335d81be201044a','hello5',3,1,1),(7,'ffe2f9de6e0aade7e335d81be201044a','hello9',1,1,1),(8,'ffe2f9de6e0aade7e335d81be201044a','2222',2,1,2),(9,'ffe2f9de6e0aade7e335d81be201044a','333',2,1,3),(10,'16f7d31850c1697d372c60998e21a22f','2222',17,1,2),(11,'16f7d31850c1697d372c60998e21a22f','22221',1,1,3),(12,'16f7d31850c1697d372c60998e21a22f','22112',1,1,1),(13,'16f7d31850c1697d372c60998e21a22f','1122221',1,1,1),(14,'16f7d31850c1697d372c60998e21a22f','221132',2,1,3),(15,'16f7d31850c1697d372c60998e21a22f','11222321',2,1,3),(16,'16f7d31850c1697d372c60998e21a22f','22112232',1,1,2),(17,'16f7d31850c1697d372c60998e21a22f','1122232221',1,1,2),(18,'a5d067602a08a1050b6f9f5b1498737d','表哥',1,1,1),(19,'a5d067602a08a1050b6f9f5b1498737d','哥哥',1,1,1),(20,'a5d067602a08a1050b6f9f5b1498737d','英俊',2,1,2),(21,'a5d067602a08a1050b6f9f5b1498737d','潇洒',2,1,2),(22,'a5d067602a08a1050b6f9f5b1498737d','闷骚',1,0,3),(23,'a5d067602a08a1050b6f9f5b1498737d','爱玩游戏',1,1,3),(24,'7754c6ac0395d5578f2a97418ba0aca5','闷骚',1,1,3),(25,'7754c6ac0395d5578f2a97418ba0aca5','爱玩游戏',1,1,3),(26,'f76cdd92a8ae0dbc23fe8dcb0989acce','帅气',1,1,2),(27,'f76cdd92a8ae0dbc23fe8dcb0989acce','潇洒',1,1,2),(28,'a5d067602a08a1050b6f9f5b1498737d','神经病儿',1,1,4),(29,'a5d067602a08a1050b6f9f5b1498737d','闷骚儿',1,1,4);
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
-- Table structure for table `xl_plan`
--

DROP TABLE IF EXISTS `xl_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_plan` (
  `id` varchar(128) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `plankeyword` varchar(128) NOT NULL,
  `status` enum('created','published','unpublished') DEFAULT 'created',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author_id` varchar(128) NOT NULL,
  `cover_image_id` varchar(128) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `share_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `cover_image_id` (`cover_image_id`),
  CONSTRAINT `xl_plan_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `xl_plan_ibfk_2` FOREIGN KEY (`cover_image_id`) REFERENCES `xl_imageresource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_plan`
--

LOCK TABLES `xl_plan` WRITE;
/*!40000 ALTER TABLE `xl_plan` DISABLE KEYS */;
INSERT INTO `xl_plan` VALUES ('aaa','','','','created','2015-12-03 16:32:44','15ecfff668f79342661e7520cbefb86d',NULL,0,0);
/*!40000 ALTER TABLE `xl_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_planlabel`
--

DROP TABLE IF EXISTS `xl_planlabel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_planlabel` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(128) NOT NULL,
  `label` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xl_planlabel_ibfk_1` (`plan_id`),
  CONSTRAINT `xl_planlabel_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `xl_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_planlabel`
--

LOCK TABLES `xl_planlabel` WRITE;
/*!40000 ALTER TABLE `xl_planlabel` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_planlabel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xl_plantype`
--

DROP TABLE IF EXISTS `xl_plantype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xl_plantype` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `category_cn` varchar(64) NOT NULL,
  `category_en` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xl_plantype`
--

LOCK TABLES `xl_plantype` WRITE;
/*!40000 ALTER TABLE `xl_plantype` DISABLE KEYS */;
/*!40000 ALTER TABLE `xl_plantype` ENABLE KEYS */;
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

-- Dump completed on 2015-12-21 12:51:50
