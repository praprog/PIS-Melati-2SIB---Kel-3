-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2024 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis_melati`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `id_kebutuhan` varchar(110) NOT NULL,
  `Jenis_kebutuhan` varchar(110) NOT NULL,
  `keterangan` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kebutuhan`
--

INSERT INTO `kebutuhan` (`id_kebutuhan`, `Jenis_kebutuhan`, `keterangan`) VALUES
('4d2ee7cf-924f-11ee-9a63-9c7bef3c077e', 'makan', '12 kg kalori'),
('570fc78e-924f-11ee-9a63-9c7bef3c077e', 'minum', '100 ml air'),
('64a0d507-924f-11ee-9a63-9c7bef3c077e', 'obat', 'vitamin C');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` varchar(225) NOT NULL,
  `NIS` varchar(225) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tanggal_kehadiran` date NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `NIS`, `kelas`, `tanggal_kehadiran`, `deskripsi`) VALUES
('30e4cdfa-8760-11ee-b599-9c7bef3c0736', '334', '1A', '2023-11-24', '<p>hadir</p>'),
('8c69d7ae-b14f-11ee-b1d5-0242ac110002', '323332', '1B', '2024-01-03', 'Hadir'),
('144658de-b19b-11ee-b1d5-0242ac110002', '32343432', 'VII A', '2024-01-04', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `kelas`, `deskripsi`) VALUES
(1, 'Sekolah Dasar', '1A', '1A'),
(2, 'Sekolah Dasar', '1B', '1B'),
(3, 'Sekolah Dasar', '2A', '2A'),
(4, 'Sekolah Dasar', '2B', '2B'),
(5, 'Sekolah Dasar', '3A', '3A'),
(6, 'Sekolah Dasar', '3B', '3B'),
(7, 'Sekolah Dasar', '4A', '4A'),
(8, 'Sekolah Dasar', '4B', '4B'),
(9, 'Sekolah Dasar', '5A', '5A'),
(10, 'Sekolah Dasar', '5B', '5B'),
(11, 'Sekolah Dasar', '6A', '6A'),
(12, 'Sekolah Dasar', '6B', '6B'),
(13, 'Sekolah Menengah Pertama', 'VII A', 'VII A'),
(14, 'Sekolah Menengah Pertama', 'VII B', 'VII B'),
(15, 'Sekolah Menengah Pertama', 'VIII A', 'VIII A'),
(16, 'Sekolah Menengah Pertama', 'VIII B', 'VIII B'),
(17, 'Sekolah Menengah Pertama', 'IX A', 'IX A'),
(18, 'Sekolah Menengah Pertama', 'IX B', 'IX B');

-- --------------------------------------------------------

--
-- Table structure for table `kemajuan`
--

CREATE TABLE `kemajuan` (
  `id_kemajuan` varchar(225) NOT NULL,
  `NIS` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kemajuan`
--

INSERT INTO `kemajuan` (`id_kemajuan`, `NIS`, `deskripsi`) VALUES
('a1f6d6a7-8755-11ee-b599-9c7bef3c0736', 'trh', '<p>btge&nbsp;</p>');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_medis`
--

CREATE TABLE `riwayat_medis` (
  `id_rm` varchar(110) NOT NULL,
  `NIS` varchar(110) NOT NULL,
  `keterangan` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_medis`
--

INSERT INTO `riwayat_medis` (`id_rm`, `NIS`, `keterangan`) VALUES
('2a2574cb-924f-11ee-9a63-9c7bef3c077e', '121211', '12112'),
('2fa3d93d-924f-11ee-9a63-9c7bef3c077e', '121212', '121212'),
('8f37b4e3-ac47-11ee-aae6-0242ac110002', '2342', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_murid` int(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_murid` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `data_khusus_murid` varchar(40) NOT NULL,
  `riwayat_medis_murid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_murid`, `nis`, `nama_murid`, `tanggal_lahir`, `alamat`, `id_kelas`, `jenis_kelamin`, `data_khusus_murid`, `riwayat_medis_murid`) VALUES
(1, '0338b2e2-875d-11ee-bd82-9c7bef3cd7c1', 'Reiva', '2023-10-31', 'jl Patria sari', 6, 'Perempuan', 'tuna rungu', 'mental tidak stabil'),
(2, '5862a0ed-875f-11ee-bd82-9c7bef3cd7c1', 'naufal', '2023-11-09', 'rumbai', 2, 'Laki-Laki', 'tuna wicara', 'tidak bisa berbicara sejak umur 5 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', NULL, '$2y$10$jmVK30QRXX3nE/RYGTgY5OWJQAsmv7GrRzQXcqoJ2nMXtwYy6tWdy', NULL, '2024-01-07 15:02:31', '2024-01-07 15:02:31'),
(3, 'guru', 'guru', 'guru', NULL, '$2y$10$/oB1hS3AeDJRU0PEo.ZK7uOmAFxSoaLVmJZIsLOAsmgK5ouCwznN2', NULL, '2024-01-07 15:02:31', '2024-01-07 15:02:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemajuan`
--
ALTER TABLE `kemajuan`
  ADD PRIMARY KEY (`id_kemajuan`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_medis`
--
ALTER TABLE `riwayat_medis`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_murid`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_murid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
