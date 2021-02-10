<?php

use yii\db\Migration;

class m210209_140756_data extends Migration
{
    public function up()
    {
        $this->batchInsert(
            'category',
            ['id', 'title', 'path'],
            [
                [1, 'Общество', '1'],
                [2, 'Городская жизнь', '1.2'],
                [3, 'Выборы', '1.2.3'],
                [4, 'День города', '4'],
                [5, 'Салюты', '4.5'],
            ]
        );

        $this->batchInsert(
            'news',
            ['id', 'title', 'body'],
            [
                [1, 'Городская жизнь 1', 'Городская жизнь body 1'],
                [2, 'Городская жизнь 2', 'Городская жизнь body 2'],
                [3, 'Выборы 1', 'Выборы 1 body'],
                [4, 'Салюты', 'Салюты body'],
            ]
        );

        $this->batchInsert(
            'category_news',
            ['category_id', 'news_id'],
            [
                [2, 1],
                [2, 2],
                [3, 3],
                [5, 4],
            ]
        );
    }

    public function down()
    {
        $this->delete('category', 'id between 1 and 5');
        $this->delete('news', 'id between 1 and 4');
    }
}
