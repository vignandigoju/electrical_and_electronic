-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 12:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maintanence`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_supervisor`
--

CREATE TABLE `add_supervisor` (
  `emp_id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `dob` date DEFAULT NULL,
  `designation` text NOT NULL,
  `phone_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `servicename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `servicename`) VALUES
(20, 'ac.png', 'AC'),
(21, 'light.jpg', 'Light'),
(22, 'gen.png', 'Generator');

-- --------------------------------------------------------

--
-- Table structure for table `choose`
--

CREATE TABLE `choose` (
  `cid` int(11) NOT NULL,
  `name` text NOT NULL,
  `empid` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empstatus`
--

CREATE TABLE `empstatus` (
  `aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `jobid` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empstatus`
--

INSERT INTO `empstatus` (`aid`, `name`, `jobid`, `status`) VALUES
(1, 'vishal', 123456, 'pending'),
(2, 'kishan', 45678, 'completed'),
(3, 'varnesh', 111111, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `eqdetails`
--

CREATE TABLE `eqdetails` (
  `eid` varchar(100) NOT NULL,
  `name` varchar(10) NOT NULL,
  `brand` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `installation` date NOT NULL,
  `warranty` varchar(10) NOT NULL,
  `warrantyend` date NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eqdetails`
--

INSERT INTO `eqdetails` (`eid`, `name`, `brand`, `type`, `price`, `installation`, `warranty`, `warrantyend`, `location`) VALUES
('AC-1001', 'AC', 'Godrej', '', 35000, '2023-03-02', '1', '2024-03-03', ''),
('AC-1002', 'AC', 'Godrej', '', 35000, '2023-04-03', '1', '2024-04-04', ''),
('AC-1003', 'AC', 'Godrej', '', 34050, '2002-08-14', '10', '2012-08-14', ''),
('AC-1004', 'AC', 'Godrej', '', 10000, '2012-08-14', '10', '2022-08-14', ''),
('AC-1005', 'AC', 'Godrej', '', 25000, '2023-12-08', '2', '2024-12-08', ''),
('Gen-1001', 'Generator', 'Havells', '', 15000, '2019-12-07', '5', '2024-12-07', ''),
('Light-0001', 'Light', 'Crompton', '', 1000, '2022-06-14', '1', '2023-06-14', ''),
('Light-1002', 'Light', 'Crompton', '', 2000, '2022-03-15', '1', '2023-03-15', ''),
('Light-1003', 'Light', 'Crompton', '', 1000, '2021-06-12', '2', '2022-06-12', ''),
('Light-1004', 'Light', 'Skyu', '', 1500, '2023-12-08', '1', '2024-12-08', ''),
('Light-1005', 'Light', 'Crompton', '', 500, '2015-10-02', '1', '2016-10-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `iid` int(11) NOT NULL,
  `eqid` int(11) NOT NULL,
  `eqname` text NOT NULL,
  `issue` text NOT NULL,
  `location` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`iid`, `eqid`, `eqname`, `issue`, `location`, `date`, `status`, `user_id`) VALUES
(50, 0, 'AC-1001', 'AC Refil', 'SSE, Room 2', '0000-00-00', 'completed', 'user123'),
(51, 0, 'AC-1001', 'AC Refil', 'SSE, Room 2', '0000-00-00', '', 'user123'),
(52, 0, 'AC-1001', 'AC Usage ', 'SSE Room 4', '0000-00-00', 'completed', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(11) NOT NULL,
  `servicetype` text NOT NULL,
  `servicecharge` varchar(10) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `name` text NOT NULL,
  `duedate` date NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `endby` date DEFAULT NULL,
  `eid2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `servicetype`, `servicecharge`, `empid`, `date`, `status`, `name`, `duedate`, `equipment`, `location`, `type`, `endby`, `eid2`) VALUES
(230, 'AC Refil', '', 'w7', '2024-04-03', 'completed', 'Sukesh', '0000-00-00', '', 'SSE, Room 2', '', NULL, 'AC-1001'),
(232, 'AC Usage', '', 'w7', '2024-04-04', 'completed', 'Sukesh', '0000-00-00', '', 'SSE, Room 2', '', NULL, 'AC-1002');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `building` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `equipment` varchar(10) NOT NULL,
  `eidd` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationId`, `building`, `floor`, `room`, `equipment`, `eidd`) VALUES
(58, 'SSE', '', '30', 'AC', 'AC-1002'),
(59, 'SSE', '', '10', 'AC', 'AC-1001'),
(60, 'SSE', '', '10', 'AC', 'AC-1003'),
(61, 'SSE', '', '01', 'AC', 'AC-1004'),
(63, 'SSE', '', '02', 'AC', 'AC-1005'),
(64, 'SSE', '', '10', 'Light', 'Light-0001'),
(65, 'SSE', '', '10', 'Light', 'Light-1005'),
(66, 'SSE', '', '14', 'Light', 'Light-1002'),
(67, 'SSE', '', '10', 'Light', 'Light-1003');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `dob` date DEFAULT NULL,
  `mobnum` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `assign_task` int(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`, `name`, `dob`, `mobnum`, `empid`, `action`, `status`, `assign_task`, `issue`, `location`, `equipment`, `user_id`, `timestamp`) VALUES
(1, 'm13', '1234', 'manager', 'varun', '2023-09-01', 678999999, 123, 'Active', '0', 0, 'not working', '', '', '0', '2024-04-04 04:40:47'),
(55, 's12', '1234', 'supervisor', 'Ramesh', '2002-08-14', 2147483647, 0, 'Deactive', '', 0, '', '', '', '', '2024-04-04 03:02:20'),
(57, 'w7', '1234', 'worker', 'Sukesh', '2002-08-14', 2147483647, 0, 'Active', '', 0, '', '', '', '', '2024-04-04 03:21:57'),
(58, 'user123', '123', 'user', 'User', '2002-12-08', 2147483647, 0, 'Active', '', 0, '', '', '', '', '2024-04-04 03:19:08'),
(59, 's11', '1234', 'supervisor', 'Jeevan', '2002-08-14', 8878456, 0, 'Active', '', 0, '', '', '', '', '2024-04-04 04:08:41'),
(60, 'user1', '1234', 'user', 'Rakesh', '2002-08-14', 2147483647, 0, 'Active', '', 0, '', '', '', '', '2024-04-04 03:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `login_times`
--

CREATE TABLE `login_times` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `jobid` int(11) NOT NULL,
  `status` text NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `dId` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sid` int(11) NOT NULL,
  `name` text NOT NULL,
  `jobId` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workerdetails`
--

CREATE TABLE `workerdetails` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `mobilenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workerdetails`
--

INSERT INTO `workerdetails` (`id`, `name`, `role`, `mobilenum`) VALUES
(1, 'likiy', 'worker', 989878789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_supervisor`
--
ALTER TABLE `add_supervisor`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose`
--
ALTER TABLE `choose`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `eqdetails`
--
ALTER TABLE `eqdetails`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_times`
--
ALTER TABLE `login_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`dId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `login_times`
--
ALTER TABLE `login_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
