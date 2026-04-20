-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2026 at 05:19 AM
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
-- Database: `upkb2`
--

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
(2, 'L02313', 'images/galeri/l02313-1775636699.jpeg', 'CAFE', '2026-04-08 00:24:59', '2026-04-08 00:24:59'),
(3, 'L02313', 'images/galeri/l02313-1775636723.jpeg', 'CAFE', '2026-04-08 00:25:23', '2026-04-08 00:25:23'),
(4, 'L02313', 'images/galeri/l02313-1775636755.jpeg', 'CAFE', '2026-04-08 00:25:55', '2026-04-08 00:25:55'),
(5, 'L02313', 'images/galeri/l02313-1775636775.jpeg', 'KELAS', '2026-04-08 00:26:15', '2026-04-08 00:26:15'),
(6, 'L02313', 'images/galeri/l02313-1775636788.jpeg', 'KELAS', '2026-04-08 00:26:28', '2026-04-08 00:26:28'),
(7, 'L02313', 'images/galeri/l02313-1775636809.jpeg', 'KELAS', '2026-04-08 00:26:49', '2026-04-08 00:26:49'),
(8, '05', 'images/galeri/05-1775636835.jpeg', 'CAFE', '2026-04-08 00:27:15', '2026-04-08 00:27:15'),
(10, '05', 'images/galeri/05-1775636870.jpeg', 'CAFE', '2026-04-08 00:27:50', '2026-04-08 00:27:50'),
(11, '05', 'images/galeri/05-1775636883.jpeg', 'CAFE', '2026-04-08 00:28:03', '2026-04-08 00:28:03'),
(12, '05', 'images/galeri/05-1775636894.jpeg', 'KELAS', '2026-04-08 00:28:14', '2026-04-08 00:28:14'),
(13, '05', 'images/galeri/05-1775636905.jpeg', 'KELAS', '2026-04-08 00:28:25', '2026-04-08 00:28:25'),
(14, '05', 'images/galeri/05-1775636921.jpeg', 'KELAS', '2026-04-08 00:28:41', '2026-04-08 00:28:41'),
(15, 'UE4344001', 'images/galeri/ue4344001-1775636943.jpeg', 'CAFE', '2026-04-08 00:29:03', '2026-04-08 00:29:03'),
(16, 'UE4344001', 'images/galeri/ue4344001-1775636957.jpeg', 'CAFE', '2026-04-08 00:29:17', '2026-04-08 00:29:17'),
(17, 'UE4344001', 'images/galeri/ue4344001-1775636970.jpeg', 'CAFE', '2026-04-08 00:29:30', '2026-04-08 00:29:30'),
(18, 'UE4344001', 'images/galeri/ue4344001-1775636985.jpeg', 'KELAS', '2026-04-08 00:29:45', '2026-04-08 00:29:45'),
(19, 'UE4344001', 'images/galeri/ue4344001-1775637000.jpeg', 'KELAS', '2026-04-08 00:30:00', '2026-04-08 00:30:00'),
(20, 'UE4344001', 'images/galeri/ue4344001-1775637013.jpeg', 'KELAS', '2026-04-08 00:30:13', '2026-04-08 00:30:13'),
(21, '01', 'images/galeri/01-1775637043.jpeg', 'CAFE', '2026-04-08 00:30:43', '2026-04-08 00:30:43'),
(22, '01', 'images/galeri/01-1775637057.jpeg', 'CAFE', '2026-04-08 00:30:57', '2026-04-08 00:30:57'),
(23, '01', 'images/galeri/01-1775637075.jpeg', 'CAFE', '2026-04-08 00:31:15', '2026-04-08 00:31:15'),
(24, '01', 'images/galeri/01-1775637087.jpeg', 'KELAS', '2026-04-08 00:31:27', '2026-04-08 00:31:27'),
(25, '01', 'images/galeri/01-1775637101.jpeg', 'KELAS', '2026-04-08 00:31:41', '2026-04-08 00:31:41'),
(26, '01', 'images/galeri/01-1775637116.jpeg', 'KELAS', '2026-04-08 00:31:56', '2026-04-08 00:31:56'),
(27, 'L02313', 'images/galeri/l02313-1775699731.jpeg', 'BENGKEL', '2026-04-08 17:55:31', '2026-04-08 17:55:31'),
(28, 'L02313', 'images/galeri/l02313-1775699748.jpeg', 'BENGKEL', '2026-04-08 17:55:48', '2026-04-08 17:55:48'),
(29, 'L02313', 'images/galeri/l02313-1775699761.jpeg', 'BENGKEL', '2026-04-08 17:56:01', '2026-04-08 17:56:01'),
(30, 'L02313', 'images/galeri/l02313-1775699791.jpeg', 'STUDENT CENTRE', '2026-04-08 17:56:31', '2026-04-08 17:56:31'),
(31, 'L02313', 'images/galeri/l02313-1775699809.jpeg', 'STUDENT CENTRE', '2026-04-08 17:56:49', '2026-04-08 17:56:49'),
(32, 'L02313', 'images/galeri/l02313-1775699819.jpeg', 'STUDENT CENTRE', '2026-04-08 17:56:59', '2026-04-08 17:56:59'),
(33, 'L02313', 'images/galeri/l02313-1775699842.jpeg', 'SURAU', '2026-04-08 17:57:22', '2026-04-08 17:57:22'),
(34, 'L02313', 'images/galeri/l02313-1775699857.jpeg', 'SURAU', '2026-04-08 17:57:37', '2026-04-08 17:57:37'),
(35, 'L02313', 'images/galeri/l02313-1775699873.jpeg', 'SURAU', '2026-04-08 17:57:53', '2026-04-08 17:57:53'),
(36, 'L02313', 'images/galeri/l02313-1775699898.jpeg', 'TRANSPORT', '2026-04-08 17:58:18', '2026-04-08 17:58:18'),
(37, 'L02313', 'images/galeri/l02313-1775699913.jpeg', 'TRANSPORT', '2026-04-08 17:58:33', '2026-04-08 17:58:33'),
(38, 'L02313', 'images/galeri/l02313-1775699931.jpeg', 'TRANSPORT', '2026-04-08 17:58:51', '2026-04-08 17:58:51'),
(39, '05', 'images/galeri/05-1775700008.jpeg', 'BENGKEL', '2026-04-08 18:00:08', '2026-04-08 18:00:08'),
(40, '05', 'images/galeri/05-1775700020.jpeg', 'BENGKEL', '2026-04-08 18:00:20', '2026-04-08 18:00:20'),
(41, '05', 'images/galeri/05-1775700035.jpeg', 'BENGKEL', '2026-04-08 18:00:35', '2026-04-08 18:00:35'),
(42, '05', 'images/galeri/05-1775700066.jpeg', 'STUDENT CENTRE', '2026-04-08 18:01:06', '2026-04-08 18:01:06'),
(43, '05', 'images/galeri/05-1775700077.jpeg', 'STUDENT CENTRE', '2026-04-08 18:01:17', '2026-04-08 18:01:17'),
(44, '05', 'images/galeri/05-1775700090.jpeg', 'STUDENT CENTRE', '2026-04-08 18:01:30', '2026-04-08 18:01:30'),
(45, '05', 'images/galeri/05-1775700122.jpeg', 'SURAU', '2026-04-08 18:02:02', '2026-04-08 18:02:02'),
(46, '05', 'images/galeri/05-1775700137.jpeg', 'SURAU', '2026-04-08 18:02:17', '2026-04-08 18:02:17'),
(47, '05', 'images/galeri/05-1775700148.jpeg', 'SURAU', '2026-04-08 18:02:28', '2026-04-08 18:02:28'),
(48, '05', 'images/galeri/05-1775700171.jpeg', 'TRANSPORT', '2026-04-08 18:02:51', '2026-04-08 18:02:51'),
(49, '05', 'images/galeri/05-1775700187.jpeg', 'TRANSPORT', '2026-04-08 18:03:07', '2026-04-08 18:03:07'),
(50, '05', 'images/galeri/05-1775700200.jpeg', 'TRANSPORT', '2026-04-08 18:03:20', '2026-04-08 18:03:20'),
(51, 'UE4344001', 'images/galeri/ue4344001-1775700239.jpeg', 'BENGKEL', '2026-04-08 18:03:59', '2026-04-08 18:03:59'),
(52, 'UE4344001', 'images/galeri/ue4344001-1775700249.jpeg', 'BENGKEL', '2026-04-08 18:04:09', '2026-04-08 18:04:09'),
(53, 'UE4344001', 'images/galeri/ue4344001-1775700260.jpeg', 'BENGKEL', '2026-04-08 18:04:20', '2026-04-08 18:04:20'),
(54, 'UE4344001', 'images/galeri/ue4344001-1775700285.jpeg', 'STUDENT CENTRE', '2026-04-08 18:04:45', '2026-04-08 18:04:45'),
(55, 'UE4344001', 'images/galeri/ue4344001-1775700296.jpeg', 'STUDENT CENTRE', '2026-04-08 18:04:56', '2026-04-08 18:04:56'),
(56, 'UE4344001', 'images/galeri/ue4344001-1775700308.jpeg', 'STUDENT CENTRE', '2026-04-08 18:05:08', '2026-04-08 18:05:08'),
(57, 'UE4344001', 'images/galeri/ue4344001-1775700329.jpeg', 'SURAU', '2026-04-08 18:05:29', '2026-04-08 18:05:29'),
(59, 'UE4344001', 'images/galeri/ue4344001-1775700341.jpeg', 'SURAU', '2026-04-08 18:05:41', '2026-04-08 18:05:41'),
(60, 'UE4344001', 'images/galeri/ue4344001-1775700352.jpeg', 'SURAU', '2026-04-08 18:05:52', '2026-04-08 18:05:52'),
(61, 'UE4344001', 'images/galeri/ue4344001-1775700383.jpeg', 'TRANSPORT', '2026-04-08 18:06:23', '2026-04-08 18:06:23'),
(62, 'UE4344001', 'images/galeri/ue4344001-1775700398.jpeg', 'TRANSPORT', '2026-04-08 18:06:38', '2026-04-08 18:06:38'),
(63, 'UE4344001', 'images/galeri/ue4344001-1775700410.jpeg', 'TRANSPORT', '2026-04-08 18:06:50', '2026-04-08 18:06:50'),
(64, '01', 'images/galeri/01-1775700471.jpeg', 'BENGKEL', '2026-04-08 18:07:51', '2026-04-08 18:07:51'),
(65, '01', 'images/galeri/01-1775700482.jpeg', 'BENGKEL', '2026-04-08 18:08:02', '2026-04-08 18:08:02'),
(66, '01', 'images/galeri/01-1775700494.jpeg', 'BENGKEL', '2026-04-08 18:08:14', '2026-04-08 18:08:14'),
(67, '01', 'images/galeri/01-1775700515.jpeg', 'STUDENT CENTRE', '2026-04-08 18:08:35', '2026-04-08 18:08:35'),
(68, '01', 'images/galeri/01-1775700527.jpeg', 'STUDENT CENTRE', '2026-04-08 18:08:47', '2026-04-08 18:08:47'),
(69, '01', 'images/galeri/01-1775700541.jpeg', 'STUDENT CENTRE', '2026-04-08 18:09:01', '2026-04-08 18:09:01'),
(70, '01', 'images/galeri/01-1775700561.jpeg', 'SURAU', '2026-04-08 18:09:21', '2026-04-08 18:09:21'),
(71, '01', 'images/galeri/01-1775700573.jpeg', 'SURAU', '2026-04-08 18:09:33', '2026-04-08 18:09:33'),
(72, '01', 'images/galeri/01-1775700584.jpeg', 'SURAU', '2026-04-08 18:09:44', '2026-04-08 18:09:44'),
(73, '01', 'images/galeri/01-1775700608.jpeg', 'TRANSPORT', '2026-04-08 18:10:08', '2026-04-08 18:10:08'),
(74, '01', 'images/galeri/01-1775700620.jpeg', 'TRANSPORT', '2026-04-08 18:10:20', '2026-04-08 18:10:20'),
(75, '01', 'images/galeri/01-1775700630.jpeg', 'TRANSPORT', '2026-04-08 18:10:30', '2026-04-08 18:10:30');

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
(2, 'L02313', 'Unifield International College (UIC)', 'Diploma', 'images/institusi/unifield-international-college-uic-1775618872.webp', '2, Jalan Kaunselor, College Heights Garden Resort, 71700 Mantin, Negeri Sembilan', 'Unifield International College ialah sebuah institusi pengajian tinggi swasta yang ditubuhkan pada tahun 1997. Kolej ini telah melalui beberapa perubahan nama dan pengurusan sebelum dikenali sebagai Unifield International College pada tahun 2013. Kini institusi ini beroperasi di Pajam dan menawarkan pelbagai program pendidikan kepada pelajar tempatan dan antarabangsa', '2026-04-07 17:01:47', '2026-04-07 22:13:48'),
(3, '05', 'UNIVERSITI TEKNOLOGI MALAYSIA', 'Diploma', 'images/institusi/universiti-teknologi-malaysia-1775619641.jpg', 'UTM Johor Bahru (Kampus Utama):\r\nUniversiti Teknologi Malaysia,\r\n81310 UTM Johor Bahru,\r\nJohor Darul Ta\'zim, Malaysia.', 'Sebuah universiti awam di Malaysia yang terkenal dalam bidang kejuruteraan, sains dan teknologi. UTM ditubuhkan pada tahun 1972 dan mempunyai kampus utama di Skudai serta kampus di Kuala Lumpur. Universiti ini menawarkan pelbagai program pengajian dan memberi tumpuan kepada penyelidikan serta pembangunan teknologi.', '2026-04-07 19:40:41', '2026-04-07 22:11:49'),
(4, 'UE4344001', 'UNIVERSITI TEKNOLOGI MARA (UITM)', 'Diploma', 'images/institusi/universiti-teknologi-mara-uitm-1775620480.jpg', 'jalan Ilmu 1/1, 40450 Shah Alam, Selangor', 'Universiti awam di Malaysia yang ditubuhkan untuk menyediakan peluang pendidikankepada masyarakat, khususnya Bumiputera. Menawarkan pelbagai program pengajian dalam bidang seperti perniagaan, kejuruteraan, sains, teknologi dan seni. Kampus utamanya terletak di Shah Alam dan mempunyai banyak kampus cawangan di seluruh negara.', '2026-04-07 19:54:40', '2026-04-07 22:15:22'),
(6, '01', 'Universiti Malaya (UM)', 'Diploma', 'images/institusi/universiti-malaya-um-1775627041.webp', 'Universiti Malaya, 50603 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Universiti awam tertua di Malaysia, ditubuhkan pada tahun 1905. UM terkenal dengan kecemerlangan akademik dan penyelidikan dalam pelbagai bidang seperti sains, kejuruteraan, perubatan, dan seni. Kampus utamanya terletak di Kuala Lumpur dan menyediakan pelbagai program pengajian untuk pelajar tempatan dan antarabangsa.', '2026-04-07 21:44:01', '2026-04-07 22:16:16'),
(7, 'DKU045(N)', 'MURNI INTERNATIONAL COLLEGE', 'Diploma', 'images/institusi/murni-international-college-1775628024.jpg', 'PT. 12914, Jalan BBN 1/7f Persiaran Pusat Bandar Bandar Baru Nilai, 12910, Jalan BBN 1/7f, Bandar Baru Nilai, 71800 Nilai, Negeri Sembilan', 'Institusi pendidikan swasta yang menawarkan program diploma dan sijil dalam pelbagai bidang seperti perniagaan, pengurusan, keusahawanan dan kepimpinan. Bertujuan untuk menyediakan pelajar dengan pengetahuan praktikal dan kemahiran profesional yang relevan untuk memasuki pasaran kerja. Kolej ini juga menekankan pembangunan menyeluruh pelajar melalui latihan industri, pembelajaran berorientasikan kerjaya dan sokongan pembangunan diri.', '2026-04-07 22:00:24', '2026-04-07 22:17:42'),
(8, 'DK268(W)', 'IHM COLLEGE', 'Diploma', 'images/institusi/ihm-college-1775631032.jpg', '15, Jalan Raja Chulan, Bukit Bintang, 50200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'kolej swasta di Kuala Lumpur yang ditubuhkan pada tahun 1993 dan sebelum ini dikenali sebagai In-House Multimedia College. Kolej ini menawarkan pelbagai program seperti diploma dalam bidang multimedia, komunikasi massa dan sains komputer, dengan penekanan kepada kemahiran praktikal serta keperluan industri bagi menyediakan pelajar untuk dunia pekerjaan.', '2026-04-07 22:50:32', '2026-04-07 22:50:32'),
(9, 'L02922', 'MALAYSIA BUSINESS ACADEMY (MBA)', 'TVET', 'images/institusi/malaysia-business-academy-mba-1775633845.webp', 'No. 1-G, Jalan Putra Mahkota 7/8C, Putra Heights, 47650 Subang Jaya, Selangor, Malaysia', 'My Business Academy ialah sebuah pusat latihan kemahiran & pengembangan profesional di Malaysia, yang menawarkan kursus kemahiran, latihan industri dan program latihan kerjaya dalam bidang perniagaan, pendidikan awal, pemasaran dan pembangunan profesional. Ia beroperasi sebagai pembekal latihan yang diluluskan untuk kursus kemahiran (TVET)', '2026-04-07 23:37:25', '2026-04-07 23:37:25'),
(10, 'L02890', 'IMAN MOTORS ACADEMY', 'TVET', 'images/institusi/iman-motors-academy-1775634492.webp', 'Pusat komersial, 1280-1, Jalan Suriaman Biz 3, Persiaran Suriaman, 71950 Sendayan, Negeri Sembilan', 'Pusat latihan automotif yang menawarkan kursus praktikal dan TVET dalam penyelenggaraan kereta, mekanik, dan teknologi automotif untuk melahirkan tenaga kerja mahir bagi industri automotif.', '2026-04-07 23:48:12', '2026-04-07 23:48:12'),
(11, 'L02650', 'EAKON ACADEMY', 'TVET', 'images/institusi/eakon-academy-1775635111.webp', 'Lot 27737, Jalan 5/10 Bandar Rinching Seksyen 5, Semenyih, 43500 Selangor', 'Pusat latihan yang menawarkan kursus keusahawanan, pembangunan kemahiran profesional dan latihan vokasional, dengan fokus kepada latihan praktikal untuk meningkatkan kebolehan kerjaya dan keperluan industri.', '2026-04-07 23:58:31', '2026-04-07 23:59:53'),
(12, 'DK030(N)', 'MURNI INTERNATIONAL COLLEGE', 'SAINS KESIHATAN', 'images/institusi/murni-international-college-1775788625.jpg', 'PT. 12914, Jalan BBN 1/7f Persiaran Pusat Bandar Bandar Baru Nilai, 12910, Jalan BBN 1/7f, Bandar Baru Nilai, 71800 Nilai, Negeri Sembilan', 'Institusi pendidikan swasta yang menawarkan program diploma dan sijil dalam pelbagai bidang seperti perniagaan, pengurusan, keusahawanan dan kepimpinan. Bertujuan untuk menyediakan pelajar dengan pengetahuan praktikal dan kemahiran profesional yang relevan untuk memasuki pasaran kerja. Kolej ini juga menekankan pembangunan menyeluruh pelajar melalui latihan industri, pembelajaran berorientasikan kerjaya dan sokongan pembangunan diri.', '2026-04-09 18:37:05', '2026-04-09 18:37:34');

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

--
-- Dumping data for table `kerjayas`
--

INSERT INTO `kerjayas` (`id`, `kod_institusi`, `kod_kursus`, `bidang_kerjaya`, `created_at`, `updated_at`) VALUES
(11, '000', 'DSI', '- Melanjutkan pengajian Ijazah Sarjana Muda di mana-mana universiti atau kolej', '2026-04-07 19:59:52', '2026-04-07 19:59:52'),
(12, '000', 'DSI', '- Pendakwah', '2026-04-07 19:59:57', '2026-04-07 19:59:57'),
(13, '000', 'DSI', '- Pegawai Pentadbiran', '2026-04-07 20:00:01', '2026-04-07 20:00:01'),
(14, '000', 'DSI', '- Pendidik', '2026-04-07 20:00:04', '2026-04-07 20:00:04'),
(15, '000', 'DEC', '- Guru Pendidikan Awal Kanak-Kanak', '2026-04-07 21:09:21', '2026-04-07 21:09:21'),
(16, '000', 'DEC', '- Pengurus Prasekolah atau Pusat Jagaan Kanak-Kanak', '2026-04-07 21:09:29', '2026-04-07 21:09:29'),
(17, '000', 'BA111', '- Pegawai Akauntan', '2026-04-07 21:20:57', '2026-04-07 21:20:57'),
(18, '000', 'AC110', '- Pegawai Akauntan', '2026-04-07 21:28:39', '2026-04-07 21:28:39'),
(19, '000', 'MQA/FA15689', '- Eksekutif Halal', '2026-04-07 22:03:02', '2026-04-07 22:03:02'),
(20, '000', 'MQA/FA15689', '- Pegawai QA/QC (Quality Control)', '2026-04-07 22:03:34', '2026-04-07 22:03:34'),
(21, '000', 'MQA/FA15689', '- Pegawai logistik Halal', '2026-04-07 22:03:44', '2026-04-07 22:03:44'),
(22, '000', 'MQA/FA15689', 'Usahawan produk halal', '2026-04-07 22:04:07', '2026-04-07 22:04:07'),
(23, 'DKU045(N)', 'MQA/FA3436', '- Pembantu Pengurusan Hospital', '2026-04-07 22:28:07', '2026-04-07 22:28:07'),
(24, 'DKU045(N)', 'MQA/FA3436', '- Admin Klinik / Hospital', '2026-04-07 22:28:19', '2026-04-07 22:28:19'),
(25, 'DKU045(N)', 'MQA/FA3436', '- Customer Service Healthcare', '2026-04-07 22:28:39', '2026-04-07 22:28:39'),
(26, 'DKU045(N)', 'MQA/FA3436', '- Medical Records Officer', '2026-04-07 22:28:53', '2026-04-07 22:28:53'),
(27, 'DKU045(N)', 'MQA/FA3436', '- Healthcare Executive', '2026-04-07 22:29:06', '2026-04-07 22:29:06'),
(28, 'DKU045(N)', 'MQA/FA15689', '- Halal Auditor', '2026-04-07 22:32:13', '2026-04-07 22:32:13'),
(29, 'DKU045(N)', 'MQA/FA15689', '- Eksekutif Industri Makanan / Kilang', '2026-04-07 22:32:29', '2026-04-07 22:32:29'),
(30, 'DKU045(N)', 'MQA/FA15689', '- Eksekutif Pematuhan (Compliance Officer)', '2026-04-07 22:32:38', '2026-04-07 22:32:38'),
(31, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', '- Pereka Grafik', '2026-04-07 22:56:29', '2026-04-07 22:56:29'),
(32, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', '- Pereka Multimedia', '2026-04-07 22:56:38', '2026-04-07 22:56:38'),
(33, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', '- Editor Video / Animasi', '2026-04-07 22:56:52', '2026-04-07 22:56:52'),
(34, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', '- Pembangun Laman Web', '2026-04-07 22:57:04', '2026-04-07 22:57:04'),
(35, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', '- Penyiar', '2026-04-07 23:00:23', '2026-04-07 23:00:23'),
(36, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', '- Wartawan', '2026-04-07 23:00:31', '2026-04-07 23:00:31'),
(37, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', '- Pegawai Perhubungan Awam (PR)', '2026-04-07 23:00:47', '2026-04-07 23:00:47'),
(38, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', '- Penerbit Media', '2026-04-07 23:01:07', '2026-04-07 23:01:07'),
(39, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', '- Pegawai Keselamatan', '2026-04-07 23:05:05', '2026-04-07 23:05:05'),
(40, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', '- Pegawai Penguatkuasa Undang-Undang', '2026-04-07 23:05:24', '2026-04-07 23:05:24'),
(41, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', '- Pegawai Penjara/ Kastam/ Imigresen', '2026-04-07 23:05:47', '2026-04-07 23:05:47'),
(42, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', '- Pekerja Sektor Keselamatan Awam', '2026-04-07 23:06:05', '2026-04-07 23:06:05'),
(44, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', '- Pengurus Pusat Jagaan', '2026-04-07 23:42:00', '2026-04-07 23:42:00'),
(45, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', '- Guru Prasekolah / Pendidikan Awal Kanak-Kanak', '2026-04-07 23:42:43', '2026-04-07 23:42:43'),
(46, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', '- Pembantu Pendidik atau Tutor Kanak-kanak', '2026-04-07 23:43:09', '2026-04-07 23:43:09'),
(47, 'L02890', 'K12001/G452-002-4:2017-ST-A', '- Mekanik', '2026-04-07 23:51:55', '2026-04-07 23:51:55'),
(48, 'L02890', 'K12001/G452-002-4:2017-ST-A', '- Pegawai Penyelenggaraan Kenderaan', '2026-04-07 23:52:22', '2026-04-07 23:52:22'),
(49, 'L02890', 'K12001/G452-002-4:2017-ST-A', '- Penyelia Bengkel atau Pengurus Opersi Automotif', '2026-04-07 23:53:00', '2026-04-07 23:53:00');

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

--
-- Dumping data for table `kursuses`
--

INSERT INTO `kursuses` (`id`, `kod_kursus`, `kod_institusi`, `nama_kursus`, `jenis_kursus`, `mod_pengajian`, `tempoh`, `kuota`, `tarikh_pendaftaran`, `penerangan`, `created_at`, `updated_at`) VALUES
(6, 'DSI', 'L02313', 'DIPLOMA SYARIAH ISLAMIAH', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Syariah Islamiah memberi pengetahuan tentang hukum-hukum Islam berdasarkan Al-Quran dan Hadis. Kursus ini merangkumi bidang seperti fiqh, akidah, ibadah, muamalat serta undang-undang Islam bagi melahirkan pelajar yang memahami dan mampu mengamalkan syariah dalam kehidupan serta kerjaya.', '2026-04-07 19:59:12', '2026-04-09 19:41:10'),
(7, 'DEC', 'L02313', 'DIPLOMA PENDIDIKAN AWAL KANAK-KANAK', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pendidikan Awal Kanak-Kanak memberi pengetahuan dan kemahiran dalam perkembangan serta pendidikan kanak-kanak dari usia awal. Kursus ini merangkumi aspek penjagaan, psikologi kanak-kanak, kaedah pengajaran dan aktiviti pembelajaran untuk melatih pelajar menjadi pendidik atau penjaga kanak-kanak yang profesional.', '2026-04-07 21:07:25', '2026-04-09 19:41:39'),
(8, 'DDWG', '05', 'DIPLOMA PENGURUSAN TEKNOLOGI MAKLUMAT', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Teknologi Maklumat memberi pengetahuan tentang penggunaan teknologi dalam pengurusan sistem dan organisasi. Kursus ini merangkumi asas pengaturcaraan, pangkalan data, rangkaian komputer serta pengurusan sistem maklumat untuk melatih pelajar mengurus dan menyokong keperluan teknologi dalam sesebuah organisasi.', '2026-04-07 21:11:52', '2026-04-09 19:40:07'),
(9, 'DDWF', '05', 'DIPLOMA PENGURUSAN HARTANAH', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Hartanah memberi pengetahuan tentang pengurusan, penilaian dan pentadbiran hartanah seperti rumah, bangunan dan tanah. Kursus ini merangkumi aspek perundangan hartanah, penilaian aset, pengurusan sewaan serta pembangunan hartanah bagi melatih pelajar dalam bidang pengurusan hartanah secara profesional.', '2026-04-07 21:15:10', '2026-04-09 19:40:36'),
(10, 'BA111', 'UE4344001', 'DIPLOMA PENGAJIAN PERNIAGAAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengajian Perniagaan memberi pengetahuan asas tentang dunia perniagaan dan pengurusan. Kursus ini merangkumi bidang seperti pemasaran, kewangan, ekonomi, pengurusan organisasi dan keusahawanan bagi melatih pelajar memahami operasi serta fungsi sesebuah perniagaan.', '2026-04-07 21:19:08', '2026-04-09 19:38:23'),
(11, 'AC110', 'UE4344001', 'DIPLOMA PERAKAUNAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Perakaunan memberi pengetahuan dan kemahiran dalam merekod, menganalisis dan menyediakan penyata kewangan. Kursus ini merangkumi asas perakaunan, percukaian, audit serta pengurusan kewangan untuk melatih pelajar dalam mengurus rekod kewangan organisasi dengan tepat dan sistematik.', '2026-04-07 21:26:34', '2026-04-09 19:38:58'),
(12, 'BA003', 'UE4344001', 'PRA DIPLOMA PERDAGANGAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Pra Diploma Perdagangan ialah program asas yang menyediakan pelajar sebelum melanjutkan pengajian ke peringkat diploma dalam bidang perniagaan. Kursus ini memberi pendedahan awal kepada subjek seperti asas perniagaan, matematik, bahasa dan kemahiran belajar bagi membantu pelajar bersedia untuk pengajian di peringkat yang lebih tinggi.', '2026-04-07 21:30:45', '2026-04-09 19:39:29'),
(13, 'MQA/SWA0628', '01', 'DIPLOMA PENGURUSAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan memberi pengetahuan asas dalam bidang pengurusan organisasi seperti perniagaan, pentadbiran, kewangan dan sumber manusia. Kursus ini melatih pelajar dalam kemahiran pengurusan, komunikasi dan membuat keputusan untuk menyediakan mereka kepada kerjaya dalam sektor awam mahupun swasta.', '2026-04-07 21:51:33', '2026-04-09 19:36:40'),
(14, 'MQA/SWA0630', '01', 'DIPLOMA PENGURUSAN SUMBER MANUSIA', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Sumber Manusia memberi pengetahuan tentang pengurusan pekerja dalam sesebuah organisasi. Kursus ini merangkumi aspek pengambilan pekerja, latihan, pentadbiran gaji, hubungan industri serta pembangunan tenaga kerja bagi memastikan pengurusan sumber manusia yang efektif dalam organisasi.', '2026-04-07 21:52:39', '2026-04-09 19:37:09'),
(15, 'MQA/SWA0629', '01', 'DIPLOMA PENGURUSAN PERNIAGAAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Perniagaan memberi pengetahuan asas dalam bidang perniagaan seperti pengurusan, pemasaran, kewangan dan keusahawanan. Kursus ini melatih pelajar dengan kemahiran mengurus operasi perniagaan serta membuat keputusan untuk mempersiapkan mereka dalam dunia pekerjaan atau menjadi usahawan.', '2026-04-07 21:53:46', '2026-04-09 19:37:40'),
(16, 'MQA/FA15689', 'DKU045(N)', 'DIPLOMA PENGURUSAN INDUSTRI HALAL', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Industri Halal memberi pengetahuan tentang pengurusan, operasi dan piawaian dalam industri halal. Kursus ini meliputi aspek seperti pensijilan halal, pengurusan produk halal, kawalan kualiti serta pengurusan perniagaan yang mematuhi prinsip syariah bagi memenuhi keperluan pasaran halal.', '2026-04-07 22:01:38', '2026-04-09 19:35:08'),
(17, 'MQA/FA3436', 'DKU045(N)', 'DIPLOMA PENGURUSAN PENJAGAAN KESIHATAN', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Penjagaan Kesihatan memberi pengetahuan dan kemahiran dalam pengurusan perkhidmatan kesihatan seperti hospital, klinik dan pusat perubatan. Kursus ini merangkumi aspek pentadbiran kesihatan, pengurusan operasi, perkhidmatan pesakit serta sistem pengurusan dalam sektor penjagaan kesihatan.', '2026-04-07 22:26:40', '2026-04-09 19:35:26'),
(18, 'R2/213/4/0359 (MQA/A6023)', 'DK268(W)', 'DIPLOMA REKA BENTUK MULTIMEDIA', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Reka Bentuk Multimedia memberi pengetahuan dan kemahiran dalam menghasilkan kandungan kreatif digital seperti grafik, animasi, video dan reka bentuk laman web. Kursus ini menggabungkan elemen seni, kreativiti dan teknologi untuk melatih pelajar menjadi profesional dalam industri multimedia dan media digital.', '2026-04-07 22:54:18', '2026-04-09 19:33:09'),
(19, '(R/321/4/0029) – MQA/FA0611', 'DK268(W)', 'DIPLOMA KOMUNIKASI MASSA', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Komunikasi Massa memberi pengetahuan tentang bidang media dan komunikasi seperti kewartawanan, penyiaran, perhubungan awam dan media digital. Kursus ini melatih pelajar dalam kemahiran menulis, penyuntingan, penghasilan kandungan serta pengurusan media untuk industri komunikasi moden.', '2026-04-07 22:59:20', '2026-04-09 19:33:43'),
(20, 'R2/861/4/0003 – MQA/FA10855', 'DK268(W)', 'DIPLOMA PENGURUSAN KESELAMATAN & PENGUATKUASAAN UNDANG-UNDANG', 'Diploma', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Keselamatan & Penguatkuasaan Undang-Undang memberi pengetahuan dan kemahiran dalam bidang keselamatan, penguatkuasaan serta sistem undang-undang. Kursus ini merangkumi aspek pengurusan keselamatan, pencegahan jenayah, operasi penguatkuasaan dan undang-undang asas bagi melahirkan graduan yang berkemahiran dalam sektor keselamatan dan agensi penguatkuasaan.', '2026-04-07 23:04:04', '2026-04-09 19:34:12'),
(21, 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', 'L02922', 'PENJAGAAN & PENDIDIKAN AWAL KANAK-KANAK', 'TVET', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'KEMUDAHAN FASILITI', '2026-04-07 23:40:38', '2026-04-07 23:40:38'),
(22, 'K12001/G452-002-4:2017-ST-A', 'L02890', 'TEKNOLOGI AUTOMOTIF', 'TVET', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'KEMUDAHAN FASILITI', '2026-04-07 23:50:59', '2026-04-07 23:50:59'),
(23, 'K12001/G452-002-4:2017-ST-A', 'L02890', 'TEKNOLOGI AUTOMOTIF', 'TVET', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'KEMUDAHAN FASILITI', '2026-04-07 23:50:59', '2026-04-07 23:50:59'),
(24, 'S960-002-2:2020', 'L02650', 'PENYAMANAN UDARA & PENYEJUKAN (HVAC)', 'TVET', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'KEMUDAHAN FASILITI', '2026-04-08 00:15:47', '2026-04-08 00:15:47'),
(25, '(R3/0913/4/00560)(10,29)(MQA/FA5362)', 'DK030(N)', 'DIPLOMA KEJURURAWATAN', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Kejururawatan melatih pelajar menjadi jururawat profesional yang mahir dalam penjagaan pesakit. Kursus ini merangkumi pengetahuan tentang penjagaan kesihatan, rawatan pesakit, kemahiran klinikal serta latihan praktikal di hospital atau pusat kesihatan. Graduan program ini boleh bekerja sebagai jururawat di hospital, klinik dan institusi kesihatan.', '2026-04-09 18:51:38', '2026-04-09 19:32:19'),
(26, '(R3/0913/4/0057)03,30)(MQA/FA8746)', 'DK030(N)', 'DIPLOMA SAINS PERUBATAN DAN KESIHATAN', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Sains Perubatan dan Kesihatan memberi pengetahuan asas tentang bidang perubatan dan kesihatan. Kursus ini merangkumi topik seperti asas sains perubatan, penjagaan kesihatan, anatomi dan fisiologi manusia serta kemahiran asas yang berkaitan dengan perkhidmatan kesihatan.', '2026-04-09 18:59:38', '2026-04-09 19:31:06'),
(27, '(R2/0414/4/044)(8,28)(MQA/FA3436)', 'DK030(N)', 'DIPLOMA PENGURUSAN PENJAGAAN KESIHATAN', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Penjagaan Kesihatan memberi pengetahuan dan kemahiran dalam pengurusan perkhidmatan kesihatan seperti hospital, klinik dan pusat perubatan. Kursus ini merangkumi aspek pentadbiran kesihatan, pengurusan operasi, perkhidmatan pesakit serta sistem pengurusan dalam sektor penjagaan kesihatan.', '2026-04-09 19:13:44', '2026-04-09 19:30:31'),
(28, '(N/0414/4/0018)(06/27)(MQA/FA15689)', 'DK030(N)', 'DIPLOMA PENGURUSAN INDUSTRI HALAL', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Diploma Pengurusan Industri Halal memberi pengetahuan tentang pengurusan, operasi dan piawaian dalam industri halal. Kursus ini meliputi aspek seperti pensijilan halal, pengurusan produk halal, kawalan kualiti serta pengurusan perniagaan yang mematuhi prinsip syariah bagi memenuhi keperluan pasaran halal.', '2026-04-09 19:17:13', '2026-04-09 19:29:56'),
(29, 'JPT-DK030(N)', 'DK030(N)', 'SIJIL PEMBANTU PENJAGAAN PESAKIT', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Sijil Pembantu Penjagaan Pesakit merupakan kursus yang melatih pelajar untuk membantu dalam penjagaan pesakit di hospital, klinik atau pusat penjagaan kesihatan. Kursus ini memberi pengetahuan asas tentang penjagaan pesakit, kebersihan diri pesakit, bantuan pergerakan pesakit serta sokongan kepada jururawat dan kakitangan perubatan dalam memastikan keselesaan dan keselamatan pesakit.', '2026-04-09 19:20:02', '2026-04-09 19:29:08'),
(30, '(MQA/PA16868) (N/0913/2/0018)', 'DK030(N)', 'POST BASIC IN RENAL CARE NURSING', 'SAINS KESIHATAN', 'SEPENUH MASA', '3 TAHUN', NULL, NULL, 'Program Post Basic in Renal Care Nursing merupakan kursus lanjutan untuk jururawat yang memberi pengetahuan dan kemahiran khusus dalam penjagaan pesakit yang mengalami penyakit buah pinggang. Kursus ini memberi tumpuan kepada rawatan seperti dialisis, pemantauan pesakit renal serta pengurusan penjagaan kesihatan bagi pesakit yang mengalami kegagalan buah pinggang.', '2026-04-09 19:28:18', '2026-04-09 19:29:30');

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
(3, 'T3ST1NG', '1234', 'aa', '2026-04-07 04:37:51', '2026-04-07 04:37:51'),
(4, '000', 'DSI', '1. Mempunyai 3 kredit (BM + 2 subjek lain)', '2026-04-07 19:14:28', '2026-04-07 19:14:28'),
(5, '000', 'DEC', 'Sejarah wajib lulus.', '2026-04-07 19:31:12', '2026-04-07 19:31:12'),
(7, '000', 'DDWF', 'Sejarah wajib lulus', '2026-04-07 21:15:35', '2026-04-07 21:15:35'),
(8, '000', 'AC110', 'Mempunyai 3 kredit (BM, BI, MT wajib kredit)', '2026-04-07 21:27:26', '2026-04-07 21:27:26'),
(9, '000', 'BA003', 'Mempunyai 3 kredit (BM kredit, BI, MATH lulus)', '2026-04-07 21:31:26', '2026-04-07 21:31:26'),
(10, '000', 'DDWG', '- Mempunyai 3 kredit (BM kredit, BI , Math lulus)', '2026-04-07 21:33:25', '2026-04-07 21:33:25'),
(11, '000', 'MQA/FA15689', 'lulus SPM 3 kredit apa-apa subjek', '2026-04-07 22:02:49', '2026-04-07 22:02:49'),
(12, 'DKU045(N)', 'MQA/FA3436', '3 kredit : MT atau SCI & 2SL\r\nlulus BM, BI dan SEJ', '2026-04-07 22:27:43', '2026-04-07 22:27:43'),
(13, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', 'Lulus SPM', '2026-04-07 22:55:34', '2026-04-07 22:55:34'),
(14, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', 'Mempunyai sekurang-kurangnya 3 kredit dalam mana-mana mata pelajaran', '2026-04-07 22:56:16', '2026-04-07 22:56:16'),
(15, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', 'Lulus SPM atau setaraf', '2026-04-07 22:59:44', '2026-04-07 22:59:44'),
(16, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', 'Mempunyai sekurang-kurangnya 3 kredit dalam mana-mana mata pelajaran', '2026-04-07 23:00:15', '2026-04-07 23:00:15'),
(17, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', 'Lulus SPM atau setaraf', '2026-04-07 23:04:22', '2026-04-07 23:04:22'),
(18, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', 'Sekurang-kurangnya 3 kredit dalam mana-mana mata pelajaran', '2026-04-07 23:04:50', '2026-04-07 23:04:50'),
(19, 'L02890', 'K12001/G452-002-4:2017-ST-A', 'Lulus SPM atau setaraf, atau memiliki sijil kemahiran asas', '2026-04-07 23:51:48', '2026-04-07 23:51:48'),
(20, 'DK030(N)', '(R3/0913/4/00560)(10,29)(MQA/FA5362)', '5 Kredit (Math, Bio/Fizik/Kimia, BM + SUB lain.(BI lulus)', '2026-04-09 18:53:47', '2026-04-09 18:53:47'),
(22, 'DK030(N)', '(R2/0414/4/044)(8,28)(MQA/FA3436)', '3 Kredit \r\nMath, Bio/Fizik/Kimia + 2 Sub lain (BM, BI lulus)', '2026-04-09 19:15:30', '2026-04-09 19:15:30'),
(23, 'DK030(N)', '(N/0414/4/0018)(06/27)(MQA/FA15689)', '3 Kredit (Mana-mana subjek)', '2026-04-09 19:17:51', '2026-04-09 19:17:51'),
(24, 'DK030(N)', '(R3/0913/4/0057)03,30)(MQA/FA8746)', '5 Kredit \r\nMath, Bio/Fizik/Kimia, BM + 2 Sub lain(BI lulus)', '2026-04-09 19:23:24', '2026-04-09 19:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Administrator', 'admin', '$2y$12$H19mAPrdXLYpiz1r/SScaO2.smzvdTdW0lS560xxxUtpEPZEEuWGC', 'admin', NULL, '2026-04-07 07:05:08', '2026-04-07 07:05:08'),
(4, 'Staff Member', 'staff', '$2y$12$25XfLH49TjxriBWnD8uzLukkZTw.DpRi6hdJ2s63kZZuzqoCQ9pDy', 'staff', NULL, '2026-04-07 07:05:08', '2026-04-07 07:05:08'),
(5, 'SHAHRUL IRFAN BIN SAFARIN', 'SIS0221', '$2y$12$323mcVuZEWkMgIuos2UOMO.PXNS6DoV672/nobFYUyZf7aOoEZUv6', 'admin', NULL, '2026-04-07 07:36:53', '2026-04-07 07:36:53');

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

--
-- Dumping data for table `yuran_asramas`
--

INSERT INTO `yuran_asramas` (`id`, `kod_institusi`, `kod_kursus`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(8, '000', 'DSI', 'Daftar Asrama', 120.00, '2026-04-07 20:00:41', '2026-04-07 20:00:41'),
(9, '000', 'DSI', 'Asrama Bulanan', 150.00, '2026-04-07 20:00:51', '2026-04-07 20:00:51'),
(10, '000', 'DEC', 'Daftar Asrama', 120.00, '2026-04-07 21:09:54', '2026-04-07 21:09:54'),
(11, '000', 'DEC', 'Asrama Bulanan', 150.00, '2026-04-07 21:10:01', '2026-04-07 21:10:01'),
(12, '000', 'DDWG', 'Daftar Asrama', 120.00, '2026-04-07 21:12:43', '2026-04-07 21:12:43'),
(13, '000', 'DDWG', 'Asrama Bulanan', 150.00, '2026-04-07 21:12:50', '2026-04-07 21:12:50'),
(14, '000', 'DDWF', 'Daftar Asrama', 120.00, '2026-04-07 21:16:12', '2026-04-07 21:16:12'),
(15, '000', 'DDWF', 'Asrama Bulanan', 150.00, '2026-04-07 21:16:17', '2026-04-07 21:16:17'),
(16, '000', 'BA111', 'Daftar Asrama', 120.00, '2026-04-07 21:21:31', '2026-04-07 21:21:31'),
(17, '000', 'BA111', 'Asrama Bulanan', 150.00, '2026-04-07 21:21:39', '2026-04-07 21:21:39'),
(18, '000', 'AC110', 'Daftar Asrama', 120.00, '2026-04-07 21:29:32', '2026-04-07 21:29:32'),
(19, '000', 'AC110', 'Asrama Bulanan', 150.00, '2026-04-07 21:29:39', '2026-04-07 21:29:39'),
(20, '000', 'BA003', 'Daftar Asrama', 120.00, '2026-04-07 21:31:53', '2026-04-07 21:31:53'),
(21, '000', 'BA003', 'Asrama Bulanan', 150.00, '2026-04-07 21:31:59', '2026-04-07 21:31:59'),
(22, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', 'Daftar Asrama', 180.00, '2026-04-07 23:43:42', '2026-04-07 23:43:42'),
(23, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', 'Asrama Bulanan', 180.00, '2026-04-07 23:43:51', '2026-04-07 23:43:51'),
(24, 'L02890', 'K12001/G452-002-4:2017-ST-A', 'Daftar Asrama', 300.00, '2026-04-07 23:53:32', '2026-04-07 23:53:32'),
(25, 'L02890', 'K12001/G452-002-4:2017-ST-A', 'Asrama Bulanan', 150.00, '2026-04-07 23:53:51', '2026-04-07 23:53:51'),
(26, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', 'Daftar Asrama', 120.00, '2026-04-08 16:51:42', '2026-04-08 16:51:42'),
(27, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', 'Asrama Bulanan', 150.00, '2026-04-08 16:51:48', '2026-04-08 16:51:48'),
(28, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', 'Daftar Asrama', 120.00, '2026-04-08 16:52:17', '2026-04-08 16:52:17'),
(29, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', 'Asrama Bulanan', 150.00, '2026-04-08 16:52:23', '2026-04-08 16:52:23'),
(30, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', 'Daftar Asrama', 120.00, '2026-04-08 16:52:48', '2026-04-08 16:52:48'),
(31, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', 'Asrama Bulanan', 150.00, '2026-04-08 16:52:55', '2026-04-08 16:52:55'),
(32, '01', 'MQA/SWA0628', 'Daftar Asrama', 120.00, '2026-04-08 22:04:27', '2026-04-08 22:04:27'),
(33, '01', 'MQA/SWA0628', 'Asrama Bulanan', 150.00, '2026-04-08 22:04:38', '2026-04-08 22:04:38'),
(34, '01', 'MQA/SWA0630', 'Daftar Asrama', 120.00, '2026-04-08 22:05:28', '2026-04-08 22:05:28'),
(35, '01', 'MQA/SWA0630', 'Asrama Bulanan', 150.00, '2026-04-08 22:05:36', '2026-04-08 22:05:36'),
(36, '01', 'MQA/SWA0629', 'Daftar Asrama', 120.00, '2026-04-08 22:06:05', '2026-04-08 22:06:05'),
(37, '01', 'MQA/SWA0629', 'Asrama Bulanan', 150.00, '2026-04-08 22:06:16', '2026-04-08 22:06:16');

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

--
-- Dumping data for table `yuran_pendaftarans`
--

INSERT INTO `yuran_pendaftarans` (`id`, `kod_institusi`, `kod_kursus`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(21, '000', 'DSI', 'Pendaftaran', 1300.00, '2026-04-07 20:00:29', '2026-04-07 20:00:29'),
(22, '000', 'DEC', 'Pendaftaran', 1300.00, '2026-04-07 21:09:43', '2026-04-07 21:09:43'),
(23, '000', 'DDWG', 'Pendaftaran', 1300.00, '2026-04-07 21:12:35', '2026-04-07 21:12:35'),
(24, '000', 'DDWF', 'Pendaftaran', 1300.00, '2026-04-07 21:16:03', '2026-04-07 21:16:03'),
(25, '000', 'BA111', 'Pendaftaran', 1300.00, '2026-04-07 21:21:22', '2026-04-07 21:21:22'),
(26, '000', 'AC110', 'Pendaftaran', 1300.00, '2026-04-07 21:29:12', '2026-04-07 21:29:12'),
(27, '000', 'BA003', 'Pendaftaran', 1300.00, '2026-04-07 21:31:47', '2026-04-07 21:31:47'),
(28, '000', 'MQA/FA15689', 'Pendaftaran', 1800.00, '2026-04-07 22:04:33', '2026-04-07 22:04:33'),
(29, '000', 'MQA/FA15689', 'Uniform', 150.00, '2026-04-07 22:05:21', '2026-04-07 22:05:21'),
(30, '000', 'MQA/FA15689', 'Buku Kokurikulum', 6.00, '2026-04-07 22:05:35', '2026-04-07 22:05:35'),
(31, '000', 'MQA/FA15689', 'Kad Matrik', 20.00, '2026-04-07 22:06:10', '2026-04-07 22:06:10'),
(32, 'DKU045(N)', 'MQA/FA3436', 'Pendaftaran', 1800.00, '2026-04-07 22:29:21', '2026-04-07 22:29:21'),
(33, 'DKU045(N)', 'MQA/FA3436', 'Uniform', 150.00, '2026-04-07 22:29:28', '2026-04-07 22:29:28'),
(34, 'DKU045(N)', 'MQA/FA3436', 'Buku Kokurikulum', 6.00, '2026-04-07 22:29:36', '2026-04-07 22:29:36'),
(35, 'DKU045(N)', 'MQA/FA3436', 'Kad Matrik', 20.00, '2026-04-07 22:29:53', '2026-04-07 22:29:53'),
(36, 'L02922', 'T982-001-3:2017 (Tahap 3) / T982-001-4:2018 (Tahap 4)', 'Pendaftaran', 1850.00, '2026-04-07 23:43:31', '2026-04-07 23:43:31'),
(37, 'L02890', 'K12001/G452-002-4:2017-ST-A', 'Pendaftaran', 1850.00, '2026-04-07 23:53:24', '2026-04-07 23:53:24'),
(38, 'DK268(W)', 'R2/213/4/0359 (MQA/A6023)', 'Pendaftaran', 1300.00, '2026-04-08 16:51:28', '2026-04-08 16:51:28'),
(39, 'DK268(W)', '(R/321/4/0029) – MQA/FA0611', 'Pendaftaran', 1300.00, '2026-04-08 16:52:08', '2026-04-08 16:52:08'),
(40, 'DK268(W)', 'R2/861/4/0003 – MQA/FA10855', 'Pendaftaran', 1300.00, '2026-04-08 16:52:39', '2026-04-08 16:52:39'),
(41, '01', 'MQA/SWA0628', 'Pendaftaran', 1300.00, '2026-04-08 22:04:16', '2026-04-08 22:04:16'),
(42, '01', 'MQA/SWA0630', 'Pendaftaran', 1300.00, '2026-04-08 22:05:19', '2026-04-08 22:05:19'),
(43, '01', 'MQA/SWA0629', 'Pendaftaran', 1300.00, '2026-04-08 22:05:55', '2026-04-08 22:05:55'),
(44, 'DK030(N)', '(R3/0913/4/00560)(10,29)(MQA/FA5362)', 'Pendaftaran', 1500.00, '2026-04-09 18:56:52', '2026-04-09 18:56:52'),
(45, 'DK030(N)', '(R3/0913/4/0057)03,30)(MQA/FA8746)', 'Pendaftaran', 1500.00, '2026-04-09 19:02:01', '2026-04-09 19:02:01'),
(46, 'DK030(N)', '(R2/0414/4/044)(8,28)(MQA/FA3436)', 'Pendaftaran', 1500.00, '2026-04-09 19:16:02', '2026-04-09 19:16:02'),
(47, 'DK030(N)', '(N/0414/4/0018)(06/27)(MQA/FA15689)', 'Pendaftaran', 1500.00, '2026-04-09 19:18:30', '2026-04-09 19:18:30');

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

--
-- Dumping data for table `yuran_pengajians`
--

INSERT INTO `yuran_pengajians` (`id`, `kod_institusi`, `kod_kursus`, `peringkat`, `tempoh`, `amount`, `created_at`, `updated_at`) VALUES
(5, '000', 'DSI', 'Pinjaman PTPTN', '3 TAHUN', 18000.00, '2026-04-07 20:01:08', '2026-04-07 20:01:08'),
(6, '000', 'DEC', 'Pinjaman PTPTN', '3 TAHUN', 18000.00, '2026-04-07 21:10:13', '2026-04-07 21:10:13'),
(7, '000', 'DDWG', 'Pinjaman PTPTN', '3 TAHUN', 19000.00, '2026-04-07 21:13:07', '2026-04-07 21:13:07'),
(8, '000', 'DDWF', 'Pinjaman PTPTN', '3 TAHUN', 19000.00, '2026-04-07 21:16:32', '2026-04-07 21:16:32'),
(9, '000', 'BA111', 'Pinjaman PTPTN/Insentif Pendidikan B40', '3 TAHUN', 22800.00, '2026-04-07 21:22:51', '2026-04-07 21:22:51'),
(10, '000', 'AC110', 'Pinjaman PTPTN/Insentif Pendidikan B40', '3 TAHUN', 22800.00, '2026-04-07 21:29:53', '2026-04-07 21:29:53'),
(11, '000', 'BA003', 'Pinjaman PTPTN/Insentif Pendidikan B40', '3 TAHUN', 22800.00, '2026-04-07 21:32:13', '2026-04-07 21:32:13'),
(12, 'DKU045(N)', 'MQA/FA3436', 'Pinjaman PTPTN', '3 TAHUN', 38000.00, '2026-04-07 22:31:01', '2026-04-07 22:31:01'),
(13, 'DKU045(N)', 'MQA/FA15689', 'Pinjaman PTPTN', '3 TAHUN', 21360.00, '2026-04-07 22:31:55', '2026-04-07 22:31:55'),
(14, 'DK030(N)', '(R3/0913/4/00560)(10,29)(MQA/FA5362)', 'yuran pengajian', '3 TAHUN', 38250.00, '2026-04-09 18:56:14', '2026-04-09 18:56:14'),
(16, 'DK030(N)', '(R2/0414/4/044)(8,28)(MQA/FA3436)', 'yuran pengajian', '3 TAHUN', 38000.00, '2026-04-09 19:15:48', '2026-04-09 19:15:48'),
(17, 'DK030(N)', '(N/0414/4/0018)(06/27)(MQA/FA15689)', 'yuran pengajian', '3 TAHUN', 27940.00, '2026-04-09 19:18:17', '2026-04-09 19:18:17'),
(18, 'DK030(N)', '(R3/0913/4/0057)03,30)(MQA/FA8746)', 'yuran pengajian', '3 TAHUN', 38250.00, '2026-04-09 19:23:55', '2026-04-09 19:23:55');

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
-- Dumping data for table `yuran_pilihans`
--

INSERT INTO `yuran_pilihans` (`id`, `kod_institusi`, `kod_kursus`, `pilihan`, `item`, `amount`, `created_at`, `updated_at`) VALUES
(2, '28600', 'ET-012-3:2012', 'PILIHAN', 'JPK', 300.00, '2026-04-08 04:44:00', '2026-04-08 04:44:00'),
(4, 'C-21-G', 'MC-091-2:2013 / MC-091-3:2013 / MC-091-4:2013', 'PILIHAN', 'JP', 200.00, '2026-04-08 17:57:05', '2026-04-08 17:57:05'),
(5, '78000', 'F432-005-2:2019 / F432-005-3:2019', 'PILIHAN', 'PENDAFTARAN ASRAMA', 200.00, '2026-04-08 17:59:13', '2026-04-08 17:59:13'),
(6, '78000', 'F432-005-2:2019 / F432-005-3:2019', 'PILIHAN', 'JP', 100.00, '2026-04-08 17:59:35', '2026-04-08 17:59:35'),
(7, '71700 ', 'HT-012-2:2012 / HT-012-3:2012', 'PILIHAN', 'PENDAFTARAN ASRAMA', 200.00, '2026-04-08 18:00:59', '2026-04-08 18:00:59'),
(8, '71700 ', 'HT-012-2:2012 / HT-012-3:2012', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:01:21', '2026-04-08 18:01:21'),
(9, '71700 ', 'IT-020-3:2013 / IT-020-4:2013', 'PILIHAN', 'PENDAFTARAN ASRAMA', 200.00, '2026-04-08 18:03:55', '2026-04-08 18:03:55'),
(10, '71700 ', 'IT-020-3:2013 / IT-020-4:2013', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:04:10', '2026-04-08 18:04:10'),
(11, '71700 ', 'N821-001-3:2020', 'PILIHAN', 'PENDAFTARAN ASRAMA', 200.00, '2026-04-08 18:05:13', '2026-04-08 18:05:13'),
(12, '71700 ', 'N821-001-3:2020', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:05:24', '2026-04-08 18:05:24'),
(13, '47160', '1561-005-2:2022 / 1561-005-3:2022', 'PILIHAN', 'ACCESS CARD', 50.00, '2026-04-08 18:08:31', '2026-04-08 18:08:31'),
(14, '47160', 'HT-014-2:2011 / HT-014-3:2011', 'PILIHAN', 'ACCESS CARD', 50.00, '2026-04-08 18:10:17', '2026-04-08 18:10:17'),
(16, 'L01143', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:13:11', '2026-04-08 18:13:11'),
(17, 'L01143', 'MC-024-3:2012', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:13:53', '2026-04-08 18:13:53'),
(18, 'L01143', 'S960-002-3:2020S', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:15:28', '2026-04-08 18:15:28'),
(19, 'L02138', 'HT-013-3-2011', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:16:39', '2026-04-08 18:16:39'),
(20, 'L02138', 'HT-012-3-2012S', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:17:12', '2026-04-08 18:17:12'),
(21, 'L02138', 'F432-005-3-2019', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:17:53', '2026-04-08 18:17:53'),
(22, 'L02138', 'I561-005-3:2022S', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:19:22', '2026-04-08 18:19:22'),
(23, 'L02138', 'S960-002-3:2020', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:19:52', '2026-04-08 18:19:52'),
(24, 'L02138', 'I561-005-2:2022 / I561-005-3:2022 / HT-012-4:2011', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:20:23', '2026-04-08 18:20:23'),
(25, '42000', 'G452-002-2:2018 / G452-002-3:2018 / G452-002-4:2017', 'PILIHAN', 'PENDAFTARAN ASRAMA', 130.00, '2026-04-08 18:24:57', '2026-04-08 18:24:57'),
(26, '42000', 'G452-002-2:2018 / G452-002-3:2018 / G452-002-4:2017', 'PILIHAN', 'TSHIRT', 30.00, '2026-04-08 18:25:14', '2026-04-08 18:25:14'),
(27, '42000', 'F432-005-2:2019 / F432-005-3:2019 / F432-005-4:2019', 'PILIHAN', 'PENDAFTARAN ASRAMA', 130.00, '2026-04-08 18:26:28', '2026-04-08 18:26:28'),
(28, '42000', 'F432-005-2:2019 / F432-005-3:2019 / F432-005-4:2019', 'PILIHAN', 'TSHIRT', 30.00, '2026-04-08 18:26:52', '2026-04-08 18:26:52'),
(29, '42000', 'S960-002-2:2020 / S960-002-3:2020 / S960-002-4:2020', 'PILIHAN', 'PENDAFTARAN ASRAMA', 130.00, '2026-04-08 18:27:36', '2026-04-08 18:27:36'),
(31, '42000', 'S960-002-2:2020 / S960-002-3:2020 / S960-002-4:2020', 'PILIHAN', 'TSHIRT', 30.00, '2026-04-08 18:28:06', '2026-04-08 18:28:06'),
(32, '42000', 'IT-020-3:2013 / IT-020-4:2013', 'PILIHAN', 'TSHIRT', 30.00, '2026-04-08 18:29:00', '2026-04-08 18:29:00'),
(34, 'L02238', 'ME-011-3:2014', 'PILIHAN', 'PENDAFTARAN ASRAMA', 180.00, '2026-04-08 18:30:52', '2026-04-08 18:30:52'),
(35, 'L02238', 'ME-011-3:2014', 'PILIHAN', 'ACCESS CARD', 50.00, '2026-04-08 18:31:10', '2026-04-08 18:31:10'),
(36, 'L02080', 'S960-002-1:2020/S960-002-2:2020', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:34:39', '2026-04-08 18:34:39'),
(37, 'L02080', 'IT-0583:3:2012', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:35:23', '2026-04-08 18:35:23'),
(40, '144465-D', 'FB-025-3:2012', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:38:47', '2026-04-08 18:38:47'),
(41, '144465-D', 'FB-025-3:2012', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:39:07', '2026-04-08 18:39:07'),
(42, '144465-D', 'IT-020-3:2013', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:41:01', '2026-04-08 18:41:01'),
(43, '144465-D', 'IT-020-3:2013', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:41:19', '2026-04-08 18:41:19'),
(44, '144465-D', 'F432-005-3:2019S', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:42:26', '2026-04-08 18:42:26'),
(45, '144465-D', 'F432-005-3:2019S', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:42:40', '2026-04-08 18:42:40'),
(46, '144465-D', 'G452-002-2/3:2028', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:43:42', '2026-04-08 18:43:42'),
(47, '144465-D', 'G452-002-2/3:2028', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:44:07', '2026-04-08 18:44:07'),
(48, '144465-D', '1561-005-2/3:2022', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:45:04', '2026-04-08 18:45:04'),
(49, '144465-D', '1561-005-2/3:2022', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:45:17', '2026-04-08 18:45:17'),
(50, '144465-D', 'G452-007-3:2019S', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-08 18:46:17', '2026-04-08 18:46:17'),
(51, '144465-D', 'G452-007-3:2019S', 'PILIHAN', 'JPK', 100.00, '2026-04-08 18:46:25', '2026-04-08 18:46:25'),
(54, '53100', 'F432-005-2:2019', 'PILIHAN', 'JPK', 180.00, '2026-04-08 18:51:31', '2026-04-08 18:51:31'),
(55, '53100', '1561-002:2:2018', 'PILIHAN', 'JPK', 180.00, '2026-04-08 18:52:12', '2026-04-08 18:52:12'),
(56, 'L02882', 'G452-002-3:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-08 18:54:12', '2026-04-08 18:54:12'),
(57, 'L02163', 'MC-091-2:2016 / MC-091-3:2016 / MC-091-4:2016', 'PILIHAN', 'PENDAFTARAN ASRAMA (D)', 260.00, '2026-04-08 18:57:58', '2026-04-08 18:57:58'),
(58, 'L02163', 'MC-091-2:2016 / MC-091-3:2016 / MC-091-4:2016', 'PILIHAN', 'PENDAFTARAN ASRAMA (B)', 260.00, '2026-04-08 18:58:19', '2026-04-08 18:58:19'),
(59, '70300', 'T982-001-3:2017 | T982-001-4:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA', 250.00, '2026-04-08 18:59:36', '2026-04-08 18:59:36'),
(60, '70300', 'T982-001-3:2017 | T982-001-4:2018', 'PILIHAN', 'JPK', 200.00, '2026-04-08 18:59:46', '2026-04-08 18:59:46'),
(61, '70300', '1561-005-3:2022', 'PILIHAN', 'PENDAFTARAN ASRAMA', 250.00, '2026-04-08 19:00:56', '2026-04-08 19:00:56'),
(62, '70300', '1561-005-3:2022', 'PILIHAN', 'JPK', 200.00, '2026-04-08 19:01:11', '2026-04-08 19:01:11'),
(63, 'P13A-1', 'G452-002-3:2018-S', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:08:12', '2026-04-08 19:08:12'),
(64, 'P13A-1', 'F432-005-3-2019S', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:09:43', '2026-04-08 19:09:43'),
(65, '28600', 'G452-002-3:2018S', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:12:33', '2026-04-08 19:12:33'),
(66, '28600', '7982-001-3:2017', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:14:27', '2026-04-08 19:14:27'),
(67, 'P13A', 'MC-024-3:2022', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:15:21', '2026-04-08 19:15:21'),
(68, 'P13A', 'I561-005-3:2022', 'PILIHAN', 'JPK', 300.00, '2026-04-08 19:15:50', '2026-04-08 19:15:50'),
(69, '47650', 'T982-001-3:2017', 'PILIHAN', 'PENDAFTARAN ASRAMA', 180.00, '2026-04-08 19:25:29', '2026-04-08 19:25:29'),
(70, '47650', 'T982-001-3:2017', 'PILIHAN', 'ACCESS CARD', 50.00, '2026-04-08 19:25:53', '2026-04-08 19:25:53'),
(71, 'L02723', 'N821-001-3:2020 / FB-025-4:2012', 'PILIHAN', 'JPK', 100.00, '2026-04-08 19:27:43', '2026-04-08 19:27:43'),
(72, 'L02723', 'HT-041-2:2011 / HT-041-3:2011', 'PILIHAN', 'JPK', 100.00, '2026-04-08 19:28:31', '2026-04-08 19:28:31'),
(73, 'L02723', 'T982-001-3:2017 / T982-001-4:2018', 'PILIHAN', 'JPK', 100.00, '2026-04-08 19:29:41', '2026-04-08 19:29:41'),
(74, 'C-21-G', 'P854-009-4:2020S', 'PILIHAN', 'JPK', 200.00, '2026-04-08 19:33:33', '2026-04-08 19:33:33'),
(75, 'L02138', 'F432-005-2:2019 / F432-005-3:2019', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-09 18:03:52', '2026-04-09 18:03:52'),
(76, '42000', 'MC-024-3:2012', 'PILIHAN', 'PENDAFTARAN ASRAMA', 150.00, '2026-04-09 18:12:15', '2026-04-09 18:12:15'),
(78, 'L01143', 'MC-024-3:2012', 'PILIHAN', 'TSHIRT', 30.00, '2026-04-09 18:13:31', '2026-04-09 18:13:31'),
(79, '42000', 'IT-020-3:2013 / IT-020-4:2013', 'PILIHAN', 'PENDAFTARAN ASRAMA', 130.00, '2026-04-09 18:15:36', '2026-04-09 18:15:36'),
(80, 'L02238', 'F432-005-2:2019 / F432-005-3:2019', 'PILIHAN', 'PENDAFTARAN ASRAMA', 180.00, '2026-04-09 18:23:26', '2026-04-09 18:23:26'),
(81, 'L02238', 'F432-005-2:2019 / F432-005-3:2019', 'PILIHAN', 'ACCESS CARD', 50.00, '2026-04-09 18:23:43', '2026-04-09 18:23:43'),
(82, 'L02758', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'DEPOSIT ULTILITI', 100.00, '2026-04-09 18:25:58', '2026-04-09 18:25:58'),
(83, 'L02758', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'PENGANGKUTAN', 100.00, '2026-04-09 18:28:09', '2026-04-09 18:28:09'),
(84, '144465-D', 'MC-024-3:2012', 'PILIHAN', 'PENDAFTARAN ASRAMA', 400.00, '2026-04-09 18:30:13', '2026-04-09 18:30:13'),
(85, '144465-D', 'MC-024-3:2012', 'PILIHAN', 'JPK', 100.00, '2026-04-09 18:31:03', '2026-04-09 18:31:03'),
(86, 'L02882', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA', 300.00, '2026-04-09 18:35:50', '2026-04-09 18:35:50'),
(87, 'L02163', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA (B)', 260.00, '2026-04-09 18:37:56', '2026-04-09 18:37:56'),
(88, 'L02163', 'G452-002-2:2018 / G452-002-3:2018', 'PILIHAN', 'PENDAFTARAN ASRAMA (D)', 260.00, '2026-04-09 18:38:22', '2026-04-09 18:38:22'),
(89, 'P13A-1', 'MC-024-3:2012', 'PILIHAN', 'JPK', 300.00, '2026-04-09 18:45:39', '2026-04-09 18:45:39'),
(90, '28600', 'MC-024-3:2012', 'PILIHAN', 'JPK', 300.00, '2026-04-09 18:49:33', '2026-04-09 18:49:33'),
(91, '28600', 'F432-005-3:2019S', 'PILIHAN', 'JPK', 300.00, '2026-04-09 18:51:45', '2026-04-09 18:51:45'),
(92, 'L02723', 'G452-002-3:2018', 'PILIHAN', 'JPK', 100.00, '2026-04-09 18:53:54', '2026-04-09 18:53:54'),
(93, 'L02723', 'G452-002-3:2018', 'PILIHAN', 'JPK', 100.00, '2026-04-09 18:55:20', '2026-04-09 18:55:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elauns`
--
ALTER TABLE `elauns`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`);

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
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `institusis`
--
ALTER TABLE `institusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kerjayas`
--
ALTER TABLE `kerjayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `kursuses`
--
ALTER TABLE `kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yuran_asramas`
--
ALTER TABLE `yuran_asramas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `yuran_pendaftarans`
--
ALTER TABLE `yuran_pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `yuran_pengajians`
--
ALTER TABLE `yuran_pengajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `yuran_pilihans`
--
ALTER TABLE `yuran_pilihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
