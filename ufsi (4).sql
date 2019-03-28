-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 09:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `faculty_id` varchar(255) NOT NULL,
  `time_slot` varchar(40) NOT NULL,
  `day` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counseling`
--

INSERT INTO `counseling` (`faculty_id`, `time_slot`, `day`) VALUES
('admin', '2:20min - 4:30min', 'Tue'),
('admin', '1:0min - 3:35min', 'Mon'),
('admin', '9:20min - 4:45min', 'Wed');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(30) DEFAULT NULL,
  `department_name` varchar(30) DEFAULT NULL,
  `credits` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `department_name`, `credits`) VALUES
('cse011', 'DLD', 'CSE', '3'),
('cse012', 'DLD LAB', 'CSE', '3'),
('cse013', 'DBMS', 'CSE', '3'),
('cse014', 'DBMS LAB', 'CSE', '3'),
('cse015', 'OS', 'CSE', '3');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` varchar(6) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `room_number` varchar(30) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `about` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `gender`, `department_name`, `room_number`, `phone`, `about`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$zaz3t7qIMDjNC/lQehchYO/QzJAqosTFRYjHd6w/0.fifDy8Tv5AO', 'Male', 'CSE', 'PCR41', '1671764444', 'i am admin'),
('haider', 'haider', 'ali', 'haider@gmail.com', 'haider', '$2y$10$msnRtYP5StSopA74kXL8lOHyBbBo.x85mWUn.jcAWABfyYMsPS7vy', 'Female', 'CSE', 'PCR05', '987654', 'dsfafgg'),
('mahmud', 'Mahmudur', 'Rahman', 'mahmudur@cse.uiu.ac.bd', 'mahmudur', '$2y$10$uceJosvxGASGAQbrzVblpez3/BnIWxWhUrFWyRCHl8l2/B7pMJYv2', 'Male', 'CSE', 'Select Room', '01714386942', 'i am Md.Mahmudur Rahman'),
('saadsa', 'saad', 'sabit', 'sabit.cseuiu@gmail.com', 'sabit', '$2y$10$EMjFx799AIKDHR7xQfViRuJwx75kB/DE5vpfBgtwgdA5y4X3c57qm', 'Male', 'CSE', 'PCR54', '123456789', ''),
('skba', 'skba', 'arnob', 'skba@gmail.com', 'skba', '$2y$10$Y5CzASUrXuF4D1pqq3/3Gu4UmhrvO8fL1hjAscO026YwB5YsZRNgW', 'Male', 'CSE', 'PCR09', '123456798', 'lkjsfj ');

-- --------------------------------------------------------

--
-- Table structure for table `facultycoursebridge`
--

CREATE TABLE `facultycoursebridge` (
  `faculty_id` varchar(255) DEFAULT NULL,
  `course_name` varchar(30) DEFAULT NULL,
  `day` varchar(3) NOT NULL,
  `section` varchar(1) NOT NULL,
  `slot_id` varchar(2) NOT NULL,
  `room_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultycoursebridge`
--

INSERT INTO `facultycoursebridge` (`faculty_id`, `course_name`, `day`, `section`, `slot_id`, `room_number`) VALUES
('admin', 'OS', 'Wed', 'B', '05', 'PC Phy/Chem Lab1'),
('admin', 'DBMS', 'Sun', 'B', '02', 'PC Phy/Chem Lab4');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(3) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `section` varchar(1) NOT NULL,
  `trimester` varchar(20) NOT NULL,
  `path` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_name`, `section`, `trimester`, `path`) VALUES
(5, 'DLD', 'B', 'Fall-17', 'documents/Linux Shell Scripts.pdf'),
(6, 'DLD', 'C', 'Fall-14', 'documents/Course-offerings_Spring-2018-CSE-1.xlsx'),
(7, 'DLD', 'F', 'Spring-18', 'documents/kjhk.txt'),
(8, 'OOP', 'A', 'Summer-18', 'documents/Screenshot from 2017-10-24 00-30-46.png'),
(9, 'OOP', 'B', 'Spring-15', 'documents/New-Microsoft-Word-Document.docx'),
(13, 'OOP', 'H', 'Spring-17', 'documents/Linux Shell Scripts (1).pdf'),
(14, 'DBMS', 'A', 'Summer-18', 'documents/Screenshot from 2017-10-24 00-30-46 (1).png'),
(15, 'DBMS Lab', 'C', 'Fall-19', 'documents/kjhk.txt'),
(16, 'DLD LAB', 'B', 'Fall-17 ', 'documents/main.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `studentcoursebridge`
--

CREATE TABLE `studentcoursebridge` (
  `student_id` varchar(9) DEFAULT NULL,
  `course_name` varchar(40) DEFAULT NULL,
  `section` varchar(1) NOT NULL,
  `day` varchar(3) NOT NULL,
  `slot_id` varchar(2) NOT NULL,
  `room_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcoursebridge`
--

INSERT INTO `studentcoursebridge` (`student_id`, `course_name`, `section`, `day`, `slot_id`, `room_number`) VALUES
('011133056', 'DLD LAB', 'C', 'Sun', '05', 'PC Phy/Chem Lab2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_first` varchar(256) NOT NULL,
  `student_last` varchar(255) NOT NULL,
  `student_uid` varchar(9) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(256) NOT NULL,
  `credit` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_first`, `student_last`, `student_uid`, `gender`, `department_name`, `password`, `email`, `phone`, `address`, `credit`) VALUES
('saad', 'sabit', '011133056', 'Male', 'CSE', '$2y$10$VH10f81sWuGS4u7FQrfpH.PCzA.BTEMDHb7QzEiH8TxINhUGJHwNK', 'sabit.cseuiu@gmail.com', 123456, 'mirpur 12', 123);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `slot_id` varchar(2) NOT NULL,
  `start_hour` decimal(2,0) DEFAULT NULL,
  `start_minute` decimal(2,0) DEFAULT NULL,
  `end_hour` decimal(2,0) DEFAULT NULL,
  `end_minute` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_id`, `start_hour`, `start_minute`, `end_hour`, `end_minute`) VALUES
('01', '9', '0', '10', '20'),
('02', '10', '25', '11', '45'),
('03', '11', '50', '1', '10'),
('04', '1', '15', '2', '35'),
('05', '2', '40', '4', '0'),
('06', '9', '0', '11', '10'),
('07', '11', '20', '1', '30'),
('08', '1', '40', '3', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`user_uid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_uid`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
