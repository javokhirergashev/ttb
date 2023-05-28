<?php

namespace frontend\controllers;

use common\models\search\ServiceSearch;
use yii\web\Controller;

class ServiceController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);


        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}