-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 06:23 PM
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
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `dvl_id` int(11) NOT NULL,
  `qb_delivery_id` int(11) NOT NULL,
  `qb_invoice_id` int(11) NOT NULL,
  `dvl_user_id` int(11) NOT NULL,
  `dvl_driver_id` int(11) NOT NULL,
  `dvl_name` varchar(255) NOT NULL,
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

INSERT INTO `deliveries` (`dvl_id`, `qb_delivery_id`, `qb_invoice_id`, `dvl_user_id`, `dvl_driver_id`, `dvl_name`, `dvl_width`, `dvl_weight`, `dvl_charges`, `dvl_pickup`, `dvl_drop`, `dvl_pick_lat`, `dvl_pick_long`, `dvl_drop_lat`, `dvl_drop_long`, `dvl_status`, `dvl_created_at`) VALUES
(9, 53, 167, 10, 13, 'dvl5beaf3d16e551', 20, 15, 2000, 'Dharampura, Lahore, Pakistan', 'Mughalpura, Lahore, Pakistan', '31.552501', '74.36534529999994', '31.56896489999999', '74.35861490000002', 0, '2018-11-13 20:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `directionstest`
--

CREATE TABLE `directionstest` (
  `id` int(11) NOT NULL,
  `loc` longtext NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directionstest`
--

INSERT INTO `directionstest` (`id`, `loc`, `lat`, `lng`) VALUES
(7, 'Malam Jabba, Pakistan', '34.7999189', '72.57223999999997'),
(8, 'MM Alam Road, Lahore, Pakistan', '31.5130259', '74.35111729999994'),
(9, 'Toronto, ON, Canada', '43.653226', '-79.38318429999998');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `d_id` int(11) NOT NULL,
  `qb_driver_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_email` varchar(255) NOT NULL,
  `d_password` varchar(255) NOT NULL,
  `d_phone` bigint(13) NOT NULL,
  `d_cnic` varchar(255) NOT NULL,
  `d_address` text NOT NULL,
  `d_city` varchar(255) NOT NULL,
  `d_country` varchar(255) NOT NULL,
  `d_postalCode` int(11) NOT NULL,
  `d_image` varchar(255) NOT NULL,
  `d_status` int(11) NOT NULL DEFAULT '1',
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `qb_driver_id`, `d_name`, `d_email`, `d_password`, `d_phone`, `d_cnic`, `d_address`, `d_city`, `d_country`, `d_postalCode`, `d_image`, `d_status`, `d_created_at`) VALUES
(13, 103, 'Adnan Anderson', 'andreas@navigaremoments.se', 'admin', 3345224824, '3314577991648', 'MugalPura', 'lahore', 'pakistan', 2400, 'view_in_new_tab5.PNG', 1, '2018-11-13 19:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE `driver_location` (
  `id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`id`, `delivery_id`, `lat`, `lng`) VALUES
(89, 2, '31.512985599999997', '74.3415808'),
(90, 3, '31.512985599999997', '74.3415808'),
(91, 4, '31.512985599999997', '74.3415808'),
(92, 9, '31.512985599999997', '74.3415808');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_key` text NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'qb_client_id', 'Q0IqldBiiqL7mN7EVHE76t3a5IAPGJuFo23cKcHjqGBZZI9Yhq'),
(2, 'qb_client_secret', 'gehJdhCzj7DzRIPNFSzGYVOL8TpCv3jgUSkvAVYv'),
(4, 'qb_access_token', 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..31UhXZ1hdPC7kmTpwmEy_g.FbbRZtTZ3VWEBPsthXqUtbRDC7lNzQqDSTCoL4eZwY35B4Ky71fRdpDcHxeeCL0J_0h_48BGXWf02Uos7uB79Rs_70Xq3zA151MAhLM4QaqowFCRDnd3tUbhYGZtBkUW6Wtm3GHV-5vzEt9mrgQgvKmccxlufyYQ5T7Yeh2ZbeAFgfaeswqcpPk8vSVY0_97GkP0YIb687Dq4_dFtjZ1HpXjvshFjgt6Aq_kHqaagOfB3WCfOB0TNNul393n7yiG8qYXNiK27EM2-VsRhCLWMfGWDtILGOR7K1LLt-1VN12SuAczBqgVxurM6RF_dzEZePB-RTZxy3f0pJH7ib8LWOX9jf_9bXh_czq4tk2uEFKtyXFN2XvZgGz5Ew260l1QshRiozXPksm57we5otww9NJmqsDN1e6SadZ9MlEobvyUVCtfAu-o_8KTpnxQO0DK4Y-zWiM7MEK_3FH10WiP-BAnxopxEOl9mhe_5P0hORYLOsoLyYlF6AxZuMEV4A3PfzRKvcNDIzdO_v0oEeFCOppEdcMoS4P9qus6SwYoYa4_ho4dwIG2HPaUtI_jhueml0GBNQTTSh5AsAFUEf8qnHEp0yJAnhBrKsK2XiCj6ujjx_Xez3aEe4OSqItGzqUxOTYP0Ms2ZJlvdtCz2Hyl0ZX0dWdRL8zt_t8_4MyoxlxROqHwXv1RQZYZoMtp1JmO.Qffpfjtzx27Sros-gXwJcw'),
(5, 'qb_refresh_token', 'L011550769480zjgif7xTGPzi5Kzhm8cB5VXyvT5GpHK6M0JXp'),
(6, 'qb_realmId', '123146090862619');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `user_qb_id` int(11) NOT NULL,
  `u_fullname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_city` varchar(255) NOT NULL,
  `u_country` varchar(255) NOT NULL,
  `u_postal_code` int(11) NOT NULL,
  `u_address` text NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1',
  `u_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `user_qb_id`, `u_fullname`, `u_email`, `u_password`, `u_phone`, `u_city`, `u_country`, `u_postal_code`, `u_address`, `u_role`, `u_status`, `u_created_at`) VALUES
(2, 0, 'Admin', 'admin@e.com', 'admin', '033478888888', '', '', 0, '', 'admin', 1, '2018-11-07 14:57:53'),
(10, 101, 'Junaid', 'blackdesire002@gmail.com', '', '3345224824', 'lahore', 'Pakistan', 24000, 'Xyz street', 'user', 1, '2018-11-13 17:10:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`dvl_id`);

--
-- Indexes for table `directionstest`
--
ALTER TABLE `directionstest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `driver_location`
--
ALTER TABLE `driver_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `dvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `directionstest`
--
ALTER TABLE `directionstest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
