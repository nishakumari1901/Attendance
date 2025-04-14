-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `roll_no`, `student_name`, `class`, `subject`, `date`, `status`) VALUES
(2, 1, 'Nisha', 'cc3', '', '0000-00-00', 'Present'),
(3, 2, 'Tannu', 'cc3', '', '0000-00-00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`id`, `roll_no`, `class`, `subject`, `date`, `status`) VALUES
(1, 1, '1st Year', 'CC1', '2025-04-04', 'Present'),
(2, 1, '1st Year', 'CC1', '2025-04-04', 'Present'),
(3, 1, '1st Year', 'CC1', '2025-04-04', 'Present'),
(4, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(5, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(6, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(7, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(8, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(9, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(10, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(11, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(12, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(13, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(14, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(15, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(16, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(17, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(18, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(19, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(20, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(21, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(22, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(23, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(24, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(25, 1, '3rd Year', 'CC1', '2025-04-12', 'Present'),
(26, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(27, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(28, 1, '1st Year', 'CC1', '2025-04-12', 'Present'),
(29, 1, '2nd Year', 'CC1', '2025-04-12', 'Present'),
(30, 1, '2nd Year', 'CC2', '2025-04-13', 'Present'),
(31, 1, '1st Year', 'CC1', '2025-04-13', 'Present'),
(32, 1, '1st Year', 'CC1', '2025-04-13', 'Present'),
(33, 2, '1st Year', 'CC1', '2025-04-13', 'Present'),
(34, 2, '1st Year', 'CC1', '2025-04-13', 'Present'),
(35, 1, '1st Year', 'CC7', '2025-04-14', 'Present'),
(36, 1, '1st Year', 'CC7', '2025-04-14', 'Present'),
(37, 1, '1st Year', 'CC7', '2025-04-14', 'Present'),
(38, 1, '1st Year', 'CC7', '2025-04-14', 'Present'),
(39, 1, '1st Year', 'CC7', '2025-04-14', 'Present'),
(40, 2, '1st Year', 'CC7', '2025-04-14', 'Present'),
(41, 2, '1st Year', 'CC7', '2025-04-14', 'Present'),
(42, 2, '1st Year', 'CC7', '2025-04-14', 'Present'),
(43, 3, '1st Year', 'CC7', '2025-04-14', 'Present'),
(44, 3, '1st Year', 'CC7', '2025-04-14', 'Present'),
(45, 3, '1st Year', 'CC7', '2025-04-14', 'Present'),
(46, 3, '1st Year', 'CC7', '2025-04-14', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year');

-- --------------------------------------------------------

--
-- Table structure for table `students_1st_year`
--

CREATE TABLE `students_1st_year` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_1st_year`
--

INSERT INTO `students_1st_year` (`id`, `roll_no`, `student_name`) VALUES
(1, 1, 'Tannu Priya'),
(4, 3, 'prity kri'),
(5, 1, 'Nistha');

-- --------------------------------------------------------

--
-- Table structure for table `students_2nd_year`
--

CREATE TABLE `students_2nd_year` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_2nd_year`
--

INSERT INTO `students_2nd_year` (`id`, `roll_no`, `student_name`) VALUES
(1, 1, 'Tannu'),
(2, 3, 'Neha');

-- --------------------------------------------------------

--
-- Table structure for table `students_3rd_year`
--

CREATE TABLE `students_3rd_year` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_3rd_year`
--

INSERT INTO `students_3rd_year` (`id`, `roll_no`, `student_name`) VALUES
(1, 1, 'Nisha'),
(2, 2, 'Nisha kri'),
(3, 3, 'Awantika');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `class_id`) VALUES
(1, 'CC1', 1),
(2, 'CC2', 1),
(3, 'CC3', 1),
(4, 'CC4', 1),
(5, 'CC5', 2),
(6, 'CC6', 2),
(7, 'CC7', 2),
(8, 'CC8', 2),
(9, 'CC9', 2),
(10, 'CC10', 3),
(11, 'CC11', 3),
(12, 'CC12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `class_id` int(11) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `created_at`, `class_id`, `reset_token`, `token_expiry`) VALUES
(1, 'Nisha ', 'nisha190104@gmail.com', '9631341523', '$2y$10$lna8xps71/PYXm.itLn2iufZGJKbnftcqRY0RdiAEw7RyTts/GkDe', '2025-03-31 04:09:16', NULL, '22bb6be973d1790f6a73380ba5db843f', '2025-04-14 08:24:43'),
(2, 'riya', 'riya@gmail.com', '9631341523', '$2y$10$nXUPbJ3nWFcDURjJlY.lg.K1ftxyLTvEtTQQiKw49N44DyxX1LVWa', '2025-04-01 12:49:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_students`
--

CREATE TABLE `users_students` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_students`
--

INSERT INTO `users_students` (`id`, `username`, `email`, `phone`, `password`, `created_at`, `class_id`) VALUES
(1, 'riya kum', 'riya@gmail.com', '9905344319', '$2y$10$6QNgyB18/Ml35udjN1o77uCusYmldJ0VMogLF0Sowb7EmNADTn6lu', '2025-04-01 13:59:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `students_1st_year`
--
ALTER TABLE `students_1st_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_2nd_year`
--
ALTER TABLE `students_2nd_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_3rd_year`
--
ALTER TABLE `students_3rd_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`),
  ADD KEY `fk_class` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_students`
--
ALTER TABLE `users_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students_1st_year`
--
ALTER TABLE `students_1st_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students_2nd_year`
--
ALTER TABLE `students_2nd_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students_3rd_year`
--
ALTER TABLE `students_3rd_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_students`
--
ALTER TABLE `users_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
