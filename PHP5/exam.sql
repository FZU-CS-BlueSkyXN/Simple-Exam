-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `perfectpeople`
--

DROP TABLE IF EXISTS `perfectpeople`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfectpeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `guid` varchar(255) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfectpeople`
--

LOCK TABLES `perfectpeople` WRITE;
/*!40000 ALTER TABLE `perfectpeople` DISABLE KEYS */;
INSERT INTO `perfectpeople` VALUES (1,'','','[{\"id\":8,\"answer\":2},{\"id\":14,\"answer\":2},{\"id\":20,\"answer\":1}]','7DE1E770-4DBA-58E0-1F95-EF9883429BFC','2016-12-28 01:10:15'),(2,'','','[{\"id\":17,\"answer\":1},{\"id\":19,\"answer\":2},{\"id\":20,\"answer\":1}]','E5FC6DC6-06E0-EE50-1203-0F1E776F30E8','2016-12-28 01:10:24'),(3,'','','[{\"id\":15,\"answer\":1},{\"id\":18,\"answer\":2},{\"id\":20,\"answer\":1}]','B06B8853-A2A8-0AB0-CB9D-52BF195676EA','2016-12-28 01:21:25'),(4,'','','[{\"id\":16,\"answer\":2},{\"id\":18,\"answer\":2},{\"id\":20,\"answer\":1}]','07ED4461-D48D-C794-436E-A847C8C07F5A','2021-06-23 12:09:44'),(5,'','','[{\"id\":17,\"answer\":1},{\"id\":20,\"answer\":1}]','A92981C6-63CA-6F4D-3208-F6D64CC66DA5','2021-06-23 13:33:02'),(6,'','','[{\"id\":3,\"answer\":4}]','A4F95924-F91A-C4E4-521A-41F6C2A557DF','2021-06-27 14:01:41'),(7,'','','[{\"id\":1,\"answer\":2},{\"id\":2,\"answer\":1}]','676B1495-5255-D1C2-59BE-D397B396C0AB','2021-06-27 14:04:14'),(8,'','','[{\"id\":3,\"answer\":4}]','3B8AB1CE-60F4-D45F-DDDB-6E9E3CF2389A','2021-06-27 14:04:23'),(9,'','','[{\"id\":6,\"answer\":8}]','104ED05E-01DA-7D65-8387-4A4B450CF9A7','2021-06-27 14:04:34'),(10,'','','[{\"id\":4,\"answer\":2}]','70DCF049-50E0-04A0-64B6-793DFA1B1C85','2021-06-27 14:05:55'),(11,'','','[{\"id\":6,\"answer\":8},{\"id\":10,\"answer\":7}]','7828412B-A444-236F-F54C-BE67F572CD7C','2021-06-27 14:13:39'),(12,'','','[{\"id\":8,\"answer\":1}]','258E8E62-1454-035A-06C5-19614EB01BE0','2021-06-27 15:32:16'),(13,'','','[{\"id\":9,\"answer\":2}]','D82472C1-B5A9-E1D9-177B-05124DB9AF0B','2021-06-27 15:32:41'),(14,'','','[{\"id\":6,\"answer\":8}]','2E7479B9-4E9F-C755-1339-26BB1A8D64D5','2021-06-27 15:32:52'),(15,'','','[{\"id\":6,\"answer\":8}]','F768C16E-DA66-165C-F6CB-CE36552BA3B2','2021-06-28 06:01:18'),(16,'','','[{\"id\":5,\"answer\":5},{\"id\":10,\"answer\":7}]','BFEBDCEF-CF1F-4893-7DAD-1DB5BCF586B0','2021-06-28 06:17:05'),(17,'','','[{\"id\":7,\"answer\":3},{\"id\":8,\"answer\":1}]','17DC0CC1-C224-40DC-4165-A2FBC60258A7','2021-06-28 11:05:59');
/*!40000 ALTER TABLE `perfectpeople` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `answer5` varchar(255) DEFAULT NULL,
  `answer6` varchar(255) DEFAULT NULL,
  `answer7` varchar(255) DEFAULT NULL,
  `answer8` varchar(255) DEFAULT NULL,
  `rightAnswer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'题目一','题目一的答案1','题目一的答案2（正确答案）','','','','','','','2'),(2,'题目二','题目二的答案1（正确答案）','题目二的答案2','题目二的答案3','','','','','','1'),(3,'题目三','题目三的答案1','题目三的答案2','题目三的答案3','题目三的答案4（正确答案）','题目三的答案5','','','','4'),(4,'题目四','题目四的答案1','题目四的答案2（正确答案）','题目四的答案3','题目四的答案4','','','','','2'),(5,'题目五','题目五的答案1','题目五的答案2','题目五的答案3','题目五的答案4','题目五的答案5（正确答案）','题目五的答案6','题目五的答案7','','5'),(6,'题目六','题目六的答案1','题目六的答案2','题目六的答案3','题目六的答案4','题目六的答案5','题目六的答案6','题目六的答案7','题目六的答案8（正确答案）','8'),(7,'题目七','题目七的答案1','题目七的答案2','题目七的答案3（正确答案）','题目七的答案4','题目七的答案5','题目七的答案6','','','3'),(8,'题目八','题目八的答案1（正确答案）','题目八的答案2','题目八的答案3','','','','','','1'),(9,'题目九','题目九的答案1','题目九的答案2（正确答案）','题目九的答案3','题目九的答案4','题目九的答案5','','','','2'),(10,'题目十','题目十的正确答案1','题目十的正确答案2','题目十的正确答案3','题目十的正确答案4','题目十的正确答案5','题目十的正确答案6','题目十的正确答案7（正确答案）','','7');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'exam'
--

--
-- Dumping routines for database 'exam'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-28 19:14:02
