-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 12:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saymyname`
--

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createdby` (`createdby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `name`, `startdatetime`, `enddatetime`, `Address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'UTA Career Guide', '2018-04-17 17:30:00', '2018-04-19 10:30:00', '701 S Nedderman Dr', 'Arlington', 'TX', 'USA', 76019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createdby` (`createdby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `description`, `name`, `startdatetime`, `enddatetime`, `Address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'Job fair for UTA students', 'Job Fair - 2018', '2018-02-05 10:30:00', '2018-02-05 17:30:00', '300 W 1st St', 'Arlington', 'TX', 'USA', 76010, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `noofpeople` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createdby` (`createdby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `description`, `noofpeople`, `address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'World Health Organization', 'Agency of the United Nations concerned with international public health', 25000, '900 N Rural Rd', 'San Jose', 'CA', 'USA', 85226, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `Address`, `City`, `State`, `Country`, `zip`, `phonenumber`) VALUES
(1, 'James Smith', 'james.smith@gmail.com', 'abcd123', '3800 W Cooper St', 'Arlington', 'TX', 'USA', 76010, 2147483647),
(3, 'admin', 'admin@123.com', 'admin', 'admin', 'admin', 'admin', 'admin', 75035, 2147483647),
(4, 'animesh', 'animesh@gmail.com', 'animesh123', 'timber brooks', 'Arlington', 'TX', 'United States', 76010, 1234567890),
(5, 'jenil', 'jenil.desai25@gmail.com', 'jenildesai25', 'jenil', 'jenil', 'ejni', 'kenk', 25646, 2147483647),
(6, 'parth desai', '1234@gmail.com', '1234', '1234', '1234', '1234', '1234', 1234, 132143),
(7, 'mandbhksa', 'djfds@fhsakn.coom', '1234andksjvg', 'dknsfkj', 'ksndsjk', 'lndfkjbd', 'nwdkwqns', 1241, 12131);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
