-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2024 at 01:36 AM
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
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `first_option` varchar(255) NOT NULL,
  `second_option` varchar(255) NOT NULL,
  `third_option` varchar(255) NOT NULL,
  `fourth_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `first_option`, `second_option`, `third_option`, `fourth_option`) VALUES
(1, 'Richest Man?', 'Messi', 'Ronaldo', 'Mbappe', 'Tevez'),
(2, 'Richest Man?', 'Messi', 'Ronaldo', 'Mbappe', 'Tevez'),
(3, 'messi?', 'a', 'b', 'c', 'd'),
(4, 'Who is the best player in the pwrld', 'Messi', 'Ronaldo', 'Mbappe', 'Kudus');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `standard` enum('group','single voter','poll creator') NOT NULL,
  `status` int(11) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `mobile`, `password`, `photo`, `standard`, `status`, `votes`) VALUES
(33, 'Yaa', '0205672344', '$2y$10$YMZZjh4mtN5TEfWFlY2yq.KzVoFzMifaziQPVhukMGd4ccw.OFKna', '', 'single voter', 1, 0),
(34, 'Spartans', '0575102032', '$2y$10$FDNJ1WjuO1b6f.VmPEc59.Tk5NudLhnCKBVr80VnGgqNHL.rbxCXW', '', 'group', 0, 1),
(35, 'Avengers', '0247815825', '$2y$10$ILBoS1YwFglEd.qZ05FZFueItiL0SNNzJS/IbGbxYfobN67ozF/CK', '', 'group', 0, 0),
(36, 'Acers', '0235678153', '$2y$10$UOfSk.hnDLmQgdspySDEM.vsrUoGDJKLMQgrIdh4jBRV7eqtCPksq', '', 'group', 0, 0),
(37, 'Bismark', '0205467811', '$2y$10$7yhIA9kWMwvOvPfhXNa.xebC25Aa.kNq7sVPWQIp8871gunH.QMM6', '', 'poll creator', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
