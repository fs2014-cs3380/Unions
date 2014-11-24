<?php

class m141110_152218_create_schema extends CDbMigration
{
	public function up()
	{
        $this->execute("SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;");
        $this->execute("SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;");
        $this->execute("SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';");

        /*
         * Schema unions
         * */
        $this->execute("DROP SCHEMA IF EXISTS `unions`");

        /*
         * Schema unions
         * */
        $this->execute("CREATE SCHEMA IF NOT EXISTS `unions` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `unions`;");
	}

	public function down()
	{
		echo "m141110_152218_create_schema does not support migration down.\n";
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