SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `panel` ;
CREATE SCHEMA IF NOT EXISTS `panel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `panel` ;

-- -----------------------------------------------------
-- Table `panel`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `panel`.`users` ;

CREATE TABLE IF NOT EXISTS `panel`.`users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `created_date` DATETIME NOT NULL,
  `is_active` TINYINT NOT NULL,
  `is_confirmed` TINYINT NOT NULL,
  `last_updated_date` DATETIME NOT NULL,
  `confirmation_code` VARCHAR(128) NULL,
  `registration_data` TEXT NULL,
  `email` VARCHAR(128) NOT NULL,
  `phone_number` VARCHAR(45) NULL,
  `password` VARCHAR(128) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `panel`.`screening_fields`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `panel`.`screening_fields` ;

CREATE TABLE IF NOT EXISTS `panel`.`screening_fields` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `question_id` BIGINT NOT NULL,
  `answer_mysql_type` VARCHAR(32) NOT NULL,
  `question_text` TEXT NOT NULL,
  `created_date` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));


-- -----------------------------------------------------
-- Table `panel`.`screening_data`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `panel`.`screening_data` ;

CREATE TABLE IF NOT EXISTS `panel`.`screening_data` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `screening_field_id` BIGINT NOT NULL,
  `answer` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `panel`.`surveys`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `panel`.`surveys` ;

CREATE TABLE IF NOT EXISTS `panel`.`surveys` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(256) NOT NULL,
  `created_date` DATETIME NOT NULL,
  `required_respondents_count` INT NULL,
  `is_active` TINYINT(1) NOT NULL,
  `link` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `panel`.`users_surveys`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `panel`.`users_surveys` ;

CREATE TABLE IF NOT EXISTS `panel`.`users_surveys` (
  `user_id` BIGINT NOT NULL,
  `survey_id` BIGINT NOT NULL,
  `started_date` DATETIME NULL,
  `completed_date` DATETIME NULL,
  `is_passed` TINYINT NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
