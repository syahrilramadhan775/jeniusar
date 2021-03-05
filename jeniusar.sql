-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2021 pada 11.21
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

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
-- Struktur dari tabel `licence`
--

CREATE TABLE `licence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `licence`
--

INSERT INTO `licence` (`id`, `licence`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '123', 6, NULL, '2021-03-04 07:28:44'),
(2, '12345', 3, '2021-03-04 04:25:03', '2021-03-04 04:25:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Unity', 'c294abb877be71f0a357d6de9892533ecfb688fa6aaaac74d42bbe26b96fec64', '[\"*\"]', NULL, '2021-03-04 03:37:35', '2021-03-04 03:37:35'),
(2, 'App\\Models\\User', 1, 'Unity', '7bf960214b58e80308d6e79dd73a557a6ca57d6e5906f9922614d2b5b0ea08f7', '[\"*\"]', NULL, '2021-03-04 03:40:58', '2021-03-04 03:40:58'),
(3, 'App\\Models\\User', 1, 'Unity', '4783d6a870f7df8ea48fb21001c3d5f8efe11c8b5618e3d9b83c6f09992060cc', '[\"*\"]', NULL, '2021-03-04 03:45:00', '2021-03-04 03:45:00'),
(4, 'App\\Models\\User', 1, 'Unity', 'a629d78a02462b7a4fa0c30f71f9442f814a2ac28cfedb75e10e0a3f93472353', '[\"*\"]', NULL, '2021-03-04 03:45:07', '2021-03-04 03:45:07'),
(5, 'App\\Models\\User', 1, 'Unity', '4678d462ff56b8cf523d6b3e50b7ff7d5538179bbf3ec164963455f7de6a19c7', '[\"*\"]', NULL, '2021-03-04 03:45:22', '2021-03-04 03:45:22'),
(6, 'App\\Models\\User', 1, 'Unity', '4a357ab3f0aa8c796da421da17fb3cf89d2317dde69fbe292058714fee4d55a5', '[\"*\"]', NULL, '2021-03-04 03:45:28', '2021-03-04 03:45:28'),
(7, 'App\\Models\\User', 1, 'Unity', '8f4bb8737b26fd251874bc0e210f659e2e2612a5ef10fd48996823f3bad2c259', '[\"*\"]', NULL, '2021-03-04 03:47:45', '2021-03-04 03:47:45'),
(8, 'App\\Models\\User', 1, 'Unity', 'a10d949627738cf41badcf055e7d57542517f78925aebb894e8a6c28654bb2a1', '[\"*\"]', NULL, '2021-03-04 03:47:51', '2021-03-04 03:47:51'),
(9, 'App\\Models\\User', 1, 'Unity', '69a7dbf2dd2146f6a354b0322f09a91be371a0a735d90434c6abeae270b3c0aa', '[\"*\"]', NULL, '2021-03-04 03:47:59', '2021-03-04 03:47:59'),
(10, 'App\\Models\\User', 1, 'Unity', '25bcec94be2e1d2599fe1f2e39f95024f564ff0919de33eef4c92e616672a784', '[\"*\"]', NULL, '2021-03-04 03:48:03', '2021-03-04 03:48:03'),
(11, 'App\\Models\\User', 1, 'Unity', '845721386b23bb1f01c9027eac8a98cddf8c4c26236c2a4ceb94d049d2ec3132', '[\"*\"]', '2021-03-04 04:16:06', '2021-03-04 04:16:06', '2021-03-04 04:16:06'),
(12, 'App\\Models\\User', 1, 'Unity', 'b5c4d7adf213cd2e1ee529ff4cb3ffe43ae355e5ad85a37d5c1a55102eb0dbeb', '[\"*\"]', '2021-03-04 04:25:38', '2021-03-04 04:25:38', '2021-03-04 04:25:38'),
(13, 'App\\Models\\User', 1, 'Unity', 'dbd85d9074bbf669a82271176d84fd0e056950c1e23d87bd3a269bc893f49d0a', '[\"*\"]', '2021-03-04 04:27:20', '2021-03-04 04:27:20', '2021-03-04 04:27:20'),
(14, 'App\\Models\\User', 1, 'Unity', '55157d7d227ed9a87e770626278ca99669a6911770212079833d06c3406fe913', '[\"*\"]', '2021-03-04 04:45:56', '2021-03-04 04:45:56', '2021-03-04 04:45:56'),
(15, 'App\\Models\\User', 1, 'Unity', '8c11f0ca6cce937f60e9cea155f4ec8dd5c5745457fb60595640b7784b8acdd8', '[\"*\"]', '2021-03-04 04:45:58', '2021-03-04 04:45:58', '2021-03-04 04:45:58'),
(16, 'App\\Models\\User', 1, 'Unity', 'c5287b30e2cc0efe08e5e6f0d960b50ff49648d4f5afa830fb0e93bf54c8b87f', '[\"*\"]', '2021-03-04 04:45:59', '2021-03-04 04:45:59', '2021-03-04 04:45:59'),
(17, 'App\\Models\\User', 1, 'Unity', '26a3eb04fa0cf0ece23d29a28cb0fde968ba2a39757e33d7b609a6a4b6ee816a', '[\"*\"]', '2021-03-04 04:49:09', '2021-03-04 04:45:59', '2021-03-04 04:49:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Testing1', 1, '2021-03-04 03:37:02', '2021-03-04 03:37:02'),
(2, 'Testing2', 2, '2021-03-04 03:38:32', '2021-03-04 03:38:32'),
(3, 'Testing2', 3, '2021-03-04 04:25:19', '2021-03-04 04:25:19'),
(4, 'Testing2', 4, '2021-03-04 04:40:00', '2021-03-04 04:40:00'),
(5, 'Testing2', 5, '2021-03-04 06:03:33', '2021-03-04 06:03:33'),
(6, 'asdf123', 6, '2021-03-04 07:28:44', '2021-03-04 07:28:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CI1IZcUXY9rHqaeb3ox8jOToDVMcwz0Z5v4FIST8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTVzVlJZQUpla050MDh6aDlvOU9sdFdDalA0ZmpBeG5sUVFqUUdJUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1614828704),
('Es4AxjxdRSq2LL81DkR2LVnWBVuu1NN9BpMdhUJa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQldrWjkxYUVOV1BDSW1rTXlIWGFDaldWU2NBMHBkN3VLZmtwNHpYaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly9sb2NhbGhvc3Q6MzAwMC9wcm9maWxlL2NoYW5nZT9lbWFpbD1pa2JsbXVsJTQwZ21haWwuY29tJnRva2VuPXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1614766390);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1@gmail.com', NULL, '$2y$10$Xi4cUA81RtZqPKWqXhVtE.Ph6l5WictATOsLcXKD27da88YMjPs.a', NULL, NULL, NULL, NULL, NULL, '2021-03-04 03:37:02', '2021-03-04 04:46:42'),
(2, 'test2', 'test2@gmail.com', NULL, '$2y$10$pY37rh9DQe1w5RWTvbUNcuILc3OYOcpKtuqcevyG9M/kF4T4WvrzG', NULL, NULL, NULL, NULL, NULL, '2021-03-04 03:38:32', '2021-03-04 03:38:32'),
(3, 'test3', 'test3@gmail.com', '2021-03-04 04:25:19', '$2y$10$LOTwEkk6L.DHiPZyVsxkoOdF2ul6P8rdOasY72f.Om0xDD7fmCkLK', NULL, NULL, NULL, NULL, NULL, '2021-03-04 04:25:19', '2021-03-04 04:25:19'),
(4, 'test4', 'test4@gmail.com', '2021-03-04 04:40:00', '$2y$10$nDUzaEvwNt2J7JFZ31bWZeI3e9o.4OwBwnfnetg1Q3k5jxfQlW7.u', NULL, NULL, NULL, NULL, NULL, '2021-03-04 04:40:00', '2021-03-04 04:40:00'),
(5, 'test45', 'test45@gmail.com', '2021-03-04 06:03:33', '$2y$10$gakPU3lB5DXE43G.g69UfOFwmfOS4WOvoJ2rtgsQ9ar8zhbgsVQKm', NULL, NULL, NULL, NULL, NULL, '2021-03-04 06:03:33', '2021-03-04 06:03:33'),
(6, 'asdf123', 'asdf123', '2021-03-04 07:28:44', '$2y$10$QcwxD0zyc4ZMoYa.QMgZU.VvcKJE/WO8RNEULRko32bjIMXYLKMq2', NULL, NULL, NULL, NULL, NULL, '2021-03-04 07:28:44', '2021-03-04 07:28:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licence_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `licence`
--
ALTER TABLE `licence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `licence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
