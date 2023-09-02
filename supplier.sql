-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_name` varchar(20) DEFAULT NULL,
  `c_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `u_id`, `c_name`, `c_mobile`) VALUES
(37, 9, 'dfsf', '33'),
(38, 9, 'dsfdsff', '3242342');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `total_bill` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `c_id`, `total_bill`) VALUES
(28, 37, 9),
(29, 38, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `p_name` varchar(20) DEFAULT NULL,
  `p_quantity` double DEFAULT NULL,
  `p_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `c_id`, `p_name`, `p_quantity`, `p_price`) VALUES
(39, 37, 'Oil', 3, 3),
(40, 38, 'Fish', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_pass` varchar(30) NOT NULL,
  `u_first` varchar(30) NOT NULL,
  `u_last` varchar(30) NOT NULL,
  `u_mobile` int(30) NOT NULL,
  `u_gender` varchar(30) NOT NULL,
  `u_dob` date NOT NULL,
  `u_address` text NOT NULL,
  `u_path` text NOT NULL,
  `u_type` varchar(30) NOT NULL,
  `u_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pass`, `u_first`, `u_last`, `u_mobile`, `u_gender`, `u_dob`, `u_address`, `u_path`, `u_type`, `u_role`) VALUES
(8, 'admin@gmail.com', '12345', 'sami', 'Al Gaffer', 1921078484, 'Male', '1992-08-01', 'BADDA', 'images/324727_116354581805564_1060874980_o.jpg', 'Admin', 'Active'),
(9, 'sami@gmail.com', '1234', 'nabil', 'nabil', 4324, 'Male', '2017-05-02', 'as', 'images/16763431_1386320814771299_1179156649_o.jpg', 'Supplier', 'Active'),
(10, 's@gmail.com', '1', 'samia', 'dsf', 234, 'Male', '0000-00-00', 'fsdfdsf', 'images/15344 pp.jpg', 'Supplier', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `u_id` (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `ff` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fffffff` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fkkk` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
