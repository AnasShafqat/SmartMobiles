-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 08:10 AM
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
(25, 'admin', 'admin123', '2018-11-15', 56500, 43000, 13500, 'Profit'),
(26, 'admin', 'admin123', '2018-11-15', 56500, 53000, 3500, 'Profit'),
(27, 'admin', 'admin123', '2018-11-16', 71900, 53650, 18250, 'Profit'),
(28, 'admin', 'admin123', '2018-11-17', 45000, 53380, -8380, 'Loss'),
(29, 'Anas', 'anas123', '2018-11-22', 45000, 53400, -8400, 'Loss'),
(30, 'Anas', 'anas123', '2018-11-22', 46000, 56400, -10400, 'Loss'),
(31, 'Anas', 'anas123', '2018-11-22', 46000, 56400, -10400, 'Loss'),
(32, 'Anas', 'anas123', '2018-11-22', 46000, 68400, -22400, 'Loss'),
(33, 'Anas', 'anas123', '2018-11-26', 61000, 79400, -18400, 'Loss'),
(34, 'Anas', 'anas123', '2018-11-26', 108000, 138400, -30400, 'Loss'),
(35, 'Anas', 'anas123', '2018-11-26', 108000, 138400, -30400, 'Loss'),
(36, 'admin', 'admin123', '2018-11-30', 216000, 231400, -15400, 'Loss'),
(37, 'admin', 'admin123', '2018-11-30', 107000, 88400, 18600, 'Profit'),
(41, 'admin', 'admin123', '2018-11-30', 121000, 121400, -400, 'Loss'),
(42, 'admin', 'admin123', '2018-11-30', 121000, 101400, 19600, 'Profit'),
(43, 'admin', 'admin123', '2018-11-30', 107000, 101400, 5600, 'Profit'),
(44, 'admin', 'admin123', '2018-11-30', 107000, 101400, 5600, 'Profit');

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
(4, 8, '2018-11-15 02:15:32', 'samsung Gallaxy4', 9000, 43000, '2018-11-15 09:20:20', '0000-00-00 00:00:00', 1, 0),
(6, 9, '2018-11-15 03:58:35', 'Oppo Oppo3', 10000, 53000, '2018-11-15 10:58:57', '0000-00-00 00:00:00', 1, 0),
(15, 11, '2018-11-16 01:34:47', 'Refreshment', 250, 53250, '2018-11-16 08:37:30', '2018-11-16 08:37:30', 1, 1),
(16, 11, '2018-11-17 12:29:24', 'Refreshment', 150, 53400, '2018-11-22 05:12:19', '2018-11-22 05:12:19', 1, 6),
(17, 12, '2018-11-22 10:44:56', 'Samsung Gallaxy2', 12000, 65400, '2018-11-30 05:28:18', '2018-11-22 08:56:08', 6, 6),
(18, 13, '2018-11-22 04:58:56', 'Microsoft X9', 11000, 76400, '2018-11-30 05:28:32', '2018-11-26 05:36:34', 6, 6),
(19, 14, '2018-11-26 10:58:41', 'Samsung Gallaxy2', 12000, 88400, '2018-11-30 06:21:28', '2018-11-30 05:58:54', 6, 1),
(20, 15, '2018-11-30 11:05:15', 'Huawei P8 Lite', 13000, 101400, '2018-11-30 06:21:44', '0000-00-00 00:00:00', 1, 0);

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
(13, 32, '2018-11-15 04:20:32', 'nokia Nokia4', 16000, 46000, '2018-11-22 08:53:13', '2018-11-22 08:28:48', 6, 6),
(14, 35, '2018-11-22 05:04:12', 'Microsoft X9', 15000, 61000, '2018-11-22 12:04:16', '0000-00-00 00:00:00', 6, 0),
(15, 36, '2018-11-26 10:37:26', 'Oppo Oppo3', 16000, 77000, '2018-11-26 05:37:28', '0000-00-00 00:00:00', 6, 0),
(16, 37, '2018-11-26 11:00:07', 'Huawei P7 Lite', 15000, 92000, '2018-11-26 06:00:08', '0000-00-00 00:00:00', 6, 0),
(18, 39, '2018-11-30 10:05:23', 'Samsung Gallaxy4', 15000, 107000, '2018-11-30 05:47:57', '2018-11-30 05:38:34', 1, 1);

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
  `cnic` varchar(15) NOT NULL,
  `seller_contact_no` varchar(15) NOT NULL,
  `purchase_price` int(50) NOT NULL,
  `date_of_purchase` datetime NOT NULL,
  `cnic_front_pic` varchar(200) NOT NULL,
  `cnic_back_pic` varchar(200) NOT NULL,
  `cell_phone_front_pic` varchar(200) NOT NULL,
  `cell_phone_back_pic` varchar(200) NOT NULL,
  `cell_phone_brand` enum('Samsung','Nokia','Oppo','Iphone','LG','Huawei','Q-Mobile','Blackberry','Motrolla','Voice','Vivo','HTC','Microsoft','Lenovo','G-Five','Infinix') NOT NULL,
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

INSERT INTO `new_purchase` (`purchase_id`, `IMEI`, `seller_name`, `cnic`, `seller_contact_no`, `purchase_price`, `date_of_purchase`, `cnic_front_pic`, `cnic_back_pic`, `cell_phone_front_pic`, `cell_phone_back_pic`, `cell_phone_brand`, `cell_phone_model`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, '123456789876544', 'Qasim Khan', '', '+92-345-6788765', 12000, '2018-11-14 10:04:15', 'uploads/Qasim Khan_CnicFrontPic.jpg', 'uploads/Qasim Khan_CnicBackPic.jpg', 'uploads/Qasim Khan_CellFrontPic.jpg', 'uploads/Qasim Khan_CellBackPic.jpg', 'Samsung', 'Gallaxy3', 'Inactive', '2018-11-30 05:58:30', '2018-11-30 05:58:30', 1, 1),
(4, '345678990098765', 'Sajid', '', '+92-331-8909876', 10000, '2018-11-14 10:34:24', 'uploads/Sajid_CnicFrontPic.jpg', 'uploads/Sajid_CnicBackPic.jpg', 'uploads/Sajid_CellFrontPic.jpg', 'uploads/Sajid_CellBackPic.jpg', 'Samsung', 'Gallaxy2', 'Inactive', '2018-11-30 05:58:54', '2018-11-30 05:58:54', 1, 1),
(7, '567890432156748', 'Rehan', '', '+92-300-7890987', 12000, '2018-11-14 10:45:23', 'uploads/Rehan_CnicFrontPic.jpg', 'uploads/Rehan_CnicBackPic.jpg', 'uploads/Rehan_CellFrontPic.jpg', 'uploads/Rehan_CellBackPic.jpg', 'Nokia', 'Nokia4', 'Inactive', '2018-11-30 05:14:05', '2018-11-30 05:14:05', 1, 1),
(8, '567890098764385', 'Rehan', '', '+92-333-5367788', 9000, '2018-11-15 02:15:32', 'uploads/Rehan_CnicFrontPic.jpg', 'uploads/Rehan_CnicBackPic.jpg', 'uploads/Rehan_CellFrontPic.jpg', 'uploads/Rehan_CellBackPic.jpg', 'Samsung', 'Gallaxy4', 'Inactive', '2018-11-30 05:57:46', '0000-00-00 00:00:00', 1, 0),
(9, '987654321234567', 'Zia Ali', '', '+92-332-7654322', 10000, '2018-11-15 03:58:35', '0', '0', '0', '0', 'Oppo', 'Oppo3', 'Inactive', '2018-11-30 05:40:57', '2018-11-30 05:40:57', 1, 1),
(11, '', 'General Expense', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', 'Inactive', '2018-11-30 05:57:46', '0000-00-00 00:00:00', 0, 0),
(12, '987654321123456', 'Farooq Haider', '', '+92-321-4567891', 12000, '2018-11-22 10:44:56', 'uploads/Farooq Haider_CnicFrontPic.jpg', 'uploads/Farooq Haider_CnicBackPic.jpg', 'uploads/Farooq Haider_CellFrontPic.jpg', 'uploads/Farooq Haider_CellBackPic.jpg', 'Huawei', 'P9 Lite', 'Inactive', '2018-11-30 05:18:34', '2018-11-30 05:18:34', 6, 1),
(13, '675324672345678', 'Zia Ali', '', '+92-333-4567890', 11000, '2018-11-22 04:58:56', 'uploads/Zia Ali_CnicFrontPic.jpg', 'uploads/Zia Ali_CnicBackPic.jpg', 'uploads/Zia Ali_CellFrontPic.jpg', 'uploads/Zia Ali_CellBackPic.jpg', 'Microsoft', 'X9', 'Inactive', '2018-11-30 05:38:41', '2018-11-30 05:38:41', 6, 1),
(14, '345677654334567', 'Zeeshan Ali', '', '+92-332-4568987', 12000, '2018-11-26 10:58:41', 'uploads/Zeeshan Ali_CnicFrontPic.jpg', 'uploads/Zeeshan Ali_CnicBackPic.jpg', 'uploads/Zeeshan Ali_CellFrontPic.jpg', 'uploads/Zeeshan Ali_CellBackPic.jpg', 'Huawei', 'P7 Lite', 'Inactive', '2018-11-26 06:07:52', '2018-11-26 06:07:52', 6, 6),
(15, '768234567654334', 'Akthar Malik', '31303-1234567-7', '+92-334-8765434', 13000, '2018-11-30 11:05:15', '0', '0', '0', '0', 'Huawei', 'P8 Lite', 'Active', '2018-11-30 06:05:50', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_sale`
--

CREATE TABLE `new_sale` (
  `sale_id` int(30) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `customer_contact_no` varchar(15) NOT NULL,
  `date_of_sale` datetime NOT NULL,
  `cell_phone_brand` varchar(64) NOT NULL,
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

INSERT INTO `new_sale` (`sale_id`, `purchase_id`, `customer_name`, `cnic`, `customer_contact_no`, `date_of_sale`, `cell_phone_brand`, `cell_phone_model`, `sale_price`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(28, 3, 'Zeeshan Qamar', '31303-3456787-6', '+92-334-5678876', '2018-11-14 10:40:55', 'samsung', 'Gallaxy3', 15000, '2018-11-30 05:12:04', '2018-11-30 05:12:04', 1, 1),
(29, 4, 'Sajeel', '31303-3456798-0', '+92-305-7000526', '2018-11-14 10:53:36', 'samsung', 'Gallaxy2', 15000, '2018-11-30 05:13:09', '2018-11-30 05:13:09', 1, 1),
(32, 7, 'Hamza', '31303-2345687-6', '+92-333-2345678', '2018-11-15 04:20:32', 'nokia', 'Nokia4', 16000, '2018-11-30 05:13:51', '2018-11-30 05:13:51', 6, 1),
(34, 3, '', '', '', '0000-00-00 00:00:00', '', '', 0, '2018-11-16 08:38:47', '0000-00-00 00:00:00', 0, 0),
(35, 13, 'M. Talha', '31303-8765432-2', '+92-333-2456909', '2018-11-22 05:04:12', 'Microsoft', 'X9', 15000, '2018-11-30 05:38:34', '2018-11-30 05:38:34', 6, 1),
(36, 9, 'Zain Mumtaz', '31303-3356787-6', '+92-332-4567892', '2018-11-26 10:37:26', 'Oppo', 'Oppo3', 16000, '2018-11-30 05:16:13', '2018-11-30 05:16:13', 6, 1),
(37, 12, 'Qasim Khan', '31303-8765412-3', '+92-334-5098765', '2018-11-26 11:00:07', 'Huawei', 'P9 Lite', 15000, '2018-11-30 05:18:20', '2018-11-30 05:18:20', 6, 1),
(39, 8, 'M. Ramzan Ali', '31303-2345678-7', '+92-334-7667689', '2018-11-30 10:05:23', 'Samsung', 'Gallaxy4', 15000, '2018-11-30 05:05:25', '0000-00-00 00:00:00', 1, 0),
(40, 8, 'Adnan Ali', '31303-7654312-3', '+92-334-7864457', '2018-11-30 10:57:16', 'Samsung', 'Gallaxy4', 14000, '2018-11-30 05:57:17', '0000-00-00 00:00:00', 1, 0);

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
(5, 'hello', 'MwB3iA7mO7cvEae3LL_TdDQlgMwPpGTT', '$2y$13$3W0zvvM9NgYKXr5loYhDm.A2MiN4ZdaYtFxhe7CFaGZ5GhTYN4y.u', NULL, 'hello@gmail.com', 10, 1541438432, 1541438432),
(6, 'Anas', 'ddbxTToNW2biLl-hppgKe5BF8JMXbdho', '$2y$13$7dzRufSWHOjWeQITHcCk7OX9PejKBMyw.uLnDZrT.EygFlO27h05m', NULL, 'anas@gmail.com', 10, 1542280721, 1542280721);

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
  MODIFY `bal_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `company_setup`
--
ALTER TABLE `company_setup`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `purchase_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `new_sale`
--
ALTER TABLE `new_sale`
  MODIFY `sale_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
