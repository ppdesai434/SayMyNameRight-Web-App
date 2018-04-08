-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 12:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saymyname`
--

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `name`, `startdatetime`, `enddatetime`, `Address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'UTA Career Guide', '2018-04-17 17:30:00', '2018-04-19 10:30:00', '701 S Nedderman Dr', 'Arlington', 'TX', 'USA', 76019, 1),
(3, 'NSBE', '2020-02-20 14:02:00', '2021-01-20 02:03:00', 'Add', 'City', 'PA', 'United States', 742343, 3);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `description`, `name`, `startdatetime`, `enddatetime`, `Address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'Job fair for UTA students', 'Job Fair - 2018', '2018-02-05 10:30:00', '2018-02-05 17:30:00', '300 W 1st St', 'Arlington', 'TX', 'USA', 76010, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `noofpeople` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `createdby` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `description`, `noofpeople`, `address`, `City`, `State`, `Country`, `zip`, `createdby`) VALUES
(1, 'World Health Organization', 'Agency of the United Nations concerned with international public health', 25000, '900 N Rural Rd', 'San Jose', 'CA', 'USA', 85226, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `City` varchar(1000) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `Address`, `City`, `State`, `Country`, `zip`, `phonenumber`) VALUES
(1, 'James Smith', 'james.smith@gmail.com', 'abcd123', '3800 W Cooper St', 'Arlington', 'TX', 'USA', 76010, 2147483647),
(3, 'admin', 'admin@123.com', 'admin', 'admin', 'admin', 'admin', 'admin', 75035, 2147483647),
(4, 'animesh', 'animesh@gmail.com', 'animesh123', 'timber brooks', 'Arlington', 'TX', 'United States', 76010, 1234567890),
(5, 'jenil', 'jenil.desai25@gmail.com', 'jenildesai25', 'jenil', 'jenil', 'ejni', 'kenk', 25646, 2147483647),
(6, 'parth desai', '1234@gmail.com', '1234', '1234', '1234', '1234', '1234', 1234, 132143),
(7, 'mandbhksa', 'djfds@fhsakn.coom', '1234andksjvg', 'dknsfkj', 'ksndsjk', 'lndfkjbd', 'nwdkwqns', 1241, 12131),
(8, 'PD', 'pd@gmail.com', 'pd123', '1002', 'Arlington', 'Texas', 'USA', 76013, 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdby` (`createdby`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdby` (`createdby`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdby` (`createdby`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
