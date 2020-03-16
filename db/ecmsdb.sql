-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 10:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_table`
--

CREATE TABLE `account_table` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `account_balance` int(11) DEFAULT NULL,
  `annual_contribution` float DEFAULT NULL,
  `total_contribution` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(45) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `account_type` enum('REGULAR','ADMIN') DEFAULT 'ADMIN',
  `admin_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`, `account_type`, `admin_name`) VALUES
(1, 'admin@yahoo.com', '123456', 'ADMIN', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `loan_table`
--

CREATE TABLE `loan_table` (
  `loan_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `loan_amount` float DEFAULT NULL,
  `loan_status` enum('0','1') DEFAULT '0',
  `loan_date` varchar(45) DEFAULT NULL,
  `refund_status` enum('0','1') DEFAULT '0',
  `loan_payback_period` varchar(45) DEFAULT NULL,
  `loan_payback_amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_table`
--

INSERT INTO `loan_table` (`loan_id`, `user_id`, `loan_amount`, `loan_status`, `loan_date`, `refund_status`, `loan_payback_period`, `loan_payback_amount`) VALUES
(2, 1, 20000, '1', 'Friday, 19 Oct 2018', '0', NULL, NULL),
(3, 1, 30000, '1', 'Friday, 19 Oct 2018', '0', NULL, NULL),
(4, 9, 20000, '1', 'Sunday, 06 Jan 2019', '0', NULL, NULL),
(5, 9, 10000, '1', 'Sunday, 06 Jan 2019', '0', NULL, NULL),
(6, 1, 50000, '0', 'Saturday, 26 Jan 2019', '0', NULL, NULL),
(8, 1, 50000, '0', 'Saturday, 26 Jan 2019', '0', '1', 66),
(9, 1, 10000, '0', 'Saturday, 26 Jan 2019', '0', '2', NULL),
(10, 1, 1000, '0', 'Saturday, 26 Jan 2019', '0', '5', NULL),
(11, 1, 2000, '0', 'Saturday, 26 Jan 2019', '0', '4', 500),
(12, 1, 1000, '0', 'Saturday, 26 Jan 2019', '0', '4', 250),
(13, 1, 800, '0', 'Saturday, 26 Jan 2019', '0', '2', 400),
(14, 1, 70000, '0', 'Sunday, 27 Jan 2019', '0', '2', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `thrift_table`
--

CREATE TABLE `thrift_table` (
  `thrift_id` int(11) NOT NULL,
  `thrift_amount` int(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `thrift_year` varchar(45) DEFAULT NULL,
  `thrift_date` varchar(45) DEFAULT NULL,
  `thrift_status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thrift_table`
--

INSERT INTO `thrift_table` (`thrift_id`, `thrift_amount`, `user_id`, `thrift_year`, `thrift_date`, `thrift_status`) VALUES
(7, 20000, 1, '2019', 'Saturday, 26 Jan 2019', '1'),

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(20) DEFAULT NULL,
  `user_lname` varchar(20) DEFAULT NULL,
  `user_dob` varchar(45) DEFAULT NULL,
  `user_gender` varchar(45) DEFAULT NULL,
  `user_dor` varchar(45) DEFAULT NULL,
  `user_status` enum('0','1') DEFAULT '1',
  `user_email` varchar(45) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `account_type` enum('REGULAR','ADMIN') DEFAULT 'REGULAR',
  `user_phone` varchar(20) DEFAULT NULL,
  `user_img` mediumblob,
  `user_app_letter` mediumblob,
  `user_member_code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_fname`, `user_lname`, `user_dob`, `user_gender`, `user_dor`, `user_status`, `user_email`, `user_password`, `account_type`, `user_phone`, `user_img`, `user_app_letter`, `user_member_code`) VALUES
(1, 'John', 'Doe', '2018-09-18', 'Male', '21-09-2018', '1', 'wizedavis@yahoo.com', '', 'REGULAR', '0806567887', NULL, NULL, NULL),

-- Indexes for dumped tables
--

--
-- Indexes for table `account_table`
--
ALTER TABLE `account_table`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `fkuser_id_idx` (`user_id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `loan_table`
--
ALTER TABLE `loan_table`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `fk_user_id_idx` (`user_id`);

--
-- Indexes for table `thrift_table`
--
ALTER TABLE `thrift_table`
  ADD PRIMARY KEY (`thrift_id`),
  ADD KEY `fkuser_id_idx` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_table`
--
ALTER TABLE `account_table`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_table`
--
ALTER TABLE `loan_table`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `thrift_table`
--
ALTER TABLE `thrift_table`
  MODIFY `thrift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_table`
--
ALTER TABLE `account_table`
  ADD CONSTRAINT `fkuser_id` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_table`
--
ALTER TABLE `loan_table`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thrift_table`
--
ALTER TABLE `thrift_table`
  ADD CONSTRAINT `tfkuser_id` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
