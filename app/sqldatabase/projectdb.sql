-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 07:28 AM
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
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `dealers` (`id`, `name`, `contact`, `address`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Ma Baba Traders', '1232324', 'Dhaka', 'Active', 150000.00, '2019-09-30 05:17:18', '2019-09-30 05:18:05');

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
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealer_balance_records`
--

INSERT INTO `dealer_balance_records` (`id`, `dealerId`, `type`, `accountNo`, `bankName`, `amount`, `date`, `status`, `comment`, `userName`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank', '332314345', 'Islami Bank', 150000, '2019-09-30 00:00:00', 'Paid', 'Thank You', 'SGFL', '2019-09-30 05:18:04', '2019-09-30 05:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_invoices`
--

CREATE TABLE `dealer_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealerId` int(10) UNSIGNED DEFAULT NULL,
  `orderId` int(10) UNSIGNED DEFAULT NULL,
  `invoiceNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` double(8,2) DEFAULT NULL,
  `remainUnit` int(11) DEFAULT NULL,
  `remainBalance` double(8,2) DEFAULT NULL,
  `grandTotalUnit` double(8,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealer_invoices`
--

INSERT INTO `dealer_invoices` (`id`, `dealerId`, `orderId`, `invoiceNo`, `totalPrice`, `remainUnit`, `remainBalance`, `grandTotalUnit`, `comment`, `userName`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_warehouses`
--

CREATE TABLE `main_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2019_09_16_112902_create_dealer_invoice_details_table', 1);

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
(1, 'Toast', 60.00, 600.00, '2019-09-30', '1569820561.jpg', 'SGFL', '2019-09-30 05:16:01', '2019-09-30 05:16:01'),
(2, 'Choco Momo', 46.20, 300.30, '2019-09-30', '1569820594.jpg', 'SGFL', '2019-09-30 05:16:34', '2019-09-30 05:16:34');

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
(1, 'SGFL', 'Dhaka', '45345345', 'sgfl@gmail.com', NULL, '$2y$10$udedw88z6Ugk88hUK9zb3evBHaOLPY9xn8OSn3nweaH3mqpW74IV2', NULL, 'Boss', 'C:\\xampp\\tmp\\php882B.tmp', 'admin', '2019-09-30 05:15:05', '2019-09-30 05:15:05');

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
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer_balances`
--
ALTER TABLE `dealer_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_balance_records`
--
ALTER TABLE `dealer_balance_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer_invoice_details`
--
ALTER TABLE `dealer_invoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_warehouses`
--
ALTER TABLE `main_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
