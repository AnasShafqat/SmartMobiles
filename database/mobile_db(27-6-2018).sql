-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 02:37 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_setup`
--

CREATE TABLE `company_setup` (
  `company_id` int(15) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `address` varchar(120) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_setup`
--

INSERT INTO `company_setup` (`company_id`, `shop_name`, `owner_name`, `contact_no`, `address`, `photo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'pqr', 'Ali', 3456789, 'jhgcghjklk', 'uploads/abc_photo.jpg', '2018-06-25 12:29:09', '2018-06-24 21:06:09', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `expense_name` varchar(30) NOT NULL,
  `amount` int(15) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `date`, `expense_name`, `amount`, `total_amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2018-06-23 00:00:00', 'Purchase Cold Drink', 65, 65, '2018-06-23 13:37:56', '2018-06-23 13:37:56', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `income_name` varchar(30) NOT NULL,
  `amount` int(15) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1529752295),
('m130524_201442_init', 1529752298);

-- --------------------------------------------------------

--
-- Table structure for table `new_purchase`
--

CREATE TABLE `new_purchase` (
  `purchase_id` int(15) NOT NULL,
  `IMEI` int(15) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `seller_contact_no` int(13) NOT NULL,
  `purchase_price` int(50) NOT NULL,
  `date_of_purchase` datetime NOT NULL,
  `cnic_front_pic` varchar(200) NOT NULL,
  `cnic_back_pic` varchar(200) NOT NULL,
  `cell_phone_front_pic` varchar(200) NOT NULL,
  `cell_phone_back_pic` varchar(200) NOT NULL,
  `cell_phone_brand` enum('samsung','nokia') NOT NULL,
  `cell_phone_model` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_sale`
--

CREATE TABLE `new_sale` (
  `sale_id` int(30) NOT NULL,
  `IMEI` int(15) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_contact_no` int(13) NOT NULL,
  `date_of_sale` datetime NOT NULL,
  `cell_phone_brand` enum('nokia','samsung') NOT NULL,
  `cell_phone_model` varchar(32) NOT NULL,
  `sale_price` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2bAOU-NgJSDsEjKHAtsy8xcy99W6Cs6H', '$2y$13$SY.K0oT.j1yxr78zZFG.huItVfSgOVSQH4a7329VICQwWE99W//HG', NULL, 'admin@gmail.com', 10, 1529752335, 1529752335),
(2, 'dexdevs', 'qfBInMrYnQSE16Nwqrp19vGPrgAVLO76', '$2y$13$huMOAT2eUTiTnxw/LqgP3uRjeguzzzyFSPJJZfsVYSeXJyrEqtKBW', NULL, 'dexdevs@gmail.com', 10, 1529766003, 1529766003),
(3, 'asad', '38IwXK71lbGj0TgjuVak9QJAQC8Uek66', '$2y$13$ixgCvCq1yBX0PMMFsArRo.MBhrMR3.AN5ugU58Hy92641jge6Np7y', NULL, 'asad@gmail.com', 10, 1529928740, 1529928740);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_setup`
--
ALTER TABLE `company_setup`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `new_purchase`
--
ALTER TABLE `new_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `new_sale`
--
ALTER TABLE `new_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_setup`
--
ALTER TABLE `company_setup`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `purchase_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_sale`
--
ALTER TABLE `new_sale`
  MODIFY `sale_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
