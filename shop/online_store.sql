-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2025 at 04:52 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `gender`, `date_of_birth`, `registration_date`, `account_status`) VALUES
(1, 'xiaokai', 'fejnwafwaef', 'wavwe', 'vaweva', 'male', '2005-01-27', '2024-12-18 09:17:16', 1),
(2, 'xiaokai', 'efef', 'wavwe', 'vaweva', 'male', '2005-01-27', '2024-12-18 14:40:55', 0),
(3, 'xiaokai', 'ewfaw', 'wavwe', 'vaweva', 'male', '2024-02-20', '2024-12-18 14:55:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` int NOT NULL,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, 49.99, '2015-08-02 12:04:03', '2024-12-28 10:34:26'),
(3, 'Gatorade', 'This is a very good drink for athletes.', 1, 1.99, '2015-08-02 12:14:29', '2024-12-28 10:34:34'),
(4, 'Eye Glasses', 'It will make you read better.', 4, 6, '2015-08-02 12:15:04', '2024-12-28 10:34:37'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 4, 3.95, '2015-08-02 12:16:08', '2024-12-28 10:34:40'),
(6, 'Mouse', 'Very useful if you love your computer.', 2, 11.35, '2015-08-02 12:17:58', '2024-12-28 10:34:43'),
(7, 'Earphone', 'You need this one if you love music.', 2, 7, '2015-08-02 12:18:21', '2024-12-28 10:34:46'),
(8, 'Pillow', 'Sleeping well is important.', 4, 8.99, '2015-08-02 12:18:56', '2024-12-28 10:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL,
  `product_cat_name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `product_cat_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'sport', ''),
(2, 'game', ''),
(3, 'animal', ''),
(4, 'general', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
