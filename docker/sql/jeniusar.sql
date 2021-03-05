-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 06:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeniusar`
--

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`id`, `licence`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 'hn257pzqzri4', 1, '2021-02-25 01:23:29', '2021-02-25 01:23:29'),
(12, 'nrnhtcakkvd1', 4, '2021-02-25 01:26:11', '2021-02-25 01:26:11'),
(13, 'rihobcrxacrm', 5, '2021-02-25 01:26:12', '2021-02-25 01:26:12'),
(14, 'rkc2rwek14iz', NULL, '2021-02-25 01:26:15', '2021-02-25 01:26:15'),
(15, 'axkjl3ityxfi', NULL, '2021-02-25 01:26:18', '2021-02-25 01:26:18'),
(16, 'rfyggnwxm0yn', NULL, '2021-02-25 01:26:20', '2021-02-25 01:26:20'),
(17, 'avvz3osmap1x', NULL, '2021-02-25 01:26:21', '2021-02-25 01:26:21'),
(18, 'exessovp1k5y', NULL, '2021-02-25 01:42:20', '2021-02-25 01:42:20'),
(19, 'axj1qrkjgheu', NULL, '2021-02-25 02:48:21', '2021-02-25 02:48:21'),
(20, 'h8bwcwvrtr2r', NULL, '2021-02-25 02:57:05', '2021-02-25 02:57:05'),
(24, '2cutrrcoazrs', NULL, '2021-02-26 04:07:15', '2021-02-26 04:07:15'),
(25, '2cutrrcoazss', NULL, '2021-02-26 04:07:27', '2021-02-26 04:07:27'),
(26, 'nilgqf4s48u6', NULL, '2021-03-01 07:22:32', '2021-03-01 07:22:32');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_17_095654_jeniusar', 1),
(6, '2021_02_17_033213_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'test', 'f1eeab8e9446b3fcae11627e7fd4e5ce6321d79fc1892aaab60a3727ad00ee73', '[\"*\"]', NULL, '2021-03-04 06:01:21', '2021-03-04 06:01:21'),
(4, 'App\\Models\\User', 1, 'test', '431f30109b123079fa5ec274752396abe8e737dec0273ae66c0d2e1faf09a7bd', '[\"*\"]', NULL, '2021-03-04 06:02:17', '2021-03-04 06:02:17'),
(5, 'App\\Models\\User', 1, 'Set Name Mail', '5f0640d9a21c57dd424494367c52f090a3b52ebbc9c06e647004de9ee09d0b2f', '[\"*\"]', NULL, '2021-03-04 09:34:59', '2021-03-04 09:34:59'),
(6, 'App\\Models\\User', 1, 'Set Name Mail', 'd98bd11fdbc2a7ef44f3847f79b9a67bb7e43c6c2467ff09c9baf8b51abe1f21', '[\"*\"]', NULL, '2021-03-04 09:42:29', '2021-03-04 09:42:29'),
(7, 'App\\Models\\User', 1, 'Set Name Mail', '37336f284152fbf9c99401bbf3dc4c5773328b8e70e24df3e83bea39b06e3dc5', '[\"*\"]', NULL, '2021-03-04 09:43:33', '2021-03-04 09:43:33'),
(8, 'App\\Models\\User', 1, 'Set Name Mail', 'de1afa068008731564ed2cbaffb9ae562a26b2064ea5b4fc67dfc8d8239ddd3b', '[\"*\"]', NULL, '2021-03-04 09:44:20', '2021-03-04 09:44:20'),
(9, 'App\\Models\\User', 1, 'Set Name Mail', 'c73c35f565edf980a336adef8ca1f73bee071f14a9e6fa6efa7f2cc7c3b99e05', '[\"*\"]', NULL, '2021-03-04 09:48:30', '2021-03-04 09:48:30'),
(10, 'App\\Models\\User', 1, 'Set Name Mail', 'cbe627ea25292dd2f0397131b5201d3e3954cb239e92230f472ca309dcb2f487', '[\"*\"]', NULL, '2021-03-04 09:50:19', '2021-03-04 09:50:19'),
(11, 'App\\Models\\User', 1, 'Set Name Mail', 'e7817dd8f4e709dda4751efd3223bc1e9f7375589e59db93429f6c07c24b8a26', '[\"*\"]', NULL, '2021-03-04 09:51:51', '2021-03-04 09:51:51'),
(12, 'App\\Models\\User', 1, 'Set Name Mail', '54b5afcec9bfb606ae7a8afbda8d14ca389bc7b44c914d31d8b03ad8c4fbbd14', '[\"*\"]', NULL, '2021-03-04 09:55:07', '2021-03-04 09:55:07'),
(13, 'App\\Models\\User', 1, 'Set Name Mail', 'edf1db38af94ed375edd1345a2484b0670cdd6f6827c9157ef6bf72fa4289a96', '[\"*\"]', NULL, '2021-03-04 09:56:41', '2021-03-04 09:56:41'),
(14, 'App\\Models\\User', 1, 'Set Name Mail', '1ffa1320139644ab5c470217121e695b577b2fb11791ea6faeccddbe30a27f20', '[\"*\"]', NULL, '2021-03-04 09:57:39', '2021-03-04 09:57:39'),
(15, 'App\\Models\\User', 1, 'Set Name Mail', 'b2c9ef0573f5dfdf386d1f29342cef10b8ec6826b7a3926856947ef4562bdaeb', '[\"*\"]', NULL, '2021-03-04 10:06:18', '2021-03-04 10:06:18'),
(16, 'App\\Models\\User', 1, 'Set Name Mail', '81d3e40a51c72cbe3504d2ab0c7b3cdfbcc1e1ab12be96eb1c94a9fd07f90f29', '[\"*\"]', NULL, '2021-03-04 10:08:07', '2021-03-04 10:08:07'),
(17, 'App\\Models\\User', 1, 'Set Name Mail', '033c6cf4485012a31b663feaab597cc7122199d6fc6a3b5391f1198bcd888db1', '[\"*\"]', NULL, '2021-03-04 10:11:04', '2021-03-04 10:11:04'),
(18, 'App\\Models\\User', 1, 'Set Name Mail', '7925d3767b88d6e0432cabf8fde38e3c33f642eebd2932b2f4e632a649daea75', '[\"*\"]', NULL, '2021-03-04 10:14:03', '2021-03-04 10:14:03'),
(19, 'App\\Models\\User', 1, 'Set Name Mail', '331c47923efcc5a151057b271f2cecdd8ddfd6680cb997d5252ba1b7ffa4aef5', '[\"*\"]', NULL, '2021-03-04 10:16:44', '2021-03-04 10:16:44'),
(20, 'App\\Models\\User', 1, 'Set Name Mail', '3ac3e176a475e3fdbe7129e8d72ef04551b5b3a3c96000e9015b1e0442f493f0', '[\"*\"]', NULL, '2021-03-04 10:17:29', '2021-03-04 10:17:29'),
(21, 'App\\Models\\User', 1, 'Set Name Mail', 'ff522accdd69207b8f3921082caf82599c68893c59c6bac0ffe29eb42ae26efa', '[\"*\"]', NULL, '2021-03-04 10:17:54', '2021-03-04 10:17:54'),
(22, 'App\\Models\\User', 1, 'Set Name Mail', '51d4a1397084be97c4c12381707d46ebd36971bf1275c13e59c559f5048ab23c', '[\"*\"]', NULL, '2021-03-04 10:18:38', '2021-03-04 10:18:38'),
(23, 'App\\Models\\User', 1, 'Set Name Mail', '6c2fa03c00656cb0a50cf9d857bab82d074c64e58f17ac354982b23864ffd9d4', '[\"*\"]', NULL, '2021-03-04 10:19:12', '2021-03-04 10:19:12'),
(24, 'App\\Models\\User', 1, 'Set Name Mail', 'a90267b6ec1b5ead8a9738f8d71e06aa4784fbf379c3aaa334daf9089e81c10e', '[\"*\"]', NULL, '2021-03-04 10:19:37', '2021-03-04 10:19:37'),
(25, 'App\\Models\\User', 1, 'Set Name Mail', '9bbc644dab1c6cf69b4ed42f6fda9fbe76b495a0cdff7f46f8d228fb1f1206a8', '[\"*\"]', NULL, '2021-03-04 10:23:12', '2021-03-04 10:23:12'),
(26, 'App\\Models\\User', 1, 'Set Name Mail', '67ad8807856a9f96c96738b1a64e3b8b1d60597d165c61457f55f60f0bc2bcd7', '[\"*\"]', NULL, '2021-03-05 03:07:31', '2021-03-05 03:07:31'),
(27, 'App\\Models\\User', 1, 'Set Name Mail', '2d2dbb177e1bc1150e1709dac5cf4373f87d86951a06a739c900f20b7aa449da', '[\"*\"]', NULL, '2021-03-05 03:08:15', '2021-03-05 03:08:15'),
(28, 'App\\Models\\User', 1, 'Set Name Mail', 'd98b976ff6e5172b47c21ca7f8bcdada27687cc7f88f39e222196f046341f926', '[\"*\"]', NULL, '2021-03-05 03:10:04', '2021-03-05 03:10:04'),
(29, 'App\\Models\\User', 1, 'Set Name Mail', '90e2e94f57df72e26e84db10a73eb84499ce8d0de6b24c3f6a0133bb08af9ba5', '[\"*\"]', NULL, '2021-03-05 03:11:10', '2021-03-05 03:11:10'),
(30, 'App\\Models\\User', 1, 'Set Name Mail', '6e65342f25895fca0efe386346362b3352c531acfe9d87cf46cb6e43ddeab92c', '[\"*\"]', NULL, '2021-03-05 03:13:31', '2021-03-05 03:13:31'),
(31, 'App\\Models\\User', 1, 'Set Name Mail', '70b0bb15c942389371eb5394fb07b88f860c00504bfb0e32e5cdae6269bfcb32', '[\"*\"]', NULL, '2021-03-05 03:14:26', '2021-03-05 03:14:26'),
(32, 'App\\Models\\User', 1, 'Set Name Mail', '326d2ba3b8dcab59d228f8fc6f0d4f413af99a4fd15a199def97b0489012e87c', '[\"*\"]', NULL, '2021-03-05 03:15:55', '2021-03-05 03:15:55'),
(33, 'App\\Models\\User', 1, 'Set Name Mail', 'c9897e3322bb66256a315634ffb1f305ab9f00024892d75541991ce7c86b419d', '[\"*\"]', NULL, '2021-03-05 03:23:19', '2021-03-05 03:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Helloword', 1, NULL, '2021-03-04 06:23:14'),
(4, 'Localhost:8000', 4, '2021-03-02 04:08:26', '2021-03-02 04:08:26'),
(5, 'Hello World', 5, '2021-03-02 04:09:28', '2021-03-02 04:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tHfiIUTIXaBKO2wpBZofM3YKbhz1duzp5m0LOYf9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDVzdlFPYk1Pa1RYbzJFVW92QnlBMnFoYzJpeDN5Mm1LWmZWMGQxVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI3OiJodHRwOi8vMTI3LjAuMC4xOjkwOTAvcmVzZXQtcGFzc3dvcmQvZWQ3NTIxZTliYTc2NzRhMGJhMzUyNTM3ZTU4NjM2YjIzODYzNmFmNTBiNzQ0YzBkZmY4NmQ1ZGY4MDgyNzEyNj9lbWFpbD1pa2JsbXVsJTQwZ21haWwuY29tIjt9fQ==', 1614917271),
('YfV1M5Q2u24uFXQE60QDQGuyUsDB57Af81B2VVI2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkNDNURVZUJtZ3BYQzF3ZzhrVExIUnVYdjlDRjZabmFtdDFucHJtUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJsb2dnZWQiO2E6MTp7aTowO2I6MTt9fQ==', 1614914942);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'ikbalmull', 'ikblmul@gmail.com', NULL, '$2y$10$51lWFcxQzIj0x4N7zv3dBuQHOhVMDRM6qDqh2yt1fcXZKrm/Vtu0u', NULL, NULL, 'O6AySrCpMVxHRPkgzub369uPB2SwZsWoTIKW8s2BOBgfUaonuOMGn4SVMfLB', NULL, NULL, '2021-02-24 21:32:41', '2021-03-05 04:07:50'),
(4, 'localhost', 'localhost@localhost.com', NULL, '$2y$10$vkyiRXM8EZpK10.ZASoFSO59i1AYICkz18rUi5kP6qOtP8J8P.XAi', NULL, NULL, NULL, NULL, NULL, '2021-03-02 04:08:26', '2021-03-02 04:08:26'),
(5, 'helloworld', 'helloworld@gmail.com', NULL, '$2y$10$SnIZIAVoez85jwAtWzf4jedX6Ep5aXFMiTd2TwBv5Cr6CIcFZWBba', NULL, NULL, NULL, NULL, NULL, '2021-03-02 04:09:28', '2021-03-02 04:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licence_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `email` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `licence`
--
ALTER TABLE `licence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `licence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
