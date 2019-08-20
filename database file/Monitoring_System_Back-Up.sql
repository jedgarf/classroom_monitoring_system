-- MySQL dump 10.13  Distrib 5.1.53, for Win64 (unknown)
--
-- Host: localhost    Database: monitoring_system
-- ------------------------------------------------------
-- Server version	5.1.53-community-log

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
-- Table structure for table `tbl_1st_year`
--

DROP TABLE IF EXISTS `tbl_1st_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_1st_year` (
  `Acc_Type` varchar(13) NOT NULL,
  `Acc_Uname` varchar(20) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(25) NOT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(3) NOT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_Uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_1st_year`
--

LOCK TABLES `tbl_1st_year` WRITE;
/*!40000 ALTER TABLE `tbl_1st_year` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_1st_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_2nd_year`
--

DROP TABLE IF EXISTS `tbl_2nd_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_2nd_year` (
  `Acc_Type` varchar(13) NOT NULL,
  `Acc_Uname` varchar(20) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(25) NOT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(3) NOT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_Uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_2nd_year`
--

LOCK TABLES `tbl_2nd_year` WRITE;
/*!40000 ALTER TABLE `tbl_2nd_year` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_2nd_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_3rd_year`
--

DROP TABLE IF EXISTS `tbl_3rd_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_3rd_year` (
  `Acc_Type` varchar(13) NOT NULL,
  `Acc_Uname` varchar(20) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(25) NOT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(3) NOT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_Uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_3rd_year`
--

LOCK TABLES `tbl_3rd_year` WRITE;
/*!40000 ALTER TABLE `tbl_3rd_year` DISABLE KEYS */;
INSERT INTO `tbl_3rd_year` VALUES ('Student','GC14-128','202cb962ac59075b964b07152d234b70','ronnel','alfonso','valiente','','Male','1997-08-31','3rd Year','What is Your Favorite Food?','adobo');
/*!40000 ALTER TABLE `tbl_3rd_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_4th_year`
--

DROP TABLE IF EXISTS `tbl_4th_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_4th_year` (
  `Acc_Type` varchar(13) NOT NULL,
  `Acc_Uname` varchar(20) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(25) NOT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(3) NOT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_Uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_4th_year`
--

LOCK TABLES `tbl_4th_year` WRITE;
/*!40000 ALTER TABLE `tbl_4th_year` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_4th_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_attendance_logs`
--

DROP TABLE IF EXISTS `tbl_attendance_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_attendance_logs` (
  `Att_Uname` varchar(10) NOT NULL,
  `Att_Fname` varchar(25) NOT NULL,
  `Att_Mname` varchar(25) NOT NULL,
  `Att_Lname` varchar(25) NOT NULL,
  `Att_NameExt` varchar(3) NOT NULL,
  `Att_Gender` char(6) NOT NULL,
  `Att_Ylevel` varchar(8) NOT NULL,
  `Att_Subj` varchar(50) NOT NULL,
  `Att_Room` varchar(25) NOT NULL,
  `Att_Timein` time NOT NULL,
  `Att_Timeout` time NOT NULL,
  `Att_Date` date NOT NULL,
  KEY `Att_Uname` (`Att_Uname`),
  KEY `Att_Subj` (`Att_Subj`),
  KEY `Att_Room` (`Att_Room`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_attendance_logs`
--

LOCK TABLES `tbl_attendance_logs` WRITE;
/*!40000 ALTER TABLE `tbl_attendance_logs` DISABLE KEYS */;
INSERT INTO `tbl_attendance_logs` VALUES ('GC14-128','ronnel','alfonso','valiente','','Male','3rd Year','ITP06 - Web Development','EN10','11:24:35','13:24:35','2017-08-31');
/*!40000 ALTER TABLE `tbl_attendance_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_classrooms`
--

DROP TABLE IF EXISTS `tbl_classrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_classrooms` (
  `Room_code` varchar(20) NOT NULL,
  PRIMARY KEY (`Room_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_classrooms`
--

LOCK TABLES `tbl_classrooms` WRITE;
/*!40000 ALTER TABLE `tbl_classrooms` DISABLE KEYS */;
INSERT INTO `tbl_classrooms` VALUES ('EN1'),('EN10'),('EN11'),('EN12'),('EN13'),('EN14'),('EN15'),('EN2'),('EN3'),('EN4'),('EN5'),('EN6'),('EN7'),('EN8'),('EN9'),('Lab2'),('Lab3'),('Natividad_Hall1'),('Natividad_Hall2');
/*!40000 ALTER TABLE `tbl_classrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects`
--

DROP TABLE IF EXISTS `tbl_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects` (
  `Sub_Ylevel` varchar(8) NOT NULL,
  `Sub_Sem` varchar(12) NOT NULL,
  `Sub_Code` varchar(10) NOT NULL,
  `Sub_Desc` varchar(50) NOT NULL,
  `Sub_Units` int(2) NOT NULL,
  PRIMARY KEY (`Sub_Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects`
--

LOCK TABLES `tbl_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
INSERT INTO `tbl_subjects` VALUES ('1st Year','1st Semester','ITC01','IT Fundamentals',3),('1st Year','1st Semester','ITC02','Programming 1',3),('1st Year','2nd Semester','ITC03','Programing 2',3),('1st Year','2nd Semester','ITF01','Office Productivity',3),('2nd Year','2nd Semester','ITF02','Object Oriented Programming 2',3),('2nd Year','2nd Semester','ITP03','Database Management System 1',3),('2nd Year','1st Semester','ITP01','Object Oriented Programming 1',3),('2nd Year','1st Semester','ITC04','Computer Organization',3),('3rd Year','1st Semester','ITP06','Web Development',3),('3rd Year','1st Semester','ITP08','Database Management System 2',3),('3rd Year','1st Semester','ITP07','System Analysis and Design',3),('4th Year','1st Semester','ITF03','Trips and Seminar',3),('4th Year','1st Semester','ITE02','Network Security and Maintenance',3),('3rd Year','2nd Semester','ITE11','Database Application Programming 1',3),('4th Year','1st Semester','ITE12','Database Application Programming 2',3),('4th Year','2nd Semester','OJT','On Job Training',10),('1st Year','1st Semester','Soc.Sci.','Social Science',3),('1st Year','1st Semester','English 1','Study and Thinking Skills',3),('1st Year','2nd Semester','English 2','Writing in Discipline',3),('1st Year','1st Semester','Math 1','College Algebra',3),('1st Year','1st Semester','Filipino 1','Komunikasyon sa Akademikong Filipino',3),('1st Year','1st Semester','PE 1','Fundamentals of Physical fitness & Gymnastics',2),('1st Year','1st Semester','NSTP 11','National Service Training Program 1',3),('1st Year','2nd Semester','Filipino 2','Pagbasa at Pagsulat tungo sa Pananaliksik',3),('1st Year','2nd Semester','Psycho','General Psychology',3),('1st Year','2nd Semester','PE 2','Rhythmic Activities',2),('1st Year','2nd Semester','NSTP 12','National Service Training Program 2',3),('2nd Year','1st Semester','ITP 02','Accounting Principles',3),('1st Year','2nd Semester','Math 2','Trigonometry',3),('2nd Year','1st Semester','English 3','Speech & oral Communication',3),('2nd Year','1st Semester','Philo 1','Logic',3),('2nd Year','1st Semester','Physics 1','Mechanics & Heat',3),('2nd Year','1st Semester','PE 3','Individual & Dual Sports',2),('2nd Year','2nd Semester','ITP04','Operating System Applications',3),('2nd Year','2nd Semester','ITP05','Network Management',3),('2nd Year','2nd Semester','ITC05','Discrete Structures',3),('2nd Year','2nd Semester','Physics 2','Electricity,Magnetism & Waves',3),('2nd Year','2nd Semester','Pol Sci','Political Science',3),('2nd Year','2nd Semester','PE 4','Team Sports/Games',2),('3rd Year','1st Semester','ITE01','Electronics w/ Technical Drawing',3),('3rd Year','1st Semester','Econ','Basic Economics',3),('3rd Year','1st Semester','Lit 1','Literatures of the World',3),('3rd Year','2nd Semester','ITP09','Software Engineering',3),('3rd Year','2nd Semester','ITP10','Multimedia Systems',3),('3rd Year','2nd Semester','ITC06','Professional Ethics',3),('3rd Year','2nd Semester','Philo 2','Philosophy of Man',3),('3rd Year','2nd Semester','Math 3','Probability & Statistics',3),('4th Year','1st Semester','ITP11','Capstone Project',3),('4th Year','1st Semester','ITE13','Database Administration & Security',3),('2nd Year','1st Semester','PI','Rizals Life & Works',3);
/*!40000 ALTER TABLE `tbl_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_accounts`
--

DROP TABLE IF EXISTS `tbl_user_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_accounts` (
  `Acc_Type` varchar(13) NOT NULL,
  `Acc_Uname` varchar(20) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(25) NOT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(3) NOT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_Uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_accounts`
--

LOCK TABLES `tbl_user_accounts` WRITE;
/*!40000 ALTER TABLE `tbl_user_accounts` DISABLE KEYS */;
INSERT INTO `tbl_user_accounts` VALUES ('Administrator','admin','202cb962ac59075b964b07152d234b70','John Edgar','Dela Cruz','Francisco','Jr.','Male','1996-05-12','What is Your Favorite Subject?','database'),('Professor','roger','81dc9bdb52d04dc20036dbd8313ed055','roger','cruz','primo','Jr.','Male','1987-08-31','What is Your Favorite Subject?','database'),('Professor','jeff','202cb962ac59075b964b07152d234b70','jeff','delacruz','maon','','Male','1990-08-31','What is Your Favorite Games?','table tennis');
/*!40000 ALTER TABLE `tbl_user_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-02 17:38:39
