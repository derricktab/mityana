-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2024 at 04:05 PM
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
-- Database: `mityana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$u/y9iL/.SgjIhHLgT08FyO26VJNKUSfxnWjTjZor0ODYLyiNdpPXG'),
(2, 'admin', '$2y$10$xD3WvCc2.uVKa03dTgkyQeZ/XlJObjmlEf5Uk/uAdMWH3VTY5Y2oa');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `combination` varchar(100) NOT NULL,
  `pschool` varchar(100) NOT NULL,
  `pgrade` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `home_district` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_phone` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_occupation` varchar(100) NOT NULL,
  `date_received` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `first_name`, `last_name`, `class`, `combination`, `pschool`, `pgrade`, `dob`, `gender`, `nationality`, `home_district`, `home_address`, `religion`, `parent_name`, `parent_phone`, `parent_email`, `parent_occupation`, `date_received`) VALUES
(34, 'xygghj', 'hg', 'S2', '', 'jgjhg', 'jhgjg', '05/07/2022', 'Male', 'mgjhgh', 'hgjghjg', 'jhgjhgjh', 'ghjghj', 'ghjgh', '07788555', 'sde@hj.com', 'jhgjgjhg', '2022-10-04 18:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `alevel_subjects`
--

CREATE TABLE `alevel_subjects` (
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `papers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alevel_subjects`
--

INSERT INTO `alevel_subjects` (`code`, `name`, `papers`) VALUES
(1, 'GP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `days_present` int(11) NOT NULL,
  `days_absent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_and_stream`
--

CREATE TABLE `class_and_stream` (
  `id` int(11) NOT NULL,
  `class` enum('S1','S2','S3','S4','S5','S6') NOT NULL,
  `stream` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_and_stream`
--

INSERT INTO `class_and_stream` (`id`, `class`, `stream`) VALUES
(3, 'S4', 'CENTRAL');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `message`) VALUES
(1, 'DERRICK', 'ZZIWA', 'derrickt@derrick.com', '+256754893983', 'eisjfsd'),
(2, 'DERRICK', 'ZZIWA', 'derrickt@derrick.com', '+256754893983', 'eisjfsd'),
(4, 'ede', 'ded', 'de@de', 'de', 'dede'),
(5, 'DERRICK', 'ZZIWA', 'derricktab44@gmail.com', '+256754893983', 'gggfdg'),
(6, 'DERRICK', 'ZZIWA', 'derricktab44@gmail.com', '+256754893983', 'gggfdg'),
(7, 'DERRICK', 'ZZIWA', 'derricktab44@gmail.com', '+256754893983', 'LUIUGHJKLJK'),
(8, 'dorothy', 'jdklsf', 'dsf@dsjk.com', '0774454545', 'fgfgvcbcvbc'),
(9, 'SSEBABI', 'SAM', 'sm@sam.com', '0754555555', 'are there any vacancies there?');

-- --------------------------------------------------------

--
-- Table structure for table `current_year`
--

CREATE TABLE `current_year` (
  `id` int(11) NOT NULL,
  `current_year` varchar(100) NOT NULL,
  `current_term` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_year`
--

INSERT INTO `current_year` (`id`, `current_year`, `current_term`) VALUES
(1, '2022', '2'),
(2, '2022', '2'),
(3, '2023', '1'),
(4, '2023', '2'),
(5, '2023', '1'),
(6, '2023', '2'),
(7, '20230', ''),
(8, '20230', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(2, 'uploads/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `marks_old`
--

CREATE TABLE `marks_old` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `bot` varchar(100) NOT NULL,
  `mid` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `competency` varchar(250) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `descriptor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_old`
--

INSERT INTO `marks_old` (`id`, `student`, `teacher`, `subject`, `bot`, `mid`, `end`, `term`, `year`, `competency`, `skills`, `remarks`, `descriptor`) VALUES
(1, 20220002, 'kigongo', 'ENGLISH', '3', '3', '3', '2', '2022', '45yw45', '45y45', '45y45', 'Outstanding'),
(2, 20220001, 'sammy_senior', 'ENGLISH', '3', '3', '3', '2', '2022', 'fhgaetg', 'reghaer', 'erhgaer', 'Outstanding'),
(3, 20220001, 'sammy_senior', 'HISTORY', '3', '3', '3', '2', '2022', 'a', 'a', 'a', 'Outstanding'),
(4, 20220002, 'sammy_senior', 'HISTORY', '3', '3', '3', '2', '2022', 'tyedcdedfger', 'cefverergare', 'evfreerger', 'Basic'),
(5, 20220008, 'sammy_senior', 'I.C.T', '3', '3', '2', '2', '2022', 'good', 'good', 'very good', 'Outstanding'),
(6, 20220008, 'sammy_senior', 'HISTORY', '3', '3', '3', '2', '2022', 'greta', 'great', 'great', 'Basic');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_no`, `name`, `phone`, `email`, `occupation`) VALUES
('20220001', 'lkjh', 'kjl', 'jkl@jksdf.com', 'kjlh'),
('20220002', 'L;KF', 'L;KDF', 'derricktab44@gmail.com', 'KLFD'),
('20220003', 'LKDF', 'L;KFDS', 'F@FD.COM', 'LKSLFSK'),
('20220004', 'fhgf', '07554545', 'dsf@dfs.com', 'fsdkjh'),
('20220005', 'fhgf', '0755889977', 'G@G.COM', 'PILOT'),
('20220006', 'Aziz', '077777777', 'dsf@dfs.com', 'business man'),
('20220007', 'KJFHSDJ', '07755555', 'DSFS@FKHSDKF.COM', 'KJSFD'),
('20220008', 'Joshua', '0760802891', 'phil@gmail.com', 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `stream` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream`) VALUES
(3, 'CENTRAL'),
(4, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `combination` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `home_district` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `date_admitted` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `promotion_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `image`, `class`, `stream`, `combination`, `dob`, `gender`, `nationality`, `home_district`, `home_address`, `religion`, `parent`, `date_admitted`, `username`, `password`, `promotion_status`) VALUES
(10, 20220001, 'ksdfh', 'jksfhdkjl', 'uploads/chemistry-lab-apparatuses-500x500.jpg', 'S0', 'CENTRAL', '', '08/20/2022', 'Male', 'fghfg', 'UGANDA', 'Ndejje Masitowa', 'dsf', '20220001', '2022-08-10 11:49:22', '20220001', '$2y$10$/S1dHkPyCbovJWEYW80ez.Kb4mxvDXLfdlPxttwkucRcOQHruWZV.', 0),
(11, 20220002, 'LKSDF', 'LKJSFD', 'uploads/Head.jpg', 'S1', 'CENTRAL', '', '08/13/2022', 'Male', 'FSDLK', 'L;FKSJ', ';LKFJ', 'L;KDF', '20220002', '2022-08-10 11:50:46', '20220002', '$2y$10$8T9eFXK/4mgE7Nqin7t6uesYnx8EEClswLfTXHPSi4DMTdx76mgRq', 0),
(12, 20220003, 'SDLF;', 'LK;SDF', 'uploads/Head.jpg', 'S5', 'Western', '', '08/20/2022', 'Male', 'LSDKJ', 'L;KFSL;', 'L;SKDF', 'LKFDS', '20220003', '2022-08-10 11:53:34', '20220003', '$2y$10$BLizye7MCRoznsFFoRXr1uST0tKFLrWI9cMaJQWRgj4msrl1WWZtq', 0),
(13, 20220004, 'fjdhk', 'ZZIWA', 'uploads/response.png', 'S5', 'CENTRAL', '', '09/03/2022', 'Male', 'Ugandan', 'NAIROBI', 'Kabale University', 'BUDHIST MONK', '20220004', '2022-09-07 16:58:55', '20220004', '$2y$10$Y01VRlonTG2JVvJNKytcsuZK/5DZW4Y4b.JWbgcDXOBgCqg5ZDeJC', 0),
(14, 20220005, 'sdfjk', 'kjhsf', 'uploads/ME.jpg', 'S5', 'Western', 'PEM/ICT', '09/07/2022', 'Male', 'Ugandan', 'fghf', 'Kabale University', 'Christian', '20220005', '2022-09-08 09:13:55', '20220005', '$2y$10$EiQabwazme.F9fnU41BhVu7yMVhweCmFW3X9SivmzhVUpXeINcCf.', 0),
(15, 20220006, 'KAKOOZA', 'AZIZI', 'uploads/istockphoto-483590577-612x612.jpg', 'S3', 'CENTRAL', '', '09/14/2022', 'Male', 'Kenyan', 'Nairobi', 'da', 'Muslim', '20220006', '2022-09-20 15:26:45', '20220006', '$2y$10$uucXb55YagFkxxp4kkRMVuCHQM.8hGqKq.cR7MidE5odQjZCj5fUe', 3),
(16, 20220007, 'sammy', 'sfdkj', 'uploads/WhatsApp Image 2022-08-15 at 7.14.10 PM.jpeg', 'S5', 'Western', 'PEM/ICT', '09/24/2022', 'Male', 'vjxhKJVXC', 'KJFSDKJ', 'FKJDS', 'KJDS', '20220007', '2022-09-20 15:27:05', '20220007', '$2y$10$INATxXFOXUjocIvz9mWIdOwXvRYV2QwhCl.gC6TbB2CBpL7VSU4xy', 0),
(17, 20220008, 'Demo', 'Student', 'uploads/tt.jpeg', 'S1', 'CENTRAL', '', '01/09/2001', 'Male', 'Ugandan', 'Wakiso', 'Matugga', 'Born Again', '20220008', '2024-01-11 17:04:55', '20220008', '$2y$10$mGSiHXV7LMA0sQ4rL9CEzesa3L.4JICxyZ/FR76/pP0dch9dDmwB.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`) VALUES
(1, 'ENGLISH', '475'),
(2, 'MATHEMATICS', '456'),
(3, 'CHEMISTRY', '545'),
(4, 'BIOLOGY', '553'),
(5, 'PHYSICS', '535'),
(6, 'AGRICULTURE', '527'),
(7, 'HISTORY', '241'),
(8, 'GEOGRAPHY', '273'),
(9, 'C.R.E', '224'),
(10, 'I.R.E', '225'),
(11, 'LUGANDA', '335'),
(12, 'ENTREPRENEURSHIP', '845'),
(13, 'I.C.T', '840'),
(14, 'LITERATURE', '208'),
(16, 'ECONOMICS', '232');

-- --------------------------------------------------------

--
-- Table structure for table `subject_offered`
--

CREATE TABLE `subject_offered` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_offered`
--

INSERT INTO `subject_offered` (`id`, `student`, `subject`, `date`) VALUES
(52, 20220001, 'ENGLISH', '2024-01-16 11:03:51'),
(53, 20220001, 'MATHEMATICS', '2024-01-16 11:03:51'),
(54, 20220001, 'CHEMISTRY', '2024-01-16 11:03:51'),
(55, 20220001, 'BIOLOGY', '2024-01-16 11:03:51'),
(56, 20220001, 'PHYSICS', '2024-01-16 11:03:51'),
(58, 20220001, 'GEOGRAPHY', '2024-01-16 11:03:51'),
(69, 20220006, 'ENGLISH', '2024-01-16 11:03:51'),
(70, 20220006, 'MATHEMATICS', '2024-01-16 11:03:51'),
(71, 20220006, 'CHEMISTRY', '2024-01-16 11:03:51'),
(72, 20220006, 'BIOLOGY', '2024-01-16 11:03:51'),
(73, 20220006, 'PHYSICS', '2024-01-16 11:03:51'),
(75, 20220006, 'GEOGRAPHY', '2024-01-16 11:03:51'),
(92, 20220002, 'I.C.T', '2024-01-16 14:09:33'),
(93, 20220002, 'HISTORY', '2024-01-16 14:09:55'),
(94, 20220008, 'HISTORY', '2024-01-16 14:12:07'),
(96, 20220003, 'ECONOMICS', '2024-01-16 14:35:58'),
(97, 20220003, 'ENTREPRENEURSHIP', '2024-01-16 15:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` text NOT NULL DEFAULT 'logo.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `email`, `phonenumber`, `address`, `salary`, `username`, `password`, `profile_pic`) VALUES
(2, 'KIGONGO BEN', 'derricktab44@gmail.com', '+256754893983', 'Kabale University', '800000', 'kigongo', '$2y$10$z81aTZ66KvdGSKhQPppJx.FssQwVIP0aFjXA63nNR/STiEZpTHAXq', ''),
(5, 'SSEBABI SAM', 'ssebabi@gmail.com', '0778925494', 'Mityana', '2000000', 'sammy_senior', '$2y$10$rcJfp1ZL2aYpcq.DGWYFCetiAhuMQuw.tbZimN4RRIL/ANO9QcdgC', '65a64db99e77e.jpeg'),
(7, 'Phillip Ssempeebwa', 'phillipphilcourts540@gmail.com', '089685', 'kabale', '9000000', 'devcoder', '$2y$10$bVhBUfLlDxjwVvHawZ/MIOA7uQoEutazcFcjDoBRlY2OzTjgh1KXa', '658089ca15f33.jpeg'),
(8, 'Phillip Ssempeebwa', 'phillipphilcourts540@gmail.com', '089685', 'kabale', '9', 'dev', '$2y$10$g6aI99AVbyaIAqriBv3/s.bu5DoBUJsD/COAMRB7JKEeEf18L.VL.', '65814b74182ea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `id` int(11) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `class` enum('S1','S2','S3','S4','S5','S6') NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`id`, `teacher`, `class`, `subject`) VALUES
(8, 'sammy_senior', 'S1', 'I.C.T'),
(10, 'kigongo', 'S1', 'ENGLISH'),
(11, 'sammy_senior', 'S5', 'ECONOMICS'),
(12, 'kigongo', 'S4', 'LUGANDA'),
(13, 'kigongo', 'S6', 'ECONOMICS'),
(14, 'kigongo', 'S1', 'LUGANDA'),
(15, 'sammy_senior', 'S1', 'HISTORY'),
(16, 'sammy_senior', 'S5', 'ENTREPRENEURSHIP'),
(17, 'sammy_senior', 'S6', 'LUGANDA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alevel_subjects`
--
ALTER TABLE `alevel_subjects`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_and_stream`
--
ALTER TABLE `class_and_stream`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stream` (`stream`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_year`
--
ALTER TABLE `current_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_old`
--
ALTER TABLE `marks_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `subject_teacher` (`teacher`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_no`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stream` (`stream`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subject_offered`
--
ALTER TABLE `subject_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `subject` (`subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_and_stream`
--
ALTER TABLE `class_and_stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `current_year`
--
ALTER TABLE `current_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks_old`
--
ALTER TABLE `marks_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject_offered`
--
ALTER TABLE `subject_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_and_stream`
--
ALTER TABLE `class_and_stream`
  ADD CONSTRAINT `stream` FOREIGN KEY (`stream`) REFERENCES `streams` (`stream`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks_old`
--
ALTER TABLE `marks_old`
  ADD CONSTRAINT `student` FOREIGN KEY (`student`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `subject_teacher` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `parent` FOREIGN KEY (`parent`) REFERENCES `parents` (`parent_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `subject` FOREIGN KEY (`subject`) REFERENCES `subjects` (`name`),
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
