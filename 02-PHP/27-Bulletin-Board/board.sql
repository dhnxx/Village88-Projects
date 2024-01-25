-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2024 at 01:24 PM
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
-- Database: `bulletin_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subjects` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `subjects`, `details`, `created_at`) VALUES
(1, 'Quantum Computing Advancements', 'Quantum computing is on the brink of revolutionizing the landscape of artificial intelligence and machine learning. Recent breakthroughs in qubit stability and error correction algorithms promise unprecedented computational power. As quantum supremacy loo', '2024-01-25 20:25:32'),
(2, 'Explainable AI in Healthcare', 'The intersection of artificial intelligence and healthcare demands a paradigm shift toward explainable AI (XAI). In medical contexts, where transparency is crucial, researchers are developing interpretable models. These models not only provide accurate pr', '2024-01-25 20:32:04'),
(3, 'Natural Language Processing Evolution', 'Natural Language Processing (NLP) is undergoing a transformative phase with the integration of advanced machine learning techniques. From BERT to GPT-4, these models are not only enhancing language understanding but also adapting to context and nuance. As', '2024-01-25 20:32:27'),
(4, 'Edge Computing and the Future of IoT', 'The proliferation of Internet of Things (IoT) devices is steering computing towards the edge. Edge computing, with its decentralized approach, not only alleviates bandwidth constraints but also ensures low-latency processing. This shift empowers AI and ma', '2024-01-25 20:32:43'),
(5, 'Reinforcement Learning in Robotics', 'Reinforcement learning (RL) is reshaping the field of robotics, enabling machines to learn and adapt through trial and error. From robotic manipulation to autonomous navigation, RL algorithms are pushing the boundaries of what robots can achieve. The syne', '2024-01-25 20:33:01'),
(6, 'Weekly Progress Check-In', 'Time for our weekly check-in tomorrow at 10:00 AM. Share updates on your ongoing tasks, highlight achievements, and let us know if you\'re facing any roadblocks. This quick sync is crucial for staying aligned and ensuring a smooth workflow.', '2024-01-25 20:52:03'),
(7, 'Team Building Activity', 'Get ready for some team building fun! Our activity is set for Wednesday at 3:00 PM. Whether it\'s a virtual game or a collaborative challenge, this is a great opportunity to bond with the team. Bring your positive energy and let\'s create some memorable mom', '2024-01-25 21:02:09'),
(8, 'Monthly Town Hall Meeting', 'The monthly town hall meeting is happening next Monday at 11:00 AM. Join in to hear company updates, share your thoughts during the Q&A session, and connect with colleagues. Your presence adds to the vibrant discussion.', '2024-01-25 21:03:49'),
(9, 'Project Kickoff Meeting', 'Exciting times ahead! We have a project kickoff meeting on Monday at 9:00 AM. Join in as we discuss project goals, timelines, and individual responsibilities. Your input is essential for a successful start. Looking forward to a collaborative effort!', '2024-01-25 21:14:32'),
(10, ' Coffee Break Networking', 'Take a break and join us for a virtual coffee break networking session on Friday at 2:00 PM. It\'s an informal opportunity to connect with colleagues, share experiences, and build a stronger sense of camaraderie. Grab your favorite beverage and join the co', '2024-01-25 21:19:11'),
(13, 'Monthly Innovation Forum', 'Join the monthly innovation forum next Wednesday at 11:30 AM.', '2024-01-25 21:23:02'),
(14, 'Coffee Break Networking', 'Take a break and join us for a virtual coffee break networking session on Friday at 2:00 PM.', '2024-01-25 21:23:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
