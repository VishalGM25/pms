-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 09:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_password`) VALUES
(1, 'Employee1', 'employee1@gmail.com', '123123'),
(9, 'srinath', 'srinath09@gmail.com', 'srinath'),
(17, 'vishal', 'vchary1028@gmail.com', '123456'),
(20, 'employee2', 'employee2@gmail.com', '123456'),
(21, 'employee3', 'employee3@gmail.com', 'e3'),
(22, 'employee4', 'employee4@gmail.com', '123456'),
(23, 'mukesh', 'mukesh@gmail.com', '456789'),
(24, 'employee5', 'employee5@gmail.com', 'employee'),
(25, 'sharma', 'sharma2@gmail.com', 'sharma'),
(27, 'nitin', 'nitin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(225) NOT NULL,
  `project_description` text DEFAULT NULL,
  `assgin_project` varchar(225) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `project_description`, `assgin_project`, `start_date`, `end_date`, `project_status`) VALUES
(7, 'weather report application.', 'building weather report application using API', 'employee2', '2020-10-03', '2020-10-04', 'pending'),
(13, 'slack', 'slack using js ', 'employee2', '2020-10-20', '2020-10-31', 'completed'),
(16, 'weather report application.', 'building weather report application using API', 'employee5', '2020-10-03', '2020-10-04', 'completed'),
(20, 'Tic-Tac_Toe', 'Tic-Tac_Toe', 'srinath', '2020-10-15', '2020-10-22', 'pending'),
(21, 'weather report application.', 'building weather report application using API', ' srinath', '2020-10-03', '2020-10-04', ''),
(22, 'login system', 'login system', 'mukesh', '2020-10-09', '2020-10-13', ''),
(23, 'online cab application', 'online cab application using react and node js', 'nitin', '2020-10-09', '2020-10-24', 'working'),
(24, 'weather report application.', 'building weather report application using API', 'mukesh', '2020-10-03', '2020-10-04', 'pending'),
(25, 'quiz app', 'quiz', 'employee2', '2020-10-10', '2020-10-15', 'pending'),
(26, 'lms', 'lms', 'srinath', '2020-10-12', '2020-10-29', 'working'),
(27, 'weather report application.', 'building weather report application using API', ' sharma', '2020-10-03', '2020-10-04', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
