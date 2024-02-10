-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2024 at 02:18 PM
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
-- Database: `product_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `review_id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `review_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'THIS IS A COMMENT 1', '2024-02-08 16:21:46', '2024-02-08 16:21:46'),
(2, 1, 1, 'THIS IS A COMMENT 2', '2024-02-08 16:21:46', '2024-02-08 16:21:46'),
(3, 1, 2, 'THIS IS A COMMENT TO REVIEW 2', '2024-02-08 16:53:28', '2024-02-08 16:53:28'),
(4, 0, 2, '', '2024-02-09 08:35:29', '2024-02-09 08:35:29'),
(5, 1, 1, 'sdfsdfsd', '2024-02-09 08:56:37', '2024-02-09 08:56:37'),
(6, 1, 4, 'comment test', '2024-02-09 09:01:28', '2024-02-09 09:01:28'),
(7, 1, 8, 'Hello', '2024-02-10 02:16:17', '2024-02-10 02:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` varchar(50) NOT NULL,
  `count` int NOT NULL,
  `sold` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `count`, `sold`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 13 Pro', 'The latest iPhone model from Apple, featuring a Pro camera system, ProMotion display, and A15 Bionic chip.', '999.00', 100, 10, '2023-01-01 08:00:00', '2023-01-01 08:00:00'),
(2, 'Samsung Galaxy S22 Ultra', 'A premium Android smartphone with a high-resolution camera, 5G connectivity, and a vibrant AMOLED display.', '1199.99', 150, 0, '2023-02-05 10:30:00', '2023-02-05 10:30:00'),
(3, 'Sony PlayStation 6', 'The next-generation gaming console from Sony, offering immersive gaming experiences, high-fidelity graphics, and lightning-fast load times.', '499.99', 200, 0, '2023-03-10 12:45:00', '2023-03-10 12:45:00'),
(4, 'MacBook Pro 16-inch', 'Powerful laptop from Apple with a stunning Retina display, M1 Pro or M1 Max chip, and up to 21 hours of battery life.', '1999.00', 80, 40, '2023-04-15 15:00:00', '2023-04-15 15:00:00'),
(5, 'Canon EOS R5', 'Professional-grade mirrorless camera with a 45MP sensor, 8K video recording, and advanced autofocus capabilities.', '3899.00', 50, 0, '2023-05-20 17:15:00', '2023-05-20 17:15:00'),
(6, 'DJI Mavic 3', 'High-performance drone with an advanced camera system, obstacle sensors, and intelligent flight modes for capturing stunning aerial footage.', '799.00', 30, 0, '2023-06-25 19:30:00', '2023-06-25 19:30:00'),
(7, 'Nintendo Switch Pro', 'Enhanced version of the popular Nintendo Switch console with upgraded hardware, 4K graphics support, and improved battery life.', '349.99', 100, 25, '2023-07-30 21:45:00', '2023-07-30 21:45:00'),
(8, 'Bose QuietComfort 45', 'Wireless noise-canceling headphones with lifelike sound, comfortable design, and up to 24 hours of battery life.', '329.00', 200, 0, '2023-08-04 09:00:00', '2023-08-04 09:00:00'),
(9, 'GoPro Hero 12 Black', 'Advanced action camera with 5.3K video recording, HyperSmooth stabilization, and built-in mounting options for capturing adventures.', '499.00', 150, 0, '2023-09-09 11:15:00', '2023-09-09 11:15:00'),
(10, 'Amazon Echo Show 15', 'Smart display with a 15.6-inch touchscreen, Alexa voice assistant, and built-in camera for video calls and home monitoring.', '249.99', 180, 0, '2023-10-14 13:30:00', '2023-10-14 13:30:00'),
(11, 'Microsoft Surface Pro 9', 'Versatile 2-in-1 laptop with a high-resolution PixelSense display, powerful Intel processors, and all-day battery life.', '899.00', 120, 0, '2023-11-19 15:45:00', '2023-11-19 15:45:00'),
(12, 'Fitbit Charge 6', 'Advanced fitness tracker with built-in GPS, heart rate monitoring, sleep tracking, and up to 7 days of battery life.', '179.95', 300, 0, '2023-12-24 18:00:00', '2023-12-24 18:00:00'),
(13, 'LG C2 OLED TV', 'Premium OLED TV with stunning picture quality, Dolby Vision IQ, Dolby Atmos sound, and HDMI 2.1 connectivity for gaming.', '1499.99', 100, 0, '2024-01-29 20:15:00', '2024-01-29 20:15:00'),
(14, 'Garmin Fenix 7', 'Multisport GPS smartwatch with advanced performance metrics, mapping features, and up to 16 days of battery life in smartwatch mode.', '799.99', 80, 0, '2024-02-03 22:30:00', '2024-02-03 22:30:00'),
(15, 'Razer Blade 17 Pro', 'High-performance gaming laptop with NVIDIA GeForce RTX 30 series graphics, a 360Hz display, and customizable RGB lighting.', '2499.99', 60, 0, '2024-03-09 09:45:00', '2024-03-09 09:45:00'),
(16, 'Anker PowerCore 26800', 'Portable charger with a massive 26800mAh capacity, PowerIQ technology, and multiple USB ports for charging multiple devices simultaneously.', '59.99', 500, 0, '2024-04-14 12:00:00', '2024-04-14 12:00:00'),
(17, 'Sony WH-1000XM4', 'Wireless noise-canceling headphones with industry-leading noise cancellation, immersive sound, and up to 30 hours of battery life.', '349.99', 200, 0, '2024-05-19 14:15:00', '2024-05-19 14:15:00'),
(18, 'Logitech MX Master 3', 'Advanced wireless mouse with customizable buttons, a high-precision sensor, and ergonomic design for enhanced productivity.', '99.99', 250, 0, '2024-06-24 16:30:00', '2024-06-24 16:30:00'),
(19, 'Xiaomi Mi Electric Scooter Pro 2', 'Electric scooter with a powerful motor, long-range battery, and foldable design for easy transportation.', '599.00', 150, 0, '2024-07-29 18:45:00', '2024-07-29 18:45:00'),
(20, 'Philips Hue White and Color Ambiance Starter Kit', 'Smart lighting kit with customizable colors, voice control, and remote access via a smartphone app.', '199.99', 300, 0, '2024-08-03 21:00:00', '2024-08-03 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'THIS ITEM IS GOOD!!!', '2024-02-08 15:27:27', '2024-02-08 15:27:27'),
(2, 2, 1, 'NICE!!!', '2024-02-08 15:30:02', '2024-02-08 15:30:02'),
(3, 2, 1, 'TEST COMMENT', '2024-02-09 08:14:39', '2024-02-09 08:14:39'),
(4, 1, 1, 'test', '2024-02-09 09:01:23', '2024-02-09 09:01:23'),
(5, 2, 1, 'dfssd', '2024-02-09 09:06:02', '2024-02-09 09:06:02'),
(6, 2, 1, 'dfgdf', '2024-02-09 09:08:08', '2024-02-09 09:08:08'),
(7, 1, 5, 'first review for phone 5', '2024-02-09 10:12:30', '2024-02-09 10:12:30'),
(8, 1, 2, 'Nice Product!', '2024-02-10 09:52:16', '2024-02-10 09:52:16'),
(9, 1, 2, '', '2024-02-10 09:52:26', '2024-02-10 09:52:26'),
(10, 1, 2, 'Test', '2024-02-10 12:01:07', '2024-02-10 12:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminz', 'test', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', '2024-02-08 11:48:04', '2024-02-08 11:48:04'),
(2, 'user', 'two', 'user2@gmail.com', '672b6e7da75e5e7f5a3c2c46392d3eed', '2024-02-09 09:03:26', '2024-02-09 09:03:26'),
(3, 'admin', 'one', 'admin1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-02-10 06:18:02', '2024-02-10 06:18:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
