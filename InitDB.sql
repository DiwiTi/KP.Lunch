-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: flow
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

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
-- Table structure for table `flow_doctrine_migrationstatus`
--

DROP TABLE IF EXISTS `flow_doctrine_migrationstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_doctrine_migrationstatus` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kp_lunch_domain_model_lunch`
--

DROP TABLE IF EXISTS `kp_lunch_domain_model_lunch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kp_lunch_domain_model_lunch` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kp_lunch_domain_model_lunch_orders_join`
--

DROP TABLE IF EXISTS `kp_lunch_domain_model_lunch_orders_join`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kp_lunch_domain_model_lunch_orders_join` (
  `lunch_lunch` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lunch_order` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lunch_lunch`,`lunch_order`),
  KEY `IDX_333B2EDFE1BE43C7` (`lunch_lunch`),
  KEY `IDX_333B2EDF9D66DA84` (`lunch_order`),
  CONSTRAINT `FK_333B2EDF9D66DA84` FOREIGN KEY (`lunch_order`) REFERENCES `kp_lunch_domain_model_order` (`persistence_object_identifier`),
  CONSTRAINT `FK_333B2EDFE1BE43C7` FOREIGN KEY (`lunch_lunch`) REFERENCES `kp_lunch_domain_model_lunch` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kp_lunch_domain_model_monthlybill`
--

DROP TABLE IF EXISTS `kp_lunch_domain_model_monthlybill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kp_lunch_domain_model_monthlybill` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kp_lunch_domain_model_order`
--

DROP TABLE IF EXISTS `kp_lunch_domain_model_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kp_lunch_domain_model_order` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  KEY `IDX_FF617E868D93D649` (`user`),
  CONSTRAINT `FK_FF617E868D93D649` FOREIGN KEY (`user`) REFERENCES `kp_lunch_domain_model_user` (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kp_lunch_domain_model_user`
--

DROP TABLE IF EXISTS `kp_lunch_domain_model_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kp_lunch_domain_model_user` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lunch`
--

DROP TABLE IF EXISTS `lunch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lunch` (
  `idlunch` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL DEFAULT '400',
  PRIMARY KEY (`idlunch`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `neos_flow_mvc_routing_objectpathmapping`
--

DROP TABLE IF EXISTS `neos_flow_mvc_routing_objectpathmapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neos_flow_mvc_routing_objectpathmapping` (
  `objecttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uripattern` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pathsegment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`objecttype`,`uripattern`,`pathsegment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `neos_flow_resourcemanagement_persistentresource`
--

DROP TABLE IF EXISTS `neos_flow_resourcemanagement_persistentresource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neos_flow_resourcemanagement_persistentresource` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sha1` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `collectionname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mediatype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relativepublicationpath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` decimal(20,0) NOT NULL,
  PRIMARY KEY (`persistence_object_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `neos_flow_security_account`
--

DROP TABLE IF EXISTS `neos_flow_security_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neos_flow_security_account` (
  `persistence_object_identifier` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `accountidentifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authenticationprovidername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credentialssource` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `expirationdate` datetime DEFAULT NULL,
  `roleidentifiers` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:simple_array)',
  `lastsuccessfulauthenticationdate` datetime DEFAULT NULL,
  `failedauthenticationcount` int(11) DEFAULT NULL,
  PRIMARY KEY (`persistence_object_identifier`),
  UNIQUE KEY `flow_identity_neos_flow_security_account` (`accountidentifier`,`authenticationprovidername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idlunch` int(11) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(45) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-06 18:03:13
