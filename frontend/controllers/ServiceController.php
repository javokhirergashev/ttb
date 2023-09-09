<?php

namespace frontend\controllers;

use common\models\People;
use common\models\Queue;
use common\models\Request;
use common\models\search\ServiceSearch;
use common\models\Service;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ServiceController extends Controller
{
    public function actionIndex()
    {
        $model = new Queue();
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
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

    public function actionQueue()
    {
        $model = new Queue();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Murojaatingiz qabul qilindi. Tez orada siz bilan bog'lanamiz!");
                return $this->refresh();
            }
            var_dump($model->errors);
            die();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}