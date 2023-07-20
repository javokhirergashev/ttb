<?php

namespace frontend\controllers;

use common\models\People;
use common\models\Queue;
use Doctrine\Instantiator\Exception\ExceptionInterface;
use Symfony\Component\DomCrawler\Field\InputFormField;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class QueueController extends Controller
{

    public function actionCreate()
    {
        $model = new Queue();
        if ($model->load(\Yii::$app->request->post())) {
            $model->writing_time = strtotime($model->writing_time);
            if (!$model->passport_number){
                  die("nds nkdjssd  ds");
            }

            $people = People::find()->andWhere(['passport_number' => 'AB12345'])->one();
            if (!$people) {
                return $this->redirect(Yii::$app->request->referrer);
            }
            $model->people_id = $people->id;
            if ($model->save(false)) {
                return $this->redirect(\Yii::$app->request->referrer);
            }

            var_dump($model);die();
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
                    $result[date('Y-m-d', $datum->writing_time)][] = date('H:i', $datum->writing_time);
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