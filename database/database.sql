-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2018 at 01:03 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `HealthCareSystem`
--
CREATE DATABASE IF NOT EXISTS `HealthCareSystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `HealthCareSystem`;

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

DROP TABLE IF EXISTS `Doctor`;
CREATE TABLE IF NOT EXISTS `Doctor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Doctor_ID_uindex` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`ID`, `email`, `name`, `password`, `Position`, `Company`) VALUES
(1, 'doctor@gmail.com', 'Locus', '123', 'Physician', 'University of Pittsburgh Medical Center'),
(2, 'doctor2@gmail.com', 'Helon', '123', 'Medician', 'University of Pittsburgh Medical Center'),
(3, 'doctor3@gmail.com', 'Mary', '123', 'Physician', 'University of Pittsburgh Medical Center');

-- --------------------------------------------------------

--
-- Table structure for table `DoctorCalendar`
--

DROP TABLE IF EXISTS `DoctorCalendar`;
CREATE TABLE IF NOT EXISTS `DoctorCalendar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DoctorID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Event` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Completed` enum('true','false') DEFAULT 'false',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DoctorCalendar_ID_uindex` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DoctorCalendar`
--

INSERT INTO `DoctorCalendar` (`ID`, `DoctorID`, `PatientID`, `Event`, `Date`, `Completed`) VALUES
(1, 1, 1, 'Check', '2018-08-19 23:01:33', 'false'),
(2, 1, 2, 'Cure', '2018-08-20 23:03:19', 'false'),
(3, 1, 3, 'Request', '2018-08-26 23:03:19', 'false'),
(4, 1, 4, 'Survey', '2018-08-27 23:03:19', 'false'),
(5, 1, 5, 'Inject', '2018-09-19 23:03:19', 'false'),
(6, 1, 6, 'Recheck', '2018-10-19 23:03:19', 'false'),
(7, 1, 5, 'Check', '2018-06-20 08:18:04', 'true'),
(8, 1, 2, 'hello', '2018-07-20 12:56:06', NULL),
(9, 1, 2, 'ASDASD', '2018-07-20 12:56:23', 'false'),
(10, 1, 2, 'hello', '2011-12-18 13:17:17', NULL),
(11, 1, 2, 'ASDASD', '2018-07-20 12:58:15', 'false'),
(12, 1, 2, 'ASDASD', '2018-07-20 12:58:31', 'false'),
(13, 1, 2, 'ASDASD', '2018-07-18 12:12:00', 'false'),
(14, 1, 2, 'ASDASD', '2018-07-18 01:01:00', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS `Patient`;
CREATE TABLE IF NOT EXISTS `Patient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `Diagnoses` varchar(255) NOT NULL DEFAULT 'Diagnostic Detail',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `userinfo_ID_uindex` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`ID`, `email`, `name`, `password`, `gender`, `age`, `Diagnoses`) VALUES
(1, 'username@gmail.com', 'David', '123', 'Male', 25, 'Diagnostic Detail 1'),
(2, 'patient@gmail.com', 'Jacob', '123', 'Female', 30, 'Diagnostic Detail'),
(3, 'patient2@gmail.com', 'Jill', '123', 'Male', 45, 'Diagnostic Detail'),
(4, 'patient3@gmail.com', 'Tony', '123', 'Male', 55, 'Diagnostic Detail'),
(5, 'patient4@gmail.com', 'Hannah', '123', 'Female', 62, 'Diagnostic Detail'),
(6, 'patinet5@gmail.com', 'Agus', '123', 'Female', 80, 'Diagnostic Detail'),
(7, 'patinet5@gmail.com', 'Lily', '123', 'Male', 20, 'Diagnostic Detail'),
(8, 'patinet5@gmail.com', 'Lotus', '123', 'Female', 32, 'Diagnostic Detail'),
(9, 'patinet5@gmail.com', 'Mary', '123', 'Male', 41, 'Diagnostic Detail'),
(10, 'patinet5@gmail.com', 'John', '123', 'Male', 52, 'Diagnostic Detail'),
(11, 'patinet5@gmail.com', 'Cally', '123', 'Male', 52, 'Diagnostic Detail'),
(12, 'patinet5@gmail.com', 'Maya', '123', 'Male', 54, 'Diagnostic Detail'),
(13, 'patinet5@gmail.com', 'Josh', '123', 'Male', 30, 'Diagnostic Detail'),
(14, 'patinet5@gmail.com', 'Kate', '123', 'Male', 26, 'Diagnostic Detail'),
(15, 'patinet5@gmail.com', 'Bally', '123', 'Female', 78, 'Diagnostic Detail'),
(16, 'patinet5@gmail.com', 'Mannah', '123', 'Male', 76, 'Diagnostic Detail'),
(17, 'patinet5@gmail.com', 'Kaye', '123', 'Male', 31, 'Diagnostic Detail'),
(18, 'patinet5@gmail.com', 'Loo', '123', 'Male', 15, 'Diagnostic Detail');

-- --------------------------------------------------------

--
-- Table structure for table `PatientDoctor`
--

DROP TABLE IF EXISTS `PatientDoctor`;
CREATE TABLE IF NOT EXISTS `PatientDoctor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PatientID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PatientDoctor_ID_uindex` (`ID`),
  KEY `PatientDoctor_Patient_ID_fk` (`PatientID`),
  KEY `PatientDoctor_Doctor_ID_fk` (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PatientDoctor`
--

INSERT INTO `PatientDoctor` (`ID`, `PatientID`, `DoctorID`) VALUES
(1, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 2, 2),
(20, 2, 1),
(21, 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PatientDoctor`
--
ALTER TABLE `PatientDoctor`
  ADD CONSTRAINT `PatientDoctor_Doctor_ID_fk` FOREIGN KEY (`DoctorID`) REFERENCES `Doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PatientDoctor_Patient_ID_fk` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
