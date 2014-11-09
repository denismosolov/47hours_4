SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- DROP SCHEMA IF EXISTS `panel` ;
-- CREATE SCHEMA IF NOT EXISTS `panel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
DROP DATABASE IF EXISTS `panel`;
CREATE DATABASE `panel`;
USE `panel` ;

-- -----------------------------------------------------
-- Table `panel`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `panel`.`users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `created_date` DATETIME NOT NULL,
  `is_active` TINYINT NOT NULL,
  `is_confirmed` TINYINT NOT NULL,
  `last_updated_date` DATETIME NULL,
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
CREATE TABLE IF NOT EXISTS `panel`.`surveys` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(256) NOT NULL,
  `created_date` DATETIME NOT NULL,
  `required_respondents_count` INT NULL,
  `is_active` TINYINT NOT NULL,
  `link` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `panel`.`users_surveys`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `panel`.`users_surveys` (
  `user_id` BIGINT NOT NULL,
  `survey_id` BIGINT NOT NULL,
  `started_date` DATETIME NULL,
  `completed_date` DATETIME NULL,
  `is_passed` TINYINT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `panel`.`invited_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `panel`.`invited_users` (
  `survey_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`survey_id`, `user_id`))
ENGINE = InnoDB
COMMENT = 'Match surveys with invited users';


INSERT INTO `panel`.`surveys` VALUES(1, 'Довольны ли вы услугами ЖКХ ?', '2014-11-09', NULL, 10, 'http://www.surveygizmo.com/s3/1884487/47hours-demo');
-- INSERT INTO `panel`.`surveys` VALUES(2, 'Какой город самый безопасный для Вас ?', '2014-11-09', NULL, 1, 'http://tonkosti.ru/%D0%9F%D1%80%D0%B0%D0%B3%D0%B0');
-- INSERT INTO `panel`.`surveys` VALUES(3, 'Ваш любимый президент ?', '2014-11-07', NULL, 1, 'http://www.pravmir.ru/aleksandr-nevskij-myslitel-filosof-strateg-svyatoj/');
-- INSERT INTO `panel`.`surveys` VALUES(4, 'Чем ворон похож на письменный стол', '2014-11-09', NULL, 1, 'http://otvet.mail.ru/question/35731609');

INSERT INTO `panel`.`users` VALUES(1, '2014-11-09', 0, 0, NULL, NULL, NULL, 'queentin@hackaton.tut', NULL, '385165322b273704f9d078928b79e4d1');
INSERT INTO `panel`.`users` VALUES(2, '2014-11-09', 0, 0, NULL, NULL, NULL, 'a@example.com', NULL, '385165322b273704f9d078928b79e4d1');
INSERT INTO `panel`.`users` VALUES(3, '2014-11-09', 0, 0, NULL, NULL, NULL, 'b@example.com', NULL, '385165322b273704f9d078928b79e4d1');
INSERT INTO `panel`.`users` VALUES(4, '2014-11-09', 0, 0, NULL, NULL, NULL, 'c@example.com', NULL, '385165322b273704f9d078928b79e4d1');
INSERT INTO `panel`.`users` VALUES(5, '2014-11-09', 0, 0, NULL, NULL, NULL, 'test@example.com', NULL, '385165322b273704f9d078928b79e4d1');

INSERT INTO `panel`.`invited_users` VALUES(1, 1);
INSERT INTO `panel`.`invited_users` VALUES(1, 2);
INSERT INTO `panel`.`invited_users` VALUES(1, 3);
INSERT INTO `panel`.`invited_users` VALUES(1, 4);
INSERT INTO `panel`.`invited_users` VALUES(1, 5);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
