<?php

namespace app\models\search;

use app\models\Category;
use app\models\CategoryNews;
use app\models\News;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class NewsSearch extends News
{
    public $category_id;

    public function rules()
    {
        return [
            ['category_id', 'integer'],
            ['category_id', 'required'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function search($params = [])
    {
        $this->load($params, '');

        if (!$this->validate()) {
            throw new HttpException(Html::errorSummary($this));
        }

        $path = Category::find()
            ->select('path')
            ->where(['id' => $this->category_id])
            ->scalar();

        if (empty($path)) {
            throw new NotFoundHttpException('Category not found');
        }

        $category = Category::tableName();
        $categoryNews = CategoryNews::tableName();

        $query = News::find()
            ->alias('n')
            ->select('n.id, n.title, n.body')
            ->innerJoin("$categoryNews cn", 'cn.news_id = n.id')
            ->innerJoin("$category c", 'c.id = cn.category_id')
            ->where("c.path like '{$path}%'");

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            'pagination' => [
                'defaultPageSize' => 10],
        ]);
    }
}
