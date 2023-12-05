-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 11:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Id` int(10) NOT NULL,
  `QueId` int(200) NOT NULL,
  `Selectedopt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Id`, `QueId`, `Selectedopt`) VALUES
(1, 1, 1),
(15, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

CREATE TABLE `contestant` (
  `Id` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `QueId` int(100) NOT NULL,
  `Selectedopt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`Id`, `Username`, `QueId`, `Selectedopt`) VALUES
(1, '', 1, 1),
(2, '', 1, 1),
(3, '', 1, 2),
(4, '', 1, 1),
(5, '', 1, 1),
(6, '', 1, 4),
(7, '', 1, 1),
(8, 'admin@gmail.com', 1, 2),
(9, 'admin@gmail.com', 1, 1),
(10, 'admin@gmail.com', 1, 1),
(11, 'admin@gmail.com', 2, 3),
(12, 'admin@gmail.com', 1, 1),
(13, 'admin@gmail.com', 2, 3),
(14, 'admin@gmail.com', 1, 1),
(15, 'admin@gmail.com', 1, 1),
(16, 'admin@gmail.com', 1, 1),
(17, 'admin@gmail.com', 2, 2),
(18, 'admin@gmail.com', 1, 1),
(19, 'admin@gmail.com', 2, 2),
(20, 'admin@gmail.com', 1, 1),
(21, 'admin@gmail.com', 2, 2),
(22, 'admin@gmail.com', 1, 1),
(23, 'admin@gmail.com', 2, 2),
(24, 'admin@gmail.com', 1, 1),
(25, 'admin@gmail.com', 2, 4),
(26, 'admin@gmail.com', 1, 1),
(27, 'admin', 1, 4),
(28, 'admin', 1, 1),
(29, 'admin', 1, 1),
(30, 'admin', 2, 2),
(31, 'admin', 1, 1),
(32, 'admin', 1, 4),
(33, 'admin', 1, 4),
(34, 'admin', 1, 4),
(35, 'admin', 2, 4),
(36, 'admin', 1, 4),
(37, 'admin', 2, 4),
(38, 'admin', 1, 4),
(39, 'admin', 2, 4),
(40, 'admin', 1, 4),
(41, 'admin', 2, 4),
(42, 'admin', 1, 4),
(43, 'admin', 1, 4),
(44, 'admin', 2, 4),
(45, 'admin', 1, 4),
(46, 'admin', 2, 4),
(47, 'admin', 1, 1),
(48, 'admin', 2, 1),
(49, 'admin', 1, 1),
(50, 'admin', 2, 1),
(51, 'admin', 1, 4),
(52, 'admin', 2, 4),
(53, 'admin', 1, 4),
(54, 'admin', 2, 4),
(55, 'admin', 1, 1),
(56, 'admin', 2, 4),
(57, 'admin', 1, 1),
(58, 'admin', 2, 4),
(59, 'admin', 1, 1),
(60, 'admin', 2, 4),
(61, 'admin', 1, 1),
(62, 'admin', 2, 4),
(63, 'admin', 1, 1),
(64, 'admin', 2, 4),
(65, 'admin', 1, 1),
(66, 'admin', 2, 4),
(67, 'admin', 1, 1),
(68, 'admin', 2, 2),
(69, 'admin', 1, 1),
(70, 'admin', 2, 4),
(71, 'admin', 1, 1),
(72, 'admin', 2, 4),
(73, 'admin', 1, 1),
(74, 'admin', 2, 4),
(75, 'abcd', 1, 1),
(76, 'abcd', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `Id` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Points` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`Id`, `Username`, `Points`) VALUES
(1, 'admin', 0),
(2, 'admin', 10),
(3, 'admin', 20),
(4, 'Prashant', 30),
(5, 'xyz', 10),
(6, 'abcd', 20);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Id` int(100) NOT NULL,
  `Query` varchar(500) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Id`, `Query`, `option1`, `option2`, `option3`, `option4`) VALUES
(1, 'Who will hit maximum six', 'abc', 'def', 'ghi', 'jhk'),
(2, 'Who will take maximum wicket', 'abc', 'def', 'ghi', 'jkl');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Username`, `Email`, `Password`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(7, 'abcdef', 'abcdef', 'abc@gmail.com', '$2y$10$2xLpRJd7Xrn1M9DUBVN1ee24uMtbI7e7EJwb91uQfg.'),
(8, 'abcdef', 'abcd', 'abc@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Query` (`Query`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
