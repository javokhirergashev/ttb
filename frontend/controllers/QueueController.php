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

                $htmlFile = 'path/to/custom.html';

                // Read the contents of the HTML file
                $htmlContent = file_get_contents($htmlFile);

                // Create a new mPDF object
                $mpdf = new \Mpdf\Mpdf();

                // Set the custom HTML content for the PDF
                $mpdf->WriteHTML($htmlContent);

                // Set the headers for download
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="example.pdf"');

                // Output the PDF file
                $mpdf->Output('example.pdf', 'D');


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