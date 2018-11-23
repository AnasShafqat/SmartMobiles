-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 01:50 PM
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
(1, '', '', '2018-12-03', 100, 50, 50, '+ve'),
(2, 'gullaniqa@gmail.com', 'aniqa12', '2018-06-28', 80000, 765, 79235, '-ve'),
(3, 'gullaniqa@gmail.com', 'aniqa12', '2018-06-28', 80000, 765, 79235, '+ve'),
(4, 'gullaniqa@gmail.com', 'aniqa12', '2018-06-28', 82456, 1169, 81287, '+ve');

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
(1, 'pqr', 'Ali', 3456789, 'jhgcghjklk', 'uploads/abc_photo.jpg', '2018-06-25 12:29:09', '2018-06-24 21:06:09', 2, 3),
(2, 'sdfghj', 'dfghjk', 3456789, 'jhgcghjklk', 'uploads/sdfghj_photo.jpg', '2018-06-27 16:33:24', '2018-06-27 16:33:24', 3, 0),
(3, 'abc', 'dfghjk', 12, 'jhgcghjklk', 'uploads/abc_photo.jpg', '2018-06-28 11:18:45', '2018-06-28 11:18:45', 3, 0),
(4, 'xyz', 'dfghjk92', 23, 'kghjb', 'uploads/xyz_photo.jpg', '2018-06-30 08:26:04', '2018-06-30 05:06:04', 3, 3);

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
(1, '2018-06-23 00:00:00', 'Purchase Cold Drink', 65, 65, '2018-06-23 13:37:56', '2018-06-23 13:37:56', 1, 1),
(2, '2018-06-27 02:11:20', 'xyz', 100, 165, '2018-06-27 09:11:37', '2018-06-27 09:11:37', 3, 0),
(3, '2018-06-28 06:10:43', 'abc', 150, 315, '2018-06-27 09:14:41', '2018-06-27 09:14:04', 3, 3),
(4, '2018-06-27 06:36:31', 'dfgh', 200, 515, '2018-06-27 13:36:45', '2018-06-27 13:36:45', 3, 0),
(5, '2018-06-28 06:54:47', 'abc', 250, 765, '2018-06-28 13:55:11', '2018-06-28 13:55:11', 3, 0),
(6, '2018-06-28 07:31:47', 'dfgh', 404, 1169, '2018-06-28 14:31:51', '2018-06-28 14:31:51', 3, 0);

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

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `date`, `income_name`, `amount`, `total_amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2018-06-19 00:00:00', 'fghjkl', 10000, 10000, '2018-06-26 20:14:57', '0000-00-00 00:00:00', 2, 2),
(7, '2018-06-27 01:26:12', 'ertyuioijhbv', 30000, 40000, '2018-06-27 08:56:33', '2018-06-27 08:26:53', 3, 3),
(9, '2018-06-27 01:57:05', 'ertyuioijhbv', 40000, 80000, '2018-06-27 09:04:53', '2018-06-27 08:57:18', 3, 3),
(10, '2018-06-28 07:31:03', 'lkjhgfd', 2456, 82456, '2018-06-28 14:31:15', '2018-06-28 14:31:15', 3, 0);

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

--
-- Dumping data for table `new_purchase`
--

INSERT INTO `new_purchase` (`purchase_id`, `IMEI`, `seller_name`, `seller_contact_no`, `purchase_price`, `date_of_purchase`, `cnic_front_pic`, `cnic_back_pic`, `cell_phone_front_pic`, `cell_phone_back_pic`, `cell_phone_brand`, `cell_phone_model`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2345678, 'Anas', 3456789, 456789987, '2018-06-27 09:29:19', 'uploads/Anas_CnicFrontPic.jpg', 'uploads/Anas_CnicBackPic.jpg', 'uploads/Anas_CellFrontPic.jpg', 'uploads/Anas_CellBackPic.jpg', 'samsung', '345678', '2018-06-30 08:28:06', '2018-06-30 05:06:06', 3, 3),
(2, 2345678, 'xcvbhjkk', 3456789, 23456789, '2018-06-28 03:42:54', 'uploads/xcvbhjkk_CnicFrontPic.jpg', 'uploads/xcvbhjkk_CnicBackPic.jpg', 'uploads/xcvbhjkk_CellFrontPic.jpg', 'uploads/xcvbhjkk_CellBackPic.jpg', 'samsung', '345678', '2018-06-28 07:06:11', '2018-06-28 10:44:11', 3, 0),
(3, 2345678, 'Asad', 3456789, 23456789, '2018-06-28 04:49:23', 'uploads/Asad_CnicFrontPic.jpg', 'uploads/Asad_CnicBackPic.jpg', 'uploads/Asad_CellFrontPic.jpg', 'uploads/Asad_CellBackPic.jpg', 'samsung', '345678', '2018-06-27 20:06:00', '2018-06-28 11:50:00', 3, 0);

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
-- AUTO_INCREMENT for table `balance_sheet`
--
ALTER TABLE `balance_sheet`
  MODIFY `bal_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_setup`
--
ALTER TABLE `company_setup`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `purchase_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
