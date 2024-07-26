-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 07:38 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aighospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `career_form`
--

CREATE TABLE `career_form` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `career_form`
--

INSERT INTO `career_form` (`id`, `name`, `email`, `mobile`, `qualification`, `experience`, `location`, `cv`, `type`, `created_at`) VALUES
(1, 'Nidhi', 'nidhi.kushwaha24@gmail.com', '09179763466', 'mca', '5', 'gwalior', 'uploads/career/16856037196478458716a5a.jpg', NULL, '2023-06-01 07:15:19'),
(2, 'Nitin', 'nitin.ns.1992@gmail.com', '09009444633', 'MBBS', '4 years', 'Delhi', 'uploads/career/167394911063c66fb6b7888.pdf', 'normal', '2023-01-17 02:51:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career_form`
--
ALTER TABLE `career_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career_form`
--
ALTER TABLE `career_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
