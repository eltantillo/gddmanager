<?php

class m200622_030147_active_project extends CDbMigration
{
	public function up()
	{
		$this->execute("
  ALTER TABLE `user` ADD `active_project_id` INT NULL AFTER `activity`;
  ALTER TABLE `user` ADD INDEX `fk_user_project_idx` (`active_project_id` ASC);
  ALTER TABLE `user` ADD CONSTRAINT `fk_user_project`
    FOREIGN KEY (`active_project_id`)
    REFERENCES `project` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION;
");
	}

	public function down()
	{
		echo "m200622_030147_active_project does not support migration down.\n";
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