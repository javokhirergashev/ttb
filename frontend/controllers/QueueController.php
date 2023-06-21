<?php

namespace frontend\controllers;

use common\models\Queue;
use yii\web\Controller;
use yii\web\Response;

class QueueController extends Controller
{

    public function actionCreate()
    {
        $model = new Queue();
        if ($model->load(\Yii::$app->request->post())) {
            $model->writing_time = strtotime($model->writing_time);
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Siz muvaffaqqiyatli  navbatga qoshildingiz !');
                return $this->redirect(\Yii::$app->request->referrer);
            }
        }
        \Yii::$app->session->setFlash('error', 'Navbatga yozilishda hatolik boldi');
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionCheckTime()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $bodyParams = \Yii::$app->request->bodyParams;
        $time = strtotime($bodyParams['selectedDate']);
        if ($time && $bodyParams['user_id']) {
            $model = Queue::find()->andWhere(['user_id' => $bodyParams['user_id'], 'writing_time' => $time])->exists();
            if ($model) {
                \Yii::$app->response->setStatusCode(400);

                $data = Queue::find()->andWhere(['user_id' => $bodyParams['user_id']])->andWhere(['>', 'writing_time', time()])->all();
                foreach ($data as $datum) {
                    $result [] = date('Y-m-d H:i', $datum->writing_time);
                }

                return $result;
            }
            return [
                'message' => "Ok"
            ];

        }
        return $bodyParams;


    }
}