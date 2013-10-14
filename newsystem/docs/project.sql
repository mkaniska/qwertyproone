-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2013 at 04:14 AM
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
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `CityID` int(11) NOT NULL AUTO_INCREMENT,
  `StateID` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `Notes` longtext,
  `ChangedBy` varchar(50) DEFAULT NULL,
  `ChangeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CityID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `StateID`, `CityName`, `Notes`, `ChangedBy`, `ChangeDate`) VALUES
(1, 21, 'Kanchipuram', NULL, 'manikandan', '2013-09-22 15:28:17'),
(2, 21, 'Tiruvallur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(3, 21, 'Cuddalore', NULL, 'manikandan', '2013-09-22 15:28:17'),
(4, 21, 'Villupuram', NULL, 'manikandan', '2013-09-22 15:28:17'),
(5, 21, 'Vellore', NULL, 'manikandan', '2013-09-22 15:28:17'),
(6, 21, 'Tiruvannamalai', NULL, 'manikandan', '2013-09-22 15:28:17'),
(7, 21, 'Salem', NULL, 'manikandan', '2013-09-22 15:28:17'),
(8, 21, 'Namakkal', NULL, 'manikandan', '2013-09-22 15:28:17'),
(9, 21, 'Dharmapuri', NULL, 'manikandan', '2013-09-22 15:28:17'),
(10, 21, 'Erode', NULL, 'manikandan', '2013-09-22 15:28:17'),
(11, 21, 'Coimbatore', NULL, 'manikandan', '2013-09-22 15:28:17'),
(12, 21, 'The Nilgiris', NULL, 'manikandan', '2013-09-22 15:28:17'),
(13, 21, 'Thanjavur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(14, 21, 'Nagapattinam', NULL, 'manikandan', '2013-09-22 15:28:17'),
(15, 21, 'Tiruvarur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(16, 21, 'Tiruchirappalli', NULL, 'manikandan', '2013-09-22 15:28:17'),
(17, 21, 'Karur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(18, 21, 'Perambalur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(19, 21, 'Pudukkottai', NULL, 'manikandan', '2013-09-22 15:28:17'),
(20, 21, 'Madurai', NULL, 'manikandan', '2013-09-22 15:28:17'),
(21, 21, 'Kanchipuram', NULL, 'manikandan', '2013-09-22 15:28:17'),
(22, 21, 'Theni', NULL, 'manikandan', '2013-09-22 15:28:17'),
(23, 21, 'Dindigul', NULL, 'manikandan', '2013-09-22 15:28:17'),
(24, 21, 'Ramanathapuram', NULL, 'manikandan', '2013-09-22 15:28:17'),
(25, 21, 'Virudhunagar', NULL, 'manikandan', '2013-09-22 15:28:17'),
(26, 21, 'Sivagangai', NULL, 'manikandan', '2013-09-22 15:28:17'),
(27, 21, 'Tirunelveli', NULL, 'manikandan', '2013-09-22 15:28:17'),
(28, 21, 'Thoothukkudi', NULL, 'manikandan', '2013-09-22 15:28:17'),
(29, 21, 'Kanniyakumari', NULL, 'manikandan', '2013-09-22 15:28:17'),
(30, 21, 'Krishnagiri', NULL, 'manikandan', '2013-09-22 15:28:17'),
(31, 21, 'Ariyalur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(32, 21, 'Tiruppur', NULL, 'manikandan', '2013-09-22 15:28:17'),
(33, 21, 'Chennai', NULL, 'manikandan', '2013-09-22 15:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `cityyy`
--

CREATE TABLE IF NOT EXISTS `cityyy` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `notes` longtext,
  `changed_by` varchar(50) DEFAULT NULL,
  `change_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_groups`
--

CREATE TABLE IF NOT EXISTS `pro_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_status` tinyint(1) NOT NULL,
  `group_added` bigint(20) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_offers`
--

CREATE TABLE IF NOT EXISTS `pro_offers` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(255) NOT NULL,
  `offer_type` varchar(255) NOT NULL,
  `offer_created_by` int(11) NOT NULL,
  `offer_valid_upto` date NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_portfolio`
--

CREATE TABLE IF NOT EXISTS `pro_portfolio` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_image` varchar(150) NOT NULL,
  `project_description` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pro_portfolio`
--

INSERT INTO `pro_portfolio` (`project_id`, `project_name`, `project_image`, `project_description`) VALUES
(1, 'People Site', 'image_01.jpg', 'In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero.'),
(2, 'Design Team', 'image_02.jpg', 'In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero.'),
(3, 'Merry Christmas', 'image_03.jpg', 'Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in. Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in.'),
(4, 'Professional', 'image_04.jpg', 'Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in.Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in.'),
(5, 'Yello Blog', 'image_05.jpg', 'Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in.'),
(6, 'Motor Cycle', 'image_06.jpg', 'Sed eleifend odio eget massa venenatis elementum. Nunc porttitor feugiat elit, ac tristique turpis condimentum in.');

-- --------------------------------------------------------

--
-- Table structure for table `pro_users`
--

CREATE TABLE IF NOT EXISTS `pro_users` (
  `pro_users` int(11) NOT NULL AUTO_INCREMENT,
  `pro_user_type` int(11) NOT NULL,
  `pro_user_name` varchar(255) NOT NULL,
  `pro_user_password` varchar(255) NOT NULL,
  `pro_user_email` varchar(255) NOT NULL,
  `pro_user_status` tinyint(1) NOT NULL,
  `pro_user_address` varchar(255) NOT NULL,
  `pro_user_city` varchar(100) NOT NULL,
  `pro_user_state` varchar(150) NOT NULL,
  `pro_user_zipcode` varchar(25) NOT NULL,
  `pro_user_latitude` double(8,2) NOT NULL,
  `pro_user_longitude` double(8,2) NOT NULL,
  `pro_user_ip` varchar(25) NOT NULL,
  `pro_user_joined` bigint(20) NOT NULL,
  `pro_user_updated` bigint(20) NOT NULL,
  PRIMARY KEY (`pro_users`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_user_types`
--

CREATE TABLE IF NOT EXISTS `pro_user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pro_user_types`
--

INSERT INTO `pro_user_types` (`user_type_id`, `user_type`) VALUES
(1, 'Guest'),
(2, 'Commuters'),
(3, 'User'),
(4, 'HR'),
(5, 'Organization Admin'),
(6, 'Super Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
