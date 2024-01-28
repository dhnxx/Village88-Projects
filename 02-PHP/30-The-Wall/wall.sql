-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2024 at 07:58 AM
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
-- Database: `wall`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post`, `created_at`, `updated_at`) VALUES
(1, 1, 'GPIOSDJFGOKJDNGONDFGNDFKOGNDFOKGNDFOK GNDFOKGN DOFPKGN THIS IS A  POST FROM USER 1', '2024-01-28 06:26:43', '2024-01-28 06:26:43'),
(2, 2, 'TIHS IS THE SECOND PST FRO MUSER 2TIHS IS THE SECOND PST FRO MUSER 2TIHS IS THE SECOND PST FRO MUSER 2TIHS IS THE SECOND PST FRO MUSER 2TIHS IS THE SECOND PST FRO MUSER 2TIHS IS THE SECOND PST FRO MUSER 2', '2024-01-28 06:27:10', '2024-01-28 06:27:10'),
(3, 3, 'THIS IS A POST FROM USER 3', '2024-01-28 14:29:41', '2024-01-28 14:29:41'),
(4, 5, 'FSDFSDFS DFSD THIS IS A DYNAMIC POST', '2024-01-28 14:33:34', '2024-01-28 14:33:34'),
(5, 5, 'THIS IS ANOTHE RPOST TEST ', '2024-01-28 14:55:25', '2024-01-28 14:55:25'),
(6, 5, 'test', '2024-01-28 15:27:50', '2024-01-28 15:27:50'),
(7, 5, 'OMEGALUL', '2024-01-28 15:28:05', '2024-01-28 15:28:05'),
(8, 5, 'HMMMM', '2024-01-28 15:34:37', '2024-01-28 15:34:37'),
(9, 5, 'TESTING MEGALULS', '2024-01-28 15:45:43', '2024-01-28 15:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `review_id` int NOT NULL,
  `reply` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `user_id`, `review_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'dfgdfg', '2024-01-28 15:36:00', '2024-01-28 15:36:00'),
(2, 5, 0, 'WAT', '2024-01-28 15:36:06', '2024-01-28 15:36:06'),
(3, 5, 8, 'YO', '2024-01-28 15:37:15', '2024-01-28 15:37:15'),
(4, 5, 8, 'TESTING WORKING', '2024-01-28 15:37:22', '2024-01-28 15:37:22'),
(5, 6, 9, 'COMMETNING IM DHJN', '2024-01-28 15:52:27', '2024-01-28 15:52:27'),
(6, 6, 9, 'COMMETNING IM DHJN', '2024-01-28 15:55:14', '2024-01-28 15:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test123@gmail.com', 'test123', 'mndzz', '', '2024-01-28 10:31:36', '2024-01-28 10:31:36'),
(2, 'fsdfsdf', 'sdfsdf', 'sdfsdf', 'fsdfsdfs', '2024-01-28 10:55:29', '2024-01-28 10:55:29'),
(3, 'fsdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', '2024-01-28 10:55:33', '2024-01-28 10:55:33'),
(4, 'sdgsdg', 'sdgsdg', 'sdgsdge', 'sdgsdgsdg', '2024-01-28 10:56:05', '2024-01-28 10:56:05'),
(5, '13q34324', 'sdfsdf', 'sdfsdf', 'fsdgdfg', '2024-01-28 10:56:16', '2024-01-28 10:56:16'),
(6, 'dhn@gmail.com', 'dhn', 'mndz', 'lolers123', '2024-01-28 15:50:44', '2024-01-28 15:50:44'),
(7, 'dhn@gmail.com', 'dhn', 'mndz', 'lolers123', '2024-01-28 15:51:20', '2024-01-28 15:51:20'),
(8, 'dhn@gmail.com', 'dhn', 'mndz', 'lolers123', '2024-01-28 15:51:23', '2024-01-28 15:51:23'),
(9, 'dhn@gmail.com', 'dhn', 'mndz', 'lolers123', '2024-01-28 15:51:25', '2024-01-28 15:51:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
