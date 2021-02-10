<?php

namespace app\models;

use yii\db\ActiveRecord;

class CategoryNews extends ActiveRecord
{
    public static function tableName()
    {
        return 'category_news';
    }
}
