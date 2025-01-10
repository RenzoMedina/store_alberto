/*Table of user*/
USE bmhkm2itgpivjvpoy9p1;

CREATE TABLE IF NOT EXISTS table_user(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50)NOT NULL,
    `apellido` VARCHAR(70)NOT NULL,
    `password` VARCHAR(70)NOT NULL,
    `repeat_password` VARCHAR(70)NOT NULL,
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP
)ENGINE = InnoDB;