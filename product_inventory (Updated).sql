-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2025 at 12:14 PM
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
-- Database: `product_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Maintenance logged', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-30T15:19\"}', NULL, '2025-08-24 09:19:35', '2025-08-24 09:19:35'),
(2, 'default', 'Maintenance updated', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-30T15:19\"}', NULL, '2025-08-24 09:29:00', '2025-08-24 09:29:00'),
(3, 'default', 'Maintenance logged', 'App\\Models\\Maintenance', NULL, 2, 'App\\Models\\User', 1, '{\"description\":\"kSZDgvZKDb\",\"start_time\":\"2025-08-24T15:41\",\"end_time\":\"2025-08-30T15:41\"}', NULL, '2025-08-24 09:41:38', '2025-08-24 09:41:38'),
(4, 'default', 'Maintenance logged', 'App\\Models\\Maintenance', NULL, 3, 'App\\Models\\User', 1, '{\"description\":\"Dispay\",\"start_time\":\"2025-08-24T15:46\",\"end_time\":\"2025-08-30T15:46\"}', NULL, '2025-08-24 09:46:11', '2025-08-24 09:46:11'),
(5, 'default', 'Maintenance deleted', 'App\\Models\\Maintenance', NULL, 3, 'App\\Models\\User', 1, '[]', NULL, '2025-08-24 09:46:45', '2025-08-24 09:46:45'),
(6, 'default', 'Maintenance deleted', 'App\\Models\\Maintenance', NULL, 2, 'App\\Models\\User', 1, '[]', NULL, '2025-08-24 09:47:11', '2025-08-24 09:47:11'),
(7, 'default', 'Maintenance updated', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-24T15:19\"}', NULL, '2025-08-24 10:04:15', '2025-08-24 10:04:15'),
(8, 'default', 'Maintenance updated', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-27T15:19\"}', NULL, '2025-08-24 10:04:39', '2025-08-24 10:04:39'),
(9, 'default', 'Maintenance updated', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-24T15:19\"}', NULL, '2025-08-24 10:10:42', '2025-08-24 10:10:42'),
(10, 'default', 'Maintenance updated', 'App\\Models\\Maintenance', NULL, 1, 'App\\Models\\User', 1, '{\"description\":\"Desktop Issue\",\"start_time\":\"2025-08-24T15:19\",\"end_time\":\"2025-08-26T15:19\"}', NULL, '2025-08-24 10:10:51', '2025-08-24 10:10:51');

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
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model`, `model_id`, `description`, `ip_address`, `user_agent`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'update', 'Product', 22, 'Updated product: HP ProOne 440 G9 23.9 inch All-in-One Desktop', NULL, NULL, NULL, '2025-08-13 02:41:03', '2025-08-13 02:41:03'),
(2, 1, 'update', 'Product', 31, 'Updated product: Brother Printer MFC-L6710DW', NULL, NULL, NULL, '2025-08-13 08:50:56', '2025-08-13 08:50:56'),
(3, 1, 'update', 'Product', 29, 'Serial No: WPM42L31DTF062500090 | Changed: User_description: \"উপসচিব ভূমি ভবন\" → \"শফিক স্যার উপসচিব\", Remarks: \"\" → \"সচিবালয়\", Updated_at: \"2025-08-13 03:24:58\" → \"2025-08-13 14:54:22\"', NULL, NULL, NULL, '2025-08-13 08:54:22', '2025-08-13 08:54:22'),
(4, 1, 'update', 'Product', 23, 'Serial No: <strong>8CN5110N5H</strong><br>Changed: ', NULL, NULL, NULL, '2025-08-13 09:21:24', '2025-08-13 09:21:24'),
(5, 1, 'update', 'Product', 23, 'Serial No: <strong>8CN5110N5H</strong><br>Changed: <span class=\"badge bg-warning text-dark\">User Description: \"মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স\" → \"মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার\"</span> <span class=\"badge bg-warning text-dark\">Updated At: \"2025-08-13 15:20:41\" → \"2025-08-13 15:23:57\"</span>', NULL, NULL, NULL, '2025-08-13 09:23:57', '2025-08-13 09:23:57'),
(6, 1, 'create', 'Product', 42, 'Created product: HP ProBook 440 G11 Notebook PC', NULL, NULL, NULL, '2025-08-13 09:31:59', '2025-08-13 09:31:59'),
(7, 1, 'delete', 'Product', 42, 'Deleted product: HP ProBook 440 G11 Notebook PC', NULL, NULL, NULL, '2025-08-13 09:33:19', '2025-08-13 09:33:19'),
(8, 1, 'create', 'Product', 43, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Receiver</strong><br>Serial No: <code>4907761</code>', NULL, NULL, NULL, '2025-08-19 09:50:19', '2025-08-19 09:50:19'),
(9, 1, 'create', 'Product', 44, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Controller</strong><br>Serial No: <code>4597703</code>', NULL, NULL, NULL, '2025-08-19 09:52:07', '2025-08-19 09:52:07'),
(10, 1, 'create', 'Product', 45, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Rover A Receiver</strong><br>Serial No: <code>4907738</code>', NULL, NULL, NULL, '2025-08-19 09:54:46', '2025-08-19 09:54:46'),
(11, 1, 'create', 'Product', 46, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Rover A Controller</strong><br>Serial No: <code>4597687</code>', NULL, NULL, NULL, '2025-08-19 09:55:44', '2025-08-19 09:55:44'),
(12, 1, 'create', 'Product', 47, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Rover B Receiver</strong><br>Serial No: <code>4907744</code>', NULL, NULL, NULL, '2025-08-19 09:56:56', '2025-08-19 09:56:56'),
(13, 1, 'create', 'Product', 48, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 01 Rover B Controller</strong><br>Serial No: <code>4597701</code>', NULL, NULL, NULL, '2025-08-19 09:57:36', '2025-08-19 09:57:36'),
(14, 1, 'create', 'Product', 49, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Receiver</strong><br>Serial No: <code>4907763</code>', NULL, NULL, NULL, '2025-08-19 09:59:22', '2025-08-19 09:59:22'),
(15, 1, 'create', 'Product', 50, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Controller</strong><br>Serial No: <code>4597691</code>', NULL, NULL, NULL, '2025-08-19 09:59:52', '2025-08-19 09:59:52'),
(16, 1, 'create', 'Product', 51, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Rover A Receiver</strong><br>Serial No: <code>4907771</code>', NULL, NULL, NULL, '2025-08-19 10:22:58', '2025-08-19 10:22:58'),
(17, 1, 'create', 'Product', 52, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Rover B Controller</strong><br>Serial No: <code>4597661</code>', NULL, NULL, NULL, '2025-08-19 10:23:37', '2025-08-19 10:23:37'),
(18, 1, 'update', 'Product', 52, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>Base 02 Rover A Controller</strong><br>Serial No: <code>4597661</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Product Name: \"Base 02 Rover B Controller\" → \"Base 02 Rover A Controller\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-19 16:23:37\" → \"2025-08-19 16:24:12\"</span>', NULL, NULL, NULL, '2025-08-19 10:24:12', '2025-08-19 10:24:12'),
(19, 1, 'create', 'Product', 53, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Rover B Receiver</strong><br>Serial No: <code>4907772</code>', NULL, NULL, NULL, '2025-08-19 10:25:29', '2025-08-19 10:25:29'),
(20, 1, 'create', 'Product', 54, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 02 Rover B Controller</strong><br>Serial No: <code>4597685</code>', NULL, NULL, NULL, '2025-08-19 10:26:09', '2025-08-19 10:26:09'),
(21, 1, 'create', 'Product', 55, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Receiver</strong><br>Serial No: <code>4907770</code>', NULL, NULL, NULL, '2025-08-19 10:28:39', '2025-08-19 10:28:39'),
(22, 1, 'create', 'Product', 56, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Controller</strong><br>Serial No: <code>4595758</code>', NULL, NULL, NULL, '2025-08-19 10:29:40', '2025-08-19 10:29:40'),
(23, 1, 'create', 'Product', 57, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Rover A Receiver</strong><br>Serial No: <code>4907755</code>', NULL, NULL, NULL, '2025-08-19 10:30:50', '2025-08-19 10:30:50'),
(24, 1, 'create', 'Product', 58, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Rover A Controller</strong><br>Serial No: <code>4597688</code>', NULL, NULL, NULL, '2025-08-19 10:31:52', '2025-08-19 10:31:52'),
(25, 1, 'create', 'Product', 59, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Rover B Receiver</strong><br>Serial No: <code>4907743</code>', NULL, NULL, NULL, '2025-08-19 10:32:29', '2025-08-19 10:32:29'),
(26, 1, 'create', 'Product', 60, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 03 Rover B Controller</strong><br>Serial No: <code>4597704</code>', NULL, NULL, NULL, '2025-08-19 10:33:01', '2025-08-19 10:33:01'),
(27, 1, 'create', 'Product', 61, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Receiver</strong><br>Serial No: <code>4907764</code>', NULL, NULL, NULL, '2025-08-19 10:35:26', '2025-08-19 10:35:26'),
(28, 1, 'create', 'Product', 62, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Controller</strong><br>Serial No: <code>4597658</code>', NULL, NULL, NULL, '2025-08-19 10:36:01', '2025-08-19 10:36:01'),
(29, 1, 'create', 'Product', 63, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Rover A Receiver</strong><br>Serial No: <code>4907765</code>', NULL, NULL, NULL, '2025-08-19 10:36:40', '2025-08-19 10:36:40'),
(30, 1, 'create', 'Product', 64, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Rover A Controller</strong><br>Serial No: <code>4597683</code>', NULL, NULL, NULL, '2025-08-19 10:37:28', '2025-08-19 10:37:28'),
(31, 1, 'create', 'Product', 65, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Rover B Receiver</strong><br>Serial No: <code>4907774</code>', NULL, NULL, NULL, '2025-08-19 10:38:16', '2025-08-19 10:38:16'),
(32, 1, 'create', 'Product', 66, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 04 Rover B Controller</strong><br>Serial No: <code>4597693</code>', NULL, NULL, NULL, '2025-08-19 10:38:54', '2025-08-19 10:38:54'),
(33, 1, 'create', 'Product', 67, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Receiver</strong><br>Serial No: <code>4907739</code>', NULL, NULL, NULL, '2025-08-19 10:40:11', '2025-08-19 10:40:11'),
(34, 1, 'create', 'Product', 68, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Controller</strong><br>Serial No: <code>4597705</code>', NULL, NULL, NULL, '2025-08-19 10:40:48', '2025-08-19 10:40:48'),
(35, 1, 'create', 'Product', 69, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Rover A Receiver</strong><br>Serial No: <code>4907747</code>', NULL, NULL, NULL, '2025-08-19 10:41:28', '2025-08-19 10:41:28'),
(36, 1, 'create', 'Product', 70, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Rover A Controller</strong><br>Serial No: <code>4597686</code>', NULL, NULL, NULL, '2025-08-19 10:41:55', '2025-08-19 10:41:55'),
(37, 1, 'create', 'Product', 71, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Rover B Receiver</strong><br>Serial No: <code>4907760</code>', NULL, NULL, NULL, '2025-08-19 10:42:30', '2025-08-19 10:42:30'),
(38, 1, 'create', 'Product', 72, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 05 Rover B Controller</strong><br>Serial No: <code>4597694</code>', NULL, NULL, NULL, '2025-08-19 10:43:07', '2025-08-19 10:43:07'),
(39, 1, 'create', 'Product', 73, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Receiver</strong><br>Serial No: <code>4907754</code>', NULL, NULL, NULL, '2025-08-19 10:43:40', '2025-08-19 10:43:40'),
(40, 1, 'create', 'Product', 74, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Controller</strong><br>Serial No: <code>4597690</code>', NULL, NULL, NULL, '2025-08-19 10:44:01', '2025-08-19 10:44:01'),
(41, 1, 'create', 'Product', 75, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Rover A Receiver</strong><br>Serial No: <code>4907769</code>', NULL, NULL, NULL, '2025-08-19 10:44:32', '2025-08-19 10:44:32'),
(42, 1, 'create', 'Product', 76, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Rover A Controller</strong><br>Serial No: <code>4597659</code>', NULL, NULL, NULL, '2025-08-19 10:45:14', '2025-08-19 10:45:14'),
(43, 1, 'create', 'Product', 77, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Rover B Receiver</strong><br>Serial No: <code>4907757</code>', NULL, NULL, NULL, '2025-08-19 10:46:03', '2025-08-19 10:46:03'),
(44, 1, 'create', 'Product', 78, '<span class=\"text-success fw-bold\">Created</span> product: <strong>Base 06 Rover B Controller</strong><br>Serial No: <code>4596693</code>', NULL, NULL, NULL, '2025-08-19 10:47:22', '2025-08-19 10:47:22'),
(45, 1, 'update', 'Product', 22, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>HP ProOne 440 G9 23.9 inch All-in-One Desktop</strong><br>Serial No: <code>8CN5110N6Q</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Warranty Start: \"-\" → \"2025-08-03 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Warranty End: \"-\" → \"2025-08-27 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-13 08:37:57\" → \"2025-08-24 09:41:12\"</span>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', NULL, '2025-08-24 03:41:12', '2025-08-24 03:41:12'),
(46, 1, 'update', 'Product', 22, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>HP ProOne 440 G9 23.9 inch All-in-One Desktop</strong><br>Serial No: <code>8CN5110N6Q</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Warranty End: \"2025-08-27 00:00:00\" → \"2025-08-31 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-24 09:41:12\" → \"2025-08-24 09:41:25\"</span>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', NULL, '2025-08-24 03:41:25', '2025-08-24 03:41:25'),
(47, 1, 'update', 'Product', 22, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>HP ProOne 440 G9 23.9 inch All-in-One Desktop</strong><br>Serial No: <code>8CN5110N6Q</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Warranty End: \"2025-08-31 00:00:00\" → \"2025-09-02 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-24 09:41:25\" → \"2025-08-24 09:41:34\"</span>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', NULL, '2025-08-24 03:41:34', '2025-08-24 03:41:34'),
(48, 1, 'update', 'Product', 22, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>HP ProOne 440 G9 23.9 inch All-in-One Desktop</strong><br>Serial No: <code>8CN5110N6Q</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Warranty End: \"2025-09-02 00:00:00\" → \"2025-09-30 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-24 09:41:34\" → \"2025-08-24 09:41:41\"</span>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', NULL, '2025-08-24 03:41:41', '2025-08-24 03:41:41'),
(49, 1, 'update', 'Product', 23, '<span class=\"text-primary fw-bold\">Updated</span> product: <strong>HP ProOne 440 G9 23.9 inch All-in-One Desktop</strong><br>Serial No: <code>8CN5110N5H</code><br>Changes: <span class=\"badge bg-warning text-dark me-1\">Warranty Start: \"-\" → \"2025-08-23 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Warranty End: \"-\" → \"2025-08-30 00:00:00\"</span> <span class=\"badge bg-warning text-dark me-1\">Updated At: \"2025-08-13 15:23:57\" → \"2025-08-24 16:03:58\"</span>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'guest', '2025-08-24 10:03:58', '2025-08-24 10:03:58');

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
(5, 'Xerox B1025', '2025-08-12 21:50:20', '2025-08-19 09:47:28'),
(6, 'Xerox B315', '2025-08-12 22:12:13', '2025-08-19 09:47:23'),
(7, 'Leica GS18T', '2025-08-19 09:48:09', '2025-08-19 09:48:09'),
(8, 'Leica CS20 LTE', '2025-08-19 09:48:17', '2025-08-19 09:48:17');

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
(5, 'Multi Function Laser Printer', '2025-08-12 21:24:03', '2025-08-12 21:24:03'),
(6, 'GPS/GNSS', '2025-08-19 09:46:35', '2025-08-19 09:46:35'),
(7, 'guest', '2025-08-20 03:30:38', '2025-08-20 03:30:38');

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
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `performed_at` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `product_id`, `description`, `start_time`, `end_time`, `performed_at`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 22, 'Desktop Issue', '2025-08-24 15:19:00', '2025-08-26 15:19:00', '2025-08-26 15:19:00', 1, '2025-08-24 09:19:35', '2025-08-24 10:10:51');

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
(8, '2025_08_13_051753_create_activity_logs_table', 2),
(15, '0001_01_01_000000_create_users_table', 1),
(16, '0001_01_01_000001_create_cache_table', 1),
(17, '0001_01_01_000002_create_jobs_table', 1),
(18, '2025_08_06_101039_create_categories_table', 1),
(19, '2025_08_07_050019_create_brands_table', 1),
(20, '2025_08_07_054522_create_asset_models_table', 1),
(21, '2025_08_13_051753_create_activity_logs_table', 1),
(22, '2025_08_20_102540_add_metadata_fields_to_activity_logs_table', 1),
(23, '2025_08_20_162012_create_products_table', 1),
(24, '2025_08_20_163833_make_role_nullable_in_activity_logs', 1),
(25, '2025_08_24_120407_create_maintenances_table', 3),
(26, '2025_08_24_151744_create_activity_log_table', 3),
(27, '2025_08_24_151745_add_event_column_to_activity_log_table', 3),
(28, '2025_08_24_151746_add_batch_uuid_column_to_activity_log_table', 3),
(29, '2026_08_20_102540_add_metadata_fields_to_activity_logs_table', 3);

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
  `warranty_start` datetime DEFAULT NULL,
  `warranty_end` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `brand_id`, `model_id`, `serial_no`, `project_serial_no`, `position`, `user_description`, `remarks`, `warranty_start`, `warranty_end`, `deleted_at`, `created_at`, `updated_at`) VALUES
(22, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N6Q', 'DLRS/SOCDSP/DESKTOP/24-25/031', 'উপসচিব ভূমি ভবন', 'শফিক স্যার উপসচিব', 'সচিবালয়', '2025-08-03 00:00:00', '2025-09-30 00:00:00', NULL, '2025-08-12 21:12:39', '2025-08-24 03:41:41'),
(23, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N5H', 'DLRS/SOCDSP/DESKTOP/24-25/076', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ মোকলেসার রহমান\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার', NULL, '2025-08-23 00:00:00', '2025-08-30 00:00:00', NULL, '2025-08-12 21:13:28', '2025-08-24 10:03:58'),
(24, 'HP ProOne 440 G9 23.9 inch All-in-One Desktop', 2, 1, 2, '8CN5110N7C', 'DLRS/SOCDSP/DESKTOP/24-25/153', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ আল-আমিন\r\nঅ্যাসিস্ট্যান্ট মেইনটেনেন্স ইঙ্গিনিয়ার', NULL, NULL, NULL, NULL, '2025-08-12 21:14:18', '2025-08-12 21:14:18'),
(25, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD51172ZC', 'DLRS/SOCDSP/LAPTOP/24-25/005', 'অফিসে ব্যবহার হচ্ছে', 'পিডি স্যারের ব্যবহারের জন্য', NULL, NULL, NULL, NULL, '2025-08-12 21:15:05', '2025-08-12 21:15:05'),
(26, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD5117331', 'DLRS/SOCDSP/LAPTOP/24-25/043', 'অফিসে ব্যবহার হচ্ছে', 'ডিপিডি স্যারের ব্যবহারের এর জন্য', NULL, NULL, NULL, NULL, '2025-08-12 21:15:39', '2025-08-12 21:15:39'),
(27, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD511730G', 'DLRS/SOCDSP/LAPTOP/24-25/072', 'অফিসে ব্যবহার হচ্ছে', 'সাইফুর রাসিদ (প্রকিউরমেন কনসালটেন্ট)', NULL, NULL, NULL, NULL, '2025-08-12 21:16:15', '2025-08-12 21:16:15'),
(28, 'HP ProBook 440 G11 Notebook PC', 1, 1, 1, '5CD511733Y', 'DLRS/SOCDSP/LAPTOP/24-25/108', 'অফিসে ব্যবহার হচ্ছে', 'নাইমুল কবীর (অ্যাসিস্ট্যান্ট প্রোগ্রামার)', NULL, NULL, NULL, NULL, '2025-08-12 21:16:39', '2025-08-12 21:16:39'),
(29, 'Walton Multi Function Laser Printer PMF 42A', 5, 2, 3, 'WPM42L31DTF062500090', 'DLRS/SOCDSP/M.F.PRINTER/24-25/086', 'উপসচিব ভূমি ভবন', 'শফিক স্যার উপসচিব', 'সচিবালয়', NULL, NULL, NULL, '2025-08-12 21:24:58', '2025-08-13 08:54:22'),
(30, 'Brother Printer MFC-L67100W', 5, 5, 4, 'E82264-H3N149646', 'DLRS/SOCDSP/M.F.PRINTER/24-25/229', 'অফিসে ব্যবহার হচ্ছে', '1. Md Moklesar Rahman,\r\n2. Ganesh Chandra Ray\r\n3. Mohammad Mohsin Sarkar', 'Room No: 1218', NULL, NULL, NULL, '2025-08-12 21:36:08', '2025-08-12 21:36:08'),
(31, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149645', 'DLRS/SOCDSP/M.F.PRINTER/24-25/230', 'অফিসে ব্যবহার হচ্ছে', 'Used by Toha', 'Office', NULL, NULL, NULL, '2025-08-12 21:49:44', '2025-08-13 08:50:56'),
(32, 'Xerox B1025', 5, 6, 5, '3430963804', 'SOCDS PROJECT FCM-1-22/23', 'অফিসে ব্যবহার হচ্ছে', 'Used by Sohag', NULL, NULL, NULL, NULL, '2025-08-12 21:51:00', '2025-08-12 21:51:00'),
(33, 'Xerox B315', 5, 6, 6, '3027476669', 'SOCDS PROJECT P-5/22-23', 'অফিসে ব্যবহার হচ্ছে', 'Md Akhtar Hossain', 'Room No: 1206', NULL, NULL, NULL, '2025-08-12 22:17:33', '2025-08-12 22:17:33'),
(34, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149683', 'DLRS/SOCDSP/M.F.PRINTER/24-25/231', 'অফিসে ব্যবহার হচ্ছে', 'Md Abul Kalam Azad', 'Room No: 1208', NULL, NULL, NULL, '2025-08-12 22:20:42', '2025-08-12 22:20:42'),
(35, 'Brother Printer MFC-L6710DW', 5, 5, 4, 'E82264-H3N149680', 'DLRS/SOCDSP/M.F.PRINTER/24-25/232', 'অফিসে ব্যবহার হচ্ছে', 'Md Saifur Rahman', 'Room No: 1209', NULL, NULL, NULL, '2025-08-12 22:21:25', '2025-08-12 22:21:25'),
(36, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500034', 'DLRS/SOCDSP/M.F.PRINTER/24-25/034', 'পিডি স্যারের ব্যবহারের জন্য', 'পিডি স্যার', 'পিডি স্যার', NULL, NULL, NULL, '2025-08-12 23:26:34', '2025-08-12 23:26:34'),
(37, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500011', 'DLRS/SOCDSP/M.F.PRINTER/24-25/011', 'অফিসে ব্যবহার হচ্ছে', 'মোঃ সোহাগ (কম্পিউটার অপারেটর)', NULL, NULL, NULL, NULL, '2025-08-13 01:31:35', '2025-08-13 01:31:35'),
(38, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500045', 'DLRS/SOCDSP/M.F.PRINTER/24-25/045', 'ডিপিডি স্যারের ব্যবহারের জন্য', 'ডিপিডি স্যার', NULL, NULL, NULL, NULL, '2025-08-13 01:32:53', '2025-08-13 01:32:53'),
(39, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500030', 'DLRS/SOCDSP/M.F.PRINTER/24-25/030', 'অফিসে ব্যবহার হচ্ছে', 'নাইমুল কবীর (অ্যাসিস্ট্যান্ট প্রোগ্রামার)', NULL, NULL, NULL, NULL, '2025-08-13 01:33:38', '2025-08-13 01:33:38'),
(40, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500036', 'DLRS/SOCDSP/M.F.PRINTER/24-25/036', 'অফিসে ব্যবহার হচ্ছে', 'মোহাম্মদ রুকুনুজ্জামান\r\n(কম্পিউটার অপারেটর)', NULL, NULL, NULL, NULL, '2025-08-13 01:35:13', '2025-08-13 01:35:13'),
(41, 'Walton Printon PMF 42A', 5, 2, 3, 'WPM42L31DTF062500207', 'DLRS/SOCDSP/M.F.PRINTER/24-25/196', 'এপিডি স্যারের ব্যবহারের জন্য', 'এপিডি স্যার', NULL, NULL, NULL, NULL, '2025-08-13 01:36:08', '2025-08-13 01:36:08'),
(43, 'Base 01 Receiver', 6, 3, 7, '4907761', 'DLRS/SOCDS-P/GNSS/24-25/01', 'অফিসের স্টোরে', NULL, 'Each Base has 2 Rover', NULL, NULL, NULL, '2025-08-19 09:50:19', '2025-08-19 09:50:19'),
(44, 'Base 01 Controller', 6, 3, 8, '4597703', 'DLRS/SOCDS-P/GNSS/24-25/02', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:52:07', '2025-08-19 09:52:07'),
(45, 'Base 01 Rover A Receiver', 6, 3, 7, '4907738', 'DLRS/SOCDS-P/GNSS/24-25/03', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:54:46', '2025-08-19 09:54:46'),
(46, 'Base 01 Rover A Controller', 6, 3, 8, '4597687', 'DLRS/SOCDS-P/GNSS/24-25/04', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:55:44', '2025-08-19 09:55:44'),
(47, 'Base 01 Rover B Receiver', 6, 3, 7, '4907744', 'DLRS/SOCDS-P/GNSS/24-25/05', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:56:56', '2025-08-19 09:56:56'),
(48, 'Base 01 Rover B Controller', 6, 3, 8, '4597701', 'DLRS/SOCDS-P/GNSS/24-25/06', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:57:36', '2025-08-19 09:57:36'),
(49, 'Base 02 Receiver', 6, 3, 7, '4907763', 'DLRS/SOCDS-P/GNSS/24-25/07', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:59:22', '2025-08-19 09:59:22'),
(50, 'Base 02 Controller', 6, 3, 8, '4597691', 'DLRS/SOCDS-P/GNSS/24-25/08', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:59:52', '2025-08-19 09:59:52'),
(51, 'Base 02 Rover A Receiver', 6, 3, 7, '4907771', 'DLRS/SOCDS-P/GNSS/24-25/09', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:22:58', '2025-08-19 10:22:58'),
(52, 'Base 02 Rover A Controller', 6, 3, 8, '4597661', 'DLRS/SOCDS-P/GNSS/24-25/10', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:23:37', '2025-08-19 10:24:12'),
(53, 'Base 02 Rover B Receiver', 6, 3, 7, '4907772', 'DLRS/SOCDS-P/GNSS/24-25/11', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:25:29', '2025-08-19 10:25:29'),
(54, 'Base 02 Rover B Controller', 6, 3, 8, '4597685', 'DLRS/SOCDS-P/GNSS/24-25/12', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:26:09', '2025-08-19 10:26:09'),
(55, 'Base 03 Receiver', 6, 3, 7, '4907770', 'DLRS/SOCDS-P/GNSS/24-25/13', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:28:39', '2025-08-19 10:28:39'),
(56, 'Base 03 Controller', 6, 3, 8, '4595758', 'DLRS/SOCDS-P/GNSS/24-25/14', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:29:40', '2025-08-19 10:29:40'),
(57, 'Base 03 Rover A Receiver', 6, 3, 7, '4907755', 'DLRS/SOCDS-P/GNSS/24-25/15', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:30:50', '2025-08-19 10:30:50'),
(58, 'Base 03 Rover A Controller', 6, 3, 8, '4597688', 'DLRS/SOCDS-P/GNSS/24-25/16', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:31:52', '2025-08-19 10:31:52'),
(59, 'Base 03 Rover B Receiver', 6, 3, 7, '4907743', 'DLRS/SOCDS-P/GNSS/24-25/17', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:32:29', '2025-08-19 10:32:29'),
(60, 'Base 03 Rover B Controller', 6, 3, 8, '4597704', 'DLRS/SOCDS-P/GNSS/24-25/18', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:33:01', '2025-08-19 10:33:01'),
(61, 'Base 04 Receiver', 6, 3, 7, '4907764', 'DLRS/SOCDS-P/GNSS/24-25/19', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:35:26', '2025-08-19 10:35:26'),
(62, 'Base 04 Controller', 6, 3, 8, '4597658', 'DLRS/SOCDS-P/GNSS/24-25/20', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:36:01', '2025-08-19 10:36:01'),
(63, 'Base 04 Rover A Receiver', 6, 3, 7, '4907765', 'DLRS/SOCDS-P/GNSS/24-25/21', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:36:40', '2025-08-19 10:36:40'),
(64, 'Base 04 Rover A Controller', 6, 3, 8, '4597683', 'DLRS/SOCDS-P/GNSS/24-25/22', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:37:28', '2025-08-19 10:37:28'),
(65, 'Base 04 Rover B Receiver', 6, 3, 7, '4907774', 'DLRS/SOCDS-P/GNSS/24-25/23', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:38:16', '2025-08-19 10:38:16'),
(66, 'Base 04 Rover B Controller', 6, 3, 8, '4597693', 'DLRS/SOCDS-P/GNSS/24-25/24', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:38:54', '2025-08-19 10:38:54'),
(67, 'Base 05 Receiver', 6, 3, 7, '4907739', 'DLRS/SOCDS-P/GNSS/24-25/25', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:40:11', '2025-08-19 10:40:11'),
(68, 'Base 05 Controller', 6, 3, 8, '4597705', 'DLRS/SOCDS-P/GNSS/24-25/26', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:40:48', '2025-08-19 10:40:48'),
(69, 'Base 05 Rover A Receiver', 6, 3, 7, '4907747', 'DLRS/SOCDS-P/GNSS/24-25/27', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:41:28', '2025-08-19 10:41:28'),
(70, 'Base 05 Rover A Controller', 6, 3, 8, '4597686', 'DLRS/SOCDS-P/GNSS/24-25/28', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:41:55', '2025-08-19 10:41:55'),
(71, 'Base 05 Rover B Receiver', 6, 3, 7, '4907760', 'DLRS/SOCDS-P/GNSS/24-25/29', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:42:30', '2025-08-19 10:42:30'),
(72, 'Base 05 Rover B Controller', 6, 3, 8, '4597694', 'DLRS/SOCDS-P/GNSS/24-25/30', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:43:07', '2025-08-19 10:43:07'),
(73, 'Base 06 Receiver', 6, 3, 7, '4907754', 'DLRS/SOCDS-P/GNSS/24-25/31', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:43:40', '2025-08-19 10:43:40'),
(74, 'Base 06 Controller', 6, 3, 8, '4597690', 'DLRS/SOCDS-P/GNSS/24-25/32', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:44:01', '2025-08-19 10:44:01'),
(75, 'Base 06 Rover A Receiver', 6, 3, 7, '4907769', 'DLRS/SOCDS-P/GNSS/24-25/33', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:44:32', '2025-08-19 10:44:32'),
(76, 'Base 06 Rover A Controller', 6, 3, 8, '4597659', 'DLRS/SOCDS-P/GNSS/24-25/34', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:45:14', '2025-08-19 10:45:14'),
(77, 'Base 06 Rover B Receiver', 6, 3, 7, '4907757', 'DLRS/SOCDS-P/GNSS/24-25/35', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:46:03', '2025-08-19 10:46:03'),
(78, 'Base 06 Rover B Controller', 6, 3, 8, '4596693', 'DLRS/SOCDS-P/GNSS/24-25/36', 'অফিসের স্টোরে', NULL, NULL, NULL, NULL, NULL, '2025-08-19 10:47:22', '2025-08-19 10:47:22');

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
('Ge6XF0WHxOkCHJkGpBT6Zz7AovTgYnEnLtGVhSjg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieDkyeE5QaFQ0dzBnSmVLYUJONXhIdTB0bkx4OFM2d2U1ZDRkakp3UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2R1Y3RzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1756030373);

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
(1, 'Md Moklesar Rahman', 'risingbappy1@gmail.com', NULL, '$2y$12$1Frzt6FQ0qfpjfj3EcvV4ej3.cz.xGKES3xSb.0vvVzlPCWKPq.AK', 'USR', NULL, '2025-08-24 03:39:49', '2025-08-24 03:39:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

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
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenances_product_id_foreign` (`product_id`),
  ADD KEY `maintenances_user_id_foreign` (`user_id`);

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
  ADD KEY `products_model_id_foreign` (`model_id`),
  ADD KEY `products_warranty_end_index` (`warranty_end`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `asset_models`
--
ALTER TABLE `asset_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
