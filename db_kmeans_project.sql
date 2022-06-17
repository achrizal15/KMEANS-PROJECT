-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jun 2022 pada 18.52
-- Versi server: 10.3.33-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udn139mz_kmeans_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `submenu` varchar(255) NOT NULL,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `nama`, `content`, `created_at`, `link`, `icon`, `submenu`, `group`) VALUES
(32, 'Role', 'role', '2022-06-17 11:52:36', 'rolecontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(33, 'Home', 'home', '2022-06-17 11:52:36', '', 'fa-solid fa-gauge', '', NULL),
(34, 'Materi', 'materi', '2022-06-17 11:52:36', 'matericontroller', 'fa-solid fa-square-poll-horizontal', '', NULL),
(35, 'User', 'user', '2022-06-17 11:52:36', 'usercontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(37, 'Kelas', 'kelas', '2022-06-17 11:52:36', 'kelascontroller', 'fa-solid fa-window-frame', '', NULL),
(38, 'Jam Pelajaran', 'pembelajaran', '2022-06-17 11:52:36', 'pembelajarancontroller', 'fa-solid fa-users', '', NULL),
(39, 'Angkatan', 'angkatan', '2022-06-17 11:52:36', 'angkatancontroller', 'fa-solid fa-school', '', NULL),
(43, 'Soal Tes', 'soaltes', '2022-06-17 11:52:36', 'soaltescontroller', 'fa-solid fa-list-dropdown', '', 'Manage Tes'),
(45, 'Siswa', 'siswa', '2022-06-17 11:52:36', 'siswacontroller', 'fa-solid fa-user-graduate', '', NULL),
(46, 'Nilai Tes', 'nilaites', '2022-06-17 11:52:36', 'nilaitescontroller', 'fa-solid fa-list-dropdown', '', 'Manage Tes'),
(51, 'Penerimaan Siswa', 'penerimaan', '2022-06-17 11:52:36', 'penerimaancontroller', 'fa-solid fa-screen-users', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `awal_pendaftaran` datetime NOT NULL,
  `akhir_pendaftaran` datetime NOT NULL,
  `awal_periode` datetime NOT NULL,
  `akhir_periode` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id`, `angkatan`, `awal_pendaftaran`, `akhir_pendaftaran`, `awal_periode`, `akhir_periode`, `status`, `created_at`) VALUES
(3, '2022 Juli', '2022-06-01 00:00:00', '2022-06-20 00:00:00', '2022-06-20 00:00:00', '2022-07-13 00:00:00', 'pendaftaran', '2022-06-13 07:04:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_tes`
--

INSERT INTO `hasil_tes` (`id`, `id_soal`, `id_siswa`, `jawaban`, `created_at`) VALUES
(1, 9, 1, '31', '2022-06-16 14:05:12'),
(2, 10, 1, '35', '2022-06-16 14:05:12'),
(3, 11, 1, '36', '2022-06-16 14:05:12'),
(4, 12, 1, '41', '2022-06-16 14:05:12'),
(5, 13, 1, '44', '2022-06-16 14:05:12'),
(6, 14, 1, '45', '2022-06-16 14:05:12'),
(7, 15, 1, '48', '2022-06-16 14:05:12'),
(8, 16, 1, '51', '2022-06-16 14:05:12'),
(9, 17, 1, '55', '2022-06-16 14:05:12'),
(10, 9, 2, '31', '2022-06-16 14:59:46'),
(11, 10, 2, '35', '2022-06-16 14:59:46'),
(12, 11, 2, '36', '2022-06-16 14:59:46'),
(13, 12, 2, '39', '2022-06-16 14:59:46'),
(14, 13, 2, '44', '2022-06-16 14:59:46'),
(15, 14, 2, '45', '2022-06-16 14:59:46'),
(16, 15, 2, '48', '2022-06-16 14:59:46'),
(17, 16, 2, '52', '2022-06-16 14:59:46'),
(18, 17, 2, '54', '2022-06-16 14:59:46'),
(19, 9, 3, '31', '2022-06-16 15:07:04'),
(20, 10, 3, '34', '2022-06-16 15:07:04'),
(21, 11, 3, '38', '2022-06-16 15:07:04'),
(22, 12, 3, '39', '2022-06-16 15:07:04'),
(23, 13, 3, '44', '2022-06-16 15:07:04'),
(24, 14, 3, '46', '2022-06-16 15:07:04'),
(25, 15, 3, '49', '2022-06-16 15:07:04'),
(26, 16, 3, '53', '2022-06-16 15:07:04'),
(27, 17, 3, '54', '2022-06-16 15:07:04'),
(28, 9, 4, '32', '2022-06-16 15:09:40'),
(29, 10, 4, NULL, '2022-06-16 15:09:40'),
(30, 11, 4, '38', '2022-06-16 15:09:40'),
(31, 12, 4, NULL, '2022-06-16 15:09:40'),
(32, 13, 4, NULL, '2022-06-16 15:09:40'),
(33, 14, 4, '47', '2022-06-16 15:09:40'),
(34, 15, 4, NULL, '2022-06-16 15:09:40'),
(35, 16, 4, '51', '2022-06-16 15:09:40'),
(36, 17, 4, '55', '2022-06-16 15:09:40'),
(37, 9, 5, '30', '2022-06-16 15:10:58'),
(38, 10, 5, '34', '2022-06-16 15:10:58'),
(39, 11, 5, '38', '2022-06-16 15:10:58'),
(40, 12, 5, '41', '2022-06-16 15:10:58'),
(41, 13, 5, '44', '2022-06-16 15:10:58'),
(42, 14, 5, '47', '2022-06-16 15:10:58'),
(43, 15, 5, '48', '2022-06-16 15:10:58'),
(44, 16, 5, '51', '2022-06-16 15:10:58'),
(45, 17, 5, '54', '2022-06-16 15:10:58'),
(46, 9, 6, '30', '2022-06-16 15:12:10'),
(47, 10, 6, '35', '2022-06-16 15:12:10'),
(48, 11, 6, '38', '2022-06-16 15:12:10'),
(49, 12, 6, '39', '2022-06-16 15:12:10'),
(50, 13, 6, '44', '2022-06-16 15:12:10'),
(51, 14, 6, '45', '2022-06-16 15:12:10'),
(52, 15, 6, '48', '2022-06-16 15:12:10'),
(53, 16, 6, '52', '2022-06-16 15:12:10'),
(54, 17, 6, '56', '2022-06-16 15:12:10'),
(55, 9, 7, '32', '2022-06-16 16:38:33'),
(56, 10, 7, '35', '2022-06-16 16:38:33'),
(57, 11, 7, '38', '2022-06-16 16:38:33'),
(58, 12, 7, '41', '2022-06-16 16:38:33'),
(59, 13, 7, '44', '2022-06-16 16:38:33'),
(60, 14, 7, '45', '2022-06-16 16:38:33'),
(61, 15, 7, '49', '2022-06-16 16:38:33'),
(62, 16, 7, '53', '2022-06-16 16:38:33'),
(63, 17, 7, '56', '2022-06-16 16:38:33'),
(64, 18, 8, '57', '2022-06-16 16:43:27'),
(65, 19, 8, '60', '2022-06-16 16:43:27'),
(66, 20, 8, '64', '2022-06-16 16:43:27'),
(67, 21, 8, '68', '2022-06-16 16:43:27'),
(68, 22, 8, '70', '2022-06-16 16:43:27'),
(69, 23, 8, '73', '2022-06-16 16:43:27'),
(70, 24, 8, '75', '2022-06-16 16:43:27'),
(71, 25, 8, '80', '2022-06-16 16:43:27'),
(72, 26, 8, '82', '2022-06-16 16:43:27'),
(73, 18, 9, '57', '2022-06-16 16:49:36'),
(74, 19, 9, '60', '2022-06-16 16:49:36'),
(75, 20, 9, '63', '2022-06-16 16:49:36'),
(76, 21, 9, '68', '2022-06-16 16:49:36'),
(77, 22, 9, '71', '2022-06-16 16:49:36'),
(78, 23, 9, '74', '2022-06-16 16:49:36'),
(79, 24, 9, '76', '2022-06-16 16:49:36'),
(80, 25, 9, '80', '2022-06-16 16:49:36'),
(81, 26, 9, '81', '2022-06-16 16:49:36'),
(82, 18, 10, '59', '2022-06-16 16:51:16'),
(83, 19, 10, '61', '2022-06-16 16:51:16'),
(84, 20, 10, '63', '2022-06-16 16:51:16'),
(85, 21, 10, '67', '2022-06-16 16:51:16'),
(86, 22, 10, '70', '2022-06-16 16:51:16'),
(87, 23, 10, NULL, '2022-06-16 16:51:16'),
(88, 24, 10, '76', '2022-06-16 16:51:16'),
(89, 25, 10, '78', '2022-06-16 16:51:16'),
(90, 26, 10, '82', '2022-06-16 16:51:16'),
(91, 9, 11, '32', '2022-06-16 17:27:35'),
(92, 10, 11, '34', '2022-06-16 17:27:35'),
(93, 11, 11, '38', '2022-06-16 17:27:35'),
(94, 12, 11, '40', '2022-06-16 17:27:35'),
(95, 13, 11, '42', '2022-06-16 17:27:35'),
(96, 14, 11, '45', '2022-06-16 17:27:35'),
(97, 15, 11, '48', '2022-06-16 17:27:35'),
(98, 16, 11, '53', '2022-06-16 17:27:35'),
(99, 17, 11, '56', '2022-06-16 17:27:35'),
(100, 9, 12, '30', '2022-06-16 23:39:14'),
(101, 10, 12, '33', '2022-06-16 23:39:14'),
(102, 11, 12, '37', '2022-06-16 23:39:14'),
(103, 12, 12, '41', '2022-06-16 23:39:14'),
(104, 13, 12, '43', '2022-06-16 23:39:14'),
(105, 14, 12, '45', '2022-06-16 23:39:14'),
(106, 15, 12, '49', '2022-06-16 23:39:14'),
(107, 16, 12, '52', '2022-06-16 23:39:14'),
(108, 17, 12, '54', '2022-06-16 23:39:14'),
(109, 38, 12, '124', '2022-06-16 23:39:14'),
(110, 39, 12, '126', '2022-06-16 23:39:14'),
(111, 40, 12, '131', '2022-06-16 23:39:14'),
(112, 41, 12, '133', '2022-06-16 23:39:14'),
(113, 42, 12, '136', '2022-06-16 23:39:14'),
(114, 43, 12, '139', '2022-06-16 23:39:14'),
(115, 44, 12, '142', '2022-06-16 23:39:14'),
(116, 45, 12, '145', '2022-06-16 23:39:14'),
(117, 46, 12, '147', '2022-06-16 23:39:14'),
(118, 18, 13, '120', '2022-06-16 23:54:30'),
(119, 19, 13, '61', '2022-06-16 23:54:30'),
(120, 20, 13, '64', '2022-06-16 23:54:30'),
(121, 21, 13, '67', '2022-06-16 23:54:30'),
(122, 22, 13, '69', '2022-06-16 23:54:30'),
(123, 23, 13, '74', '2022-06-16 23:54:30'),
(124, 24, 13, '76', '2022-06-16 23:54:30'),
(125, 25, 13, '78', '2022-06-16 23:54:30'),
(126, 26, 13, '81', '2022-06-16 23:54:30'),
(127, 18, 14, '122', '2022-06-17 01:24:26'),
(128, 19, 14, '62', '2022-06-17 01:24:26'),
(129, 20, 14, '65', '2022-06-17 01:24:26'),
(130, 21, 14, '68', '2022-06-17 01:24:26'),
(131, 22, 14, '69', '2022-06-17 01:24:26'),
(132, 23, 14, '72', '2022-06-17 01:24:26'),
(133, 24, 14, '76', '2022-06-17 01:24:26'),
(134, 25, 14, '80', '2022-06-17 01:24:26'),
(135, 26, 14, '83', '2022-06-17 01:24:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_pelajaran`
--

CREATE TABLE `jam_pelajaran` (
  `id` int(11) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `jam_pelajaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `created_at`, `tingkatan`, `guru_id`, `hari`, `waktu`) VALUES
(11, 'TINGKAT LANJUT', '2022-06-16 14:07:46', 'SMP', 36, 'Selasa', '15:07'),
(12, 'TINGKAT MENENGAH', '2022-06-16 14:08:38', 'SMP', 37, 'Kamis', '21:08'),
(13, 'TINGKAT LANJUT', '2022-06-16 14:56:47', 'SD', 36, 'Kamis', '21:56'),
(14, 'TINGKAT MENENGAH', '2022-06-16 14:57:31', 'SD', 37, 'Kamis', '21:57'),
(15, 'TINGKAT LANJUT', '2022-06-16 14:58:00', 'SMA', 36, 'Jumat', '21:57'),
(16, 'TINGKAT MENENGAH', '2022-06-16 14:58:17', 'SMA', 38, 'Jumat', '04:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `nama`, `tingkatan`, `created_at`, `deskripsi`, `file`) VALUES
(30, 'Operasi Hitung', 'SD', '2022-06-13 04:48:42', 'operasi hitung penjumlahan, pengurangan, perkalian dan pembagian', ''),
(31, 'Kelipatan dan Faktor', 'SD', '2022-06-13 04:51:06', 'belajar kelipatan dan faktor angka', ''),
(32, 'Bangun Datar Sederhana', 'SD', '2022-06-13 04:53:46', 'belajar bangun datar sederhana dan rumusnya', ''),
(33, 'bilangan ', 'SMP', '2022-06-13 04:55:08', 'bilangan bulat dan pecahan', ''),
(34, 'Aljabar', 'SMP', '2022-06-13 04:59:44', 'Menjelaskan koefisien, variabel, konstanta, dan suku pada bentuk aljabar', ''),
(35, 'Garis dan Sudut', 'SMP', '2022-06-13 05:01:06', 'Menjelaskan tentang garis dan sudut', ''),
(36, 'Pertidaksamaan Linear', 'SMA', '2022-06-13 05:08:16', 'Pertidaksamaan Linear', ''),
(37, 'logaritma', 'SMA', '2022-06-13 05:09:00', 'logaritma', ''),
(38, ' Mean, Median, Modus', 'SMA', '2022-06-13 05:10:18', ' Mean, Median, Modus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tes`
--

CREATE TABLE `nilai_tes` (
  `id` int(11) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `nilai` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_tes`
--

INSERT INTO `nilai_tes` (`id`, `materi`, `materi_id`, `nilai`, `siswa_id`, `created_at`) VALUES
(1, 'Operasi Hitung', 30, '33', 1, '2022-06-16 14:05:12'),
(2, 'Kelipatan dan Faktor', 31, '66', 1, '2022-06-16 14:05:12'),
(3, 'Bangun Datar Sederhana', 32, '0', 1, '2022-06-16 14:05:12'),
(4, 'Operasi Hitung', 30, '33', 2, '2022-06-16 14:59:46'),
(5, 'Kelipatan dan Faktor', 31, '33', 2, '2022-06-16 14:59:46'),
(6, 'Bangun Datar Sederhana', 32, '0', 2, '2022-06-16 14:59:46'),
(7, 'Operasi Hitung', 30, '33', 3, '2022-06-16 15:07:04'),
(8, 'Kelipatan dan Faktor', 31, '33', 3, '2022-06-16 15:07:04'),
(9, 'Bangun Datar Sederhana', 32, '33', 3, '2022-06-16 15:07:04'),
(10, 'Operasi Hitung', 30, '66', 4, '2022-06-16 15:09:40'),
(11, 'Kelipatan dan Faktor', 31, '33', 4, '2022-06-16 15:09:40'),
(12, 'Bangun Datar Sederhana', 32, '0', 4, '2022-06-16 15:09:40'),
(13, 'Operasi Hitung', 30, '33', 5, '2022-06-16 15:10:58'),
(14, 'Kelipatan dan Faktor', 31, '99', 5, '2022-06-16 15:10:58'),
(15, 'Bangun Datar Sederhana', 32, '0', 5, '2022-06-16 15:10:58'),
(16, 'Operasi Hitung', 30, '66', 6, '2022-06-16 15:12:10'),
(17, 'Kelipatan dan Faktor', 31, '33', 6, '2022-06-16 15:12:10'),
(18, 'Bangun Datar Sederhana', 32, '33', 6, '2022-06-16 15:12:10'),
(19, 'Operasi Hitung', 30, '99', 7, '2022-06-16 16:38:33'),
(20, 'Kelipatan dan Faktor', 31, '66', 7, '2022-06-16 16:38:34'),
(21, 'Bangun Datar Sederhana', 32, '66', 7, '2022-06-16 16:38:34'),
(22, 'bilangan ', 33, '0', 8, '2022-06-16 16:43:27'),
(23, 'Aljabar', 34, '33', 8, '2022-06-16 16:43:27'),
(24, 'Garis dan Sudut', 35, '33', 8, '2022-06-16 16:43:27'),
(25, 'bilangan ', 33, '0', 9, '2022-06-16 16:49:36'),
(26, 'Aljabar', 34, '99', 9, '2022-06-16 16:49:36'),
(27, 'Garis dan Sudut', 35, '33', 9, '2022-06-16 16:49:36'),
(28, 'bilangan ', 33, '33', 10, '2022-06-16 16:51:16'),
(29, 'Aljabar', 34, '0', 10, '2022-06-16 16:51:16'),
(30, 'Garis dan Sudut', 35, '0', 10, '2022-06-16 16:51:16'),
(31, 'Operasi Hitung', 30, '66', 11, '2022-06-16 17:27:35'),
(32, 'Kelipatan dan Faktor', 31, '0', 11, '2022-06-16 17:27:35'),
(33, 'Bangun Datar Sederhana', 32, '66', 11, '2022-06-16 17:27:35'),
(34, 'Operasi Hitung', 30, '10', 12, '2022-06-16 23:39:14'),
(35, 'Kelipatan dan Faktor', 31, '20', 12, '2022-06-16 23:39:14'),
(36, 'Bangun Datar Sederhana', 32, '0', 12, '2022-06-16 23:39:14'),
(37, 'bilangan ', 33, '0', 13, '2022-06-16 23:54:30'),
(38, 'Aljabar', 34, '33', 13, '2022-06-16 23:54:30'),
(39, 'Garis dan Sudut', 35, '0', 13, '2022-06-16 23:54:30'),
(40, 'bilangan ', 33, '99', 14, '2022-06-17 01:24:26'),
(41, 'Aljabar', 34, '33', 14, '2022-06-17 01:24:26'),
(42, 'Garis dan Sudut', 35, '66', 14, '2022-06-17 01:24:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tugas_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelajaran`
--

INSERT INTO `pembelajaran` (`id`, `nama`, `guru_id`, `kelas_id`, `materi_id`, `file`, `deskripsi`, `tugas_id`, `created_at`) VALUES
(4, '', 36, 4, 28, 'CamScanner1.zip', 'DIrubar', 0, '2022-06-11 15:36:58'),
(5, 'Pertemuan 5', 19, 2, 30, 'deret_angka.pdf', 'Pertemuan 5', 4, '2022-06-16 14:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `tingkatan` enum('SD','SMP','SMA','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `pembelajaran_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tugas_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`) VALUES
(1, 'Admin', '2022-01-26 06:44:48'),
(18, 'Guru', '2022-05-11 04:42:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_akses`
--

CREATE TABLE `role_akses` (
  `akses_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_akses`
--

INSERT INTO `role_akses` (`akses_id`, `role_id`) VALUES
(32, 18),
(34, 18),
(37, 18),
(39, 18),
(33, 18),
(35, 18),
(38, 18),
(43, 18),
(32, 1),
(34, 1),
(37, 1),
(39, 1),
(45, 1),
(51, 1),
(33, 1),
(35, 1),
(38, 1),
(43, 1),
(46, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `angkatan_id` int(11) NOT NULL,
  `tingkatan` enum('SD','SMP','SMA','') NOT NULL,
  `status` enum('NON ACTIVE','ACTIVE','','') NOT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `email`, `password`, `alamat`, `asal_sekolah`, `created_at`, `angkatan_id`, `tingkatan`, `status`, `kelas_id`) VALUES
(1, 'Al', 'al@gmail.com', '$2y$10$Asp15al6CDf0jF5UI6X6XOwOFC6zFIVfp9.TzxNhj1n4uJ0VWAT5m', 'Grogol', 'Smeaneg', '2022-06-16 07:04:56', 3, 'SD', 'NON ACTIVE', NULL),
(2, 'Rizal', 'achrizal@gmail.com', '$2y$10$75Wga8zhFxjRoguA.nzp6eXNBbsI2u3DGo5YZOFiVfJQMq8HOv5py', 'Jakarta', 'SMEA', '2022-06-16 07:59:33', 3, 'SD', 'NON ACTIVE', NULL),
(3, 'koko', 'koko@gmail.com', '$2y$10$T8zNy4OF8cRjtfzORvj1OuHOLWlzFKEzweEBv3l/MkeCnS5I6WXWC', 'kemiren', 'SMEA', '2022-06-16 08:06:46', 3, 'SD', 'NON ACTIVE', NULL),
(4, 'Alexander', 'alex@gmail.com', '$2y$10$85VruHvuxTe11FmA5Rp0Re/iUIU8NRN3BI8vFCXsk9xuqeSxo21ly', 'jakarta', 'SDK', '2022-06-16 08:09:29', 3, 'SD', 'NON ACTIVE', NULL),
(5, 'Anindita', 'anin@yahoo.co.id', '$2y$10$HHdU1Ei/6x83FPJL5BcJieA7JfLloQKDIzV7pOt4KFDGw84a/x/My', 'kemiren', 'KDI', '2022-06-16 08:10:35', 3, 'SD', 'NON ACTIVE', NULL),
(6, 'siswa Sd', 'siswasd@gmail.com', '$2y$10$GLoUJqP.wCHU2x0HmYVhNuEmu3AfjR55zPNLWeVFzucVpYvskPIuG', 'amerika', 'AMRIK', '2022-06-16 08:11:52', 3, 'SD', 'NON ACTIVE', NULL),
(7, 'Nami', 'nami@yahu.com', '$2y$10$itsWOXmt1aOitrtNo3cN/ezSnAM6hSHkuXyG8UiRdX1Bp3hDqpeNO', 'Glagah', 'SMEA', '2022-06-16 09:38:20', 3, 'SD', 'NON ACTIVE', NULL),
(8, 'Yoga', 'yoga123@gmail.com', '$2y$10$Kdjq8CLmyxcOcp/fQ2M4oex5/D59oWfYPSYPv6WIbpIfhlgjGk41K', 'jatimulyo', 'smp 1 malang', '2022-06-16 09:42:33', 3, 'SMP', 'NON ACTIVE', NULL),
(9, 'randy', 'randy123@gmail.com', '$2y$10$qDP.s5dN0X/ENmes2TkbSe9JSTXZY7Q/..hFxudUoruQqfP1EQv2q', 'karangploso', 'smp 2 malang', '2022-06-16 09:48:44', 3, 'SMP', 'NON ACTIVE', NULL),
(10, 'aris', 'aris123@gmail.com', '$2y$10$naI6t4hLhbb13.bNK.QDWe4wlQfJ1aI852KdEPJI8l2m/c.guscwi', 'blitar', 'smp 1 blitar', '2022-06-16 09:50:44', 3, 'SMP', 'NON ACTIVE', NULL),
(11, 'Intan', 'intan@gmail.com', '$2y$10$mrnBYSzEcxyX8KMNkCQHl.cgw5XFpPXODX.MotJxy0MQLACRC1qVy', 'Kmean', 'SMEA', '2022-06-16 10:27:21', 3, 'SD', 'NON ACTIVE', NULL),
(12, 'Arip', 'ar@gmail.com', '$2y$10$9PR21XTc8SUR37zV6/1tYOgGzTDFStwLef.VnExyKxXQ2lIiR0wS2', 'Cungiing', 'SMEA', '2022-06-16 16:38:38', 3, 'SD', 'NON ACTIVE', NULL),
(13, 'Alena', 'alena@gmail.com', '$2y$10$Fix4Iwor.FRc6Icjk2qw0eJP6GgNDkBCoDGN8c5fm71vM.baAsT06', 'Glagah', 'SMEA', '2022-06-16 16:53:55', 3, 'SMP', 'NON ACTIVE', NULL),
(14, 'ozi', 'ozzay@gmaii.com', '$2y$10$MS9H/F6IhIu6ng59TDhwiuRfElbjwi2Wf2mIdcbOxw0GBZ7wrBH6W', 'klatak', 'SMEPK', '2022-06-16 18:24:06', 3, 'SMP', 'NON ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_tes`
--

CREATE TABLE `soal_tes` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `tingkatan` enum('SD','SMP','SMA','') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal_tes`
--

INSERT INTO `soal_tes` (`id`, `soal`, `file`, `jawaban`, `materi_id`, `tingkatan`, `created_at`) VALUES
(6, 'Hasil penjumlahan dari -3a –6b + 7 dan 13a – (-2b) + 4 adalah ....', NULL, 'Salah semua', 28, 'SMP', '2022-06-11 10:39:07'),
(7, 'Hasil perkalian dari (4x - 5)(3x + 3) adalah ....', 'auth3.JPG', '12x² -3x - 15', 28, 'SMP', '2022-06-11 15:16:36'),
(9, '335 – 271 + 151 = . . .', NULL, '215', 30, 'SD', '2022-06-13 06:16:05'),
(10, '365 – 126 + 119 = . . .', NULL, '358', 30, 'SD', '2022-06-13 06:16:44'),
(11, 'Pak Tani memiliki 3625 kg padi basah. Setelah dijemur berkurang 725 kg. Padi kering itu dimasukkan ke dalam karung besar. Setiap karung memuat 100 kg padi. Berapa buah karung yang diperlukan untuk menyimpan padi kering itu?', NULL, '29 karung', 30, 'SD', '2022-06-13 06:29:48'),
(12, 'Tulislah 10 bilangan kelipatan 2!', NULL, '2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22', 31, 'SD', '2022-06-13 06:31:39'),
(13, 'Bilangan kelipatan 8 yang kurang dari 30 adalah', NULL, '8, 16, dan 24', 31, 'SD', '2022-06-13 06:32:18'),
(14, 'Kelipatan persekutuan dari 4 dan 6 adalah', NULL, '12, 24 dan 36', 31, 'SD', '2022-06-13 06:33:12'),
(15, 'Panjang alas suatu segitiga adalah 12 cm dan tingginya 5 cm. Luas segitiga itu adalah...', NULL, '30 cm²', 32, 'SD', '2022-06-13 06:34:08'),
(16, 'Luas sebuah segitiga adalah 135 cm² dan panjang alasnya 18 cm. Berapakah tinggi segitiga tersebut?', NULL, '15 cm', 32, 'SD', '2022-06-13 06:34:50'),
(17, 'berapa hasil dari gambar diatas?', 'ABC2.jpg', '66 cm²', 32, 'SD', '2022-06-13 06:35:40'),
(18, 'Dari ramalan cuaca kota-kota besar di dunia tercatat suhu tertinggi dan terendah adalah sebagai berikut.\r\nMoskow: terendah -5°C dan tertinggi 10°C\r\nMeksiko: terendah 17°C dan tertinggi 34°C\r\nParis: terendah -3°C dan tertinggi 17°C\r\nTokyo: terendah -2°C dan tertinggi 25°C\r\nPerubahan suhu terbesar terjadi di kota…', NULL, 'Tokyo', 33, 'SMP', '2022-06-13 06:36:32'),
(19, 'Suhu udara di puncak Gunung Jaya Wijaya -5°C. Jika suhu di kaki gunung tersebut 20°C, berapakah beda suhunya?', NULL, '25°C', 33, 'SMP', '2022-06-13 06:37:40'),
(20, 'Sebuah kapal selam berada pada 50 m di atas permukaan laut. Kemudian, kapal tersebut menyelam hingga pada kedalaman 200 m. Berapakah beda posisi kapal dengan posisi terakhirnya?', NULL, '250 m', 33, 'SMP', '2022-06-13 06:38:29'),
(21, 'bentuk sederhana dari 12abc:3a', NULL, '4bc', 34, 'SMP', '2022-06-13 06:39:24'),
(22, 'penyelesaian dari 3x + 8x....', NULL, '3x + 8x = x (3 + 8) = 11x', 34, 'SMP', '2022-06-13 06:40:36'),
(23, 'Nilai ujian matematika dari Fira 15 lebihnya dari nilai\r\nmatematika Fara, jika nilai ujian Fara adalah x maka\r\ntentukan jumlah nilai ujian mereka dalam x !', NULL, '2x + 15', 34, 'SMP', '2022-06-13 06:41:57'),
(24, 'pasangan sudut sepihak dari h=gambar diatas adalah...', '2019-04-03_at_12-02-01.png', '∠2 dengan ∠7', 35, 'SMP', '2022-06-13 06:43:12'),
(25, 'nilai y adalah', 'nilai_y_adalah.png', '26 derajat', 35, 'SMP', '2022-06-13 06:44:22'),
(26, 'nilai q adalah', 'nilai_q_adalah.png', '68 derajat', 35, 'SMP', '2022-06-13 06:45:12'),
(27, 'cari titik x dari 4x + 8y ≥ 16.....', NULL, '4', 36, 'SMA', '2022-06-13 06:46:05'),
(28, 'cari titik y dari 4x + 8y ≥ 16.....', NULL, '2', 36, 'SMA', '2022-06-13 06:46:36'),
(29, 'daerah penyelesaian dari 2x + 5y ≥ 7', NULL, 'di kanan dan pada garis 2x + 5y = 7\r\n', 36, 'SMA', '2022-06-13 06:47:19'),
(30, '3log 243 = p. berapa nilai p...', NULL, '5', 37, 'SMA', '2022-06-13 06:48:01'),
(31, 'Log 1000 = p, berapa nilai p...', NULL, '3', 37, 'SMA', '2022-06-13 06:48:56'),
(32, 'Tentukan nilai logaritma 3log 54 + 3log 18 – 3log 12', NULL, '4', 37, 'SMA', '2022-06-13 06:49:30'),
(33, 'Hitung mean dari data berikut ini: 2,3,3,4...', NULL, '3', 38, 'SMA', '2022-06-13 06:49:56'),
(34, 'Hitung median dari data berikut ini: 9,1,3,7,5...', NULL, '5', 38, 'SMA', '2022-06-13 06:50:28'),
(35, 'Carilah nilai modus dari data berikut: 2,5,5,7,7,6...', NULL, '5 dan 7', 38, 'SMA', '2022-06-13 06:51:09'),
(38, 'Hitunglah  (152 : 8) x 3 =', NULL, '55', 30, 'SD', '2022-06-16 17:39:22'),
(39, 'Romi membeli 7 pensil seharga Rp.8.000. Jika romi membayar pensil itu dengan 3 lembar uang Rp. 20.000. Hitunglah berapa uang kembalian diterima romi', NULL, 'RP.4000', 30, 'SD', '2022-06-16 17:45:06'),
(40, '175 + 32 x 6 – 25 = ….', NULL, '342', 30, 'SD', '2022-06-16 18:15:36'),
(41, 'Hitunglah 325 – 125 : 5 + 100 x 3 =', NULL, '200', 30, 'SD', '2022-06-16 18:29:05'),
(42, 'Hitunglah 79 – (6 x 8) = …..', NULL, '30', 30, 'SD', '2022-06-16 18:31:40'),
(43, 'Hitunglah (8 x 5) + 30 =', NULL, '50', 30, 'SD', '2022-06-16 18:40:36'),
(44, ' Dedi membeli 5 kotak bolpoin. Setiap kotak berisi 12 bolpoin. Bolpoin itu diberikan kepada adiknya 5 buah. Sisanya akan dibagikan kepada 5 temannya. Hitunglah berapa bolpoin yang diterima masing-masing teman dedi', NULL, '14 buah', 30, 'SD', '2022-06-16 19:40:29'),
(45, ' Bilangan kelipatan 6 adalah', NULL, '6, 8, 10, 12, 14', 31, 'SD', '2022-06-16 19:44:50'),
(46, 'Bilangan kelipatan 3 yang kurang dari 30 dan lebih dari 10 adalah', NULL, '3, 6, 9', 31, 'SD', '2022-06-16 20:53:29'),
(47, 'Rumus untuk mencari keliling persegi adalah =', NULL, '4xs', 32, 'SD', '2022-06-17 01:22:17'),
(48, 'Sebuah kolam renang berbentuk persegi panjang memiliki panjang 40 meter dan lebar 20 meter. Kolam renang tersebut dikelilingi jalan setapak selebar 1 meter. Luas jalan setapak itu adalah .... m²', NULL, '120', 32, 'SD', '2022-06-17 01:28:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_tes_pilihan_ganda`
--

CREATE TABLE `soal_tes_pilihan_ganda` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal_tes_pilihan_ganda`
--

INSERT INTO `soal_tes_pilihan_ganda` (`id`, `created_at`, `soal_id`, `jawaban`) VALUES
(18, '2022-06-11 15:24:26', 7, '12x² +3x - 152'),
(19, '2022-06-11 15:24:26', 7, '12x² + 27x + 153'),
(20, '2022-06-11 15:24:26', 7, '12x² -3x - 15'),
(21, '2022-06-11 15:24:39', 6, '16a -8b + 112'),
(22, '2022-06-11 15:24:39', 6, '12a -8b + 14'),
(23, '2022-06-11 15:24:39', 6, 'Salah semua'),
(27, '2022-06-11 17:41:54', 8, 'asd'),
(28, '2022-06-11 17:41:54', 8, 'asd'),
(29, '2022-06-11 17:41:54', 8, 'asd'),
(30, '2022-06-13 06:16:05', 9, '220'),
(31, '2022-06-13 06:16:05', 9, '219'),
(32, '2022-06-13 06:16:05', 9, '215'),
(33, '2022-06-13 06:16:44', 10, '359'),
(34, '2022-06-13 06:16:44', 10, '340'),
(35, '2022-06-13 06:16:44', 10, '358'),
(36, '2022-06-13 06:29:48', 11, '28 karung'),
(37, '2022-06-13 06:29:48', 11, '27 karung'),
(38, '2022-06-13 06:29:48', 11, '29 karung'),
(39, '2022-06-13 06:31:39', 12, '11,12,13,14,15,16,17,18,19,20'),
(40, '2022-06-13 06:31:39', 12, '1,2,3,4,5,6,7,8,9,10'),
(41, '2022-06-13 06:31:39', 12, '2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22'),
(42, '2022-06-13 06:32:18', 13, '8, 16, dan 25'),
(43, '2022-06-13 06:32:18', 13, '8, 16, dan 27'),
(44, '2022-06-13 06:32:18', 13, '8, 16, dan 24'),
(45, '2022-06-13 06:33:12', 14, '11,22 dan 35'),
(46, '2022-06-13 06:33:12', 14, '10, 21 dan 34'),
(47, '2022-06-13 06:33:12', 14, '12, 24 dan 36'),
(48, '2022-06-13 06:34:08', 15, '25 cm²'),
(49, '2022-06-13 06:34:08', 15, '31 cm²'),
(50, '2022-06-13 06:34:08', 15, '30 cm²'),
(51, '2022-06-13 06:34:50', 16, '16 cm'),
(52, '2022-06-13 06:34:50', 16, '14 cm'),
(53, '2022-06-13 06:34:50', 16, '15 cm'),
(54, '2022-06-13 06:35:41', 17, '67 cm²'),
(55, '2022-06-13 06:35:41', 17, '68 cm²'),
(56, '2022-06-13 06:35:41', 17, '66 cm²'),
(60, '2022-06-13 06:37:40', 19, '26°C'),
(61, '2022-06-13 06:37:40', 19, '27°C'),
(62, '2022-06-13 06:37:40', 19, '25°C'),
(63, '2022-06-13 06:38:29', 20, '240 m'),
(64, '2022-06-13 06:38:29', 20, '220 m'),
(65, '2022-06-13 06:38:29', 20, '250 m'),
(66, '2022-06-13 06:39:24', 21, '3bc'),
(67, '2022-06-13 06:39:24', 21, '2bc'),
(68, '2022-06-13 06:39:24', 21, '4bc'),
(69, '2022-06-13 06:40:36', 22, '4x + 9x = x (4 +9) = 12x'),
(70, '2022-06-13 06:40:36', 22, '2x + 7x = x (2 + 7) = 10x'),
(71, '2022-06-13 06:40:36', 22, '3x + 8x = x (3 + 8) = 11x'),
(72, '2022-06-13 06:41:57', 23, '3x + 16'),
(73, '2022-06-13 06:41:57', 23, '4x + 17'),
(74, '2022-06-13 06:41:57', 23, '2x + 15'),
(75, '2022-06-13 06:43:12', 24, '∠5 dengan ∠4'),
(76, '2022-06-13 06:43:12', 24, '∠8 dengan ∠2'),
(77, '2022-06-13 06:43:12', 24, '∠2 dengan ∠7'),
(78, '2022-06-13 06:44:22', 25, '27 derajat'),
(79, '2022-06-13 06:44:22', 25, '28 derajat'),
(80, '2022-06-13 06:44:22', 25, '26 derajat'),
(81, '2022-06-13 06:45:12', 26, '69 derajat'),
(82, '2022-06-13 06:45:12', 26, '70 derajat'),
(83, '2022-06-13 06:45:12', 26, '68 derajat'),
(84, '2022-06-13 06:46:05', 27, '3'),
(85, '2022-06-13 06:46:05', 27, '2'),
(86, '2022-06-13 06:46:05', 27, '4'),
(87, '2022-06-13 06:46:36', 28, '3'),
(88, '2022-06-13 06:46:36', 28, '4'),
(89, '2022-06-13 06:46:36', 28, '2'),
(90, '2022-06-13 06:47:19', 29, 'di kiri dan pada garis 2x + 5y = 7\r\n'),
(91, '2022-06-13 06:47:19', 29, 'di kanan dan pada garis 2x + 5y = 3\r\n'),
(92, '2022-06-13 06:47:19', 29, 'di kanan dan pada garis 2x + 5y = 7\r\n'),
(93, '2022-06-13 06:48:01', 30, '3'),
(94, '2022-06-13 06:48:01', 30, '1'),
(95, '2022-06-13 06:48:01', 30, '5'),
(96, '2022-06-13 06:48:56', 31, '1'),
(97, '2022-06-13 06:48:56', 31, '2'),
(98, '2022-06-13 06:48:56', 31, '3'),
(99, '2022-06-13 06:49:30', 32, '3'),
(100, '2022-06-13 06:49:30', 32, '1'),
(101, '2022-06-13 06:49:30', 32, '4'),
(102, '2022-06-13 06:49:56', 33, '2'),
(103, '2022-06-13 06:49:56', 33, '1'),
(104, '2022-06-13 06:49:56', 33, '3'),
(105, '2022-06-13 06:50:29', 34, '7'),
(106, '2022-06-13 06:50:29', 34, '9'),
(107, '2022-06-13 06:50:29', 34, '5'),
(108, '2022-06-13 06:51:09', 35, '6 dan 7'),
(109, '2022-06-13 06:51:09', 35, '5 dan 6'),
(110, '2022-06-13 06:51:09', 35, '5 dan 7'),
(114, '2022-06-16 14:03:09', 36, '3'),
(115, '2022-06-16 14:03:09', 36, '1'),
(116, '2022-06-16 14:03:09', 36, '2'),
(117, '2022-06-16 17:23:23', 37, 'Benar'),
(118, '2022-06-16 17:23:23', 37, 'Sekali'),
(119, '2022-06-16 17:23:23', 37, 'Ya'),
(120, '2022-06-16 17:24:32', 18, 'Meksiko'),
(121, '2022-06-16 17:24:32', 18, 'Paris'),
(122, '2022-06-16 17:24:32', 18, 'Tokyo'),
(153, '2022-06-16 23:41:29', 46, '3, 6, 9, 12, 15, 18, 21, 24, 27'),
(154, '2022-06-16 23:41:29', 46, '33, 36, 39'),
(155, '2022-06-16 23:41:29', 46, '3, 6, 9'),
(156, '2022-06-16 23:41:53', 45, '6, 12, 18, 24, 32'),
(157, '2022-06-16 23:41:53', 45, '6, 12, 16, 20, 26'),
(158, '2022-06-16 23:41:53', 45, '6, 8, 10, 12, 14'),
(159, '2022-06-16 23:42:27', 44, '19 buah'),
(160, '2022-06-16 23:42:27', 44, '11 buah'),
(161, '2022-06-16 23:42:27', 44, '14 buah'),
(162, '2022-06-16 23:42:49', 43, '60'),
(163, '2022-06-16 23:42:49', 43, '70'),
(164, '2022-06-16 23:42:49', 43, '50'),
(165, '2022-06-16 23:43:12', 42, '31'),
(166, '2022-06-16 23:43:12', 42, '32'),
(167, '2022-06-16 23:43:12', 42, '30'),
(171, '2022-06-16 23:44:08', 40, '345'),
(172, '2022-06-16 23:44:08', 40, '346'),
(173, '2022-06-16 23:44:08', 40, '342'),
(174, '2022-06-16 23:45:48', 39, 'RP.2000'),
(175, '2022-06-16 23:45:48', 39, 'RP.1000'),
(176, '2022-06-16 23:45:48', 39, 'RP.4000'),
(177, '2022-06-17 00:51:09', 41, '400'),
(178, '2022-06-17 00:51:09', 41, '600'),
(179, '2022-06-17 00:51:09', 41, '200'),
(180, '2022-06-17 00:51:33', 38, '56'),
(181, '2022-06-17 00:51:33', 38, '57'),
(182, '2022-06-17 00:51:33', 38, '55'),
(183, '2022-06-17 01:22:17', 47, '4xp'),
(184, '2022-06-17 01:22:17', 47, '6xs'),
(185, '2022-06-17 01:22:17', 47, '4xs'),
(186, '2022-06-17 01:28:53', 48, '124'),
(187, '2022-06-17 01:28:53', 48, '126'),
(188, '2022-06-17 01:28:53', 48, '120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `created_at`, `judul`, `deskripsi`) VALUES
(1, '2022-06-09 04:31:30', 'Sebut', 'aksjaskd  '),
(2, '2022-06-09 04:32:16', '', ' '),
(3, '2022-06-11 15:35:22', '', ' '),
(4, '2022-06-16 14:07:12', 'Kerjakan soal', 'Ya itu tawes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `created_at`) VALUES
(15, 'root', 'root@gmail.com', '$2y$10$ITjNrFRnoA5fJYNzg9shM.7XPIWcRseYd5kjwzjiQwVMWk7g73J9.', 1, '2022-04-30 05:24:49'),
(19, 'Slamet', 'guru@gmail.com', '$2y$10$Nv5vP6YWgCbMXkFvzNz3Se/64inltPk9KCI1rIvujojjCFG3R/mi2', 18, '2022-05-11 04:43:27'),
(36, 'koko', 'koko@gmail.com', '$2y$10$gZo/hx7QrFEEsxiJnkJdQeQHPJUP7y0EbldfJcQOYlLu4ReK2zxP2', 18, '2022-06-11 15:26:04'),
(37, 'Riyadi', 'riyadi@gmail.com', '$2y$10$pdLuCQsktB/OK81W3k/kBumVFkHq18nk2j2SydxsmSoymPNOxzPV6', 18, '2022-06-16 03:14:47'),
(38, 'Endang', 'endang@gmail.com', '$2y$10$7gd9w998DNVShCgWTfCc7u1rHQEQSpRAiMXUIXVXX3siQydzVY9U2', 18, '2022-06-16 03:15:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_tes`
--
ALTER TABLE `nilai_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_tes`
--
ALTER TABLE `soal_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_tes_pilihan_ganda`
--
ALTER TABLE `soal_tes_pilihan_ganda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `nilai_tes`
--
ALTER TABLE `nilai_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `soal_tes`
--
ALTER TABLE `soal_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `soal_tes_pilihan_ganda`
--
ALTER TABLE `soal_tes_pilihan_ganda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
