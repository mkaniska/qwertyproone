-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2013 at 02:42 PM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
