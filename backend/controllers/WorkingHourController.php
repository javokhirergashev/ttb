<?php

namespace backend\controllers;

use common\models\WorkingHour;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class WorkingHourController extends Controller
{
    public function actionEnter()
    {
        $requestParams = \Yii::$app->request->bodyParams;
        $model = new WorkingHour();
        $model->setAttributes($requestParams);
        if ($model->save()) {
            return $model;
        }
        throw new BadRequestHttpException("Face not suitable");
    }

    public function actionExit()
    {
        $requestParams = \Yii::$app->request->bodyParams;
        $model = new WorkingHour();
        $model->setAttributes($requestParams);
        if ($model->save()) {
            return $model;
        }
        throw new BadRequestHttpException("Face not suitable");
    }
}