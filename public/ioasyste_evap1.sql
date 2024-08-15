-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ioasyste_evap1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ioasyste_evap1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ioasyste_evap1` DEFAULT CHARACTER SET utf8 ;
USE `ioasyste_evap1` ;

-- -----------------------------------------------------
-- Table `ioasyste_evap1`.`Departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ioasyste_evap1`.`Departamentos` (
  `departamento_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `ubicacion` VARCHAR(45) NULL,
  `jefe_departamento` VARCHAR(45) NULL,
  `extension` VARCHAR(45) NULL,
  PRIMARY KEY (`departamento_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ioasyste_evap1`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ioasyste_evap1`.`Empleados` (
  `empleado_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `telefono` VARCHAR(10) NULL,
  `departamento_id` INT NULL,
  `Departamentos_departamento_id` INT NOT NULL,
  PRIMARY KEY (`empleado_id`, `Departamentos_departamento_id`),
  INDEX `fk_Empleados_Departamentos_idx` (`Departamentos_departamento_id` ASC) VISIBLE,
  CONSTRAINT `fk_Empleados_Departamentos`
    FOREIGN KEY (`Departamentos_departamento_id`)
    REFERENCES `ioasyste_evap1`.`Departamentos` (`departamento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
