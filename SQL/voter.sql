-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 09:54 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Party` varchar(20) NOT NULL,
  `Votes` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`ID`, `Name`, `Party`, `Votes`) VALUES
(1, 'Candidate-1', 'ABC', 3),
(2, 'Candidate-2', 'XYZ', 6),
(3, 'Candidate-3', 'ABC', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Serial Number` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Age` int(11) NOT NULL,
  `Password` varchar(36) NOT NULL,
  `email` varchar(60) NOT NULL,
  `uid` bigint(12) NOT NULL,
  `mobile_num` bigint(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Serial Number`, `Name`, `Age`, `Password`, `email`, `uid`, `mobile_num`, `Gender`, `time`, `Status`) VALUES
(1, 'Tilak', 18, 'tilaktilak', 'pateltilak2468@gmail.com', 97239723, 7990707743, 'Male', '2021-07-05 16:56:52', 1),
(2, 'Akash', 19, 'akash2110', 'akashpambhar2110@gmail.com', 21102110, 9999999999, 'Male', '2021-07-05 16:58:18', 1),
(3, 'user1', 30, 'user1', 'user1@gmail.com', 1111, 9999999999, 'Female', '2021-07-05 16:58:36', 1),
(4, 'user2', 40, 'user2', 'user2@gmail.com', 2222, 9999999999, 'Female', '2021-07-05 16:59:34', 1),
(5, 'user3', 46, 'user3', 'user3@gmail.com', 3333, 9999999999, 'Male', '2021-07-05 16:59:34', 1),
(6, 'user4', 36, 'user4', 'user4@gmail.com', 4444, 9999999999, 'Other', '2021-07-05 17:00:48', 1),
(7, 'user5', 31, 'user5', 'user5@gmail.com', 5555, 9999999999, 'Male', '2021-07-05 17:01:20', 1),
(8, 'user6', 33, 'user6', 'user6@gmail.com', 6666, 9999999999, 'Female', '2021-07-02 17:01:58', 1),
(9, 'user7', 49, 'user7', 'user7@gmail.com', 7777, 9999999999, 'Male', '2021-07-02 17:02:35', 1),
(12, 'Om', 18, 'omnai', 'omnai@gmail.com', 12345678, 9999999999, 'Male', '2021-07-05 18:01:36', 1),
(14, 'test', 33, 'test', 'test@gmail.com', 56785678, 8888888888, 'Male', '2021-07-04 18:23:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Serial Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Serial Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
