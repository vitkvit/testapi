<?php

use yii\db\Migration;

class m210124_121508_news extends Migration
{
    public function up()
    {
        if (!$this->isTableExists('news')) {
            $this->execute('
                CREATE TABLE `news` (
                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    `title` VARCHAR(255) NOT NULL,
                    `body` TEXT NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
            ');
        }

        return true;
    }

    public function down()
    {
        if ($this->isTableExists('news')) {
            $this->execute('DROP TABLE `news`');
        }
        return true;
    }

    public function isTableExists($tableName)
    {
        return $this->getDb()->getSchema()->getTableSchema($tableName) !== null;
    }
}
