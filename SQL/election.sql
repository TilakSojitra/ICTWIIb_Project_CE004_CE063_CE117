-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 09:53 AM
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
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`username`, `password`) VALUES
('tilak9723', 'tilak9723'),
('akash2110', 'akash2110'),
('om2443', 'om2443');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_info`
--

CREATE TABLE `candidate_info` (
  `ename` text NOT NULL,
  `cname` text NOT NULL,
  `cage` int(2) NOT NULL,
  `cparty` text NOT NULL,
  `vnum` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_info`
--

INSERT INTO `candidate_info` (`ename`, `cname`, `cage`, `cparty`, `vnum`) VALUES
('ELECTION-2019', 'Candidate-1', 30, 'ABC', 3),
('ELECTION-2019', 'Candidate-2', 40, 'XYZ', 6),
('ELECTION-2019', 'Candidate-3', 35, 'ABC', 2);

-- --------------------------------------------------------

--
-- Table structure for table `election_info`
--

CREATE TABLE `election_info` (
  `eid` int(9) NOT NULL,
  `ename` text NOT NULL,
  `enum` int(5) NOT NULL,
  `epnum` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election_info`
--

INSERT INTO `election_info` (`eid`, `ename`, `enum`, `epnum`) VALUES
(1, 'ELECTION-2019', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `voter_feedback`
--

CREATE TABLE `voter_feedback` (
  `firstname` text NOT NULL,
  `mailid` text NOT NULL,
  `state` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter_feedback`
--

INSERT INTO `voter_feedback` (`firstname`, `mailid`, `state`, `feedback`) VALUES
('tilak', 'pateltilak9723@gmail.com', 'Gujarat', 'Nice!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `election_info`
--
ALTER TABLE `election_info`
  ADD PRIMARY KEY (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election_info`
--
ALTER TABLE `election_info`
  MODIFY `eid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
