<?php

class m200620_235935_social extends CDbMigration
{
	public function up()
	{
		$this->execute("
ALTER TABLE `project` ADD `facebook` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `snapchat` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `tumblr` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `twitch` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `youtube` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `reddit` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `discord` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `twitter` TEXT NULL AFTER `marketing`;
ALTER TABLE `project` ADD `website` TEXT NULL AFTER `marketing`;
");

	}

	public function down()
	{
		echo "m200620_235935_social does not support migration down.\n";
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