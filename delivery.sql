-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 04:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(11) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_status` int(11) NOT NULL DEFAULT '1',
  `a_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_fullname`, `a_email`, `a_password`, `a_status`, `a_created_at`) VALUES
(1, 'Admin', 'info@admin.com', 'admin', 1, '2018-10-10 23:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `dvl_id` int(11) NOT NULL,
  `dvl_user_id` int(11) NOT NULL,
  `dvl_driver_id` int(11) NOT NULL,
  `dvl_width` int(11) NOT NULL,
  `dvl_weight` int(11) NOT NULL,
  `dvl_charges` int(11) NOT NULL,
  `dvl_pickup` varchar(255) NOT NULL,
  `dvl_drop` varchar(255) NOT NULL,
  `dvl_pick_lat` varchar(255) NOT NULL,
  `dvl_pick_long` varchar(255) NOT NULL,
  `dvl_drop_lat` varchar(255) NOT NULL,
  `dvl_drop_long` varchar(255) NOT NULL,
  `dvl_status` int(11) NOT NULL DEFAULT '0',
  `dvl_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`dvl_id`, `dvl_user_id`, `dvl_driver_id`, `dvl_width`, `dvl_weight`, `dvl_charges`, `dvl_pickup`, `dvl_drop`, `dvl_pick_lat`, `dvl_pick_long`, `dvl_drop_lat`, `dvl_drop_long`, `dvl_status`, `dvl_created_at`) VALUES
(1, 1, 6, 20, 5, 2500, 'Gulberg III, Lahore, Pakistan', 'Mall Road, Lahore, Pakistan', '31.5101892', '74.3440842', '31.5400407', '74.35405319999995', 0, '2018-10-16 15:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_email` varchar(255) NOT NULL,
  `d_password` varchar(255) NOT NULL,
  `d_phone` bigint(13) NOT NULL,
  `d_cnic` varchar(255) NOT NULL,
  `d_address` text NOT NULL,
  `d_image` varchar(255) NOT NULL,
  `d_status` int(11) NOT NULL DEFAULT '1',
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `d_name`, `d_email`, `d_password`, `d_phone`, `d_cnic`, `d_address`, `d_image`, `d_status`, `d_created_at`) VALUES
(5, 'Cedric Hicks', 'bokif@mailinator.com', 'Pa$$w0rd!', 909, '27', 'Consequuntur eaque vero quasi sapiente esse sed occaecat dolor explicabo Inventore esse laudantium autem cillum quis voluptatem', 'kisspng-computer-icons-avatar-user-login-5ae149b20c8348_1680096815247139060513.jpg', 1, '2018-10-11 22:11:22'),
(6, 'Bethany Fowler', 'curig@mailinator.net', 'Pa$$w0rd!', 5645645645646, '3310499441672', 'Labore velit harum et eaque et voluptates autem inventore reprehenderit corporis sit nesciunt', 'dd.jpg', 1, '2018-10-11 22:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_address` text NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1',
  `u_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fullname`, `u_email`, `u_password`, `u_phone`, `u_address`, `u_status`, `u_created_at`) VALUES
(1, 'Igor Maldonado', 'kozogyqy@mailinator.com', 'Pa$$w0rd!', '771122', 'Consequat Animi culpa fugiat et doloribus ipsum illum itaque quidem delectus ea totam ut', 1, '2018-10-12 18:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`dvl_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `dvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
