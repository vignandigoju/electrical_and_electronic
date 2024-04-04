-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 07:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

--
-- Dumping data for table `add_supervisor`
--

INSERT INTO `add_supervisor` (`emp_id`, `name`, `dob`, `designation`, `phone_num`) VALUES
('', 'suresh', '2023-09-08', 'supervisor', 2147483647);

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

--
-- Dumping data for table `choose`
--

INSERT INTO `choose` (`cid`, `name`, `empid`, `status`) VALUES
(1, 'kiran', 1234, 'pending'),
(2, 'vikas', 4444, 'pending');

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
('101', 'fan', 'usha', '', 5000, '2023-12-01', '1 year', '2024-01-11', ''),
('111', 'fan', 'USHA', 'electrical', 5000, '2017-12-07', '1 Year', '2018-12-20', 'building 1'),
('5001', 'AC', 'IFB', 'electrical', 35000, '2017-12-07', '1 Year', '2018-12-20', ''),
('b1/f1/101/ac01', 'AC', 'IFB', 'electrical', 35000, '2017-04-07', '1 Year', '2018-12-20', 'building 1'),
('b2/202/fan02', 'Fan', 'usha', '', 4000, '2023-12-01', '1 year', '2024-01-04', ''),
('b2/202/fan03', 'Fan', 'usha', '', 0, '2023-12-09', '1 year', '2024-01-26', ''),
('sse/202/gen03', 'Generator', 'Mahindra', 'electrical', 50000, '2019-12-06', '1 year', '2021-01-26', ''),
('sse/202/light03', 'Light', 'Havells', 'electrical', 1000, '2019-12-06', '1 year', '2020-01-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment`) VALUES
(1, 'Air Conditioner'),
(2, 'Fan'),
(3, 'Generator'),
(4, 'Light'),
(5, 'Sockets');

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
(9, 0, 'ac', 'filter', 'floor1,102', '0000-00-00', 'completed', 'w11'),
(11, 0, 'ac', 'water leakage', 'floor3, 103', '0000-00-00', 'completed', 'w11'),
(18, 0, 'fan', 'not working', 'building1,f', '0000-00-00', 'completed', 'w11'),
(20, 0, 'AC', 'water leakage', 'building1,floor2,203', '0000-00-00', 'completed', 'w11'),
(21, 0, 'light', 'not working', 'building2,floor3,305', '0000-00-00', 'completed', 'w11'),
(22, 0, 'light', 'broken', 'building1,floor5.505', '0000-00-00', 'completed', 'w11'),
(23, 0, 'ac', 'not working', 'sse,floor1,102', '0000-00-00', 'completed', 'w11'),
(26, 0, 'we', 'we', 'Ee', '0000-00-00', '', ''),
(27, 0, 'light', 'no light', 'b2,208', '0000-00-00', '', 'w11'),
(28, 0, 'lll', 'ddd', 'nnnn', '0000-00-00', '', ''),
(29, 111, 'ddd', 'nnnn', '555', '0000-00-00', '', ''),
(30, 111, 'ddd', 'nnnn', '555', '0000-00-00', '', 'w11'),
(31, 0, '', '', 'vv', '0000-00-00', '', ''),
(32, 0, '11', 'dd', '', '0000-00-00', '', ''),
(33, 0, '11', 'dd', 'divya', '0000-00-00', '', ''),
(34, 0, '11', 'dd', 'divya', '0000-00-00', 'completed', ''),
(35, 0, '11', 'dd', 'divya', '0000-00-00', '', ''),
(36, 0, '11', 'dd', 'divya', '0000-00-00', '', 'w11'),
(37, 0, '11', 'dd', '', '0000-00-00', '', 'w11'),
(38, 0, '11', '', '', '0000-00-00', '', 'w11'),
(39, 0, '11', 'dd', 'divya', '0000-00-00', '', 'w11'),
(40, 5001, 'ACC', 'ACC', 'ACC', '0000-00-00', 'completed', 'w11'),
(41, 0, '11', 'dd', 'divya', '0000-00-00', '', 'w11');

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
(2, 'condenser coil', '3000', '45678', '2016-12-01', 'completed', '', '2016-12-16', 'ac', '', 'vendor', '2016-12-15', '5001'),
(3, 'filter repair', '7000', '123456', '2018-11-01', 'completed', 'naresh', '2018-11-06', 'ac', '', 'invoice', NULL, 'b1/f1/101/ac01'),
(10, 'swing repair', '4000', '45678', '2017-02-11', 'completed', 'arun', '0000-00-00', 'ac', '', 'vendor', '2017-02-15', '5001'),
(81, 'compresser', '1500', '123123', '2017-09-16', 'completed', 'arun', '0000-00-00', 'ac', '', 'vendor', '2017-09-18', 'b1/f1/101/ac01'),
(82, 'PCB Repair ', '500', '8790', '2017-08-16', 'completed', '', '2017-08-22', '', '', 'invoice', '2017-08-21', '6001'),
(83, 'filter repair', '6000', '56678', '2018-01-15', 'completed', 'naresh', '2018-01-20', 'ac', '', 'invoice', '2018-01-19', '5001'),
(85, 'swing repair', '3000', '45678', '2017-09-01', 'completed', 'arun', '2017-09-10', '', '', 'vendor', '2017-09-10', 'b1/f1/101/ac01'),
(86, 'coil repair', '300', '333333', '2017-09-05', 'completed', '', '0000-00-00', '', '', 'invoice', NULL, '6001'),
(87, 'ceiling wings repair', '1000', '333333', '2018-01-05', 'completed', '', '2018-01-10', '', '', 'invoice', NULL, '6001'),
(88, 'coil problem', '1000', '333333', '2017-09-05', 'completed', '', '0000-00-00', '', '', 'vendor', '2017-09-10', '7001'),
(89, 'wiring', '1000', '333333', '2017-10-06', 'completed', '', '0000-00-00', '', '', 'invoice', NULL, '7001'),
(90, 'replacement', '1000', '333333', '2022-04-07', 'completed', '', '0000-00-00', '', '', 'invouce', NULL, '7001'),
(91, 'battery cable\r\n', '1000', '333333', '2022-05-09', 'completed', '', '0000-00-00', '', '', '', NULL, '8001'),
(92, 'leaks in coolant system', '2000', '98989', '2022-05-09', 'completed', '', '0000-00-00', '', '', '', NULL, '8001'),
(93, 'fuel failures', '2000', '909090', '2020-07-09', 'completed', '', '2020-10-09', 'generator', '', 'vendor', '2020-07-09', 'sse/202/gen03'),
(94, 'tube replacement', '1000', '909090', '2019-05-09', 'completed', '', '0000-00-00', '', '', 'invoice', '2019-10-09', 'sse/202/light03'),
(95, 'plug repair', '1000', '889966', '2022-05-09', 'completed', '', '0000-00-00', 'generator', '', 'vendor', '2022-05-09', 'sse/202/gen03'),
(96, 'bulb replacement', '10000', '889966', '2022-05-09', 'pending', '', '0000-00-00', '', '', 'vendor', NULL, '9001'),
(97, 'capacitor', '1500', '123123', '2023-11-16', 'completed', '', '0000-00-00', 'ac', '', '', NULL, '5004'),
(98, 'swing repair', '3000', '45678', '2017-09-01', 'completed', '', '0000-00-00', '', '', '', NULL, '6004'),
(99, 'bearings', '4000', '45678', '2023-11-01', 'completed', '', '0000-00-00', 'ac', '', 'vendor', NULL, '5002'),
(100, 'coil repair', '300', '333333', '2017-09-05', 'completed', '', '0000-00-00', '', '', '', NULL, '6002'),
(101, 'circuit breaker panel', '1000', '333333', '2017-09-05', 'completed', '', '0000-00-00', '', '', '', NULL, '7002'),
(102, 'wiring', '1000', '333333', '2017-10-06', 'completed', '', '0000-00-00', '', '', '', NULL, '7003'),
(103, 'switch problem', '1000', '333333', '2017-09-05', 'completed', '', '0000-00-00', '', '', '', NULL, '7004'),
(104, 'leaks in coolant system', '2000', '98989', '2022-05-09', 'completed', 'chandrababu', '0000-00-00', '', '', '', NULL, '8002'),
(105, 'tube repair', '10000', '889966', '2022-05-09', 'completed', '', '0000-00-00', '', '', '', NULL, '9003'),
(106, 'filament', '10000', '889966', '2022-05-09', 'completed', 'chandrababu', '0000-00-00', '', '', '', NULL, '9004'),
(107, 'swing repair', '4000', '45678', '2023-11-01', 'completed', '', '0000-00-00', 'ac', '', '', NULL, '5005'),
(109, 'pc ', '500', '4634', '0000-00-00', 'pending', '', '0000-00-00', 'ac', '', '', NULL, '5002'),
(110, 'pcb', '10000', '0', '2023-11-24', 'completed', 'chandrababu', '0000-00-00', '', '', '', NULL, '6001'),
(112, 'leakage', '', '30', '0000-00-00', '', 'naresh', '0000-00-00', 'ac', '1001', '', NULL, '5003'),
(113, 'leakage', '', '30', '2023-11-26', '', 'naresh', '0000-00-00', '', '1001', '', NULL, 'b2/202/fan02'),
(114, 'filter repair', '', '0', '2018-05-25', 'pending', 'naresh', '2018-05-30', 'ac', '1001', 'invoice', NULL, '5001'),
(115, 'filter repair', '3000', 'w7', '2017-07-24', 'completed', 'naresh', '0000-00-00', 'ac', '1001', 'vendor', '2017-07-28', '5001'),
(116, 'leakage', '1000', 'worker23', '2017-08-02', 'completed', 'divya', '0000-00-00', 'ac', 'sse,fllor1,102', 'vendor', '2017-08-12', '5001'),
(117, 'leakage', '', 'w7', '2023-11-06', 'completed', 'naresh', '0000-00-00', 'ac', 'floor1,102', '', NULL, '5001'),
(118, 'filter', '', 'worker23', '2023-11-15', 'pending', 'divya', '0000-00-00', 'ac', 'building 5,floor1,102', '', NULL, '5001'),
(119, 'not working', '', 'user123', '2023-11-14', 'pending', 'chandrababu', '0000-00-00', 'fan', 'building 5,floor1,102', '', NULL, '111'),
(120, 'leakage', '', 'w7', '2023-12-07', 'completed', 'naresh', '0000-00-00', 'ac', 'floor1,102', '', NULL, ''),
(121, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(122, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(123, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(124, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(125, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(126, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(127, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(128, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(129, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(130, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(131, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(132, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(133, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(134, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(135, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(136, 'divya', '', 'w7', '2023-12-01', 'completed', 'naresh', '0000-00-00', 'light', 'b1,202', '', NULL, ''),
(137, 'water leakage', '', 'worker23', '2023-12-14', 'pending', 'divya', '0000-00-00', 'ac', 'building 5,floor1,102', '', NULL, ''),
(138, 'leakage', '', 'w7', '2023-12-13', 'completed', 'naresh', '0000-00-00', 'light', 'floor1,102', '', NULL, ''),
(139, 'leakage', '', 'w7', '2023-12-13', 'completed', 'naresh', '0000-00-00', 'light', 'floor1,102', '', NULL, ''),
(140, 'not working', '', 'w7', '0000-00-00', 'completed', '', '0000-00-00', '', '', '', NULL, ''),
(141, 'water leakage', '', 'w7', '0000-00-00', 'completed', '', '0000-00-00', '', '1001', '', NULL, ''),
(142, '', '', '', '0000-00-00', 'pending', '', '0000-00-00', 'nnnn', '555', '', NULL, ''),
(143, 'lll', '', '', '0000-00-00', 'pending', '', '0000-00-00', 'nnnn', '555', '', NULL, ''),
(144, 'I', '', '', '2023-12-05', 'pending', '', '0000-00-00', 'I', 'uu', '', NULL, ''),
(145, 'hi', '', '', '2023-12-06', 'pending', '', '0000-00-00', 'hi', 'hhhhh', '', NULL, ''),
(146, 'I', '', '', '2023-12-13', 'pending', '', '0000-00-00', 'h', 'hh', '', NULL, ''),
(147, 'fan', '', '', '2023-12-08', 'pending', '', '0000-00-00', 'ac', 'b1', '', NULL, ''),
(148, '', '', '', '0000-00-00', 'pending', '', '0000-00-00', '', '555', '', NULL, ''),
(149, '111', '', '', '0000-00-00', 'pending', '', '0000-00-00', 'nnnn', '555', '', NULL, ''),
(150, 'ww', '', '', '0000-00-00', 'pending', 'divya', '0000-00-00', 'dd', 'vv', '', NULL, ''),
(151, 'did', '', '', '2023-12-20', 'completed', 'Elamaran', '0000-00-00', 'did', 'dd', '', NULL, ''),
(152, '', '', '', '0000-00-00', 'pending', '', '0000-00-00', '', 'divya', '', NULL, ''),
(153, 'leakage', '', 'w7', '2023-12-20', 'completed', 'gg', '0000-00-00', 'ac', 'bb', '', NULL, ''),
(154, 'leakage', '', 'w7', '2023-12-20', 'completed', '', '0000-00-00', 'ac', 'bb', '', NULL, ''),
(155, 'broked', '', 'w7', '2023-12-20', 'completed', 'bts', '0000-00-00', 'b1/f1/101/ac01', 'building 5,floor1,1102', '', NULL, ''),
(156, 'broked', '', 'w7', '2023-12-20', 'completed', 'bts', '0000-00-00', 'b1/f1/101/ac01', 'building 5,floor1,1102', '', NULL, ''),
(157, 'broked', '', 'w7', '2023-12-20', 'completed', 'bts', '0000-00-00', 'b1/f1/101/ac01', 'building 5,floor1,1102', '', NULL, ''),
(158, 'v', '', 'w7', '2023-12-20', 'completed', 'dd', '0000-00-00', 'b1/f1/101/ac01', 'hh', '', NULL, ''),
(159, 'w7', '', '', '2023-12-01', 'pending', '', '0000-00-00', '', 'bbbbb', '', NULL, ''),
(160, 'w7', '', '', '2023-12-01', 'pending', '', '0000-00-00', '', 'bbbbb', '', NULL, ''),
(161, 'w7', '', '', '2023-12-02', 'pending', '', '0000-00-00', '', 'b1,202', '', NULL, ''),
(162, 'w7', '', '', '2023-12-01', 'pending', '', '0000-00-00', '', '10001', '', NULL, ''),
(163, 'hhh', '', 'w7', '2023-12-01', 'completed', 'Elamaran', '0000-00-00', 'bb', 'jjjj', '', NULL, ''),
(164, 'hhh', '', 'w7', '2023-12-01', 'completed', 'Elamaran', '0000-00-00', 'bb', 'jjjj', '', NULL, ''),
(165, 'hhh', '', 'w7', '2023-12-01', 'completed', 'Elamaran', '0000-00-00', 'bb', 'jjjj', '', NULL, ''),
(166, 'nnn', '', 'w7', '2023-12-23', 'completed', 'Elamaran', '0000-00-00', 'yyy', 'uu', '', NULL, ''),
(167, 'nnn', '', 'w7', '2023-12-23', 'completed', 'Elamaran', '0000-00-00', 'yyy', 'uu', '', NULL, ''),
(168, 'leakage', '', 'w7', '2023-12-15', 'completed', '', '0000-00-00', 'bb', 'uu', '', NULL, ''),
(169, 'leakage', '', 'w7', '2023-12-15', 'completed', '', '0000-00-00', 'bb', 'uu', '', NULL, ''),
(170, 'leakage', '', 'w7', '2023-12-29', 'completed', '', '0000-00-00', 'yyy', 'nnn', '', NULL, ''),
(171, 'leakage', '', 'w7', '2023-12-29', 'completed', '', '0000-00-00', 'yyy', 'nnn', '', NULL, ''),
(172, 'hhh', '', 'w7', '2023-11-30', 'completed', '', '0000-00-00', 'jjjj', 'jjjj', '', NULL, ''),
(173, 'hhh', '', 'w7', '2023-11-30', 'completed', 'Kathiravan', '0000-00-00', 'jjjj', 'jjjj', '', NULL, ''),
(174, 'hhh', '', 'w7', '2023-12-15', 'completed', '', '0000-00-00', 'jjjj', 'jjjj', '', NULL, ''),
(175, 'leakage', '', 'w7', '2023-12-23', 'completed', '', '0000-00-00', 'light', 'building 5,floor1,102', '', NULL, ''),
(184, 'gggggg', '', 'worker', '2023-12-09', 'pending', 'Kathiravan', '0000-00-00', 'pipe', '1001', '', NULL, ''),
(185, 'nnn', '', 'worker23', '2023-12-09', 'pending', 'Kathiravan', '0000-00-00', 'light', '1001', '', NULL, ''),
(186, 'nnn', '', 'worker23', '2023-12-09', 'pending', 'Kathiravan', '0000-00-00', 'light', '1001', '', NULL, ''),
(187, ' nnnnnnnnnn', '', 'worker23', '2023-12-08', 'pending', '', '0000-00-00', 'bb', 'b1,202', '', NULL, '');

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
(2, 'Building 2', 'floor1', '102', 'ac', 'b1/f1/101/ac01'),
(3, 'Building 3', 'floor1', '103', '', '5001'),
(4, 'Building 4', 'floor2', '201', '', '5001'),
(5, 'Building 5', 'floor2', '202', '', '5004'),
(6, '', 'floor3', '301', 'ac', '5001'),
(7, '', 'floor3', '302', 'ac', '5001'),
(8, '', 'floor1', '104', 'ac', '0'),
(9, '', 'floor1', '105', 'ac', '0'),
(10, '', 'floor2', '203', '', '5001'),
(11, '', 'floor2', '204', '', '5001'),
(12, '', 'floor2', '205', '', '5001'),
(13, '', 'floor3', '303', 'ac', '5001'),
(14, 'sse', 'floor3', '202', 'generator', 'sse/202/gen03'),
(15, '', 'floor3', '305', 'ac', '5001'),
(16, '', 'floor4', '401', 'ac', '5001'),
(17, '', 'floor4', '402', 'ac', '5001'),
(18, 'SSE', 'floor4', '202', 'Light', 'sse/202/light03'),
(19, '', 'floor4', '404', 'ac', '5001'),
(20, '', 'floor4', '405', 'ac', '5001'),
(21, '', 'floor5', '501', 'ac', '5001'),
(22, '', 'floor5', '502', 'ac', '5001'),
(23, '', 'floor5', '503', 'ac', '5001'),
(24, '', 'floor5', '504', 'ac', '5001'),
(25, '', 'floor5', '505', 'ac', '5001'),
(26, 'Building 2', '2', '203', '', '5003'),
(27, '1', '2', '101', 'fan', '111'),
(28, 'sse', '', '102', '', ''),
(29, 'sse', '', '102', '', 'b2/202/fan02'),
(30, 'sse', '', '102', '', 'b2/202/fan02'),
(31, 'sse', '', '101', '', '101'),
(32, 'sse', '', '102', '', '101');

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
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`, `name`, `dob`, `mobnum`, `empid`, `action`, `status`, `assign_task`, `issue`, `location`, `equipment`, `user_id`) VALUES
(1, 'm13', '456', 'manager', 'varun', '2023-09-01', 678999999, 123, '', '0', 0, 'not working', '', '', '0'),
(9, 's12', '123', 'supervisor', 'Akash', '2023-08-30', 65437799, 456, 'Active', '0', 0, 'not working', '', '', '0'),
(11, 'w11', '123', 'user', 'thanish', '1995-09-06', 98635677, 112233, '', 'pending', 1, '', '', '', '0'),
(30, 'w7', '123', 'worker', 'Elamaran', '1993-11-04', 65778889, 12345788, 'Active', 'leakage', 1, 'not working', '', '', 'w11'),
(35, 'worker23', '123', 'worker', 'divya', NULL, 988579345, 0, 'Active', 'nkl', 1, 'broken', '', '', 'w11'),
(36, 'user123', '789', 'user', 'divya', '2013-11-01', 90909090, 445, '', 'completed', 0, 'not working', '', '', '0'),
(38, 'worker', '123', 'worker', 'chandrababu', '1993-11-04', 65778889, 12345788, 'Active', '', 1, 'not working', '', '', 'w11'),
(43, 'worker2', '123', 'worker', 'Kathiravan', NULL, 2147483647, 0, 'Deactive', '', 0, '', '', '', ''),
(44, '', '', 'cleaning', 'Aaa', NULL, 1234567890, 0, '', '', 0, '', '', '', ''),
(45, '', '', '', '', NULL, 0, 0, '', '', 0, '', '', '', 'w11'),
(46, '', '', '', '', NULL, 0, 0, '', '', 0, '', '', '', 'w11');

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

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `empid`, `name`, `jobid`, `status`, `rating`, `comments`) VALUES
(12, 999, 'kumar', 113, 'completed', 4, 'good'),
(36, 8, 'kishanthre', 1, 'pending', 3, 'bad'),
(39, 198, 'akshaya', 0, '', 5, 'good'),
(40, 0, '', 0, '', 0, ''),
(41, 0, '', 0, '', 0, ''),
(42, 123456, 'varun', 0, '', 4, 'good'),
(43, 0, '', 0, '', 0, ''),
(44, 333, 'gag', 0, '', 0, 'Ggg'),
(45, 0, 'I', 0, '', 0, 'Ii'),
(46, 0, 'I', 0, '', 0, 'I'),
(47, 0, 'we', 0, '', 0, 'Ee'),
(48, 0, 'we', 0, '', 0, 'We'),
(49, 66666, 'Nagoya', 0, '', 0, 'Good'),
(50, 5001, 'Elamaran', 0, '', 0, '1'),
(51, 0, '', 0, '', 0, ''),
(52, 112233, 'Elamaran', 0, '', 0, 'Good in co'),
(53, 0, 'naresh', 0, 'Completed', 3, 'good'),
(54, 0, 'naresh', 0, 'Completed', 3, 'good'),
(55, 0, 'naresh', 0, 'Completed', 3, 'good');

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

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sid`, `name`, `jobId`, `status`) VALUES
(1, 'kiran', 111234, 'pending'),
(2, 'uday', 23456, 'pending'),
(3, 'nishanth', 45678, 'completed');

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
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
