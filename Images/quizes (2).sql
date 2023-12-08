-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 12:52 PM
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
  `QueId` int(10) NOT NULL,
  `Selectedopt` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

CREATE TABLE `contestant` (
  `Id` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `QueId` int(100) NOT NULL,
  `Selectedopt` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL,
  `Date and time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `Id` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Points` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `option4` varchar(100) NOT NULL,
  `option5` varchar(100) NOT NULL,
  `option6` varchar(100) NOT NULL,
  `option7` varchar(100) NOT NULL,
  `option8` varchar(100) NOT NULL,
  `option9` varchar(100) NOT NULL,
  `option10` varchar(100) NOT NULL,
  `option11` varchar(100) NOT NULL,
  `option12` varchar(100) NOT NULL,
  `flag` int(5) NOT NULL,
  `Active` tinyint(5) NOT NULL,
  `EndTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Id`, `Query`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `option11`, `option12`, `flag`, `Active`, `EndTime`) VALUES
(1, 'Which team will win overarm cricket tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K.Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-08 17:19:00'),
(2, 'Which team will be runner up in overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '0000-00-00 00:00:00'),
(3, 'Which team will have man of the series?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.k. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, NULL),
(4, 'Which team will hit maximum 6\'s in the overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, NULL),
(5, 'Which team will hit maximum 4\'s in the overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta  Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, NULL),
(6, 'Which team will lead on the first day of the overarm cricket tournament?', 'abc', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-08 16:13:11'),
(7, 'Which team\'s player will score first 50?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '0000-00-00 00:00:00'),
(8, 'Which team will have the leading run scorer?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, NULL),
(9, 'Which team will have the leading wicket-taker?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
