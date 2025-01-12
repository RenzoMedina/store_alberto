/*Table of user*/
USE bmhkm2itgpivjvpoy9p1;

/*
? table of roles
*/
CREATE TABLE IF NOT EXISTS table_roles(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `rol` VARCHAR(50) NOT NULL,
    `estado` VARCHAR(20) NOT NULL,  
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP
)ENGINE = InnoDB;

/*
? table of user
*/
CREATE TABLE IF NOT EXISTS table_users(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50)NOT NULL,
    `apellido` VARCHAR(70)NOT NULL,
    `password` VARCHAR(70)NOT NULL,
    `repeat_password` VARCHAR(70)NOT NULL,
    `id_rol` INT,
    `estado` VARCHAR(20) NOT NULL,  
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP,
    CONSTRAINT fk_id_rol FOREIGN KEY (`id_rol`) REFERENCES `table_roles` (`id`)
)ENGINE = InnoDB;

/*
? table of ventas
*/
CREATE TABLE IF NOT EXISTS table_venta_basica(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `fecha` DATE NOT NULL,
    `valor` FLOAT(15,3) NOT NULL,
    `tipo` VARCHAR(20) NOT NULL,
    `estado` VARCHAR(20) NOT NULL, 
    `nombre` VARCHAR(60),
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP
)ENGINE = InnoDB;

/*
? table of products
*/
CREATE TABLE IF NOT EXISTS table_products(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `codigo` BIGINT NOT NULL,
    `descripcion` VARCHAR(100)NOT NULL,
    `cantidad` INT NOT NULL,
    `valor_costo` FLOAT(7,3) NOT NULL,
    `valor_venta` FLOAT(7,3) NOT NULL,
    `fecha_caducidad` DATE NOT NULL,
    `estado` VARCHAR(20) NOT NULL,  
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP
)ENGINE = InnoDB;

/*
? table of proveedores
*/
CREATE TABLE IF NOT EXISTS table_proveedores(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `rut` VARCHAR(15)NOT NULL,
    `nombre` VARCHAR(100)NOT NULL,
    `categoria` VARCHAR(100)NOT NULL,
    `estado` VARCHAR(20) NOT NULL,  
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP
)ENGINE = InnoDB;

/*
? table of pago proveedor
*/
CREATE TABLE IF NOT EXISTS table_pago_proveedor(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `valor` FLOAT(7,3) NOT NULL,
    `id_prooveedor` INT,
    `estado` VARCHAR(20) NOT NULL,  
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at` TIMESTAMP,
    CONSTRAINT fk_id_prooveedor FOREIGN KEY (`id_prooveedor`) REFERENCES `table_proveedores` (`id`)
)ENGINE = InnoDB;
