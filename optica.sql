-- MySQL Workbench Synchronization
-- Generated: 2021-05-16 16:42
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Pablo

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `optica` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `optica`.`gafas` (
  `gafas_id` INT(11) NOT NULL AUTO_INCREMENT,
  `gafas_marca` VARCHAR(45) NOT NULL,
  `gafas_graduacion_der` DECIMAL NOT NULL,
  `gafas_graduacion_izq` DECIMAL NOT NULL,
  `gafas_muntura` VARCHAR(45) NOT NULL,
  `gafas_color` VARCHAR(45) NOT NULL,
  `gafas_color_vidre` VARCHAR(45) NOT NULL,
  `gafas_precio` DECIMAL NOT NULL,
  `gafas_modicado` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `gafas_creado` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `marcas_gafas_marcas_gafas_id` INT(11) NOT NULL,
  PRIMARY KEY (`gafas_id`, `marcas_gafas_marcas_gafas_id`),
  INDEX `fk_gafas_marcas_gafas_idx` (`marcas_gafas_marcas_gafas_id` ASC) VISIBLE,
  CONSTRAINT `fk_gafas_marcas_gafas`
    FOREIGN KEY (`marcas_gafas_marcas_gafas_id`)
    REFERENCES `optica`.`marcas_gafas` (`marcas_gafas_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`provedores` (
  `provedores_id` INT(11) NOT NULL AUTO_INCREMENT,
  `provedores_nombre` VARCHAR(45) NOT NULL,
  `provedores_telefono` INT(11) NULL DEFAULT NULL,
  `provedores_web` VARCHAR(45) NULL DEFAULT NULL,
  `provedores_nif` VARCHAR(45) NOT NULL,
  `provedores_direccion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`provedores_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`marcas_gafas` (
  `marcas_gafas_id` INT(11) NOT NULL AUTO_INCREMENT,
  `marcas_gafas_nombre` VARCHAR(45) NOT NULL,
  `provedores_provedores_id` INT(11) NOT NULL,
  PRIMARY KEY (`marcas_gafas_id`, `provedores_provedores_id`),
  INDEX `fk_marcas_gafas_provedores1_idx` (`provedores_provedores_id` ASC) VISIBLE,
  CONSTRAINT `fk_marcas_gafas_provedores1`
    FOREIGN KEY (`provedores_provedores_id`)
    REFERENCES `optica`.`provedores` (`provedores_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`clientes` (
  `clientes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `clientes_nombre` VARCHAR(45) NOT NULL,
  `clientes_direccion` VARCHAR(100) NULL DEFAULT NULL,
  `clientes_telefono` INT(11) NOT NULL,
  `clientes_correo` VARCHAR(45) NULL DEFAULT NULL,
  `clientes_registro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `clientes_clientes_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`clientes_id`),
  INDEX `fk_clientes_clientes1_idx` (`clientes_clientes_id` ASC) VISIBLE,
  CONSTRAINT `fk_clientes_clientes1`
    FOREIGN KEY (`clientes_clientes_id`)
    REFERENCES `optica`.`clientes` (`clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`ordenes` (
  `orden_id` INT(11) NOT NULL AUTO_INCREMENT,
  `orden_creada` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `clientes_clientes_id` INT(11) NOT NULL,
  `empleados_empleados_id` INT(11) NOT NULL,
  PRIMARY KEY (`orden_id`, `clientes_clientes_id`, `empleados_empleados_id`),
  INDEX `fk_ordenes_clientes1_idx` (`clientes_clientes_id` ASC) VISIBLE,
  INDEX `fk_ordenes_empleados1_idx` (`empleados_empleados_id` ASC) VISIBLE,
  CONSTRAINT `fk_ordenes_clientes1`
    FOREIGN KEY (`clientes_clientes_id`)
    REFERENCES `optica`.`clientes` (`clientes_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ordenes_empleados1`
    FOREIGN KEY (`empleados_empleados_id`)
    REFERENCES `optica`.`empleados` (`empleados_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`empleados` (
  `empleados_id` INT(11) NOT NULL AUTO_INCREMENT,
  `empleados_nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`empleados_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`ordenes_has_gafas` (
  `ordenes_orden_id` INT(11) NOT NULL,
  `gafas_gafas_id` INT(11) NOT NULL,
  `gafas_marcas_gafas_marcas_gafas_id` INT(11) NOT NULL,
  PRIMARY KEY (`ordenes_orden_id`, `gafas_gafas_id`, `gafas_marcas_gafas_marcas_gafas_id`),
  INDEX `fk_ordenes_has_gafas_gafas1_idx` (`gafas_gafas_id` ASC, `gafas_marcas_gafas_marcas_gafas_id` ASC) VISIBLE,
  INDEX `fk_ordenes_has_gafas_ordenes1_idx` (`ordenes_orden_id` ASC) VISIBLE,
  CONSTRAINT `fk_ordenes_has_gafas_ordenes1`
    FOREIGN KEY (`ordenes_orden_id`)
    REFERENCES `optica`.`ordenes` (`orden_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ordenes_has_gafas_gafas1`
    FOREIGN KEY (`gafas_gafas_id` , `gafas_marcas_gafas_marcas_gafas_id`)
    REFERENCES `optica`.`gafas` (`gafas_id` , `marcas_gafas_marcas_gafas_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
