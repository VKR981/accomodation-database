-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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

-- --------------------------------------------------------

--
-- Table structure for table `cnames`
--

CREATE TABLE `cnames` (
  `id` int(11) NOT NULL,
  `Cname` varchar(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cnames`
--

INSERT INTO `cnames` (`id`, `Cname`, `seats`) VALUES
(1, 'college1', 99),
(2, 'college2', 96),
(3, 'college3', 100),
(4, 'college4', 98),
(5, 'college5', 93);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `utype` int(11) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 0,
  `fname` varchar(30) DEFAULT 'Full Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `cid`, `utype`, `status`, `fname`) VALUES
(1, 'test1@gmail.com', '12345', 3, 1, 0, 'Full Name'),
(2, 'test2@gmail.com', '12345', 0, 1, 1, 'Full Name'),
(3, 'test3@gmail.com', '12345', 0, 1, 1, 'Full Name 3'),
(4, 'test4@gmail.com', '12345', 3, 1, 0, 'Full Name 4'),
(5, 'test50@gmail.com', '12345', 0, 1, 1, 'Full Name'),
(6, 'manager@gmail.com', '1234', 0, 2, 0, 'Full Name'),
(7, 'test23@gmail.com', '12345', 3, 1, 0, 'Full Name'),
(8, 'test24@gmail.com', '12345', 0, 1, 0, 'Full Name'),
(9, 'test25@gmail.com', '12345', 1, 1, 1, 'Full Name'),
(10, 'test26@gmail.com', '12345', 2, 1, 1, 'Full Name'),
(11, 'test27@gmail.com', '12345', 4, 1, 1, 'Full Name'),
(12, 'test28@gmail.com', '12345', 4, 1, 1, 'Full Name'),
(13, 'test32@gmail.com', '12345', 0, 1, 0, 'Full Name'),
(14, 'test34@gmail.com', '12345', 1, 1, 0, 'Full Name'),
(15, 'test35@gmail.com', '12345', 0, 1, 0, 'Full Name'),
(16, 'test67@gmail.com', '12345', 4, 1, 0, 'Full Name'),
(17, 'test56@gmail.com', '12345', 4, 1, 0, 'Full Name'),
(18, 'admin@gmail.com', '12345', 0, 3, 0, 'Full Name');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnames`
--
ALTER TABLE `cnames`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cnames`
--
ALTER TABLE `cnames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
