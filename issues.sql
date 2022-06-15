-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2022 at 05:27 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issues`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int NOT NULL,
  `issue_msg` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `report_date` int NOT NULL,
  `status` int NOT NULL
);

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue_msg`, `location`, `user_id`, `report_date`, `status`) VALUES
(6, 'Sample issue', 'Millenium', 4, 1655263482, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` int NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0'
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `reg_date`, `is_admin`) VALUES
(3, 'Admin', 'admin', '$2y$10$Mjk6Ad7XJDgwrmINg8OJv.bk8McD8K6Fy2r1c1qtv7h8vbN.qIDba', 1655254937, 1),
(4, 'John Doe', 'johndoe', '$2y$10$NGlwGCL598UiLaEVftlzuub8yy4iRG7wIUSc6mqmTOflrtMjlwCay', 1655263461, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;