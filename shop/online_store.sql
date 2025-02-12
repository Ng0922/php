-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2025 at 06:39 AM
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
  `username` varchar(128) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_status` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `gender`, `date_of_birth`, `registration_date`, `account_status`) VALUES
(6, 'ngpinchun0922', '09221', 'zxcvb', 'asdcv', 'female', '2025-02-09', '2025-02-12 14:09:34', '1'),
(4, 'bod_9229', '12345', 'asdw', 'asdwas', 'male', '2024-11-06', '2025-02-05 14:04:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `manufacture_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `promotion_price` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`manufacture_date`, `expired_date`, `id`, `name`, `description`, `product_cat`, `price`, `promotion_price`, `created`, `modified`) VALUES
('0000-00-00', '0000-00-00', 1, 'Basketball', 'A ball used in the NBA.', 'Sport', 49.99, 0, '2015-08-02 12:04:03', '2025-02-12 06:20:56'),
('0000-00-00', '0000-00-00', 3, 'Gatorade', 'This is a very good drink for athletes.', 'Sport Drink', 1.99, 0, '2015-08-02 12:14:29', '2025-02-12 06:20:56'),
('0000-00-00', '0000-00-00', 4, 'Eye Glasses', 'It will make you read better.', 'Daily', 6, 0, '2015-08-02 12:15:04', '2025-02-12 06:20:56'),
('0000-00-00', '0000-00-00', 5, 'Trash Can', 'It will help you maintain cleanliness.', 'Daily', 3.95, 0, '2015-08-02 12:16:08', '2025-02-12 06:20:56'),
('0000-00-00', '0000-00-00', 7, 'Earphone', 'You need this one if you love music.', 'Gaming', 7, 0, '2015-08-02 12:18:21', '2025-02-12 06:20:56'),
('2025-02-05', '2025-02-28', 9, 'cc', '1', 'Gaming', 20, 10, '2025-02-05 05:47:25', '2025-02-12 06:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` varchar(50) NOT NULL,
  `product_cat_name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `product_cat_description` text NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
('Sport', 'Sport', ''),
('Sport Drink', 'Sport Drink', ''),
('Gaming', 'Gaming', ''),
('Daily', 'Daily', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
