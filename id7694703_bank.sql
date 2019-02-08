-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2019 at 02:47 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7694703_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `atmrequest`
--

CREATE TABLE `atmrequest` (
  `id` bigint(255) NOT NULL,
  `remacno` varchar(255) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atmrequest`
--

INSERT INTO `atmrequest` (`id`, `remacno`, `name1`, `status1`) VALUES
(6, 'BOKULTALA2', 'Moumita Chatterjee', 'Request Approved'),
(5, '56789', 'Shayan Chatterjee', 'Request Approved'),
(7, '4764', 'Naruto Uzunamki', 'Not Requested Yet'),
(8, '21243435454', 'Ayush Singh', 'Not Requested Yet'),
(9, '1111', 'Sayantan Ghosh', 'Not Requested Yet'),
(10, '12348907', 'Shayan Chatterjee', 'Not Requested Yet'),
(11, '1234', 'Dhiraj Kumar', 'Not Requested Yet'),
(12, '67674674747', 'Abc Def', 'Not Requested Yet');

-- --------------------------------------------------------

--
-- Table structure for table `bendetails`
--

CREATE TABLE `bendetails` (
  `id` bigint(255) NOT NULL,
  `benacno` varchar(20) NOT NULL,
  `remacno` varchar(11) NOT NULL,
  `acname` varchar(40) NOT NULL,
  `bankname` varchar(40) NOT NULL,
  `branchname` varchar(40) NOT NULL,
  `ifsc` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bendetails`
--

INSERT INTO `bendetails` (`id`, `benacno`, `remacno`, `acname`, `bankname`, `branchname`, `ifsc`) VALUES
(40, '78123', 'BOKULTALA2', 'Banasree Chatterjee', 'HDFC', 'Behala', '7896IFS');

-- --------------------------------------------------------

--
-- Table structure for table `dtbase`
--

CREATE TABLE `dtbase` (
  `id` bigint(50) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `psword` varchar(64) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `country` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `acNo` varchar(11) NOT NULL,
  `status1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtbase`
--

INSERT INTO `dtbase` (`id`, `firstname`, `lastname`, `email`, `psword`, `dob`, `country`, `gender`, `acNo`, `status1`) VALUES
(57, 'Shayan', 'Chatterjee', 'cshayan@gmail.com', 'MTIzNA==', '1997-08-05', 'India', 'Male', '56789', 'allowed'),
(63, 'Dhiraj', 'Kumar', 'gaa@gmail.com', 'MTIzNA==', '2018-11-13', 'India', 'Male', '1234', 'blocked'),
(61, 'Sayantan', 'Ghosh', 'sayantan1999arka@gmail.com', 'YWFhYQ==', '2018-11-05', 'India', 'Male', '1111', 'blocked'),
(62, 'Shayan', 'Chatterjee', 'shayan90@gmail.com', 'MTIzNA==', '2018-11-13', 'India', 'Male', '12348907', 'allowed'),
(64, 'Abc', 'Def', 'abc@gmail.com', 'MTIzNA==', '2018-12-05', 'india', 'Male', '67674674747', 'allowed');

-- --------------------------------------------------------

--
-- Table structure for table `duptransaction`
--

CREATE TABLE `duptransaction` (
  `id` bigint(255) NOT NULL,
  `remacno` varchar(255) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `credit` bigint(255) NOT NULL,
  `debit` bigint(255) NOT NULL,
  `updated` bigint(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `type1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `realtransaction`
--

CREATE TABLE `realtransaction` (
  `id` bigint(255) NOT NULL,
  `remacno` varchar(255) NOT NULL,
  `credit` bigint(255) NOT NULL,
  `debit` bigint(255) NOT NULL,
  `updated` bigint(255) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realtransaction`
--

INSERT INTO `realtransaction` (`id`, `remacno`, `credit`, `debit`, `updated`, `date1`) VALUES
(16, '4764', 0, 0, 0, '22/10/2018'),
(15, 'BOKULTALA2', 800, 50, 950, '21/10/2018'),
(14, '56789', 200, 100, 2956, '21/10/2018'),
(17, '21243435454', 0, 0, 0, '03/11/2018'),
(18, '1111', 40000, 0, 40000, '05/11/2018'),
(19, '12348907', 0, 0, 0, '10/11/2018'),
(20, '1234', 0, 0, 0, '16/11/2018'),
(21, '67674674747', 1000, 0, 1000, '27/12/2018');

-- --------------------------------------------------------

--
-- Table structure for table `transactionrecord`
--

CREATE TABLE `transactionrecord` (
  `id` bigint(255) NOT NULL,
  `remacno` varchar(255) NOT NULL,
  `credit` bigint(255) NOT NULL,
  `debit` bigint(255) NOT NULL,
  `updated` bigint(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionrecord`
--

INSERT INTO `transactionrecord` (`id`, `remacno`, `credit`, `debit`, `updated`, `details`, `date1`) VALUES
(82, '56789', 500, 0, 500, 'CREDIT', '30/10/2018'),
(81, '56789', 456, 0, 456, 'CREDIT', '30/10/2018'),
(80, 'BOKULTALA2', 800, 0, 800, 'CREDIT', '21/10/2018'),
(79, '56789', 500, 0, 500, 'CREDIT', '21/10/2018'),
(78, 'BOKULTALA2', 0, 50, 150, 'DEBIT(TRN Fund)', '21/10/2018'),
(77, '56789', 0, 700, 1300, 'DEBIT(TRN Fund)', '21/10/2018'),
(76, 'BOKULTALA2', 200, 0, 200, 'CREDIT', '21/10/2018'),
(75, '56789', 2000, 0, 2000, 'CREDIT', '21/10/2018'),
(83, '56789', 100, 0, 100, 'CREDIT', '03/11/2018'),
(84, '56789', 200, 0, 200, 'CREDIT', '03/11/2018'),
(85, '56789', 0, 100, 100, 'DEBIT', '03/11/2018'),
(86, '1111', 40000, 0, 40000, 'CREDIT', '05/11/2018'),
(87, '67674674747', 1000, 0, 1000, 'CREDIT', '27/12/2018');

-- --------------------------------------------------------

--
-- Table structure for table `transferfunds`
--

CREATE TABLE `transferfunds` (
  `id` bigint(255) NOT NULL,
  `remacno` varchar(255) NOT NULL,
  `remacname` varchar(255) NOT NULL,
  `benacno` varchar(255) NOT NULL,
  `benacname` varchar(255) NOT NULL,
  `amount` bigint(255) NOT NULL,
  `date1` varchar(30) NOT NULL,
  `type1` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transferfunds`
--

INSERT INTO `transferfunds` (`id`, `remacno`, `remacname`, `benacno`, `benacname`, `amount`, `date1`, `type1`, `status1`) VALUES
(64, 'BOKULTALA2', 'Moumita Chatterjee', '78123', 'Banasree Chatterjee', 50, '21/10/2018', 'real', 'Request Approved'),
(62, '56789', 'Shayan Chatterjee', '45678', 'Ashim Chatterjee', 700, '21/10/2018', 'real', 'Request Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atmrequest`
--
ALTER TABLE `atmrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bendetails`
--
ALTER TABLE `bendetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtbase`
--
ALTER TABLE `dtbase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duptransaction`
--
ALTER TABLE `duptransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtransaction`
--
ALTER TABLE `realtransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactionrecord`
--
ALTER TABLE `transactionrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transferfunds`
--
ALTER TABLE `transferfunds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atmrequest`
--
ALTER TABLE `atmrequest`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bendetails`
--
ALTER TABLE `bendetails`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dtbase`
--
ALTER TABLE `dtbase`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `duptransaction`
--
ALTER TABLE `duptransaction`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `realtransaction`
--
ALTER TABLE `realtransaction`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactionrecord`
--
ALTER TABLE `transactionrecord`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `transferfunds`
--
ALTER TABLE `transferfunds`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
