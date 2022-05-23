-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 03:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_old`
--

INSERT INTO `marks_old` (`id`, `student`, `teacher`, `subject`, `bot`, `mid`, `end`, `term`, `year`) VALUES
(1, 20220001, 'kigongo', 'Luganda', '45', '80', '75', '2', '2022');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_no`, `name`, `phone`, `email`, `occupation`) VALUES
('20220001', 'Ssenyonjo Godfrey', '0754893983', 'derricktab44@gmail.com', 'Farmer'),
('20220002', 'Ssenyonjo Godfrey', '0754893983', 'derricktab44@gmail.com', 'Farmer'),
('20220003', 'fhgf', 'hgfhf', 'derricktab44@gmail.com', 'fghf'),
('20220004', 'fhgf', 'hgfhf', 'derricktab44@gmail.com', 'fghf'),
('20220005', 'TAREMWA VEN', '0787754555', 'taremwa@company.com', 'SOFTWARE ENGINEER'),
('20220006', 'sfdjk', '0745454545', 'taremwa@company.com', 'dslkfsd'),
('20220007', 'Ssenyonjo Godfrey', 'GFDGD', 'taremwa@company.com', 'SOFTWARE ENGINEER'),
('20220008', 'fhgf', '0745454545', 'taremwa@company.com', 'fghf'),
('20220009', 'TAREMWA VEN', '0754893983', 'derricktab44@gmail.com', 'SOFTWARE ENGINEER'),
('20220010', 'fhgf', 'hgfhf', 'derricktab44@gmail.com', 'fghf'),
('20220011', 'ZZIWA DERRICK', '0755889977', 'dtaab@tab.com', 'SOFTWARE ENGINEER');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `home_district` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `date_admitted` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `class`, `dob`, `gender`, `nationality`, `home_district`, `home_address`, `religion`, `parent`, `date_admitted`, `username`, `password`) VALUES
(1, 20220001, 'DERRICK', 'ZZIWA', 'S6', '09/21/1999', 'Male', 'Ugandan', 'Kampala', 'Kabale University', 'Christian', '20220001', '2022-05-09 17:17:11', '20220001', '$2y$10$qIr2b4Gv9FWZBB.Mx6V6jOw3XZ0o1R0CxnJvyHpZ5/C/vYMusNu3K'),
(2, 20220002, 'DERRICK', 'ZZIWA', 'S6', '09/21/1999', 'Male', 'Ugandan', 'Kampala', 'Kabale University', 'Christian', '20220002', '2022-05-09 17:17:30', '20220002', '$2y$10$pdh5w.4alzDJF3v94zYFTOcPsE8P/DqZI9BxR.YOIVqX7c9k9/dS6'),
(3, 20220003, 'DERRICK', 'ZZIWA', 'S2', '05/07/2022', 'Female', 'fghfg', 'fghf', 'Kabale University', 'thfgf', '20220003', '2022-05-09 17:18:43', '20220003', '$2y$10$ZI1coBz3F0m1RPpkmOkQjuj71Agg/FeTIyEAUhkVKtBgol7xREopC'),
(4, 20220004, 'DERRICK', 'ZZIWA', 'S2', '05/07/2022', 'Female', 'fghfg', 'fghf', 'Kabale University', 'thfgf', '20220004', '2022-05-09 17:18:48', '20220004', '$2y$10$rYS8N9fSr7eU2W1Ihj8SgOlTkuk/1Vcex6d2ZF/zygdNuqSrQ2Agm'),
(26, 20220005, 'SSEBABI', 'SAM', 'S6', '05/27/2022', 'Male', 'Ugandan', 'Kampala', 'Kabale University', 'Christian', '20220005', '2022-05-11 16:27:22', '20220005', '$2y$10$RDU17tjIs/lelYN/n89YBuP6ILzSG0W8PnoKSNL9vpDi4oJ3llTpa'),
(31, 20220006, 'lunkuse', 'dora', 'S3', '05/14/2022', 'Male', 'Ugandan', 'fghf', 'Kabale University', 'Christian', '20220006', '2022-05-11 16:29:28', '20220006', '$2y$10$2GwV7Cebfn3.J5HyQEeU1u19CJ7SfzAo0oYNBydcT9f6IKrmccG3i'),
(38, 20220007, 'dorothy', 'dorothy', 'S4', '05/14/2022', 'Male', 'Ugandan', 'fghf', 'Kabale University', 'Christian', '20220007', '2022-05-11 16:55:37', '20220007', '$2y$10$tK4C1Brk.N0ZvVTRuekzUu9Ok3ffJ.bCLcStV.Qf8KocALz2H4Tf2'),
(39, 20220008, 'DERRICK', 'ZZIWA', 'S1', '05/19/2022', 'Male', 'Ugandan', 'fghf', 'Kabale University', 'Christian', '20220008', '2022-05-11 17:21:36', '20220008', '$2y$10$7/v4Cz3OUIKWIOM7d/fvPem4CJNCAQ.81TVV7tr4.bV4lA0jTXxaa'),
(40, 20220009, 'regina', 'desire', 'S2', '05/07/2022', 'Female', 'Ugandan', 'Kampala', 'Kabale University', 'Christian', '20220009', '2022-05-12 12:46:39', '20220009', '$2y$10$yaM9EYYHWBGOJq6pMjvCvehosV0Rn2wm9C.pTb/V792EEgIOFm/2S'),
(41, 20220010, 'DERRICK', 'ZZIWA', 'S4', '05/11/2022', 'Male', 'fghfg', 'fghf', 'Kabale University', 'Christian', '20220010', '2022-05-12 18:38:56', '20220010', '$2y$10$3AHupH/dUDm5n4ZTj9BfKuBUQ26J./7tKKDsIQeMO3EIPVBGN7UhW'),
(42, 20220011, 'SAM', 'SENIOR', 'S4', '05/11/2022', 'Male', 'KENYAN', 'NAIROBI', 'KIKOMBA', 'CHRISTIAN', '20220011', '2022-05-13 10:37:01', '20220011', '$2y$10$l1BtG1dMfnRY74GCMRgWe.7AVnk26AnfUQDUH92HU78P//JR5JGvS');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`) VALUES
(6, 'Geography', '273'),
(7, 'Physics', '535'),
(8, 'Luganda', '335'),
(10, 'Entrepreneurship', '845'),
(11, 'Kiswahili', '618'),
(13, 'Literature', '208'),
(14, 'Fine Art', '610'),
(15, 'Agriculture', '527'),
(16, 'IRE', '225'),
(24, 'IRE', '673');

-- --------------------------------------------------------

--
-- Table structure for table `subject_offered`
--

CREATE TABLE `subject_offered` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `email`, `phonenumber`, `address`, `salary`, `username`, `password`) VALUES
(2, 'KIGONGO BEN', 'derricktab44@gmail.com', '+256754893983', 'Kabale University', '800000', 'kigongo', '$2y$10$z81aTZ66KvdGSKhQPppJx.FssQwVIP0aFjXA63nNR/STiEZpTHAXq'),
(5, 'SSEBABI SAM', 'ssebabi@gmail.com', '0778925494', 'Mityana', '2000000', 'sammy_senior', '$2y$10$rcJfp1ZL2aYpcq.DGWYFCetiAhuMQuw.tbZimN4RRIL/ANO9QcdgC');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks_old`
--
ALTER TABLE `marks_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subject_offered`
--
ALTER TABLE `subject_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `subject` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
