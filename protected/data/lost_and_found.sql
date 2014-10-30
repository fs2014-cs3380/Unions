SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `unions_lost_and_found` ;
CREATE SCHEMA IF NOT EXISTS `unions_lost_and_found` DEFAULT CHARACTER SET latin1 ;
USE `unions_lost_and_found` ;

-- -----------------------------------------------------
-- Table `unions_lost_and_found`.`item_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unions_lost_and_found`.`item_status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unions_lost_and_found`.`item_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unions_lost_and_found`.`item_type` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  `create_time` DATETIME NULL DEFAULT NULL,
  `create_user` VARCHAR(30) NULL DEFAULT NULL,
  `status` INT(11) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unions_lost_and_found`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unions_lost_and_found`.`item` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NOT NULL,
  `found_user` VARCHAR(45) NOT NULL,
  `found_date` DATE NOT NULL,
  `status_id` INT(11) NOT NULL DEFAULT '1',
  `type_id` INT(11) NOT NULL,
  `create_user` VARCHAR(45) NULL DEFAULT NULL,
  `create_time` DATETIME NULL DEFAULT NULL,
  `update_user` VARCHAR(45) NULL DEFAULT NULL,
  `update_time` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_item_item_status` (`status_id` ASC),
  INDEX `FK_item_item_type` (`type_id` ASC),
  CONSTRAINT `FK_item_item_status`
    FOREIGN KEY (`status_id`)
    REFERENCES `unions_lost_and_found`.`item_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_item_item_type`
    FOREIGN KEY (`type_id`)
    REFERENCES `unions_lost_and_found`.`item_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unions_lost_and_found`.`item_claim`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unions_lost_and_found`.`item_claim` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `item_id` INT(11) NOT NULL,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `claim_date` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_item_id_idx` (`item_id` ASC),
  CONSTRAINT `fk_item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `unions_lost_and_found`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
