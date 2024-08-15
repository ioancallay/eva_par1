-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ioasyste_evap1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ioasyste_evap1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ioasyste_evap1` DEFAULT CHARACTER SET utf8mb3 ;
USE `ioasyste_evap1` ;

-- -----------------------------------------------------
-- Table `ioasyste_evap1`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ioasyste_evap1`.`Empleados` (
  `empleado_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(10) NULL DEFAULT NULL,
  `departamento_id` INT NULL DEFAULT NULL,
  PRIMARY KEY (`empleado_id`),
  INDEX `departamento_id_fk_idx` (`departamento_id` ASC) VISIBLE,
  CONSTRAINT `departamento_id_fk`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `ioasyste_evap1`.`Departamentos` (`departamento_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `ioasyste_evap1`.`Departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ioasyste_evap1`.`Departamentos` (
  `departamento_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `ubicacion` VARCHAR(45) NULL DEFAULT NULL,
  `jefe_departamento` INT NULL DEFAULT NULL,
  `extension` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`departamento_id`),
  INDEX `jefe_departamento_idx` (`jefe_departamento` ASC) VISIBLE,
  CONSTRAINT `jefe_departamento`
    FOREIGN KEY (`jefe_departamento`)
    REFERENCES `ioasyste_evap1`.`Empleados` (`empleado_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
