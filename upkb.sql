-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 02:57 PM
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
-- Database: `upkb`
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
-- Table structure for table `elauns`
--

CREATE TABLE `elauns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `elaun_bulanan` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `imej` varchar(255) NOT NULL,
  `penerangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institusis`
--

CREATE TABLE `institusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jenis_institusi` varchar(255) DEFAULT NULL,
  `gambar_institusi` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `mengenai_institusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `kerjayas`
--

CREATE TABLE `kerjayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `bidang_kerjaya` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kursuses`
--

CREATE TABLE `kursuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `nama_kursus` varchar(255) NOT NULL,
  `jenis_kursus` varchar(255) NOT NULL,
  `mod_pengajian` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `kuota` int(11) DEFAULT NULL,
  `tarikh_pendaftaran` date DEFAULT NULL,
  `penerangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `emel` varchar(255) NOT NULL,
  `perkara` varchar(255) NOT NULL,
  `mesej` longtext NOT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `nama`, `emel`, `perkara`, `mesej`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'manusia yang berotak', 'aralkashah@student.usm.my', 'maksud tvet', 'apa maksud tvet saya tak faham wlaupon otak ada', 'ko bodo', '2026-04-05 22:52:26', '2026-04-05 22:56:01');

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
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2025_04_06_000000_create_messages_table', 1),
(9, '2026_04_03_101232_create_programs_table', 2),
(10, '2026_04_03_101236_create_institusis_table', 2),
(11, '2026_04_03_101239_create_kursuses_table', 2),
(12, '2026_04_03_101244_create_silibuses_table', 2),
(13, '2026_04_03_101247_create_kerjayas_table', 2),
(14, '2026_04_03_101251_create_yuran_pendaftarans_table', 2),
(15, '2026_04_03_101254_create_yuran_asramas_table', 2),
(16, '2026_04_03_101302_create_yuran_pilihans_table', 2),
(17, '2026_04_03_101305_create_yuran_pengajians_table', 2),
(18, '2026_04_03_101308_create_elauns_table', 2),
(19, '2026_04_03_101312_create_galeris_table', 2),
(20, '2026_04_03_114635_drop_kod_institusi_from_programs_table', 2),
(21, '2026_04_04_000000_update_institusis_table_add_gambar_and_rename_jenis', 3),
(22, '2025_04_06_000001_add_comment_to_messages_table', 4),
(23, '2026_04_07_000001_fix_programs_id_auto_increment', 5),
(24, '2026_04_07_000002_fix_auto_increment_ids', 6),
(25, '2026_04_07_000003_fix_kursuses_id_auto_increment', 7),
(26, '2026_04_07_000004_nullable_tarikh_pendaftaran_on_kursuses', 8),
(27, '2026_04_07_000005_fix_missing_auto_increment_on_child_tables', 9),
(28, '2026_04_04_000001_update_galeris_add_penerangan_drop_kod_khusus', 10),
(29, '2026_04_05_000000_create_syarat_kelayakans_table', 11),
(30, '2026_04_07_000000_make_kuota_and_tarikh_pendaftaran_nullable_in_kursuses_table', 11),
(31, '2026_04_07_000006_rename_kod_khusus_to_kod_kursus_in_child_tables', 11),
(32, '2026_04_07_123032_fix_yuran_asramas_id_auto_increment', 12),
(33, '2026_04_07_124937_fix_messages_id_auto_increment', 13);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_program` varchar(255) NOT NULL,
  `info_program` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `jenis_program`, `info_program`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'TVET', 'Pendidikan Teknikal dan Latihan Vokasional untuk kerjaya berasaskan kemahiran industri.', 'fas fa-tools', '2026-04-07 00:32:34', '2026-04-07 00:32:34'),
(2, 'Diploma', 'Program Akademik dan Profesional untuk laluan ke peringkat ijazah dan kerjaya profesional.', 'fas fa-graduation-cap', '2026-04-07 00:33:17', '2026-04-07 00:33:17'),
(3, 'Sains Kesihatan', 'Program Sains Kesihatan untuk pembangunan kompetensi klinikal dan penyelidikan dalam bidang kesihatan.', 'fas fa-heartbeat', '2026-04-07 00:33:39', '2026-04-07 00:33:39');

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
('1jKncZ7zePJtlX5gqnbI2tGjFclOTn1BhMrwNUsR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNEJrY0VOYm1EMXltSWxtMG56a0V5Wk9vV1MxN1ZaanlUMm5IN0hWWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775563686),
('e3gGRq6STuOEL1rsqbGtP3dQ9ouwY0mA8FS9mcJg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZFNnOXVXYUo0NGZqYzQ4ZmJ0WU8zQmNOejZPWkhTUlRxMVFxWTZQdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775565528),
('Vk3QkYb3rzORyLCGfXf8EeEFWqMWTgJx5NMBlA1i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYlhrdDZrSExWajVzRGZWbEJnc0pIeHN1bWNqMlByZGRSMVVKV1JpbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775565752),
('gIKyGuYLzb2JRiLpuUuPgq1xToW8l81YW6CpaUtF', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR2pES3JLSmRnWlVKdFRtZ3UydVFnd2ZId3hQNjN6Q2tteWtQbVpNdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbnN0aXR1c2lzIjtzOjU6InJvdXRlIjtzOjE2OiJhZG1pbi5pbnN0aXR1c2lzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1775566632);

-- --------------------------------------------------------

--
-- Table structure for table `silibuses`
--

CREATE TABLE `silibuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `isi_kandungan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syarat_kelayakans`
--

CREATE TABLE `syarat_kelayakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `syarat_kelayakan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarat_kelayakans`
--

INSERT INTO `syarat_kelayakans` (`id`, `kod_institusi`, `kod_kursus`, `syarat_kelayakan`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', 'layak', '2026-04-04 21:30:55', '2026-04-04 21:30:55'),
(2, 'T3ST1NG', '1234', 'orang', '2026-04-07 04:05:48', '2026-04-07 04:05:48'),
(3, 'T3ST1NG', '1234', 'aa', '2026-04-07 04:37:51', '2026-04-07 04:37:51');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@mail.com', NULL, '$2y$12$5jeutrlTSjDNtiP6u9jWFuin2RJk8X1wy5cnWqbkAbtNlkwexjTVW', NULL, '2026-04-03 03:50:09', '2026-04-03 03:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `yuran_asramas`
--

CREATE TABLE `yuran_asramas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pendaftarans`
--

CREATE TABLE `yuran_pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pengajians`
--

CREATE TABLE `yuran_pengajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `peringkat` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pilihans`
--

CREATE TABLE `yuran_pilihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_kursus` varchar(255) NOT NULL,
  `pilihan` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `elauns`
--
ALTER TABLE `elauns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institusis`
--
ALTER TABLE `institusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerjayas`
--
ALTER TABLE `kerjayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursuses`
--
ALTER TABLE `kursuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silibuses`
--
ALTER TABLE `silibuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_kelayakans`
--
ALTER TABLE `syarat_kelayakans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yuran_asramas`
--
ALTER TABLE `yuran_asramas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yuran_pendaftarans`
--
ALTER TABLE `yuran_pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yuran_pengajians`
--
ALTER TABLE `yuran_pengajians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yuran_pilihans`
--
ALTER TABLE `yuran_pilihans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elauns`
--
ALTER TABLE `elauns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institusis`
--
ALTER TABLE `institusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kerjayas`
--
ALTER TABLE `kerjayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kursuses`
--
ALTER TABLE `kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `silibuses`
--
ALTER TABLE `silibuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syarat_kelayakans`
--
ALTER TABLE `syarat_kelayakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yuran_asramas`
--
ALTER TABLE `yuran_asramas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yuran_pendaftarans`
--
ALTER TABLE `yuran_pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yuran_pengajians`
--
ALTER TABLE `yuran_pengajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yuran_pilihans`
--
ALTER TABLE `yuran_pilihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
