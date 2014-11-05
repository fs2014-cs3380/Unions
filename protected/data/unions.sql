-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema unions
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `unions` ;

-- -----------------------------------------------------
-- Schema unions
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `unions` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `unions` ;

-- -----------------------------------------------------
-- Table `unions`.`item_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`item_status` ;

CREATE TABLE IF NOT EXISTS `unions`.`item_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`item_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`item_type` ;

CREATE TABLE IF NOT EXISTS `unions`.`item_type` (
  `id` INT NOT NULL,
  `name` VARCHAR(80) NOT NULL,
  `status` INT NOT NULL COMMENT 'Item types must be approved before getting added to the sytem.\n\n-1 for declined\n0 for pending\n1 for approved',
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`item` ;

CREATE TABLE IF NOT EXISTS `unions`.`item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `location` VARCHAR(255) NULL,
  `description` TEXT NOT NULL,
  `found_user_email` VARCHAR(100) NOT NULL,
  `found_date` DATE NOT NULL,
  `item_status_id` INT NOT NULL,
  `item_type_id` INT NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_item_item_status_idx` (`item_status_id` ASC),
  INDEX `fk_item_item_type1_idx` (`item_type_id` ASC),
  CONSTRAINT `fk_item_item_status`
    FOREIGN KEY (`item_status_id`)
    REFERENCES `unions`.`item_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_item_type1`
    FOREIGN KEY (`item_type_id`)
    REFERENCES `unions`.`item_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`user` ;

CREATE TABLE IF NOT EXISTS `unions`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email_address` VARCHAR(80) NOT NULL,
  `sso` VARCHAR(30) NULL,
  `personal_info` TEXT NULL COMMENT 'First Name\nLast Name\nPreferred Name\nPreferred Email Address',
  `last_login` DATETIME NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`item_claim`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`item_claim` ;

CREATE TABLE IF NOT EXISTS `unions`.`item_claim` (
  `item_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `claim_time` DATETIME NULL,
  PRIMARY KEY (`item_id`, `user_id`),
  INDEX `fk_item_has_user_user1_idx` (`user_id` ASC),
  INDEX `fk_item_has_user_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_item_has_user_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `unions`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `unions`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`user_auth`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`user_auth` ;

CREATE TABLE IF NOT EXISTS `unions`.`user_auth` (
  `user_id` INT NOT NULL,
  `password_hash` CHAR(40) NOT NULL,
  `salt` CHAR(40) NOT NULL,
  INDEX `fk_user_auth_user1_idx` (`user_id` ASC),
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_auth_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `unions`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`building`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`building` ;

CREATE TABLE IF NOT EXISTS `unions`.`building` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `address` VARCHAR(100) NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`floor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`floor` ;

CREATE TABLE IF NOT EXISTS `unions`.`floor` (
  `name` VARCHAR(40) NOT NULL,
  `building_id` INT NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`name`, `building_id`),
  INDEX `fk_floor_building1_idx` (`building_id` ASC),
  CONSTRAINT `fk_floor_building1`
    FOREIGN KEY (`building_id`)
    REFERENCES `unions`.`building` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`event_space`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`event_space` ;

CREATE TABLE IF NOT EXISTS `unions`.`event_space` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `floor_id` INT NOT NULL,
  `info` TEXT NULL,
  `image_path` VARCHAR(100) NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`, `floor_id`),
  INDEX `fk_event_space_floor1_idx` (`floor_id` ASC),
  CONSTRAINT `fk_event_space_floor`
    FOREIGN KEY (`floor_id`)
    REFERENCES `unions`.`floor` (`building_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`category` ;

CREATE TABLE IF NOT EXISTS `unions`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`policy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`policy` ;

CREATE TABLE IF NOT EXISTS `unions`.`policy` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(60) NOT NULL,
  `text` TEXT NOT NULL,
  `category_id` INT NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_policy_category1_idx` (`category_id` ASC),
  CONSTRAINT `fk_policy_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `unions`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`tag` ;

CREATE TABLE IF NOT EXISTS `unions`.`tag` (
  `name` VARCHAR(50) NOT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`tag_policy_assignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`tag_policy_assignment` ;

CREATE TABLE IF NOT EXISTS `unions`.`tag_policy_assignment` (
  `tag_name` VARCHAR(50) NOT NULL,
  `policy_id` INT NOT NULL,
  PRIMARY KEY (`tag_name`, `policy_id`),
  INDEX `fk_tag_has_policy_policy1_idx` (`policy_id` ASC),
  INDEX `fk_tag_has_policy_tag1_idx` (`tag_name` ASC),
  CONSTRAINT `fk_tag_has_policy_tag1`
    FOREIGN KEY (`tag_name`)
    REFERENCES `unions`.`tag` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tag_has_policy_policy1`
    FOREIGN KEY (`policy_id`)
    REFERENCES `unions`.`policy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`feature`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`feature` ;

CREATE TABLE IF NOT EXISTS `unions`.`feature` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `url` VARCHAR(150) NULL,
  `event_space_id` INT NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unions`.`atrraction`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unions`.`atrraction` ;

CREATE TABLE IF NOT EXISTS `unions`.`atrraction` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `image_path` VARCHAR(100) NULL,
  `lim_id` INT NULL,
  `information_url` VARCHAR(100) NULL,
  `url_display_name` VARCHAR(60) NULL,
  `create_time` DATETIME NULL,
  `create_user_id` INT NULL,
  `update_time` DATETIME NULL,
  `update_user_id` INT NULL,
  `building_id` INT NOT NULL,
  PRIMARY KEY (`id`, `building_id`),
  INDEX `fk_atrraction_building1_idx` (`building_id` ASC),
  CONSTRAINT `fk_atrraction_building1`
    FOREIGN KEY (`building_id`)
    REFERENCES `unions`.`building` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE = '';
GRANT USAGE ON *.* TO unions;
 DROP USER unions;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'unions' IDENTIFIED BY 'iVIOwk*ivx';

GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `unions`.* TO 'unions';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
