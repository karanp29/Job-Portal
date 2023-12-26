-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 11:39 AM
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
-- Database: `mca_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin'),
(2, 'karan', 'karan');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `applied_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `app_Status` varchar(255) DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`applied_id`, `job_id`, `user_id`, `app_Status`, `resume_path`) VALUES
(1017, 1, 1, 'Pending', 'Karan_Panchal_Resume.pdf'),
(1018, 2, 1, 'Pending', 'Test.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `job_desc` varchar(255) NOT NULL,
  `job_salary_start` decimal(10,2) NOT NULL,
  `job_salary_end` decimal(10,2) NOT NULL,
  `job_experience` int(11) DEFAULT NULL,
  `job_cert` varchar(255) DEFAULT NULL,
  `job_skills` varchar(255) NOT NULL,
  `job_qualify` varchar(255) DEFAULT NULL,
  `job_openings` varchar(255) DEFAULT NULL,
  `job_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_position`, `job_desc`, `job_salary_start`, `job_salary_end`, `job_experience`, `job_cert`, `job_skills`, `job_qualify`, `job_openings`, `job_location`) VALUES
(1, 'Urgent Need Backend Developer', 'Midlevel Developer', '                        Knowledge of nodejs, express, api and mvc architecture                        ', 30000.00, 40000.00, 2, 'Not Required', 'JS, Node, Express, ORM', 'BSc / Btech / Masters', '5', 'Work From Office (Chennai)'),
(2, 'Manager', 'Product Manager - Business', 'You will be manager in a team responsible for the overall financial integrity and performance of a country, category, Supply Chain or FP&A', 100000.00, 120000.00, 7, 'Not Required', 'Communications, Personality', 'Masters', '2', 'Work From Office (Mumbai)'),
(3, 'Type Writer', 'Intern', 'Typing Speed above 80rpm', 12000.00, 17000.00, 0, 'None', 'MS', '12th', '10', 'WFH'),
(4, 'FULLSTACK DEVELOPER', 'Midlevel Developer', 'Your tasks span from creating user-friendly interfaces to building strong back-end systems, making a lasting impact on the tech scene. Stay updated with the latest tools and tech to excel.', 40000.00, 70000.00, 3, 'None', 'Java, SQL, System Design, Problem Solving', 'Bsc /  BTech / Masters', '2', 'Work From Home');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`applied_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `applied_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
