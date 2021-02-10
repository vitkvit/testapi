<?php

namespace app\modules\v1\controllers;

use app\models\search\NewsSearch;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class NewsController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats'] = ['application/json' => Response::FORMAT_JSON];

        return $behaviors;
    }


    public function actionIndex()
    {
        $model = new NewsSearch();
        return $model->search(Yii::$app->getRequest()->get());
    }
}
