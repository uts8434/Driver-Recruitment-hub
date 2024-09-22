-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 06:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `userid` int(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cpi` float NOT NULL,
  `semester` int(8) NOT NULL,
  `experience` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`userid`, `university`, `institute`, `branch`, `degree`, `status`, `cpi`, `semester`, `experience`) VALUES
(8, 'lpu', 'lpu', 'it', 'mtech', 'pursuing', 4.96, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userid` int(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `post`, `resume`, `pemail`, `semail`, `password`) VALUES
(8, 'car driver', '12203917.pdf', 'uts8434@gmail.com', 'utsav8434@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `email`, `password`) VALUES
(3, 'admin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `exam_name` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`exam_name`, `exam_date`, `start_time`) VALUES
('car driver', '2023-10-10', '09:00'),
('bus driver', '2023-10-25', '10:00'),
('bus driver', '2023-10-25', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userid`, `user`, `feedback`) VALUES
(8, 'uts8434@gmail.com', 'abcdefghijklmnopqrstuvwxyz');

-- --------------------------------------------------------

--
-- Table structure for table `help_feedback`
--

CREATE TABLE `help_feedback` (
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_feedback`
--

INSERT INTO `help_feedback` (`email`, `subject`, `content`) VALUES
('uts8434@gmail.com', 'abc', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `userid` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `state` varchar(255) NOT NULL,
  `statespecify` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cityspecify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`userid`, `firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `state`, `statespecify`, `city`, `cityspecify`) VALUES
(8, 'utsav ', 'kumar', ' singh', 'male', '2001-06-10', 'Bihar', '', '0', 'buxar');

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `postname` varchar(255) NOT NULL,
  `vacancies` int(255) NOT NULL,
  `reqexperience` int(255) NOT NULL,
  `minsalary` int(255) NOT NULL,
  `maxsalary` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`postname`, `vacancies`, `reqexperience`, `minsalary`, `maxsalary`) VALUES
('car driver', 17, 6, 10000, 18000),
('taxi driver', 7, 2, 9000, 19000),
('truck driver', 2, 5, 21500, 25000),
('ambulance driver', 5, 5, 12000, 20000),
('bus driver', 4, 2, 15000, 18000),
('racing driver', 3, 7, 10000, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_events`
--

CREATE TABLE `upcoming_events` (
  `event_name` varchar(50) NOT NULL,
  `event_date` varchar(30) NOT NULL,
  `event_location` varchar(60) NOT NULL,
  `event_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_events`
--

INSERT INTO `upcoming_events` (`event_name`, `event_date`, `event_location`, `event_description`) VALUES
('car driver', '2023-10-20', 'jalanndhar', 'refer below<br>\r\nupcoming...'),
('car driver', '2023-10-13', 'kota', 'refer below');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `semail` (`semail`),
  ADD UNIQUE KEY `pemail` (`pemail`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `personal` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `personal` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
