-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 06:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdelivarymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_summaries`
--

CREATE TABLE `account_summaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paidAmount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doAmount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_summaries`
--

INSERT INTO `account_summaries` (`id`, `dealerId`, `date`, `invoiceNo`, `paymentNo`, `paidAmount`, `doAmount`, `balance`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-10-12', NULL, 'DP10122003', '100000', NULL, '100000', '2019-10-12 05:40:11', '2019-10-12 05:40:11'),
(2, 4, '2019-10-12', 'DI1012011', NULL, NULL, NULL, '0', '2019-10-12 05:54:24', '2019-10-12 05:54:24'),
(3, 6, '2019-10-12', NULL, 'DP10122004', '100000', NULL, '100000', '2019-10-12 06:17:35', '2019-10-12 06:17:35'),
(4, 6, '2019-10-12', 'DI10122012', NULL, '6606.60', NULL, '-6606.6', '2019-10-12 06:19:25', '2019-10-12 06:19:25'),
(5, 6, '2019-10-12', 'DI10122013', NULL, NULL, '6006.00', '0', '2019-10-12 06:34:09', '2019-10-12 06:34:09'),
(6, 6, '2019-10-12', 'DI10122014', NULL, NULL, '9009.00', NULL, '2019-10-12 06:41:12', '2019-10-12 06:41:12'),
(7, 6, '2019-10-12', NULL, 'DP10122005', '100000', NULL, '100000', '2019-10-12 06:46:30', '2019-10-12 06:46:30'),
(8, 6, '2019-10-12', NULL, 'DP10122006', '100000', NULL, '178378.4', '2019-10-12 07:42:55', '2019-10-12 07:42:55'),
(9, 6, '2019-10-12', NULL, 'DP10122007', '100000', NULL, NULL, '2019-10-12 07:46:20', '2019-10-12 07:46:20'),
(10, 6, '2019-10-12', NULL, 'DP10122008', '100000', NULL, '478378.4', '2019-10-12 07:50:39', '2019-10-12 07:50:39'),
(11, 6, '2019-10-12', 'DI10122015', NULL, NULL, '76030.00', '402348.4', '2019-10-12 07:55:45', '2019-10-12 07:55:45'),
(12, 6, '2019-10-12', 'DI10122016', NULL, NULL, '338500.00', '63848.40000000002', '2019-10-12 08:44:02', '2019-10-12 08:44:02'),
(13, 6, '2019-10-12', 'DI10122017', NULL, NULL, '63603.60', '244.8000000000029', '2019-10-12 08:51:38', '2019-10-12 08:51:38'),
(14, 7, '2019-10-12', NULL, 'DP10122009', '100000', NULL, '100000', '2019-10-12 09:12:23', '2019-10-12 09:12:23'),
(15, 7, '2019-10-12', 'DI10122018', NULL, NULL, '48618.60', '51381.4', '2019-10-12 09:14:35', '2019-10-12 09:14:35'),
(16, 7, '2019-10-12', 'DI10122019', NULL, NULL, '51220.00', '161.40000000000146', '2019-10-12 09:17:24', '2019-10-12 09:17:24'),
(17, 7, '2019-10-12', NULL, 'DP10122010', '50000', NULL, '46557.8', '2019-10-12 09:23:22', '2019-10-12 09:23:22'),
(18, 7, '2019-10-12', 'DI10122022', NULL, NULL, '3603.60', '3350.6', '2019-10-12 09:30:22', '2019-10-12 09:30:22'),
(19, 7, '2019-10-12', 'DI10122023', NULL, NULL, '3303.30', '47.29999999999973', '2019-10-12 09:31:46', '2019-10-12 09:31:46'),
(20, 7, '2019-10-12', NULL, 'DP10122011', '50000', NULL, '50047.3', '2019-10-12 09:52:44', '2019-10-12 09:52:44'),
(21, 7, '2019-10-12', 'DI10122024', NULL, NULL, '49233.60', '813.7', '2019-10-12 09:54:20', '2019-10-12 09:54:20'),
(22, 12, '2019-10-13', NULL, 'PAY10132012', '100000', NULL, '100000', '2019-10-13 05:44:41', '2019-10-13 05:44:41'),
(23, 12, '2019-10-13', 'INV10132025', NULL, NULL, '99863.00', '137', '2019-10-13 10:27:43', '2019-10-13 10:27:43'),
(24, 12, '2019-10-15', NULL, 'PAY10152013', '200000', NULL, '200137', '2019-10-15 06:15:54', '2019-10-15 06:15:54'),
(25, 12, '2019-10-15', 'INV10152026', NULL, NULL, '198051.00', '2086', '2019-10-15 06:19:17', '2019-10-15 06:19:17'),
(26, 13, '2019-10-15', NULL, 'PAY10152014', '100000', NULL, '100000', '2019-10-15 09:05:34', '2019-10-15 09:05:34'),
(27, 13, '2019-10-15', 'INV10152027', NULL, NULL, '71000.00', '29000', '2019-10-15 09:09:10', '2019-10-15 09:09:10'),
(29, 14, '2019-10-16', NULL, 'PAY10162015', '50000', NULL, '50000', '2019-10-16 05:02:49', '2019-10-16 05:02:49'),
(30, 13, '2019-10-16', NULL, 'PAY10162016', '20000', NULL, '22900', '2019-10-16 05:03:52', '2019-10-16 05:03:52'),
(31, 14, '2019-10-16', 'INV10162028', NULL, NULL, '47200.00', '2800', '2019-10-16 05:13:05', '2019-10-16 05:13:05'),
(32, 13, '2019-10-16', 'INV10162029', NULL, NULL, '13609.00', '9291', '2019-10-16 05:51:06', '2019-10-16 05:51:06'),
(33, 13, '2019-10-16', 'INV10162030', NULL, NULL, '4600.00', '4691', '2019-10-16 05:59:46', '2019-10-16 05:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `code`, `contact`, `address`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Ma Baba Traders', '34353', '1232324', 'Dhaka', 'Active', 131994.00, '2019-09-30 05:17:18', '2019-10-03 05:36:26'),
(2, 'Sm munna', '34234', '45345345', 'Dhaka', 'Active', 130492.50, '2019-10-01 09:05:19', '2019-10-05 04:07:43'),
(3, 'Karirm Traders', '34322', '45345345', 'Dhaka', 'Active', 51234.80, '2019-10-01 09:06:02', '2019-10-05 10:20:56'),
(4, 'Rahim Traders', '21232', '45345345', 'Dhaka', 'Active', 177609.30, '2019-10-01 09:06:26', '2019-10-12 05:54:24'),
(5, 'Mariam Interprice', '2026', '0198454545', 'Kasinathpor, pabna', 'Active', 205780.00, '2019-10-10 06:09:31', '2019-10-12 05:24:49'),
(6, 'Shakil', '1430', '91323234', 'Dhaka', 'Active', 244.80, '2019-10-12 06:17:00', '2019-10-12 08:51:38'),
(7, 'Johnson', '1212', '45345345346', 'Kasinathpor, pabna', 'Active', 813.70, '2019-10-12 09:11:29', '2019-10-12 09:54:20'),
(12, 'Mariam Interprice !!', '20264', '014355656', 'Dhaka', 'Active', 2086.00, '2019-10-13 04:53:42', '2019-10-15 06:19:17'),
(13, 'Akundo Enter', '420', '01840997215', 'Kasinathpor, pabna', 'Active', 4691.00, '2019-10-15 09:03:14', '2019-10-16 05:59:46'),
(14, 'Asman tradaers', '421', '01963317521', 'Dhaka', 'Active', 2800.00, '2019-10-15 10:29:39', '2019-10-16 05:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_balances`
--

CREATE TABLE `dealer_balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_balance_records`
--

CREATE TABLE `dealer_balance_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `paymentNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealer_balance_records`
--

INSERT INTO `dealer_balance_records` (`id`, `dealerId`, `paymentNo`, `type`, `accountNo`, `bankName`, `amount`, `date`, `status`, `comment`, `userName`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Bank', '332314345', 'Islami Bank', 150000, '2019-09-30', 'Paid', 'Thank You', 'SGFL', '2019-09-30 05:18:04', '2019-09-30 05:18:04'),
(2, 4, NULL, 'Bank', '343543454', 'Dhaka Bank', 100000, '2019-10-01', 'Paid', 'Thank You', 'SGFL', '2019-10-01 09:06:59', '2019-10-01 09:06:59'),
(3, 3, NULL, 'Bank', '354354645', 'Islami Bank', 100000, '2019-10-01', 'Paid', 'Thank You', 'SGFL', '2019-10-01 09:07:47', '2019-10-01 09:07:47'),
(4, 2, NULL, 'Bank', '564534534', 'Dhaka Bank', 150000, '2019-09-30', 'Paid', 'Thank You', 'SGFL', '2019-10-01 09:08:29', '2019-10-01 09:08:29'),
(6, 3, NULL, 'Bank', '3242342345', 'Dhaka Bank', 100000, '2019-10-03', 'Paid', 'Thank You', 'SGFL', '2019-10-03 09:41:25', '2019-10-03 09:41:25'),
(7, 4, NULL, 'Bank', '1213435435', 'Islami Bank', 100000, '2019-10-05', 'Paid', 'Have a nice Day', 'SGFL', '2019-10-05 03:38:51', '2019-10-05 03:38:51'),
(8, 5, '10001', 'Bank', '20501130100451608', 'Islami Bank', 17280, '2019-10-09', 'Paid', 'Momo 50 ctn', 'SGFL', '2019-10-10 06:20:10', '2019-10-10 06:20:10'),
(9, 5, 'DP1012002', 'Bank', '123099234', '456456456', 200000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 05:24:49', '2019-10-12 05:24:49'),
(10, 4, 'DP10122003', 'Bank', '3984792374', 'Bangladesh Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 05:35:22', '2019-10-12 05:35:22'),
(11, 4, 'DP10122003', 'Bank', '3984792374', 'Bangladesh Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 05:40:11', '2019-10-12 05:40:11'),
(12, 6, 'DP10122004', 'Bank', '45345345435', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 06:17:35', '2019-10-12 06:17:35'),
(13, 6, 'DP10122005', 'Bank', '123234324', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 06:46:30', '2019-10-12 06:46:30'),
(14, 6, 'DP10122006', 'Bank', '354345345', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 07:42:55', '2019-10-12 07:42:55'),
(15, 6, 'DP10122007', 'Bank', '3423434', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 07:46:20', '2019-10-12 07:46:20'),
(16, 6, 'DP10122008', 'Bank', '3243523454', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checking', 'SGFL', '2019-10-12 07:50:39', '2019-10-12 07:50:39'),
(17, 7, 'DP10122009', 'Bank', '3423423423', 'Islami Bank', 100000, '2019-10-12', 'Paid', 'Checked', 'SGFL', '2019-10-12 09:12:23', '2019-10-12 09:12:23'),
(18, 7, 'DP10122010', 'Bank', '534545', 'Islami Bank', 50000, '2019-10-12', 'Paid', 'Drink100', 'SGFL', '2019-10-12 09:23:22', '2019-10-14 05:51:00'),
(19, 7, 'DP10122011', 'Bank', '34234324', 'Islami Bank', 50000, '2019-10-12', 'Paid', 'Momo200', 'SGFL', '2019-10-12 09:52:44', '2019-10-14 05:50:18'),
(20, 12, 'PAY10132012', 'Bank', '434354656767', 'Islami Bank', 100000, '2019-10-13', 'Paid', 'Momo 200', 'SGFL', '2019-10-13 05:44:41', '2019-10-13 05:44:41'),
(21, 12, 'PAY10152013', 'Bank', '43438473874834', 'Bangladesh Bank', 200000, '2019-10-15', 'Paid', 'momo200 drink100 chanachur200 chocomo100', 'SGFL', '2019-10-15 06:15:54', '2019-10-15 06:15:54'),
(22, 13, 'PAY10152014', 'Bank', '453546657657567', 'Islami Bank', 100000, '2019-10-15', 'Paid', 'momo50 chanachur 50', 'SGFL', '2019-10-15 09:05:34', '2019-10-15 09:05:34'),
(24, 14, 'PAY10162015', 'Bank', '42342343434', 'Islami Bank', 50000, '2019-10-16', 'Paid', 'momo 200, drink 100', 'SGFL', '2019-10-16 05:02:49', '2019-10-16 05:02:49'),
(25, 13, 'PAY10162016', 'Bank', '43534567645654', 'Islami Bank', 20000, '2019-10-16', 'Paid', 'Choco momo100 , drink 100', 'SGFL', '2019-10-16 05:03:52', '2019-10-16 05:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_invoices`
--

CREATE TABLE `dealer_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `orderId` int(10) UNSIGNED DEFAULT NULL,
  `invoiceNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `totalPrice` double(8,2) DEFAULT NULL,
  `remainUnit` int(11) DEFAULT NULL,
  `remainBalance` double(8,2) DEFAULT NULL,
  `grandTotalUnit` double(8,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truckNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverMobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealer_invoices`
--

INSERT INTO `dealer_invoices` (`id`, `dealerId`, `orderId`, `invoiceNo`, `date`, `totalPrice`, `remainUnit`, `remainBalance`, `grandTotalUnit`, `comment`, `truckNo`, `driverName`, `driverMobile`, `userName`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'SF20190930002', '2019-10-11', 18006.00, NULL, NULL, 40.00, 'Thank You', 'Ab343', 'Amir', '234334', 'SGFL', '2019-09-30 05:40:04', '2019-10-14 09:32:19'),
(3, 4, NULL, 'SF2019100130003', '2019-09-30', 57027.00, NULL, NULL, 142.00, 'Ok', 'Ab343', 'Kamal', '8394394', 'SGFL', '2019-10-01 09:10:37', '2019-10-14 09:31:56'),
(4, 3, NULL, 'SF2019100130004', '2019-10-14', 25735.20, NULL, NULL, 79.00, 'Ok', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-01 09:12:10', '2019-10-14 09:31:38'),
(5, 4, NULL, 'SF2019100230005', NULL, 9003.00, NULL, NULL, 22.00, 'Thank You', 'bg101', 'Mr Khan', '0183434545', 'SGFL', '2019-10-02 05:56:27', '2019-10-02 05:56:27'),
(6, 4, NULL, 'SF2019100230006', '2019-10-02', 11327.70, NULL, NULL, 34.00, 'Thank You', 'bg101', 'Mr Kader', '0183434545', 'SGFL', '2019-10-02 10:17:57', '2019-10-02 10:17:57'),
(10, 4, NULL, 'SF100330007', '2019-10-03', 35123.10, NULL, NULL, 100.00, 'Ok', 'bg101', 'Mr Khan', '0183434545', 'Moderator', '2019-10-03 10:14:42', '2019-10-03 10:14:42'),
(11, 2, NULL, 'SF100530008', '2019-10-05', 19507.50, NULL, NULL, 48.00, 'Invoice Munna', 'fg-454', 'Mr Brian', '0192434545', 'SGFL', '2019-10-05 04:07:43', '2019-10-05 04:07:43'),
(12, 3, NULL, 'SF100530009', '2019-06-10', 123030.00, NULL, NULL, 300.00, 'good day', 'ef4345', 'sadat', '354235346', 'Tahsan', '2019-10-05 10:20:56', '2019-10-05 10:20:56'),
(13, 5, NULL, 'SF1010010', '2019-10-10', 11500.00, NULL, NULL, 26.00, 'Product delivered', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-10 06:25:32', '2019-10-10 06:25:32'),
(14, 4, NULL, 'DI1012011', '2019-10-12', 9909.90, NULL, NULL, 35.00, 'Checking', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 05:54:24', '2019-10-12 05:54:24'),
(15, 6, NULL, 'DI10122012', '2019-10-12', 6606.60, NULL, NULL, 22.00, 'Checking', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 06:19:25', '2019-10-12 06:19:25'),
(16, 6, NULL, 'DI10122013', '2019-10-12', 6006.00, NULL, NULL, 22.00, 'Checking', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 06:34:09', '2019-10-12 06:34:09'),
(17, 6, NULL, 'DI10122014', '2019-10-12', 9009.00, NULL, NULL, 32.00, 'Checking', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 06:41:12', '2019-10-12 06:41:12'),
(18, 6, NULL, 'DI10122015', '2019-10-12', 76030.00, NULL, NULL, 202.00, 'Checking', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 07:55:45', '2019-10-12 07:55:45'),
(19, 6, NULL, 'DI10122016', '2019-10-12', 338500.00, NULL, NULL, 760.00, 'Checked', 'fb1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 08:44:02', '2019-10-12 08:44:02'),
(20, 6, NULL, 'DI10122017', '2019-10-12', 63603.60, NULL, NULL, 112.00, 'Clear', 'Ab343', 'Amir', '234334', 'SGFL', '2019-10-12 08:51:38', '2019-10-12 08:51:38'),
(21, 7, NULL, 'DI10122018', '2019-10-12', 48618.60, NULL, NULL, 112.00, 'Ok', 'to 1132', 'Amir', '234334', 'SGFL', '2019-10-12 09:14:35', '2019-10-12 09:14:35'),
(22, 7, NULL, 'DI10122019', '2019-10-12', 51220.00, NULL, NULL, 87.00, 'Ok', 'fb1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 09:17:24', '2019-10-12 09:17:24'),
(23, 7, NULL, 'DI10122020', '2019-10-12', 3603.60, NULL, NULL, 12.00, 'Thanks', 'Ab343', 'Amir', '234334', 'SGFL', '2019-10-12 09:21:19', '2019-10-14 09:31:14'),
(24, 7, NULL, 'DI10122021', '2019-10-12', 39603.60, NULL, NULL, 72.00, 'go', 'to 1132', 'Amir', '8394394', 'SGFL', '2019-10-12 09:24:40', '2019-10-14 09:30:57'),
(25, 7, NULL, 'DI10122022', '2019-10-12', 3603.60, NULL, NULL, 12.00, 'nice', 'fb1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 09:30:22', '2019-10-14 09:30:39'),
(26, 7, NULL, 'DI10122023', '2019-10-12', 3303.30, NULL, NULL, 11.00, 'Retrieving', 'Ab343', 'Kamal', '234334', 'SGFL', '2019-10-12 09:31:46', '2019-10-14 09:29:54'),
(27, 7, NULL, 'DI10122024', '2019-10-12', 49233.60, NULL, NULL, 138.00, 'Ok', 'to 1132', 'Kamal', '8394394', 'SGFL', '2019-10-12 09:54:20', '2019-10-14 07:08:01'),
(28, 12, NULL, 'INV10132025', '2019-10-13', 99863.00, NULL, NULL, 294.00, 'Date range is not working', 'Ab343', 'Amir', '8394394', 'SGFL', '2019-10-13 10:27:43', '2019-10-13 10:27:43'),
(29, 12, NULL, 'INV10152026', '2019-10-15', 198051.00, NULL, NULL, 454.00, 'Thank You', 'at4839', 'jamal', '546457645', 'SGFL', '2019-10-15 06:19:17', '2019-10-15 06:19:17'),
(30, 13, NULL, 'INV10152027', '2019-10-15', 71000.00, NULL, NULL, 80.00, 'Thank you', 'at4839', 'Kamal', '8394394', 'SGFL', '2019-10-15 09:09:10', '2019-10-15 09:09:10'),
(31, 14, NULL, 'INV10162028', '2019-10-16', 47200.00, NULL, NULL, 97.00, 'momo70,drink25', 'bg321', 'elexis', '63453956234', 'SGFL', '2019-10-16 05:13:05', '2019-10-16 05:13:05'),
(32, 13, NULL, 'INV10162029', '2019-10-16', 13609.00, NULL, 9291.00, 42.00, 'chocolate30,momo10', 'bg321', 'Amir', '12345678909', 'SGFL', '2019-10-16 05:51:06', '2019-10-16 05:51:06'),
(33, 13, NULL, 'INV10162030', '2019-10-16', 4600.00, NULL, 4691.00, 11.00, 'momo10', 'at4839', 'Kamal', '12345678909', 'SGFL', '2019-10-16 05:59:46', '2019-10-16 05:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_invoice_details`
--

CREATE TABLE `dealer_invoice_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerInvoiceId` int(10) UNSIGNED DEFAULT NULL,
  `productId` int(10) UNSIGNED DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `invoiceUnit` int(11) DEFAULT NULL,
  `freeUnit` int(11) DEFAULT NULL,
  `totalUnit` int(11) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealer_invoice_details`
--

INSERT INTO `dealer_invoice_details` (`id`, `dealerInvoiceId`, `productId`, `product`, `price`, `invoiceUnit`, `freeUnit`, `totalUnit`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'Toast', 600.00, 20, NULL, 20, 12000.00, NULL, NULL),
(2, 2, NULL, 'Choco Momo', 300.30, 20, NULL, 20, 6006.00, NULL, NULL),
(3, 3, NULL, 'Toast', 600.00, 50, 1, 51, 30000.00, NULL, NULL),
(4, 3, NULL, 'Chocolate', 300.30, 50, 1, 51, 15015.00, NULL, NULL),
(5, 3, NULL, 'Choco Momo', 300.30, 40, NULL, 40, 12012.00, NULL, NULL),
(6, 4, NULL, 'Choco Momo', 300.30, 34, NULL, 34, 10210.20, NULL, NULL),
(7, 4, NULL, 'Biscuit', 345.00, 45, NULL, 45, 15525.00, NULL, NULL),
(8, 5, NULL, 'Toast', 600.00, 10, 1, 11, 6000.00, NULL, NULL),
(9, 5, NULL, 'Choco Momo', 300.30, 10, 1, 11, 3003.00, NULL, NULL),
(10, 6, NULL, 'Choco Momo', 300.30, 5, 1, 6, 1501.50, NULL, NULL),
(11, 6, NULL, 'Toast', 600.00, 5, 2, 7, 3000.00, NULL, NULL),
(12, 6, NULL, 'Chocolate', 300.30, 4, 1, 5, 1201.20, NULL, NULL),
(13, 6, NULL, 'Momo', 330.00, 3, 2, 5, 990.00, NULL, NULL),
(14, 6, NULL, 'Biscuit', 345.00, 3, 1, 4, 1035.00, NULL, NULL),
(15, 6, NULL, 'Drink', 600.00, 6, 1, 7, 3600.00, NULL, NULL),
(18, 10, NULL, 'Toast', 600.00, 20, 1, 21, 12000.00, NULL, NULL),
(19, 10, NULL, 'Choco Momo', 300.30, 43, 1, 44, 12912.90, NULL, NULL),
(20, 10, NULL, 'Chocolate', 300.30, 34, 1, 35, 10210.20, NULL, NULL),
(21, 11, NULL, 'Toast', 600.00, 20, 1, 21, 12000.00, NULL, NULL),
(22, 11, NULL, 'Choco Momo', 300.30, 25, 2, 27, 7507.50, NULL, NULL),
(23, 12, NULL, 'Toast', 600.00, 100, NULL, 100, 60000.00, NULL, NULL),
(24, 12, NULL, 'Momo', 330.00, 100, NULL, 100, 33000.00, NULL, NULL),
(25, 12, NULL, 'Choco Momo', 300.30, 100, NULL, 100, 30030.00, NULL, NULL),
(26, 13, NULL, 'Momo', 460.00, 25, 1, 26, 11500.00, NULL, NULL),
(27, 14, NULL, 'Chocolate', 300.30, 22, 1, 23, 6606.60, NULL, NULL),
(28, 14, NULL, 'Choco Momo', 300.30, 11, 1, 12, 3303.30, NULL, NULL),
(29, 15, NULL, 'Chocolate', 300.30, 10, NULL, 10, 3003.00, NULL, NULL),
(30, 15, NULL, 'Chocolate', 300.30, 12, NULL, 12, 3603.60, NULL, NULL),
(31, 16, NULL, 'Choco Momo', 300.30, 10, 1, 11, 3003.00, NULL, NULL),
(32, 16, NULL, 'Chocolate', 300.30, 10, 1, 11, 3003.00, NULL, NULL),
(33, 17, NULL, 'Choco Momo', 300.30, 20, 1, 21, 6006.00, NULL, NULL),
(34, 17, NULL, 'Chocolate', 300.30, 10, 1, 11, 3003.00, NULL, NULL),
(35, 18, NULL, 'Choco Momo', 300.30, 100, 1, 101, 30030.00, NULL, NULL),
(36, 18, NULL, 'Momo', 460.00, 100, 1, 101, 46000.00, NULL, NULL),
(37, 19, NULL, 'Momo', 460.00, 250, 2, 252, 115000.00, NULL, NULL),
(38, 19, NULL, 'Biscuit', 345.00, 300, 3, 303, 103500.00, NULL, NULL),
(39, 19, NULL, 'Drink', 600.00, 200, 5, 205, 120000.00, NULL, NULL),
(40, 20, NULL, 'Choco Momo', 300.30, 12, NULL, 12, 3603.60, NULL, NULL),
(41, 20, NULL, 'Drink', 600.00, 100, NULL, 100, 60000.00, NULL, NULL),
(42, 21, NULL, 'Choco Momo', 300.30, 12, NULL, 12, 3603.60, NULL, NULL),
(43, 21, NULL, 'Drink', 600.00, 50, NULL, 50, 30000.00, NULL, NULL),
(44, 21, NULL, 'Chocolate', 300.30, 50, NULL, 50, 15015.00, NULL, NULL),
(45, 22, NULL, 'Drink', 600.00, 80, NULL, 80, 48000.00, NULL, NULL),
(46, 22, NULL, 'Momo', 460.00, 7, NULL, 7, 3220.00, NULL, NULL),
(47, 25, NULL, 'Choco Momo', 300.30, 12, NULL, 12, 3603.60, NULL, NULL),
(48, 26, NULL, 'Choco Momo', 300.30, 9, NULL, 9, 2702.70, NULL, NULL),
(49, 26, NULL, 'Chocolate', 300.30, 2, NULL, 2, 600.60, NULL, NULL),
(50, 26, NULL, 'Drink', 600.00, NULL, NULL, 0, 0.00, NULL, NULL),
(51, 27, NULL, 'Choco Momo', 300.30, 12, NULL, 12, 3603.60, NULL, NULL),
(52, 27, NULL, 'Chocolate', 300.30, 100, NULL, 100, 30030.00, NULL, NULL),
(53, 27, NULL, 'Drink', 600.00, 26, NULL, 26, 15600.00, NULL, NULL),
(54, 28, NULL, 'Chocolate', 300.30, 180, 2, 182, 54054.00, NULL, NULL),
(55, 28, NULL, 'Momo', 460.00, 80, 1, 81, 36800.00, NULL, NULL),
(56, 28, NULL, 'Choco Momo', 300.30, 30, 1, 31, 9009.00, NULL, NULL),
(57, 29, NULL, 'Choco Momo', 300.30, 170, 2, 172, 51051.00, NULL, NULL),
(58, 29, NULL, 'Drink', 600.00, 130, 1, 131, 78000.00, NULL, NULL),
(59, 29, NULL, 'Momo', 460.00, 150, 1, 151, 69000.00, NULL, NULL),
(60, 30, NULL, 'Chanachur', 1600.00, 30, NULL, 30, 48000.00, NULL, NULL),
(61, 30, NULL, 'Momo', 460.00, 50, NULL, 50, 23000.00, NULL, NULL),
(62, 31, NULL, '5', 460.00, 70, 1, 71, 32200.00, NULL, NULL),
(63, 31, NULL, '4', 600.00, 25, 1, 26, 15000.00, NULL, NULL),
(64, 32, NULL, '3', 300.30, 30, 1, 31, 9009.00, NULL, NULL),
(65, 32, NULL, '5', 460.00, 10, 1, 11, 4600.00, NULL, NULL),
(66, 33, NULL, 'Momo', 460.00, 10, 1, 11, 4600.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoiceNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helperName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locationStart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locationEnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kplCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policeCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foodAllowanceCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintainingCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tollCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othersCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalCost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `invoiceNo`, `date`, `driverName`, `helperName`, `contact`, `carNo`, `locationStart`, `locationEnd`, `kplCost`, `policeCost`, `foodAllowanceCost`, `maintainingCost`, `tollCost`, `othersCost`, `totalCost`, `created_at`, `updated_at`) VALUES
(3, '1111, 2323, 23213', '2019-10-07', 'Wasim Khan', 'Kamran Khan', '0184342344', 'trp-2231', 'rajshahi', 'dinajpur, tangail', '250', '100', '400', '25', '200', '150', '1125', '2019-10-07 05:17:34', '2019-10-07 06:18:44'),
(4, '1111', '2019-10-07', 'Abdul Khan', 'kabir mandal', '45345345', 'bg101-13', 'jirabo', 'gajipor', '230', '34', '23', '232', '23', '12', '554', '2019-10-07 06:17:29', '2019-10-07 06:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `main_warehouses`
--

CREATE TABLE `main_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_warehouses`
--

INSERT INTO `main_warehouses` (`id`, `date`, `address`, `amount`, `discount`, `userName`, `productId`, `created_at`, `updated_at`) VALUES
(1, '2019-10-01', 'Dhaka', 500, '100 = 1 Free', 'SGFL', 3, '2019-10-01 09:02:00', '2019-10-01 09:02:00'),
(2, '2019-10-01', 'Dhaka', 500, '100 = 1 Free', 'SGFL', 4, '2019-10-01 09:02:33', '2019-10-05 10:38:21'),
(3, '2019-10-01', 'Dhaka', 1000, '100 = 1 Free', 'SGFL', 5, '2019-10-01 09:02:58', '2019-10-01 09:02:58'),
(4, '2019-10-01', 'Dhaka', 1000, '100 = 1 Free', 'SGFL', 6, '2019-10-01 09:04:22', '2019-10-05 10:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_06_045333_create_products_table', 1),
(4, '2019_08_06_045422_create_main_warehouses_table', 1),
(5, '2019_08_06_045612_create_distributors_table', 1),
(6, '2019_08_06_045633_create_dealers_table', 1),
(7, '2019_08_06_045711_create_payments_table', 1),
(8, '2019_08_07_103007_create_warehouses_table', 1),
(9, '2019_08_07_103859_create_orders_table', 1),
(10, '2019_08_07_111634_create_warehouse_invoices_table', 1),
(11, '2019_09_11_094834_create_dealer_balances_table', 1),
(12, '2019_09_11_095020_create_dealer_balance_records_table', 1),
(13, '2019_09_15_114508_create_dealer_invoices_table', 1),
(14, '2019_09_16_112902_create_dealer_invoice_details_table', 1),
(15, '2019_10_12_095202_create_account_summaries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freeAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalBill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advancePayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productId` int(10) UNSIGNED DEFAULT NULL,
  `warehouseId` int(10) UNSIGNED DEFAULT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `distributorId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `unit` double(8,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `unit`, `date`, `image`, `userName`, `created_at`, `updated_at`) VALUES
(2, 'Choco Momo', 46.20, 300.30, '2019-09-30', '1569820594.jpg', 'SGFL', '2019-09-30 05:16:34', '2019-09-30 05:16:34'),
(3, 'Chocolate', 46.20, 300.30, '2019-10-01', '1569920385.jpg', 'SGFL', '2019-10-01 08:59:45', '2019-10-01 08:59:45'),
(4, 'Drink', 5.00, 600.00, '2019-10-01', '1569920411.jpg', 'SGFL', '2019-10-01 09:00:11', '2019-10-01 09:00:11'),
(5, 'Momo', 56.00, 460.00, '2019-10-01', '1569920450.jpg', 'SGFL', '2019-10-01 09:00:50', '2019-10-10 06:21:03'),
(6, 'Biscuit', 46.20, 345.00, '2019-10-01', '1569920483.jpg', 'SGFL', '2019-10-01 09:01:23', '2019-10-01 09:01:23'),
(9, 'Chanachur', 50.00, 1600.00, '2019-10-15', '1571130455.jpg', 'SGFL', '2019-10-15 09:07:35', '2019-10-15 09:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `email`, `email_verified_at`, `password`, `remember_token`, `designation`, `image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'SGFL', 'Dhaka', '45345345', 'sgfl@gmail.com', NULL, '$2y$10$udedw88z6Ugk88hUK9zb3evBHaOLPY9xn8OSn3nweaH3mqpW74IV2', NULL, 'Boss', 'C:\\xampp\\tmp\\php882B.tmp', 'admin', '2019-09-30 05:15:05', '2019-09-30 05:15:05'),
(2, 'Moderator', 'Dhaka', '01840546346', 'moderator@gmail.com', NULL, '$2y$10$muQv/pXXbbIucXSjKMLO..rDetCl6253SZ3prqq3uDe4zoON3rTm6', NULL, 'None', 'C:\\xampp\\tmp\\php9E7F.tmp', 'moderator', '2019-10-03 09:43:16', '2019-10-03 09:43:16'),
(3, 'John', 'Dhaka', '45345345', 'john@gmail.com', NULL, '$2y$10$9x4rwygYbhGEbFJgG.8pAuDEjYJ03DsJ327.iP4F7Pl1xFurOYJuO', NULL, 'None', 'C:\\xampp\\tmp\\phpA3F7.tmp', 'moderator', '2019-10-03 10:17:08', '2019-10-03 10:17:08'),
(4, 'Tahsan', 'Dhaka', '11111111', 'tahsan@gmail.com', NULL, '$2y$10$jY9UfSv.OHcO3lRP.hfdF.GWQvBqs/WyQZXnG7rV71WuvgnNjJoXW', NULL, 'None', 'C:\\xampp\\tmp\\php4D9C.tmp', 'viewer', '2019-10-05 09:57:30', '2019-10-05 09:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_orders`
--

CREATE TABLE `warehouse_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productId` int(10) UNSIGNED DEFAULT NULL,
  `mainWarehouseId` int(10) UNSIGNED DEFAULT NULL,
  `warehouseId` int(10) UNSIGNED DEFAULT NULL,
  `distributorId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_summaries`
--
ALTER TABLE `account_summaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_summaries_dealerid_index` (`dealerId`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dealers_name_unique` (`name`);

--
-- Indexes for table `dealer_balances`
--
ALTER TABLE `dealer_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_balances_dealerid_index` (`dealerId`);

--
-- Indexes for table `dealer_balance_records`
--
ALTER TABLE `dealer_balance_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_balance_records_dealerid_index` (`dealerId`);

--
-- Indexes for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_invoices_dealerid_index` (`dealerId`),
  ADD KEY `dealer_invoices_orderid_index` (`orderId`);

--
-- Indexes for table `dealer_invoice_details`
--
ALTER TABLE `dealer_invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_invoice_details_dealerinvoiceid_index` (`dealerInvoiceId`),
  ADD KEY `dealer_invoice_details_productid_index` (`productId`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_warehouses`
--
ALTER TABLE `main_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_warehouses_productid_index` (`productId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_productid_index` (`productId`),
  ADD KEY `orders_warehouseid_index` (`warehouseId`),
  ADD KEY `orders_dealerid_index` (`dealerId`),
  ADD KEY `orders_distributorid_index` (`distributorId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_dealerid_index` (`dealerId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_orders`
--
ALTER TABLE `warehouse_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_orders_productid_index` (`productId`),
  ADD KEY `warehouse_orders_mainwarehouseid_index` (`mainWarehouseId`),
  ADD KEY `warehouse_orders_warehouseid_index` (`warehouseId`),
  ADD KEY `warehouse_orders_distributorid_index` (`distributorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_summaries`
--
ALTER TABLE `account_summaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dealer_balances`
--
ALTER TABLE `dealer_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_balance_records`
--
ALTER TABLE `dealer_balance_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dealer_invoice_details`
--
ALTER TABLE `dealer_invoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_warehouses`
--
ALTER TABLE `main_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse_orders`
--
ALTER TABLE `warehouse_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_summaries`
--
ALTER TABLE `account_summaries`
  ADD CONSTRAINT `account_summaries_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealer_balances`
--
ALTER TABLE `dealer_balances`
  ADD CONSTRAINT `dealer_balances_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealer_balance_records`
--
ALTER TABLE `dealer_balance_records`
  ADD CONSTRAINT `dealer_balance_records_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  ADD CONSTRAINT `dealer_invoices_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealer_invoices_orderid_foreign` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealer_invoice_details`
--
ALTER TABLE `dealer_invoice_details`
  ADD CONSTRAINT `dealer_invoice_details_dealerinvoiceid_foreign` FOREIGN KEY (`dealerInvoiceId`) REFERENCES `dealer_invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealer_invoice_details_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `main_warehouses`
--
ALTER TABLE `main_warehouses`
  ADD CONSTRAINT `main_warehouses_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_distributorid_foreign` FOREIGN KEY (`distributorId`) REFERENCES `distributors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_warehouseid_foreign` FOREIGN KEY (`warehouseId`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_dealerid_foreign` FOREIGN KEY (`dealerId`) REFERENCES `dealers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `warehouse_orders`
--
ALTER TABLE `warehouse_orders`
  ADD CONSTRAINT `warehouse_orders_distributorid_foreign` FOREIGN KEY (`distributorId`) REFERENCES `distributors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_orders_mainwarehouseid_foreign` FOREIGN KEY (`mainWarehouseId`) REFERENCES `main_warehouses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_orders_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `warehouse_orders_warehouseid_foreign` FOREIGN KEY (`warehouseId`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
