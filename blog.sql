-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2025 at 03:44 PM
-- Server version: 8.0.35-0ubuntu0.23.04.1
-- PHP Version: 8.1.12-1ubuntu4.3

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idn` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idn`, `title`, `content`, `author`, `date`, `image`, `user_id`) VALUES
(1, 'Massire Sogore', 'Developpeur Full Stack', 'massire', '2025-02-11', 'Developpeur-fullstack.png', 4),
(2, 'Alpha', 'Etudiant talentueux', 'massire', '2025-01-18', 'alpha.png', 4),
(3, 'Corentin', 'Etudiant talentueux', 'massire', '2025-01-18', 'correntin.png', 4),
(4, 'Guiyaume', 'Designer', 'massire', '2025-01-18', 'guiyaume.png', 4),
(5, 'Aimé', 'Developpeur frontend', 'massire', '2025-01-18', 'aime.png', 4),
(6, 'Aimeryc', 'SEO', 'massire', '2025-01-18', 'aymeric.png', 4),
(7, 'Samoud', 'Developpeur mobile', 'massire', '2025-01-18', 'samoud.png', 4),
(8, 'Soufiane', 'Directeur de fesses', 'massire', '2025-01-18', 'soufiane.png', 4),
(9, 'nasser al khelaifi', 'Boss', 'massire', '2025-01-18', 'naser-elkelaifi.png', 4),
(10, 'Jovany', 'Réamisateur film ,Monteur vidéo', 'massire', '2025-01-18', 'jovany.png', 4),
(11, 'Sebastien Link', 'Notre prof', 'massire', '2025-01-18', 'prof.png', 4),
(13, 'Image douce ah bon ?', 'kekekeke', 'massire', '2025-02-01', 'janis-dzenis-hLKNk9w1XzA-unsplash.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idn` int NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idn`, `lastname`, `firstname`, `email`, `pwd`) VALUES
(4, 'sogore', 'Massire', 'massire@gmail.com', '$2y$12$LSgvL9/6RrYtLXMSXwYT9.QBkyCtI7jOKkvg8oQ9YuVG68qqTboXm'),
(10, 'alo', 'alo', 'alo@gmail.com', '$2y$12$mgbo67wVm8n.CDONaZDCmegoGhM.RYdFPZcbimdneU7exTvWbCT.y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idn`),
  ADD KEY `user_id_fkey` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`idn`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
