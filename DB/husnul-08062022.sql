
CREATE TABLE `db_kmeans_project`.`pertemuan` ( `id` INT NOT NULL AUTO_INCREMENT , `guru_id` INT NOT NULL , `kelas_id` INT NOT NULL , `materi_id` INT NOT NULL , `file` VARCHAR(255) NOT NULL , `deskripsi` TEXT NOT NULL , `tugas_id` INT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `db_kmeans_project`.`tugas` ( `id` INT NOT NULL AUTO_INCREMENT , `created_at` DATETIME NOT NULL , `judul` VARCHAR(255) NOT NULL , `deskripsi` TEXT NOT NULL , `file` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `db_kmeans_project`.`pengumpulan_tugas` ( `id` INT NOT NULL AUTO_INCREMENT , `siswa_id` INT NOT NULL , `kelas_id` INT NOT NULL , `tugas_id` INT NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

RENAME TABLE `db_kmeans_project`.`pertemuan` TO `db_kmeans_project`.`pembelajaran`;