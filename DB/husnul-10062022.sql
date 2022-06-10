CREATE TABLE `db_kmeans_project`.`siswa` ( `id` INT NOT NULL AUTO_INCREMENT , `nama` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `alamat` VARCHAR(255) NOT NULL , `asal_sekolah` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `siswa` ADD `angkatan_id` INT NOT NULL AFTER `created_at`;

CREATE TABLE `db_kmeans_project`.`angkatan` ( `id` INT NOT NULL AUTO_INCREMENT , `awal_pendaftaran` DATETIME NOT NULL , `akhir_pendaftaran` DATETIME NOT NULL , `awal_periode` DATETIME NOT NULL , `akhir_periode` DATETIME NOT NULL , `status` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `angkatan` ADD `angkatan` INT NOT NULL AFTER `id`;