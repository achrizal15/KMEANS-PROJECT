CREATE TABLE
    `soal_tes` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `soal` TEXT NOT NULL,
        `file` VARCHAR(255) NOT NULL,
        `jawaban` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

CREATE TABLE
    `hasil_tes` (
        `id` INT NULL,
        `id_soal` INT NOT NULL,
        `id_siswa` INT NOT NULL,
        `jawaban` VARCHAR(255) NOT NULL
    ) ENGINE = InnoDB;

ALTER TABLE `soal_tes`
ADD `materi_id` INT NOT NULL AFTER `jawaban`;

ALTER TABLE `soal_tes`
ADD
    `tingkatan` ENUM('SD', 'SMP', 'SMA', '') NOT NULL AFTER `materi_id`;

ALTER TABLE
    `soal_tes` CHANGE `file` `file` VARCHAR(255) CHARACTER
SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

ALTER TABLE `soal_tes`
ADD `created_at` DATETIME NOT NULL AFTER `tingkatan`;

CREATE TABLE
    `soal_tes_pilihan_ganda` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `created_at` DATETIME NOT NULL,
        `soal_id` INT NOT NULL,
        `jawaban` TEXT NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;