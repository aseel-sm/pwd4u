-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 08, 2022 at 01:15 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
CREATE TABLE IF NOT EXISTS `bids` (
  `bidId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `contractorId` int(11) NOT NULL,
  `bid_description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `quoatation` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bidId`),
  KEY `contractorId` (`contractorId`),
  KEY `projectId` (`projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `talukId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `oId` int(11) DEFAULT NULL,
  `eId` int(11) DEFAULT NULL,
  `image` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `analysis` varchar(30) NOT NULL,
  `initial` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `talukId` (`talukId`),
  KEY `userId` (`userId`),
  KEY `eId` (`eId`),
  KEY `oId` (`oId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

DROP TABLE IF EXISTS `contractor`;
CREATE TABLE IF NOT EXISTS `contractor` (
  `cId` int(8) NOT NULL,
  `cLicense` varchar(20) NOT NULL,
  `certificatePath` varchar(30) NOT NULL,
  UNIQUE KEY `cId` (`cId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(1, 'Thiruvananthapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(4, 'Alapuzha'),
(5, 'Kottayam'),
(6, 'Idukki'),
(7, 'Ernakulam'),
(8, 'Thrissur'),
(9, 'Palakkad'),
(10, 'Malappuram'),
(11, 'Kozhikode'),
(12, 'Wayanad'),
(13, 'Kannur'),
(14, 'Kasargode');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

DROP TABLE IF EXISTS `engineer`;
CREATE TABLE IF NOT EXISTS `engineer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification` varchar(30) NOT NULL,
  `certificatePath` varchar(50) NOT NULL,
  `dId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dId` (`dId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overseer`
--

DROP TABLE IF EXISTS `overseer`;
CREATE TABLE IF NOT EXISTS `overseer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification` varchar(30) NOT NULL,
  `certificatePath` varchar(50) NOT NULL,
  `tId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tId` (`tId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `tenderId` int(11) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `completed_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cId` (`cId`),
  KEY `tenderId` (`tenderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taluk`
--

DROP TABLE IF EXISTS `taluk`;
CREATE TABLE IF NOT EXISTS `taluk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taluk_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dId` (`dId`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taluk`
--

INSERT INTO `taluk` (`id`, `taluk_name`, `dId`) VALUES
(1, 'THIRUVANANTHAPRUAM', 1),
(2, 'CHIRAYINKEEZH', 1),
(3, 'NEDUMANGAD', 1),
(4, 'NEYYATTINKARA', 1),
(5, 'KATTAKADA', 1),
(6, 'VARKALA', 1),
(7, 'KUNNATHUR', 2),
(8, 'KARUNAGAPPALLY', 2),
(9, 'KOLLAM', 2),
(10, 'KOTTARAKKARA', 2),
(11, 'PATHNAPURAM', 2),
(12, 'PUNALUR', 2),
(13, 'ADOOR', 3),
(14, 'KOZHENCHERY', 3),
(15, 'MALLAPPALLY', 3),
(16, 'RANNI', 3),
(17, 'THIRUVALLA', 3),
(18, 'KONNI', 3),
(19, 'AMBALAPPUZHA', 4),
(20, 'CHERTHALA', 4),
(21, 'KUTTANAD', 4),
(22, 'KARTHIKAPPALLY', 4),
(23, 'CHENGANNUR', 4),
(24, 'MAVELIKKARA', 4),
(25, 'CHANGANASSERY', 5),
(26, 'KANJIRAPPALLY', 5),
(27, 'KOTTAYAM', 5),
(28, 'MEENACHIL', 5),
(29, 'VAIKOM', 5),
(30, 'DEVIKULAM', 6),
(31, 'PEERUMADE', 6),
(32, 'UDUMBANCHOLA', 6),
(33, 'THODUPUZHA', 6),
(34, 'IDUKKI', 6),
(35, 'KOCHI', 7),
(36, 'KANAYANNOR', 7),
(37, 'PARAVUR', 7),
(38, 'ALUVA', 7),
(39, 'KUNNATHUNAD', 7),
(40, 'KOTHAMANGALAM', 7),
(41, 'MOOVATTUPUZHA', 7),
(42, 'THRISSUR', 8),
(43, 'THALAPPILLY', 8),
(44, 'MUKUNDAPURAM', 8),
(45, 'CHAVAKKAD', 8),
(46, 'KODUNGALLUR', 8),
(47, 'CHALAKKUDY', 8),
(48, 'KUNNAMKULAM', 8),
(49, 'ALATHUR', 9),
(50, 'CHITTUR', 9),
(51, 'MANNARKAD', 9),
(52, 'OTTAPPALAM', 9),
(53, 'PALAKKAD', 9),
(54, 'PATTAMBI', 9),
(55, 'ERNAD', 10),
(56, 'PERINTHALMANNA', 10),
(57, 'PONNANI', 10),
(58, 'TIRUR', 10),
(59, 'NILAMBUR', 10),
(60, 'TIRURANGADI', 10),
(61, 'KONDOTTY', 10),
(62, 'KOZHIKODE', 11),
(63, 'KOYILANDY', 11),
(64, 'VATAKARA', 11),
(65, 'THAMARASSERY', 11),
(66, 'MANANTHAVADY', 12),
(67, 'SULTHANBATHERY', 12),
(68, 'VYTHIRI', 12),
(69, 'TALIPARAMBA', 13),
(70, 'KANNUR', 13),
(71, 'THALASSERY', 13),
(72, 'IRITTY', 13),
(73, 'PAYYANNUR', 13),
(74, 'KASARAGOD', 14),
(75, 'HOSDURG', 14),
(76, 'MANJESWARAM', 14),
(77, 'VELLARIKKUNDU', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(2) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`contractorId`) REFERENCES `contractor` (`cId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`talukId`) REFERENCES `taluk` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`eId`) REFERENCES `engineer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`oId`) REFERENCES `overseer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `contractor`
--
ALTER TABLE `contractor`
  ADD CONSTRAINT `contractor_ibfk_1` FOREIGN KEY (`cId`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `engineer`
--
ALTER TABLE `engineer`
  ADD CONSTRAINT `engineer_ibfk_1` FOREIGN KEY (`dId`) REFERENCES `district` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `engineer_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `overseer`
--
ALTER TABLE `overseer`
  ADD CONSTRAINT `overseer_ibfk_1` FOREIGN KEY (`tId`) REFERENCES `taluk` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `overseer_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`cId`) REFERENCES `complaint` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`tenderId`) REFERENCES `bids` (`bidId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `taluk`
--
ALTER TABLE `taluk`
  ADD CONSTRAINT `taluk_ibfk_1` FOREIGN KEY (`dId`) REFERENCES `district` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
