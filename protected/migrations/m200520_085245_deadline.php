<?php

class m200520_085245_deadline extends CDbMigration
{
	public function up()
	{
		$this->execute("
ALTER TABLE `graphic` ADD `deadline` DATETIME NULL AFTER `finish`;
ALTER TABLE `sound` ADD `deadline` DATETIME NULL AFTER `valid`;
ALTER TABLE `music` ADD `deadline` DATETIME NULL AFTER `valid`;
ALTER TABLE `dialog` ADD `deadline` DATETIME NULL AFTER `test`;
ALTER TABLE `screen` ADD `deadline` DATETIME NULL AFTER `test`;
ALTER TABLE `cutscene` ADD `deadline` DATETIME NULL AFTER `test`;
ALTER TABLE `level` ADD `deadline` DATETIME NULL AFTER `test`;
ALTER TABLE `component` ADD `deadline` DATETIME NULL AFTER `test`;
");

	}

	public function down()
	{
		echo "m200520_085245_deadline does not support migration down.\n";
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