-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 06:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `application_name` varchar(100) DEFAULT NULL,
  `href_module` varchar(100) DEFAULT NULL,
  `app_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `darily_keep`
--

CREATE TABLE `darily_keep` (
  `hk_id` int(11) NOT NULL,
  `hk_date` int(11) NOT NULL,
  `pd_id_hk` int(11) NOT NULL,
  `pd_id_doctor` int(11) NOT NULL,
  `health_main` varchar(300) NOT NULL,
  `health_sub` varchar(300) NOT NULL,
  `cigarate_type` int(11) DEFAULT NULL,
  `alcohol_type` int(11) DEFAULT NULL,
  `alcohol_etc` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `health_main`
--

CREATE TABLE `health_main` (
  `hm_id` int(11) NOT NULL,
  `hm_name` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `health_sub`
--

CREATE TABLE `health_sub` (
  `hs_id` int(11) NOT NULL,
  `hm_id` int(11) NOT NULL,
  `hs_name` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permission_status`
--

CREATE TABLE `permission_status` (
  `id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `appplication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_document`
--

CREATE TABLE `personal_document` (
  `pd_id` int(11) NOT NULL,
  `titile` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` text DEFAULT NULL,
  `ampher_id` int(11) DEFAULT NULL,
  `tumbon_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `id_card` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `age` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `user_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status_name`, `user_rate`) VALUES
(1, 'admin', 5),
(2, 'แพทย์', 4),
(3, 'เจ้าหน้าที่สาธารณะสุข', 3),
(4, 'อสม', 2),
(5, 'ผู้สูงอายุ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status_keep`
--

CREATE TABLE `user_status_keep` (
  `id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `darily_keep`
--
ALTER TABLE `darily_keep`
  ADD PRIMARY KEY (`hk_id`);

--
-- Indexes for table `health_main`
--
ALTER TABLE `health_main`
  ADD PRIMARY KEY (`hm_id`);

--
-- Indexes for table `health_sub`
--
ALTER TABLE `health_sub`
  ADD PRIMARY KEY (`hs_id`);

--
-- Indexes for table `permission_status`
--
ALTER TABLE `permission_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_document`
--
ALTER TABLE `personal_document`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status_keep`
--
ALTER TABLE `user_status_keep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `darily_keep`
--
ALTER TABLE `darily_keep`
  MODIFY `hk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_main`
--
ALTER TABLE `health_main`
  MODIFY `hm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_sub`
--
ALTER TABLE `health_sub`
  MODIFY `hs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_status`
--
ALTER TABLE `permission_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_document`
--
ALTER TABLE `personal_document`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_status_keep`
--
ALTER TABLE `user_status_keep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
