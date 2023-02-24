-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 07:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `cust_name` varchar(120) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `barb_phone` varchar(12) NOT NULL,
  `services` varchar(220) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(220) NOT NULL,
  `email` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`cust_name`, `cust_phone`, `appoint_id`, `barb_phone`, `services`, `date`, `address`, `email`, `gender`, `status`, `time`) VALUES
('ASDf', '7878787878', 2, '787878', 'SOME', '2023-02-12', 'asdf', 'octomegha@gmail.com', 'Male', 1, 0),
('ASDf', '7896541230', 3, '787878', 'SOME', '2023-02-06', 'asdfsdfd', 'asdf@maiol.cmo', 'Male', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `barb_id` int(11) NOT NULL,
  `shop name` varchar(120) NOT NULL,
  `barber name` varchar(120) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `area` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `pin` varchar(7) NOT NULL,
  `services` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`barb_id`, `shop name`, `barber name`, `phone`, `email`, `address`, `area`, `city`, `state`, `pin`, `services`) VALUES
(1, 'aas', 'aadd', '787878', 'adf', 'adsaf', 'sdf', 'fadsa', 'sdf', '85858', 'adsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `fk_barb_phone` (`barb_phone`);

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`phone`),
  ADD KEY `idx` (`barb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barber`
--
ALTER TABLE `barber`
  MODIFY `barb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_barb_phone` FOREIGN KEY (`barb_phone`) REFERENCES `barber` (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
