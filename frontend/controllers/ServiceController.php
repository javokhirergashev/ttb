<?php

namespace frontend\controllers;

use common\models\search\ServiceSearch;
use common\models\Service;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

    public function actionView($id)
    {
        $model = Service::findOne($id);
        if (!$model) {

        }

        return $this->render('view', [
            'model' => $model
        ]);
    }
}