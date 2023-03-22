-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 08:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edulinkup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `email`, `password`, `reg_date`) VALUES
(1, 'Kasun', 'Jayasinghe', 'kass', 'kasunharitha55@gmail.com', '124', '2023-03-13 19:23:01'),
(17, 'Kamal', 'Perera', 'kamal', 'kamal@gmail.com', '123', '2023-03-18 19:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gid` int(11) NOT NULL,
  `grade` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gid`, `grade`) VALUES
(1, 'Grade 6'),
(2, 'Grade 7'),
(3, 'Grade 8'),
(4, 'Grade 9');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `grade` varchar(8) NOT NULL,
  `marks` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`sid`, `fname`, `lname`, `email`, `grade`, `marks`) VALUES
(14, 'Pubudu', 'Dulanjaya', 'pubudu@gmail.com', 'Grade 6', NULL),
(15, 'Sachith', 'Navodya', 'sachith@gmail.com', 'Grade 7', '96'),
(16, 'Mirosh', 'Kavinda', 'mirosh@gmail.com', 'Grade 8', NULL),
(17, 'Chamuditha', 'Madhubashana', 'chamuditha@gmail.com', 'Grade 9', NULL),
(18, 'Lakshitha', 'Hashan', 'lakshitha@gmail.com', 'Grade 9', NULL),
(19, 'Dulanjana', 'Maduwantha', 'dulanjana@gmail.com', 'Grade 6', NULL),
(20, 'Thakshal', 'Ramishka', 'thakshal@gmail.com', 'Grade 7', NULL),
(21, 'Vibushana', 'Dewmith', 'vibushana@gmail.com', 'Grade 8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `sid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `grade` varchar(8) NOT NULL,
  `payment` varchar(7) DEFAULT NULL,
  `amount` double NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`sid`, `fname`, `lname`, `email`, `grade`, `payment`, `amount`, `payment_date`) VALUES
(14, 'Pubudu', 'Dulanjaya', 'pubudu@gmail.com', 'Grade 6', 'Pay', 4000, '2023-03-22'),
(15, 'Sachith', 'Navodya', 'sachith@gmail.com', 'Grade 7', 'Pay', 5000, '2023-03-18'),
(16, 'Mirosh', 'Kavinda', 'mirosh@gmail.com', 'Grade 8', 'Pay', 4000, '2023-03-18'),
(17, 'Chamuditha', 'Madhubashana', 'chamuditha@gmail.com', 'Grade 9', 'Pay', 5000, '2023-03-18'),
(18, 'Lakshitha', 'Hashan', 'lakshitha@gmail.com', 'Grade 9', 'Pay', 4000, '2023-03-18'),
(19, 'Dulanjana', 'Maduwantha', 'dulanjana@gmail.com', 'Grade 6', 'Pay', 4000, '2023-03-18'),
(20, 'Thakshal', 'Ramishka', 'thakshal@gmail.com', 'Grade 7', 'Pay', 5000, '2023-03-18'),
(21, 'Vibushana', 'Dewmith', 'vibushana@gmail.com', 'Grade 8', 'Pay', 4000, '2023-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `payment_histroy`
--

CREATE TABLE `payment_histroy` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `payment_month` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `payment_year` year(4) DEFAULT year(current_timestamp())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_histroy`
--

INSERT INTO `payment_histroy` (`pid`, `sid`, `full_name`, `payment_month`, `amount`, `payment_year`) VALUES
(17, 24, 'Amal Perera', 'January', 4000, 2023),
(18, 14, 'Pubudu Dulanjaya', 'January', 4000, 2023),
(19, 15, 'Sachith Navodya', 'January', 5000, 2023),
(20, 16, 'Mirosh Kavinda', 'January', 4000, 2023),
(21, 17, 'Chamuditha Madhubashana', 'January', 5000, 2023),
(22, 18, 'Lakshitha Hashan', 'January', 4000, 2023),
(23, 19, 'Dulanjana Maduwantha', 'January', 4000, 2023),
(24, 20, 'Thakshal Ramishka', 'January', 5000, 2023),
(25, 21, 'Vibushana Dewmith', 'January', 4000, 2023),
(26, 22, 'Dulkith Perera', 'January', 4000, 2023),
(27, 14, 'Pubudu Dulanjaya', 'February', 4000, 2023),
(28, 23, 'Kasun Jayasinghe', 'January', 5000, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `whatsapp` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `grade` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `email`, `telephone`, `whatsapp`, `address`, `gender`, `grade`, `username`, `password`, `reg_date`) VALUES
(14, 'Pubudu', 'Dulanjaya', 'pubudu@gmail.com', '0778945632', '0778945632', 'Wennappuwa', 'Male', 'Grade 6', 'pubudu', '123', '2023-03-18 10:38:47'),
(15, 'Sachith', 'Navodya', 'sachith@gmail.com', '0778545231', '0778545231', 'Matara', 'Male', 'Grade 7', 'sachith', '123', '2023-03-18 10:39:56'),
(16, 'Mirosh', 'Kavinda', 'mirosh@gmail.com', '0774589546', '0774589546', 'Matara', 'Male', 'Grade 8', 'mirosh', '456', '2023-03-18 10:40:36'),
(17, 'Chamuditha', 'Madhubashana', 'chamuditha@gmail.com', '0768955123', '0768955123', 'Kurunagala', 'Male', 'Grade 9', 'chamuditha', '123', '2023-03-18 10:41:58'),
(18, 'Lakshitha', 'Hashan', 'lakshitha@gmail.com', '0775689123', '0775689123', 'Buthtala', 'Male', 'Grade 9', 'lakshitha', '123', '2023-03-18 10:42:56'),
(19, 'Dulanjana', 'Maduwantha', 'dulanjana@gmail.com', '0787895456', '0787895456', 'Alpitiya', 'Male', 'Grade 6', 'dulanjana', '123', '2023-03-18 10:43:57'),
(20, 'Thakshal', 'Ramishka', 'thakshal@gmail.com', '0784512456', '0784512456', 'Gampha', 'Male', 'Grade 7', 'thakshal', '456', '2023-03-18 10:44:50'),
(21, 'Vibushana', 'Dewmith', 'vibushana@gmail.com', '0774589456', '0774589456', 'Horana', 'Male', 'Grade 8', 'vibushana', '123', '2023-03-18 10:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `subject_materials`
--

CREATE TABLE `subject_materials` (
  `mid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `grade` varchar(8) NOT NULL,
  `m_topic` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `download` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_materials`
--

INSERT INTO `subject_materials` (`mid`, `tid`, `grade`, `m_topic`, `file_name`, `download`, `upload_date`) VALUES
(7, 12, 'Grade 7', 'DBMS', 'Practical Test.docx', 2, '2023-03-18 20:14:59'),
(8, 12, 'Grade 7', 'SQL', 'Tutorial 7.docx', 2, '2023-03-18 20:14:58'),
(10, 12, 'Grade 7', 'DB', 'Normalization.pdf', 6, '2023-03-20 20:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `tId` int(11) NOT NULL,
  `grade` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teach`
--

INSERT INTO `teach` (`tId`, `grade`) VALUES
(12, 'Grade 7'),
(13, 'Grade 8'),
(14, 'Grade 6');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `whatsapp` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `grade` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `profile_photo` varchar(50) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `fname`, `lname`, `email`, `telephone`, `whatsapp`, `address`, `gender`, `grade`, `username`, `password`, `profile_photo`, `qualification`, `reg_date`) VALUES
(12, 'Sachini', 'Vindya', 'sachini@gmail.com', '0768922456', '0768922456', 'Matara', 'Female', 'Grade 7', 'Ms.sachni', '456', 'sachiniMiss.jpg', 'MSc', '2023-03-18 06:17:20'),
(13, 'Dhishan', 'Dhammearatchi', 'dhishan@gmail.com', '0778945321', '0778945321', 'Rajagiriya', 'Male', 'Grade 8', 'Mr.dhishan', '123', 'DhishanSir.jpg', 'MSc', '2023-03-18 06:18:46'),
(14, 'Dharani ', 'Abhesinghe', 'dhara@gmail.com', '0778456321', '0778456321', 'Maharagama', 'Female', 'Grade 6', 'Mrs.dhara', '123', 'dharaniMiss.jpg', 'MSc', '2023-03-18 06:23:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `payment_histroy`
--
ALTER TABLE `payment_histroy`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subject_materials`
--
ALTER TABLE `subject_materials`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`tId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment_histroy`
--
ALTER TABLE `payment_histroy`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subject_materials`
--
ALTER TABLE `subject_materials`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
