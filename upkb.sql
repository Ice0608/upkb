-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2026 at 02:41 AM
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
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tarikh_event` date NOT NULL,
  `masa_event` time NOT NULL,
  `PIC` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `lokasi`, `tarikh_event`, `masa_event`, `PIC`, `created_at`, `updated_at`) VALUES
(1, 'TEST EVENT', 'DEWAN SERBAGUNA', '2026-04-14', '23:28:00', 'AMIRUL MUKMININ', '2026-04-12 16:28:17', '2026-04-12 16:28:17'),
(4, 'TEST EVENT2', 'NO 34 JALAN MPK 4 KEPAYANG COMMERCE SQUARE 70300 SEREMBAN NEGERI SEMBILAN', '2026-04-13', '21:31:00', 'AMIRUL MUKMININ2', '2026-04-12 16:30:50', '2026-04-12 16:30:50');

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
(3, 'C-21-G', 'images/galeri/c-21-g-1775713632.png', 'KAWASAN KOLEJ', '2026-04-08 21:47:12', '2026-04-08 21:47:12'),
(4, 'C-21-G', 'images/galeri/c-21-g-1775713672.png', 'ASRAMA', '2026-04-08 21:47:52', '2026-04-08 21:47:52'),
(5, 'C-21-G', 'images/galeri/c-21-g-1775713713.png', 'BILIK AIR', '2026-04-08 21:48:33', '2026-04-08 21:48:33'),
(6, 'C-21-G', 'images/galeri/c-21-g-1775713815.png', 'KAWASAN PERSEKITARAN KOLEJ', '2026-04-08 21:50:15', '2026-04-08 21:50:15'),
(7, 'C-21-G', 'images/galeri/c-21-g-1775713906.png', 'KELAS', '2026-04-08 21:51:46', '2026-04-08 21:51:46'),
(8, 'C-21-G', 'images/galeri/c-21-g-1775714001.png', 'KAWASAN PERSEKITARAN KOLEJ', '2026-04-08 21:53:21', '2026-04-08 21:53:21'),
(9, 'C-21-G', 'images/galeri/c-21-g-1775714071.png', 'BERDEKATAN KOLEJ', '2026-04-08 21:54:31', '2026-04-08 21:54:31'),
(10, 'C-21-G', 'images/galeri/c-21-g-1775714140.png', 'DOBI', '2026-04-08 21:55:40', '2026-04-08 21:55:40'),
(11, '70300', 'images/galeri/70300-1775715036.jpeg', 'KAWASAN ASRAMA', '2026-04-08 22:10:36', '2026-04-08 22:10:36'),
(12, '70300', 'images/galeri/70300-1775715129.jpeg', 'ASRAMA', '2026-04-08 22:12:09', '2026-04-08 22:12:09'),
(13, '70300', 'images/galeri/70300-1775715200.jpeg', 'ASRAMA', '2026-04-08 22:13:21', '2026-04-08 22:13:21');

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
(2, 'C-21-G', 'KOLEJ DAYATECH', 'TVET', 'images/institusi/kolej-dayatech-1775609988.webp', 'Pusat Komersial Arena Bintang, C21-G,1,2 Jalan Zuhal U5/179, Seksyen U5, 40150 Shah Alam, Selangor', 'Pusat Latihan Kemahiran bertauliah yang mengkhusus dalam bidang teknikal dan kejuruteraan. Menawarkan program Sijil Kemahiran Malaysia (SKM) yang berorientasikan latihan amali bagi melahirkan tenaga kerja mahir yang kompeten, profesional dan memenuhi kehendak industri masa kini.', '2026-04-07 16:59:48', '2026-04-07 22:22:16'),
(3, '78000', 'KOLEJ TEKNIKAL BUMIPUTERA (KTEB)', 'TVET', 'images/institusi/kolej-teknikal-bumiputera-kteb-1775620045.jpeg', 'Wisma Umno, Jalan Anggerik 2, Taman Seri Bayu 2, 78000 Alor Gajah, Melaka', 'Penubuhan kolej ini telah diluluskan oleh Menteri Pendidikan sebagai Institusi Pendidikan Tinggi Swasta (IPTS) pada 11 Julai 1997 dengan nama “INSTITUT YAYASAN ALOR GAJAH”. Ia juga didaftarkan dengan Pendaftar Sekolah Melaka pada 29 September 1997. Dengan pengembangan dan penambahan peralatan dan kakitangan pengajar, “INSTITUT YAYASAN MELAKA” secara rasmi ditukar nama kepada “KOLEJ TEKNOLOGI YAYASAN ALOR GAJAH” pada 11 Mei 2002 yang dikenali sebagai KT-YAGA. KT-YAGA kemudian diambil alih pada akhir 2009 oleh nama terkenal dalam sektor pendidikan tinggi, KN Education Sdn. Bhd. Pelbagai penambahbaikan dan reformasi dicapai di bawah pengurusan ini, dan dinamakan semula sebagai institusi Kolej Teknologi Unifield yang diluluskan oleh Kementerian Pendidikan Tinggi pada 06 Januari 2011. Selaras dengan visi, satu penjenamaan semula dilakukan dan diluluskan secara rasmi pada 11 Mac 2013 dan kolej ini kini dikenali sebagai UNIFIELD INTERNATIONAL COLLEGE (UIC)', '2026-04-07 19:47:25', '2026-04-07 22:31:26'),
(4, '71700', 'KOLEJ TEKNIKAL BUMIPUTERA (KTEB)', 'TVET', 'images/institusi/kolej-teknikal-bumiputera-kteb-1775627125.webp', 'Lot 27, Jalan Kaunselor 2, College Heights Garden Resort,\r\n71700 Pajam Mantin, Negeri Sembilan', 'Penubuhan kolej ini telah diluluskan oleh Menteri Pendidikan sebagai Institusi Pendidikan Tinggi Swasta (IPTS) pada 11 Julai 1997 dengan nama “INSTITUT YAYASAN ALOR GAJAH”. Ia juga didaftarkan dengan Pendaftar Sekolah Melaka pada 29 September 1997. Dengan pengembangan dan penambahan peralatan dan kakitangan pengajar, “INSTITUT YAYASAN MELAKA” secara rasmi dinamakan semula sebagai “KOLEJ TEKNOLOGI YAYASAN ALOR GAJAH” pada 11 Mei 2002 yang dikenali sebagai KT-YAGA. KT-YAGA kemudian diambil alih pada akhir 2009 oleh nama terkenal dalam sektor pendidikan tinggi, KN Education Sdn. Bhd. Pelbagai penambahbaikan dan pembaharuan dicapai di bawah pengurusan ini, dan dinamakan semula sebagai institusi Kolej Teknologi Unifield yang diluluskan oleh Kementerian Pendidikan Tinggi pada 06 Januari 2011. Selaras dengan visi, satu penjenamaan semula dilakukan dan diluluskan secara rasmi pada 11 Mac 2013 dan kini kolej ini dikenali sebagai UNIFIELD INTERNATIONAL COLLEGE (UIC).', '2026-04-07 21:45:25', '2026-04-07 22:33:56'),
(5, '47160', 'SILVERSPOON INTERNATIONAL COLLEGE', 'TVET', 'images/institusi/silverspoon-international-college-1775628370.jpg', '12 & 12A, Jalan OP1/3, Pusat Perdagangan One Puchong, Off, Jalan Puchong, Bandar Puchong Jaya, 47160 Puchong, Selangor, Malaysia', 'Silverspoon International College (SSiC) telah ditubuhkan pada 2010 dengan objektif untuk menyediakan latihan vokasional yang mantap dalam kursus Seni Kulinari dan Pastri seperti yang diluluskan oleh Jabatan Pembangunan Kemahiran (JPK) di bawah Kementerian Sumber Manusia, Malaysia. Kolej Antarabangsa Silverspoon (SSiC) percaya bahawa pengalaman industri sebenar adalah bahagian penting dalam pendidikan hospitaliti. Pelajar akan berpeluang menjalani praktikum atau Koperasi di pelbagai hotel, restoran, katering syarikat penerbangan, dan lain-lain, yang diatur secara eksklusif oleh SSiC apabila permintaan meningkat untuk graduan baru untuk mengisi pelbagai jawatan dan bekerja dengan jayanya melalui pangkat.', '2026-04-07 21:58:56', '2026-04-07 22:36:57'),
(6, 'L01143', 'NOBLE SCHOOL ENGINEERING', 'TVET', 'images/institusi/noble-school-engineering-1775629028.webp', '36 Mb2, Kampus Kejuruteraan Noble Taman Medan Bersatu 34000 Taiping, Perak', 'Noble TVET adalah merupakan kumpulan dua (2) ILKS yang telah disatukan bagi mewujudkan satu reformasi latihan berkonsepkan Industri untuk mempertingkatkan jumlah tenaga kerja terlatih di dalam IKS tempatan. Terletak di bandar Taiping – sebuah Bandar Warisan tinggalan 33 sejarah awal pembangunan Tanah Melayu sejak tahun 1800 yang dikenali sebagai ‘The Rain Town of Malaysia’ dan merupakan pemenang tempat Ke-3 Anugerah 100 Destinasi Lestari Terbaik Dunia Di International Tourismus-Borse (ITB) Berlin, Germany 2018. Dan pada 16 Disember 2022 Taiping sekali lagi telah menerima Anugerah Destinasi Rekreasi Terbaik Industri Pelancongan Malaysia 2022 (Malaysia Tourism Industry Award 2022).', '2026-04-07 22:17:08', '2026-04-07 22:17:08'),
(7, 'L02138', 'NOBLE SCHOOL CITY CAMPUS', 'TVET', 'images/institusi/noble-school-city-campus-1775631090.jpg', '33, Jalan TBC 3, Taiping Business Centre, 34000 Taiping, Perak.', 'Noble TVET adalah merupakan kumpulan dua (2) ILKS yang telah disatukan bagi mewujudkan satu reformasi latihan berkonsepkan Industri untuk mempertingkatkan jumlah tenaga kerja terlatih di dalam IKS tempatan. Terletak di bandar Taiping – sebuah Bandar Warisan tinggalan 33 sejarah awal pembangunan Tanah Melayu sejak tahun 1800 yang dikenali sebagai ‘The Rain Town of Malaysia’ dan merupakan pemenang tempat Ke-3 Anugerah 100 Destinasi Lestari Terbaik Dunia Di International Tourismus-Borse (ITB) Berlin, Germany 2018. Dan pada 16 Disember 2022 Taiping sekali lagi telah menerima Anugerah Destinasi Rekreasi Terbaik Industri Pelancongan Malaysia 2022 (Malaysia Tourism Industry Award 2022).', '2026-04-07 22:51:30', '2026-04-07 22:51:30'),
(8, '42000', 'WORKERS INSRITUTE TECHNOLOGY', 'TVET', 'images/institusi/workers-insritute-technology-1775632540.jpg', 'Jalan Banting, Off Jalan Pandamaran, 42000 Port Klang, Selangor Malaysia.', 'Kolej WIT sebelum ini dikenali sebagai Workers Institute of Technology, kolej kejuruteraan dan latihan teknikal berasaskan Pembangunan Sumber Manusia di Malaysia. Objektif utama WIT adalah untuk menyediakan pengajian kejuruteraan, latihan vokasional dan kemahiran teknikal yang akan membolehkan pelajar untuk maju dalam kehidupan dan membantu usaha kerajaan Malaysia dalam mencapai matlamat tinggi untuk menjadikan Malaysia sebuah negara maju menjelang tahun 2020. WIT merupakan ilham dua orang sahabat setia, Dr. V. David dan Tan Sri Zainal Rampak, daripada Kesatuan Pekerja Pengangkutan Malaysia (TWU) yang dibina pada tahun 1977 di atas 10.4 ekar tanah yang terletak di Kawasan Industri Pandamaran (Pandamaran, Klang Selangor) diatas sebidang tanah yang diberikan oleh Kerajaan Negeri Selangor dibawah kepimpinan Allahyarham Dato\' Seri Harun bin Haji Idris, Menteri Besar Selangor pada waktu itu dengan premium yang paling rendah, dikelilingi oleh perumahan, lebuh raya, pembangunan moden, kawasan perindustrian bagi memenuhi permintaan yang semakin meningkat bagi latihan teknikal untuk lepasan sekolah & komuniti korporat.', '2026-04-07 23:15:40', '2026-04-07 23:15:40'),
(9, 'L02238', 'AZMIDA TECHNICAL COLLEGE', 'TVET', 'images/institusi/azmida-technical-college-1775633722.webp', 'Lot 16988, Jalan 2, Kawasan Industri Taman Selayang Baru, 68100 Batu Caves, Selangor, Malaysia', 'Azmida Technical College (L02238) merupakan sebuah Pusat Bertauliah yang diberi pentauliahan oleh pihak Jabatan Pembangunan Kemahiran (JPK) Kementerian Sumber Manusia Malaysia pada 28 Jun 2011. Pada tahun 2017 Pusat Bertauliah ini telah mendapat pengiktirafan sebagai sebuah Kolej Latihan Kemahiran yang menyediakan latihan berkonsepkan Latihan Teknikal & Pendidikan Vokasional (TVET) dan ditukar nama sebagai Azmida Technical College (L02238).', '2026-04-07 23:35:22', '2026-04-07 23:35:22'),
(10, 'L02758', 'ECO AUTOTRONICS ACADEMY', 'TVET', 'images/institusi/eco-autotronics-academy-1775634578.jpg', 'NO 2 & 4, JALAN IAN 5, 76100 Durian Tunggal Malacca', 'In response to the global green technology initiative, we at Eco Autotronics Academy, we conduct programs in Go-Green Technology. Automobiles have ventured into the realm of hybrid cars and electric vehicles globally. The demand for professional services has surged. Thus, we have planned and developed programme courses to meet the requirements. To help provide the best EV service training programme, we have qualified instructors. These courses are tailored for hybrid projects and current and future vehicles. In order to promote an ideal learning atmosphere, our campus/academy ground is over 10,000 square feet, including a practical area, air-conditioned classrooms, and electronics rooms and more.', '2026-04-07 23:46:26', '2026-04-07 23:49:38'),
(11, 'L02080', 'AF TVET ACADEMY', 'TVET', 'images/institusi/af-tvet-academy-1775636197.jpg', 'Jalan Putra 2 43000 Kajang', 'Pusat Latihan Kemahiran TVET bertauliah yang menawarkan program latihan industri, Sijil Kemahiran & kursus pendek. Melahirkan tenaga mahir, berdaya saing dan diiktiraf.', '2026-04-08 00:16:37', '2026-04-08 00:16:37'),
(12, '144465-D', 'FUTURE EDGE COLLEGE', 'TVET', 'images/institusi/future-edge-college-1775636788.jpg', 'No. B2-01, Jalan Teknologi 2/1D, PJU 5, Kota Damansara, 47810 Petaling Jaya, Selangor Darul Ehsan, Malays', 'Kolej FutureEdge adalah pintu masuk anda kepada program TVET berasaskan kemahiran yang praktikal. Pendekatan kami yang bersifat hands-on membekalkan anda dengan kepakaran yang diperlukan untuk kerjaya yang tinggi permintaan, memastikan anda bersedia bekerja dari hari pertama', '2026-04-08 00:26:28', '2026-04-08 00:26:28'),
(13, '53100', 'S.T.I COLLEGE MALAYSIA', 'TVET', 'images/institusi/sti-college-malaysia-1775637778.jpg', '243-A, 243-B, & 243C,\r\nJalan Bandar 13, Taman Melawati,\r\n53100 Kuala Lumpur, W. P. Kuala Lumpur, Malaysia.', 'Pusat Latihan Kemahiran bertauliah yang mengkhusus dalam bidang teknikal dan kejuruteraan. Menawarkan program Sijil Kemahiran Malaysia (SKM) yang berorientasikan latihan amali bagi melahirkan tenaga kerja mahir yang kompeten, profesional dan memenuhi kehendak industri masa kini.', '2026-04-08 00:41:44', '2026-04-08 00:42:58'),
(14, 'L02882', 'TITAN SKILL COLLEGE', 'TVET', 'images/institusi/titan-skill-college-1775649997.webp', '6, Jln Perusahaan Amari, Kuala Lumpur, Malaysia', 'Pusat Bertauliah Jabatan Pembangunan Kemahiran (JPK)', '2026-04-08 04:06:37', '2026-04-08 04:06:37'),
(15, 'L02163', 'JV SKILL TRAINING CENTRE', 'TVET', 'images/institusi/jv-skill-training-centre-1775650435.jpg', 'No 6-01,6-02,6-03,8-01,10-01 Jalan Pandan Ria 4, Pusat Perdagangan Pandan, 81100 Johor Bahru Premis Tambahan: No.6, Jalan Sri Purnama 2/1 Kangkar Tebrau 81100 Johor Bahru,', 'Pusat Latihan Kemahiran JV ditubuhkan pada 22 Ogos 2009 dengan kurikulum yang relevan dengan industri berdasarkan pembelajaran berasaskan pengalaman bagi menghasilkan graduan yang berkemahiran dan berkelayakan yang memenuhi keperluan industri. JV Skill adalah pusat bertauliah di bawah Jabatan Pembangunan Kemahiran (DSD) di bawah Kementerian Sumber Manusia, Malaysia. Pada Julai 2013, Kolej JV Skill telah diberi penarafan 5-Bintang oleh Jabatan Pembangunan Kemahiran (DSD) di bawah Kementerian Sumber Manusia, Malaysia.', '2026-04-08 04:13:55', '2026-04-08 04:14:58'),
(16, '70300', 'AMBITIOUS ACADEMY', 'TVET', 'images/institusi/ambitious-academy-1775650876.jpeg', 'No. 648-654, Jalan Haruan 4/9, Oakland Commercial Center, 70300 Seremban, Negeri Sembilan.', 'Ambitious Infinite Resources Sdn.Bhd. (AIRSB) mula beroperasi di Setia Tropika, Johor Bahru pada Januari 2014, yang bepindah ke Wisma HYH yang terletak di pusat bandar Johor Bahru pada September 2014. Ambitious Academy Sdn. Bhd. (AASB) kemudiannya mengikuti operasi pertamanya di bangunan yang sama pada Februari 2015. Ambitious Education Group selama bertahun-tahun telah membina reputasi dan rekod pretasi yang boleh dipercayai dalam pelbagai perniagaan yang dikendalikannya. Ini termasuk pendidikan dan latihan, pembangunan kemahiran, perkongsian belajar-kerja, perkhidmatan pengambilan, penyumberan strategik untuk pengurusan tenaga kerja luar jangka dan perundingan. Ia ditugaskan dengan tujuan khusus untuk memenuhi permintaan yang semakin meningkat untuk profesional terlatih dalam masakan, syarikat penerbangan, pelayaran, hotel dan industri lain yang berkaitan. Pada masa ini terletak di bangunan dua setengah tingkat di Skudai Johor Bahru, AIRSB menawarkan kemudahan moden dengan kemudahan seni terkini untuk pelajarnya, menggabungkan ke dalam persekitaran semula jadi dan luas. Dengan Pejabat Pendtadbiran Korporatnya di Seremban, Negeri Sembilan, ia telah melangkah jauh, muncul sebagai salah satu pesaing utama untuk kecemerlangan masakan, hospitaliti, perniagaan dan penerbangan.', '2026-04-08 04:21:16', '2026-04-08 04:21:16'),
(17, 'P13A-1', 'MALAYSIA TECHNICAL SKILL ACADEMY (MTSA) TEMERLOH', 'TVET', 'images/institusi/malaysia-technical-skill-academy-mtsa-temerloh-1775651288.webp', 'No. P13A-1, 1, Jalan Lama Bentong - Karak, 28600 Karak, Pahang, Malaysia', 'Adalah sebuah pusat penyediaan latihan yang memfokuskan kepada bidang kemahiran sebagai teras yang mengikut arus perdana kini. Kami percaya dengan latihan berkualiti tinggi dan kemahiran profesional yang diterapkan oleh para pengajar di kolej MTSA Karak, para pelajar bukan sahaja dapat meningkatkan jati diri, tetapi juga dapat membangunkan modal insan, samada dalam bidang pendidikan atau bidang pekerjaan. “Kami memberi jaminan masa depan yang lebih baik dengan kemahiran yang lebih baik”!', '2026-04-08 04:28:08', '2026-04-08 04:28:08'),
(18, '28600', 'MALAYSIA TECHNICAL SKILL ACADEMY (MTSA) KARAK', 'TVET', 'images/institusi/malaysia-technical-skill-academy-mtsa-karak-1775651678.webp', 'No. P13A-1, 1, Jalan Lama Bentong - Karak, 28600 Karak, Pahang, Malaysia', 'Adalah sebuah pusat penyediaan latihan yang memfokuskan kepada bidang kemahiran sebagai teras yang mengikut arus perdana kini. Kami percaya dengan latihan berkualiti tinggi dan kemahiran profesional yang diterapkan oleh para pengajar di kolej MTSA Karak, para pelajar bukan sahaja dapat meningkatkan jati diri, tetapi juga dapat membangunkan modal insan, samada dalam bidang pendidikan atau bidang pekerjaan. “Kami memberi jaminan masa depan yang lebih baik dengan kemahiran yang lebih baik”!', '2026-04-08 04:34:38', '2026-04-08 04:34:38'),
(19, 'P13A', 'MALAYSIA TECHNICAL SKILL ACADEMY (MTSA) BENTONG', 'TVET', 'images/institusi/malaysia-technical-skill-academy-mtsa-bentong-1775652498.webp', 'No. P13A-1, 1, Jalan Lama Bentong - Karak, 28600 Karak, Pahang, Malaysia.', 'Adalah sebuah pusat penyediaan latihan yang memfokuskan kepada bidang kemahiran sebagai teras yang mengikut arus perdana kini. Kami percaya dengan latihan berkualiti tinggi dan kemahiran profesional yang diterapkan oleh para pengajar di kolej MTSA Karak, para pelajar bukan sahaja dapat meningkatkan jati diri, tetapi juga dapat membangunkan modal insan, samada dalam bidang pendidikan atau bidang pekerjaan. “Kami memberi jaminan masa depan yang lebih baik dengan kemahiran yang lebih baik”!', '2026-04-08 04:48:18', '2026-04-08 04:48:48'),
(20, 'L02054', 'DUAL TRAINING INSTITUTE (DTI)', 'TVET', 'images/institusi/dual-training-institute-dti-1775653038.webp', 'Lot 158 Jalan S2b3 Green Technology Park Seremban 2 70300 Seremban Ns', 'Institut Latihan Dual adalah sebuah institusi pendidikan yang menggabungkan pengetahuan teori dengan latihan praktikal.', '2026-04-08 04:57:18', '2026-04-08 04:57:18'),
(21, 'TP-060-3:2013', 'MEATECH COLLEGE', 'TVET', 'images/institusi/meatech-college-1775653602.jpg', 'L2-11 & L2-12, Tingkat 2, Tower B (Begonia), Youth City Residence, Vision City, Persiaran Pusat Bandar, Bandar Baru Nilai 71800 Nilai Negeri Sembilan', 'Bermula 2002 apabila kumpulan meraka dimulakan sebagai Approved Training Provider (ATP) yang diiktiraf oleh Jabatan Pembangunan Kemahiran (DSD), Kementerian Sumber Manusia Malaysia. - Selama bertahun-tahun, Syarikat ini telah melaksanakan banyak projek yang mencabar dan kemahiran terkumpul, pengetahuan dan pengalaman dalam TVET. - Mereka telah melatih sejumlah besar mekanik, pengendali dan juruteknik yang telah memberikan sumbangan besar kepada industri dan kejayaan ekonomi syarikat. - Ogos 2011, Meatech ATC Sdn. Bhd. (MATC) telah diperbadankan, memberi tumpuan terutamanya kepada penyediaan latihan TVET dalam program latihan berkaitan penerbangan. - Pada 2015, MEATECH ATC Sdn. Bhd. menandatangani Memorandum Persefahaman (MoU) dengan Pusat Latihan Penerbangan AERO-Bildung, dan institusi pendidikan yang berpangkalan di Jerman dalam membangunkan kursus latihan pensijilan profesional yang diiktiraf oleh Agensi Keselamatan Penerbangan Eropah (EASA). - Tujuan mereka ialah melahirkan kakitangan pesawat yang berkemahiran tinggi dengan keupayaan untuk melakukan pelbagai aktiviti penyelenggaraan. - Mereka menawarkan 2 program iaitu “AVIATION – AIRCRAFT MAINTENANCE TRAINING” dan “AVIATION – IN-FLIGHT CABIN SERVICES”', '2026-04-08 05:06:42', '2026-04-08 05:06:42'),
(22, '47650', 'MYBUSINESS ACADEMY', 'TVET', 'images/institusi/mybusiness-academy-1775654201.jpg', '2 Jalan Putra Mahkota 7/7A 47650 Subang Jaya', 'Memberi peluang dan laluan kerjaya bagi calon bekerja dan menimba pengalaman dalam industri. - Melaksanakan pantauan pihak akademi bagi penuhi kelayakan (SKM 3) & (DKM) ikut tempoh pengiktirafan pengalaman terdahulu mengikut kod program yang dipilih. - Jurus ke arah kemahiran profesional & releven kepada industry dengan bekalkan calon kepada industry mengikut kod program bersesuaian. - Jalankan kerjasama dengan COLLEGE OF BIRMINGHAM, UNITED KINGDOM. Berasaskan kemahiran & Pembangunan profesional. - MBA merupakan sebuah pusat bertauliah yang berdaftar dengan Jabatan Pembangunan Kemahiran serta melakukan program aperantis.', '2026-04-08 05:16:41', '2026-04-08 05:16:41'),
(23, 'L02723', 'ACADEMY ADELPHI WORLDWIDE', 'TVET', 'images/institusi/academy-adelphi-worldwide-1775654681.jpg', 'No 31, Jalan Durian Emas 4, Betaria Business Centre,701 00 Seremban, N. Sembilan', 'Academy Adelphi Worldwide Hotels Sdn Bhd (Seremban) ialah cawangan kedua selepas cawangan Skudai JB, menawarkan kursus Seni Kulinari, Automotif, Pendidikan Awal Kanak-Kanak, Pengurusan Pejabat dan Pastri yang direka untuk menampung pelajar daripada keluarga berpendapatan rendah melalui Jabatan Pembangunan Kemahiran.', '2026-04-08 05:24:41', '2026-04-08 05:25:50');

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

--
-- Dumping data for table `kursuses`
--

INSERT INTO `kursuses` (`id`, `kod_kursus`, `kod_institusi`, `nama_kursus`, `jenis_kursus`, `mod_pengajian`, `tempoh`, `kuota`, `tarikh_pendaftaran`, `penerangan`, `created_at`, `updated_at`) VALUES
(3, 'P854-009-4:2020S', 'C-21-G', 'PENDIDIKAN AWAL KANAK-KANAK (SINGLE TIER)', 'TAHAP 4 (SINGLE TIER)', 'SEPENUH MASA', '27 BULAN', NULL, NULL, 'Latihan profesional dalam pengurusan tadika/prasekolah dan pengajaran pendidikan awal kanak-kanak.', '2026-04-07 19:13:45', '2026-04-07 19:13:45'),
(4, 'F432-005-2:2019 / F432-005-3:2019', '78000', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK', 'TAHAP 2/TAHAP 3', 'SEPENUH MASA', '12 BULAN / 12 BULAN', NULL, NULL, 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-07 19:49:11', '2026-04-07 19:49:11'),
(5, 'HT-012-2:2012 / HT-012-3:2012', '71700 ', 'KULINARI', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-07 21:51:34', '2026-04-07 21:51:34'),
(6, 'IT-020-3:2013 / IT-020-4:2013', '71700 ', 'OPERASI SISTEM KOMPUTER', 'TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '12 BULAN / 15 BULAN', NULL, NULL, 'Program Sistem Komputer memberi fokus kepada kemahiran asas komputer dan teknologi maklumat, termasuk pemasangan, penyelenggaraan, pengendalian perkakasan, perisian dan rangkaian. Pelajar belajar troubleshoot masalah komputer, pengurusan data, serta memastikan sistem beroperasi dengan cekap dan selamat. Program ini melahirkan tenaga mahir dalam pengurusan dan sokongan sistem komputer.', '2026-04-07 21:53:36', '2026-04-07 21:53:36'),
(7, 'N821-001-3:2020', '71700 ', 'PENGURUSAN & PENTADBIRAN PEJABAT', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Pengurusan Pejabat memberi fokus kepada kemahiran pentadbiran pejabat termasuk pengurusan dokumen, komunikasi, penggunaan perisian pejabat, pengurusan mesyuarat dan penyelenggaraan rekod. Pelajar belajar mengurus operasi pejabat dengan cekap dan profesional. Program ini melahirkan tenaga mahir yang mampu menyokong operasi organisasi dengan teratur dan berkesan.', '2026-04-07 21:54:49', '2026-04-07 21:54:49'),
(8, 'MC-091-2:2013 / MC-091-3:2013 / MC-091-4:2013', 'C-21-G', 'PERKHIDMATAN KEJURUTERAAN AUTOMASI INDUSTRI', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '2 TAHUN 9 BULAN', NULL, NULL, 'Pelajar akan mempelajari pemasangan, pengujian, pengendalian dan penyelenggaraan sistem automasi seperti PLC, sensor, panel kawalan, motor, pneumatik dan hidraulik. Latihan menekankan gabungan teori dan amali, selaras keperluan industri sebenar bagi melahirkan tenaga kerja mahir yang kompeten, berdisiplin dan berdaya saing. Graduan berpeluang bekerja sebagai Juruteknik Automasi, Juruteknik Penyelenggaraan, Automation Engineer Support atau melanjutkan kerjaya ke tahap lebih tinggi dalam bidang automasi industri.', '2026-04-07 22:29:49', '2026-04-07 22:29:49'),
(9, '1561-005-2:2022 / 1561-005-3:2022', '47160', 'KULINARI', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '1 TAHUN 9 BULAN', NULL, NULL, 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-07 22:36:14', '2026-04-07 22:36:14'),
(10, 'HT-014-2:2011 / HT-014-3:2011', '47160', 'PEMBUATAN PASTRI', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '1 TAHUN 6 BULAN', 6, NULL, 'Program Pembuatan Pastri memberi fokus kepada kemahiran menyediakan pelbagai pastri, kek dan manisan. Pelajar belajar teknik asas pastri seperti menguli, membakar, menghias, kawalan suhu, penyediaan krim dan doh, serta kebersihan dapur. Program ini melahirkan pembuat pastri yang mahir, kreatif dan mampu menghasilkan produk berkualiti mengikut standard industri.', '2026-04-07 22:38:57', '2026-04-07 22:38:57'),
(11, 'G452-002-2:2018 / G452-002-3:2018', 'L01143', 'AUTOMOTIF', 'TAHAP 3 / TAHAP 4', 'SEPENUH MASA', 'SEPENUH MASA', 3, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-07 22:40:45', '2026-04-07 22:40:45'),
(12, 'MC-024-3:2012', 'L01143', 'PROSES KIMPALAN ARKA KEPINGAN LOGAM', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', 4, '2026-05-19', 'Program Kimpalan melatih pelajar dalam teknik mengimpal struktur logam menggunakan kaedah seperti SMAW, GTAW dan GMAW. Pelajar belajar membaca lukisan teknikal, menyediakan bahan, mengawal mesin kimpal serta mengutamakan keselamatan bengkel. Program ini melahirkan tenaga mahir yang mampu melakukan kerja fabrikasi dan penyambungan logam mengikut standard industri.', '2026-04-07 22:43:10', '2026-04-07 22:43:10'),
(13, 'S960-002-3:2020S', 'L01143', 'PERKHIDMATAN AUTOMASI INDUSTRI', 'TAHAP 2', 'SEPENUH MASA', '6 BULAN', NULL, NULL, 'Program Automasi memberi fokus kepada penggunaan sistem kawalan, sensor, PLC, robotik dan mesin automatik dalam industri. Pelajar belajar memasang, menguji, menyelenggara dan menambah baik sistem automasi bagi meningkatkan kecekapan pengeluaran. Program ini melahirkan tenaga mahir yang mampu mengendalikan peralatan automasi moden dengan selamat dan profesional.', '2026-04-07 22:44:47', '2026-04-07 22:44:47'),
(14, 'HT-013-3-2011', 'L02138', 'PEMBUATAN ROTI (SINGLE TIER)', 'SINGLE TIER', 'SEPENUH MASA', '15 BULAN', 15, '2026-05-09', 'Program Pembuatan Roti memberi fokus kepada kemahiran menghasilkan pelbagai jenis roti, bun dan pastri asas. Pelajar belajar menyediakan doh, teknik menguli, proses penapaian, membakar dengan betul serta kawalan kualiti dan kebersihan dapur. Program ini melahirkan pembuat roti yang mahir, cekap dan memenuhi standard industri bakeri.', '2026-04-07 22:53:05', '2026-04-07 22:53:05'),
(15, 'HT-012-3-2012S', 'L02138', 'PENYEDIAAN & PENGELUARAN MAKANAN (SINGGLE TIER)', 'SINGLE TIER', 'SEPENUH MASA', '12 BULAN', 3, NULL, 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-07 22:54:35', '2026-04-07 22:54:35'),
(16, 'F432-005-3-2019', 'L02138', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK (SINGLE TIER)', 'SINGLE TIER', 'SEPENUH MASA', '1 TAHUN 4 BULAN', 4, '2026-04-11', 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-07 22:56:00', '2026-04-07 22:56:00'),
(17, 'I561-005-3:2022S', 'L02138', 'OPERASI SENI KULINARI', 'SINGLE TIER', 'SEPENUH MASA', '17 BULAN', 8, '2026-04-11', 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-07 22:57:58', '2026-04-07 22:57:58'),
(18, 'S960-002-3:2020', 'L02138', 'PERKHIDMATAN ESTETIK (SINGLE TI)', 'SINGLE TIER', 'SEPENUH MASA', '17 BULAN', 2, '2026-04-11', 'Program Kecantikan Estetik memberikan latihan dalam penjagaan kulit, rawatan wajah, asas dermatologi, penggunaan peralatan estetik, teknik spa serta penjagaan diri. Pelajar belajar melakukan rawatan kecantikan dengan kaedah yang selamat, profesional dan mengikut standard industri. Program ini melahirkan tenaga mahir dalam perkhidmatan kecantikan dan estetika moden.', '2026-04-07 23:00:48', '2026-04-07 23:00:48'),
(19, 'I561-005-2:2022 / I561-005-3:2022 / HT-012-4:2011', 'L02138', 'PENYEDIAAN & PENGELUARAN MAKANAN', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '8 BULAN / 9 BULAN / 10 BULAN', 4, NULL, 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-07 23:02:22', '2026-04-07 23:02:22'),
(20, 'F432-005-2:2019 / F432-005-3:2019', 'L02138', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '8 BULAN / 9 BULAN', 6, '2026-04-11', 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-07 23:04:27', '2026-04-07 23:04:27'),
(21, 'MC-024-3:2012', '42000', 'KIMPALAN', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, '2026-05-19', 'Program ini memberikan kemahiran lanjutan dalam kimpalan arka logam menggunakan teknik shielded metal arc welding (SMAW). Pelajar akan mempelajari cara menyediakan bahan dan peralatan kimpalan, melaksanakan kimpalan pada pelbagai posisi dan jenis sambungan, mematuhi prosedur keselamatan industri, serta melakukan pemeriksaan dan penilaian kualiti hasil kimpalan.', '2026-04-07 23:18:04', '2026-04-07 23:18:04'),
(22, 'G452-002-2:2018 / G452-002-3:2018 / G452-002-4:2017', '42000', 'AUTOMOTIF', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '12 BULAN / 12 BULAN / 15 BULAN', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-07 23:19:33', '2026-04-07 23:19:33'),
(23, 'F432-005-2:2019 / F432-005-3:2019 / F432-005-4:2019', '42000', 'ELEKTRIK', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '12 BULAN / 12 BULAN / 18 BULAN', NULL, NULL, 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-07 23:20:56', '2026-04-07 23:20:56'),
(24, 'S960-002-2:2020 / S960-002-3:2020 / S960-002-4:2020', '42000', 'PERKHIDMATAN KECANTIKAN', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '6 BULAN / 6 BULAN / 12 BULAN', NULL, NULL, 'Program Kecantikan Estetik memberikan latihan dalam penjagaan kulit, rawatan wajah, asas dermatologi, penggunaan peralatan estetik, teknik spa serta penjagaan diri. Pelajar belajar melakukan rawatan kecantikan dengan kaedah yang selamat, profesional dan mengikut standard industri. Program ini melahirkan tenaga mahir dalam perkhidmatan kecantikan dan estetika moden.', '2026-04-07 23:24:14', '2026-04-07 23:24:14'),
(25, 'IT-020-3:2013 / IT-020-4:2013', '42000', 'OPERASI SISTEM KOMPUTER', 'TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '12 BULAN / 21 BULAN', NULL, NULL, 'Program Sistem Komputer memberi fokus kepada kemahiran asas komputer dan teknologi maklumat, termasuk pemasangan, penyelenggaraan, pengendalian perkakasan, perisian dan rangkaian. Pelajar belajar troubleshoot masalah komputer, pengurusan data, serta memastikan sistem beroperasi dengan cekap dan selamat. Program ini melahirkan tenaga mahir dalam pengurusan dan sokongan sistem komputer.', '2026-04-07 23:25:19', '2026-04-07 23:25:19'),
(26, 'F432-005-2:2019 / F432-005-3:2019', 'L02238', 'ELEKTRIK & ELEKTRONIK', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'Program ini menyediakan kemahiran asas dalam pemasangan, pendawaian dan penyelenggaraan sistem elektrik satu fasa di bangunan kediaman atau komersial kecil. Pelajar akan mempelajari pemasangan litar elektrik mengikut piawaian keselamatan, penyelenggaraan sistem elektrik termasuk pengesanan kerosakan dan pembaikan asas, serta amalan keselamatan kerja semasa bekerja dengan elektrik.', '2026-04-07 23:36:56', '2026-04-07 23:36:56'),
(27, 'ME-011-3:2014', 'L02238', 'OPERASI DAN PENYELENGGARAAN BOILER', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, NULL, 'Program ini memberi latihan kemahiran dalam mengendalikan, memantau dan menyelenggara sistem boiler yang digunakan di industri seperti kilang, loji dan fasiliti komersial. Pelajar akan mempelajari asas operasi boiler, kawalan tekanan dan suhu, langkah keselamatan, prosedur permulaan dan penutupan boiler, pengesanan masalah, serta kerja penyelenggaraan berkala supaya sistem boiler sentiasa beroperasi dengan selamat, cekap dan mengikut piawaian industri.', '2026-04-07 23:38:03', '2026-04-07 23:38:03'),
(28, 'G452-002-2:2018 / G452-002-3:2018', 'L02758', 'AUTOMOTIF', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-07 23:52:01', '2026-04-07 23:52:01'),
(29, 'S960-002-1:2020/S960-002-2:2020', 'L02080', 'KECANTIKAN & PENJAGAAN PERIBADI', 'TAHAP 1 / TAHAP 2', 'SEPENUH MASA', '5 BULAN / 6 BULAN', 3, NULL, 'Program Kecantikan Estetik memberikan latihan dalam penjagaan kulit, rawatan wajah, asas dermatologi, penggunaan peralatan estetik, teknik spa serta penjagaan diri. Pelajar belajar melakukan rawatan kecantikan dengan kaedah yang selamat, profesional dan mengikut standard industri. Program ini melahirkan tenaga mahir dalam perkhidmatan kecantikan dan estetika moden.', '2026-04-08 00:18:15', '2026-04-08 00:18:15'),
(30, 'IT-0583:3:2012', 'L02080', 'REKABENTUK GRAFIK (DIGITAL)', 'TAHAP 2', 'SEPENUH MASA', '12 BULAN', NULL, NULL, 'Program ini memberi pendedahan dan latihan dalam penghasilan reka bentuk visual menggunakan perisian digital. Pelajar akan belajar cara menghasilkan grafik seperti poster, logo, banner, media sosial, bahan promosi dan lain-lain menggunakan prinsip rekabentuk yang betul seperti warna, tipografi, komposisi dan kreativiti. Latihan turut merangkumi penggunaan perisian rekabentuk grafik, pengurusan fail digital serta keperluan asas industri kreatif supaya pelajar mampu menghasilkan hasil kerja yang kemas, menarik dan profesional.', '2026-04-08 00:19:18', '2026-04-08 00:19:18'),
(31, 'MC-024-3:2012', '144465-D', 'KIMPALAN', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, '2026-05-19', 'Program Kimpalan melatih pelajar dalam teknik mengimpal struktur logam menggunakan kaedah seperti SMAW, GTAW dan GMAW. Pelajar belajar membaca lukisan teknikal, menyediakan bahan, mengawal mesin kimpal serta mengutamakan keselamatan bengkel. Program ini melahirkan tenaga mahir yang mampu melakukan kerja fabrikasi dan penyambungan logam mengikut standard industri.', '2026-04-08 00:29:38', '2026-04-08 00:29:38'),
(32, 'FB-025-3:2012', '144465-D', 'SETIAUSAHA KORPORAT', 'TAHAP 3', 'SEPENUH MASA', '1 TAHUN', NULL, NULL, 'Program Setiausaha Korporat memberi fokus kepada kemahiran pentadbiran korporat, pengurusan dokumen rasmi, pematuhan undang-undang dan prosedur syarikat, serta komunikasi profesional. Pelajar belajar menyokong operasi organisasi, memastikan pentadbiran syarikat teratur dan mematuhi peraturan. Program ini melahirkan tenaga mahir yang cekap, teratur dan beretika dalam urusan korporat.', '2026-04-08 00:30:56', '2026-04-08 00:30:56'),
(33, 'IT-020-3:2013', '144465-D', 'RANGKAIAN KOMPUTER', 'TAHAP 3', 'SEPENUH MASA', '1 TAHUN', NULL, NULL, 'Program Rangkaian Komputer memberi fokus kepada pemasangan, penyelenggaraan dan pengurusan rangkaian komputer. Pelajar belajar konfigurasi router dan switch, keselamatan rangkaian, troubleshooting serta pengurusan trafik data. Program ini melahirkan tenaga mahir yang mampu memastikan rangkaian beroperasi dengan cekap, selamat dan mengikut piawaian industri.', '2026-04-08 00:31:58', '2026-04-08 00:31:58'),
(34, 'F432-005-3:2019S', '144465-D', 'ELEKTRIK', 'TAHAP 3', 'SEPENUH MASA', '1 TAHUN 4 BULAN', 3, '2026-04-11', 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-08 00:33:10', '2026-04-08 00:33:10'),
(35, 'G452-002-2/3:2028', '144465-D', 'AUTOMOTIF', 'SINGLE TIER', 'SEPENUH MASA', '1 TAHUN 3 BULAN', 2, '2026-05-18', 'Kursus automotif ialah kursus yang memberi pendedahan kepada pelajar tentang penyelenggaraan, pemeriksaan dan pembaikan kenderaan. Pelajar akan belajar secara teori dan praktikal berkaitan enjin, sistem brek, transmisi, elektrik kenderaan, suspensi serta penggunaan peralatan bengkel. Kursus ini sesuai untuk mereka yang minat kerja hands-on, suka kenderaan dan ingin membina kemahiran dalam bidang teknikal. Selepas tamat pengajian, pelajar berpeluang bekerja sebagai juruteknik automotif, mekanik, penasihat servis atau menceburi industri berkaitan kenderaan', '2026-04-08 00:34:57', '2026-04-08 00:34:57'),
(36, '1561-005-2/3:2022', '144465-D', 'OPERASI SENI KULINARI', 'SINGLE TIER', 'SEPENUH MASA', '18 BULAN', NULL, '2026-04-11', 'Memberi latihan dalam penyediaan dan pembuatan makanan, termasuk teknik memasak, kebersihan dan keselamatan makanan, kawalan kualiti hidangan serta pengurusan asas operasi dapur. Kursus ini sesuai untuk pelajar yang minat memasak dan ingin bekerja dalam bidang kulinari, katering, restoran atau hotel.', '2026-04-08 00:36:08', '2026-04-08 00:36:08'),
(37, 'G452-007-3:2019S', '144465-D', 'SERVIS KERETA ELEKTRIK & HIBRID (EV)', 'SINGLE TIER', 'SEPENUH MASA', '1 TAHUN 3 BULAN', 6, '2026-05-18', 'Kursus G452-007-3:2019S Servis Kereta Elektrik & Hibrid (EV) ialah latihan kemahiran untuk melahirkan juruteknik yang mampu melakukan pemeriksaan, diagnosis, servis dan pembaikan bagi kenderaan EV dan hibrid mengikut prosedur bengkel serta piawaian keselamatan voltan tinggi. Peserta akan didedahkan kepada kerja selamat sistem HV, penggunaan alat diagnostik seperti scan tool, serta servis komponen utama seperti bateri dan sistem pengecasan, motor elektrik, inverter/convertor, kabel voltan tinggi dan subsistem sokongan kenderaan. Selepas tamat kursus, peserta lebih bersedia untuk bekerja dalam bidang servis EV/Hybrid di pusat servis atau bengkel automotif, termasuk tugasan diagnostik dan penyelenggaraan sistem utama EV.', '2026-04-08 00:37:26', '2026-04-08 00:37:26'),
(38, 'F432-005-2:2019', '53100', 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, '2026-04-11', 'Program Pemasangan & Penyelenggaraan Elektrik direka untuk melatih pelajar dalam kemahiran teknikal pendawaian elektrik domestik dan industri. Melalui latihan amali yang intensif, pelajar akan menguasai teknik pemasangan sistem satu fasa dan tiga fasa, penyelenggaraan perkakas suis, serta pengujian litar mengikut piawaian Suruhanjaya Tenaga. Program ini menyediakan landasan kukuh bagi melahirkan teknisi yang kompeten untuk memenuhi keperluan sektor pembinaan dan fasiliti negara.', '2026-04-08 00:44:27', '2026-04-08 00:44:27'),
(39, '1561-002:2:2018', '53100', 'OPERASI SERVIS MAKANAN', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '1 TAHUN 9 BULAN', NULL, NULL, 'Program Operasi Servis Makanan direka untuk melatih pelajar dalam kemahiran hospitaliti dan pengurusan restoran secara profesional. Melalui latihan amali yang intensif, pelajar akan menguasai teknik penyediaan ruang makan (Mise-en-place), gaya servis makanan (American, French, & Buffet), serta kemahiran layanan pelanggan yang berkualiti tinggi. Program ini memfokuskan kepada standard kebersihan dan keselamatan makanan (HACCP) bagi melahirkan tenaga kerja mahir yang kompeten untuk industri perhotelan dan katering.', '2026-04-08 00:45:34', '2026-04-08 00:45:34'),
(40, 'G452-002-3:2018', 'L02882', 'SERVIS KENDERAAN RINGAN - AUTOMOTIF (SINGLE TIER)', 'TAHAP 3', 'SEPENUH MASA', '21 BULAN', NULL, NULL, 'Kursus ini memberi pengetahuan teori dan latihan praktikal tentang sistem utama kenderaan. Pelajar akan belajar bagaimana kenderaan berfungsi serta cara melakukan servis dan pembaikan dengan menggunakan peralatan bengkel. Latihan biasanya dijalankan di bengkel automotif, makmal latihan, dan latihan industri supaya pelajar mendapat pengalaman sebenar bekerja dengan kenderaan.', '2026-04-08 04:08:10', '2026-04-08 04:08:10'),
(41, 'G452-002-2:2018 / G452-002-3:2018', 'L02882', 'PERKHIDMATAN PEMBAIKAN – KENDERAAAN RINGAN (AUTOMOTIF)', 'SINGLE TIER', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-08 04:09:21', '2026-04-08 04:09:21'),
(42, 'G452-002-2:2018 / G452-002-3:2018', 'L02163', 'AUTOMOTIF', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-08 04:16:18', '2026-04-08 04:16:18'),
(43, 'MC-091-2:2016 / MC-091-3:2016 / MC-091-4:2016', 'L02163', 'AUTOMASI INDUSTRI', 'TAHAP 2 / TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '6 BULAN / 12 BULAN / 15 BULAN', NULL, NULL, 'Program Automasi memberi fokus kepada penggunaan sistem kawalan, sensor, PLC, robotik dan mesin automatik dalam industri. Pelajar belajar memasang, menguji, menyelenggara dan menambah baik sistem automasi bagi meningkatkan kecekapan pengeluaran. Program ini melahirkan tenaga mahir yang mampu mengendalikan peralatan automasi moden dengan selamat dan profesional.', '2026-04-08 04:17:10', '2026-04-08 04:17:10'),
(44, 'T982-001-3:2017 | T982-001-4:2018', '70300', 'PENGURUSAN PENJAGAAN DAN PENDIDIKAN KANAK-KANAK AWAL', 'TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '27 BULAN', NULL, '2026-04-03', 'Program ini memberi fokus kepada kemahiran mengasuh, mendidik dan mengurus perkembangan awal kanak-kanak dari segi kognitif, sosial, emosi dan fizikal. Pelajar belajar perancangan aktiviti pembelajaran, keselamatan dan kesihatan kanak-kanak, komunikasi berkesan serta pengurusan pusat asuhan. Program ini melahirkan pengasuh dan pendidik awal kanak-kanak yang profesional, penyayang dan beretika.', '2026-04-08 04:22:25', '2026-04-08 04:22:25'),
(45, '1561-005-3:2022', '70300', 'OPERASI SENI KULINARI', 'TAHAP 2 / TAHAP 3', 'SEPENUH MASA', '18 BULAN', 0, '2026-04-11', 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-08 04:23:42', '2026-04-08 04:23:42'),
(46, 'MC-024-3:2012', 'P13A-1', 'KIMPALAN', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, NULL, 'Program Kimpalan melatih pelajar dalam teknik mengimpal struktur logam menggunakan kaedah seperti SMAW, GTAW dan GMAW. Pelajar belajar membaca lukisan teknikal, menyediakan bahan, mengawal mesin kimpal serta mengutamakan keselamatan bengkel. Program ini melahirkan tenaga mahir yang mampu melakukan kerja fabrikasi dan penyambungan logam mengikut standard industri.', '2026-04-08 04:29:12', '2026-04-08 04:29:12'),
(47, 'G452-002-3:2018-S', 'P13A-1', 'AUTOMOTIF', 'SINGLE TIER', 'SEPENUH MASA', '24 BULAN', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-08 04:30:18', '2026-04-08 04:30:18'),
(48, 'F432-005-3-2019S', 'P13A-1', 'ELEKTRIK', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '16 BULAN', NULL, NULL, 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-08 04:31:27', '2026-04-08 04:31:27'),
(49, 'MC-024-3:2012', '28600', 'KIMPALAN', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, NULL, 'Program Kimpalan melatih pelajar dalam teknik mengimpal struktur logam menggunakan kaedah seperti SMAW, GTAW dan GMAW. Pelajar belajar membaca lukisan teknikal, menyediakan bahan, mengawal mesin kimpal serta mengutamakan keselamatan bengkel. Program ini melahirkan tenaga mahir yang mampu melakukan kerja fabrikasi dan penyambungan logam mengikut standard industri.', '2026-04-08 04:35:33', '2026-04-08 04:35:33'),
(50, 'ET-012-3:2012', '28600', 'PENTADBIRAN PRA SEKOLAH', 'TAHAP 3 / TAHAP 4', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'Pentadbiran Pra Sekolah ialah kursus yang memberi pendedahan tentang pengurusan, pentadbiran dan pendidikan awal kanak-kanak di peringkat prasekolah atau tadika. Kursus ini bertujuan melatih pelajar supaya memahami cara mengurus operasi prasekolah serta membimbing perkembangan kanak-kanak secara menyeluruh. Dalam kursus ini, pelajar akan mempelajari asas pendidikan awal kanak-kanak, teknik pengajaran yang sesuai, serta cara mengurus aktiviti pembelajaran yang menyeronokkan dan berkesan untuk kanak-kanak.', '2026-04-08 04:36:43', '2026-04-08 04:40:47'),
(51, 'G452-002-3:2018S', '28600', 'AUTOMOTIF', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-08 04:37:59', '2026-04-08 04:37:59'),
(52, 'F432-005-3:2019S', '28600', 'ELEKTRIK', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '16 BULAN', NULL, NULL, 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-08 04:39:09', '2026-04-08 04:39:09'),
(53, '7982-001-3:2017', '28600', 'PENDIDIKAN AWAL KANAK-KANAK', 'TAHAP 3', 'SEPENUH MASA', '1 TAHUN', NULL, '2026-04-03', 'Program ini memberi fokus kepada kemahiran mengasuh, mendidik dan mengurus perkembangan awal kanak-kanak dari segi kognitif, sosial, emosi dan fizikal. Pelajar belajar perancangan aktiviti pembelajaran, keselamatan dan kesihatan kanak-kanak, komunikasi berkesan serta pengurusan pusat asuhan. Program ini melahirkan pengasuh dan pendidik awal kanak-kanak yang profesional, penyayang dan beretika.', '2026-04-08 04:40:17', '2026-04-08 04:40:17'),
(54, 'MC-024-3:2022', 'P13A', 'KIMPALAN', 'TAHAP 3', 'SEPENUH MASA', '18 BULAN', NULL, NULL, 'Program Kimpalan melatih pelajar dalam teknik mengimpal struktur logam menggunakan kaedah seperti SMAW, GTAW dan GMAW. Pelajar belajar membaca lukisan teknikal, menyediakan bahan, mengawal mesin kimpal serta mengutamakan keselamatan bengkel. Program ini melahirkan tenaga mahir yang mampu melakukan kerja fabrikasi dan penyambungan logam mengikut standard industri', '2026-04-08 04:50:36', '2026-04-08 04:50:36'),
(55, 'I561-005-3:2022', 'P13A', 'OPERASI SENI KULINARI', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '18 BULAN', NULL, '2026-04-11', 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-08 04:51:32', '2026-04-08 04:51:32'),
(56, 'F432-005-3-2019S', 'P13A', 'ELEKTRIK', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '16 BULAN', NULL, NULL, 'Program Elektrik memberi fokus kepada kemahiran memasang, menyelenggara dan membaiki sistem pendawaian serta peralatan elektrik. Pelajar akan belajar asas litar elektrik, pendawaian domestik, penggunaan alat pengujian, pematuhan keselamatan dan standard kerja. Program ini melahirkan tenaga mahir yang mampu melakukan kerja pemasangan dan penyelenggaraan elektrik dengan selamat dan betul.', '2026-04-08 04:52:28', '2026-04-08 04:52:28'),
(57, 'T982-001-3:2017', 'L02054', 'PENDIDIKAN AWAL KANAK-KANAK', 'TAHAP 3', 'SEPENUH MASA', '12 BULAN', 1, '2026-04-03', 'Program ini memberi fokus kepada kemahiran mengasuh, mendidik dan mengurus perkembangan awal kanak-kanak dari segi kognitif, sosial, emosi dan fizikal. Pelajar belajar perancangan aktiviti pembelajaran, keselamatan dan kesihatan kanak-kanak, komunikasi berkesan serta pengurusan pusat asuhan. Program ini melahirkan pengasuh dan pendidik awal kanak-kanak yang profesional, penyayang dan beretika.', '2026-04-08 04:58:30', '2026-04-08 04:58:30'),
(58, 'PERKHIDMATAN DALAM PENERBANGAN', 'TP-060-3:2013', 'PERKHIDMATAN DALAM PENERBANGAN', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Inflight Services memberi fokus kepada kemahiran layanan penumpang, keselamatan kabin, pengurusan makanan dan minuman, komunikasi berkesan serta prosedur kecemasan di dalam penerbangan. Pelajar dilatih untuk menjadi kru kabin profesional yang ramah, cekap dan memastikan pengalaman penerbangan selesa dan selamat.', '2026-04-08 05:09:26', '2026-04-08 05:09:26'),
(59, 'TP-060-4:2013', 'TP-060-3:2013', 'PENYELENGGARAAN PESAWAT', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Aircraft Maintenance memberi fokus kepada penyelenggaraan dan pembaikan pesawat. Pelajar belajar memeriksa enjin, sistem hidraulik, elektrik, avionik dan struktur pesawat, serta mematuhi prosedur keselamatan dan standard penerbangan. Program ini melahirkan tenaga mahir yang mampu memastikan pesawat beroperasi dengan selamat dan cekap mengikut piawaian industri penerbangan.', '2026-04-08 05:10:20', '2026-04-08 05:10:20'),
(60, 'T982-001-3:2017', '47650', 'PENGURUSAN AWAL KANAK-KANAK', 'TAHAP 3', 'SEPENUH MASA', '1 TAHUN', NULL, '2026-04-03', 'Program ini memberi fokus kepada kemahiran mengasuh, mendidik dan mengurus perkembangan awal kanak-kanak dari segi kognitif, sosial, emosi dan fizikal. Pelajar belajar perancangan aktiviti pembelajaran, keselamatan dan kesihatan kanak-kanak, komunikasi berkesan serta pengurusan pusat asuhan. Program ini melahirkan pengasuh dan pendidik awal kanak-kanak yang profesional, penyayang dan beretika.', '2026-04-08 05:18:05', '2026-04-08 05:18:05'),
(61, 'G452-002-3:2018', 'L02723', 'OPERASI SENI KULINARI', 'TAHAP 2 / TAHAP 3 (ST)', 'SEPENUH MASA', '2 TAHUN', NULL, '2026-04-11', 'Program Kulinari memberi latihan dalam kemahiran penyediaan makanan, teknik masakan, kawalan kebersihan, keselamatan dapur dan pengurusan asas dapur. Pelajar belajar memasak pelbagai hidangan, menyedia bahan, menghias makanan serta mematuhi standard kebersihan makanan. Program ini melahirkan tukang masak yang mahir, kreatif dan profesional untuk industri makanan dan perhotelan.', '2026-04-08 05:27:37', '2026-04-08 05:27:37'),
(62, 'N821-001-3:2020 / FB-025-4:2012', 'L02723', 'PENGURUSAN PEJABAT', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Pengurusan Pejabat memberi fokus kepada kemahiran pentadbiran pejabat termasuk pengurusan dokumen, komunikasi, penggunaan perisian pejabat, pengurusan mesyuarat dan penyelenggaraan rekod. Pelajar belajar mengurus operasi pejabat dengan cekap dan profesional. Program ini melahirkan tenaga mahir yang mampu menyokong operasi organisasi dengan teratur dan berkesan.', '2026-04-08 05:28:47', '2026-04-08 05:28:47'),
(63, 'HT-041-2:2011 / HT-041-3:2011', 'L02723', 'PEMBUATAN PASTRI', '-', 'SEPENUH MASA', '-', NULL, NULL, 'Program Pembuatan Pastri memberi fokus kepada kemahiran menyediakan pelbagai pastri, kek dan manisan. Pelajar belajar teknik asas pastri seperti menguli, membakar, menghias, kawalan suhu, penyediaan krim dan doh, serta kebersihan dapur. Program ini melahirkan pembuat pastri yang mahir, kreatif dan mampu menghasilkan produk berkualiti mengikut standard industri.', '2026-04-08 05:29:53', '2026-04-08 05:29:53'),
(64, 'G452-002-3:2018', 'L02723', 'AUTOMOTIF', 'TAHAP 3 / TAHAP 4 (ST)', 'SEPENUH MASA', '2 TAHUN', NULL, NULL, 'Program ini memfokuskan kepada kemahiran asas automotif seperti servis dan baiki kenderaan. Pelajar belajar penyelenggaraan enjin, sistem brek, suspensi, elektrik asas dan keselamatan bengkel. Matlamatnya melahirkan individu yang mahir melakukan kerja servis asas, pemeriksaan dan pembaikan kenderaan ringan.', '2026-04-08 05:30:42', '2026-04-08 05:30:42'),
(65, 'T982-001-3:2017 / T982-001-4:2018', 'L02723', 'PENGURUSAN AWAL KANAK-KANAK', 'TAHAP 3 / TAHAP 4 (ST)', 'SEPENUH MASA', '27 BULAN', NULL, NULL, 'Program ini memberi fokus kepada kemahiran mengasuh, mendidik dan mengurus perkembangan awal kanak-kanak dari segi kognitif, sosial, emosi dan fizikal. Pelajar belajar perancangan aktiviti pembelajaran, keselamatan dan kesihatan kanak-kanak, komunikasi berkesan serta pengurusan pusat asuhan. Program ini melahirkan pengasuh dan pendidik awal kanak-kanak yang profesional, penyayang dan beretika.', '2026-04-08 05:31:51', '2026-04-08 05:31:51');

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
(33, '2026_04_07_124937_fix_messages_id_auto_increment', 13),
(34, '2026_04_07_133220_add_username_and_level_to_users_table', 14),
(35, '2026_04_07_150110_modify_users_table_for_username_and_level', 15),
(36, '2026_04_07_150435_fix_users_id_auto_increment', 16),
(37, '2026_04_09_000000_create_event_table', 17),
(39, '2026_04_09_000002_create_pembayaran_table', 17),
(41, '2026_04_09_000001_create_pelajar_table', 18);

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
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tarikh_pendaftaran` date NOT NULL,
  `nama_pelajar` varchar(255) NOT NULL,
  `ic_pelajar` varchar(255) NOT NULL,
  `no_tel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `kod_institusi` varchar(255) DEFAULT NULL,
  `kod_kursus` varchar(255) DEFAULT NULL,
  `nama_bapa` varchar(255) DEFAULT NULL,
  `ic_bapa` varchar(255) DEFAULT NULL,
  `no_tel_bapa` varchar(255) DEFAULT NULL,
  `pendapatan_bapa` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `ic_ibu` varchar(255) DEFAULT NULL,
  `no_tel_ibu` varchar(255) DEFAULT NULL,
  `pendapatan_ibu` varchar(255) DEFAULT NULL,
  `jumlah_tanggungan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id`, `tarikh_pendaftaran`, `nama_pelajar`, `ic_pelajar`, `no_tel`, `email`, `address_line1`, `address_line2`, `city`, `region`, `postcode`, `kod_institusi`, `kod_kursus`, `nama_bapa`, `ic_bapa`, `no_tel_bapa`, `pendapatan_bapa`, `nama_ibu`, `ic_ibu`, `no_tel_ibu`, `pendapatan_ibu`, `jumlah_tanggungan`, `created_at`, `updated_at`) VALUES
(1, '2026-04-14', 'FULAN BIN FULAN', '012345678990', '01121152996', 'shahrulirfan0608@gmail.com', 'D-1-15, Blok D, PANGSAPURI DAMAI UTAMA', 'JALAN DU7, TAMAN DAMAI UTAMA', 'Puchong', 'Selangor', '47180', NULL, NULL, 'FULAN BIN FALAN', '1234567890', '0122106612', '1500', 'FAULANA BINTI FULANAN', '12345347658', '0132106613', '1500', 4, '2026-04-12 16:27:24', '2026-04-12 16:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ic_pelajar` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `kaedah_pembayaran` varchar(255) NOT NULL,
  `jumlah_bayaran` decimal(12,2) NOT NULL,
  `bayaran_semasa` decimal(12,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `resit` varchar(255) DEFAULT NULL,
  `tarikh_pembayaran` date NOT NULL,
  `masa_pembayaran` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('fOKl7N1v8k6mI2QpoA7pyI4O0WBH7RRmksTrhh31', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN3Fnb2pibEd6ZzlmRXA3OVlLQkhEMjZyZDVNU25jSEpjZGlwNGd2aCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGFmZi9tYWluIjtzOjU6InJvdXRlIjtzOjEwOiJzdGFmZi5tYWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1776040710);

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
(2, '28600', 'ET-012-3:2012', 'ASRAMA BULANAN', 120.00, '2026-04-08 04:43:20', '2026-04-08 04:43:20'),
(3, 'L02054', 'T982-001-3:2017', 'ASRAMA BULANAN', 100.00, '2026-04-08 04:59:57', '2026-04-08 04:59:57'),
(4, 'C-21-G', 'P854-009-4:2020S', 'ASRAMA BULANAN', 200.00, '2026-04-08 17:56:10', '2026-04-08 17:56:10'),
(6, 'C-21-G', 'MC-091-2:2013 / MC-091-3:2013 / MC-091-4:2013', 'ASRAMA BULANAN', 200.00, '2026-04-08 17:57:03', '2026-04-08 17:57:03'),
(7, '78000', 'F432-005-2:2019 / F432-005-3:2019', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:00:01', '2026-04-08 18:00:01'),
(8, '71700 ', 'HT-012-2:2012 / HT-012-3:2012', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:01:32', '2026-04-08 18:01:32'),
(9, '71700 ', 'IT-020-3:2013 / IT-020-4:2013', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:03:32', '2026-04-08 18:03:32'),
(10, '71700 ', 'N821-001-3:2020', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:04:48', '2026-04-08 18:04:48'),
(11, '47160', '1561-005-2:2022 / 1561-005-3:2022', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:08:56', '2026-04-08 18:08:56'),
(12, '47160', 'HT-014-2:2011 / HT-014-3:2011', 'ASRAMA BULANAN', 200.00, '2026-04-08 18:10:24', '2026-04-08 18:10:24'),
(13, 'L01143', 'G452-002-2:2018 / G452-002-3:2018', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:13:22', '2026-04-08 18:13:22'),
(14, 'L01143', 'MC-024-3:2012', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:14:11', '2026-04-08 18:14:11'),
(15, 'L01143', 'S960-002-3:2020S', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:15:41', '2026-04-08 18:15:41'),
(16, 'L02138', 'HT-013-3-2011', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:16:45', '2026-04-08 18:16:45'),
(17, 'L02138', 'HT-012-3-2012S', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:17:17', '2026-04-08 18:17:17'),
(18, 'L02138', 'F432-005-3-2019', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:18:03', '2026-04-08 18:18:03'),
(19, 'L02138', 'I561-005-3:2022S', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:19:27', '2026-04-08 18:19:27'),
(20, 'L02138', 'S960-002-3:2020', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:19:56', '2026-04-08 18:19:56'),
(21, 'L02138', 'I561-005-2:2022 / I561-005-3:2022 / HT-012-4:2011', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:20:29', '2026-04-08 18:20:29'),
(22, '42000', 'G452-002-2:2018 / G452-002-3:2018 / G452-002-4:2017', 'ASRAMA BULANAN', 130.00, '2026-04-08 18:25:50', '2026-04-08 18:25:50'),
(23, '42000', 'F432-005-2:2019 / F432-005-3:2019 / F432-005-4:2019', 'ASRAMA BULANAN', 130.00, '2026-04-08 18:26:58', '2026-04-08 18:26:58'),
(24, '42000', 'S960-002-2:2020 / S960-002-3:2020 / S960-002-4:2020', 'ASRAMA BULANAN', 130.00, '2026-04-08 18:28:12', '2026-04-08 18:28:12'),
(25, '42000', 'IT-020-3:2013 / IT-020-4:2013', 'ASRAMA BULANAN', 130.00, '2026-04-08 18:29:12', '2026-04-08 18:29:12'),
(26, 'L02238', 'ME-011-3:2014', 'ASRAMA BULANAN', 180.00, '2026-04-08 18:31:21', '2026-04-08 18:31:21'),
(27, 'L02080', 'S960-002-1:2020/S960-002-2:2020', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:34:50', '2026-04-08 18:34:50'),
(28, 'L02080', 'IT-0583:3:2012', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:35:29', '2026-04-08 18:35:29'),
(30, '144465-D', 'FB-025-3:2012', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:39:42', '2026-04-08 18:39:42'),
(32, '144465-D', 'FB-025-3:2012', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:40:23', '2026-04-08 18:40:23'),
(33, '144465-D', 'IT-020-3:2013', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:41:38', '2026-04-08 18:41:38'),
(34, '144465-D', 'IT-020-3:2013', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:41:52', '2026-04-08 18:41:52'),
(35, '144465-D', 'F432-005-3:2019S', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:42:53', '2026-04-08 18:42:53'),
(36, '144465-D', 'F432-005-3:2019S', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:43:06', '2026-04-08 18:43:06'),
(37, '144465-D', 'G452-002-2/3:2028', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:44:24', '2026-04-08 18:44:24'),
(38, '144465-D', 'G452-002-2/3:2028', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:44:34', '2026-04-08 18:44:34'),
(39, '144465-D', '1561-005-2/3:2022', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:45:29', '2026-04-08 18:45:29'),
(40, '144465-D', '1561-005-2/3:2022', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:45:41', '2026-04-08 18:45:41'),
(41, '144465-D', 'G452-007-3:2019S', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 18:46:38', '2026-04-08 18:46:38'),
(42, '144465-D', 'G452-007-3:2019S', 'ASRAMA BULANAN (A)', 350.00, '2026-04-08 18:46:50', '2026-04-08 18:46:50'),
(45, '53100', 'F432-005-2:2019', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:51:47', '2026-04-08 18:51:47'),
(46, '53100', '1561-002:2:2018', 'ASRAMA BULANAN', 150.00, '2026-04-08 18:52:18', '2026-04-08 18:52:18'),
(47, 'L02882', 'G452-002-3:2018', 'ASRAMA BULANAN', 300.00, '2026-04-08 18:54:23', '2026-04-08 18:54:23'),
(48, 'L02163', 'MC-091-2:2016 / MC-091-3:2016 / MC-091-4:2016', 'ASRAMA BULANAN', 260.00, '2026-04-08 18:57:28', '2026-04-08 18:57:28'),
(49, '70300', 'T982-001-3:2017 | T982-001-4:2018', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 19:00:05', '2026-04-08 19:00:05'),
(50, '70300', 'T982-001-3:2017 | T982-001-4:2018', 'ASRAMA BULANAN (B)', 250.00, '2026-04-08 19:00:18', '2026-04-08 19:00:18'),
(51, '70300', '1561-005-3:2022', 'ASRAMA BULANAN (D)', 200.00, '2026-04-08 19:01:26', '2026-04-08 19:01:26'),
(52, '70300', '1561-005-3:2022', 'ASRAMA BULANAN (B)', 250.00, '2026-04-08 19:01:44', '2026-04-08 19:01:44'),
(53, 'P13A-1', 'G452-002-3:2018-S', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:08:40', '2026-04-08 19:08:40'),
(54, 'P13A-1', 'F432-005-3-2019S', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:09:54', '2026-04-08 19:09:54'),
(55, '28600', 'G452-002-3:2018S', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:12:40', '2026-04-08 19:12:40'),
(56, '28600', '7982-001-3:2017', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:14:33', '2026-04-08 19:14:33'),
(57, 'P13A', 'MC-024-3:2022', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:15:27', '2026-04-08 19:15:27'),
(58, 'P13A', 'I561-005-3:2022', 'ASRAMA BULANAN', 120.00, '2026-04-08 19:15:57', '2026-04-08 19:15:57'),
(59, 'TP-060-3:2013', 'PERKHIDMATAN DALAM PENERBANGAN', 'ASRAMA BULANAN', 180.00, '2026-04-08 19:18:31', '2026-04-08 19:18:31'),
(60, 'TP-060-3:2013', 'PERKHIDMATAN DALAM PENERBANGAN', 'ASRAMA BULANAN', 180.00, '2026-04-08 19:18:31', '2026-04-08 19:18:31'),
(61, 'TP-060-3:2013', 'TP-060-4:2013', 'ASRAMA BULANAN', 180.00, '2026-04-08 19:19:04', '2026-04-08 19:19:04'),
(62, '47650', 'T982-001-3:2017', 'ASRAMA BULANAN', 180.00, '2026-04-08 19:26:01', '2026-04-08 19:26:01'),
(63, 'L02723', 'N821-001-3:2020 / FB-025-4:2012', 'ASRAMA BULANAN', 200.00, '2026-04-08 19:27:58', '2026-04-08 19:27:58'),
(64, 'L02723', 'HT-041-2:2011 / HT-041-3:2011', 'ASRAMA BULANAN', 200.00, '2026-04-08 19:28:37', '2026-04-08 19:28:37'),
(66, 'L02723', 'T982-001-3:2017 / T982-001-4:2018', 'ASRAMA BULANAN', 200.00, '2026-04-08 19:29:47', '2026-04-08 19:29:47');

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
(2, '28600', 'ET-012-3:2012', 'PENDAFTARAN', 1600.00, '2026-04-08 04:42:03', '2026-04-08 04:42:03'),
(3, 'L02054', 'T982-001-3:2017', 'PENDAFTARAN', 1900.00, '2026-04-08 04:59:31', '2026-04-08 04:59:31'),
(5, 'C-21-G', 'P854-009-4:2020S', 'PENDAFTARAN', 1900.00, '2026-04-08 17:54:44', '2026-04-08 17:54:44'),
(6, 'C-21-G', 'MC-091-2:2013 / MC-091-3:2013 / MC-091-4:2013', 'PENDAFTARAN', 1900.00, '2026-04-08 17:57:12', '2026-04-08 17:57:12'),
(7, '71700 ', 'IT-020-3:2013 / IT-020-4:2013', 'PENDAFTARAN', 1900.00, '2026-04-08 18:03:25', '2026-04-08 18:03:25'),
(8, '71700 ', 'N821-001-3:2020', 'PENDAFTARAN', 1900.00, '2026-04-08 18:04:42', '2026-04-08 18:04:42'),
(9, '47160', '1561-005-2:2022 / 1561-005-3:2022', 'PENDAFTARAN', 1900.00, '2026-04-08 18:08:00', '2026-04-08 18:08:00'),
(10, '47160', 'HT-014-2:2011 / HT-014-3:2011', 'PENDAFTARAN', 1900.00, '2026-04-08 18:09:59', '2026-04-08 18:09:59'),
(11, 'L01143', 'G452-002-2:2018 / G452-002-3:2018', 'PENDAFTARAN', 1900.00, '2026-04-08 18:12:11', '2026-04-08 18:12:11'),
(13, 'L01143', 'S960-002-3:2020S', 'PENDAFTARAN', 1900.00, '2026-04-08 18:15:22', '2026-04-08 18:15:22'),
(14, 'L02138', 'HT-013-3-2011', 'PENDAFTARAN', 1900.00, '2026-04-08 18:16:35', '2026-04-08 18:16:35'),
(15, 'L02138', 'HT-012-3-2012S', 'PENDAFTARAN', 1900.00, '2026-04-08 18:17:07', '2026-04-08 18:17:07'),
(16, 'L02138', 'F432-005-3-2019', 'PENDAFTARAN', 1900.00, '2026-04-08 18:17:37', '2026-04-08 18:17:37'),
(17, 'L02138', 'I561-005-3:2022S', 'PENDAFTARAN', 1900.00, '2026-04-08 18:19:16', '2026-04-08 18:19:16'),
(18, 'L02138', 'S960-002-3:2020', 'PENDAFTARAN', 1900.00, '2026-04-08 18:19:47', '2026-04-08 18:19:47'),
(19, 'L02138', 'I561-005-2:2022 / I561-005-3:2022 / HT-012-4:2011', 'PENDAFTARAN', 1900.00, '2026-04-08 18:20:16', '2026-04-08 18:20:16'),
(20, 'L02138', 'F432-005-2:2019 / F432-005-3:2019', 'PENDAFTARAN', 1900.00, '2026-04-08 18:21:53', '2026-04-08 18:21:53'),
(21, '42000', 'G452-002-2:2018 / G452-002-3:2018 / G452-002-4:2017', 'PENDAFTARAN', 1900.00, '2026-04-08 18:24:45', '2026-04-08 18:24:45'),
(22, '42000', 'F432-005-2:2019 / F432-005-3:2019 / F432-005-4:2019', 'PENDAFTARAN', 1900.00, '2026-04-08 18:26:09', '2026-04-08 18:26:09'),
(23, '42000', 'S960-002-2:2020 / S960-002-3:2020 / S960-002-4:2020', 'PENDAFTARAN', 1900.00, '2026-04-08 18:27:23', '2026-04-08 18:27:23'),
(24, 'L02238', 'ME-011-3:2014', 'PENDAFTARAN', 1900.00, '2026-04-08 18:30:34', '2026-04-08 18:30:34'),
(25, 'L02080', 'S960-002-1:2020/S960-002-2:2020', 'PENDAFTARAN', 1900.00, '2026-04-08 18:34:23', '2026-04-08 18:34:23'),
(26, 'L02080', 'IT-0583:3:2012', 'PENDAFTARAN', 1900.00, '2026-04-08 18:35:18', '2026-04-08 18:35:18'),
(27, '144465-D', 'FB-025-3:2012', 'PENDAFTARAN', 1900.00, '2026-04-08 18:36:42', '2026-04-08 18:36:42'),
(28, '144465-D', 'IT-020-3:2013', 'PENDAFTARAN', 1900.00, '2026-04-08 18:40:47', '2026-04-08 18:40:47'),
(29, '144465-D', 'F432-005-3:2019S', 'PENDAFTARAN', 1900.00, '2026-04-08 18:42:13', '2026-04-08 18:42:13'),
(30, '144465-D', 'G452-002-2/3:2028', 'PENDAFTARAN', 1900.00, '2026-04-08 18:43:32', '2026-04-08 18:43:32'),
(31, '144465-D', '1561-005-2/3:2022', 'PENDAFTARAN', 1900.00, '2026-04-08 18:44:54', '2026-04-08 18:44:54'),
(32, '144465-D', 'G452-007-3:2019S', 'PENDAFTARAN', 1900.00, '2026-04-08 18:46:05', '2026-04-08 18:46:05'),
(34, '53100', 'F432-005-2:2019', 'PENDAFTARAN', 1900.00, '2026-04-08 18:51:12', '2026-04-08 18:51:12'),
(35, '53100', '1561-002:2:2018', 'PENDAFTARAN', 1900.00, '2026-04-08 18:52:08', '2026-04-08 18:52:08'),
(36, 'L02882', 'G452-002-3:2018', 'PENDAFTARAN', 1900.00, '2026-04-08 18:53:50', '2026-04-08 18:53:50'),
(37, 'L02163', 'MC-091-2:2016 / MC-091-3:2016 / MC-091-4:2016', 'PENDAFTARAN', 1900.00, '2026-04-08 18:56:50', '2026-04-08 18:56:50'),
(38, '70300', 'T982-001-3:2017 | T982-001-4:2018', 'PENDAFTARAN', 1900.00, '2026-04-08 18:59:06', '2026-04-08 18:59:06'),
(39, '70300', '1561-005-3:2022', 'PENDAFTARAN', 1900.00, '2026-04-08 19:00:37', '2026-04-08 19:00:37'),
(40, 'P13A-1', 'MC-024-3:2012', 'PENDAFTARAN', 1900.00, '2026-04-08 19:05:33', '2026-04-08 19:05:33'),
(41, 'P13A-1', 'G452-002-3:2018-S', 'PENDAFTARAN', 1600.00, '2026-04-08 19:07:52', '2026-04-08 19:07:52'),
(42, 'P13A-1', 'F432-005-3-2019S', 'PENDAFTARAN', 1600.00, '2026-04-08 19:09:39', '2026-04-08 19:09:39'),
(43, '28600', 'G452-002-3:2018S', 'PENDAFTARAN', 1600.00, '2026-04-08 19:12:26', '2026-04-08 19:12:26'),
(44, '28600', '7982-001-3:2017', 'PENDAFTARAN', 1600.00, '2026-04-08 19:14:09', '2026-04-08 19:14:09'),
(45, 'P13A', 'MC-024-3:2022', 'PENDAFTARAN', 1600.00, '2026-04-08 19:15:16', '2026-04-08 19:15:16'),
(46, 'P13A', 'I561-005-3:2022', 'PENDAFTARAN', 1600.00, '2026-04-08 19:15:46', '2026-04-08 19:15:46'),
(47, 'TP-060-3:2013', 'PERKHIDMATAN DALAM PENERBANGAN', 'PENDAFTARAN', 1900.00, '2026-04-08 19:17:57', '2026-04-08 19:17:57'),
(48, 'TP-060-3:2013', 'TP-060-4:2013', 'PENDAFTARAN', 1900.00, '2026-04-08 19:18:58', '2026-04-08 19:18:58'),
(49, 'L02723', 'N821-001-3:2020 / FB-025-4:2012', 'PENDAFTARAN', 2050.00, '2026-04-08 19:27:29', '2026-04-08 19:27:29'),
(50, 'L02723', 'HT-041-2:2011 / HT-041-3:2011', 'PENDAFTARAN', 2050.00, '2026-04-08 19:28:25', '2026-04-08 19:28:25'),
(51, 'L02723', 'T982-001-3:2017 / T982-001-4:2018', 'PENDAFTARAN', 2050.00, '2026-04-08 19:29:36', '2026-04-08 19:29:36');

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
(33, 'L02238', 'ME-011-3:2014', 'PILIHAN', 'PENDAFTARAN ASRAMA', 180.00, '2026-04-08 18:30:50', '2026-04-08 18:30:50'),
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
(74, 'C-21-G', 'P854-009-4:2020S', 'PILIHAN', 'JPK', 200.00, '2026-04-08 19:33:33', '2026-04-08 19:33:33');

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
-- Indexes for table `event`
--
ALTER TABLE `event`
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
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
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
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `institusis`
--
ALTER TABLE `institusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kerjayas`
--
ALTER TABLE `kerjayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kursuses`
--
ALTER TABLE `kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yuran_asramas`
--
ALTER TABLE `yuran_asramas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `yuran_pendaftarans`
--
ALTER TABLE `yuran_pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `yuran_pengajians`
--
ALTER TABLE `yuran_pengajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yuran_pilihans`
--
ALTER TABLE `yuran_pilihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
