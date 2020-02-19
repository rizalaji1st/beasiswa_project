-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 19, 2020 at 07:21 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bea_mahasiswa`
--

CREATE TABLE `bea_mahasiswa` (
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_penawaran`
--

CREATE TABLE `bea_penawaran` (
  `id_penawaran` bigint(20) UNSIGNED NOT NULL,
  `tgl_awal_penawaran` date NOT NULL,
  `tgl_akhir_penawaran` date NOT NULL,
  `tgl_awal_pendaftaran` date NOT NULL,
  `tgl_akhir_pendaftaran` date NOT NULL,
  `nama_penawaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_beasiswa` int(11) NOT NULL,
  `tahun` datetime NOT NULL,
  `tgl_awal_verifikasi` datetime NOT NULL,
  `tgl_akhir_verifikasi` datetime NOT NULL,
  `tgl_awal_penetapan` datetime NOT NULL,
  `tgl_akhir_penetapan` datetime NOT NULL,
  `tgl_pengumuman` datetime NOT NULL,
  `jml_kuota` int(11) NOT NULL,
  `ips` double(8,2) NOT NULL,
  `ipk` double(8,2) NOT NULL,
  `max_penghasilan` int(11) NOT NULL,
  `min_semester` int(11) NOT NULL,
  `max_semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_penawaran_kuota_fakultas`
--

CREATE TABLE `bea_penawaran_kuota_fakultas` (
  `id_penawaran_kuota_fakultas` bigint(20) UNSIGNED NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `jml_kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_penawaran_upload`
--

CREATE TABLE `bea_penawaran_upload` (
  `id_penawaran_upload` bigint(20) UNSIGNED NOT NULL,
  `id_jenis_file` int(11) NOT NULL,
  `id_pemawaran` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_pendaftar_penawaran`
--

CREATE TABLE `bea_pendaftar_penawaran` (
  `id_pendaftar` bigint(20) UNSIGNED NOT NULL,
  `id_penawaran` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `ips` double(8,2) NOT NULL,
  `ipk` double(8,2) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `is_finalisasi` tinyint(1) NOT NULL,
  `create_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finalized_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finalized_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printed_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_nominate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_accepted` tinyint(1) NOT NULL,
  `accepted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_pendaftar_upload`
--

CREATE TABLE `bea_pendaftar_upload` (
  `id_pendaftar_upload` bigint(20) UNSIGNED NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_jenis_file` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bea_ref_jenis_file`
--

CREATE TABLE `bea_ref_jenis_file` (
  `id_jenis_file` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_02_19_031757_create_bea_mahasiswa_table', 1),
(5, '2020_02_19_032644_create_bea_penawaran', 2),
(6, '2020_02_19_035042_create_bea_penawaran_kuota_fakultas', 3),
(7, '2020_02_19_035925_create_bea_penawaran_upload', 4),
(8, '2020_02_19_040648_create_bea_ref_jenis_file', 5),
(9, '2020_02_19_061816_create_bea_pendaftar_upload', 6),
(10, '2020_02_19_062130_create_bea_pendaftar_penawaran', 7);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bea_mahasiswa`
--
ALTER TABLE `bea_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `bea_penawaran`
--
ALTER TABLE `bea_penawaran`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `bea_penawaran_kuota_fakultas`
--
ALTER TABLE `bea_penawaran_kuota_fakultas`
  ADD PRIMARY KEY (`id_penawaran_kuota_fakultas`);

--
-- Indexes for table `bea_penawaran_upload`
--
ALTER TABLE `bea_penawaran_upload`
  ADD PRIMARY KEY (`id_penawaran_upload`);

--
-- Indexes for table `bea_pendaftar_penawaran`
--
ALTER TABLE `bea_pendaftar_penawaran`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `bea_pendaftar_upload`
--
ALTER TABLE `bea_pendaftar_upload`
  ADD PRIMARY KEY (`id_pendaftar_upload`);

--
-- Indexes for table `bea_ref_jenis_file`
--
ALTER TABLE `bea_ref_jenis_file`
  ADD PRIMARY KEY (`id_jenis_file`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bea_mahasiswa`
--
ALTER TABLE `bea_mahasiswa`
  MODIFY `id_mahasiswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_penawaran`
--
ALTER TABLE `bea_penawaran`
  MODIFY `id_penawaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_penawaran_kuota_fakultas`
--
ALTER TABLE `bea_penawaran_kuota_fakultas`
  MODIFY `id_penawaran_kuota_fakultas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_penawaran_upload`
--
ALTER TABLE `bea_penawaran_upload`
  MODIFY `id_penawaran_upload` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_pendaftar_penawaran`
--
ALTER TABLE `bea_pendaftar_penawaran`
  MODIFY `id_pendaftar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_pendaftar_upload`
--
ALTER TABLE `bea_pendaftar_upload`
  MODIFY `id_pendaftar_upload` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bea_ref_jenis_file`
--
ALTER TABLE `bea_ref_jenis_file`
  MODIFY `id_jenis_file` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
