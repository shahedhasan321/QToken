-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 11:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue_token`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', '1765432189', '2020-02-24 05:21:02', '2020-02-24 05:21:02'),
(2, 'Shahed', '1765432189', '2020-02-24 05:25:36', '2020-02-24 05:25:36'),
(3, 'Shahed', '1765432189', '2020-02-24 06:42:26', '2020-02-24 06:42:26'),
(4, 'Shahed', '1765432189', '2020-02-24 06:45:27', '2020-02-24 06:45:27'),
(5, 'Shahed', '1765432189', '2020-02-24 06:45:54', '2020-02-24 06:45:54'),
(6, 'Rafiul islam', '1765234333', '2020-02-24 20:07:57', '2020-02-24 20:07:57'),
(7, 'Sabbir', '1735946252', '2020-02-24 22:56:34', '2020-02-24 22:56:34'),
(8, 'Shahed', '1765432189', '2020-02-25 04:39:47', '2020-02-25 04:39:47'),
(9, 'Sabbir', '1735946252', '2020-02-25 07:03:12', '2020-02-25 07:03:12'),
(10, 'Rafiul islam', '1765432189', '2020-03-02 04:20:51', '2020-03-02 04:20:51'),
(11, 'Sazim', '1765234333', '2020-03-03 03:43:32', '2020-03-03 03:43:32'),
(12, 'Hasan', '1765234333', '2020-03-03 05:39:10', '2020-03-03 05:39:10'),
(13, 'Sazim', '1827272720', '2020-03-07 07:17:35', '2020-03-07 07:17:35'),
(14, 'ekjog', '1301348316', '2020-03-09 20:36:31', '2020-03-09 20:36:31'),
(15, 'ekjog', '1301348316', '2020-03-09 20:49:42', '2020-03-09 20:49:42'),
(16, 'ekjog', '1301348316', '2020-03-09 20:51:51', '2020-03-09 20:51:51'),
(17, 'ekjog', '1301348316', '2020-03-09 20:52:06', '2020-03-09 20:52:06'),
(18, 'ekjog', '1301348316', '2020-03-09 20:54:38', '2020-03-09 20:54:38'),
(19, 'sadhin', '1301348316', '2020-03-10 05:43:36', '2020-03-10 05:43:36'),
(20, 'Sabbir', '01735946252', '2020-03-23 00:01:44', '2020-03-23 00:01:44'),
(21, 'sadhin', '01301348316', '2020-03-26 20:51:25', '2020-03-26 20:51:25'),
(22, 'Hasan', '01837189062', '2020-03-26 21:44:10', '2020-03-26 21:44:10'),
(23, 'ekjog', '01301348316', '2020-03-26 21:45:23', '2020-03-26 21:45:23'),
(24, 'Akash', '01555555556', '2020-03-26 21:47:21', '2020-03-26 21:47:21'),
(25, 'ekjog', '01301348316', '2020-03-26 21:48:08', '2020-03-26 21:48:08'),
(26, 'ekjog', '01301348316', '2020-03-26 21:48:52', '2020-03-26 21:48:52'),
(27, 'sadhin', '01837189062', '2020-03-26 21:49:49', '2020-03-26 21:49:49'),
(28, 'sadhin', '01837189062', '2020-03-26 21:50:25', '2020-03-26 21:50:25'),
(29, 'Rashed', '01929929955', '2020-04-01 01:53:46', '2020-04-01 01:53:46'),
(30, 'Afrin', '01825751787', '2020-04-01 02:04:18', '2020-04-01 02:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `counter_no`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'First Counter', 'active', '2020-02-24 05:20:28', '2020-02-24 05:20:28'),
(2, 'C003', 'Computer Department', 'active', '2020-03-02 04:25:14', '2020-03-02 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'Mobile Department', 'active', '2020-02-24 05:19:49', '2020-02-24 05:19:49'),
(2, 'Computer', 'Computer Department', 'active', '2020-03-02 04:25:53', '2020-03-26 02:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2020_02_01_162042_create_tokens_table', 1),
(26, '2020_02_01_162336_create_clients_table', 1),
(27, '2020_02_01_162645_create_departments_table', 1),
(28, '2020_02_01_162808_create_counters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `token_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token_no`, `client_id`, `dept_id`, `counter_no`, `status`, `created_at`, `updated_at`) VALUES
(7, '7119', '9', '1', '1', 'in-process', '2020-02-25 07:03:12', '2020-03-07 23:26:58'),
(8, '81110', '10', '1', '1', 'stop', '2020-03-02 04:20:51', '2020-03-07 23:35:06'),
(9, '91211', '11', '1', '2', 'complete', '2020-03-03 03:43:32', '2020-03-07 23:57:51'),
(10, '101112', '12', '1', '1', 'complete', '2020-03-03 05:39:10', '2020-03-07 23:58:35'),
(11, '2213', '13', '2', '2', 'complete', '2020-03-07 07:17:36', '2020-03-09 20:47:57'),
(12, '1114', '14', '1', '1', 'in-process', '2020-03-09 20:36:31', '2020-03-09 20:37:09'),
(13, '1115', '15', '1', '1', 'complete', '2020-03-09 20:49:42', '2020-03-09 20:52:37'),
(14, '1116', '16', '1', '1', 'complete', '2020-03-09 20:51:51', '2020-03-09 20:52:46'),
(15, '1117', '17', '1', '1', 'in-process', '2020-03-09 20:52:06', '2020-03-09 20:53:46'),
(16, '1118', '18', '1', '1', 'complete', '2020-03-09 20:54:38', '2020-03-17 00:42:35'),
(18, '2220', '20', '2', '2', 'complete', '2020-03-23 00:01:44', '2020-03-26 20:51:48'),
(19, '1121', '21', '1', '1', 'complete', '2020-03-26 20:51:25', '2020-03-26 21:40:27'),
(20, '1122', '22', '1', '1', 'complete', '2020-03-26 21:44:10', '2020-03-26 21:50:43'),
(21, '2223', '23', '2', '2', 'complete', '2020-03-26 21:45:23', '2020-03-26 21:52:31'),
(22, '1124', '24', '1', '1', 'complete', '2020-03-26 21:47:21', '2020-04-01 02:53:15'),
(23, '1125', '25', '1', '1', 'complete', '2020-03-26 21:48:08', '2020-03-26 22:02:52'),
(24, '1126', '26', '1', '1', 'complete', '2020-03-26 21:48:52', '2020-03-26 21:56:26'),
(25, '2227', '27', '2', '2', 'complete', '2020-03-26 21:49:49', '2020-03-26 21:55:25'),
(26, '1128', '28', '1', '1', 'complete', '2020-03-26 21:50:25', '2020-03-26 21:54:01'),
(27, '1129', '29', '1', '1', 'complete', '2020-04-01 01:53:47', '2020-04-01 01:54:02'),
(28, '1130', '30', '1', '1', 'pending', '2020-04-01 02:04:18', '2020-04-01 02:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shahed', 'admin@gmail.com', NULL, '1722718990', '$2y$10$HD3v1Wl5ms8qoi8A2kb02uxxCL8D4GpHEpn7a8uWtJWx9nQpFu4w2', 'admin', '5vtCP4tydWRjIrHqMkY1I2uhBxyulDWwuwnyG20MwBVr2z1OU9wEBY78dwR0', '2020-02-24 05:12:01', '2020-02-24 05:12:01'),
(2, 'Sadhin', 'sadhin@gmail.com', NULL, '1912634522', '$2y$10$ZPicWyWwdh3Oewj5X1j/buSTUTm0QLp7u4aWnXQtCbMIBmEIf4yai', 'officer', NULL, '2020-02-26 03:46:41', '2020-02-26 03:46:41'),
(3, 'Shahed', 'hasan@gmail.com', NULL, '1627828730', '$2y$10$xTHOJu4H9N3eDK/b0/Hxmu4DlvcEP4ixuddUQuDVIufEUZnYvsYXO', 'staff', NULL, '2020-02-26 03:47:32', '2020-02-26 03:47:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
