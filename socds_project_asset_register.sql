-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 11:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socds_project_asset_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model`, `model_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'update', 'Product', 22, 'Updated product: HP ProOne 440 G9 23.9 inch All-in-One Desktop', '2025-08-13 02:41:03', '2025-08-13 02:41:03'),
(2, 1, 'update', 'Product', 31, 'Updated product: Brother Printer MFC-L6710DW', '2025-08-13 08:50:56', '2025-08-13 08:50:56'),
(3, 1, 'update', 'Product', 29, 'Serial No: WPM42L31DTF062500090 | Changed: User_description: \"উপসচিব ভূমি ভবন\" → \"শফিক স্যার উপসচিব\", Remarks: \"\" → \"সচিবালয়\", Updated_at: \"2025-08-13 03:24:58\" → \"2025-08-13 14:54:22\"', '2025-08-13 08:54:22', '2025-08-13 08:54:22'),
(4, 1, 'update', 'Product', 23, 'Serial No: <strong>8CN5110N5H</strong><br>Changed: ', '2025-08-13 09:21:24', '2025-08-13 09:21:24'),
(5, 1, 'update', 'Product', 23, 'Serial No: <strong>8CN5110N5H</strong><br>Changed: <span class=\"badge bg-warning text-dark\">User Description: \"মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স\" → \"মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার\"</span> <span class=\"badge bg-warning text-dark\">Updated At: \"2025-08-13 15:20:41\" → \"2025-08-13 15:23:57\"</span>', '2025-08-13 09:23:57', '2025-08-13 09:23:57'),
(6, 1, 'create', 'Product', 42, 'Created product: HP ProBook 440 G11 Notebook PC', '2025-08-13 09:31:59', '2025-08-13 09:31:59'),
(7, 1, 'delete', 'Product', 42, 'Deleted product: HP ProBook 440 G11 Notebook PC', '2025-08-13 09:33:19', '2025-08-13 09:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `asset_models`
--

CREATE TABLE `asset_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_models`
--

INSERT INTO `asset_models` (`id`, `model_name`, `created_at`, `updated_at`) VALUES
(1, 'ProBook 440 G11 Notebook PC', '2025-08-10 04:49:57', '2025-08-10 04:49:57'),
(2, 'ProOne 440 G9 23.9 inch All-in-One Desktop', '2025-08-10 04:50:01', '2025-08-10 04:50:01'),
(3, 'Printon PMF 42A', '2025-08-12 21:23:16', '2025-08-12 22:27:19'),
(4, 'MFC-L6710DW', '2025-08-12 21:29:58', '2025-08-12 21:45:46'),
(5, 'B1025', '2025-08-12 21:50:20', '2025-08-12 21:50:20'),
(6, 'B315', '2025-08-12 22:12:13', '2025-08-12 22:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'HP', '2025-08-10 04:49:33', '2025-08-10 04:49:33'),
(2, 'Walton', '2025-08-10 04:49:37', '2025-08-10 04:49:37'),
(3, 'Leica', '2025-08-10 04:49:41', '2025-08-10 04:49:41'),
(4, 'Sokkia', '2025-08-10 04:49:45', '2025-08-10 04:49:45'),
(5, 'Brother Printer', '2025-08-12 21:29:36', '2025-08-12 21:29:36'),
(6, 'Xerox', '2025-08-12 21:50:02', '2025-08-12 21:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2025-08-10 04:49:14', '2025-08-10 04:49:14'),
(2, 'Desktop', '2025-08-10 04:49:18', '2025-08-10 04:49:18'),
(4, 'Scanner', '2025-08-10 04:49:25', '2025-08-10 04:49:25'),
(5, 'Multi Function Laser Printer', '2025-08-12 21:24:03', '2025-08-12 21:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_06_101039_create_categories_table', 1),
(5, '2025_08_07_050019_create_brands_table', 1),
(6, '2025_08_07_054522_create_asset_models_table', 1),
(7, '2026_08_04_092617_create_products_table', 1),
(8, '2025_08_13_051753_create_activity_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` char(100) NOT NULL,
  `project_serial_no` char(100) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `user_description` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `brand_id`, `model_id`, `serial_no`, `project_serial_no`, `position`, `user_description`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(22, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N6Q', 'DLRS/SOCDSP/DESKTOP/24-25/031', 'উপসচিব ভূমি ভবন', 'শফিক স্যার উপসচিব', 'সচিবালয়', NULL, '2025-08-12 21:12:39', '2025-08-13 02:37:57'),
(23, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N5H', 'DLRS/SOCDSP/DESKTOP/24-25/076', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার', NULL, NULL, '2025-08-12 21:13:28', '2025-08-13 09:23:57'),
(24, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N7C', 'DLRS/SOCDSP/DESKTOP/24-25/153', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ আল-আমিন\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার', NULL, NULL, '2025-08-12 21:14:18', '2025-08-12 21:14:18'),
(25, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD51172ZC', 'DLRS/SOCDSP/LAPTOP/24-25/005', 'অফিসে ব্যবহার হচ্ছে', 'পিডি স্যারের ব্যবহারের জন্য', NULL, NULL, '2025-08-12 21:15:05', '2025-08-12 21:15:05'),
(26, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD5117331', 'DLRS/SOCDSP/LAPTOP/24-25/043', 'অফিসে ব্যবহার হচ্ছে', 'ডিপিডি স্যারের ব্যবহারের এর জন্য', NULL, NULL, '2025-08-12 21:15:39', '2025-08-12 21:15:39'),
(27, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD511730G', 'DLRS/SOCDSP/LAPTOP/24-25/072', 'অফিসে ব্যবহার হচ্ছে', 'সাইফুর রাসিদ (প্রকিউরমেন কনসালটেন্ট)', NULL, NULL, '2025-08-12 21:16:15', '2025-08-12 21:16:15'),
(28, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD511733Y', 'DLRS/SOCDSP/LAPTOP/24-25/108', 'অফিসে ব্যবহার হচ্ছে', 'নাইমুল কবীর (অ্যাসিস্ট্যান্ট প্রোগ্রামার)', NULL, NULL, '2025-08-12 21:16:39', '2025-08-12 21:16:39'),
(29, 'Walton Multi Function Laser Printer PMF 42A', 5, 2, 3, 'WPM42L31DTF062500090', 'DLRS/SOCDSP/M.F.PRINTER/24-25/086', 'উপসচিব ভূমি ভবন', 'শফিক স্যার উপসচিব', 'সচিবালয়', NULL, '2025-08-12 21:24:58', '2025-08-13 08:54:22'),
(30, 'Brother Printer MFC-L67100W', 5, 5, 4, 'E82264-H3N149646', 'DLRS/SOCDSP/M.F.PRINTER/24-25/229', 'অফিসে ব্যবহার হচ্ছে', '1. Md Moklesar Rahman,\r\n2. Ganesh Chandra Ray\r\n3. Mohammad Mohsin Sarkar', 'Room No: 1218', NULL, '2025-08-12 21:36:08', '2025-08-12 21:36:08'),
(31, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149645', 'DLRS/SOCDSP/M.F.PRINTER/24-25/230', 'অফিসে ব্যবহার হচ্ছে', 'Used by Toha', 'Office', NULL, '2025-08-12 21:49:44', '2025-08-13 08:50:56'),
(32, 'Xerox B1025', 5, 6, 5, '3430963804', 'SOCDS PROJECT FCM-1-22/23', 'অফিসে ব্যবহার হচ্ছে', 'Used by Sohag', NULL, NULL, '2025-08-12 21:51:00', '2025-08-12 21:51:00'),
(33, 'Xerox B315', 5, 6, 6, '3027476669', 'SOCDS PROJECT P-5/22-23', 'অফিসে ব্যবহার হচ্ছে', 'Md Akhtar Hossain', 'Room No: 1206', NULL, '2025-08-12 22:17:33', '2025-08-12 22:17:33'),
(34, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149683', 'DLRS/SOCDSP/M.F.PRINTER/24-25/231', 'অফিসে ব্যবহার হচ্ছে', 'Md Abul Kalam Azad', 'Room No: 1208', NULL, '2025-08-12 22:20:42', '2025-08-12 22:20:42'),
(35, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149680', 'DLRS/SOCDSP/M.F.PRINTER/24-25/232', 'অফিসে ব্যবহার হচ্ছে', 'Md Saifur Rahman', 'Room No: 1209', NULL, '2025-08-12 22:21:25', '2025-08-12 22:21:25'),
(36, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500034', 'DLRS/SOCDSP/M.F.PRINTER/24-25/034', 'পিডি স্যারের ব্যবহারের জন্য', 'পিডি স্যার', 'পিডি স্যার', NULL, '2025-08-12 23:26:34', '2025-08-12 23:26:34'),
(37, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500011', 'DLRS/SOCDSP/M.F.PRINTER/24-25/011', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ সোহাগ (কম্পিউটার অপারেটর)', NULL, NULL, '2025-08-13 01:31:35', '2025-08-13 01:31:35'),
(38, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500045', 'DLRS/SOCDSP/M.F.PRINTER/24-25/045', 'ডিপিডি স্যারের ব্যবহারের জন্য', 'ডিপিডি স্যার', NULL, NULL, '2025-08-13 01:32:53', '2025-08-13 01:32:53'),
(39, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500030', 'DLRS/SOCDSP/M.F.PRINTER/24-25/030', 'অফিসে ব্যবহার হচ্ছে', 'নাইমুল কবীর (অ্যাসিস্ট্যান্ট প্রোগ্রামার)', NULL, NULL, '2025-08-13 01:33:38', '2025-08-13 01:33:38'),
(40, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500036', 'DLRS/SOCDSP/M.F.PRINTER/24-25/036', 'অফিসে ব্যবহার হচ্ছে', 'মোহাম্মদ রুকুনুজ্জামান\r\n(কম্পিউটার অপারেটর)', NULL, NULL, '2025-08-13 01:35:13', '2025-08-13 01:35:13'),
(41, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500207', 'DLRS/SOCDSP/M.F.PRINTER/24-25/196', 'এপিডি স্যারের ব্যবহারের জন্য', 'এপিডি স্যার', NULL, NULL, '2025-08-13 01:36:08', '2025-08-13 01:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i0W8gSpF98jcgJhoYsLrY52lUrJYLeUhtsbjBRNV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3o2RXI4UkZ5TTFMYjZuUldyRWlsOVhmUk1RWmUyWEhGZnJhT0IzZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755078200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'USR for user, ADM for admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Moklesar Rahman', 'risingbappy1@gmail.com', NULL, '$2y$12$PcTSiCOsiYkcLOLAUj40VO/NkboyZY.bWc7pSWd5JcaGlQh4xVR/G', 'USR', NULL, '2025-08-10 04:49:01', '2025-08-10 04:49:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_models`
--
ALTER TABLE `asset_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_serial_no_unique` (`serial_no`),
  ADD UNIQUE KEY `products_project_serial_no_unique` (`project_serial_no`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_model_id_foreign` (`model_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_models`
--
ALTER TABLE `asset_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `asset_models` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
