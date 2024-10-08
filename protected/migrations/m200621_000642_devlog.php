<?php

class m200621_000642_devlog extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `devlog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NOT NULL,
  `title` TEXT NOT NULL,
  `content` TEXT NOT NULL,
  `public` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_devlog_project_idx` (`project_id` ASC),
  CONSTRAINT `fk_devlog_project`
    FOREIGN KEY (`project_id`)
    REFERENCES `project` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
");
	}

	public function down()
	{
		echo "m200621_000642_devlog does not support migration down.\n";
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