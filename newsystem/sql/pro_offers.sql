-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2013 at 03:54 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

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
-- Table structure for table `pro_offers`
--

CREATE TABLE IF NOT EXISTS `pro_offers` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(255) NOT NULL,
  `offer_type` varchar(255) NOT NULL,
  `offer_created_by` int(11) NOT NULL,
  `offer_valid_from` bigint(11) NOT NULL,
  `offer_valid_until` bigint(11) NOT NULL,
  `lifetime_validity` tinyint(1) NOT NULL DEFAULT '0',
  `offer_notes` text NOT NULL,
  `offer_status` tinyint(1) NOT NULL,
  `offer_created_on` bigint(11) NOT NULL,
  `offer_modified_on` bigint(11) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pro_offers`
--

INSERT INTO `pro_offers` (`offer_id`, `offer_title`, `offer_type`, `offer_created_by`, `offer_valid_from`, `offer_valid_until`, `lifetime_validity`, `offer_notes`, `offer_status`, `offer_created_on`, `offer_modified_on`) VALUES
(1, 'Return Ticket Offer', '2', 1, 5, 30, 0, 'While Booking Return Tickets', 1, 1383654649, 0),
(2, 'Online Buying Offer', '4', 1, 5, 30, 0, 'Online Buying Offer', 1, 1383654730, 0),
(3, 'Corporate Offers Edited', '1', 6, 1385596800, 1385424000, 0, 'Corporate Offers Edited', 0, 1383654993, 1383838061),
(4, 'Employees Offer', '3', 1, 5, 30, 0, 'Employees Offer', 1, 1383655037, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
