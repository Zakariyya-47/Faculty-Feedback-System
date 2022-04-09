-- MySQL Script generated by MySQL Workbench
-- Thu Mar 31 22:03:08 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------staff
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Staff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Staff` (
  `StaffID` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(45) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,staff
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`StaffID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Department` (
  `DepartmentID` INT NOT NULL,
  `DepName` VARCHAR(45) NULL,
  PRIMARY KEY (`DepartmentID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Roles` (
  `Staff_StaffID` INT NOT NULL,
  `Role` VARCHAR(45) NOT NULL,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Staff_StaffID`),
  CONSTRAINT `fk_Roles_Staff1`
    FOREIGN KEY (`Staff_StaffID`)
    REFERENCES `mydb`.`Staff` (`StaffID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Categories` (
  `CategoryID` INT NOT NULL,
  `CategoryName` VARCHAR(45) NULL,
  `CategoryDescription` VARCHAR(100) NULL,
  PRIMARY KEY (`CategoryID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Ideas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ideas` (
  `IdeaID` INT NOT NULL,
  `Categories_CategoryID` INT NOT NULL,
  `Staff_StaffID` INT NOT NULL,
  `Idea` VARCHAR(1000) NOT NULL,
  `Upvotes` INT NOT NULL,
  `Downvotes` INT NOT NULL,
  `ClosureDate` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdeaID`, `Categories_CategoryID`, `Staff_StaffID`),
  INDEX `fk_Ideas_Categories_idx` (`Categories_CategoryID` ASC) VISIBLE,
  INDEX `fk_Ideas_Faculty1_idx` (`Staff_StaffID` ASC) VISIBLE,
  CONSTRAINT `fk_Ideas_Categories`
    FOREIGN KEY (`Categories_CategoryID`)
    REFERENCES `mydb`.`Categories` (`CategoryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ideas_Faculty1`
    FOREIGN KEY (`Staff_StaffID`)
    REFERENCES `mydb`.`Staff` (`StaffID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`StaffDept`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`StaffDept` (
  `Staff_StaffID` INT NOT NULL,
  `Department_DepartmentID` INT NOT NULL,
  PRIMARY KEY (`Staff_StaffID`, `Department_DepartmentID`),
  INDEX `fk_FacultyDept_Department1_idx` (`Department_DepartmentID` ASC) VISIBLE,
  CONSTRAINT `fk_FacultyDept_Faculty1`
    FOREIGN KEY (`Staff_StaffID`)
    REFERENCES `mydb`.`Staff` (`StaffID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacultyDept_Department1`
    FOREIGN KEY (`Department_DepartmentID`)
    REFERENCES `mydb`.`Department` (`DepartmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Dates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Dates` (
  `DateID` INT NOT NULL,
  `SchoolYear` VARCHAR(45) NULL,
  `FinalClosureDate` VARCHAR(45) NULL,
  PRIMARY KEY (`DateID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comments` (
  `CommentID` INT NOT NULL,
  `Content` VARCHAR(45) NOT NULL,
  `CommentSubmissionDate` VARCHAR(45) NOT NULL,
  `Ideas_IdeaID` INT NOT NULL,
  `Ideas_Categories_CategoryID` INT NOT NULL,
  `Ideas_Staff_StaffID` INT NOT NULL,
  PRIMARY KEY (`CommentID`, `Ideas_IdeaID`, `Ideas_Categories_CategoryID`, `Ideas_Staff_StaffID`),
  INDEX `fk_Comments_Ideas1_idx` (`Ideas_IdeaID` ASC, `Ideas_Categories_CategoryID` ASC, `Ideas_Staff_StaffID` ASC) VISIBLE,
  CONSTRAINT `fk_Comments_Ideas1`
    FOREIGN KEY (`Ideas_IdeaID` , `Ideas_Categories_CategoryID` , `Ideas_Staff_StaffID`)
    REFERENCES `mydb`.`Ideas` (`IdeaID` , `Categories_CategoryID` , `Staff_StaffID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;