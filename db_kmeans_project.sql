-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2022 pada 09.54
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
(17, 'Home', 'home', '2022-05-11 09:52:44', '', 'fa-solid fa-gauge', '', NULL),
(18, 'User', 'user', '2022-05-11 09:52:44', 'usercontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(19, 'Role', 'role', '2022-05-11 09:52:44', 'rolecontroller', 'fa-solid fa-user-headset', '', 'Manage Staff'),
(21, 'Materi', 'materi', '2022-05-11 09:52:44', 'matericontroller', 'fa-solid fa-square-poll-horizontal', '', NULL);

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
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(17, 18),
(19, 18),
(18, 18),
(21, 18);

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
(19, 'guru', 'guru@gmail.com', '$2y$10$Nv5vP6YWgCbMXkFvzNz3Se/64inltPk9KCI1rIvujojjCFG3R/mi2', 18, '2022-05-11 04:43:27'),
(35, 'assakk', 'adskj@gmail.com', '$2y$10$LhZ5nA743SlNz1C9vgGRoeakAIqJ8GrkHRo5xJnwdxykyITmrchj6', 1, '2022-05-11 05:39:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
