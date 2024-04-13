-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: clinic
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `appointmentId` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` varchar(30) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`appointmentId`),
  KEY `memberId` (`memberId`),
  KEY `doctorId` (`doctorId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,1,1,'2015-10-16','2:00PM - 3:30PM',1),(4,5,1,'2015-10-16','2:00PM - 3:30PM',2),(5,11,1,'2015-10-16','2:00PM - 3:30PM',3),(7,5,6,'2015-10-22','6:00PM - 9:00PM',1),(8,8,6,'2015-10-29','6:00PM - 9:00PM',1);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointmentstatus`
--

DROP TABLE IF EXISTS `appointmentstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointmentstatus` (
  `appointmentDate` date NOT NULL,
  `doctorId` int(11) NOT NULL,
  `scheduleId` int(11) NOT NULL,
  `lastToken` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`appointmentDate`,`doctorId`),
  KEY `scheduleId` (`scheduleId`),
  KEY `doctorId` (`doctorId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointmentstatus`
--

LOCK TABLES `appointmentstatus` WRITE;
/*!40000 ALTER TABLE `appointmentstatus` DISABLE KEYS */;
INSERT INTO `appointmentstatus` VALUES ('2015-10-12',1,1,0,'Available'),('2015-10-16',1,2,3,'Available'),('2015-10-16',2,3,0,'Available'),('2015-10-23',2,3,0,'Available'),('2015-10-21',9,6,0,'Available'),('2015-10-21',34,10,0,'Available'),('2015-10-22',6,8,1,'Available'),('2015-10-30',1,2,0,'Available'),('2015-10-30',2,3,0,'Available'),('2015-10-29',6,8,1,'Available');
/*!40000 ALTER TABLE `appointmentstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `doctorId` int(11) NOT NULL AUTO_INCREMENT,
  `doctorName` varchar(30) NOT NULL,
  `doctorPwd` varchar(15) NOT NULL,
  `doctorAge` int(11) NOT NULL,
  `doctorGender` varchar(10) NOT NULL,
  `doctorPhone` varchar(12) NOT NULL,
  `doctorAddress` varchar(50) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY (`doctorId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (1,'Dr.Han Shwe','hanshwe',34,'Male','094696543','    Kyaikhto','Eye Doctor','MBBS(ygn),Dip.in Sur','8 years','3000'),(2,'Dr.Hla Hla','hlahla',34,'Female','09798764','Mudon','Urologist','MBBS(ygn)','9 years','5000'),(3,'Dr.Mg Mg','mgmg',56,'Male','095770701','Yangon','Dentist','MBBS(ygn)','12 years','5000'),(4,'Professor Mya Thaung','myathaung',53,'Male','094696543','Yangon','Dentist','MBBS(ygn),Dip.in Sur','13 years','6000'),(5,'Professor Khin Tun','khintun',45,'Male','0976345','Yangon','Urologist','MBBS,M.Med.Sc','10 years','5000'),(6,'Dr.Win Mya','winmya',50,'Male','0967432','Yangon','Urologist','MBBS(ygn),M.Med.Sc','11 years','6000'),(7,'Professor Khin Mg Mg Than','khinmgmgthan',52,'Male','09712345','Yangon','Neurologist','MBBS(ygn),M.Med.Sc','14 years','6000'),(8,'Dr.Tin Shwe','tinshwe',33,'Male','09643227','Yangon','Neurologist','MBBS(ygn),M.Med.Sc','5 years','5000'),(9,'Professor Thein Nyunt','theinnyunt',46,'Male','0976542333','Mandalay','Ear','MBBS,FRCS(Eng)','9 years','7000'),(10,'Professor Ye Myint','yemyint',52,'Male','0976542111','Mandalay','Gastroenterologist','MBBS(ygn),FRCS(Edin)','13 years','6000'),(11,'Professor Thein Nyunt','theinnyunt',52,'Male','094321679','Mandalay','Gastroenterologist','MBBS(ygn),PHD(Med)','12 years','5000'),(12,'Professor Mg Mg Lay','mgmglay',55,'Male','0975432445','Mandalay','Gastroenterologist','MBBS(ygn),FRCS(Edin)','15 years','7000'),(13,'Professor Soe Myint','soemyint',45,'Male','097463222','Yangon','Obstetrician-Gynecologist','MBBS,FRCOG(UK)','10 years','5000'),(14,'Professor Than Than Tin','thanthantin',47,'Female','0997564322','Yangon','Obstetrician-Gynecologist','MBBS(ygn),M.Med.Sc','12 years','6000'),(15,'Professor Khin Thein Oo','khintheinoo',54,'Female','099764453',' Yangon','Ear','MBBS(ygn),M.Med.Sc','14 years','7000'),(16,'Professor Kyaw Nyunt','kyawnyunt',40,'Male','097654432','Yangon','Obstetrician-Gynecologist','MBBS(mdy),M.Med.Sc','7 years','6000'),(17,'Professor Yin Yin Zaw','yinyinzaw',43,'Female','09765221','Yangon','Obstetrician-Gynecologist','MBBS(ygn),M.Med.Sc','10 years','7000'),(18,'Dr.Thar Hlaing','tharhlaing',45,'Male','099765564','Yangon','Endocrinologist','MBBS(ygn)','13 years','6000'),(19,'Dr.Khin Khin Phyu','khinkhinphyu',39,'Female','09996544','Mandalay','Endocrinologist','MBBS(ygn)','7 years','5000'),(20,'Dr.Than Sein','thansein',54,'Female','0974345667','Mawlamyime','Neurologist','MBBS(ygn)','14 years','7000'),(21,'Dr.Saw Si Mon Thor','sawsimonthor',45,'Male','09955643','Yangon','Neurologist','MBBS(ygn),Dip.in Sur','11 years','4000'),(22,'Professor Min Lwin','minlwin',49,'Male','2147483647','Yangon','Orthopedic Surgeon','MBBS(ygn)','9 years','7000'),(23,'Professor Hla Min','hlamin',37,'Male','0997066777','Mandalay','Orthodontist','MBBS(ygn)','6 years','4000'),(24,'Professor Nay Win','naywin',45,'Male','095900764','Yangon','Orthopedic Surgeon','MBBS(ygn)','8 years','6000'),(25,'Professor Aye Aye','ayeaye',40,'Female','097654335','Yangon','Pediatrician','MBBS(ygn)','9 years','6000'),(26,'Dr. Kyaw Zin Win','kyawzinwin',39,'Male','0935679','Yangon','Pediatrician','MBBS(ygn)','8 years','5000'),(27,'Dr. Khin Khin Chon','khinkhinchon',36,'Female','094579543','Mandalay','Pediatrician','MBBS(ygn)','6 years','4000'),(28,'Dr. Kyi Kyi San','kyikyisan',40,'Female','09765321','Yangon','Allergist(Immunologist)','MBBS(ygn)','10 years','5000'),(29,'Dr. Soe Myint','soemyint',37,'Male','097654322','Yangon','Sports Medicine Specialist','MBBS(ygn)','6 years','4000'),(30,'Dr. Hla Htay','hlahtay',45,'Male','099764321','Yangon','Psychiatrist','MBBS(ygn)','10 years','6000'),(31,'Professor Khin San Tint','khinsantint',50,'Female','09321457','Yangon','Radiologist','MBBS(ygn)DMRD M.MED.','7 years','7000'),(32,'Professor Ko Ko Maung','kokomaung',52,'Male','0976543212','Yangon','Primary Care Doctor','BDS,MDSC.Oral','19 years','9000'),(33,'Dr. Than Myint','thanmyint',54,'Male','0945632','Yangon','Hematologist(Blood Specialist)','MBBS(ygn)','19 years','7000'),(34,'Dr.Tin Aye','tinaye',0,'','','','','','','');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT,
  `memberName` varchar(30) NOT NULL,
  `memberPwd` varchar(15) NOT NULL,
  `memberFatherName` varchar(30) NOT NULL,
  `memberAge` int(11) NOT NULL,
  `memberGender` varchar(10) NOT NULL,
  `memberPhone` varchar(12) NOT NULL,
  `memberAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Mg Phyu','mgphyu','U Hla',12,'Male','0942505672','Yangon'),(2,'Mg Mg','mgmg','U Ko',34,'Male','099769876','Mawlamyime'),(3,'Mya Mya','myamya','U Maung ',30,'Female','0942536503','Mudon'),(4,'Mg Ba','mgba','U Mya',27,'Male','05822222','  Hpa-an'),(5,'Daw Than Than Aye','thanthanaye','U Hla Than',39,'Female','09874432',' Yangon'),(6,'Ma Phyu Phyu','phyuphyu','U Ba Phyu',23,'Female','09887433','Thaton'),(7,'Daw Than Hla','thanhla','U Than Aye',32,'Female','09864432','Yangon'),(8,'Ma Phyu Win','phyuwin','U Mg Mg',21,'Female','098986433','Thaton'),(9,'U Aye Mon','ayemon','U Tin Maung',40,'Male','09234578','Mandalay'),(10,'U Mg Mg Than','mgmgthan','U Tin Aye',37,'Male','0987443211','Yangon'),(11,'Su Su','susu','U Kyaw',13,'Female','09224532778','  Thaton'),(12,'Su Su','susu','',13,'','','');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `scheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `endTime` varchar(10) NOT NULL,
  `doctorId` int(11) NOT NULL,
  PRIMARY KEY (`scheduleId`),
  KEY `doctorId` (`doctorId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'Monday','7:00AM','8:00AM',1),(2,'Friday','2:00PM','3:30PM',1),(3,'Friday','9:00AM','10:30AM',2),(4,'Tuesday','9:00AM','10:30AM',2),(5,'Monday','8:00AM','9:30AM',4),(6,'Wednesday','2:00PM','4:00PM',9),(7,'Sunday','4:30PM','8:00PM',28),(8,'Thursday','6:00PM','9:00PM',6),(9,'Monday','10:00AM','12:00PM',34),(10,'Wednesday','7:00AM','10:00AM',34);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voting`
--

DROP TABLE IF EXISTS `voting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voting` (
  `votingId` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`votingId`),
  KEY `memberId` (`memberId`),
  KEY `doctorId` (`doctorId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voting`
--

LOCK TABLES `voting` WRITE;
/*!40000 ALTER TABLE `voting` DISABLE KEYS */;
INSERT INTO `voting` VALUES (1,2,1,5),(2,1,1,4),(3,3,1,4),(4,3,1,2),(5,4,1,1),(6,5,1,3),(7,11,8,3);
/*!40000 ALTER TABLE `voting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-16 15:57:50
