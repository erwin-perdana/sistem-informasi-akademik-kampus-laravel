-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2021 pada 08.47
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_krs` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `p1` int(11) DEFAULT 0,
  `p2` int(11) DEFAULT 0,
  `p3` int(11) DEFAULT 0,
  `p4` int(11) DEFAULT 0,
  `p5` int(11) DEFAULT 0,
  `p6` int(11) DEFAULT 0,
  `p7` int(11) DEFAULT 0,
  `p8` int(11) DEFAULT 0,
  `p9` int(11) DEFAULT 0,
  `p10` int(11) DEFAULT 0,
  `p11` int(11) DEFAULT 0,
  `p12` int(11) DEFAULT 0,
  `p13` int(11) DEFAULT 0,
  `p14` int(11) DEFAULT 0,
  `p15` int(11) DEFAULT 0,
  `p16` int(11) DEFAULT 0,
  `p17` int(11) DEFAULT 0,
  `p18` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absens`
--

INSERT INTO `absens` (`id`, `id_krs`, `id_mahasiswa`, `id_schedule`, `id_ta`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:33:34', '2021-02-23 06:34:23'),
(2, 4, 1, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:33:35', '2021-02-23 06:33:35'),
(3, 5, 1, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:35:12', '2021-02-23 06:35:12'),
(4, 6, 2, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51'),
(5, 7, 2, 11, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51'),
(6, 8, 2, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`id`, `nidn`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `telp`, `email`, `jenis_kelamin`, `id_fakultas`, `photo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1102110, 'Erwin Perdana, M.Kom', 'Kisaran', '2016-10-01', 'TPO LK V', 'Islam', '082274xxxxxxx', 'winp28@gmail.com', 'L', 1, 'Png.png-1610112198.png', NULL, '2021-01-08 06:23:18', '2021-01-08 06:23:18'),
(2, 1102111, 'Erwin, M.Hum', 'tanjungbalai', '2018-01-30', 'STMIK', 'Islam', '082274xxxxxxx', 'winp28@gmail.com', 'L', 1, 'Desert.jpg-1610728220.jpg', NULL, '2021-01-15 09:30:20', '2021-02-16 20:15:52'),
(4, 1102113, 'Joko, M.Kom', 'Kisaran', '2013-09-28', 'Kisaran', 'Islam', '082274xxxxxxx', 'a@gmail.com', 'L', 1, 'Koala.jpg-1612189971.jpg', NULL, '2021-02-01 07:32:51', '2021-02-01 07:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `fakultas`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ilmu Komputer', NULL, '2021-01-04 08:14:20', '2021-01-04 08:17:30'),
(2, 'Kedokteran', NULL, '2021-02-01 07:33:10', '2021-02-01 07:33:10'),
(3, 'Ekonomi', NULL, '2021-02-01 07:33:50', '2021-02-01 07:33:50'),
(4, 'Hukum', NULL, '2021-02-01 07:33:55', '2021-02-01 07:33:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedungs`
--

CREATE TABLE `gedungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gedungs`
--

INSERT INTO `gedungs` (`id`, `gedung`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gedung B', NULL, '2021-01-05 03:30:17', '2021-01-05 03:30:49'),
(2, 'Gedung A', NULL, '2021-01-05 03:35:11', '2021-01-05 03:35:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `angkatan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `id_prodi`, `id_dosen`, `angkatan`, `jumlah`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SI-A', 1, 4, 2020, 2, NULL, '2021-01-08 06:31:58', '2021-02-01 07:34:44'),
(2, 'SI-B', 1, 1, 2020, 3, NULL, '2021-02-01 07:34:38', '2021-02-04 05:40:09'),
(3, 'SK-A', 2, 1, 2020, 1, NULL, '2021-02-05 05:47:48', '2021-02-09 01:16:56'),
(4, 'SI-C', 1, 4, 2020, NULL, NULL, '2021-02-08 08:11:40', '2021-02-08 08:11:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `id_mahasiswa`, `id_schedule`, `id_ta`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, NULL, '2021-02-23 06:30:40', '2021-02-23 06:34:23'),
(4, 1, 6, 1, NULL, '2021-02-23 06:30:40', '2021-02-23 06:30:40'),
(5, 1, 12, 1, NULL, '2021-02-23 06:35:11', '2021-02-23 06:35:11'),
(6, 2, 6, 1, NULL, '2021-02-23 06:35:50', '2021-02-23 06:35:50'),
(7, 2, 11, 1, NULL, '2021-02-23 06:35:50', '2021-02-23 06:35:50'),
(8, 2, 12, 1, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_prodi`, `id_kelas`, `agama`, `telp`, `email`, `jenis_kelamin`, `photo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 16220320, 'erwin perdana', 'tanjungbalai', '2019-02-27', 'TPO', 1, 1, 'Islam', '082274688979', 'winp2807@gmail.com', 'L', 'Koala.jpg-1610110855.jpg', NULL, '2021-01-08 06:00:55', '2021-01-15 08:08:43'),
(2, 16220321, 'Fadilah Amaliyanisa', 'Aek Loba', '1997-12-08', 'Aek loba afdeling 1', 1, 1, 'Islam', '081396293950', 'fadilah@gmail.com', 'P', 'Hydrangeas.jpg-1611312093.jpg', NULL, '2021-01-20 10:31:36', '2021-01-22 04:27:12'),
(3, 16220319, 'Erwin Aston Sihombing', 'sentang', '2020-12-14', 'sentang', 1, 1, 'kristen', '082274688912', 'ombing@gmail.com', 'L', 'Penguins.jpg-1611312131.jpg', NULL, NULL, '2021-01-22 04:27:20'),
(4, 16220316, 'Arif', 'Riau', '2016-03-02', 'Pekan Baru', 1, 2, 'Islam', '082274688979', 'erwin@gmail.com', 'L', 'Tulips.jpg-1611925628.jpg', NULL, '2021-01-29 06:07:08', '2021-02-04 05:40:10'),
(5, 16220317, 'Budi Ramadhan', 'Sei Renggas', '1998-10-02', 'Kisaran', 1, 2, 'Islam', '082274688979', 'budi@gmail.com', 'L', 'Chrysanthemum.jpg-1611926889.jpg', NULL, '2021-01-29 06:28:09', '2021-02-04 05:40:10'),
(9, 16220323, 'Fitri Asrifah', 'Meranti', '1998-02-02', 'Meranti barat', 1, 2, 'Islam', '082274688979', 'a@gmail.com', 'P', 'Jellyfish.jpg-1612189807.jpg', NULL, '2021-02-01 07:30:07', '2021-02-04 05:40:10'),
(10, 16220324, 'Ineke', 'tanjungbalai', '1998-02-11', 'Medan', 1, 1, 'Islam', '082274xxxxxxx', 'a@gmail.com', 'P', 'Tulips.jpg-1612528924.jpg', NULL, '2021-02-05 05:42:04', '2021-02-05 05:42:04'),
(11, 16221001, 'Rizal', 'tanjungbalai', '1198-02-06', 'Kisaran', 2, 3, 'Islam', '082274xxxxxxx', 'a@gmail.com', 'L', 'Penguins.jpg-1612528976.jpg', NULL, '2021-02-05 05:42:56', '2021-02-09 01:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkuls`
--

CREATE TABLE `matkuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smt` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matkuls`
--

INSERT INTO `matkuls` (`id`, `kode`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SI101', 'Algoritma dan Pemrograman 1', 3, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-01-06 06:01:34', '2021-01-06 06:22:42'),
(2, 'SI201', 'Algoritma dan Pemrograman 2', 3, 'Wajib', 2, 'Genap', 1, NULL, '2021-01-06 06:39:40', '2021-01-06 06:43:10'),
(3, 'SI102', 'Pengantar Teknologi Informasi', 3, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-01 07:38:27', '2021-02-01 07:38:27'),
(4, 'SI103', 'Kalkulus 1', 2, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-01 07:39:13', '2021-02-01 07:39:13'),
(5, 'SI104', 'Akuntansi 1', 2, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-05 03:51:31', '2021-02-05 03:51:31'),
(6, 'SI105', 'Pendidikan Agama', 2, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-05 03:52:09', '2021-02-05 03:52:09'),
(7, 'SK101', 'Jaringan Komputer 1', 3, 'Wajib', 1, 'Ganjil', 2, NULL, '2021-02-05 03:53:29', '2021-02-05 03:53:29'),
(8, 'SI109', 'Pendidikan Kewarganegaraan', 2, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-07 07:34:54', '2021-02-07 07:41:08'),
(9, 'SI106', 'Sistem Operasi', 2, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-07 07:35:47', '2021-02-07 07:35:47'),
(10, 'SI107', 'Struktur Data 1', 3, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-07 07:36:37', '2021-02-07 07:36:37'),
(11, 'SI108', 'Desain Grafis 1', 3, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-07 07:37:09', '2021-02-07 07:37:09'),
(12, 'SI110', 'Desain Web 1', 3, 'Wajib', 1, 'Ganjil', 1, NULL, '2021-02-07 07:41:33', '2021-02-07 07:41:33');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2021_01_04_151109_create_fakultas_table', 8),
(14, '2021_01_05_102435_create_gedungs_table', 9),
(15, '2021_01_05_103912_create_ruangans_table', 10),
(17, '2021_01_05_121219_create_prodis_table', 12),
(19, '2021_01_06_111851_create_tahun_akademiks_table', 13),
(20, '2021_01_04_110940_create_matkuls_table', 14),
(22, '2020_12_31_062052_create_mahasiswas_table', 16),
(23, '2021_01_03_130137_create_dosens_table', 17),
(24, '2021_01_08_131126_create_kelas_table', 18),
(25, '2021_01_16_091247_create_schedules_table', 19),
(26, '2014_10_12_100000_create_password_resets_table', 20),
(32, '2014_10_12_000000_create_users_table', 21),
(33, '2016_06_01_000001_create_oauth_auth_codes_table', 21),
(34, '2016_06_01_000002_create_oauth_access_tokens_table', 21),
(35, '2016_06_01_000003_create_oauth_refresh_tokens_table', 21),
(36, '2016_06_01_000004_create_oauth_clients_table', 21),
(37, '2016_06_01_000005_create_oauth_personal_access_clients_table', 21),
(41, '2021_02_01_144913_create_krs_table', 22),
(42, '2021_02_04_125509_create_absens_table', 22),
(43, '2021_02_23_105850_create_nilais_table', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_krs` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `nilai_absen` int(11) DEFAULT 0,
  `nilai_tugas` int(11) DEFAULT 0,
  `nilai_uts` int(11) DEFAULT 0,
  `nilai_uas` int(11) DEFAULT 0,
  `nilai_akhir` int(11) DEFAULT 0,
  `nilai_huruf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `id_krs`, `id_mahasiswa`, `id_schedule`, `id_ta`, `nilai_absen`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `nilai_huruf`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, '2021-02-23 06:33:35', '2021-02-23 06:34:23'),
(2, 4, 1, 6, 1, 80, 60, 70, 80, 74, 'B', NULL, '2021-02-23 06:33:35', '2021-02-24 06:51:44'),
(3, 5, 1, 12, 1, 0, 0, 0, 0, 0, NULL, NULL, '2021-02-23 06:35:12', '2021-02-23 06:35:12'),
(4, 6, 2, 6, 1, 60, 60, 50, 60, 57, 'C', NULL, '2021-02-23 06:35:51', '2021-02-24 06:51:44'),
(5, 7, 2, 11, 1, 0, 0, 0, 0, 0, NULL, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51'),
(6, 8, 2, 12, 1, 0, 0, 0, 0, 0, NULL, NULL, '2021-02-23 06:35:51', '2021-02-23 06:35:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `kode_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ka_prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `id_fakultas`, `kode_prodi`, `prodi`, `ka_prodi`, `jenjang`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'SI', 'Sistem Informasi', '1', 'S1', NULL, '2021-01-05 05:22:07', '2021-01-16 04:24:31'),
(2, 1, 'SK', 'Sistem Komputer', '2', 'S1', NULL, '2021-01-15 09:32:00', '2021-01-16 04:24:38'),
(3, 3, 'EK1', 'Akuntansi', '4', 'S1', NULL, '2021-02-01 07:37:39', '2021-02-01 07:37:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangans`
--

INSERT INTO `ruangans` (`id`, `id_gedung`, `ruangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'B1', NULL, NULL, '2021-01-05 04:19:08'),
(2, 1, 'B2', NULL, NULL, '2021-01-05 04:19:25'),
(3, 2, 'A1', NULL, '2021-01-05 04:02:46', '2021-01-05 04:02:46'),
(4, 2, 'A2', NULL, '2021-01-05 04:19:37', '2021-01-05 04:23:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `id_prodi`, `id_ta`, `id_kelas`, `id_matkul`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 'senin', '08.00 - 10.30', 1, NULL, NULL, '2021-01-16 06:32:47'),
(2, 1, 2, 1, 1, 1, 'Sabtu', 'a', 1, NULL, NULL, '2021-01-16 06:36:06'),
(3, 1, 2, 1, 2, 2, 'Rabu', '09.00 - 11.30', 3, NULL, '2021-01-16 06:00:32', '2021-01-16 06:38:51'),
(4, 1, 2, 1, 2, 1, 'Senin', 'a', 1, NULL, '2021-01-16 06:34:47', '2021-01-16 06:34:47'),
(5, 1, 1, 2, 3, 4, 'Senin', '09.00 - 11.30', 1, NULL, '2021-02-01 07:41:23', '2021-02-16 20:05:08'),
(6, 1, 1, 1, 4, 4, 'Selasa', '09.00 - 11.30', 1, NULL, '2021-02-01 07:41:37', '2021-02-01 07:41:37'),
(7, 1, 1, 1, 5, 2, 'Jum\'at', '08.00 - 10.30', 4, NULL, '2021-02-05 03:54:37', '2021-02-05 03:54:37'),
(8, 1, 1, 2, 6, 2, 'Rabu', '08.00 - 10.30', 2, NULL, '2021-02-05 03:55:03', '2021-02-05 03:55:03'),
(9, 2, 1, 1, 7, 1, 'Kamis', '09.00 - 11.30', 1, NULL, '2021-02-05 04:30:53', '2021-02-05 04:30:53'),
(10, 1, 1, 1, 8, 1, 'Senin', '08.00 - 10.30', 3, NULL, '2021-02-07 07:38:30', '2021-02-07 07:38:30'),
(11, 1, 1, 1, 9, 2, 'Selasa', '08.00 - 10.30', 1, NULL, '2021-02-07 07:38:50', '2021-02-07 07:38:50'),
(12, 1, 1, 1, 10, 4, 'Rabu', '08.00 - 10.30', 2, NULL, '2021-02-07 07:39:02', '2021-02-07 07:39:02'),
(13, 1, 1, 1, 11, 1, 'Kamis', '08.00 - 10.30', 4, NULL, '2021-02-07 07:39:16', '2021-02-07 07:39:16'),
(14, 1, 1, 1, 12, 1, 'Jum\'at', '08.00 - 10.30', 2, NULL, '2021-02-07 07:41:48', '2021-02-07 07:41:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademiks`
--

CREATE TABLE `tahun_akademiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_akademiks`
--

INSERT INTO `tahun_akademiks` (`id`, `tahun_akademik`, `semester`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2020/2021', 'Ganjil', 1, NULL, '2021-01-06 04:49:38', '2021-02-16 18:30:04'),
(2, '2020/2021', 'Genap', 0, NULL, '2021-01-06 04:49:53', '2021-02-16 18:30:04'),
(3, '2021/2022', 'Ganjil', 0, NULL, '2021-01-15 08:43:46', '2021-01-15 09:10:44'),
(4, '2021/2022', 'Genap', 0, NULL, '2021-01-15 08:45:20', '2021-01-15 08:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Erwin Perdana', 'erwin@gmail.com', NULL, '$2y$10$uKpteviObRX2zbsTzt8PQe8hocK4AOeMwHPiIuV4.tBuGcko8v8J.', NULL, 'Administrator', '2021-01-28 06:41:53', '2021-01-28 06:41:53'),
(4, 'Erwin Perdana', '16220320', NULL, '$2y$10$h5cOXucOveTyDlBqyYJ3SuPwZWd9TuK29YmsqA9WsnwIf6hEb3Ngm', NULL, 'Mahasiswa', '2021-01-28 06:42:36', '2021-01-28 06:42:36'),
(9, 'Fadilah Amaliyanisa', '16220321', NULL, '$2y$10$h5cOXucOveTyDlBqyYJ3SuPwZWd9TuK29YmsqA9WsnwIf6hEb3Ngm', NULL, 'Mahasiswa', '2021-01-28 06:42:36', '2021-01-28 06:42:36'),
(10, 'Erwin Aston Sihombing', '16220319', NULL, '$2y$10$h5cOXucOveTyDlBqyYJ3SuPwZWd9TuK29YmsqA9WsnwIf6hEb3Ngm', NULL, 'Mahasiswa', '2021-01-28 06:42:36', '2021-01-28 06:42:36'),
(11, 'Arif', '16220316', NULL, '$2y$10$h5cOXucOveTyDlBqyYJ3SuPwZWd9TuK29YmsqA9WsnwIf6hEb3Ngm', NULL, 'Mahasiswa', '2021-01-28 06:42:36', '2021-01-28 06:42:36'),
(12, 'Budi Ramadhan', '16220317', NULL, '$2y$10$h5cOXucOveTyDlBqyYJ3SuPwZWd9TuK29YmsqA9WsnwIf6hEb3Ngm', NULL, 'Mahasiswa', '2021-01-28 06:42:36', '2021-01-28 06:42:36'),
(13, 'Fitri Asrifah', '16220323', NULL, '$2y$10$AnVjxtJop1aI8GymAVB3nedcYDStXmpi5WU4QM4xpjL6awnXaADuG', NULL, 'Mahasiswa', '2021-02-01 07:30:07', '2021-02-01 07:30:07'),
(14, 'Joko, M.Kom', '1102113', NULL, '$2y$10$J.ji/h0C8lquOm.lDhar1eNXIKb1z.jNGJePKJ7z8TYTiQSKJqtOm', NULL, 'Dosen', '2021-02-01 07:32:52', '2021-02-01 07:32:52'),
(15, 'Ineke', '16220324', NULL, '$2y$10$rvaVf1BqgQh19E/I2H13..xUJvvWeklvWHhDoEG6yT00juPtLioL2', NULL, 'Mahasiswa', '2021-02-05 05:42:04', '2021-02-05 05:42:04'),
(16, 'Rizal', '16221001', NULL, '$2y$10$9NmJ0qISkRHfFGCqClZ3XeMUwGx/x.Q2AWTY1/h7JGB.MFQrGrnkS', NULL, 'Mahasiswa', '2021-02-05 05:42:56', '2021-02-05 05:42:56'),
(17, 'Erwin Perdana, M.Kom', '1102110', NULL, '$2y$10$J.ji/h0C8lquOm.lDhar1eNXIKb1z.jNGJePKJ7z8TYTiQSKJqtOm', NULL, 'Dosen', '2021-02-01 07:32:52', '2021-02-01 07:32:52'),
(18, 'Erwin, M.Hum', '1102111', NULL, '$2y$10$J.ji/h0C8lquOm.lDhar1eNXIKb1z.jNGJePKJ7z8TYTiQSKJqtOm', NULL, 'Dosen', '2021-02-01 07:32:52', '2021-02-16 20:15:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gedungs`
--
ALTER TABLE `gedungs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `matkuls`
--
ALTER TABLE `matkuls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gedungs`
--
ALTER TABLE `gedungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
