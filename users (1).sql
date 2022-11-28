-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

DELIMITER $$
--
-- Procedures
--
-- CREATE DEFINER=`root`@`localhost` PROCEDURE `getbatch` (IN `id` INT)   SELECT * FROM Trainee WHERE Batch_id=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled details`
--

CREATE TABLE `enrolled details` (
  `id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `plan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled details`
--

INSERT INTO `enrolled details` (`id`, `name`, `email`, `phone`, `plan`) VALUES
('gym1', 'manav verma', 'manny@gmail.com', 3425523523, 'basic'),
('GymManager', 'Mayank Sharma', 'admin@gym', 8750355389, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin@gym', '$2y$10$iHXPHqdVTtWXF8o.jFoye.C7wU6JjDjVXm76OWWlcrkZlYAn5UmBe'),
('manny@gmail.com', '$2y$10$H7empsIuxcnPHnklXfkRlOXfOSr9Ar6K/cHyB5tlX6knNs/KEhb02');

-- --------------------------------------------------------

--
-- Table structure for table `manny@gmail.com`
--

CREATE TABLE `manny@gmail.com` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manny@gmail.com`
--

INSERT INTO `manny@gmail.com` (`id`, `date`, `checkin`, `checkout`) VALUES
(11, '2022-11-12', '04:23:00', '05:24:00'),
(16, '2022-11-13', '14:50:00', '15:52:00'),
(17, '2022-11-19', '14:54:00', '16:56:00'),
(18, '2022-11-20', '18:06:00', '18:06:00'),
(19, '2022-11-22', '09:16:00', '10:16:00'),
(20, '2022-11-23', '08:28:00', '10:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `user details`
--

CREATE TABLE `user details` (
  `S No.` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user details`
--

INSERT INTO `user details` (`S No.`, `date`, `fullname`, `email`, `phone`, `plan`, `message`) VALUES
(134, '2022-11-22', 'Manav verma', 'manavv357@gmail.com', 0, 'premium', 'I want to join');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrolled details`
--
ALTER TABLE `enrolled details`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `manny@gmail.com`
--
ALTER TABLE `manny@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user details`
--
ALTER TABLE `user details`
  ADD PRIMARY KEY (`S No.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manny@gmail.com`
--
ALTER TABLE `manny@gmail.com`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user details`
--
ALTER TABLE `user details`
  MODIFY `S No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
