-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 07:25 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr_db`
--
CREATE DATABASE IF NOT EXISTS `pr_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pr_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2021`
--

CREATE TABLE `tbl_2021` (
  `no` int(11) NOT NULL,
  `pr_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2022`
--

CREATE TABLE `tbl_2022` (
  `no` int(11) NOT NULL,
  `pr_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2023`
--

CREATE TABLE `tbl_2023` (
  `no` int(11) NOT NULL,
  `pr_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2024`
--

CREATE TABLE `tbl_2024` (
  `no` int(11) NOT NULL,
  `pr_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2025`
--

CREATE TABLE `tbl_2025` (
  `no` int(11) NOT NULL,
  `pr_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `email` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`email`, `password`, `user_type`, `fname`, `lname`, `status`) VALUES
('rdo@gmail.com', 'rdo12345', 'admin', 'admin', 'admin', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget_officer`
--

CREATE TABLE `tbl_budget_officer` (
  `bo_no` int(11) NOT NULL,
  `bo_name` varchar(500) DEFAULT NULL,
  `bo_position` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_budget_officer`
--

INSERT INTO `tbl_budget_officer` (`bo_no`, `bo_name`, `bo_position`) VALUES
(1, 'LEILA C. ESTIOCO', 'Budget Officer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_no` int(10) NOT NULL,
  `item_unit` varchar(100) DEFAULT NULL,
  `item_description` varchar(999) DEFAULT NULL,
  `item_quantity` int(10) DEFAULT NULL,
  `item_unit_cost` int(10) DEFAULT NULL,
  `item_total_cost` int(10) DEFAULT NULL,
  `pr_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_temp`
--

CREATE TABLE `tbl_item_temp` (
  `temp_item_no` int(10) NOT NULL,
  `temp_item_unit` varchar(100) DEFAULT NULL,
  `temp_item_description` varchar(999) DEFAULT NULL,
  `temp_item_quantity` int(10) DEFAULT NULL,
  `temp_item_unit_cost` int(10) DEFAULT NULL,
  `temp_item_total_cost` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request`
--

CREATE TABLE `tbl_purchase_request` (
  `pr_no` int(10) NOT NULL,
  `pr_responsibility_code` varchar(100) DEFAULT NULL,
  `pr_budget_officer` varchar(100) DEFAULT NULL,
  `pr_fund_cluster` varchar(100) DEFAULT NULL,
  `pr_office_section` varchar(100) DEFAULT NULL,
  `pr_purpose` varchar(999) DEFAULT NULL,
  `pr_date` date DEFAULT NULL,
  `pr_total_estimated_cost` int(10) DEFAULT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `recommending_approval` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `rb_position` varchar(500) DEFAULT NULL,
  `ra_position` varchar(500) DEFAULT NULL,
  `ab_position` varchar(500) DEFAULT NULL,
  `added_by` varchar(250) DEFAULT NULL,
  `tbl_year` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signatories`
--

CREATE TABLE `tbl_signatories` (
  `sign_id` int(10) NOT NULL,
  `sign_name` varchar(250) DEFAULT NULL,
  `sign_position` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_signatories`
--

INSERT INTO `tbl_signatories` (`sign_id`, `sign_name`, `sign_position`) VALUES
(1, 'GREGORIO J. RODIS', 'University President'),
(2, 'BERNADETH B. GABOR', 'Extension And Training Services Office'),
(3, 'MA. FLORINDA O. RUBIANO', 'Director, Research And Development Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_2021`
--
ALTER TABLE `tbl_2021`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_2022`
--
ALTER TABLE `tbl_2022`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_2023`
--
ALTER TABLE `tbl_2023`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_2024`
--
ALTER TABLE `tbl_2024`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_2025`
--
ALTER TABLE `tbl_2025`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_budget_officer`
--
ALTER TABLE `tbl_budget_officer`
  ADD PRIMARY KEY (`bo_no`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `tbl_item_temp`
--
ALTER TABLE `tbl_item_temp`
  ADD PRIMARY KEY (`temp_item_no`);

--
-- Indexes for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  ADD PRIMARY KEY (`pr_no`);

--
-- Indexes for table `tbl_signatories`
--
ALTER TABLE `tbl_signatories`
  ADD PRIMARY KEY (`sign_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_2021`
--
ALTER TABLE `tbl_2021`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2022`
--
ALTER TABLE `tbl_2022`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2023`
--
ALTER TABLE `tbl_2023`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2024`
--
ALTER TABLE `tbl_2024`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2025`
--
ALTER TABLE `tbl_2025`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_budget_officer`
--
ALTER TABLE `tbl_budget_officer`
  MODIFY `bo_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item_temp`
--
ALTER TABLE `tbl_item_temp`
  MODIFY `temp_item_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  MODIFY `pr_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_signatories`
--
ALTER TABLE `tbl_signatories`
  MODIFY `sign_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
