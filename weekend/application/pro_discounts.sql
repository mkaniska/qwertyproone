-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 04:24 AM
-- Server version: 5.1.36-community-log
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pro_discounts`
--

CREATE TABLE IF NOT EXISTS `pro_discounts` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_title` varchar(255) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `discount_notes` text NOT NULL,
  `discount_provider` varchar(255) NOT NULL,
  `discount_city` varchar(100) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_phone` int(11) NOT NULL,
  `discount_picture` varchar(255) NOT NULL,
  `discount_status` tinyint(1) NOT NULL,
  `discount_created_on` bigint(11) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pro_discounts`
--

INSERT INTO `pro_discounts` (`discount_id`, `discount_title`, `discount_type`, `discount_notes`, `discount_provider`, `discount_city`, `contact_person`, `contact_phone`, `discount_picture`, `discount_status`, `discount_created_on`) VALUES
(1, 'Airtel Talktime', 'Mobile', 'Airtel Talktime', 'Airtel', 'Bangalore', 'Muralidharan', 2147483647, '1387723824.jpg', 1, 1387723824);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
