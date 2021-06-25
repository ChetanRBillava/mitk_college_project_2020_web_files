-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2021 at 03:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

drop Database college;
create database college;
use college;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
-- 

INSERT INTO `admin_login` (`email`, `passwd`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `shopLogin`
--

CREATE TABLE `shopLogin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopLogin`
--

INSERT INTO `shopLogin` (`email`, `password`) VALUES
('shop@mitk.com', 'shop@mitk');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(20) NOT NULL,
  `for_year` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `for_year`, `amount`) VALUES
(1, 'first year', 60000),
(2, 'second year', 50000),
(3, 'third year', 50000),
(4, 'fourth year', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `email` varchar(50) NOT NULL,
  `applied_on` varchar(50) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `leave_from` varchar(50) NOT NULL,
  `leave_till` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `reason` varchar(700) NOT NULL,
  `leave_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `student_name` varchar(30) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `guardian_name` varchar(30) NOT NULL,
  `guardian_phone` varchar(12) NOT NULL,
  `guardian_email` varchar(50) NOT NULL,
  `student_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `join_date` varchar(50),
  `room_id` int(20) ,
  `room_num` varchar(20),
  `room_rent` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messbill_pay`
--

CREATE TABLE `messbill_pay` (
  `m_id` int(20) NOT NULL,
  `m_details` varchar(100) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messbill_pay`
--

INSERT INTO `messbill_pay` (`m_id`, `m_details`, `amount`) VALUES
(1, 'per day', 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payment_for` varchar(50) NOT NULL,
  `trans_detail` varchar(200) NOT NULL,
  `trans_type` varchar(50) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `total_amt` varchar(50) NOT NULL,
  `trans_status` varchar(50) NOT NULL,
  `otp` varchar(7) NULL,
  `verified` varchar(10) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(600) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_phone` varchar(12) NOT NULL,
  `guardian_email` varchar(50) NOT NULL,
  `sslc_percent` varchar(20) NOT NULL,
  `puc_percent` varchar(20) NOT NULL,
  `student_status` varchar(50) NOT NULL,
  `student_type` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `stationary`
--

CREATE TABLE `stationary` (
  `item_id` int(2) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_amount` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationary`
--

INSERT INTO `stationary` (`item_id`, `item_name`, `item_amount`, `quantity`) VALUES
(2, 'Record Book', '90', 50),
(3, 'Assignment Book', '30', 50),
(4, 'Blue Book', '30', 50);

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `item_id` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
);

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(20) NOT NULL,
  `room_num` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `forGender` varchar(100) NOT NULL,
  `rent` int(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `max_capacity` varchar(20) NOT NULL,
  `current_count` varchar(50) NOT NULL
);
--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_num`, `type`, `for`, `rent`, `status`, `max_capacity`, `current_count`) VALUES
(1, '201', 'Attached Bathroom', 'Male', 150, 'Available', '3', '0'),
(2, '202', 'Common Bathroom', 'Male', 100, 'Available', '3', '0'),
(3, '203', 'Common Bathroom', 'Female', 100, 'Available', '3', '0'),
(4, '204', 'Attached Bathroom', 'Female', 150, 'Available', '2', '0');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD KEY `email` (`email`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD KEY `email` (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `email` (`email`);

--
-- Indexes for table `messbill_pay`
--
ALTER TABLE `messbill_pay`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `guardian_email` (`guardian_email`);

--
-- Indexes for table `stationary`
--
ALTER TABLE `stationary`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `cart`
--

ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messbill_pay`
--
ALTER TABLE `messbill_pay`
  MODIFY `m_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stationary`
--
ALTER TABLE `stationary`
  MODIFY `item_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for table `attendence`
--

ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`);

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`);

ALTER TABLE `hostel`
  ADD CONSTRAINT FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`);
COMMIT;

--
-- Constraints for table `cart`
--

ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `stationary` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
