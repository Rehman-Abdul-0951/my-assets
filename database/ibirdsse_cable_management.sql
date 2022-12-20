-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2020 at 03:19 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibirdsse_cable_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_no` bigint(15) DEFAULT NULL,
  `phone_number` bigint(15) DEFAULT NULL,
  `alternate_number` varchar(50) DEFAULT NULL,
  `city` text,
  `zid1` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `street_1` text,
  `street_2` text,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` bigint(15) DEFAULT NULL,
  `operator` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `mobile_no`, `phone_number`, `alternate_number`, `city`, `zid1`, `email`, `street_1`, `street_2`, `country`, `postal_code`, `operator`) VALUES
(12, 'Test', 'tst', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Abdul', 'Rehman', NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Test', 'tst', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Test', 'tst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lineman`
--

DROP TABLE IF EXISTS `lineman`;
CREATE TABLE IF NOT EXISTS `lineman` (
  `lineman_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`lineman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
CREATE TABLE IF NOT EXISTS `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`operator_id`, `operator_name`, `logo`) VALUES
(1, 'TTTTTTT', 'assets/images/operator_logo_images/8904.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `months` int(11) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `price`, `months`) VALUES
(1, 'Test', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `installation_date` date NOT NULL,
  `customer` int(11) NOT NULL,
  `stb_id` varchar(15) NOT NULL,
  `card_id` varchar(15) NOT NULL,
  `zone` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `renewal_date` varchar(40) DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `operators` int(11) DEFAULT NULL,
  PRIMARY KEY (`subscription_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `status`, `installation_date`, `customer`, `stb_id`, `card_id`, `zone`, `package`, `renewal_date`, `expiry_date`, `operators`) VALUES
(1, 'active', '2020-06-30', 11, '1234567890876', '000000009876543', 0, 1, NULL, '2020-07-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `street_1` text NOT NULL,
  `street_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `first_name`, `last_name`, `email`, `password`, `street_1`, `street_2`, `city`, `country`, `postal_code`) VALUES
(1, 'admin', 'abdul', 'rehman', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'demo1', 'demo2', 'ajmer', 'india', 305001),
(14, 'user', 'sunil', 'kumar', 'sunil@gmail.com', '12345', 'ajmer', 'ajmer', 'ajmer', 'india', 305001);

-- --------------------------------------------------------

--
-- Table structure for table `user_zone`
--

DROP TABLE IF EXISTS `user_zone`;
CREATE TABLE IF NOT EXISTS `user_zone` (
  `userzone_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `zid` int(11) NOT NULL,
  PRIMARY KEY (`userzone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_zone`
--

INSERT INTO `user_zone` (`userzone_id`, `user_id`, `zid`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(100) NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`) VALUES
(1, 'Ajmer Zone'),
(2, 'Jaipur Zone');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
