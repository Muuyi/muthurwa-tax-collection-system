-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2018 at 02:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muthurwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Muuyi Andrew', 'admin@gmail.com', 'admin'),
(2, 'Mike Rose', 'mike@gmail.com', '18126e7bd3f84b3f3e4df094def5b7de'),
(3, 'Larry Ellison', 'larry@gmail.com', '66f4b449b3a98abf87f2521e35513542');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `bs_id` int(11) NOT NULL,
  `bs_name` varchar(255) NOT NULL,
  `own_name` varchar(255) NOT NULL,
  `own_id` int(8) NOT NULL,
  `own_phone` int(10) NOT NULL,
  `own_email` varchar(255) NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`bs_id`, `bs_name`, `own_name`, `own_id`, `own_phone`, `own_email`, `tax_amount`, `reg_date`) VALUES
(1, 'Flex kinyozi', 'Mike Mbogo', 843383874, 747385348, 'mike@gmail.com', 10000, '2018-08-12 17:42:12'),
(2, 'Machine Tech', 'John Kali', 345783847, 73127821, 'john@yahoo.com', 6000, '2018-08-12 17:42:30'),
(3, 'App Tech', 'Merlin Sherlin', 47754748, 2147483647, 'merlin@gmail.com', 0, '2018-08-12 12:32:29'),
(5, 'Frytech Lmtd', 'Mike Rose', 483785348, 2147483647, 'mike@gmail.com', 0, '2018-08-12 12:44:22'),
(6, 'Miketech Lmtd', 'BIll Gates', 2147483647, 94984983, 'bukk@gmail.com', 0, '2018-08-12 12:47:45'),
(7, 'Johntech', 'John Kimu', 12345678, 2147483647, 'john@gmal.com', 0, '2018-08-12 13:00:16'),
(8, 'Marytech', 'Maryl Anne', 4374283, 2147483647, 'maryl@yahoo.com', 5000, '2018-08-12 17:35:14'),
(9, 'Franktech', 'Frank Knowles', 244728374, 2147483647, 'frank@gmail.com', 0, '2018-08-14 08:20:43'),
(10, 'Briantech', 'Brian Ochile', 23234334, 2147483647, 'brian@gmail.com', 0, '2018-08-14 08:21:53'),
(11, 'Laptech', 'Laban Knowles', 12345678, 782472832, 'lap@gmail.com', 0, '2018-08-14 08:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `tax_payments`
--

CREATE TABLE `tax_payments` (
  `tax_id` int(11) NOT NULL,
  `tax_period` int(11) NOT NULL,
  `tax_yr` varchar(255) NOT NULL,
  `bs_id` varchar(255) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_payments`
--

INSERT INTO `tax_payments` (`tax_id`, `tax_period`, `tax_yr`, `bs_id`, `pay_mode`, `pay_date`) VALUES
(1, 2, '', '1', '', '2018-08-13 07:50:52'),
(2, 2, '', '2', '', '2018-08-13 07:53:29'),
(3, 2, '', '1', '', '2018-08-13 08:52:36'),
(4, 1, '', '3', 'cash', '2018-08-13 08:58:27'),
(5, 2, '2018', '3', 'cash', '2018-08-13 10:13:52'),
(6, 1, '2017', '1', 'cash', '2018-08-13 12:48:55'),
(7, 1, '2017', '8', 'mpesa', '2018-08-13 16:34:08'),
(8, 1, '2017', '1', 'mpesa', '2018-08-13 18:29:08'),
(9, 1, '2018', '1', 'mpesa', '2018-08-13 18:31:51'),
(10, 2, '2018', '3', 'mpesa', '2018-08-13 18:35:43'),
(11, 1, '2019', '3', 'mpesa', '2018-08-13 18:37:00'),
(12, 2, '2018', '3', 'mpesa', '2018-08-13 18:38:06'),
(13, 4, '2018', '3', 'mpesa', '2018-08-13 18:39:12'),
(14, 4, '2020', '3', 'mpesa', '2018-08-13 18:39:55'),
(15, 3, '2017', '3', 'mpesa', '2018-08-13 18:40:48'),
(16, 1, '2017', '3', 'mpesa', '2018-08-13 18:42:07'),
(17, 4, '2017', '11', 'mpesa', '2018-08-14 08:22:48'),
(18, 2, '2018', '11', 'mpesa', '2018-08-14 08:23:54'),
(19, 1, '2019', '11', 'mpesa', '2018-08-14 08:25:32'),
(20, 3, '2017', '11', 'mpesa', '2018-08-14 08:26:37'),
(21, 1, '2017', '11', 'mpesa', '2018-08-14 08:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `tax_payments`
--
ALTER TABLE `tax_payments`
  ADD PRIMARY KEY (`tax_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tax_payments`
--
ALTER TABLE `tax_payments`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
