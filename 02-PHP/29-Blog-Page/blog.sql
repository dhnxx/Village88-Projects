-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2024 at 03:56 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `review_id` int DEFAULT NULL,
  `context` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_replies_reviews` (`review_id`),
  KEY `fk_replies_users` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `review_id`, `context`, `created_at`, `updated_at`) VALUES
(11, 5, 4, 'Lost in the pages of a forgotten book, memories of distant lands come to life.', '2024-01-27 05:00:27', '2024-01-27 05:00:27'),
(13, 8, 6, 'this a reply from lolers456', '2024-01-27 22:38:14', '2024-01-27 22:38:14'),
(14, 8, 6, 'Testing Reply', '2024-01-27 23:01:48', '2024-01-27 23:01:48'),
(15, 9, 6, 'Nice Proudct!', '2024-01-27 23:27:01', '2024-01-27 23:27:01'),
(4, 1, 4, 'Thank you for your kind words! We strive to provide top-notch products and service. Let us know if there\'s anything else we can do for you.', '2024-01-27 14:45:42', '2024-01-27 14:45:42'),
(1, 3, 1, 'Glad you love the product! If you have any questions or need assistance, feel free to reach out. We appreciate your positive feedback!', '2024-01-27 10:45:21', '2024-01-27 10:45:21'),
(2, 4, 2, 'Thanks for your recommendation! We\'re thrilled that you\'re satisfied with our product and service. Looking forward to serving you again!', '2024-01-27 11:58:34', '2024-01-27 11:58:34'),
(10, 2, 2, 'The mesmerizing dance of fireflies in the moonlit garden creates a magical atmosphere', '2024-01-27 04:59:39', '2024-01-27 04:59:39'),
(6, 2, 1, '\"Great to hear that you\'re enjoying the product! If you ever need assistance or have questions, feel free to ask. Happy customer service is our priority.\"', '2024-01-27 11:30:22', '2024-01-27 11:30:22'),
(7, 4, 1, '\"I had a similar experience! This product has become a must-have for me. Cheers to a great purchase.\"', '2024-01-27 11:35:48', '2024-01-27 11:35:48'),
(8, 2, 1, 'Great to hear that you\'re enjoying the product! If you ever need assistance or have questions, feel free to ask. Happy customer service is our priority.', '2024-01-27 11:30:22', '2024-01-27 11:30:22'),
(9, 4, 1, 'I had a similar experience! This product has become a must-have for me. Cheers to a great purchase.', '2024-01-27 11:35:48', '2024-01-27 11:35:48'),
(12, 4, 4, 'As the sun sets, the horizon is painted with hues of orange and pink, a canvas of nature\'s art.', '2024-01-27 05:00:27', '2024-01-27 05:00:27'),
(16, 9, 7, 'Thanks for the feedback!', '2024-01-27 23:33:47', '2024-01-27 23:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `context` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `context`, `created_at`, `updated_at`) VALUES
(1, 1, 'Absolutely love this product! It\'s made a significant difference in my daily routine. The quality is outstanding, and the delivery was surprisingly fast. Highly recommended!', '2024-01-26 16:49:32', '2024-01-26 16:49:32'),
(2, 1, 'I was skeptical at first, but this product exceeded my expectations. It\'s a game-changer! The customer service was also excellent. Will definitely be a repeat customer.', '2024-01-26 16:50:16', '2024-01-26 16:50:16'),
(3, 2, 'This is exactly what I needed! The product arrived in perfect condition, and the user experience has been fantastic. I appreciate the attention to detail and would buy again.', '2024-01-26 16:52:28', '2024-01-26 16:52:28'),
(4, 2, 'I\'ve tried similar products in the past, but this one stands out. The build quality is impressive, and it\'s evident that the company cares about its customers. A+!', '2024-01-26 16:53:31', '2024-01-26 16:53:31'),
(7, 10, 'Good Product!', '2024-01-27 23:33:17', '2024-01-27 23:33:17'),
(6, 8, 'THIS IS A REVIEW FROM LOLERS456', '2024-01-27 21:12:58', '2024-01-27 21:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'password123', '2024-01-26 11:53:37', '2024-01-26 11:53:37'),
(2, 'Robert', 'Joe', 'robert.joe@gmail.com', 'secure456', '2024-01-26 16:39:54', '2024-01-26 16:39:54'),
(3, 'Alice', 'Smith', 'alice.smith@example.com', 'pass321', '2024-01-26 17:50:22', '2024-01-26 17:50:22'),
(4, 'Eva', 'Johnson', 'eva.johnson@example.com', 'secret789', '2024-01-26 18:15:14', '2024-01-26 18:15:14'),
(5, 'Daniel', 'Miller', 'daniel.miller@example.com', 'confidential987', '2024-01-26 18:35:09', '2024-01-26 18:35:09'),
(6, 'dhn', 'mndz', 'codemaster8061@gmail.com', '672b6e7da75e5e7f5a3c2c46392d3eed', '2024-01-27 19:31:01', '2024-01-27 19:31:01'),
(7, 'mnd', 'dhn', 'lolers123@gmail.com', '672b6e7da75e5e7f5a3c2c46392d3eed', '2024-01-27 19:49:03', '2024-01-27 19:49:03'),
(8, 'lolers456', 'mndz', 'lolers456@gmail.com', 'deaa3f202dc8bfc0da38319ef7adec43', '2024-01-27 20:58:07', '2024-01-27 20:58:07'),
(9, 'ivanov', 'mndz', 'ivanov@gmail.com', '672b6e7da75e5e7f5a3c2c46392d3eed', '2024-01-27 23:26:48', '2024-01-27 23:26:48'),
(10, 'John', 'Sheperd', 'testing123@gmail.com', '672b6e7da75e5e7f5a3c2c46392d3eed', '2024-01-27 23:33:03', '2024-01-27 23:33:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
