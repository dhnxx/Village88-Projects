-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2024 at 02:34 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filter_pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `number_of_stock` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `number_of_stock`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cup', 120, 1.00, '2021-01-30 00:00:00', '2024-02-12 19:58:56'),
(2, 'Dress', 55, 3.00, '2021-02-14 00:00:00', '2024-02-12 19:58:56'),
(3, 'Shoes', 15, 5.00, '2021-12-30 00:00:00', '2024-02-12 19:58:56'),
(4, 'Shorts', 200, 2.50, '2021-12-21 00:00:00', '2024-02-12 19:58:56'),
(5, 'T-shirt', 1000, 2.00, '2021-01-25 00:00:00', '2024-02-12 19:58:56'),
(6, 'Mug', 1001, 3.00, '2021-01-23 00:00:00', '2024-02-12 19:58:56'),
(7, 'Pen', 300, 1.00, '2021-01-20 00:00:00', '2024-02-12 19:58:56'),
(8, 'Hairbrush', 250, 5.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(9, 'Notebook', 300, 3.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(10, 'Pencil', 500, 1.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(11, 'Eraser', 400, 1.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(12, 'Scissors', 200, 5.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(13, 'Glue stick', 150, 2.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(14, 'Stapler', 100, 4.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(15, 'Tape dispenser', 75, 3.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(16, 'Paper clips', 1000, 1.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(17, 'Rubber bands', 500, 1.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(18, 'Calculator', 50, 10.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(19, 'Flashlight', 75, 8.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(20, 'Magnifying glass', 25, 5.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(21, 'Ruler', 100, 2.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(22, 'Level', 50, 10.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(23, 'Hammer', 25, 15.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(24, 'Screwdriver', 50, 8.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(25, 'Wrench', 25, 12.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56'),
(26, 'Pliers', 25, 10.00, '2024-02-12 19:58:56', '2024-02-12 19:58:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
