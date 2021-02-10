<?php

use yii\db\Migration;

class m210124_121507_category extends Migration
{
    public function up()
    {
        if (!$this->isTableExists('category')) {
            $this->execute('
                CREATE TABLE `category` (
                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    `title` VARCHAR(255) NOT NULL,
                    `path` VARCHAR(30) NOT NULL,
                    PRIMARY KEY (`id`),
                    CONSTRAINT `unique_path` UNIQUE(`path`) 
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
            ');
        }

        return true;
    }

    public function down()
    {
        if ($this->isTableExists('category')) {
            $this->execute('DROP TABLE `category`');
        }
        return true;
    }

    public function isTableExists($tableName)
    {
        return $this->getDb()->getSchema()->getTableSchema($tableName) !== null;
    }
}
