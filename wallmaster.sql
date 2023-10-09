-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 09:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) DEFAULT NULL,
  `job_prefix` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `contract` float DEFAULT NULL,
  `job_group` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `meters` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `permit` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`, `job_prefix`, `status`, `job_type`, `contract`, `job_group`, `manager`, `address`, `meters`, `city`, `permit`, `postcode`, `lot`, `owner`, `phone`, `email`, `access`) VALUES
(10, 'pasang paip', 'paip', 'Open', 'wasd', 1.13, 'wasd', 'wasd', 'wasd', 'wasd', 'wasd', 'wasd', NULL, NULL, 'dato k', '0123659744', 'datok@gmail.com', '6|8|'),
(11, 'buat cabinet dapur', '', 'Open', 'workmanship', 1000, 'test', 'test', 'test', 'test', 'test', 'test', 0, 'test', 'aisyah fatihah', '0122343007', 'aisyah@gmail.com', '6|');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `role`, `email`, `status`, `phone`) VALUES
(6, 'admin', 'Abdul hadi', '1234', 1, 'admin@yahoo.com', 'A', '0123658974'),
(8, 'aidil', 'aidil ammar', '1234', 1, 'aidil@yahoo.com', 'A', '0123658974');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
