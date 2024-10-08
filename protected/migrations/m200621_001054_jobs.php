<?php

class m200621_001054_jobs extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `job` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `company_id` INT NOT NULL,
  `title` TEXT NOT NULL,
  `position` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `open` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_job_company_idx` (`company_id` ASC),
  CONSTRAINT `fk_job_company`
    FOREIGN KEY (`company_id`)
    REFERENCES `company` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE `application` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `job_id` INT NOT NULL,
  `name` TEXT NOT NULL,
  `email` TEXT NOT NULL,
  `phone` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_application_job_idx` (`job_id` ASC),
  CONSTRAINT `fk_application_job`
    FOREIGN KEY (`job_id`)
    REFERENCES `job` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
");
	}

	public function down()
	{
		echo "m200621_001054_jobs does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}