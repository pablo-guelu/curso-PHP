-- MySQL Workbench Synchronization
-- Generated: 2021-05-16 23:17
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Pablo

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `pizzeria`.`clientes` (
  `clientes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `clientes_nombre` VARCHAR(45) NOT NULL,
  `clientes_apellido` VARCHAR(45) NOT NULL,
  `clientes_direccion` VARCHAR(45) NOT NULL,
  `clientes_codigo_postal` INT(11) NOT NULL,
  `clientes_telefono` INT(11) NULL DEFAULT NULL,
  `localitat_localitat_id` INT(11) NOT NULL,
  `localitat_provincia_provincia_id` INT(11) NOT NULL,
  PRIMARY KEY (`clientes_id`, `localitat_localitat_id`, `localitat_provincia_provincia_id`),
  INDEX `fk_clientes_localitat1_idx` (`localitat_localitat_id` ASC, `localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_clientes_localitat1`
    FOREIGN KEY (`localitat_localitat_id` , `localitat_provincia_provincia_id`)
    REFERENCES `pizzeria`.`localitat` (`localitat_id` , `provincia_provincia_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`localitat` (
  `localitat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `localitat_nombre` VARCHAR(45) NOT NULL,
  `provincia_provincia_id` INT(11) NOT NULL,
  PRIMARY KEY (`localitat_id`, `provincia_provincia_id`),
  INDEX `fk_localitat_provincia_idx` (`provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_localitat_provincia`
    FOREIGN KEY (`provincia_provincia_id`)
    REFERENCES `pizzeria`.`provincia` (`provincia_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`provincia` (
  `provincia_id` INT(11) NOT NULL AUTO_INCREMENT,
  `provincia_nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`provincia_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comandes` (
  `comandes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `comandes_creada` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comandes_entrega_domicilio` TINYINT(4) NOT NULL,
  `comandes_entrega_tienda` TINYINT(4) NOT NULL,
  `comandes_direccion_entrega` VARCHAR(255) NOT NULL,
  `clientes_clientes_id` INT(11) NOT NULL,
  `tienda_tienda_id` INT(11) NOT NULL,
  `empleados_empleados_id` INT(11) NOT NULL,
  `comandes_hora_entrega` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comandes_cantidad_pizzas` INT(11) NOT NULL,
  `comandes_cantidad_hamburguesas` INT(11) NOT NULL,
  `comandes_cantidad_bebidas` INT(11) NOT NULL,
  `comandes_precio_total` DECIMAL NOT NULL,
  PRIMARY KEY (`comandes_id`, `clientes_clientes_id`, `tienda_tienda_id`, `empleados_empleados_id`),
  INDEX `fk_comandes_clientes1_idx` (`clientes_clientes_id` ASC) VISIBLE,
  INDEX `fk_comandes_tienda1_idx` (`tienda_tienda_id` ASC) VISIBLE,
  INDEX `fk_comandes_empleados1_idx` (`empleados_empleados_id` ASC) VISIBLE,
  CONSTRAINT `fk_comandes_clientes1`
    FOREIGN KEY (`clientes_clientes_id`)
    REFERENCES `pizzeria`.`clientes` (`clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comandes_tienda1`
    FOREIGN KEY (`tienda_tienda_id`)
    REFERENCES `pizzeria`.`tienda` (`tienda_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comandes_empleados1`
    FOREIGN KEY (`empleados_empleados_id`)
    REFERENCES `pizzeria`.`empleados` (`empleados_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`pizzas` (
  `pizza_id` INT(11) NOT NULL AUTO_INCREMENT,
  `pizza_nombre` VARCHAR(255) NOT NULL,
  `pizza_precio` DECIMAL NOT NULL,
  `pizza_descripción` TEXT NOT NULL,
  `pizza_img` VARCHAR(255) NOT NULL,
  `categorias_categorias_id` INT(11) NOT NULL,
  PRIMARY KEY (`pizza_id`, `categorias_categorias_id`),
  INDEX `fk_pizzas_categorias1_idx` (`categorias_categorias_id` ASC) VISIBLE,
  CONSTRAINT `fk_pizzas_categorias1`
    FOREIGN KEY (`categorias_categorias_id`)
    REFERENCES `pizzeria`.`categorias` (`categorias_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`bebidas` (
  `bebidas_id` INT(11) NOT NULL AUTO_INCREMENT,
  `bebidas_nombre` VARCHAR(255) NOT NULL,
  `bebidas_descripción` TEXT NOT NULL,
  `bebidas_precio` DECIMAL NOT NULL,
  `bebidas_img` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`bebidas_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`hamburguesas` (
  `hamburguesas_id` INT(11) NOT NULL AUTO_INCREMENT,
  `hamburguesas_nombre` VARCHAR(255) NOT NULL,
  `hamburguesas_precio` DECIMAL NOT NULL,
  `hamburguesas_descripción` TEXT NOT NULL,
  `hamburguesas_img` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`hamburguesas_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`categorias` (
  `categorias_id` INT(11) NOT NULL AUTO_INCREMENT,
  `categorias_nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`categorias_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`tienda` (
  `tienda_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tienda_direccion` VARCHAR(255) NOT NULL,
  `tienda_codigo_postal` INT(11) NOT NULL,
  `localitat_localitat_id` INT(11) NOT NULL,
  `localitat_provincia_provincia_id` INT(11) NOT NULL,
  PRIMARY KEY (`tienda_id`, `localitat_localitat_id`, `localitat_provincia_provincia_id`),
  INDEX `fk_tienda_localitat1_idx` (`localitat_localitat_id` ASC, `localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_tienda_localitat1`
    FOREIGN KEY (`localitat_localitat_id` , `localitat_provincia_provincia_id`)
    REFERENCES `pizzeria`.`localitat` (`localitat_id` , `provincia_provincia_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`empleados` (
  `empleados_id` INT(11) NOT NULL AUTO_INCREMENT,
  `empleados_nombre` VARCHAR(45) NOT NULL,
  `empleados_apellido` VARCHAR(45) NOT NULL,
  `empleados_nif` VARCHAR(45) NOT NULL,
  `empleados_telefono` INT(11) NULL DEFAULT NULL,
  `empleados_cargo` VARCHAR(45) NOT NULL,
  `tienda_tienda_id` INT(11) NOT NULL,
  `tienda_localitat_localitat_id` INT(11) NOT NULL,
  `tienda_localitat_provincia_provincia_id` INT(11) NOT NULL,
  PRIMARY KEY (`empleados_id`, `tienda_tienda_id`, `tienda_localitat_localitat_id`, `tienda_localitat_provincia_provincia_id`),
  INDEX `fk_empleados_tienda1_idx` (`tienda_tienda_id` ASC, `tienda_localitat_localitat_id` ASC, `tienda_localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_empleados_tienda1`
    FOREIGN KEY (`tienda_tienda_id` , `tienda_localitat_localitat_id` , `tienda_localitat_provincia_provincia_id`)
    REFERENCES `pizzeria`.`tienda` (`tienda_id` , `localitat_localitat_id` , `localitat_provincia_provincia_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comandes_has_pizzas` (
  `comandes_comandes_id` INT(11) NOT NULL,
  `comandes_clientes_clientes_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_localitat_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_provincia_provincia_id` INT(11) NOT NULL,
  `pizzas_pizza_id` INT(11) NOT NULL,
  `pizzas_categorias_categorias_id` INT(11) NOT NULL,
  PRIMARY KEY (`comandes_comandes_id`, `comandes_clientes_clientes_id`, `comandes_clientes_localitat_localitat_id`, `comandes_clientes_localitat_provincia_provincia_id`, `pizzas_pizza_id`, `pizzas_categorias_categorias_id`),
  INDEX `fk_comandes_has_pizzas_pizzas1_idx` (`pizzas_pizza_id` ASC, `pizzas_categorias_categorias_id` ASC) VISIBLE,
  INDEX `fk_comandes_has_pizzas_comandes1_idx` (`comandes_comandes_id` ASC, `comandes_clientes_clientes_id` ASC, `comandes_clientes_localitat_localitat_id` ASC, `comandes_clientes_localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_comandes_has_pizzas_comandes1`
    FOREIGN KEY (`comandes_comandes_id` , `comandes_clientes_clientes_id`)
    REFERENCES `pizzeria`.`comandes` (`comandes_id` , `clientes_clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comandes_has_pizzas_pizzas1`
    FOREIGN KEY (`pizzas_pizza_id` , `pizzas_categorias_categorias_id`)
    REFERENCES `pizzeria`.`pizzas` (`pizza_id` , `categorias_categorias_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comandes_has_hamburguesas` (
  `comandes_comandes_id` INT(11) NOT NULL,
  `comandes_clientes_clientes_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_localitat_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_provincia_provincia_id` INT(11) NOT NULL,
  `hamburguesas_hamburguesas_id` INT(11) NOT NULL,
  PRIMARY KEY (`comandes_comandes_id`, `comandes_clientes_clientes_id`, `comandes_clientes_localitat_localitat_id`, `comandes_clientes_localitat_provincia_provincia_id`, `hamburguesas_hamburguesas_id`),
  INDEX `fk_comandes_has_hamburguesas_hamburguesas1_idx` (`hamburguesas_hamburguesas_id` ASC) VISIBLE,
  INDEX `fk_comandes_has_hamburguesas_comandes1_idx` (`comandes_comandes_id` ASC, `comandes_clientes_clientes_id` ASC, `comandes_clientes_localitat_localitat_id` ASC, `comandes_clientes_localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_comandes_has_hamburguesas_comandes1`
    FOREIGN KEY (`comandes_comandes_id` , `comandes_clientes_clientes_id`)
    REFERENCES `pizzeria`.`comandes` (`comandes_id` , `clientes_clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comandes_has_hamburguesas_hamburguesas1`
    FOREIGN KEY (`hamburguesas_hamburguesas_id`)
    REFERENCES `pizzeria`.`hamburguesas` (`hamburguesas_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comandes_has_bebidas` (
  `comandes_comandes_id` INT(11) NOT NULL,
  `comandes_clientes_clientes_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_localitat_id` INT(11) NOT NULL,
  `comandes_clientes_localitat_provincia_provincia_id` INT(11) NOT NULL,
  `bebidas_bebidas_id` INT(11) NOT NULL,
  PRIMARY KEY (`comandes_comandes_id`, `comandes_clientes_clientes_id`, `comandes_clientes_localitat_localitat_id`, `comandes_clientes_localitat_provincia_provincia_id`, `bebidas_bebidas_id`),
  INDEX `fk_comandes_has_bebidas_bebidas1_idx` (`bebidas_bebidas_id` ASC) VISIBLE,
  INDEX `fk_comandes_has_bebidas_comandes1_idx` (`comandes_comandes_id` ASC, `comandes_clientes_clientes_id` ASC, `comandes_clientes_localitat_localitat_id` ASC, `comandes_clientes_localitat_provincia_provincia_id` ASC) VISIBLE,
  CONSTRAINT `fk_comandes_has_bebidas_comandes1`
    FOREIGN KEY (`comandes_comandes_id` , `comandes_clientes_clientes_id`)
    REFERENCES `pizzeria`.`comandes` (`comandes_id` , `clientes_clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comandes_has_bebidas_bebidas1`
    FOREIGN KEY (`bebidas_bebidas_id`)
    REFERENCES `pizzeria`.`bebidas` (`bebidas_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
