-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 11:43 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudpanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(250) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `position`, `parent`, `created_at`) VALUES
(1, 'CEO Name', 'CEO', 0, '2018-03-21 16:38:07'),
(2, 'Manager First', 'QA Manager', 1, '2018-03-21 16:38:07'),
(4, 'Manager Second', 'Development\n Manager', 1, '2018-03-21 16:38:07'),
(6, 'Team Lead 1', 'Second Level', 2, '2018-03-22 07:45:27'),
(7, 'Manager Third', 'Project Manager', 1, '2018-03-21 16:38:07'),
(8, 'Manager Fourth', 'Content Manager', 1, '2018-03-21 16:38:07'),
(9, 'Team Lead 2', 'Second Level', 2, '2018-03-22 07:45:27'),
(10, 'Team Lead 3', 'Team Lead', 4, '2018-03-22 12:48:12'),
(11, 'Team Lead 4', 'Team Lead', 4, '2018-03-22 12:48:35'),
(12, 'Developer 1', 'Software Developer', 6, '2018-03-22 12:49:00'),
(13, 'Developer 2', 'Developer', 6, '2018-03-22 12:50:23'),
(14, 'Developer 3', 'Developer', 11, '2018-03-22 12:51:09'),
(15, 'Developer 4', 'Developer', 11, '2018-03-22 12:51:25'),
(16, 'Developer 5', 'Developer', 9, '2018-03-22 12:51:44'),
(17, 'Developer 6', 'Developer', 10, '2018-03-22 12:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
