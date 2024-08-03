-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 10:21 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u210753955_w2`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`) VALUES
(2, 'ITT', '2024-07-31 17:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `fullname`, `email`, `phone`, `position`, `salary`, `created_at`, `updated_at`, `username`, `password_hash`) VALUES
(3, 'MAWULI AGBENYO', 'mawulikofiagbenyo@gmail.com', '0206695904', 'IT', 3322.00, '2024-08-03 09:14:45', '2024-08-03 09:14:45', 'hr', 'hr'),
(4, 'New HR', 'hrcost@hr.com', '0206695904', 'IT', 23322.00, '2024-08-03 09:44:01', '2024-08-03 09:44:01', 'hrcost', 'hrcost');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `deparment` varchar(100) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `employee_type` varchar(60) NOT NULL,
  `date_appointment` varchar(20) NOT NULL,
  `basic_salary` varchar(60) NOT NULL,
  `gross_pay` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL,
  `leave_status` varchar(20) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`id`, `employeeID`, `fullname`, `deparment`, `password`, `sex`, `email`, `dob`, `phone`, `address`, `qualification`, `dept`, `employee_type`, `date_appointment`, `basic_salary`, `gross_pay`, `status`, `leave_status`, `photo`) VALUES
(7, 'STAFF/FKP/2023/4860', 'Ndueso Akpabio', '', 'escobar2012', 'Male', 'newleastpaysolution@gmail.com', '12/9/1980', '08067361023', '12 Ikono rd', 'Msc', 'Bursary', 'Academic', '9/9/2023', '21000', '25000', '1', 'Pending', 'uploadImage/Profile/2.png'),
(8, '678i', 'MAWULI AGBENYO', '', 'mawulikofiagben', 'Male', 'mawulikofiagbenyo@gmail.com', '2024-07-25', '0206695904', 'ACCRA\r\nGHANA', '65666', 'it', 'it', '2024-07-24', '675', '457', '1', 'good', ''),
(10, '3434', 'Mawuli', NULL, 'agbenyomawuli60', 'Male', 'agbenyomawuli60@outlook.com', '2024-07-23', '0206695904', 'Accra\r\nAmrahia', 'IS', '2', 'it', '2024-07-25', '090', '343', '1', 'good', ''),
(11, '45354454', 'COST', NULL, 'cost', 'Male', 'cost@gmail.com', '2024-08-03', '0206695904', 'ACCRA\r\nGHANA', 'BECE', 'COST', 'BECE', '2024-08-09', '3344', '34343', '1', 'None', ''),
(12, '342242', 'cost2', 'COST', 'cost', 'Male', 'cost2@gmail.com', '2024-08-03', '0206695904', 'ACCRAGHANA', 'IT', 'COST', 'IT', '2024-08-09', '3334', '3334', '1', 'None', 'uploadImage/Profile/Annotation 2022-06-06 221159.png'),
(13, '2222', 'STP', 'ITT', 'STP', 'Male', 'STP@gmail.com', '2024-08-01', '0206695904', 'ACCRA\r\nGHANA', 'IT', 'ITT', 'ty', '2024-08-09', '4343', '3434', '1', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblleave`
--

CREATE TABLE `tblleave` (
  `ID` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `leaveID` varchar(6700) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `reason` varchar(5000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblleave`
--

INSERT INTO `tblleave` (`ID`, `email`, `leaveID`, `start_date`, `end_date`, `reason`, `status`) VALUES
(14, 'newleastpaysolution@gmail.com', '2023399', '2023-10-29', '2023-11-15', 'Maternity Leave', 'Approved'),
(15, 'newleastpaysolution@gmail.com', '2024119', '2024-07-25', '2024-07-27', 'Sick Leave', 'Declined'),
(16, 'cost2@gmail.com', '2024321', '2024-08-01', '2024-08-17', 'Monthly Leave', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `tbltraining`
--

CREATE TABLE `tbltraining` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbltraining`
--

INSERT INTO `tbltraining` (`id`, `email`, `emp_id`, `start_date`, `end_date`) VALUES
(1, 'mawulikofiagbenyo@gmail.com', '8', '2024-08-03', '2024-08-10'),
(2, 'mawulikofiagbenyo@gmail.com', 'mawulikofiagbenyo@gmail.com', '2024-08-03', '2024-08-10'),
(3, 'mawulikofiagbenyo@gmail.com', 'mawulikofiagbenyo@gmail.com', '2024-08-03', '2024-08-10'),
(4, 'cost@gmail.com', 'cost@gmail.com', '2024-08-08', '2024-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `fullname` varchar(34) NOT NULL,
  `photo` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `phone`, `fullname`, `photo`) VALUES
('admin', 'admin123', '0905656', 'Caroline Bassey', 'uploadImage/Profile/User.png');

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacations`
--

INSERT INTO `vacations` (`id`, `employee_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, '2024-08-02', '2024-08-07', 'pending', '2024-08-02 22:40:13', '2024-08-02 22:53:39'),
(2, 11, '2024-08-03', '2024-08-16', 'approved', '2024-08-03 09:44:28', '2024-08-03 09:44:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblleave`
--
ALTER TABLE `tblleave`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltraining`
--
ALTER TABLE `tbltraining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblleave`
--
ALTER TABLE `tblleave`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbltraining`
--
ALTER TABLE `tbltraining`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vacations`
--
ALTER TABLE `vacations`
  ADD CONSTRAINT `vacations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tblemployee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
