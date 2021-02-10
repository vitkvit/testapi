<?php

use yii\db\Migration;

class m210124_121509_category_news extends Migration
{
    public function up()
    {
        if (!$this->isTableExists('category_news')) {
            $this->execute('
                CREATE TABLE `category_news` (
                    `category_id` INT UNSIGNED NOT NULL,
                    `news_id` INT UNSIGNED NOT NULL,
                    PRIMARY KEY (`category_id`, `news_id`),
                    KEY `index_news_id` (`news_id`),
                    CONSTRAINT `lnk_category_category_news` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
                    CONSTRAINT `lnk_news_category_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
            ');
        }

        return true;
    }

    public function down()
    {
        if ($this->isTableExists('category_news')) {
            $this->execute('DROP TABLE `category_news`');
        }
        return true;
    }

    public function isTableExists($tableName)
    {
        return $this->getDb()->getSchema()->getTableSchema($tableName) !== null;
    }
}
