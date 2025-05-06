-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 12:22 PM
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
-- Database: `taskmanagement`
--

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
(4, '2024_10_20_064730_create_todo_table', 1),
(5, '2025_01_26_032016_update_todo_table_feedback_feature', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `user_comment` text DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `proof_file_path` varchar(255) DEFAULT NULL,
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `user_id`, `task`, `user_comment`, `is_done`, `proof_file_path`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 2, 'Revisi dreamjob.com', 'ini sedang dikerjakan', 0, 'ini-sedang-166.png', 'coba cek lagi', '2025-04-05 18:04:33', '2025-04-05 19:05:58'),
(3, 2, 'Buat fitur search di bumr', NULL, 0, NULL, NULL, '2025-04-05 18:42:57', '2025-04-05 18:42:57'),
(4, 2, 'Build home koota', NULL, 0, NULL, NULL, '2025-04-05 18:44:44', '2025-04-05 18:44:44'),
(5, 2, 'Packing web samasi', NULL, 0, NULL, NULL, '2025-04-05 18:46:48', '2025-04-05 18:46:48'),
(6, 5, 'Update client report', 'Task completed successfully', 1, 'uploads/proofs/proof_1.jpg', 'Good job!', NULL, NULL),
(7, 6, 'Write unit tests', NULL, 0, NULL, NULL, NULL, NULL),
(8, 2, 'Write unit tests', 'Task completed successfully', 1, 'uploads/proofs/proof_3.jpg', 'Good job!', NULL, NULL),
(9, 6, 'Assist in QA testing', 'Task completed successfully', 1, 'uploads/proofs/proof_4.jpg', 'Good job!', NULL, NULL),
(10, 4, 'Update documentation', NULL, 0, NULL, NULL, NULL, NULL),
(11, 6, 'Optimize database queries', NULL, 0, NULL, NULL, NULL, NULL),
(12, 1, 'Prepare sprint planning', NULL, 0, NULL, NULL, NULL, NULL),
(13, 5, 'Evaluate team performance', NULL, 0, NULL, NULL, NULL, NULL),
(14, 4, 'Refactor codebase', NULL, 0, NULL, NULL, NULL, NULL),
(15, 5, 'Prepare sprint planning', NULL, 0, NULL, NULL, NULL, NULL),
(16, 3, 'Fix UI bug', 'Task completed successfully', 1, 'uploads/proofs/proof_11.jpg', 'Good job!', NULL, NULL),
(17, 2, 'Fix UI bug', 'Task completed successfully', 1, 'uploads/proofs/proof_12.jpg', 'Good job!', NULL, NULL),
(18, 1, 'Evaluate team performance', NULL, 0, NULL, NULL, NULL, NULL),
(19, 3, 'Fix UI bug', NULL, 0, NULL, NULL, NULL, NULL),
(20, 4, 'Fix UI bug', 'Task completed successfully', 1, 'uploads/proofs/proof_15.jpg', 'Good job!', NULL, NULL),
(21, 4, 'Fix UI bug', 'Task completed successfully', 1, 'uploads/proofs/proof_16.jpg', 'Good job!', NULL, NULL),
(22, 3, 'Write unit tests', NULL, 0, NULL, NULL, NULL, NULL),
(23, 2, 'Refactor codebase', 'Task completed successfully', 1, 'uploads/proofs/proof_18.jpg', 'Good job!', NULL, NULL),
(24, 4, 'Assist in QA testing', NULL, 0, NULL, NULL, NULL, NULL),
(25, 6, 'Fix UI bug', 'Task completed successfully', 1, 'uploads/proofs/proof_20.jpg', 'Good job!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture_link` varchar(255) DEFAULT NULL,
  `role` bigint(20) NOT NULL DEFAULT 4,
  `task_count` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `email_verified_at`, `password`, `profile_picture_link`, `role`, `task_count`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'email3@gmail.com', 'Tia', NULL, '$2y$12$IcTNlFx9yGA6Gzq.RQb8yOqWDWzS9jbiKThnrtqEds4ypL14IlzH6', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp', 1, 3, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19'),
(2, 'email4@gmail.com', 'Iqbaal', NULL, '$2y$12$dPaZhsHf2pCLqAC1qoSvne0qjhasgn6IVZ/40WrXdheARsaQ5iDFi', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp', 2, 6, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19'),
(3, 'email1@gmail.com', 'Dhimas', NULL, '$2y$12$01V28IQiIEZwgAuje0v8m.r6xwIiujUgZtr/opgK.Ampl/RDqVDaS', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp', 3, 9, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19'),
(4, 'email5@gmail.com', 'Litha', NULL, '$2y$12$bGkhGqQ1Hjurg7HzQd1Yi.emU73cRMqRltTt0sGDy5PWAAsj4Mlxa', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp', 4, 4, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19'),
(5, 'email43@gmail.com', 'Vira', NULL, '$2y$12$IcTNlFx9yGA6Gzq.RQb8yOqWDWzS9jbiKThnrtqEds4ypL14IlzH6', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp', 1, 2, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19'),
(6, 'email243@gmail.com', 'Anisa', NULL, '$2y$12$IcTNlFx9yGA6Gzq.RQb8yOqWDWzS9jbiKThnrtqEds4ypL14IlzH6', 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp', 4, 2, NULL, '2025-04-05 17:39:19', '2025-04-05 17:39:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todo_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
