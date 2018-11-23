-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 10:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `balance_sheet`
--

CREATE TABLE `balance_sheet` (
  `bal_sheet_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total_income` double NOT NULL,
  `total_expense` double NOT NULL,
  `current_balance` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance_sheet`
--

INSERT INTO `balance_sheet` (`bal_sheet_id`, `user_name`, `password`, `date`, `total_income`, `total_expense`, `current_balance`, `status`) VALUES
(17, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(18, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(19, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(20, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(21, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(22, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(23, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(24, 'admin', 'admin123', '2018-11-14', 30000, 34000, -4000, 'Loss'),
(25, 'admin', 'admin123', '2018-11-15', 56500, 43000, 13500, 'Profit');

-- --------------------------------------------------------

--
-- Table structure for table `company_setup`
--

CREATE TABLE `company_setup` (
  `company_id` int(15) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
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
(9, 'Hafiz Mobiles', 'Hafiz Zeeshan Ali', '+92-331-7548107', 'Railway Road', 'uploads/Hafiz Mobiles_photo.jpg', '2018-11-14 09:49:00', '2018-11-14 05:11:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(15) NOT NULL,
  `purchase_id` int(11) NOT NULL,
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

INSERT INTO `expense` (`expense_id`, `purchase_id`, `date`, `expense_name`, `amount`, `total_amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, '2018-11-14 10:04:15', 'samsung Gallaxy3', 12000, 12000, '2018-11-14 05:37:33', '0000-00-00 00:00:00', 1, 0),
(2, 4, '2018-11-14 10:34:24', 'samsung Gallaxy2', 10000, 22000, '2018-11-14 05:37:45', '0000-00-00 00:00:00', 1, 0),
(3, 7, '2018-11-14 10:45:23', 'nokia Nokia4', 12000, 34000, '2018-11-14 05:47:19', '0000-00-00 00:00:00', 1, 0),
(4, 8, '2018-11-15 02:15:32', 'samsung Gallaxy4', 9000, 43000, '2018-11-15 09:20:20', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(15) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `income_name` varchar(30) NOT NULL,
  `amount` int(15) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `sale_id`, `date`, `income_name`, `amount`, `total_amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, 28, '2018-11-14 10:40:55', 'samsung Gallaxy3', 15000, 15000, '2018-11-14 05:59:08', '0000-00-00 00:00:00', 1, 0),
(8, 29, '2018-11-14 10:53:36', 'samsung Gallaxy2', 15000, 30000, '2018-11-14 05:59:14', '0000-00-00 00:00:00', 1, 0),
(9, 30, '2018-11-14 01:50:46', 'nokia Nokia4', 14500, 44500, '2018-11-14 08:50:48', '0000-00-00 00:00:00', 1, 0),
(10, 31, '2018-11-15 02:24:27', 'samsung Gallaxy2', 12000, 56500, '2018-11-15 09:24:31', '0000-00-00 00:00:00', 1, 0);

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
  `IMEI` varchar(15) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `seller_contact_no` varchar(15) NOT NULL,
  `purchase_price` int(50) NOT NULL,
  `date_of_purchase` datetime NOT NULL,
  `cnic_front_pic` varchar(200) NOT NULL,
  `cnic_back_pic` varchar(200) NOT NULL,
  `cell_phone_front_pic` varchar(200) NOT NULL,
  `cell_phone_back_pic` varchar(200) NOT NULL,
  `cell_phone_brand` enum('samsung','nokia') NOT NULL,
  `cell_phone_model` varchar(64) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(15) NOT NULL,
  `updated_by` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_purchase`
--

INSERT INTO `new_purchase` (`purchase_id`, `IMEI`, `seller_name`, `seller_contact_no`, `purchase_price`, `date_of_purchase`, `cnic_front_pic`, `cnic_back_pic`, `cell_phone_front_pic`, `cell_phone_back_pic`, `cell_phone_brand`, `cell_phone_model`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, '123456789876544', 'Qasim Khan', '+12-345-6788765', 12000, '2018-11-14 10:04:15', 'uploads/Qasim Khan_CnicFrontPic.jpg', 'uploads/Qasim Khan_CnicBackPic.jpg', 'uploads/Qasim Khan_CellFrontPic.jpg', 'uploads/Qasim Khan_CellBackPic.jpg', 'samsung', 'Gallaxy3', 'Inactive', '2018-11-14 05:43:07', '0000-00-00 00:00:00', 1, 0),
(4, '345678990098765', 'Sajid', '+34-567-8909876', 10000, '2018-11-14 10:34:24', 'uploads/Sajid_CnicFrontPic.jpg', 'uploads/Sajid_CnicBackPic.jpg', 'uploads/Sajid_CellFrontPic.jpg', 'uploads/Sajid_CellBackPic.jpg', 'samsung', 'Gallaxy2', 'Inactive', '2018-11-15 09:29:11', '0000-00-00 00:00:00', 1, 0),
(7, '567890432156748', 'Rehan', '+92-300-7890987', 12000, '2018-11-14 10:45:23', 'uploads/Rehan_CnicFrontPic.jpg', 'uploads/Rehan_CnicBackPic.jpg', 'uploads/Rehan_CellFrontPic.jpg', 'uploads/Rehan_CellBackPic.jpg', 'nokia', 'Nokia4', 'Active', '2018-11-14 05:47:19', '0000-00-00 00:00:00', 1, 0),
(8, '567890098764385', 'Rehan', '+92-333-5367788', 9000, '2018-11-15 02:15:32', 'uploads/Rehan_CnicFrontPic.jpg', 'uploads/Rehan_CnicBackPic.jpg', 'uploads/Rehan_CellFrontPic.jpg', 'uploads/Rehan_CellBackPic.jpg', 'samsung', 'Gallaxy4', 'Active', '2018-11-15 09:20:20', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_sale`
--

CREATE TABLE `new_sale` (
  `sale_id` int(30) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_contact_no` varchar(15) NOT NULL,
  `date_of_sale` datetime NOT NULL,
  `cell_phone_brand` enum('nokia','samsung') NOT NULL,
  `cell_phone_model` varchar(32) NOT NULL,
  `sale_price` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_sale`
--

INSERT INTO `new_sale` (`sale_id`, `purchase_id`, `customer_name`, `customer_contact_no`, `date_of_sale`, `cell_phone_brand`, `cell_phone_model`, `sale_price`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(28, 3, 'Zeeshan Qamar', '+92-334-5678876', '2018-11-14 10:40:55', 'samsung', 'Gallaxy3', 15000, '2018-11-14 05:41:08', '0000-00-00 00:00:00', 1, 0),
(29, 4, 'Sajeel', '+92-305-7000526', '2018-11-14 10:53:36', 'samsung', 'Gallaxy2', 15000, '2018-11-14 05:53:40', '0000-00-00 00:00:00', 1, 0),
(30, 7, 'Ali', '+45-678-9009876', '2018-11-14 01:50:46', 'nokia', 'Nokia4', 14500, '2018-11-14 08:50:48', '0000-00-00 00:00:00', 1, 0),
(31, 4, 'Talha', '+92-123-4567890', '2018-11-15 02:24:27', 'samsung', 'Gallaxy2', 12000, '2018-11-15 09:24:31', '0000-00-00 00:00:00', 1, 0);

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
(3, 'asad', '38IwXK71lbGj0TgjuVak9QJAQC8Uek66', '$2y$13$ixgCvCq1yBX0PMMFsArRo.MBhrMR3.AN5ugU58Hy92641jge6Np7y', NULL, 'asad@gmail.com', 10, 1529928740, 1529928740),
(4, 'dexdev', 'd_2lQMczWA2StZV-TxIB4Q3bdvROopUp', '$2y$13$hiQgzNg6Sj5vSNGnp7DkWOmbxddNVjDWxSigwN20z43w.8fTXtfaW', NULL, 'dexdev@gmail.com', 10, 1531918852, 1531918852),
(5, 'hello', 'MwB3iA7mO7cvEae3LL_TdDQlgMwPpGTT', '$2y$13$3W0zvvM9NgYKXr5loYhDm.A2MiN4ZdaYtFxhe7CFaGZ5GhTYN4y.u', NULL, 'hello@gmail.com', 10, 1541438432, 1541438432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance_sheet`
--
ALTER TABLE `balance_sheet`
  ADD PRIMARY KEY (`bal_sheet_id`);

--
-- Indexes for table `company_setup`
--
ALTER TABLE `company_setup`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `expense_ibfk_1` (`purchase_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `sale_id` (`sale_id`);

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
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `purchase_id` (`purchase_id`);

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
-- AUTO_INCREMENT for table `balance_sheet`
--
ALTER TABLE `balance_sheet`
  MODIFY `bal_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `company_setup`
--
ALTER TABLE `company_setup`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `purchase_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_sale`
--
ALTER TABLE `new_sale`
  MODIFY `sale_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `new_purchase` (`purchase_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `new_sale` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `new_sale`
--
ALTER TABLE `new_sale`
  ADD CONSTRAINT `new_sale_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `new_purchase` (`purchase_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
