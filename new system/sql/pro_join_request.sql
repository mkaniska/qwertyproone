-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2013 at 02:24 PM
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
-- Table structure for table `pro_join_request`
--

CREATE TABLE IF NOT EXISTS `pro_join_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `requesting_user_id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `is_instant` tinyint(1) NOT NULL DEFAULT '0',
  `requested_on` bigint(11) NOT NULL,
  `approved_on` bigint(11) NOT NULL,
  `request_status` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pro_join_request`
--

INSERT INTO `pro_join_request` (`request_id`, `requesting_user_id`, `owner_user_id`, `ride_id`, `is_instant`, `requested_on`, `approved_on`, `request_status`) VALUES
(4, 3, 2, 7, 0, 1382641789, 0, 2),
(5, 3, 1, 5, 0, 1382641805, 0, 2),
(8, 6, 4, 18, 1, 1385389085, 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
