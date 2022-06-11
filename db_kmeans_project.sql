-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2022 pada 03.59
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
(32, 'Role', 'role', '2022-06-10 13:01:51', 'rolecontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(33, 'Home', 'home', '2022-06-10 13:01:51', '', 'fa-solid fa-gauge', '', NULL),
(34, 'Materi', 'materi', '2022-06-10 13:01:51', 'matericontroller', 'fa-solid fa-square-poll-horizontal', '', NULL),
(35, 'User', 'user', '2022-06-10 13:01:51', 'usercontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(37, 'Kelas', 'kelas', '2022-06-10 13:01:51', 'kelascontroller', 'fa-solid fa-window-frame', '', NULL),
(38, 'Pembelajaran', 'pembelajaran', '2022-06-10 13:01:51', 'pembelajarancontroller', 'fa-solid fa-users', '', NULL),
(39, 'Angkatan', 'angkatan', '2022-06-10 13:01:51', 'angkatancontroller', 'fa-solid fa-school', '', NULL),
(43, 'Soal Tes', 'soaltes', '2022-06-10 13:01:51', 'soaltescontroller', 'fa-solid fa-list-dropdown', '', 'Manage Tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
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
(1, 2022, '2022-06-11 00:00:00', '2022-06-12 00:00:00', '2022-06-12 00:00:00', '2022-12-10 00:00:00', 'Aktif', '2022-06-10 12:20:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id` int(11) DEFAULT NULL,
  `id_soal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'C', '2022-06-08 06:09:39', 'SMP', 19, 'Senin', '13:09');

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
(28, 'Aljabar', 'SMP', '2022-05-11 09:51:15', 'Adu adu adu', 'ProposalPA_RendyFajarSetiawan_RevisiSudahSempro.rar');

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
(1, 19, 2, 28, 'img_20220119_204530--1-.jpg', 'aksjaskd ', 1, '2022-06-09 04:31:30'),
(2, 19, 3, 28, 'img_20220119_204530--1-1.jpg', ' ', 2, '2022-06-09 04:32:16');

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
(39, 18),
(33, 18),
(35, 18),
(38, 18),
(43, 18),
(32, 1),
(34, 1),
(37, 1),
(39, 1),
(33, 1),
(35, 1),
(38, 1),
(43, 1);

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
  `angkata_id` int(11) NOT NULL,
  `tingkatan` enum('SD','SMP','SMA','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_tes`
--

CREATE TABLE `soal_tes` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `materi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2022-06-09 04:31:30', 'Sebut', 'aksjaskd '),
(2, '2022-06-09 04:32:16', '', ' ');

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
(19, 'guru', 'guru@gmail.com', '$2y$10$Nv5vP6YWgCbMXkFvzNz3Se/64inltPk9KCI1rIvujojjCFG3R/mi2', 18, '2022-05-11 04:43:27');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_tes`
--
ALTER TABLE `soal_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
