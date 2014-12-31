-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2014 at 09:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jsonapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `json`
--

CREATE TABLE IF NOT EXISTS `json` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This is primay ket for Json table',
  `ClientId` int(11) NOT NULL COMMENT 'Foreign key for client table',
  `JsonKey` varchar(50) NOT NULL COMMENT 'Json key to access the value for json object',
  `JsonString` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'value for json object',
  `CreatedDate` datetime NOT NULL COMMENT 'date when json object is created',
  `ModifiedDate` datetime NOT NULL COMMENT 'date when json object is modified',
  PRIMARY KEY (`ID`),
  KEY `ClientId` (`ClientId`),
  KEY `ClientId_2` (`ClientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `json`
--
ALTER TABLE `json`
  ADD CONSTRAINT `client and json relattion` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
