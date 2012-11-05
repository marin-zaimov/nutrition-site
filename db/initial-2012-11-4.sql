SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ons` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `ons` ;

-- -----------------------------------------------------
-- Table `ons`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ons`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NULL ,
  `firstName` VARCHAR(45) NULL ,
  `lastName` VARCHAR(45) NULL ,
  `birthDate` DATE NULL ,
  `gender` ENUM('M','F') NULL ,
  `creationDate` DATE NULL ,
  `phoneNumber` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ons`.`userGuidebookInputs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ons`.`userGuidebookInputs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `userId` INT NOT NULL ,
  `creationTime` DATETIME NOT NULL ,
  `bodyWeight` VARCHAR(45) NULL ,
  `height` VARCHAR(45) NULL ,
  `waist` VARCHAR(45) NULL ,
  `avgMealsPerDay` VARCHAR(45) NULL ,
  `activityLevel` VARCHAR(45) NULL ,
  `idealWeight` VARCHAR(45) NULL ,
  `sport` VARCHAR(45) NULL ,
  `season` ENUM('OFF','PRE','IN') NULL ,
  `goal` ENUM('NUTRITION','MUSCLE','FAT') NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_userGuidebookInputs_1` (`userId` ASC) ,
  CONSTRAINT `fk_userGuidebookInputs_1`
    FOREIGN KEY (`userId` )
    REFERENCES `ons`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ons`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ons`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `price` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ons`.`purchases`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ons`.`purchases` (
  `productId` INT NOT NULL ,
  `userId` INT NOT NULL ,
  `purchaseTime` DATETIME NOT NULL ,
  PRIMARY KEY (`productId`, `userId`, `purchaseTime`) ,
  INDEX `fk_purchases_1` (`userId` ASC) ,
  INDEX `fk_purchases_2` (`productId` ASC) ,
  CONSTRAINT `fk_purchases_1`
    FOREIGN KEY (`userId` )
    REFERENCES `ons`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchases_2`
    FOREIGN KEY (`productId` )
    REFERENCES `ons`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
