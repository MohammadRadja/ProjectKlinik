-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Agu 2025 pada 15.00
-- Versi server: 8.0.42-0ubuntu0.24.04.2
-- Versi PHP: 8.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Tindakan','Obat') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double(20,2) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `kode`, `name`, `jenis`, `harga`, `keterangan`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'I0001', 'Pijat', 'Tindakan', 57000.00, '-', 'true', 'superuser', 'superuser', '2022-07-01 05:17:40', '2022-07-01 05:17:40'),
(2, 'I0002', 'Mixagrip', 'Obat', 15000.00, '-', 'true', 'superuser', 'superuser', '2022-07-01 05:17:56', '2022-07-01 05:17:56'),
(3, 'I0003', 'Redoxon', 'Obat', 50000.00, '-', 'true', 'superuser', 'superuser', '2022-07-01 05:18:10', '2022-07-01 05:18:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis` enum('On Site','Panggilan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `users_id`, `hari`, `kuota`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `jenis`) VALUES
(1, 5, 'senin', 10, 'true', 'superuser', 'superuser', '2022-06-30 09:04:36', '2022-07-02 06:56:11', 'On Site'),
(2, 5, 'rabu', 12, 'true', 'superuser', 'superuser', '2022-06-30 09:04:44', '2022-06-30 09:04:44', 'On Site'),
(3, 5, 'selasa', 5, 'true', 'superuser', 'superuser', '2022-06-30 09:04:54', '2022-06-30 09:04:54', 'Panggilan'),
(4, 5, 'jumat', 5, 'true', 'superuser', 'superuser', '2022-06-30 09:05:04', '2022-06-30 09:05:04', 'Panggilan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter_log`
--

CREATE TABLE `jadwal_dokter_log` (
  `jadwal_dokter_id` int NOT NULL,
  `id` int NOT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasien_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_reservasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('On Site','Panggilan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_dokter_log`
--

INSERT INTO `jadwal_dokter_log` (`jadwal_dokter_id`, `id`, `hari`, `tanggal`, `created_at`, `updated_at`, `pasien_id`, `status`, `no_reservasi`, `telp`, `alamat`, `jenis`, `status_pembayaran`, `ref`) VALUES
(2, 1, 'selasa', '2025-07-30', '2022-06-30 10:18:16', '2022-06-30 11:10:04', 1, 'Reserved', 'R0001', '32323', '23443434', 'On Site', NULL, 'PE0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_29_141551_create_sessions_table', 2),
(6, '2022_06_29_142112_add_username_to_users', 2),
(7, '2022_06_29_143854_add_role_id_to_users', 3),
(8, '2022_06_29_144309_create_role', 3),
(10, '2022_06_29_145045_add_column_batch_1_to_users', 4),
(13, '2022_06_29_173319_create_jadwal_dokter', 5),
(14, '2022_06_29_173524_create_jadwal_dokter_log', 5),
(17, '2022_06_30_053303_create_pasien', 6),
(18, '2022_06_30_053618_add_pasien_id_to_jadwal_dokter_log', 6),
(19, '2022_06_30_061024_add_status_to_jadwal_dokter_log', 7),
(22, '2022_06_30_061526_create_pasien_rekam_medis', 8),
(25, '2022_06_30_091321_add_no_reservasi_to_jadwal_dokter_log', 9),
(26, '2022_06_30_115448_add_jenis_to_jadwal_dokter_log', 10),
(27, '2022_06_30_153900_add_column_jenis_to_jadwal_dokter', 11),
(30, '2022_07_01_035806_create_pembayaran', 12),
(31, '2022_07_01_040047_add_status_pembayaran_to_jadwal_dokter_log', 12),
(32, '2022_07_01_041325_create_pembayaran_detail', 13),
(34, '2022_07_01_065259_add_status_pembeyaran_to_pasien_rekam_medis', 15),
(35, '2022_07_01_044714_create_item', 16),
(36, '2022_07_01_122007_add_qty_to_pembayaran_detail', 17),
(37, '2022_07_01_121958_add_qty_to_item', 18),
(38, '2022_07_01_130131_add_ref_to_pembayaran', 18),
(39, '2022_07_01_144625_add_ref_to_jadwal_dokter_log', 19),
(40, '2022_07_01_152028_add_password_change_date_to_users', 20),
(41, '2022_07_02_111547_create_notifications_table', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int NOT NULL,
  `id_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `id_pasien`, `name`, `tanggal_lahir`, `jenis_kelamin`, `telp`, `alamat`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'RM0001', 'Rani wongso', '2002-12-28', 'Perempuan', '32323', '23443434', 'superuser', 'superuser', '2022-06-29 22:52:03', '2022-06-29 23:05:33', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_rekam_medis`
--

CREATE TABLE `pasien_rekam_medis` (
  `pasien_id` int NOT NULL,
  `id` int NOT NULL,
  `id_rekam_medis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dokter_id` int NOT NULL,
  `tindakan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien_rekam_medis`
--

INSERT INTO `pasien_rekam_medis` (`pasien_id`, `id`, `id_rekam_medis`, `tanggal`, `dokter_id`, `tindakan`, `keterangan`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_pembayaran`) VALUES
(1, 1, 'PE0001', '2022-07-01', 5, '23', '23232', 'superuser', 'superuser', '2022-06-30 11:10:04', '2022-07-01 06:41:29', 'Done'),
(1, 2, 'PE0002', '2022-07-02', 5, 'tes', 'tes', 'Adi Wielijarni', 'Adi Wielijarni', '2022-07-02 05:25:00', '2022-07-02 05:31:57', 'Done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `nomor_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `pasien_id` int NOT NULL,
  `metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(20,2) NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nomor_invoice`, `tanggal`, `pasien_id`, `metode_pembayaran`, `total`, `bank`, `no_rekening`, `no_transaksi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `ref`) VALUES
(1, 'INV/072022/0001', '2022-07-01', 1, 'Non Tunai', 122000.00, 'Bank Transfer (BRI)', '91839089', '234798435493543', 'Released', 'superuser', 'superuser', '2022-07-01 06:41:29', '2022-07-01 07:14:06', 'PE0001'),
(2, 'INV/072022/0002', '2022-07-02', 1, 'Non Tunai', 122000.00, 'Bank Transfer (BCA)', '3334', '2323232', 'Released', 'Adi Wielijarni', 'Adi Wielijarni', '2022-07-02 05:31:57', '2022-07-02 05:31:57', 'PE0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail`
--

CREATE TABLE `pembayaran_detail` (
  `pembayaran_id` int NOT NULL,
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `total` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran_detail`
--

INSERT INTO `pembayaran_detail` (`pembayaran_id`, `id`, `item_id`, `total`, `created_at`, `updated_at`, `qty`) VALUES
(1, 1, 1, 57000.00, '2022-07-01 07:14:06', '2022-07-01 07:14:06', 1),
(1, 2, 2, 15000.00, '2022-07-01 07:14:06', '2022-07-01 07:14:06', 1),
(1, 3, 3, 50000.00, '2022-07-01 07:14:06', '2022-07-01 07:14:06', 1),
(2, 1, 1, 57000.00, '2022-07-02 05:31:57', '2022-07-02 05:31:57', 1),
(2, 2, 2, 15000.00, '2022-07-02 05:31:57', '2022-07-02 05:31:57', 1),
(2, 3, 3, 50000.00, '2022-07-02 05:31:57', '2022-07-02 05:31:57', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', 'me', 'me', '2022-06-29 16:29:53', '2022-06-29 16:29:54'),
(2, 'Perawat', 'me', 'me', '2022-06-29 16:30:10', '2022-06-29 16:30:11'),
(3, 'SuperAdmin', 'me', 'me', '2022-06-29 17:19:33', '2022-06-29 17:19:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password_change_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `role_id`, `telp`, `alamat`, `user_id`, `tanggal_lahir`, `password_change_date`) VALUES
(1, 'superuser', 'dewa17a@gmail.com', NULL, '$2y$12$dpf/cOelAiYF1WT6SxW3n.19sHI3nkvp0Jq3LTrLyeC8BU1ZWBLJq', 'RMIHIEZQjpgwtM96TwuufKk8KK8Sawda0E0H39rLJ7ZiY1RPeKA4FqUBn1oz', '2022-06-29 06:16:09', '2022-06-29 06:18:58', 'admin', 3, NULL, NULL, NULL, NULL, NULL),
(2, 'Adi Wielijarni', 'superuser@gmail.com', NULL, '$2y$12$dpf/cOelAiYF1WT6SxW3n.19sHI3nkvp0Jq3LTrLyeC8BU1ZWBLJq', NULL, '2022-06-29 07:28:31', '2022-07-01 08:22:31', 'superuser', 3, '123123', '12312312', NULL, '2022-07-01', '2022-07-01 08:22:31'),
(3, 'tes', 'tes@gmail.com', NULL, '$2y$10$Y9Ez01yUfnxYO/OOex4TTed8Evd3V.5PifWkCHLzI8ZvXVNQVTZuy', NULL, '2022-06-29 10:13:10', '2022-06-29 10:13:10', 'perawat', 2, '2323', '23232', 'P0001', '2022-06-21', NULL),
(4, 'deni', 'deni@gmail.com', NULL, '$2y$10$ZxZMSevLf6XF3q/u5zLTYeSb6dipRbV0zQoGCZQVrYXtapfOAhkFS', NULL, '2022-06-29 10:14:05', '2022-07-02 06:52:31', 'dokter', 1, '23232', '323232', 'P0002', '2022-06-16', '2022-07-02 06:52:31'),
(5, 'faisal', 'faisal@gmail.com', NULL, '$2y$10$pkT/GnYRfOf095ytcUWLXeCCLOoc4kck0NLyz5Kv45uAGRLtqi9ky', NULL, '2022-06-29 10:14:19', '2022-06-29 11:39:08', 'dokter2', 1, '2312', '312321321', 'T0001', '2022-06-21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_dokter_log`
--
ALTER TABLE `jadwal_dokter_log`
  ADD PRIMARY KEY (`jadwal_dokter_id`,`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien_rekam_medis`
--
ALTER TABLE `pasien_rekam_medis`
  ADD PRIMARY KEY (`pasien_id`,`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD PRIMARY KEY (`pembayaran_id`,`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
