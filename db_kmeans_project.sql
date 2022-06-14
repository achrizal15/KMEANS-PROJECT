-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2022 pada 08.19
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kmeans_project`
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
(32, 'Role', 'role', '2022-06-14 08:18:42', 'rolecontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(33, 'Home', 'home', '2022-06-14 08:18:42', '', 'fa-solid fa-gauge', '', NULL),
(34, 'Materi', 'materi', '2022-06-14 08:18:42', 'matericontroller', 'fa-solid fa-square-poll-horizontal', '', NULL),
(35, 'User', 'user', '2022-06-14 08:18:42', 'usercontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(37, 'Kelas', 'kelas', '2022-06-14 08:18:42', 'kelascontroller', 'fa-solid fa-window-frame', '', NULL),
(38, 'Jam Pelajaran', 'pembelajaran', '2022-06-14 08:18:42', 'pembelajarancontroller', 'fa-solid fa-users', '', NULL),
(39, 'Angkatan', 'angkatan', '2022-06-14 08:18:42', 'angkatancontroller', 'fa-solid fa-school', '', NULL),
(43, 'Soal Tes', 'soaltes', '2022-06-14 08:18:42', 'soaltescontroller', 'fa-solid fa-list-dropdown', '', 'Manage Tes'),
(45, 'Siswa', 'siswa', '2022-06-14 08:18:42', 'siswacontroller', 'fa-solid fa-user-graduate', '', NULL),
(46, 'Nilai Tes', 'nilaites', '2022-06-14 08:18:42', 'soaltescontroller/nilai', 'fa-solid fa-list-dropdown', '', 'Manage Tes'),
(51, 'Penerimaan Siswa', 'penerimaan', '2022-06-14 08:18:42', 'penerimaancontroller', 'fa-solid fa-screen-users', '', NULL);

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
(3, '2021', '2022-06-01 00:00:00', '2022-06-14 00:00:00', '2022-06-01 00:00:00', '2022-07-13 00:00:00', 'Aktif', '2022-06-13 07:04:44');

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
(1, 18, 5, '58', '2022-06-14 02:38:53'),
(2, 19, 5, '62', '2022-06-14 02:38:54'),
(3, 20, 5, '65', '2022-06-14 02:38:54'),
(4, 21, 5, '68', '2022-06-14 02:38:54'),
(5, 22, 5, '70', '2022-06-14 02:38:54'),
(6, 23, 5, '73', '2022-06-14 02:38:54'),
(7, 24, 5, '76', '2022-06-14 02:38:54'),
(8, 25, 5, '80', '2022-06-14 02:38:54'),
(9, 26, 5, '83', '2022-06-14 02:38:54'),
(10, 18, 6, '59', '2022-06-14 03:54:10'),
(11, 19, 6, '62', '2022-06-14 03:54:10'),
(12, 20, 6, '65', '2022-06-14 03:54:10'),
(13, 21, 6, '68', '2022-06-14 03:54:10'),
(14, 22, 6, '70', '2022-06-14 03:54:10'),
(15, 23, 6, '72', '2022-06-14 03:54:10'),
(16, 24, 6, '77', '2022-06-14 03:54:10'),
(17, 25, 6, '80', '2022-06-14 03:54:10'),
(18, 26, 6, '83', '2022-06-14 03:54:10'),
(19, 18, 7, '58', '2022-06-14 03:56:44'),
(20, 19, 7, '62', '2022-06-14 03:56:44'),
(21, 20, 7, '65', '2022-06-14 03:56:44'),
(22, 21, 7, '66', '2022-06-14 03:56:44'),
(23, 22, 7, '71', '2022-06-14 03:56:44'),
(24, 23, 7, '73', '2022-06-14 03:56:44'),
(25, 24, 7, '76', '2022-06-14 03:56:44'),
(26, 25, 7, '80', '2022-06-14 03:56:44'),
(27, 26, 7, '83', '2022-06-14 03:56:44'),
(28, 18, 8, '59', '2022-06-14 04:00:44'),
(29, 19, 8, '62', '2022-06-14 04:00:44'),
(30, 20, 8, '65', '2022-06-14 04:00:44'),
(31, 21, 8, '66', '2022-06-14 04:00:44'),
(32, 22, 8, '69', '2022-06-14 04:00:44'),
(33, 23, 8, '74', '2022-06-14 04:00:44'),
(34, 24, 8, '76', '2022-06-14 04:00:44'),
(35, 25, 8, '80', '2022-06-14 04:00:44'),
(36, 26, 8, '83', '2022-06-14 04:00:44'),
(37, 18, 9, '58', '2022-06-14 04:02:56'),
(38, 19, 9, '62', '2022-06-14 04:02:56'),
(39, 20, 9, '65', '2022-06-14 04:02:56'),
(40, 21, 9, '67', '2022-06-14 04:02:56'),
(41, 22, 9, '70', '2022-06-14 04:02:56'),
(42, 23, 9, '72', '2022-06-14 04:02:56'),
(43, 24, 9, '77', '2022-06-14 04:02:56'),
(44, 25, 9, '80', '2022-06-14 04:02:56'),
(45, 26, 9, '83', '2022-06-14 04:02:56'),
(46, 9, 10, '31', '2022-06-14 08:15:21'),
(47, 10, 10, NULL, '2022-06-14 08:15:21'),
(48, 11, 10, '36', '2022-06-14 08:15:21'),
(49, 12, 10, '40', '2022-06-14 08:15:21'),
(50, 13, 10, '44', '2022-06-14 08:15:21'),
(51, 14, 10, '47', '2022-06-14 08:15:21'),
(52, 15, 10, '48', '2022-06-14 08:15:21'),
(53, 16, 10, NULL, '2022-06-14 08:15:21'),
(54, 17, 10, NULL, '2022-06-14 08:15:21');

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
(2, 'A', '2022-06-08 05:26:07', 'SD', 19, 'Selasa', '13:10'),
(3, 'B', '2022-06-08 06:09:39', 'SMP', 19, 'Senin', '13:09'),
(6, 'B', '2022-06-14 05:43:38', 'SD', 19, 'Senin', '12:12'),
(8, 'A', '2022-06-14 05:51:10', 'SMP', 19, 'Selasa', '12:12');

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
(1, 'bilangan ', 33, '66', 5, '2022-06-14 03:14:18'),
(2, 'Aljabar', 34, '33', 5, '2022-06-14 03:14:18'),
(3, 'Garis dan Sudut', 35, '66', 5, '2022-06-14 03:14:18'),
(4, 'bilangan ', 33, '99', 6, '2022-06-14 03:54:11'),
(5, 'Aljabar', 34, '33', 6, '2022-06-14 03:54:11'),
(6, 'Garis dan Sudut', 35, '99', 6, '2022-06-14 03:54:11'),
(7, 'bilangan ', 33, '66', 7, '2022-06-14 03:56:44'),
(8, 'Aljabar', 34, '33', 7, '2022-06-14 03:56:45'),
(9, 'Garis dan Sudut', 35, '66', 7, '2022-06-14 03:56:45'),
(10, 'bilangan ', 33, '99', 8, '2022-06-14 04:00:45'),
(11, 'Aljabar', 34, '33', 8, '2022-06-14 04:00:45'),
(12, 'Garis dan Sudut', 35, '66', 8, '2022-06-14 04:00:45'),
(13, 'bilangan ', 33, '66', 9, '2022-06-14 04:02:57'),
(14, 'Aljabar', 34, '0', 9, '2022-06-14 04:02:57'),
(15, 'Garis dan Sudut', 35, '99', 9, '2022-06-14 04:02:57'),
(16, 'Operasi Hitung', 30, '0', 10, '2022-06-14 08:15:22'),
(17, 'Kelipatan dan Faktor', 31, '66', 10, '2022-06-14 08:15:22'),
(18, 'Bangun Datar Sederhana', 32, '0', 10, '2022-06-14 08:15:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` int(11) NOT NULL,
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

INSERT INTO `pembelajaran` (`id`, `guru_id`, `kelas_id`, `materi_id`, `file`, `deskripsi`, `tugas_id`, `created_at`) VALUES
(4, 36, 4, 28, 'CamScanner1.zip', 'DIrubar', 0, '2022-06-11 15:36:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` enum('NON ACTIVE','ACTIVE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `email`, `password`, `alamat`, `asal_sekolah`, `created_at`, `angkatan_id`, `tingkatan`, `status`) VALUES
(5, 'koko', 'koko@gmail.com', '$2y$10$VFZkaUknK7BxfTyx1GUaCOA5AXRjv6G1URchz6wQR./KkI36gh12O', 'kemiren', 'bwi', '2022-06-13 19:34:38', 3, 'SMP', 'NON ACTIVE'),
(6, 'ACH RIZAL', 'ach@gmail.com', '$2y$10$tO39TbEJJlUBlWaXhz9Mx.xP0KkjlXwbUAvIC7mZWsPZT3xGsZivW', 'kemiren', 'ASP', '2022-06-13 20:53:37', 3, 'SMP', 'NON ACTIVE'),
(7, 'Kusnul', 'husnul@gmail.com', '$2y$10$TxnVTnWtoWUpNWilGxnyi.olQQ/bIWGpokAnChVJ2j2UVBpHzd7Ry', 'grojakan', 'SJK', '2022-06-13 20:56:18', 3, 'SMP', 'NON ACTIVE'),
(8, 'Ayu Wulan', 'ay@gmail.com', '$2y$10$qmRi9U0dlzSgvErLdfjt9.a0BSZvsyDfrYgRVHNREfMi8yYjQ4Koe', 'bwi', 'SMPEK', '2022-06-13 21:00:21', 3, 'SMP', 'NON ACTIVE'),
(9, 'Junaide', 'juna@gmail.com', '$2y$10$R.2VrQixs9LetFVZs02wS.tDm0m1PBYnNAa8T2x7/xquBgh8hnCSu', 'kem', 'SMEA', '2022-06-13 21:02:19', 3, 'SMP', 'NON ACTIVE'),
(10, 'Dika', 'dik@gmail.com', '$2y$10$G9M6ycrDu1Hzv.OIQLGAQ.rUdMaKcqoI9N4atNImWuWQpWlKRflAS', 'akso', 'aksod', '2022-06-14 01:15:01', 3, 'SD', 'NON ACTIVE');

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
(18, 'Dari ramalan cuaca kota-kota besar di dunia tercatat suhu tertinggi dan terendah adalah sebagai berikut.\r\nMoskow: terendah -5°C dan tertinggi 10°C\r\nMeksiko: terendah 17°C dan tertinggi 34°C\r\nParis: terendah -3°C dan tertinggi 17°C\r\nTokyo: terendah -2°C dan tertinggi 25°C\r\nPerubahan suhu terbesar terjadi di kota…', NULL, 'tokyo', 33, 'SMP', '2022-06-13 06:36:32'),
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
(35, 'Carilah nilai modus dari data berikut: 2,5,5,7,7,6...', NULL, '5 dan 7', 38, 'SMA', '2022-06-13 06:51:09');

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
(57, '2022-06-13 06:36:32', 18, 'meksiko'),
(58, '2022-06-13 06:36:32', 18, 'paris'),
(59, '2022-06-13 06:36:32', 18, 'tokyo'),
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
(110, '2022-06-13 06:51:09', 35, '5 dan 7');

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
(3, '2022-06-11 15:35:22', '', ' ');

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
(36, 'koko', 'koko@gmail.com', '$2y$10$gZo/hx7QrFEEsxiJnkJdQeQHPJUP7y0EbldfJcQOYlLu4ReK2zxP2', 18, '2022-06-11 15:26:04');

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
-- Indeks untuk tabel `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `nilai_tes`
--
ALTER TABLE `nilai_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `soal_tes`
--
ALTER TABLE `soal_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `soal_tes_pilihan_ganda`
--
ALTER TABLE `soal_tes_pilihan_ganda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
