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