<?php

namespace frontend\controllers;

use common\models\News;
use common\models\search\NewsSearch;
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id = null)
    {
        $model = News::findOne($id);

        return $this->render('view', ['model' => $model]);
    }
}