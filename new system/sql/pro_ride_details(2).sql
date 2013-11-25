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
-- Table structure for table `pro_ride_details`
--

CREATE TABLE IF NOT EXISTS `pro_ride_details` (
  `ride_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `one_way` tinyint(1) NOT NULL DEFAULT '0',
  `instant` tinyint(1) NOT NULL DEFAULT '0',
  `passenger_city` varchar(100) NOT NULL,
  `start_time` varchar(25) NOT NULL,
  `return_time` varchar(25) NOT NULL,
  `start_time_24` time NOT NULL DEFAULT '08:00:00',
  `return_time_24` time NOT NULL DEFAULT '05:00:00',
  `origin_location` varchar(255) NOT NULL,
  `destination_location` varchar(255) NOT NULL,
  `travel_as` varchar(50) NOT NULL,
  `join_alert_needed` tinyint(1) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL DEFAULT '',
  `model_type` varchar(100) NOT NULL DEFAULT '',
  `fuel_type` varchar(100) NOT NULL DEFAULT '',
  `added_on` bigint(11) NOT NULL,
  `modified_on` bigint(11) NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ride_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pro_ride_details`
--

INSERT INTO `pro_ride_details` (`ride_id`, `user_id`, `one_way`, `instant`, `passenger_city`, `start_time`, `return_time`, `start_time_24`, `return_time_24`, `origin_location`, `destination_location`, `travel_as`, `join_alert_needed`, `vehicle_type`, `model_type`, `fuel_type`, `added_on`, `modified_on`, `active_status`) VALUES
(1, 1, 0, 0, 'Bangalore', '12:10 AM', '12:10 AM', '08:00:00', '19:00:00', 'Madiwala Bus Stop, Hosur Road, Madivala, BTM Layout 1, Bangalore, Karnataka, India', 'Majestic', 'driver', 0, 'Car', 'Hero Honda', 'Diesel', 1381931415, 1381931415, 1),
(2, 3, 0, 0, 'Bangalore', '12:10 AM', '5:10 PM', '08:00:00', '17:00:00', 'Majestic Bus Terminus, Gandhi Nagar, Bangalore, Karnataka, India', 'Domluru', 'driver', 1, 'Bike', 'Yemaha', 'Petrol', 1381931415, 1381931415, 1),
(4, 3, 0, 0, 'Bangalore', '12:10 AM', '6:30 PM', '08:00:00', '17:30:00', 'Koramangala 4 Block, Koramangala, Bangalore, Karnataka, India', 'Marathahalli', 'driver', 0, 'Car', 'Hero Honda', 'Diesel', 1381931415, 1381931415, 1),
(5, 1, 0, 0, 'Bangalore', '12:10 AM', '5:10 PM', '08:00:00', '18:00:00', 'Domlur II Stage, Domlur, Bangalore, Karnataka, India', 'Richmond Circle', 'driver', 0, 'Car', 'Yemaha', 'Diesel', 1381931415, 1381931415, 1),
(6, 1, 0, 0, 'Bangalore', '12:10 AM', '12:10 AM', '08:45:00', '17:00:00', 'Silk Board Junction, Madivala, Bangalore, Karnataka, India', 'Majestic', 'driver', 0, 'Car', 'Hero Honda', 'Diesel', 1381931415, 1381931415, 1),
(7, 2, 0, 0, 'Bangalore', '12:10 AM', '5:10 PM', '09:30:00', '17:45:00', 'Marathahalli Bus Stop, Marathahalli village, Marathahalli, Bangalore, Karnataka, India', 'Domluru', 'driver', 1, 'Bike', 'Yemaha', 'Petrol', 1381931415, 1381931415, 1),
(8, 2, 0, 0, 'Bangalore', '12:10 AM', '6:30 PM', '09:00:00', '16:30:00', 'Krishnarajapuram Railway Station, Outer Ring Road, Jyothipuram, Dooravani Nagar, Bangalore, Karnataka, India', 'Marathahalli', 'driver', 0, 'Car', 'Hero Honda', 'Diesel', 1381931415, 1381931415, 1),
(9, 1, 0, 0, 'Bangalore', '12:10 AM', '5:10 PM', '07:00:00', '16:00:00', 'Domlur Village, Domlur, Bangalore, Karnataka, India', 'Richmond Circle', 'driver', 0, 'Car', 'Yemaha', 'Diesel', 1381931415, 1381931415, 1),
(10, 11, 0, 0, 'Bangalore', '08:00 AM', '05:00 PM', '08:00:00', '17:00:00', 'Malleswaram 8th Cross Bus Stop, 8th Cross Road, Malleshwaram, Bangalore, Karnataka, India', 'Majestic Railway Station, Gubbi Thotadappa Road, Railway Colony, Majestic, Bangalore, Karnataka, India', 'driver', 1, 'Bike', 'Yemaha', 'Diesel', 1382598585, 1382601319, 1),
(11, 11, 0, 0, 'Bangalore', '08:00 AM', '05:00 PM', '08:00:00', '17:00:00', 'Halasuru, Old Madras Road, Gupta Layout, Bangalore, Karnataka, India', 'Hebbal, Bangalore, Karnataka, India', 'passenger', 1, 'Car', '', 'Diesel', 1382598718, 1382598718, 1),
(12, 11, 0, 0, 'Bangalore', '08:00 AM', '05:00 PM', '08:00:00', '17:00:00', 'Bommanahalli Bus Stop, Bommanahalli, Bangalore, Karnataka, India', 'MG Road, Mahatma Gandhi Road, Shanthala Nagar, Shivaji Nagar, Bangalore, Karnataka, India', 'driver', 0, 'Car', 'Swift', 'Diesel', 1382603848, 1382603848, 1),
(13, 11, 0, 0, 'Bangalore', '08:00 AM', '07:00 PM', '08:00:00', '19:00:00', 'Majestic Railway Station, Gubbi Thotadappa Road, Railway Colony, Majestic, Bangalore, Karnataka, India', 'Marathahalli Bus Stop, Marathahalli village, Marathahalli, Bangalore, Karnataka, India', 'driver', 1, 'Car', 'Alto', 'Diesel', 1382609933, 1382609933, 1),
(14, 15, 0, 0, 'Bangalore', '08:00 AM', '05:00 PM', '08:00:00', '17:00:00', 'Richmond Circle, Sampangi Rama Nagar, Bangalore, Karnataka, India', 'Majestic Bus Terminus, Gandhi Nagar, Bangalore, Karnataka, India', 'driver', 0, 'Car', 'Santro', 'Diesel', 1382610463, 1382610463, 1),
(15, 2, 0, 0, 'Bangalore', '08:00 AM', '05:00 PM', '08:00:00', '17:00:00', 'CSI Hospital, Shivaji Nagar, Bangalore, Karnataka, India', 'Koramangala 4 Block, Koramangala, Bangalore, Karnataka, India', 'driver', 0, 'Car', 'Santro', 'Diesel', 1385031992, 1385031992, 1),
(16, 6, 1, 1, 'Bangalore', '06:00 PM', '', '18:00:00', '00:00:00', 'Majestic Bus Terminus, Gandhi Nagar, Bangalore, Karnataka, India', 'Madiwala Bus Stop, Hosur Road, Madivala, BTM Layout 1, Bangalore, Karnataka, India', 'driver', 0, 'Car', 'Santro', 'Diesel', 1385337600, 1385368540, 1),
(17, 4, 1, 1, 'Bangalore', '05:00 PM', '', '17:00:00', '05:00:00', 'Shivaji Nagar, Bangalore, Karnataka, India', 'Majestic Bus Terminus, Gandhi Nagar, Bangalore, Karnataka, India', 'driver', 0, 'Car', 'i10', 'Diesel', 1385337600, 1385368830, 1),
(18, 4, 1, 1, 'Bangalore', '08:00 PM', '', '20:00:00', '00:00:00', 'Hosur Road, Madivala, Bommanahalli, Bangalore, Karnataka, India', 'Majestic Bus Terminus, Gandhi Nagar, Bangalore, Karnataka, India', 'passenger', 0, '', '', '', 1385376729, 1385376729, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
