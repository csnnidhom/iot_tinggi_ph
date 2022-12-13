-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 03:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwarriornux`
--

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `id` int(6) NOT NULL,
  `data` int(20) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`id`, `data`, `waktu`) VALUES
(1, 94, NULL),
(2, 92, NULL),
(3, 93, NULL),
(4, 94, NULL),
(5, 96, NULL),
(6, 92, NULL),
(7, 96, NULL),
(8, 92, NULL),
(9, 96, NULL),
(10, 92, NULL),
(11, 41, NULL),
(12, 42, NULL),
(13, 54, NULL),
(14, 52, NULL),
(15, 52, NULL),
(16, 85, NULL),
(17, 79, NULL),
(18, 39, NULL),
(19, 38, NULL),
(20, 100, NULL),
(21, -1113, NULL),
(22, 95, NULL),
(23, 97, NULL),
(24, 98, NULL),
(25, 97, NULL),
(26, 98, NULL),
(27, 97, NULL),
(28, 98, NULL),
(29, 97, NULL),
(30, 98, NULL),
(31, 97, NULL),
(32, 98, NULL),
(33, 97, NULL),
(34, 98, NULL),
(35, 95, NULL),
(36, 97, NULL),
(37, 95, NULL),
(38, 98, NULL),
(39, 95, NULL),
(40, 97, NULL),
(41, 95, NULL),
(42, 97, NULL),
(43, 95, NULL),
(44, 97, NULL),
(45, 95, NULL),
(46, 97, NULL),
(47, 95, NULL),
(48, 97, NULL),
(49, 95, NULL),
(50, 97, NULL),
(51, 95, NULL),
(52, 97, NULL),
(53, 95, NULL),
(54, 97, NULL),
(55, 95, NULL),
(56, 97, NULL),
(57, 95, NULL),
(58, 97, NULL),
(59, 95, NULL),
(60, 97, NULL),
(61, 95, NULL),
(62, 97, NULL),
(63, 95, NULL),
(64, 97, NULL),
(65, 95, NULL),
(66, 98, NULL),
(67, -1115, NULL),
(68, 98, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `datasensor2`
--

CREATE TABLE `datasensor2` (
  `id` int(6) NOT NULL,
  `data` int(20) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasensor2`
--

INSERT INTO `datasensor2` (`id`, `data`, `waktu`) VALUES
(1, 7, '2022-12-12 13:16:03'),
(2, 7, '2022-12-12 13:38:25'),
(3, 7, '2022-12-12 13:47:50'),
(4, 7, '2022-12-12 13:51:38'),
(5, 7, '2022-12-12 14:09:49'),
(6, 7, '2022-12-12 14:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `led`
--

CREATE TABLE `led` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `led`
--

INSERT INTO `led` (`id`, `nama`, `nilai`) VALUES
(1, 'LED 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasensor`
--
ALTER TABLE `datasensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasensor2`
--
ALTER TABLE `datasensor2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `led`
--
ALTER TABLE `led`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasensor`
--
ALTER TABLE `datasensor`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `datasensor2`
--
ALTER TABLE `datasensor2`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `led`
--
ALTER TABLE `led`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
