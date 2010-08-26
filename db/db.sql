SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `clab` ;
CREATE SCHEMA IF NOT EXISTS `clab` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `clab` ;

-- -----------------------------------------------------
-- Table  `client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `client` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `client` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `name_on_report` VARCHAR(255) NULL ,
  `date_added` TIMESTAMP NULL ,
  `company` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `website` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `address2` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NULL ,
  `zip` TINYINT(5) NULL ,
  `phone` VARCHAR(45) NULL ,
  `fax` VARCHAR(45) NULL ,
  `cell` VARCHAR(255) NULL ,
  `note` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `id_UNIQUE` ON  `client` (`id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `appraisal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `appraisal` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `appraisal` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `date_created` TIMESTAMP NOT NULL ,
  `client_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_appraisal_client1`
    FOREIGN KEY (`client_id` )
    REFERENCES  `client` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_appraisal_client1` ON  `appraisal` (`client_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `purposes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `purposes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `purposes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `value` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `types_of_report`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `types_of_report` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `types_of_report` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `value` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `types_of_value`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `types_of_value` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `types_of_value` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `value` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `basic_report_parameters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `basic_report_parameters` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `basic_report_parameters` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `date_created` TIMESTAMP NOT NULL ,
  `client_name` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NULL ,
  `year` VARCHAR(255) NULL ,
  `purposes_id` INT UNSIGNED NOT NULL ,
  `types_of_value_id` INT UNSIGNED NOT NULL ,
  `types_of_report_id` INT UNSIGNED NOT NULL ,
  `primary_img_size_id` ENUM('Small','Medium','Lage') NULL ,
  `sec_img_size_id` ENUM('Small','Medium','Lage') NULL ,
  `currency_symbol` VARCHAR(45) NULL ,
  `eximmination_dates` TEXT NULL ,
  `research_dates_from` DATE NULL ,
  `reseach_dates_to` DATE NULL ,
  `effective_valuation_date` DATE NULL ,
  `issue_date_report` DATE NULL ,
  `order_report_section` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_basic_report_parameters_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_basic_report_parameters_purposes1`
    FOREIGN KEY (`purposes_id` )
    REFERENCES  `purposes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_basic_report_parameters_types_of_report1`
    FOREIGN KEY (`types_of_report_id` )
    REFERENCES  `types_of_report` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_basic_report_parameters_types_of_value1`
    FOREIGN KEY (`types_of_value_id` )
    REFERENCES  `types_of_value` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_basic_report_parameters_appraisal1` ON  `basic_report_parameters` (`appraisal_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_basic_report_parameters_purposes1` ON  `basic_report_parameters` (`purposes_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_basic_report_parameters_types_of_report1` ON  `basic_report_parameters` (`types_of_report_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_basic_report_parameters_types_of_value1` ON  `basic_report_parameters` (`types_of_value_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `conf_fonts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `conf_fonts` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `conf_fonts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `section` VARCHAR(255) NOT NULL ,
  `font_size` VARCHAR(255) NULL ,
  `font_type` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `conf_img`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `conf_img` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `conf_img` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `size` VARCHAR(255) NOT NULL ,
  `max_height` VARCHAR(255) NULL ,
  `max_width` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `category` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `object`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `object` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `object` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `category_id` INT UNSIGNED NOT NULL ,
  `sub_category_id` INT UNSIGNED NOT NULL ,
  `location` TEXT NULL ,
  `location1` TEXT NULL ,
  `location2` TEXT NULL ,
  `client_ret` VARCHAR(45) NULL ,
  `value` VARCHAR(45) NULL ,
  `value2` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `provenance` TEXT NULL ,
  `exhibited` TEXT NULL ,
  `literature` TEXT NULL ,
  `title` VARCHAR(255) NULL ,
  `maker_artist` VARCHAR(255) NULL ,
  `dimensions` VARCHAR(255) CHARACTER SET 'utf8' NULL ,
  `medium` VARCHAR(255) NULL ,
  `date_period` VARCHAR(255) NULL ,
  `markings` VARCHAR(255) NULL ,
  `condition` VARCHAR(255) NULL ,
  `acquistion_cost` VARCHAR(255) NULL ,
  `acqusition_date` DATE NULL ,
  `acqusition_source` VARCHAR(255) NULL ,
  `is_active` TINYINT(1)  NULL ,
  `notes` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_object_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_object_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES  `category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_object_category2`
    FOREIGN KEY (`sub_category_id` )
    REFERENCES  `category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_object_appraisal1` ON  `object` (`appraisal_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_object_category1` ON  `object` (`category_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_object_category2` ON  `object` (`sub_category_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `comparable_sales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `comparable_sales` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `comparable_sales` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `objects_id` INT NOT NULL ,
  `img_id` INT NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `image` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `image` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `path` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `object_images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `object_images` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `object_images` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `object_id` INT UNSIGNED NOT NULL ,
  `image_id` INT UNSIGNED NOT NULL ,
  `caption` VARCHAR(255) NULL ,
  `rank` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_object_images_object1`
    FOREIGN KEY (`object_id` )
    REFERENCES  `object` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_object_images_image1`
    FOREIGN KEY (`image_id` )
    REFERENCES  `image` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_object_images_object1` ON  `object_images` (`object_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_object_images_image1` ON  `object_images` (`image_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_cover_letter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_cover_letter` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_cover_letter` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_cover_letter_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_cover_letter_appraisal1` ON  `report_cover_letter` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_biohist_context`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_biohist_context` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_biohist_context` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  `title` VARCHAR(255) NULL ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_biohist_context_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_biohist_context_appraisal1` ON  `report_biohist_context` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_market_analysis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_market_analysis` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_market_analysis` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  `title` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_market_analysis_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_market_analysis_appraisal1` ON  `report_market_analysis` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_resume`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_resume` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_resume` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `title` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_resume_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_resume_appraisal1` ON  `report_resume` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_resume_resumes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_resume_resumes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_resume_resumes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `report_resume_id` INT UNSIGNED NOT NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_resume_resumes_report_resume1`
    FOREIGN KEY (`report_resume_id` )
    REFERENCES  `report_resume` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						';

SHOW WARNINGS;
CREATE INDEX `fk_report_resume_resumes_report_resume1` ON  `report_resume_resumes` (`report_resume_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_signed_cert`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_signed_cert` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_signed_cert` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `section_title` VARCHAR(255) NULL ,
  `into_text` VARCHAR(255) NULL COMMENT '																																																						' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_signed_cert_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_signed_cert_appraisal1` ON  `report_signed_cert` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_signed_statements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_signed_statements` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_signed_statements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `report_signed_cert_id` INT UNSIGNED NOT NULL ,
  `statment` ENUM('s','a') NULL ,
  `value` VARCHAR(255) NULL ,
  `is_checked` TINYINT(1)  NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_signed_statements_report_signed_cert1`
    FOREIGN KEY (`report_signed_cert_id` )
    REFERENCES  `report_signed_cert` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '																																																																												';

SHOW WARNINGS;
CREATE INDEX `fk_report_signed_statements_report_signed_cert1` ON  `report_signed_statements` (`report_signed_cert_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_scope_work`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_scope_work` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_scope_work` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  `title` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_scope_work_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_scope_work_appraisal1` ON  `report_scope_work` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_disclaimers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_disclaimers` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_disclaimers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_disclaimers_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_disclaimers_appraisal1` ON  `report_disclaimers` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `report_disclaimers_statements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `report_disclaimers_statements` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `report_disclaimers_statements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `report_disclaimers_id` INT UNSIGNED NOT NULL ,
  `statment` ENUM('s','a') NULL ,
  `value` VARCHAR(255) NULL ,
  `is_checked` TINYINT(1)  NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_report_disclaimers_statements_report_disclaimers1`
    FOREIGN KEY (`report_disclaimers_id` )
    REFERENCES  `report_disclaimers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_report_disclaimers_statements_report_disclaimers1` ON  `report_disclaimers_statements` (`report_disclaimers_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_glossary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_glossary` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_glossary` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  `terms` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_glossary_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_glossary_appraisal1` ON  `sd_glossary` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_privacy_policy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_privacy_policy` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_privacy_policy` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_privacy_policy_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_privacy_policy_appraisal1` ON  `sd_export` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_bibliography`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_bibliography` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_bibliography` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_bibliography_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_bibliography_appraisal1` ON  `sd_bibliography` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_appendices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_appendices` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_appendices` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `is_active` TINYINT(1)  NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_appendices_appraisal1`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_appendices_appraisal1` ON  `sd_appendices` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_appendices_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_appendices_list` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_appendices_list` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `sd_appendices_id` INT UNSIGNED NOT NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_appendices_list_sd_appendices1`
    FOREIGN KEY (`sd_appendices_id` )
    REFERENCES  `sd_appendices` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_appendices_list_sd_appendices1` ON  `sd_appendices_list` (`sd_appendices_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `conf_general`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `conf_general` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `conf_general` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `company_name` VARCHAR(255) NULL ,
  `phone` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `website` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NULL ,
  `state` VARCHAR(255) NULL ,
  `zip` VARCHAR(45) NULL ,
  `default_currency` VARCHAR(45) NULL ,
  `header` TEXT NULL ,
  `footer` TEXT NULL ,
  `privacy_policy` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `conf_type_of_value`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `conf_type_of_value` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `conf_type_of_value` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `definition` TEXT NULL ,
  `source` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `sd_export`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `sd_export` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `sd_export` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `appraisal_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `date_created` TIMESTAMP NULL ,
  `path` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sd_privacy_policy_appraisal10`
    FOREIGN KEY (`appraisal_id` )
    REFERENCES  `appraisal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_sd_privacy_policy_appraisal1` ON  `sd_export` (`appraisal_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table  `conf_export_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS  `conf_export_order` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS  `conf_export_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NULL ,
  `rank` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
