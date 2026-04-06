-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 01:59 AM
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
  `kod_khusus` varchar(255) NOT NULL,
  `elaun_bulanan` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elauns`
--

INSERT INTO `elauns` (`id`, `kod_institusi`, `kod_khusus`, `elaun_bulanan`, `tempoh`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', '12345', '2 Tahun', 12345.00, '2026-04-04 21:30:41', '2026-04-04 21:30:41');

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

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `kod_institusi`, `imej`, `penerangan`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'images/galeri/t3st1ng-1775277289.jpeg', 'perpustakaan', '2026-04-03 20:34:49', '2026-04-03 20:34:49'),
(2, '1010', 'images/galeri/1010-1775277422.jpeg', 'meeting', '2026-04-03 20:37:02', '2026-04-03 20:37:02');

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

--
-- Dumping data for table `institusis`
--

INSERT INTO `institusis` (`id`, `kod_institusi`, `nama_institusi`, `jenis_institusi`, `gambar_institusi`, `alamat`, `mengenai_institusi`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'Test Lorem Ipsum', 'TVET', 'images/institusi/test-lorem-ipsum-1775274837.jpeg', 'Jasin, Melaka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut libero urna. Nam lorem ipsum, euismod vel molestie at, finibus ut sapien. Cras congue auctor sapien, quis condimentum arcu. Fusce porta magna sed dolor viverra interdum. Donec consectetur neque vel libero eleifend, posuere feugiat eros commodo. Phasellus dictum sollicitudin odio, eu porttitor nibh blandit at. Proin et neque non massa blandit imperdiet. Vestibulum eleifend sapien ac enim euismod varius. Sed tincidunt orci porta, facilisis nisl non, gravida nunc. Quisque viverra, nunc ut molestie euismod, turpis ligula ullamcorper elit, nec tincidunt nisi mi at justo. Fusce ac justo sed turpis tristique accumsan. Maecenas efficitur nibh at posuere ultrices.', '2026-04-03 19:53:57', '2026-04-03 19:53:57'),
(3, '1010', '1', '1', 'images/institusi/1-1775277400.jpeg', 'malaysia', '12345678', '2026-04-03 20:36:40', '2026-04-03 20:36:40');

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
  `kod_khusus` varchar(255) NOT NULL,
  `bidang_kerjaya` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerjayas`
--

INSERT INTO `kerjayas` (`id`, `kod_institusi`, `kod_khusus`, `bidang_kerjaya`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', 'manusia', '2026-04-04 21:31:13', '2026-04-04 21:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `khususes`
--

CREATE TABLE `khususes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `nama_khusus` varchar(255) NOT NULL,
  `jenis_khusus` varchar(255) NOT NULL,
  `mod_pengajian` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `tarikh_pendaftaran` date NOT NULL,
  `penerangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khususes`
--

INSERT INTO `khususes` (`id`, `kod_khusus`, `kod_institusi`, `nama_khusus`, `jenis_khusus`, `mod_pengajian`, `tempoh`, `kuota`, `tarikh_pendaftaran`, `penerangan`, `created_at`, `updated_at`) VALUES
(1, 'F432-005-2:2019', '1010', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK', 'TVET', 'TAHAP 2 / TAHAP 3', '2 Tahun', 10, '2026-04-23', 'Program Pemasangan & Penyelenggaraan Elektrik direka untuk melatih pelajar dalam kemahiran teknikal pendawaian elektrik domestik dan industri. Melalui latihan amali yang intensif, pelajar akan menguasai teknik pemasangan sistem satu fasa dan tiga fasa, penyelenggaraan perkakas suis, serta pengujian litar mengikut piawaian Suruhanjaya Tenaga. Program ini menyediakan landasan kukuh bagi melahirkan teknisi yang kompeten untuk memenuhi keperluan sektor pembinaan dan fasiliti negara.', '2026-04-03 20:39:19', '2026-04-03 20:39:19'),
(2, 'F432-005-2:2019', 'T3ST1NG', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK', 'TAHAP 2', 'FULL TIME', '2 Tahun', 10, '2026-04-29', '1234567890', '2026-04-04 21:16:13', '2026-04-04 21:16:13');

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
(4, '2026_04_03_101232_create_programs_table', 2),
(5, '2026_04_03_101236_create_institusis_table', 2),
(6, '2026_04_03_101239_create_khususes_table', 2),
(7, '2026_04_03_101244_create_silibuses_table', 2),
(8, '2026_04_03_101247_create_kerjayas_table', 2),
(9, '2026_04_03_101251_create_yuran_pendaftarans_table', 2),
(10, '2026_04_03_101254_create_yuran_asramas_table', 2),
(11, '2026_04_03_101302_create_yuran_pilihans_table', 2),
(12, '2026_04_03_101305_create_yuran_pengajians_table', 2),
(13, '2026_04_03_101308_create_elauns_table', 2),
(14, '2026_04_03_101312_create_galeris_table', 2),
(15, '2026_04_03_114635_drop_kod_institusi_from_programs_table', 3),
(16, '2026_04_04_000000_update_institusis_table_add_gambar_and_rename_jenis', 3),
(17, '2026_04_04_000001_update_galeris_add_penerangan_drop_kod_khusus', 4),
(18, '2026_04_05_000000_create_syarat_kelayakans_table', 5);

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
(1, 'TVET', 'Pendidikan Teknikal dan Latihan Vokasional untuk kerjaya berasaskan kemahiran industri.', 'fas fa-tools', '2026-04-03 03:47:43', '2026-04-03 04:08:51'),
(2, 'Diploma', 'Program Akademik dan Profesional untuk laluan ke peringkat ijazah dan kerjaya profesional.', 'fas fa-graduation-cap', '2026-04-03 03:47:43', '2026-04-03 03:47:43'),
(3, 'Sains Kesihatan', 'Program Sains Kesihatan untuk pembangunan kompetensi klinikal dan penyelidikan dalam bidang kesihatan.', 'fas fa-heartbeat', '2026-04-03 03:47:43', '2026-04-03 03:47:43');

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
('bwARgQouwNyIzlZyQ9r2hJHGjEWCcC7hHJS4FQlS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUTlqM1JTZWxzcWx6MWxwTEVFNXBtY0h5NkxJN1pHcnBzZ0o5RGpTMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2h1c3VzLzIiO3M6NToicm91dGUiO3M6MTE6ImtodXN1cy5zaG93Ijt9fQ==', 1775370333),
('MsJy9SP15oJY6xL6LS6McEvQIBhJJfkuxXKjmcDc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYUI0R2h0UUVwczUzSk9HRlMxY3M4Ylk1b2cwVkd4WHBXTldlTlZwViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775369541);

-- --------------------------------------------------------

--
-- Table structure for table `silibuses`
--

CREATE TABLE `silibuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `isi_kandungan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silibuses`
--

INSERT INTO `silibuses` (`id`, `kod_institusi`, `kod_khusus`, `topik`, `isi_kandungan`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', '1', 'blah', '2026-04-04 21:31:06', '2026-04-04 21:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_kelayakans`
--

CREATE TABLE `syarat_kelayakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `syarat_kelayakan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarat_kelayakans`
--

INSERT INTO `syarat_kelayakans` (`id`, `kod_institusi`, `kod_khusus`, `syarat_kelayakan`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', 'layak', '2026-04-04 21:30:55', '2026-04-04 21:30:55');

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
  `kod_khusus` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yuran_asramas`
--

INSERT INTO `yuran_asramas` (`id`, `kod_institusi`, `kod_khusus`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', 'baju', 52.00, '2026-04-04 21:32:09', '2026-04-04 21:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pendaftarans`
--

CREATE TABLE `yuran_pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yuran_pendaftarans`
--

INSERT INTO `yuran_pendaftarans` (`id`, `kod_institusi`, `kod_khusus`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', 'baju', 5.00, '2026-04-04 21:31:37', '2026-04-04 21:31:37'),
(2, 'T3ST1NG', 'F432-005-2:2019', 'baju ke 2', 55.00, '2026-04-04 22:02:22', '2026-04-04 22:02:22'),
(3, 'T3ST1NG', 'F432-005-2:2019', 'baju ke 2', 55.00, '2026-04-04 22:02:25', '2026-04-04 22:02:25'),
(4, 'T3ST1NG', 'F432-005-2:2019', 'makan', 5.00, '2026-04-04 22:02:38', '2026-04-04 22:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pengajians`
--

CREATE TABLE `yuran_pengajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `peringkat` varchar(255) NOT NULL,
  `tempoh` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yuran_pengajians`
--

INSERT INTO `yuran_pengajians` (`id`, `kod_institusi`, `kod_khusus`, `peringkat`, `tempoh`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', '123', '2 Tahun', 5.00, '2026-04-04 21:32:23', '2026-04-04 21:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `yuran_pilihans`
--

CREATE TABLE `yuran_pilihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kod_institusi` varchar(255) NOT NULL,
  `kod_khusus` varchar(255) NOT NULL,
  `pilihan` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yuran_pilihans`
--

INSERT INTO `yuran_pilihans` (`id`, `kod_institusi`, `kod_khusus`, `pilihan`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'T3ST1NG', 'F432-005-2:2019', '12', '123', 1234.00, '2026-04-04 21:31:51', '2026-04-04 21:31:51');

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
-- Indexes for table `kerjayas`
--
ALTER TABLE `kerjayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khususes`
--
ALTER TABLE `khususes`
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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institusis`
--
ALTER TABLE `institusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerjayas`
--
ALTER TABLE `kerjayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khususes`
--
ALTER TABLE `khususes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `silibuses`
--
ALTER TABLE `silibuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syarat_kelayakans`
--
ALTER TABLE `syarat_kelayakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
