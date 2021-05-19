-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 12:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL,
  `option1` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`, `option1`) VALUES
('60a38fd439060', '60a38fd4ead88', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('55846be776610', 'testing', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
('5589858b6c43b', 'nik', 'nik1@gmail.com', 'good', 'good site', '2015-06-23', '06:12:59pm'),
('6089a211cd38d', 'Chamantha Lahiru', 'a.k.chamantha@gmail.com', 'medicle quize', 'ftstttttttttttsyuii', '2021-04-28', '07:57:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('60a38fd439060', '', '60a38fd4ead88'),
('60a38fd439060', '', '60a38fd4ead97'),
('60a38fd439060', '', '60a38fd4ead99'),
('60a38fd439060', '', '60a38fd4ead9b'),
('60a38fd439060', '', '60a38fd4ead9c');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL,
  `Qst` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`, `Qst`) VALUES
('60a38cd942000', '60a38fd439060', '', 5, 1, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`, `status`) VALUES
('60a38cd942000', 'Asda', 1, 0, 1, 0, '', '', '2021-05-18 09:46:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('user@user.com', -1, '2021-05-12 08:13:14'),
('test@test.com', 1, '2021-05-04 06:49:05'),
('ex@ex.com', 1, '2021-05-06 05:50:17'),
('gihan@gmail.com', 2, '2021-05-06 09:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eid` text CHARACTER SET utf8 NOT NULL,
  `qid` text CHARACTER SET utf8 NOT NULL,
  `qns` text CHARACTER SET utf8 NOT NULL,
  `optionid` text CHARACTER SET utf8 NOT NULL,
  `option_name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`email`, `eid`, `qid`, `qns`, `optionid`, `option_name`) VALUES
('user@user.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda79705a', ''),
('user@user.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff4', ''),
('test@test.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda797060', ''),
('test@test.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff4', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda797060', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff5', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda797062', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff6', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda79705a', ''),
('ex@ex.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff3', ''),
('gihan@gmail.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda79705a', ''),
('gihan@gmail.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff4', ''),
('admin@admin.com', '6090ed79c51f7', '6090eda7462ee', 'what is 01?', '6090eda79705a', ''),
('admin@admin.com', '6090ed79c51f7', '6090eda7e12ef', 'what is C?', '6090eda81eff4', ''),
('user@user.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '6094ffbbaf37c', ''),
('user@user.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '', ''),
('user@user.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '6094ffbbaf37f', ''),
('user@user.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '6094ffbbaf37c', ''),
('user@user.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '6094ffbbaf381', ''),
('admin@admin.com', '6098bf9d2fc1b', '6098c2be13ec3', 'sample 1?', '6098c2be9538c', ''),
('admin@admin.com', '6098bf9d2fc1b', '6098c2bf2e01a', 'kbkbvk?', '6098c2bf36a0d', ''),
('admin@admin.com', '6098bf9d2fc1b', '6098c2be13ec3', 'sample 1?', '6098c2be9539e', ''),
('admin@admin.com', '6098bf9d2fc1b', '6098c2bf2e01a', 'kbkbvk?', '6098c2bf36a0f', ''),
('admin@admin.com', '6098c3fb17b7d', '6098c4418279c', 'sfsfsfw?', '6098c441d0597', ''),
('admin@admin.com', '6098c3fb17b7d', '6098c44245aa0', 'eeeeeeeeeeeeeeee?', '6098c44250020', ''),
('admin@admin.com', '6098c3fb17b7d', '6098c4427fd9f', 'hjgghvasvdj?', '6098c44293779', ''),
('user@user.com', '6098c3fb17b7d', '6098c4418279c', 'sfsfsfw?', '6098c441d059a', ''),
('user@user.com', '6098c3fb17b7d', '6098c44245aa0', 'eeeeeeeeeeeeeeee?', '6098c44250020', ''),
('user@user.com', '6098c3fb17b7d', '6098c4427fd9f', 'hjgghvasvdj?', '6098c4429377b', ''),
('user@user.com', '6098ca112d0a8', '6098ca4d3bb2e', 'mkndnh?', '6098ca4d9d278', ''),
('user@user.com', '6098ca112d0a8', '6098ca4e01847', 'fgfgfg', '6098ca4e149d9', ''),
('user@user.com', '6098ca112d0a8', '6098ca4e5885b', 'lkllm?', '6098ca4e60b75', ''),
('user@user.com', '6098cdd9f31bd', '6098d20891fe5', 'eeeeee?', '6098d2093aa03', ''),
('user@user.com', '6098cdd9f31bd', '6098d209c0332', 'ssssssssssss?', '6098d209de76c', ''),
('user@user.com', '6098cdd9f31bd', '6098d209c0332', 'ssssssssssss?', '6098d209de76c', ''),
('user@user.com', '6098cdd9f31bd', '6098d20a3c312', 'dffffffffffffffffffffffffff', '6098d20a45d70', ''),
('user@user.com', '6098cdd9f31bd', '6098d20891fe5', 'eeeeee?', '6098d2093aa03', ''),
('user@user.com', '6098cdd9f31bd', '6098d209c0332', 'ssssssssssss?', '6098d209de76b', ''),
('user@user.com', '6098cdd9f31bd', '6098d20a3c312', 'dffffffffffffffffffffffffff', '6098d20a45d6b', ''),
('user@user.com', '6098cdd9f31bd', '6098d20a3c312', 'dffffffffffffffffffffffffff', '6098d20a45d6b', ''),
('user@user.com', '6098cdd9f31bd', '6098d20aadfd7', 'kljlmlj?', '6098d20ac00d1', ''),
('user@user.com', '6098cdd9f31bd', '6098d20aadfd7', 'kljlmlj?', '6098d20ac00d1', ''),
('user@user.com', '6098cdd9f31bd', '6098d20b4fefd', 'dfhhdhhhhhhhhh?', '6098d20b5a68c', ''),
('admin@admin.com', '6098ca112d0a8', '6098ca4d3bb2e', 'mkndnh?', '6098ca4d9d278', ''),
('admin@admin.com', '6098ca112d0a8', '6098ca4e01847', 'fgfgfg', '6098ca4e149d1', ''),
('admin@admin.com', '6098ca112d0a8', '6098ca4e5885b', 'lkllm?', '6098ca4e60b6d', ''),
('admin@admin.com', '6094ffa1a2e39', '6094ffba70c90', 'what123?', '6094ffbbaf37f', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `member` varchar(5) NOT NULL,
  `Institute` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `member`, `Institute`, `email`, `password`) VALUES
('Avantika', 'F', 'KNIT sultanpur', 'avantika420@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Mark Zukarburg', 'M', 'Stanford', 'ceo@facebook.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Ex', 'F', 'ex', 'ex@ex.com', 'eae8d55040e0b0695494dff74e72cf3e'),
('Gihan', 'M', 'technova', 'gihan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Komal', 'F', 'KNIT sultanpur', 'komalpd2011@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Tom Cruze', 'M', 'Hollywood', 'mi5@hollywood.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Netcamp', 'M', 'KNIT sultanpur', 'netcamp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Nikunj', 'M', 'XYZ', 'nik1@gmail.com', '202cb962ac59075b964b07152d234b70'),
('Test Wx', 'Consu', 'csc', 's@s.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Sunny', 'M', 'KNIT sultanpur', 'sunnygkp10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Test-user', 'M', 'aa', 'test@test.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('User', 'M', 'cimt', 'user@user.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Vikash', 'M', 'KNIT sultanpur@gmail.com', 'vikash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
