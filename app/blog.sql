-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 12:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `title` varchar(125) NOT NULL,
  `content` longtext NOT NULL,
  `imgpath` varchar(125) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `imgpath`, `user_id`, `created`, `modified`) VALUES
(1, 'Blue Suit Style Guide: Mastering the Look for Any Occasion', 'The blue suit, a timeless classic, is a must-have in every woman’s wardrobe. It exudes sophistication and elegance, perfect for both formal and casual occasions. But how can you elevate your blue suit game? Fear not! In this article, we’ll explore 10 chic combinations that will take your blue suit from ordinary to extraordinary. Whether you’re in the US or UK, these looks are perfect for young women aged 18 to 40.\r\n\r\n10 Blue Suit Ideas\r\n1. Blue Satin Pant with Blue Faux Leather Suit\r\nPairing a blue satin pant with a blue faux leather suit creates a modern and edgy look. The satin pant adds a touch of luxury, while the faux leather suit brings an element of coolness. This combination is perfect for a night out or a stylish event.\r\n\r\n2. Women Stylish White High-Heels with Blue Solid Single-Breasted Casual Blazer', 'img/uploads/Blue-Suit-Style-Guide-Mastering-the-Look-for-Any-Occasion.jpg', 1, '2024-03-18 11:47:23', '2024-03-18 11:47:23'),
(2, 'How to Get Rid of Oily Skin on Face at Home', 'Oily skin is a very common beauty woe. Those who have oily skin their face appear shiny and the pores look really large.In summers, those with oily skin suffer the most as the sebaceous glands produces excess sebum. It makes the face look dull and tired. This oil and grime on the skin invites bacteria which in turn lead to whiteheads, blackheads, acne and other skin irritations.\r\n\r\nGenetics, stress, hormonal changes in the bodyand diet often influences the production of this excess oil from the sebaceous glands. Teenagers have oily skin when their bodies are undergoing hormonal changes. Women are more prone to oily skin during menstrual cycles, pregnancy, menopause and when they are having birth control pills.\r\n\r\n', 'img/uploads/how-to-get-rid-of-oily-skin-on-face.jpg', 1, '2024-03-18 11:53:15', '2024-03-18 11:53:15'),
(3, 'Coke Zero vs Diet Coke – What’s The Difference?', 'The recent fad of Coke Zero and Diet Coke has created a fuss in the market. People who are health conscious often look for options that can keep their diet healthy. In the quest, switching from regular Coke to diet or zero Coke has been observed. \r\n\r\nBut what’s better, and what’s the difference between Coke Zero and Diet Coke?\r\n\r\n', 'img/uploads/Coke-Zero-Vs-Diet-Coke-.jpg', 1, '2024-03-18 11:56:54', '2024-03-18 11:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Manikanta', 'reachmanikantark@gmail.com', '$2y$10$PFbAOkS69Lx7PCUGleyb3.m.SZwu9C3RQ8pzRT0H0SSRWZOmiWRW6', '2024-03-18 11:45:38', '2024-03-18 11:45:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
