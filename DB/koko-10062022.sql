CREATE TABLE `pengumpulan_tugas` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `pembelajaran_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;