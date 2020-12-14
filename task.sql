-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 02:42 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Bassam', '01060068756', 'admin@app.com', '$2y$10$jWD1e4OXeutJwbuGm8G0D.anq2ti/vIiMIP2I37f6p4sEnGaxqk76', '2020-07-04 11:53:32', '2020-11-29 08:55:05'),
(2, 'احمد خليل', NULL, 'mohamed1@app.com', '$2y$10$I0GqjBEDVRzzy6tcMyh8ReMesJZEqxR4PMEhUyxSvn39PsZysp53q', '2020-07-04 11:59:57', '2020-07-04 11:59:57'),
(3, 'محمد نصر', NULL, 'MohamedNasr@gmail.com', '$2y$10$sQADd7CtcQRMAm3KkEPuvuuen7aWG45sWILzrQFp/V2E9x2uhq3s6', '2020-07-07 04:46:02', '2020-07-07 04:46:02');

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
(4, 'style', NULL, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `value`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 2, 'Red/L', 80.00, 6, '2020-12-14 01:12:43', '2020-12-14 02:12:20'),
(6, 2, 'Red/M', 90.00, 100, '2020-12-14 01:12:43', '2020-12-14 01:14:59'),
(8, 2, 'White/M', 62.00, 64, '2020-12-14 01:12:43', '2020-12-14 01:14:59'),
(10, 3, 'L/Red/Man', 150.00, 20, '2020-12-14 01:18:47', '2020-12-14 02:20:37'),
(11, 3, 'M/Red/Woman', 100.00, 20, '2020-12-14 01:18:47', '2020-12-14 01:19:38'),
(12, 3, 'M/Red/Man', 160.00, 20, '2020-12-14 01:18:47', '2020-12-14 01:19:38'),
(13, 3, 'S/Red/Woman', 90.00, 20, '2020-12-14 01:18:47', '2020-12-14 01:19:38'),
(15, 4, 'red/L', 20.00, 10, '2020-12-14 10:10:03', '2020-12-14 10:10:48'),
(16, 4, 'red/M', 30.00, 20, '2020-12-14 10:10:03', '2020-12-14 10:10:48'),
(17, 4, 'white/L', 40.00, 30, '2020-12-14 10:10:03', '2020-12-14 10:10:48'),
(18, 4, 'white/M', 50.00, 40, '2020-12-14 10:10:03', '2020-12-14 10:10:48'),
(99, 25, 'Red/L', 20.00, 10, '2020-12-14 10:47:11', '2020-12-14 10:48:27'),
(100, 25, 'Red/M', 30.00, 15, '2020-12-14 10:47:11', '2020-12-14 10:48:27'),
(101, 25, 'White/L', 40.00, 20, '2020-12-14 10:47:11', '2020-12-14 10:48:27'),
(102, 25, 'White/M', 50.00, 25, '2020-12-14 10:47:11', '2020-12-14 10:48:27'),
(107, 29, 'Red/cool', 100.00, 35, '2020-12-14 11:35:54', '2020-12-14 11:37:23'),
(108, 29, 'Red/nice', 100.00, 25, '2020-12-14 11:35:54', '2020-12-14 11:37:07');

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
(7, '2020_12_13_131955_create_inventories_table', 5);

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
(3, 2, 2, '2020-12-14 01:12:43', '2020-12-14 01:12:43'),
(4, 1, 2, '2020-12-14 01:12:43', '2020-12-14 01:12:43'),
(5, 1, 3, '2020-12-14 01:18:47', '2020-12-14 01:18:47'),
(6, 2, 3, '2020-12-14 01:18:47', '2020-12-14 01:18:47'),
(7, 4, 3, '2020-12-14 01:18:47', '2020-12-14 01:18:47'),
(8, 2, 4, '2020-12-14 10:10:03', '2020-12-14 10:10:03'),
(9, 1, 4, '2020-12-14 10:10:03', '2020-12-14 10:10:03'),
(10, 2, 5, '2020-12-14 10:41:08', '2020-12-14 10:41:08'),
(11, 1, 5, '2020-12-14 10:41:08', '2020-12-14 10:41:08'),
(12, 2, 6, '2020-12-14 10:41:26', '2020-12-14 10:41:26'),
(13, 1, 6, '2020-12-14 10:41:26', '2020-12-14 10:41:26'),
(14, 2, 7, '2020-12-14 10:41:37', '2020-12-14 10:41:37'),
(15, 1, 7, '2020-12-14 10:41:37', '2020-12-14 10:41:37'),
(16, 2, 8, '2020-12-14 10:42:59', '2020-12-14 10:42:59'),
(17, 1, 8, '2020-12-14 10:42:59', '2020-12-14 10:42:59'),
(18, 2, 9, '2020-12-14 10:43:04', '2020-12-14 10:43:04'),
(19, 1, 9, '2020-12-14 10:43:04', '2020-12-14 10:43:04'),
(20, 2, 10, '2020-12-14 10:43:30', '2020-12-14 10:43:30'),
(21, 1, 10, '2020-12-14 10:43:30', '2020-12-14 10:43:30'),
(22, 2, 11, '2020-12-14 10:43:33', '2020-12-14 10:43:33'),
(23, 1, 11, '2020-12-14 10:43:33', '2020-12-14 10:43:33'),
(24, 2, 12, '2020-12-14 10:43:58', '2020-12-14 10:43:58'),
(25, 1, 12, '2020-12-14 10:43:58', '2020-12-14 10:43:58'),
(26, 2, 13, '2020-12-14 10:44:21', '2020-12-14 10:44:21'),
(27, 1, 13, '2020-12-14 10:44:21', '2020-12-14 10:44:21'),
(28, 2, 14, '2020-12-14 10:44:37', '2020-12-14 10:44:37'),
(29, 1, 14, '2020-12-14 10:44:37', '2020-12-14 10:44:37'),
(30, 2, 15, '2020-12-14 10:44:42', '2020-12-14 10:44:42'),
(31, 1, 15, '2020-12-14 10:44:42', '2020-12-14 10:44:42'),
(32, 2, 16, '2020-12-14 10:44:52', '2020-12-14 10:44:52'),
(33, 1, 16, '2020-12-14 10:44:52', '2020-12-14 10:44:52'),
(34, 2, 17, '2020-12-14 10:44:55', '2020-12-14 10:44:55'),
(35, 1, 17, '2020-12-14 10:44:55', '2020-12-14 10:44:55'),
(36, 2, 18, '2020-12-14 10:44:58', '2020-12-14 10:44:58'),
(37, 1, 18, '2020-12-14 10:44:58', '2020-12-14 10:44:58'),
(38, 2, 19, '2020-12-14 10:46:03', '2020-12-14 10:46:03'),
(39, 1, 19, '2020-12-14 10:46:03', '2020-12-14 10:46:03'),
(40, 2, 20, '2020-12-14 10:46:20', '2020-12-14 10:46:20'),
(41, 1, 20, '2020-12-14 10:46:20', '2020-12-14 10:46:20'),
(42, 2, 21, '2020-12-14 10:46:23', '2020-12-14 10:46:23'),
(43, 1, 21, '2020-12-14 10:46:23', '2020-12-14 10:46:23'),
(44, 2, 22, '2020-12-14 10:46:48', '2020-12-14 10:46:48'),
(45, 1, 22, '2020-12-14 10:46:48', '2020-12-14 10:46:48'),
(46, 2, 23, '2020-12-14 10:46:54', '2020-12-14 10:46:54'),
(47, 1, 23, '2020-12-14 10:46:54', '2020-12-14 10:46:54'),
(48, 2, 24, '2020-12-14 10:47:07', '2020-12-14 10:47:07'),
(49, 1, 24, '2020-12-14 10:47:07', '2020-12-14 10:47:07'),
(50, 2, 25, '2020-12-14 10:47:11', '2020-12-14 10:47:11'),
(51, 1, 25, '2020-12-14 10:47:11', '2020-12-14 10:47:11'),
(52, 2, 27, '2020-12-14 11:17:20', '2020-12-14 11:17:20'),
(53, 1, 27, '2020-12-14 11:17:20', '2020-12-14 11:17:20'),
(54, 2, 28, '2020-12-14 11:20:56', '2020-12-14 11:20:56'),
(55, 1, 28, '2020-12-14 11:20:56', '2020-12-14 11:20:56'),
(56, 2, 29, '2020-12-14 11:35:54', '2020-12-14 11:35:54'),
(57, 4, 29, '2020-12-14 11:35:54', '2020-12-14 11:35:54');

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
(2, 'Product1', 'Description1', 100, 200, NULL, 90, '2020-12-14 01:12:43', '2020-12-14 01:12:43'),
(3, 'Product2', 'Description2', 150, 50, NULL, 100, '2020-12-14 01:18:47', '2020-12-14 01:18:47'),
(4, 'Product 3', 'Description', 100, 30, NULL, 80, '2020-12-14 10:10:03', '2020-12-14 10:10:03'),
(25, 'Product4', 'Description 4', 100, 50, NULL, 90, '2020-12-14 10:41:08', '2020-12-14 10:41:08'),
(26, 'Product 5', 'Description5', 300, 40, NULL, 250, '2020-12-14 11:11:36', '2020-12-14 11:11:36'),
(29, 'Product6', 'Description', 100, 60, NULL, 90, '2020-12-14 11:35:54', '2020-12-14 11:35:54');

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
(1, 'images/products/gz40c4tMUo9bPXeYnyzVPNTdw4Fpxup0QWljwdMQ.jpeg', 4, '2020-12-14 10:10:03', '2020-12-14 10:10:03'),
(2, 'images/products/pXAtJAN9KyNfhrW0mz3BYYL1aTM2goxWsKHpJvKR.jpeg', 4, '2020-12-14 10:10:03', '2020-12-14 10:10:03'),
(3, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 5, '2020-12-14 10:41:08', '2020-12-14 10:41:08'),
(4, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 6, '2020-12-14 10:41:26', '2020-12-14 10:41:26'),
(5, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 7, '2020-12-14 10:41:37', '2020-12-14 10:41:37'),
(6, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 8, '2020-12-14 10:42:59', '2020-12-14 10:42:59'),
(7, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 9, '2020-12-14 10:43:04', '2020-12-14 10:43:04'),
(8, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 10, '2020-12-14 10:43:30', '2020-12-14 10:43:30'),
(9, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 11, '2020-12-14 10:43:33', '2020-12-14 10:43:33'),
(10, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 12, '2020-12-14 10:43:58', '2020-12-14 10:43:58'),
(11, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 13, '2020-12-14 10:44:21', '2020-12-14 10:44:21'),
(12, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 14, '2020-12-14 10:44:37', '2020-12-14 10:44:37'),
(13, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 15, '2020-12-14 10:44:42', '2020-12-14 10:44:42'),
(14, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 16, '2020-12-14 10:44:52', '2020-12-14 10:44:52'),
(15, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 17, '2020-12-14 10:44:55', '2020-12-14 10:44:55'),
(16, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 18, '2020-12-14 10:44:58', '2020-12-14 10:44:58'),
(17, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 19, '2020-12-14 10:46:03', '2020-12-14 10:46:03'),
(18, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 20, '2020-12-14 10:46:20', '2020-12-14 10:46:20'),
(19, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 21, '2020-12-14 10:46:23', '2020-12-14 10:46:23'),
(20, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 22, '2020-12-14 10:46:48', '2020-12-14 10:46:48'),
(21, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 23, '2020-12-14 10:46:54', '2020-12-14 10:46:54'),
(22, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 24, '2020-12-14 10:47:07', '2020-12-14 10:47:07'),
(23, 'images/products/1rWamLmAJxyx9LyIqxRopwmo4tuhXGIitA9pVfdU.jpeg', 25, '2020-12-14 10:47:11', '2020-12-14 10:47:11'),
(24, 'images/products/VROd4XRYYYwKeuFPUoyTUG9HlAJPU7z7v4LEPuQ5.jpeg', 26, '2020-12-14 11:11:36', '2020-12-14 11:11:36'),
(25, 'images/products/p1r1pO6ZgwZHhoCWGP1YI8CXdZLgjalBOBW5Hu1P.png', 27, '2020-12-14 11:17:20', '2020-12-14 11:17:20'),
(26, 'images/products/VylYbyXGTN6iSHyS1rxteVoKmsJXXdqCZrPvseXh.png', 27, '2020-12-14 11:17:20', '2020-12-14 11:17:20'),
(27, 'images/products/p1r1pO6ZgwZHhoCWGP1YI8CXdZLgjalBOBW5Hu1P.png', 28, '2020-12-14 11:20:56', '2020-12-14 11:20:56'),
(28, 'images/products/VylYbyXGTN6iSHyS1rxteVoKmsJXXdqCZrPvseXh.png', 28, '2020-12-14 11:20:56', '2020-12-14 11:20:56'),
(29, 'images/products/raYLXK5TVI0YTZMIexwkcUxFyNUaiwIgUjGLpT5A.png', 29, '2020-12-14 11:35:54', '2020-12-14 11:35:54'),
(30, 'images/products/MDgsqjaIgrwPvVnwpjbw6k1LlzAiOJZ9xyrEdVUt.png', 29, '2020-12-14 11:35:54', '2020-12-14 11:35:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
