-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 01:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'size', NULL, NULL),
(2, 'color', NULL, NULL),
(3, 'weight', NULL, NULL),
(4, 'style', NULL, NULL),
(5, 'material', '2020-12-14 12:02:04', '2020-12-14 12:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `value`, `count`, `attribute_id`, `created_at`, `updated_at`) VALUES
(3, 'Red', 3, 2, '2020-12-16 18:46:35', '2020-12-16 22:11:54'),
(4, 'L', 4, 1, '2020-12-16 18:46:35', '2020-12-16 22:11:35'),
(5, 'M', 2, 1, '2020-12-16 18:46:35', '2020-12-16 22:12:27'),
(6, 'White', 4, 2, '2020-12-16 18:46:35', '2020-12-16 22:12:27'),
(7, 'S', 1, 1, '2020-12-16 18:48:51', '2020-12-16 19:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `array_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`array_values`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `value`, `price`, `quantity`, `created_at`, `updated_at`, `array_values`) VALUES
(1, 5, 'Red/L', 100.00, 10, '2020-12-16 18:46:35', '2020-12-16 18:46:52', '[\"Red\",\"L\"]'),
(2, 5, 'Red/M', 100.00, 10, '2020-12-16 18:46:35', '2020-12-16 18:46:52', '[\"Red\",\"M\"]'),
(3, 5, 'White/L', 100.00, 20, '2020-12-16 18:46:35', '2020-12-16 18:46:52', '[\"White\",\"L\"]'),
(4, 5, 'White/M', 100.00, 10, '2020-12-16 18:46:35', '2020-12-16 18:46:52', '[\"White\",\"M\"]'),
(7, 6, 'White/S', 1500.00, 10, '2020-12-16 18:48:51', '2020-12-16 18:49:24', '[\"White\",\"S\"]'),
(9, 7, 'Red/L', 100.00, 10, '2020-12-16 22:11:35', '2020-12-16 22:12:10', '[\"Red\",\"L\"]'),
(11, 7, 'White/L', 100.00, 10, '2020-12-16 22:11:35', '2020-12-16 22:12:10', '[\"White\",\"L\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_20_212002_create_user_addresses_table', 1),
(2, '2020_05_27_231423_create_contact_us_table', 2),
(3, '2020_12_13_122904_create_attributes_table', 3),
(4, '2020_12_13_122926_create_options_table', 3),
(5, '2014_10_12_100000_create_password_resets_table', 4),
(6, '2019_08_19_000000_create_failed_jobs_table', 4),
(7, '2020_12_13_131955_create_inventories_table', 5),
(8, '2020_12_15_230621_add_array_values_to_inventories_table', 6),
(9, '2020_12_15_232609_create_attribute_values_table', 7),
(10, '2020_12_16_203657_create_product_attribute_values_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `attribute_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 2, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(6, 1, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(7, 2, 6, '2020-12-16 18:48:51', '2020-12-16 18:48:51'),
(8, 1, 6, '2020-12-16 18:48:51', '2020-12-16 18:48:51'),
(9, 2, 7, '2020-12-16 22:11:35', '2020-12-16 22:11:35'),
(10, 1, 7, '2020-12-16 22:11:35', '2020-12-16 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock`, `image`, `price_discount`, `created_at`, `updated_at`) VALUES
(5, 'Producta', NULL, 200, 10, NULL, 100, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(6, 'Product1', NULL, 2000, 30, NULL, 1500, '2020-12-16 18:48:51', '2020-12-16 18:48:51'),
(7, 'Product10', NULL, 200, 50, NULL, 100, '2020-12-16 22:11:35', '2020-12-16 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `value`, `count`, `attribute_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Red', 2, 2, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(2, 'L', 2, 1, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(3, 'M', 2, 1, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(4, 'White', 2, 2, 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(5, 'Red', 0, 2, 6, '2020-12-16 18:48:51', '2020-12-16 19:11:39'),
(6, 'S', 1, 1, 6, '2020-12-16 18:48:51', '2020-12-16 19:10:32'),
(7, 'L', 1, 1, 6, '2020-12-16 18:48:51', '2020-12-16 19:11:39'),
(8, 'White', 2, 2, 6, '2020-12-16 18:48:51', '2020-12-16 18:48:51'),
(9, 'Red', 1, 2, 7, '2020-12-16 22:11:35', '2020-12-16 22:11:54'),
(10, 'L', 2, 1, 7, '2020-12-16 22:11:35', '2020-12-16 22:11:35'),
(11, 'M', 0, 1, 7, '2020-12-16 22:11:35', '2020-12-16 22:12:27'),
(12, 'White', 1, 2, 7, '2020-12-16 22:11:35', '2020-12-16 22:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 'images/products/2X4NM8dHzFkJwvwlGHWJ7qMS09z42ZmiZCwJ0fyW.jpeg', 5, '2020-12-16 18:46:35', '2020-12-16 18:46:35'),
(4, 'images/products/Kysw1EhDYApKayGCiqzsuS1wkU7UNLie8Cn1InqV.jpeg', 6, '2020-12-16 18:48:51', '2020-12-16 18:48:51'),
(5, 'images/products/MxKuku1wKjM88cgj8lzf0YWW33lyBbrMmXTAWq7s.png', 7, '2020-12-16 22:11:35', '2020-12-16 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` int(11) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_shipping` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `phone`, `email`, `password`, `avatar`, `code`, `phone_code`, `api_token`, `is_shipping`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed khalil', 0, '01202659898', 'ahmed@outlet.com', '$2y$10$.mpPpH9HYpZmtXfINCQ2rezafGhbjdsnvu8uEVOJhfay0Ks8wtKfS', NULL, NULL, NULL, 'er7CjobMRRk:APA91bEvdAirS9AEQv4lNy43uA5aby7AE8EWFONIIs4DRU8sSu2I_ElftV8KeHwBMPAYW4tV6d1XNaEfMz--8CdFifrJObA2R5QRDV55TAItm9fmGUIghXaaUwasxL1n_aSweep1wMiR', 0, NULL, '2020-09-18 15:11:02', '2020-10-30 16:41:58'),
(2, 'Ahmed', 0, '012568989789', 'Ahmed@app.com', '$2y$10$SV7cPdY28jk5UmVdg4Bq7ufRdWuoI/QaIdG7hjaIdgnEO7Ee9lSvm', NULL, NULL, NULL, NULL, 0, NULL, '2020-11-15 08:28:45', '2020-11-15 10:14:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
