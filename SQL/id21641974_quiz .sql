-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2023 at 06:08 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21641974_quiz`
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

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`Id`, `Username`, `QueId`, `Selectedopt`, `flag`, `Date and time`) VALUES
(161, 'crak', 1, 'Better Together', 1, '2023-12-09 06:32:39'),
(162, 'crak', 2, 'D.A.R.K Knight Riders', 1, '2023-12-09 06:32:39'),
(163, 'Ankit', 1, 'Sacheta Royals', 1, '2023-12-09 06:51:55'),
(164, 'Ankit', 2, 'Prerna Parivaar', 1, '2023-12-09 06:51:55'),
(165, 'Ankit', 3, 'Better Together', 1, '2023-12-09 06:51:55'),
(166, 'Ankit', 4, 'Star Eleven', 1, '2023-12-09 06:51:55'),
(167, 'Ankit', 5, 'HD Blasters', 1, '2023-12-09 06:51:55'),
(168, 'Ankit', 6, 'Better Together ', 1, '2023-12-09 06:51:55'),
(169, 'Ankit', 7, 'Swara Strikers', 1, '2023-12-09 06:51:55'),
(170, 'Ankit', 8, 'Sacheta Royals', 1, '2023-12-09 06:51:55'),
(171, 'Ankit', 9, 'S.K. Riders', 1, '2023-12-09 06:51:55'),
(172, 'sky81280', 1, 'S.K.Riders', 1, '2023-12-09 14:53:46'),
(173, 'sky81280', 2, 'Prerna Parivaar', 1, '2023-12-09 14:53:46'),
(174, 'sky81280', 3, 'S.k. Riders', 1, '2023-12-09 14:53:46'),
(175, 'sky81280', 4, 'Prerna Parivaar', 1, '2023-12-09 14:53:46'),
(176, 'sky81280', 5, 'Prerna Parivaar', 1, '2023-12-09 14:53:46'),
(177, 'sky81280', 6, 'Prerna Parivaar', 1, '2023-12-09 14:53:46'),
(178, 'sky81280', 7, 'Prerna Parivaar', 1, '2023-12-09 14:53:46'),
(179, 'sky81280', 8, 'Better Together', 1, '2023-12-09 14:53:46'),
(180, 'sky81280', 9, 'Better Together', 1, '2023-12-09 14:53:46'),
(181, 'kushal45', 1, 'Better Together', 1, '2023-12-09 14:54:19'),
(182, 'kushal45', 2, 'Prerna Parivaar', 1, '2023-12-09 14:54:19'),
(183, 'kushal45', 3, 'Prerna Parivaar', 1, '2023-12-09 14:54:19'),
(184, 'kushal45', 4, 'Better Together', 1, '2023-12-09 14:54:19'),
(185, 'kushal45', 5, 'D.A.R.K Knight Riders', 1, '2023-12-09 14:54:19'),
(186, 'kushal45', 6, 'Better Together ', 1, '2023-12-09 14:54:19'),
(187, 'kushal45', 7, 'Star Eleven', 1, '2023-12-09 14:54:19'),
(188, 'kushal45', 8, 'Better Together', 1, '2023-12-09 14:54:19'),
(189, 'kushal45', 9, 'Swara Strikers', 1, '2023-12-09 14:54:19'),
(190, 'Rishil shah', 1, 'Better Together', 1, '2023-12-09 14:58:53'),
(191, 'Rishil shah', 2, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(192, 'Rishil shah', 3, 'Better Together', 1, '2023-12-09 14:58:53'),
(193, 'Rishil shah', 4, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(194, 'Rishil shah', 5, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(195, 'Rishil shah', 6, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(196, 'Rishil shah', 7, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(197, 'Rishil shah', 8, 'Prerna Parivaar', 1, '2023-12-09 14:58:53'),
(198, 'Rishil shah', 9, 'S.K. Riders', 1, '2023-12-09 14:58:53'),
(199, 'Pankitvakharia', 1, 'Better Together', 1, '2023-12-09 15:04:51'),
(200, 'Pankitvakharia', 2, 'Prerna Parivaar', 1, '2023-12-09 15:04:51'),
(201, 'Pankitvakharia', 3, 'Better Together', 1, '2023-12-09 15:04:51'),
(202, 'Pankitvakharia', 4, 'Prerna Parivaar', 1, '2023-12-09 15:04:51'),
(203, 'Pankitvakharia', 5, 'Better Together', 1, '2023-12-09 15:04:51'),
(204, 'Pankitvakharia', 6, 'Prerna Parivaar', 1, '2023-12-09 15:04:51'),
(205, 'Pankitvakharia', 7, 'Better Together', 1, '2023-12-09 15:04:51'),
(206, 'Pankitvakharia', 8, 'Better Together', 1, '2023-12-09 15:04:51'),
(207, 'Pankitvakharia', 9, 'Better Together', 1, '2023-12-09 15:04:51'),
(208, 'jenil23', 1, 'Better Together', 1, '2023-12-09 15:14:29'),
(209, 'jenil23', 2, 'Prerna Parivaar', 1, '2023-12-09 15:14:29'),
(210, 'jenil23', 3, 'Better Together', 1, '2023-12-09 15:14:29'),
(211, 'jenil23', 4, 'Prerna Parivaar', 1, '2023-12-09 15:14:29'),
(212, 'jenil23', 6, 'Prerna Parivaar', 1, '2023-12-09 15:14:29'),
(213, 'jenil23', 7, 'Prerna Parivaar', 1, '2023-12-09 15:14:29'),
(214, 'jenil23', 8, 'Prerna Parivaar', 1, '2023-12-09 15:14:29'),
(215, 'jenil23', 9, 'Better Together', 1, '2023-12-09 15:14:29'),
(216, 'jenil23', 5, 'Better Together', 1, '2023-12-09 15:14:52'),
(217, 'Priyeshshah2932', 1, 'Better Together', 1, '2023-12-09 15:20:30'),
(218, 'Priyeshshah2932', 2, 'Star Eleven', 1, '2023-12-09 15:20:30'),
(219, 'Priyeshshah2932', 3, 'Star Eleven', 1, '2023-12-09 15:20:30'),
(220, 'Priyeshshah2932', 4, 'Better Together', 1, '2023-12-09 15:20:30'),
(221, 'Priyeshshah2932', 5, 'Better Together', 1, '2023-12-09 15:20:30'),
(222, 'Priyeshshah2932', 6, 'Better Together ', 1, '2023-12-09 15:20:30'),
(223, 'Priyeshshah2932', 7, 'Prerna Parivaar', 1, '2023-12-09 15:20:30'),
(224, 'Priyeshshah2932', 8, 'Prerna Parivaar', 1, '2023-12-09 15:20:30'),
(225, 'Priyeshshah2932', 9, 'Better Together', 1, '2023-12-09 15:20:30'),
(226, 'shubh_shahh', 1, 'HD Blasters', 1, '2023-12-09 15:23:26'),
(227, 'shubh_shahh', 2, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(228, 'shubh_shahh', 3, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(229, 'shubh_shahh', 4, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(230, 'shubh_shahh', 5, 'HD Blasters', 1, '2023-12-09 15:23:26'),
(231, 'shubh_shahh', 6, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(232, 'shubh_shahh', 7, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(233, 'shubh_shahh', 8, 'Prerna Parivaar', 1, '2023-12-09 15:23:26'),
(234, 'shubh_shahh', 9, 'HD Blasters', 1, '2023-12-09 15:23:26'),
(235, 'Bhagya123', 1, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(236, 'Bhagya123', 2, 'Better Together', 1, '2023-12-10 07:03:11'),
(237, 'Bhagya123', 3, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(238, 'Bhagya123', 4, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(239, 'Bhagya123', 5, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(240, 'Bhagya123', 6, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(241, 'Bhagya123', 7, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(242, 'Bhagya123', 8, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(243, 'Bhagya123', 9, 'Prerna Parivaar', 1, '2023-12-10 07:03:11'),
(244, 'Shahsaj27', 1, 'Better Together', 1, '2023-12-10 09:20:14'),
(245, 'Shahsaj27', 2, 'Prerna Parivaar', 1, '2023-12-10 09:20:14'),
(246, 'Shahsaj27', 3, 'Better Together', 1, '2023-12-10 09:20:14'),
(247, 'Shahsaj27', 4, 'Better Together', 1, '2023-12-10 09:20:14'),
(248, 'Shahsaj27', 5, 'Better Together', 1, '2023-12-10 09:20:14'),
(249, 'Shahsaj27', 6, 'Prerna Parivaar', 1, '2023-12-10 09:20:14'),
(250, 'Shahsaj27', 7, 'Better Together', 1, '2023-12-10 09:20:14'),
(251, 'Shahsaj27', 8, 'Prerna Parivaar', 1, '2023-12-10 09:20:14'),
(252, 'Shahsaj27', 9, 'Better Together', 1, '2023-12-10 09:20:14'),
(253, 'Hina.cares', 1, 'S.K.Riders', 1, '2023-12-10 18:50:25'),
(254, 'Hina.cares', 2, 'S.K. Riders', 1, '2023-12-10 18:50:25'),
(255, 'Hina.cares', 3, 'S.k. Riders', 1, '2023-12-10 18:50:25'),
(256, 'Hina.cares', 4, 'S.K. Riders', 1, '2023-12-10 18:50:25'),
(257, 'Hina.cares', 5, 'Gandhi Spartans', 1, '2023-12-10 18:50:25'),
(258, 'Hina.cares', 6, 'S.K. Riders', 1, '2023-12-10 18:50:25'),
(259, 'Hina.cares', 7, 'S.K. Riders', 1, '2023-12-10 18:50:25'),
(260, 'Hina.cares', 8, 'Fiona Royals', 1, '2023-12-10 18:50:25'),
(261, 'Hina.cares', 9, 'Gandhi Spartans', 1, '2023-12-10 18:50:25'),
(262, 'Parva ', 1, 'V Family', 1, '2023-12-12 17:02:59'),
(263, 'Parva ', 2, 'Swara Strikers', 1, '2023-12-12 17:02:59'),
(264, 'Parva ', 3, 'Star Eleven', 1, '2023-12-12 17:02:59'),
(265, 'Parva ', 4, 'Star Eleven', 1, '2023-12-12 17:02:59'),
(266, 'Parva ', 5, 'Star Eleven', 1, '2023-12-12 17:02:59'),
(267, 'Parva ', 6, 'Better Together ', 1, '2023-12-12 17:02:59'),
(268, 'Parva ', 7, 'D.A.R.K Knight Riders', 1, '2023-12-12 17:02:59'),
(269, 'Parva ', 8, 'D.A.R.K Knight Riders', 1, '2023-12-12 17:02:59'),
(270, 'Parva ', 9, 'Star Eleven', 1, '2023-12-12 17:02:59'),
(271, 'Msr0507', 1, 'Better Together', 1, '2023-12-16 09:30:01'),
(272, 'Msr0507', 2, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(273, 'Msr0507', 3, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(274, 'Msr0507', 4, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(275, 'Msr0507', 5, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(276, 'Msr0507', 6, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(277, 'Msr0507', 7, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(278, 'Msr0507', 8, 'Prerna Parivaar', 1, '2023-12-16 09:30:01'),
(279, 'Msr0507', 9, 'Better Together', 1, '2023-12-16 09:30:01');

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
(1, 'Which team will win overarm cricket tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K.Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-17 08:00:00'),
(2, 'Which team will be runner up in overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-17 08:00:00'),
(3, 'Which team will have man of the series?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.k. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-17 08:00:00'),
(4, 'Which team will hit maximum 6s in the overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, '2023-12-17 08:00:00'),
(5, 'Which team will hit maximum 4s in the overarm tournament?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta  Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, '2023-12-17 08:00:00'),
(6, 'Which team will lead on the first day of the overarm cricket tournament?', 'Better Together ', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-17 08:00:00'),
(7, 'Which team player will score first 50?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 1, '2023-12-17 08:00:00'),
(8, 'Which team will have the leading run scorer?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, '2023-12-17 08:00:00'),
(9, 'Which team will have the leading wicket-taker?', 'Better Together', 'D.A.R.K Knight Riders', 'Fiona Royals', 'Gandhi Spartans', 'HD Blasters', 'Prerna Parivaar', 'Sacheta Royals', 'SDC Warriors', 'S.K. Riders', 'Star Eleven', 'Swara Strikers', 'V Family', 0, 0, '2023-12-17 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Security` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Username`, `Password`, `Security`) VALUES
(25, 'crak', 'crak', 'be8d9b3b47bf5097c3dea23bd073d150', 'crak'),
(26, 'Ankit', 'Ankit', '447d2c8dc25efbc493788a322f1a00e7', '5948'),
(27, 'jambu Gandhi ', 'JAMBU ', '3d9d1c31198e02b87fa5070d8c699cdd', 'jambu'),
(28, 'Yatin', 'sky81280', '6d3c08a572d8b01af6b3cbe9dd30e64c', '220411'),
(29, 'Kushal Shah', 'kushal45', 'be374daed81d78f8ff1b1a285a25b5ab', 'sachin@200'),
(30, 'Neel', 'neel2000', 'f4c9768fdc199a5f78707be0403628b2', 'neel@2000'),
(31, 'Rishil shah', 'Rishil shah', 'ecdb0705fcb1a8a4dd19bd48e91c61b9', 'Gotu'),
(32, 'Pankit Vakharia', 'Pankitvakharia', '926c5260dc653415937e03526c4df096', '1234'),
(33, 'Jenil', 'Jenil2304', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(34, 'Jenil', 'jenil23', '368c4c1ec290c534a0c921cc4b2c34f5', 'jenil23'),
(35, 'Priyesh', 'Priyeshshah2932', 'd8b34e0999d863c589832e85a0523a1f', '11223344'),
(36, 'Xyz', 'Abc', '900150983cd24fb0d6963f7d28e17f72', '1245'),
(37, 'Shubh', 'shubh_shahh', '70e62527325fe41ad71b981aca00c31e', 'luffy'),
(38, 'Harshit', 'harshit', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(39, 'Anand Shah', 'Ajshah100', '5f4dcc3b5aa765d61d8327deb882cf99', '1002'),
(40, 'Mogu', 'Mogu', 'a50c4c65dbf8ab9baf1e307c20e013cd', 'Mogu'),
(41, 'Ketan fadia ', 'Ketan fadia ', '2543ba5d2f955621e65408e5d5dbbe64', '1971'),
(42, 'PIYUSH I GANDHI ', 'PIYUSH GANDHI', 'caeb7bf55c1bb2482a207f919158ee26', 'PG'),
(43, 'Nisha ', 'Nisha shah', '4db860e489c3c922f72b9f26d909af6e', '9999'),
(44, 'Bhagya Shah', 'Bhagya123', 'd22c37d848ee149a65f7ba0c5c0fc228', '1234'),
(45, 'Saj Shah', 'Shahsaj27', 'a7ab993257b0c0763aa4a2dc85110e44', '270899'),
(46, 'Hina', 'Hina.cares', '781e1b3721598807b2d03f93cc580161', 'santu'),
(47, 'Rehang', 'rfadia', 'e10adc3949ba59abbe56e057f20f883e', '123456'),
(48, 'rehang', 'rehangfadia', 'e10adc3949ba59abbe56e057f20f883e', '123456'),
(49, 'Parva ', 'Parva ', 'cf3f69a9ed2426e6867edf69dd72c909', 'parva '),
(50, 'Mihir shah ', 'Msr0507', '98aae9b380a8b4c0ba70507458757956', '0507');

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
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

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
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
